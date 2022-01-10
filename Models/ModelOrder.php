<?php 
	

	class ModelOrder{
		private $db;
		public $collection;
		function __construct()
		{
			require 'Koneksi.php';
			$this->collection = $con->order;
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
				$this->collection->updateOne(['_id' => new MongoDB\BSON\ObjectID( $kondisi )],array('$set' => $data)); 
				return TRUE;
			} catch (Exception $e) {
				return FALSE;
			}
		}

		public function delete($kondisi){
			$this->collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID( $kondisi )]);
		}

		public function select($data){
			if(is_null($data)){
				return $this->collection->find();
			}else{
				return $this->collection->findOne(['_id' => new MongoDB\BSON\ObjectID( $data )]);
			}
		}
	}
?>