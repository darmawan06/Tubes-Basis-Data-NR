<?php 
	class ControllerOrder{
		private $model;
		function __construct()
		{
			$this->model = new ModelOrder();
		}

		public function insertData(){
			$data = array(
				"_id" => $_POST['id'],
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
				"status_order" => $_POST['status'],
				"rating_perjalanan" => $_POST['rating'],
				"jumlah_xp" => $_POST['xp'],
				"metode_pembayaran" => $_POST['metode'],
			);
			if(!$this->model->create($data)){
				echo "GAGAL";
			}
		}

		public function updateData(){
			$_id = array("_id" => $_POST['id']);
			$data = array(
				"_id" => $_POST['id'],
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
				"status_order" => $_POST['status'],
				"rating_perjalanan" => $_POST['rating'],
				"jumlah_xp" => $_POST['xp'],
				"metode_pembayaran" => $_POST['metode'],
			);
			
			if (count($data) != 0 && !is_null($_id)) {
				if (!$this->model->update($_id,$data)) {
					echo "GAGAL";
				}
			}
		}


		public function deleteData($_id){
			$data = array("_id" => $_id);
			$this->model->delete($data);
		}

		public function selectData(){
			return $this->model->select(NULL);
		}

		public function selectDataByID($_id){
			$data = array("_id" => $_id);
			return $this->model->select($data);
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
		}
	}

?>