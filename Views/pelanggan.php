<?php
      require 'Controllers/ControllerPelanggan.php';
      $coba = new ControllerPelanggan();
?>
<!DOCTYPE html>
<html>
<head>
   <title>Admin</title>
   <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header class="w-full bg-green-700 flex">
   <div class="p-4 font-bold text-lg text-green-100">Dashboard</div>
   <div class="flex p-4 ml-auto">
      <div class="h-full bg-white px-4 mx-2 rounded-full font-semibold">LOGIN</div>
      <div class="h-full text-white px-4 mx-2 rounded-full font-semibold">REGISTER</div>
   </div>
</header>
<div class="w-full h-screen flex">
   <div class="w-1/6 bg-green-700 h-5/6 flex flex-col pr-4">
      <div class="w-full bg-white my-auto p-4 rounded-r-full text-center hover:bg-green-400">Penumpang</div>
      <div class="w-full bg-white my-auto p-4 rounded-r-full text-center hover:bg-green-400">Gopay</div>
      <div class="w-full bg-white my-auto p-4 rounded-r-full text-center hover:bg-green-400">Driver</div>
      <div class="w-full bg-white my-auto p-4 rounded-r-full text-center hover:bg-green-400">Order</div>
   </div>
   <div class="w-5/6 h-5/6 p-8">
      <div>
         <div class="text-center text-lg mb-4">Data Penumpang</div>
         <table class="table-fixed w-full border-4">
           <thead class="bg-green-100">
             <tr>
               <th class="border-2">No</th>
               <th class="border-2">ID</th>
               <th class="border-2">Nama</th>
               <th class="border-2">No Telepon</th>
               <th class="border-2">Foto</th>
               <th class="border-2" colspan="2">lokasi</th>
               <th class="border-2">status</th>
               <th class="border-2">aksi</th>
             </tr>
              <tr>
               <th class="border-2"></th>
               <th class="border-2"></th>
               <th class="border-2"></th>
               <th class="border-2"></th>
               <th class="border-2"></th>
               <th class="border-2" colspan="1">lat</th>
               <th class="border-2" colspan="1">long</th>
               <th class="border-2"></th>
               <th class="border-2"></th>
             </tr>
           </thead>
           <tbody>
                <?php foreach ($coba->selectData() as $key => $value) :?>
                  <tr>
                     <td class="border-2"><?= $key+1 ?></td>
                     <td class="border-2 bg-red-100"><?= $value['_id']?></td>
                     <td class="border-2"><?= $value['nama_penumpang']?></td>
                     <td class="border-2"><?= $value['no_penumpang']?></td>
                     <td class="border-2"><?= $value['foto_penumpang']?></td>
                     <td class="border-2" colspan="1"><?= $value['lokasi_penumpang']['lat']?></td>
                     <td class="border-2" colspan="1"><?= $value['lokasi_penumpang']['long']?></td>
                     <td class="border-2"><?= $value['status_penumpang']?></td>
                     <td class="border-2">
                        <a href="Controllers/ControllerPelanggan.php?method=delete&id=<?= $value['_id']?>"><button class="w-full bg-blue-400 rounded-full hover:bg-green-400">Delete</button></a>
                     </td>
                   </tr>
            <?php endforeach; ?>
           </tbody>
        </table>  
      </div>
      <div class="mt-4">
         <form method="POST" action="Controllers/ControllerPelanggan.php?method=insert">
            <div class="text-center text-lg mb-4">Tambah Data Penumpang</div>
            <table class="table-fixed w-full border-4">
              <thead class="bg-green-100">
                <tr>
                  <th class="border-2">ID (unique)</th>
                  <th class="border-2">Nama</th>
                  <th class="border-2">No Telepon</th>
                  <th class="border-2">Foto</th>
                  <th class="border-2" colspan="2">lokasi</th>
                  <th class="border-2">Status</th>
                  <th class="border-2">aksi</th>
                </tr>
                 <tr>
                  <th class="border-2"></th>
                  <th class="border-2"></th>
                  <th class="border-2"></th>
                  <th class="border-2"></th>
                  <th class="border-2" colspan="1">lat</th>
                  <th class="border-2" colspan="1">long</th>
                  <th class="border-2"></th>
                  <th class="border-2"></th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                     <td ><input class="border-blue-100 border-2 w-full" type="text" placeholder="input" name="id"></td>
                     <td ><input class="border-blue-100 border-2 w-full" type="text" placeholder="input" name="nama"></td>
                     <td ><input class="border-blue-100 border-2 w-full" type="text" placeholder="input" name="no"></td>
                     <td ><input class="border-blue-100 border-2 w-full" type="text" placeholder="input" name="foto"></td>
                     <td ><input class="border-blue-100 border-2 w-full" type="text" placeholder="input" name="lat"></td>
                     <td ><input class="border-blue-100 border-2 w-full" type="text" placeholder="input" name="long"></td>
                     <td ><input class="border-blue-100 border-2 w-full" type="text" placeholder="input" name="status"></td>
                     <td><button class="w-full bg-blue-400 rounded-full hover:bg-green-400">Kirim</button></td>
                  </tr>                 
              </tbody>
            </table>
      </div>
   </div>
</div>
</body>
</html>