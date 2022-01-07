<?php
      require 'Controllers/ControllerPelanggan.php';
      $model = new ControllerPelanggan();
?>
<!DOCTYPE html>
<html>
<head>
   <title>Admin</title>
   <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<nav class="flex items-center justify-between flex-wrap bg-gray-800 p-6 fixed w-full z-10 top-0">
      <div class="flex items-center flex-shrink-0 text-white mr-6">
         <a class="text-white no-underline hover:text-white hover:no-underline" href="#">
            <span class="text-2xl pl-2"><i class="em em-grinning"></i> Gojek - Kelompok 9</span>
         </a>
      </div>

      <div class="block lg:hidden">
         <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
         </button>
      </div>
     <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block pt-6 lg:pt-0" id="nav-content">
         <ul class="list-reset lg:flex justify-end flex-1 items-center">
            <li class="mr-3">
               <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="?view=pelanggan">Penumpang</a>
            </li>
            <li class="mr-3">
               <a class="inline-block py-2 px-4 text-white no-underline " href="?view=gopay">Gopay</a>
            </li>
            <li class="mr-3">
               <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="?view=driver">Driver</a>
            </li>
            <li class="mr-3">
               <a class=" inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="?view=order">Order</a>
            </li>
         </ul>
      </div>
   </nav>
   <div class="container shadow-lg mx-auto bg-white mt-24 md:mt-18 flex">
      <div class="w-4/6 h-5/6 p-8">
         <div class="text-center text-lg mb-4">Data Gopay</div>
            <table class="table w-full border-4">
              <thead class="bg-green-100">
                <tr>
                  <th class="border-2">No</th>
                  <th class="border-2">ID</th>
                  <th class="border-2">Nama User</th>
                  <th class="border-2">Saldo</th>
                  <th class="border-2">Jenis Gopay</th>
                   <th class="border-2">Aksi</th>
                </tr>
                 <tr>
                  <th class="border-2"></th>
                  <th class="border-2"></th>
                  <th class="border-2"></th>
                  <th class="border-2"></th>
                  <th class="border-2"></th>
                   <th class="border-2"></th>
                </tr>
              </thead>
              <tbody>
                   <?php foreach ($model->selectData() as $key => $value) :?>
                     <tr>
                        <td class="border-2"><?= $key+1 ?></td>
                        <td class="border-2 bg-red-100"><?= $value['_id']?></td>
                        <td class="border-2"><?= $value['nama_penumpang']?></td>
                        <td class="border-2"><?= $value['nama_penumpang']?></td>
                        <td class="border-2"><?= $value['no_penumpang']?></td>
                        <td class="border-2 flex">
                           <a class=" mx-auto" href=""><button class="p-2 w-full bg-red-400 hover:bg-green-400">Delete</button></a>
                           <a class=" mx-auto" href=""><button class="p-2 w-full bg-blue-400 hover:bg-green-400">Update</button></a>
                        </td>
                      </tr>
               <?php endforeach; ?>
              </tbody>
           </table>  
         </div>
         <div class="w-2/6 h-5/6 mt-4">
            <?php if (!isset($_GET['update_id'])): ?>
               <form method="POST" action="Controllers/ControllerPelanggan.php?method=insert">
                  <div class="bg-green-100 w-full h-full p-8">
                     <div class="text-center text-lg">Tambah Data</div>
                     <div class="flex flex-col">
                        <div class="w-full flex my-2">
                           <div form="id">ID :</div>
                           <input type="text" name="id" class="ml-auto p-2" required placeholder="ID" >
                        </div>
                        <div class="w-full flex my-2">
                           <div form="id_user" class="">id_user :</div>
                           <input type="text" name="id_user" class="ml-auto p-2" required placeholder="ID USER" >
                        </div>
                        <div class="w-full flex my-2">
                           <div form="Saldo" class="">Saldo Gopay :</div>
                           <input type="text" name="Saldo" class="ml-auto p-2" required placeholder="Saldo Gopay" >
                        </div>
                        <div class="w-full flex my-2">
                           <div form="Jenis Gopay" class="">Jenis Gopay :</div>
                           <input type="text" name="Jenis Gopay" class="ml-auto p-2" required placeholder="Jenis Gopay" >
                        </div>
                        <div class="w-full flex my-2">
                           <button class="mx-auto bg-green-400 p-4 rounded-full">SUBMIT</button>
                        </div>

                     </div>
                  </div>
               </form>
               <?php else :  ?>
               <form method="POST" action="Controllers/ControllerPelanggan.php?method=insert">
                  <div class="bg-green-100 w-full h-full p-8">
                     <div class="text-center text-lg">Tambah Data</div>
                     <div class="flex flex-col">
                        <div class="w-full flex my-2">
                           <div form="id">ID :</div>
                           <input type="text" name="id" class="ml-auto p-2" required placeholder="ID" >
                        </div>
                        <div class="w-full flex my-2">
                           <div form="id_user" class="">id_user :</div>
                           <input type="text" name="id_user" class="ml-auto p-2" required placeholder="id_user" >
                        </div>
                        <div class="w-full flex my-2">
                           <div form="Saldo" class="">Saldo Gopay :</div>
                           <input type="text" name="Saldo" class="ml-auto p-2" required placeholder="Saldo Gopay" >
                        </div>
                        <div class="w-full flex my-2">
                           <div form="Jenis Gopay" class="">Jenis Gopay :</div>
                           <input type="text" name="Jenis Gopay" class="ml-auto p-2" required placeholder="Jenis Gopay" >
                        </div>
                        <div class="w-full flex my-2">
                           <button class="mx-auto bg-green-400 p-4 rounded-full">SUBMIT</button>
                        </div>

                     </div>
                  </div>
               </form>
            <?php endif ?>
         </div>
   </div>
</body>
</html>