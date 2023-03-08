<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
    <?php foreach ($detailPeminjaman as $p) : ?>
        <div class="col-lg-6">

            <table class=" table table-hover">
                
                <tbody>
                        <tr>
                            <th scope="col">Nama</th>
                            <td><?= $p['nama']; ?></td>
                        </tr>

                        <tr>
                            <th scope="col">NRK</th>
                            <td><?= $p['nrk']; ?></td>
                        </tr>

                        <tr>
                            <th scope="col">Program Studi</th>
                            <td><?= $p['prodi']; ?></td>
                        </tr>

                        <tr>
                            <th scope="col">Nomor Telpon</th>
                            <td><?= $p['notlp']; ?></td>
                        </tr>

                        <tr>
                            <th scope="col">Email</th>
                            <td><?= $p['email']; ?></td>
                        </tr>

                        <tr>
                            <th scope="col">Tanggal Peminjaman</th>
                            <?php foreach ($mingguKuliah as $mk) : ?>
                                <?php if($p['tanggal_penggunaan'] >= $mk['tgl_mulai'] && $p['tanggal_penggunaan'] <= $mk['tgl_selesai']) : ?>
                                    <td><?php $timestamp = strtotime($p['tanggal_penggunaan']); $new_date = date("d-m-Y", $timestamp); echo $mk['nama_minggu'].', '.$new_date;  ?></td>
                                <?php endif?>
                            <?php endforeach ?>
                        </tr>

                        <tr>
                            <th scope="col">Jumlah Peserta</th>
                            <td><?= $p['kapasitas']; ?></td>
                        </tr>

                        <tr>
                            <th scope="col">Jam</th>
                            <td><?= $p['range_waktu']; ?></td>
                        </tr>

                        <tr>
                            <th scope="col">Nama Kegiatan</th>
                            <td><?= $p['nama_kegiatan']; ?></td>
                        </tr>

                        <tr>
                            <th scope="col">Status</th>
                            <?php if($p['status'] == 'request') : ?>
                                <td> <b class="badge badge-warning"><?= $p['status']; ?></b></td>
                            <?php elseif($p['status'] == 'done') : ?>
                                <td> <b class="badge badge-success"><?= $p['status']; ?></b></td>
                            <?php elseif($p['status'] == 'reject') : ?>
                                <td> <b class="badge badge-danger"><?= $p['status']; ?></b></td>
                            <?php endif ?>
                        </tr>

                        <tr>
                            <th scope="col">Ruangan Lab</th>
                            <?php foreach($nama_lab as $nl) : ?>
                            <?php if($nl['nama_lab']) : ?>
                                <td><?= $nl['nama_lab'] ?></td>
                            <?php else : ?>
                                <td>Belum ada</td>
                            <?php endif ?>
                            <?php endforeach ?>
                        </tr>

                        <tr>
                            <th scope="col">Catatan</th>
                            <td><?= $p['komentar']; ?></td>
                        </tr>

                </tbody>
            </table>

        </div>

        <div class="col-lg-6">
            <b>Dokumen</b><br> 
            <iframe src="<?php echo base_url("dokumen/"); ?><?= $p['dokumen_pendukung']; ?>" width="700" height="700"></iframe>
        </div>
    <?php endforeach ?>
    </div>
</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->



                        
                        
                        
                        
                        
                        
                        
                        

