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
                
                    <div class="schedule-table">
                        <table class="table bg-white">
                            <thead>
                                <tr>
                                    <th>Nama Lab</th>
                                    <?php $hari = '' ?>
                                    <?php foreach($range_waktu as $r) : ?>
                                        <th><?= $r['range_waktu']; ?></th>
                                    <?php endforeach ?>

                                </tr>
                            </thead>
                            <tbody>
                                    <?php foreach($jadwal as $j) : ?>

                                <?php if($j['id_laboratorium'] == 00001) : ?>
                                    
                                <tr>
                                    <td class="day"><?= date("l", strtotime($j['tanggal_penggunaan'])); ?><br><?=$j['tanggal_penggunaan']?></td>
                                    
                                    <?php if($j['J_07_00_09_00'] == 1) : ?>
                                        <td class="active">
                                        <h4><?= $j['nama_kegiatan'];?></h4>
                                        <p><?= $j['prodi'];?></p>
                                            <div class="hover">
                                                <h4><?= $j['nama_kegiatan'];?></h4>
                                                <p><?= $j['prodi'];?></p>
                                                <span><?= $j['tanggal_penggunaan'];?></span>
                                            </div>
                                        </td>

                                    <?php else : ?>
                                        <td></td>

                                    <?php endif; ?>

                                        

                                    <?php if($j['J_09_00_11_00'] == 1) : ?>
                                        <td class="active">
                                        <h4><?= $j['nama_kegiatan'];?></h4>
                                        <p><?= $j['prodi'];?></p>
                                            <div class="hover">
                                                <h4><?= $j['nama_kegiatan'];?></h4>
                                                <p><?= $j['prodi'];?></p>
                                                <span><?= $j['tanggal_penggunaan'];?></span>
                                            </div>
                                        </td>
                                        
                                    <?php else : ?>
                                        <td></td>

                                    <?php endif; ?>

                                    <?php if($j['J_11_00_13_00'] == 1) : ?>
                                        <td class="active">
                                        <h4><?= $j['nama_kegiatan'];?></h4>
                                        <p><?= $j['prodi'];?></p>
                                            <div class="hover">
                                                <h4><?= $j['nama_kegiatan'];?></h4>
                                                <p><?= $j['prodi'];?></p>
                                                <span><?= $j['tanggal_penggunaan'];?></span>
                                            </div>
                                        </td>
                                        
                                    <?php else : ?>
                                        <td></td>

                                    <?php endif; ?>

                                    
                                    <?php if($j['J_13_00_15_00'] == 1) : ?>
                                        <td class="active">
                                        <h4><?= $j['nama_kegiatan'];?></h4>
                                        <p><?= $j['prodi'];?></p>
                                            <div class="hover">
                                                <h4><?= $j['nama_kegiatan'];?></h4>
                                                <p><?= $j['prodi'];?></p>
                                                <span><?= $j['tanggal_penggunaan'];?></span>
                                            </div>
                                        </td>
                                        
                                    <?php else : ?>
                                        <td></td>

                                    <?php endif; ?>



                                    <?php if($j['J_15_00_17_00'] == 1) : ?>
                                        <td class="active">
                                        <h4><?= $j['nama_kegiatan'];?></h4>
                                        <p><?= $j['prodi'];?></p>
                                            <div class="hover">
                                                <h4><?= $j['nama_kegiatan'];?></h4>
                                                <p><?= $j['prodi'];?></p>
                                                <span><?= $j['tanggal_penggunaan'];?></span>
                                            </div>
                                        </td>
                                        
                                    <?php else : ?>
                                        <td></td>

                                    <?php endif; ?>

                                </tr>
                                    <?php $hari = $j['tanggal_penggunaan'];  ?>
                                <?php endif ?>

                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>
    </div>
    <style type="text/css">
        body{margin-top:20px;}
        .schedule-table table thead tr {
        background: #86d4f5;
        }
        .schedule-table table thead th {
        padding: 10px 10px;
        color: #fff;
        text-align: center;
        font-size: 14px;
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
        font-size: 14px;
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
        font-size: 14px;
        margin-bottom: 5px;
        }
        .schedule-table table tbody td.active p {
        font-size: 14px;
        line-height: normal;
        margin-bottom: 0;
        }
        .schedule-table table tbody td .hover h4 {
        font-weight: 700;
        font-size: 14px;
        color: #ffffff;
        margin-bottom: 5px;
        }
        .schedule-table table tbody td .hover p {
        font-size: 14px;
        margin-bottom: 5px;
        color: #ffffff;
        line-height: normal;
        }
        .schedule-table table tbody td .hover span {
        color: #ffffff;
        font-weight: 600;
        font-size: 14px;
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
        font-size: 18px;
        }
        .schedule-table table tbody td.active p {
        font-size: 15px;
        }
        .schedule-table table tbody td.day {
        font-size: 20px;
        }
        .schedule-table table tbody td .hover {
        padding: 15px 0;
        }
        .schedule-table table tbody td .hover span {
        font-size: 17px;
        }
        }
        @media screen and (max-width: 991px) {
        .schedule-table table thead th {
        font-size: 18px;
        padding: 20px;
        }
        .schedule-table table tbody td.day {
        font-size: 18px;
        }
        .schedule-table table tbody td.active h4 {
        font-size: 17px;
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
        font-size: 16px;
        }
        .schedule-table table tbody td.active p {
        font-size: 14px;
        }
        .schedule-table table tbody td .hover {
        padding: 10px 0;
        }
        .schedule-table table tbody td.day {
        font-size: 18px;
        }
        .schedule-table table tbody td .hover span {
        font-size: 15px;
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


<?php foreach($jadwal2 as $j) : ?>
    <?php
        $date = $j['tanggal_penggunaan'];
        $id_range_waktu = $j['id_range_waktu'];
        $tgl = date('Y_m_d', strtotime(str_replace('-', '/', $date)));
        
        $gabung = $tgl.'_'.$id_range_waktu;
    ?>
<?php endforeach ?>
