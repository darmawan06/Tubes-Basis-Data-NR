<?php 
    class ControllerDriver {
        private $model;
        function __construct()
        {
            $this->model = new ModelDriver();
        }

        public function insertData(){
            if(isset($_FILES['foto_driver'])){
                $allowed_mimetype = ['image/png', 'image/jpg', 'image/jpeg'];
                if(!in_array($_FILES['foto_driver']['type'], $allowed_mimetype)){
                    echo "FOTO TIDAK SESUAI FORMAT";
                }
                else {
                    $dir = "../assets/foto_driver/";
                    
                    $namaFoto = $_FILES['foto_driver']['name'];
                    $arrNamaFoto = explode('.', $namaFoto);
                    $namaFoto = round(microtime(true)).'.'.$arrNamaFoto[1];
                    $data = array(
                        "_id" => "D".$_POST['id'],
                        "nama_driver" => $_POST['nama_driver'],
                        "no_telp_driver" => $_POST['no_telp_driver'],
                        "foto_driver" => $namaFoto,
                        "no_plat_kendaraan" => $_POST['no_plat_kendaraan'],
                        "jenis_kendaraan" => $_POST['jenis_kendaraan'],
                        'rating_driver' => $_POST['rating_driver'],
                        'lokasi_terkini_driver' => array(
                            'longitude' => $_POST['longitude_driver'],
                            'latitude' => $_POST['latitude_driver']
                        )
                    );
        
                    if($this->model->create($data)){
                        echo "BERHASIL MENAMBAHKAN DATA DRIVER";
                        if(file_exists($_FILES['foto_driver']['tmp_name']) && is_uploaded_file($_FILES['foto_driver']['tmp_name'])){
                            $namaSementara = $_FILES['foto_driver']['tmp_name'];
    
                            // compress foto
                            $imgInfo = getimagesize($namaSementara); 
                            $mime = $imgInfo['mime']; 
                            switch($mime){ 
                                case 'image/jpeg': 
                                    $image = imagecreatefromjpeg($namaSementara); 
                                    break; 
                                case 'image/png': 
                                    $image = imagecreatefrompng($namaSementara); 
                                    break; 
                                default: 
                                    $image = imagecreatefromjpeg($namaSementara); 
                            } 
                            // simpan foto 
                            $res = imagejpeg($image, $dir.$namaFoto, 1);
        
                            if ($res) {
                                echo "Upload berhasil!<br/>";
                            } else {
                                echo "Upload Gagal!";
                            }
                        }
                        require 'ControllerGopay.php';
                        $this->conGopay = new ControllerGopay();
                        $this->conGopay->insertData($data['_id'],0,"Normal");
                    }
                    else {
                        echo "GAGAL MENAMBAHKAN DATA DRIVER";
                    }
                }
            }

        }

        public function updateData($id){
            $id_driver = array(
                "_id" => $id
            );

            
            $dir ="../assets/foto_driver/";
            $old_foto = $_POST['old_foto_driver'];
			if(file_exists($_FILES['foto_driver']['tmp_name']) && is_uploaded_file($_FILES['foto_driver']['tmp_name'])){
                $allowed_mimetype = ['image/png', 'image/jpg', 'image/jpeg'];
                if(!in_array($_FILES['foto_driver']['type'], $allowed_mimetype)){
                    echo "FOTO TIDAK SESUAI FORMAT";
                }
                else {
                    if(isset($old_foto)){
                        unlink($dir.$old_foto);
                    }

                    $namaFoto = $_FILES['foto_driver']['name'];
                    $arrNamaFoto = explode('.', $namaFoto);
                    $namaFoto = round(microtime(true)).'.'.$arrNamaFoto[1];
                }
			}
            else {
                $namaFoto = $old_foto;
            }
            $data = array(
                "_id" => $_POST['id'],
                "nama_driver" => $_POST['nama_driver'],
                "no_telp_driver" => $_POST['no_telp_driver'],
                "foto_driver" => $namaFoto,
                "no_plat_kendaraan" => $_POST['no_plat_kendaraan'],
                "jenis_kendaraan" => $_POST['jenis_kendaraan'],
                'rating_driver' => $_POST['rating_driver'],
                'lokasi_terkini_driver' => array(
                    'longitude' => $_POST['longitude_driver'],
                    'latitude' => $_POST['latitude_driver']
                )
            );

            if (count($data) != 0 && !is_null($id_driver)) {
                if(!$this->model->update($id_driver, $data)){
                    echo "GAGAL MENGUBAH DATA DRIVER";
                }
                else {
                    echo "BERHASIL MENGUBAH DATA DRIVER";
                    if(file_exists($_FILES['foto_driver']['tmp_name']) && is_uploaded_file($_FILES['foto_driver']['tmp_name'])){
                        $namaSementara = $_FILES['foto_driver']['tmp_name'];

                        // compress foto
                        $imgInfo = getimagesize($namaSementara); 
                        $mime = $imgInfo['mime']; 
                        switch($mime){ 
                            case 'image/jpeg': 
                                $image = imagecreatefromjpeg($namaSementara); 
                                break; 
                            case 'image/png': 
                                $image = imagecreatefrompng($namaSementara); 
                                break; 
                            default: 
                                $image = imagecreatefromjpeg($namaSementara); 
                        } 
                        // simpan foto 
                        $res = imagejpeg($image, $dir.$namaFoto, 1);
    
                        if ($res) {
                            echo "Upload berhasil!<br/>";
                        } else {
                            echo "Upload Gagal!";
                        }
                    }
                }
            }
            else {
                echo "GAGAL MENGUBAH DATA DRIVER";
            }
        }

        public function deleteData($id){
            $id_driver = array(
                '_id' => $id
            );

            $data = $this->model->select($id_driver);
            $foto = '';
            foreach($data as $d){
                $foto = $d['foto_driver'];
            }

            $dir ="../assets/foto_driver/";
            unlink($dir.$foto);

            $this->model->delete($id_driver);
        }

        public function selectData($id = null){
            return $this->model->select($id);
        }
    }

    if (isset($_GET['method'])) {
		require '../Models/ModelDriver.php';
		$control = new ControllerDriver();
		if ($_GET['method'] == "delete") {
			$control->deleteData($_GET['id']);
			echo "<script>
				window.location.href = '../index.php?view=driver'
			</script>";
		}else if ($_GET['method'] == "insert") {
			$control->insertData();
			echo "<script>
				window.location.href = '../index.php?view=driver'
			</script>";
		}else if($_GET['method'] == 'update') {
            $control->updateData($_GET['id']);
			echo "<script>
				window.location.href = '../index.php?view=driver'
			</script>";
        }
	}


?>