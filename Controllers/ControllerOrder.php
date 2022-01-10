<?php 
	class ControllerOrder{
		private $model;
		function __construct()
		{
			$this->model = new ModelOrder();
		}

		public function insertData(){
			require '../Models/ModelGopay.php';
			$data_insert = array(
				"id_penumpang" => $_POST['idPenumpang'],
				"id_driver" => $_POST['idDriver'],
				"perjalanan" => array(
					"lokasi_jemput" => array(
						"lat" => $_POST['latJemput'],
						"long" => $_POST['longJemput']
					),
					"lokasi_tujuan" => array(
						"lat" => $_POST['latTujuan'],
						"long" => $_POST['longTujuan']
					),
					"jarak" => $_POST['jarak'],
					"biaya" => (int)$_POST['biaya'],
				),
				"waktu_order" => $_POST['waktu'],
				"status_order" => Null,
				"rating_perjalanan" => $_POST['rating'],
				"jumlah_xp" => $_POST['xp'],
				"metode_pembayaran" => $_POST['metode'],
			);
				$data_insert['status_order'] = $this->prosesHitungGopay($data_insert);
				$this->model->create($data_insert);
		}

		public function updateData(){
			require '../Models/ModelGopay.php';
			$data_id = $_POST['id'];
			$data_update = array(
				"id_penumpang" => $_POST['idPenumpang'],
				"id_driver" => $_POST['idDriver'],
				"perjalanan" => array(
					"lokasi_jemput" => array(
						"lat" => $_POST['latJemput'],
						"long" => $_POST['longJemput']
					),
					"lokasi_tujuan" => array(
						"lat" => $_POST['latTujuan'],
						"long" => $_POST['longTujuan']
					),
					"jarak" => $_POST['jarak'],
					"biaya" => $_POST['biaya'],
				),
				"waktu_order" => $_POST['waktu'],
				"status_order" => Null,
				"rating_perjalanan" => $_POST['rating'],
				"jumlah_xp" => $_POST['xp'],
				"metode_pembayaran" => $_POST['metode'],
			);
			
			if (count($data_update) != 0 && !is_null($data_id)) {
				$data_update['status_order'] = $this->prosesUlangHitungGopay($data_update,$data_id);
				$data_update['status_order'] = $this->prosesHitungGopay($data_update);
				$this->model->update($data_id,$data_update);
			}
		}

		private function prosesHitungGopay($data){
			$this->modelGopay = new ModelGopay();
			$gopayPenumpang = $this->modelGopay->select(['_id' => $data['id_penumpang']]);
			$gopayDriver = $this->modelGopay->select(['_id' => $data['id_driver']]);
			$biaya = $data['perjalanan']['biaya'];
			$jumlahPenumpang = (int) $gopayPenumpang['saldo'] - $biaya;
			$jumlahDriver = (int) $gopayDriver['saldo'] + $biaya;
			if($jumlahPenumpang >= 0){
				$_id = array("_id" => $gopayPenumpang['_id']);
				$data = array(
					"saldo" =>(int) $jumlahPenumpang
				);
				$this->modelGopay->update($_id,$data);

				$_id = array("_id" => $gopayDriver['_id']);
				$data = array(
					"saldo" =>(int) $jumlahDriver
				);
				$this->modelGopay->update($_id,$data);
				return "BERHASIL";
			}else{
				return "GAGAL PEMBAYARAN";
			}
		}

		private function prosesUlangHitungGopay($data,$id){
			$this->modelGopay = new ModelGopay();
			$gopayPenumpang = $this->modelGopay->select(['_id' => $data['id_penumpang']]);
			$gopayDriver = $this->modelGopay->select(['_id' => $data['id_driver']]);
			$dataSebelumnya = $this->selectDataByID($id);
			$biaya = $dataSebelumnya['perjalanan']['biaya'];
			$jumlahPenumpang = (int) $gopayPenumpang['saldo'] + $biaya;
			$jumlahDriver = (int) $gopayDriver['saldo'] - $biaya;
			if($jumlahDriver >= 0){
				$_id = array("_id" => $gopayPenumpang['_id']);
				$data = array(
					"saldo" =>(int) $jumlahPenumpang
				);
				$this->modelGopay->update($_id,$data);

				$_id = array("_id" => $gopayDriver['_id']);
				$data = array(
					"saldo" =>(int) $jumlahDriver
				);
				$this->modelGopay->update($_id,$data);
				return "BERHASIL";
			}else{
				return "GAGAL PEMBAYARAN";
			}
		}

		public function deleteData($_id){
			$this->model->delete($_id);
		}

		public function selectData(){
			return $this->model->select(NULL);
		}

		public function selectDataByID($_id){
			return $this->model->select($_id);
		}
	}

	if (isset($_GET['method'])) {
		require '../Models/ModelOrder.php';
		$control = new ControllerOrder();
		if ($_GET['method'] == "delete") {
			$control->deleteData($_GET['id']);
			echo "<script>
				window.location.href = '../index.php?view=order'
			</script>";
		}else if ($_GET['method'] == "insert") {
			$control->insertData();
			echo "<script>
				window.location.href = '../index.php?view=order'
			</script>";
		}else if ($_GET['method'] == "update") {
			$control->updateData();
			echo "<script>
				window.location.href = '../index.php?view=order'
			</script>";
		}
	}

?>