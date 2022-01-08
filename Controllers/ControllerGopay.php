<?php 
	class ControllerGopay{
		private $model;
		function __construct()
		{
			$this->model = new ModelGopay();
		}

		public function insertData(){
			$data = array(
				"_id" => $_POST['id'],
				"id_user" => $_POST['id_user'],
				"saldo" => $_POST['saldo'],
				"jenis_gopay" => $_POST['jenis_gopay'],
			);
			if(!$this->model->create($data)){
				echo "GAGAL";
			}
		}

		public function updateData(){
			$_id = array("_id" => $_POST['id']);
			$data = array(
				"id_user" => $_POST['id_user'],
				"saldo" => $_POST['saldo'],
				"jenis_gopay" => $_POST['jenis_gopay'],
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

		public function selectData($form){
			$data = [
			    [
			      '$lookup' => [
			          'from' => $form,
			          'localField' => 'id_user',
			          'foreignField' => '_id',
			          'as' => 'user'
			      ],
			    ],
			];
			return $this->model->selectAggregate($data);
		}

		public function selectDataByID($_id){
			$data = array("_id" => $_id);
			return $this->model->select($data);
		}
	}

	if (isset($_GET['method'])) {
		require '../Models/ModelGopay.php';
		$control = new ControllerGopay();
		if ($_GET['method'] == "delete") {
			$control->deleteData($_GET['id']);
			echo "<script>
				window.location.href = '../index.php?view=gopay'
			</script>";
		}else if ($_GET['method'] == "insert") {
			$control->insertData();
			echo "<script>
				window.location.href = '../index.php?view=gopay'
			</script>";
		}else if ($_GET['method'] == "update") {
			$control->updateData();
			echo "<script>
				window.location.href = '../index.php?view=gopay'
			</script>";
		}
	}

?>