<?php 
	class ModelDriver {
		private $db;
		public $collection;

		function __construct()
		{
			require 'Koneksi.php';
			$this->collection = $con->driver;
		}

		public function create($data){
			try {
				$this->collection->insertOne($data);
				return TRUE;
			} catch (Exception $e) {
				return FALSE;
			}
		}

		public function update($id, $data){
			try{
				$this->collection->updateOne($id, array('$set' => $data));
				return TRUE;
			} catch (Exception $e) {
				return FALSE;
			}
		}

		public function delete($id){
			$this->collection->deleteOne($id);
		}

		public function select($id = null){
			if(is_null($id)){
				return $this->collection->find();
			}
            else{
				return $this->collection->find($id);
			}
		}
	}
?>