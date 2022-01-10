<?php
      require 'Controllers/ControllerOrder.php';
      require 'Controllers/ControllerPelanggan.php';
      require 'Controllers/ControllerDriver.php';
      $model = new ControllerOrder();
      $modelPenumpang = new ControllerPelanggan();
      $modelDriver = new ControllerDriver();
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
               <a class=" inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="?view=gopay">Gopay</a>
            </li>
            <li class="mr-3">
               <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="?view=driver">Driver</a>
            </li>
            <li class="mr-3">
               <a class="inline-block py-2 px-4 text-white no-underline " href="?view=order">Order</a>
            </li>
         </ul>
      </div>
   </nav>
   <div class="container-fluid shadow-lg mx-auto bg-white mt-24 md:mt-18 flex-row">
      <div class="w-full h-5/6 p-8 mx-auto">
         <div class="text-center text-lg mb-4">Data Order</div>
            <table class="table w-full border-4 text-sm ">
              <thead class="bg-green-100">
                <tr>
                  <th class="border-2" rowspan="3">No</th>
                  <th class="border-2" rowspan="3">ID</th>
                  <th class="border-2" rowspan="3">ID Penumpang</th>
                  <th class="border-2" rowspan="3">ID Driver</th>
                  <th class="border-2" colspan="6">Perjalanan</th>
                  <th class="border-2" rowspan="3">Waktu Order</th>
                  <th class="border-2" rowspan="3">Status Order</th>
                  <th class="border-2" rowspan="3">Rating Perjalanan</th>
                  <th class="border-2" rowspan="3">Jumlah XP</th>
                  <th class="border-2" rowspan="3">Metode Pembayaran</th>
                  <th class="border-2" colspan="2" rowspan="3">Aksi</th>
                </tr>
            <tr>
               <th class="border-2" colspan="2">Lokasi Jemput</th>
               <th class="border-2" colspan="2">Lokasi Tujuan</th>
               <th class="border-2" colspan="1" rowspan="2">Jarak</th>
               <th class="border-2" colspan="1" rowspan="2">Biaya</th>
             </tr>
             <tr>
               <th class="border-2" colspan="1">lat</th>
               <th class="border-2" colspan="1">long</th>
               <th class="border-2" colspan="1">lat</th>
               <th class="border-2" colspan="1">long</th>
             </tr>
              </thead>
              <tbody>
                  <?php foreach ($model->selectData() as $key => $value) :?>
                  <tr>
                     <td class="border-2"><?= $key+1 ?></td>
                     <td class="border-2 bg-red-100"><?= $value['_id']?></td>
                     <td class="border-2 bg-red-100"><?= $value['id_penumpang']?></td>
                     <td class="border-2 bg-red-100"><?= $value['id_driver']?></td>
                     <td class="border-2" colspan="1"><?= $value['perjalanan']['lokasi_jemput']['lat']?></td>
                     <td class="border-2" colspan="1"><?= $value['perjalanan']['lokasi_jemput']['long']?></td>
                     <td class="border-2" colspan="1"><?= $value['perjalanan']['lokasi_tujuan']['lat']?></td>
                     <td class="border-2" colspan="1"><?= $value['perjalanan']['lokasi_tujuan']['long']?></td>
                     <td class="border-2" colspan="1"><?= $value['perjalanan']['jarak']?></td>
                     <td class="border-2" colspan="1"><?= $value['perjalanan']['biaya']?></td>
                     <td class="border-2"><?= $value['waktu_order']?></td>
                     <td class="border-2"><?= $value['status_order']?></td>
                     <td class="border-2"><?= $value['rating_perjalanan']?></td>
                     <td class="border-2"><?= $value['jumlah_xp']?></td>
                     <td class="border-2"><?= $value['metode_pembayaran']?></td>
                      <td class="border-2 flex">
                           <a class=" mx-auto" href="Controllers/ControllerOrder.php?method=delete&id=<?= $value['_id']?>"><button class="p-2 w-full bg-red-400 hover:bg-green-400">Delete</button></a>
                           <a class=" mx-auto" href="index.php?view=order&update_id=<?=  $value['_id']?>"><button class="p-2 w-full bg-blue-400 hover:bg-green-400">Update</button></a>
                     </td>
                   </tr>
            <?php endforeach; ?>
              </tbody>
           </table>  
         <span><i><br>*Saat melakukan insert maka data saldo gopay penumpang berkurang dan saldo gopay driver akan bertambah, saat melakukan update saldo penumpang akan di kembalikan ke awal (biaya order + saldo penumpang) dan saldo driver akan di kembalikan ke awal (biaya order - saldo driver), jika saldo sudah kembali ke awal lalu di hitung kembali seperti insert data </i></span>
         <span><i><br>*Jika Saldo Penumpang tidak cukup maka status order akan 'Gagal Pembayaran' dan saldo tidak akan bertambah atau berkurang</i></span>
      </div>
      <div class="w-full h-5/6 mt-4">
         <?php if (!isset($_GET['update_id'])): ?>
            <form method="POST" class="flex" action="Controllers/ControllerOrder.php?method=insert">
               <div class="bg-green-100 w-2/6 mx-auto h-full p-8">
                  <div class="text-center text-lg">Tambah Data Order</div>
                  <div class="flex flex-col">

                     <div class="w-full flex my-2">
                        <div form="ID Penumpang" class="">ID Penumpang :</div>
                        <select name="idPenumpang" class="ml-auto p-2 w-60 bg-white" required>
                           <option value="" selected="selected">Pilih Penumpang</option>
                           <?php foreach ($modelPenumpang->selectData(NULL) as $key => $value):?>
                              <option value="<?= $value['_id'] ?>"><?= $value['_id'] ?>/<?= $value['nama'] ?></option>
                           <?php endforeach?>
                        </select>
                     </div>
                     <div class="w-full flex my-2">
                        <div form="ID Driver" class="">ID Driver</div>
                           <select name="idDriver" class="ml-auto p-2 w-60 bg-white" required>
                           <option value="" selected="selected">Pilih Driver</option>
                           <?php foreach ($modelDriver->selectData(NULL) as $key => $value):?>
                              <option value="<?= $value['_id'] ?>"><?= $value['_id'] ?>/<?= $value['nama_driver'] ?></option>
                           <?php endforeach?>
                           </select>
                     </div>
                     <div class="w-full flex my-2">
                        <div form="waktu" class="">Waktu Order :</div>
                        <input type="text" name="waktu" class="ml-auto p-2" required placeholder="Waktu" >
                     </div>
                     <div class="w-full flex my-2">
                        <div form="Rating" class="">Rating Perjalanan : </div>
                        <input type="text" name="rating" class="ml-auto p-2" required placeholder="Rating" >
                     </div>
                     <div class="w-full flex my-2">
                        <div form="Jumlah XP" class="">Jumlah XP: </div>
                        <input type="text" name="xp" class="ml-auto p-2" required placeholder="Jumlah XP" >
                     </div>

                     <div class="w-full flex my-2">
                        <div form="Metode Pembayaran" class="">Metode Pembayaran :</div>
                        <input type="text" name="metode" class="ml-auto p-2" required placeholder="metode" >
                     </div>
                  </div>
               </div>
               <div class="bg-green-100 w-2/6 mx-auto h-full p-8">
                  <div class="text-center text-lg">Tambah Data Perjalanan</div>
                     <div class="flex flex-col">
                        <div class="w-full flex my-2">
                           <div form="Lokasi Jemput">Lokasi Jemput :</div>
                           <input type="text" name="latJemput" class="ml-auto p-2" required placeholder="lat_jemput" >
                        </div>
                        <div class="w-full flex my-2">
                            <input type="text" name="longJemput" class="ml-auto p-2" required placeholder="long_jemput" >
                        </div>
                        <div class="w-full flex my-2">
                           <div form="Lokasi Tujuan">Lokasi Tujuan :</div>
                           <input type="text" name="latTujuan" class="ml-auto p-2" required placeholder="lat_tujuan" >
                        </div>
                        <div class="w-full flex my-2">
                            <input type="text" name="longTujuan" class="ml-auto p-2" required placeholder="long_tujuan" >
                        </div>
                        <div class="w-full flex my-2">
                           <div form="Jarak" class="">Jarak</div>
                           <input type="text" name="jarak" class="ml-auto p-2" required placeholder="jarak" >
                        </div>
                        <div class="w-full flex my-2">
                           <div form="biaya" class="">Biaya :</div>
                           <input type="text" name="biaya" class="ml-auto p-2" required placeholder="biaya" >
                        </div>
                        <div class="w-full flex my-2">
                           <button class="mx-auto bg-green-400 p-4 rounded-full">SUBMIT</button>
                        </div>
                     </div>
                  </div>
            </form>
            <?php else :  ?>
               <?php $data = $model->selectDataByID($_GET['update_id']); ?>
                  <form method="POST" class="flex" action="Controllers/ControllerOrder.php?method=update">
                     <div class="bg-green-100 w-2/6 mx-auto h-full p-8">
                        <div class="text-center text-lg">Update Data</div>
                        <div class="flex flex-col">
                           <div class="w-full flex my-2">
                              <div form="id">ID :</div>
                              <input type="text" name="id" class="ml-auto p-2" value="<?= $data['_id'] ?>" readonly required placeholder="ID" >
                           </div>
                           <div class="w-full flex my-2">
                              <div form="ID Penumpang" class="">ID Penumpang :</div>
                               <select name="idPenumpang" class="ml-auto p-2 w-60 bg-white">
                                    <?php foreach ($modelPenumpang->selectData(NULL) as $key => $value):?>
                                       <?php if($value['_id'] == $data['id_penumpang']) :?>
                                          <option value="<?= $value['_id'] ?>" selected='selected'><?= $value['_id'] ?>/<?= $value['nama'] ?></option>
                                       <?php else:?>
                                          <option value="<?= $value['_id'] ?>" ><?= $value['_id'] ?>/<?= $value['nama'] ?></option>
                                       <?php endif ?>
                                    <?php endforeach?>
                                 </select>
                           </div>
                           <div class="w-full flex my-2">
                              <div form="ID Driver" class="">ID Driver</div>
                               <select name="idDriver" class="ml-auto p-2 w-60 bg-white">
                                    <?php foreach ($modelDriver->selectData(NULL) as $key => $value):?>
                                       <?php if($value['_id'] == $data['id_driver']) :?>
                                          <option value="<?= $value['_id'] ?>" selected='selected'><?= $value['_id'] ?>/<?= $value['nama_driver'] ?></option>
                                       <?php else:?>
                                          <option value="<?= $value['_id'] ?>" ><?= $value['_id'] ?>/<?= $value['nama'] ?></option>
                                       <?php endif ?>
                                    <?php endforeach?>
                                 </select>
                           </div>
                           <div class="w-full flex my-2">
                              <div form="waktu" class="">Waktu Order :</div>
                              <input type="text" name="waktu" class="ml-auto p-2" value="<?= $data['waktu_order'] ?>" required placeholder="Waktu" >
                           </div>
                           <div class="w-full flex my-2">
                              <div form="Rating" class="">Rating Perjalanan : </div>
                              <input type="text" name="rating" class="ml-auto p-2" value="<?= $data['rating_perjalanan'] ?>" required placeholder="Rating" >
                           </div>
                           <div class="w-full flex my-2">
                              <div form="Jumlah XP" class="">Jumlah XP: </div>
                              <input type="text" name="xp" class="ml-auto p-2" value="<?= $data['jumlah_xp'] ?>" required placeholder="Jumlah XP" >
                           </div>

                           <div class="w-full flex my-2">
                              <div form="Metode Pembayaran" class="">Metode Pembayaran :</div>
                              <input type="text" name="metode" class="ml-auto p-2" value="<?= $data['metode_pembayaran'] ?>" required placeholder="metode" >
                           </div>
                        </div>
                     </div>

                     <div class="bg-green-100 w-2/6 mx-auto h-full p-8">
                        <div class="text-center text-lg">Update Data Perjalanan</div>
                           <div class="flex flex-col">
                              <div class="w-full flex my-2">
                                 <div form="Lokasi Jemput">Lokasi Jemput :</div>
                                 <input type="text" name="latJemput" class="ml-auto p-2" value="<?= $data['perjalanan']['lokasi_jemput']['lat'] ?>" required placeholder="lat_jemput" >
                              </div>
                              <div class="w-full flex my-2">
                                 <input type="text" name="longJemput" class="ml-auto p-2" value="<?= $data['perjalanan']['lokasi_jemput']['long'] ?>" required placeholder="long_jemput" >
                              </div>
                              <div class="w-full flex my-2">
                                 <div form="Lokasi Tujuan">Lokasi Tujuan :</div>
                                 <input type="text" name="latTujuan" class="ml-auto p-2" value="<?= $data['perjalanan']['lokasi_tujuan']['lat'] ?>" required placeholder="lat_tujuan" >
                              </div>
                              <div class="w-full flex my-2">
                                 <input type="text" name="longTujuan" class="ml-auto p-2" value="<?= $data['perjalanan']['lokasi_tujuan']['long'] ?>" required placeholder="long_tujuan" >
                              </div>
                              <div class="w-full flex my-2">
                                 <div form="Jarak" class="">Jarak</div>
                                 <input type="text" name="jarak" class="ml-auto p-2" value="<?= $data['perjalanan']['jarak'] ?>" required placeholder="jarak" >
                              </div>
                              <div class="w-full flex my-2">
                                 <div form="biaya" class="">Biaya :</div>
                                 <input type="text" name="biaya" class="ml-auto p-2" value="<?= $data['perjalanan']['biaya'] ?>" required placeholder="biaya" >
                              </div>
                              <div class="w-full flex my-2">
                                 <a href="index.php?view=order" class="mx-auto p-4 text-blue-800">Tambah Data</a>
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