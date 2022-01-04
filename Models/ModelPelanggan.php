<?php 
	

	class ModelPelanggan{
		private $db;
		public $collection;
		function __construct()
		{
			require 'Koneksi.php';
			$this->collection = $con->pelanggan;
		}

		public function create($data){
			try {
				$this->collection->insertOne($data);
				return TRUE;
			} catch (Exception $e) {
				return FALSE;
			}
		}

		public function update($kondisi,$data){
			try{
				$this->collection->updateOne($kondisi,array('$set' => $data));
				return TRUE;
			} catch (Exception $e) {
				return FALSE;
			}
		}

		public function delete($kondisi){
			$this->collection->deleteOne($kondisi);
		}

		public function select($data){
			if(is_null($data)){
				return $this->collection->find();
			}else{
				return $this->collection->find($data);
			}
		}
	}
?>