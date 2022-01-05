<?php
   require 'Models/ModelPelanggan.php';
?>

<?php
   if (isset($_GET['view'])) {
      include "Views/{$_GET['view']}.php";
   }else{
      include "Views/pelanggan.php";
   }
?>