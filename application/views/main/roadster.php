<!-- Begin Page Content -->


<div class="container mt-4">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="calender">
            <div class="w-95 w-md-75 w-lg-60 w-xl-55 mx-auto mb-6 text-center">
                <h3 class="display-18 display-md-16 display-lg-12 mb-2">Timeline Peminjaman Ruangan</h3>
            </div>
            <div class="row">

                <div class="col-xl-12">
                                        
                    <div class="row mb-2">
                        <form action="<?=base_url()?>main/roadster" method="get">
                            <div class="col-lg-3">
                                <!-- <label class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" name="tanggal_mulai"> -->
                                <select name="mingguPerkuliahan" id="mingguPerkuliahan" class="form-control">
                                        <option value="">Pilih minggu perkuliahan...</option>
                                    <?php foreach($minggukuliah as $mk) : ?>
                                        <option value="<?= $mk['id'] ?>"><?=$mk['nama_minggu']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <!-- <label class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control" name="tanggal_selesai"> -->
                                <button class="btn btn-secondary mt-2" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>

                <div class="view">
                    <div class="schedule-table" id="table" style="border-radius:7px;">
                        <table class="table" id="tabel">
                        <thead style="position: sticky; top: 0px; z-index: 99;">
                            <tr>
                                <?php $libur = 0;?>
                                <th colspan="1" rowspan="2" scope="colgroup" class="sticky-col first-col" style="font-size: 12pt;">Nama Lab</th>
                                <?php foreach($tgl as $k) : ?>
                                    <?php  $hari = date("l", strtotime($k)); ?>
                                    <?php if($hari == 'Monday') : ?>
                                        <th colspan="<?=$colspan?>" scope="colgroup">
                                            <?php $timestamp = strtotime($k); $new_date = date("d-m-Y", $timestamp); echo 'Senin, ',$new_date; ?>
                                        </th>
                                    <?php elseif($hari == 'Tuesday') : ?>
                                        <th colspan="<?=$colspan?>" scope="colgroup">
                                            <?php $timestamp = strtotime($k); $new_date = date("d-m-Y", $timestamp); echo 'Selasa, ',$new_date; ?>
                                        </th>
                                    <?php elseif($hari == 'Wednesday') : ?>
                                        <th colspan="<?=$colspan?>" scope="colgroup">
                                            <?php $timestamp = strtotime($k); $new_date = date("d-m-Y", $timestamp); echo 'Rabu, ',$new_date; ?>
                                        </th>
                                    <?php elseif($hari == 'Thursday') : ?>
                                        <th colspan="<?=$colspan?>" scope="colgroup">
                                            <?php $timestamp = strtotime($k); $new_date = date("d-m-Y", $timestamp); echo 'Kamis, ',$new_date; ?>
                                        </th>
                                    <?php elseif($hari == 'Friday') : ?>
                                        <th colspan="<?=$colspan?>" scope="colgroup">
                                            <?php $timestamp = strtotime($k); $new_date = date("d-m-Y", $timestamp); echo 'Jumat, ',$new_date; ?>
                                        </th>
                                    
                                    <?php else : ?>
                                        <?php $libur++; ?>
                                    <?php endif ?>
                                    
                                
                                <?php endforeach ?>
                            </tr>

                            <tr>
                                <?php $jmlh_tgl = count($tgl) - $libur; ?>
                                <?php for($i=0; $i<$jmlh_tgl; $i++) : ?>
                                    <?php foreach($range_waktu as $r) : ?>
                                        <th scope="col"><?= $r['range_waktu']; ?></th>
                                    <?php endforeach ?>
                                <?php endfor ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($query as $q=> $value) : ?>
                            <tr>
                                <td class="sticky-col first-col" style="background-color:#86d4f5; font-size:10pt;"><b><?= $value['nama_lab'] ?></b></td>
                                
                                <?php foreach ($td as $t) : ?>
                                    <?php if($value[$t['periode']]) : ?>
                                        <td class="active">
                                            <h4><?=$value[$t['periode']]?></h4>
                                        </td>
                                    <?php else : ?>
                                        <td></td>
                                    <?php endif ?>
                                <?php endforeach ?>
                                
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        </table>
                    </div>
                </div>
                    
                    <div id="result"></div>
                </div>
            </div>
    </div>



<script>

    function filterWeek(){
        var getData = document.getElementById('filterMinggu').value;
        var num = 1975;

        for(i=1; i<=16; i++){
            if(getData == (i)){
                if(getData == 1){
                    document.getElementById('table').scrollLeft += 8175;
                }else{
                    document.getElementById('table').scrollLeft += num;
                }
            }else if(getData == 'none'){
                location.reload();
            }
            
        }
    }


</script>



<style>
.schedule-table {
  position: relative;
  overflow-y: auto; 
  height: 650px;

  overflow-x: scroll;
  /* white-space: nowrap; */
}



.sticky-col {
  position: -webkit-sticky;
  position: sticky;
  background-color: #86d4f5;
}

.first-col {
  width: 200px;
  min-width: 100px;
  max-width: 200px;
  left: 0px;
  z-index: 99;
}

body{}
        .schedule-table table thead tr {
        background: #86d4f5;
        }
        .schedule-table table thead th {
        padding: 10px 10px;
        color: #000;
        text-align: center;
        font-size: 12px;
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
        color: #000000;
        margin-bottom: 5px;
        }
        .schedule-table table tbody td .hover p {
        font-size: 10px;
        margin-bottom: 5px;
        color: #000000;
        line-height: normal;
        }
        .schedule-table table tbody td .hover span {
        color: #000000;
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
        color: #000;
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
