<?php
   require 'Models/ModelPelanggan.php';
   require 'Models/ModelDriver.php';
?>

<?php
   if (isset($_GET['view'])) {
      include "Views/{$_GET['view']}.php";
   }else{
      include "Views/pelanggan.php";
   }
?>