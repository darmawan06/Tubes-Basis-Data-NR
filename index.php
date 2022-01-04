<?php
   session_start();
   require 'Models/ModelPelanggan.php';
   require 'Controllers/ControllerLogin.php';
   $coba = new ControllerLogin();
?>
<!DOCTYPE html>
<html>
<head>
   <title>Kelompok </title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>

<table border="2">
      <tr>
         <td>nama_penumpang</td>
         <td>no_penumpang</td>
         <td>foto_penumpang</td>
         <td>
            <td>
               lat
               long
            </td>
            
         </td>
         <td>aksi</td>
      </tr>
   <?php foreach ($coba->selectData() as $key => $value) :?>
      <tr>
         <td><?= $value["nama_penumpang"] ?></td>
         <td><?= $value["no_penumpang"] ?></td>
         <td><?= $value["foto_penumpang"] ?></td>
         <td>
            <td>
               <?= $value["lokasi_penumpang"]['lat'] ?>
               <?= $value["lokasi_penumpang"]['long'] ?>
            </td>
            
         </td>
         <td><a href="Controllers/ControllerLogin.php?method=delete&id=<?= $value['_id']?>">delete</a></td>
      </tr>
   <?php endforeach; ?>
</table>

<br>
<br>
<br>
<br>
<form method="POST" action="Controllers/ControllerLogin.php?method=insert">
   <center>
      <h1>INSERT</h1>
      <table border="2" align="center">
            <tr>
               <td>id_penumpang</td>
               <td>nama_penumpang</td>
               <td>no_penumpang</td>
               <td>foto_penumpang</td>
               <td>
                  <td>
                     lat
                  </td>
                  <td>
                     long
                  </td>
                  
               </td>
               <td>aksi</td>
            </tr>

            <tr>
               <td><input type="text" name="id"></td>
               <td><input type="text" name="nama"></td>
               <td><input type="text" name="no"></td>
               <td><input type="text" name="foto"></td>
               <td>
                  <td><input type="text" name="lat"></td>
                  <td><input type="text" name="long"></td>
               </td>
               <td><input type="text" name="status"></td>
               <td><input type="text" name="method" value="insert" hidden></td>
               <td><button>coba</button></td>
            </tr>
      </table>
</center>   
</form>

</body>
</html>