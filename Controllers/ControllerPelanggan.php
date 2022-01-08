<?php 
	class ControllerPelanggan{
		private $model;
		function __construct()
		{
			$this->model = new ModelPelanggan();
		}

		public function insertData(){
			$data = array(
				"_id" => "P".$_POST['id'],
				"nama" => $_POST['nama'],
				"no" => $_POST['no'],
				"foto" => $_POST['foto'],
				"lokasi" => array(
					"lat" => $_POST['lat'],
					"long" => $_POST['long']
				),
				"status" => $_POST['status'],
			);
			if(!$this->model->create($data)){
				echo "GAGAL";
			}
		}

		public function updateData(){
			$_id = array("_id" => $_POST['id']);
			$data = array(
				"nama" => $_POST['nama'],
				"no" => $_POST['no'],
				"foto" => $_POST['foto'],
				"lokasi" => array(
					"lat" => $_POST['lat'],
					"long" => $_POST['long']
				),
				"status" => $_POST['status'],
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
		require '../Models/ModelPelanggan.php';
		$control = new ControllerPelanggan();
		if ($_GET['method'] == "delete") {
			$control->deleteData($_GET['id']);
			echo "<script>
				window.location.href = '../index.php?view=pelanggan'
			</script>";
		}else if ($_GET['method'] == "insert") {
			$control->insertData();
			echo "<script>
				window.location.href = '../index.php?view=pelanggan'
			</script>";
		}else if ($_GET['method'] == "update") {
			$control->updateData();
			echo "<script>
				window.location.href = '../index.php?view=pelanggan'
			</script>";
		}
	}

?>