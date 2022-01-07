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
               <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="?view=gopay">Gopay</a>
            </li>
            <li class="mr-3">
               <a class="inline-block py-2 px-4 text-white no-underline " href="?view=driver">Driver</a>
            </li>
            <li class="mr-3">
               <a class=" inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="?view=order">Order</a>
            </li>
         </ul>
      </div>
   </nav>
   <div class="container shadow-lg mx-auto bg-white mt-24 md:mt-18 flex">
      <div class="w-4/6 h-5/6 p-8">
         <div class="text-center text-lg mb-4">Data Driver</div>
            <table class="table w-full border-4">
              <thead class="bg-green-100">
                <tr>
                  <th class="border-2">No</th>
                  <th class="border-2">ID</th>
                  <th class="border-2">Nama</th>
                  <th class="border-2">No Telepon</th>
                  <th class="border-2">Foto</th>
                  <th class="border-2">No Plat Kendaraan</th>
                  <th class="border-2">Rating Driver</th>
                  <th class="border-2" colspan="2">lokasi</th>
                  <th class="border-2">aksi</th>
                </tr>
                 <tr>
                  <th class="border-2"></th>
                  <th class="border-2"></th>
                  <th class="border-2"></th>
                  <th class="border-2"></th>
                  <th class="border-2"></th>
                  <th class="border-2"></th>
                  <th class="border-2"></th>
                  <th class="border-2" colspan="1">lat</th>
                  <th class="border-2" colspan="1">long</th>
                  <th class="border-2"></th>
                </tr>
              </thead>
              <tbody>
                   <?php foreach ($model->selectData() as $key => $value) :?>
                     <tr>
                        <td class="border-2"><?= $key+1 ?></td>
                        <td class="border-2 bg-red-100"><?= $value['_id']?></td>
                        <td class="border-2"><?= $value['nama_penumpang']?></td>
                        <td class="border-2"><?= $value['no_penumpang']?></td>
                        <td class="border-2"><?= $value['foto_penumpang']?></td>
                        <td class="border-2"><?= $value['status_penumpang']?></td>
                        <td class="border-2"><?= $value['status_penumpang']?></td>
                        <td class="border-2" colspan="1"><?= $value['lokasi_penumpang']['lat']?></td>
                        <td class="border-2" colspan="1"><?= $value['lokasi_penumpang']['long']?></td>
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
               <form method="POST" action="">
                  <div class="bg-green-100 w-full h-full p-8">
                     <div class="text-center text-lg">Tambah Data</div>
                     <div class="flex flex-col">
                        <div class="w-full flex my-2">
                           <div for="id">ID :</div>
                           <input type="text" name="id" class="ml-auto p-2" required placeholder="ID" >
                        </div>
                        <div class="w-full flex my-2">
                           <div for="nama" class="">Nama :</div>
                           <input type="text" name="nama" class="ml-auto p-2" required placeholder="Nama" >
                        </div>
                        <div class="w-full flex my-2">
                           <div for="no" class="">No Telepon :</div>
                           <input type="text" name="no" class="ml-auto p-2" required placeholder="No Telepon" >
                        </div>
                        <div class="w-full flex my-2">
                           <div for="foto" class="">Foto :</div>
                           <input type="text" name="foto" class="ml-auto p-2" required placeholder="Foto" >
                        </div>
                        <div class="w-full flex my-2">
                           <div for="status" class="">No Plat :</div>
                           <input type="text" name="No Plat" class="ml-auto p-2" required placeholder="No Plat" >
                        </div>
                        <div class="w-full flex my-2">
                           <div for="status" class="">Rating :</div>
                           <input type="text" name="rating" class="ml-auto p-2" required placeholder="rating" >
                        </div>

                        <div class="w-full flex my-2">
                           <div for="lat" class="">Lokasi : </div>
                           <input type="text" name="lat" class="ml-auto p-2" required placeholder="Lat" >
                        </div>
                        <div class="w-full flex my-2">
                           <input type="text" name="long" class="ml-auto p-2" required placeholder="Long" >
                        </div>
                        <div class="w-full flex my-2">
                           <button class="mx-auto bg-green-400 p-4 rounded-full">SUBMIT</button>
                        </div>
                     </div>
                  </div>
               </form>
               <?php else :  ?>
                <form method="POST" action="">
                  <div class="bg-green-100 w-full h-full p-8">
                     <div class="text-center text-lg">Tambah Data</div>
                     <div class="flex flex-col">
                        <div class="w-full flex my-2">
                           <div for="id">ID :</div>
                           <input type="text" name="id" class="ml-auto p-2" required placeholder="ID" >
                        </div>
                        <div class="w-full flex my-2">
                           <div for="nama" class="">Nama :</div>
                           <input type="text" name="nama" class="ml-auto p-2" required placeholder="Nama" >
                        </div>
                        <div class="w-full flex my-2">
                           <div for="no" class="">No Telepon :</div>
                           <input type="text" name="no" class="ml-auto p-2" required placeholder="No Telepon" >
                        </div>
                        <div class="w-full flex my-2">
                           <div for="foto" class="">Foto :</div>
                           <input type="text" name="foto" class="ml-auto p-2" required placeholder="Foto" >
                        </div>
                        <div class="w-full flex my-2">
                           <div for="status" class="">No Plat :</div>
                           <input type="text" name="No Plat" class="ml-auto p-2" required placeholder="No Plat" >
                        </div>
                        <div class="w-full flex my-2">
                           <div for="status" class="">Rating :</div>
                           <input type="text" name="rating" class="ml-auto p-2" required placeholder="rating" >
                        </div>

                        <div class="w-full flex my-2">
                           <div for="lat" class="">Lokasi : </div>
                           <input type="text" name="lat" class="ml-auto p-2" required placeholder="Lat" >
                        </div>
                        <div class="w-full flex my-2">
                           <input type="text" name="long" class="ml-auto p-2" required placeholder="Long" >
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