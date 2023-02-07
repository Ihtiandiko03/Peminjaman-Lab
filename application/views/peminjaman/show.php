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
                            <th scope="col">Nama Laboratorium</th>
                            <td><?= $p['nama_lab']; ?></td>
                        </tr>

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
                            <td><?= $p['tanggal_penggunaan']; ?></td>
                        </tr>

                        <tr>
                            <th scope="col">Jam mulai</th>
                            <td><?= $p['mulai_penggunaan']; ?></td>
                        </tr>

                        <tr>
                            <th scope="col">Jam Selesai</th>
                            <td><?= $p['selesai_penggunaan']; ?></td>
                        </tr>

                        <tr>
                            <th scope="col">Judul Penelitian</th>
                            <td><?= $p['judul_penelitian']; ?></td>
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
                            <th scope="col">Catatan</th>
                            <td><?= $p['komentar']; ?></td>
                        </tr>

                </tbody>
            </table>

            <a href=" <?= base_url('peminjaman') ?>" class="ml-3">Kembali</a>
        </div>

        <div class="col-lg-6">
            <b>Dokumen</b><br> 
            <iframe src="<?php echo base_url("assets/"); ?><?= $p['dokumen_pendukung']; ?>" width="700" height="700"></iframe>
        </div>
        <?php endforeach ?>
    </div>
</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->



                        
                        
                        
                        
                        
                        
                        
                        

