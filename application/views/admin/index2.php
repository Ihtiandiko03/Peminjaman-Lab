<!-- Begin Page Content -->


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="calender">
            <div class="w-95 w-md-75 w-lg-60 w-xl-55 mx-auto mb-6 text-center">
                <h3 class="display-18 display-md-16 display-lg-12 mb-2">Timeline Peminjaman Ruangan</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                
                    <div class="schedule-table" style="overflow-x:auto;">
                        <table class="table bg-white">
                            <thead>
                                <tr>
                                        <th colspan="1" rowspan="2" scope="colgroup">Nama Lab</th>
                                        <?php foreach($kirim as $k) : ?>
                                            <th colspan="5" scope="colgroup"><?=date("l", strtotime($k))?>, <?php $timestamp = strtotime($k); $new_date = date("d-m-Y", $timestamp); echo $new_date;  ?></th>
                                        <?php endforeach ?>

                                </tr>
                                <tr>
                                    <?php for($i=0; $i<=153; $i++) : ?>
                                    <?php foreach($range_waktu as $r) : ?>
                                        <th scope="col"><?= $r['range_waktu']; ?></th>
                                    <?php endforeach ?>

                                    <?php endfor ?>
                                
                                </tr>
                            </thead>


                            <tbody>

                                <?php foreach($jadwal as $j) : ?>
                                        <!-- KALO GAK DISINI -->
                                       
                                    <tr>
                                        <td><?= $j['nama_lab'] ?></td>



                                        <?php for($i=0; $i<=21; $i++) : ?>
                                        <?php foreach($jadwal2 as $j2) : ?>
                                            <!-- ATAU DISINI -->

                                            <?php if($j2['id_laboratorium'] == $j['id_laboratorium']) : ?>
                                                <!-- DISINI JUGA DICEK -->
                                                <?php if($j['tanggal_penggunaan'] == $j2['tanggal_penggunaan']) : ?>
                                                    <!-- NAH TERAKHIR CEK DISINI -->


                                                    <!-- SENIN -->
                                                    <?php if($j['Senin_J_07_00_09_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Senin_J_09_00_11_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Senin_J_11_00_13_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Senin_J_13_00_15_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Senin_J_15_00_17_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    
                                                    <!-- SELASA -->
                                                    <?php if($j['Selasa_J_07_00_09_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Selasa_J_09_00_11_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Selasa_J_11_00_13_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Selasa_J_13_00_15_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Selasa_J_15_00_17_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>


                                                    <!-- RABU -->
                                                    <?php if($j['Rabu_J_07_00_09_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Rabu_J_09_00_11_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Rabu_J_11_00_13_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Rabu_J_13_00_15_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Rabu_J_15_00_17_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <!-- KAMIS -->
                                                    <?php if($j['Kamis_J_07_00_09_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Kamis_J_09_00_11_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Kamis_J_11_00_13_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Kamis_J_13_00_15_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Kamis_J_15_00_17_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <!-- JUMAT -->
                                                    <?php if($j['Jumat_J_07_00_09_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Jumat_J_09_00_11_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Jumat_J_11_00_13_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Jumat_J_13_00_15_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Jumat_J_15_00_17_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <!-- SABTU -->
                                                    <?php if($j['Sabtu_J_07_00_09_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Sabtu_J_09_00_11_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Sabtu_J_11_00_13_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Sabtu_J_13_00_15_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Sabtu_J_15_00_17_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <!-- MINGGU -->
                                                    <?php if($j['Minggu_J_07_00_09_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Minggu_J_09_00_11_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Minggu_J_11_00_13_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Minggu_J_13_00_15_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>

                                                    <?php if($j['Minggu_J_15_00_17_00'] == 1) : ?>
                                                        <td class="active" style="background-color: #76eac4;">
                                                                <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                    <p><?= $j2['prodi'];?></p>
                                                                        <div class="hover">
                                                                            <h4><?= $j2['nama_kegiatan'];?></h4>
                                                                            <p><?= $j2['prodi'];?></p>
                                                                            <p><?= $j2['kapasitas'];?> orang</p>
                                                                            <span><?= $j2['tanggal_penggunaan'];?></span>
                                                                        </div>
                                                        </td>
                                                        <?php else : ?>
                                                            <td></td>
                                                    <?php endif ?>
                                                
                                                <?php endif ?>
                                                
                                                
                                                
                                            <?php endif ?>
                                        <?php endforeach ?>

                                        <?php endfor ?>
                                                




                                    </tr>
                                        
                                <?php endforeach ?>
                                
   
                            </tbody>



                        </table>
                    </div>



                </div>
            </div>
    </div>




    <style type="text/css">
        body{}
        .schedule-table table thead tr {
        background: #86d4f5;
        }
        .schedule-table table thead th {
        padding: 10px 10px;
        color: #fff;
        text-align: center;
        font-size: 10px;
        font-weight: 800;
        position: relative;
        border: 0;
        }
        .schedule-table table thead th:before {
        content: "";
        width: 3px;
        height: 35px;
        background: rgba(255, 255, 255, 0.2);
        position: absolute;
        right: -1px;
        top: 50%;
        transform: translateY(-50%);
        }
        .schedule-table table thead th.last:before {
        content: none;
        }
        .schedule-table table tbody td {
        vertical-align: middle;
        border: 1px solid #e2edf8;
        font-weight: 500;
        padding: 10px;
        text-align: center;
        }
        .schedule-table table tbody td.day {
        font-size: 10px;
        font-weight: 600;
        background: #f0f1f3;
        border: 1px solid #e4e4e4;
        position: relative;
        transition: all 0.3s linear 0s;
        min-width: 50px;
        }
        .schedule-table table tbody td.active {
        position: relative;
        z-index: 10;
        transition: all 0.3s linear 0s;
        min-width: 50px;
        background-color : lightblue;
        }
        .schedule-table table tbody td.active h4 {
        font-weight: 700;
        color: #000;
        font-size: 10px;
        margin-bottom: 5px;
        }
        .schedule-table table tbody td.active p {
        font-size: 10px;
        line-height: normal;
        margin-bottom: 0;
        }
        .schedule-table table tbody td .hover h4 {
        font-weight: 700;
        font-size: 10px;
        color: #ffffff;
        margin-bottom: 5px;
        }
        .schedule-table table tbody td .hover p {
        font-size: 10px;
        margin-bottom: 5px;
        color: #ffffff;
        line-height: normal;
        }
        .schedule-table table tbody td .hover span {
        color: #ffffff;
        font-weight: 600;
        font-size: 10px;
        }
        .schedule-table table tbody td.active::before {
        position: absolute;
        content: "";
        min-width: 100%;
        min-height: 100%;
        transform: scale(0);
        top: 0;
        left: 0;
        z-index: -1;
        border-radius: 0.25rem;
        transition: all 0.3s linear 0s;
        }
        .schedule-table table tbody td .hover {
        position: absolute;
        left: 50%;
        top: 50%;
        width: 120%;
        height: 120%;
        transform: translate(-50%, -50%) scale(0.8);
        z-index: 99;
        background: #86d4f5;
        border-radius: 0.25rem;
        padding: 25px 0;
        visibility: hidden;
        opacity: 0;
        transition: all 0.3s linear 0s;
        }
        .schedule-table table tbody td.active:hover .hover {
        transform: translate(-50%, -50%) scale(1);
        visibility: visible;
        opacity: 1;
        }
        .schedule-table table tbody td.day:hover {
        background: #86d4f5;
        color: #fff;
        border: 1px solid #86d4f5;
        }
        @media screen and (max-width: 1199px) {
        .schedule-table {
        display: block;
        width: 100%;
        overflow-x: auto;
        }
        .schedule-table table thead th {
        padding: 25px 40px;
        }
        .schedule-table table tbody td {
        padding: 20px;
        }
        .schedule-table table tbody td.active h4 {
        font-size: 10px;
        }
        .schedule-table table tbody td.active p {
        font-size: 10px;
        }
        .schedule-table table tbody td.day {
        font-size: 10px;
        }
        .schedule-table table tbody td .hover {
        padding: 15px 0;
        }
        .schedule-table table tbody td .hover span {
        font-size: 10px;
        }
        }
        @media screen and (max-width: 991px) {
        .schedule-table table thead th {
        font-size: 10px;
        padding: 20px;
        }
        .schedule-table table tbody td.day {
        font-size: 10px;
        }
        .schedule-table table tbody td.active h4 {
        font-size: 10px;
        }
        }
        @media screen and (max-width: 767px) {
        .schedule-table table thead th {
        padding: 15px;
        }
        .schedule-table table tbody td {
        padding: 15px;
        }
        .schedule-table table tbody td.active h4 {
        font-size: 10px;
        }
        .schedule-table table tbody td.active p {
        font-size: 10px;
        }
        .schedule-table table tbody td .hover {
        padding: 10px 0;
        }
        .schedule-table table tbody td.day {
        font-size: 10px;
        }
        .schedule-table table tbody td .hover span {
        font-size: 10px;
        }
        }
        @media screen and (max-width: 575px) {
        .schedule-table table tbody td.day {
        min-width: 135px;
        }
        }
    </style>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
