<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">
            <?= form_error(
                'menu',
                '<div class="alert alert-danger" role="alert">',
                '</div>'
            ) ?>

            <?= $this->session->flashdata('message'); ?>


            <table class=" table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Status</th>
                        <th scope="col">Dibuat</th>
                        <!-- <th scope="col">Tanggal Pengajuan</th> -->
                        
                        <th scope="col">Lama Pengajuan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; $today = date("Y/m/d") ?>
                    <?php foreach ($peminjaman as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $p['nama']; ?></td>
                            <td><?=date("l", strtotime($p['tanggal_penggunaan']))?>, <?= $p['tanggal_penggunaan']; ?></td>
                            <td><?= $p['range_waktu']; ?></td>

                            <?php if($p['status'] == 'request') : ?>
                                <td> <b class="badge badge-warning"><?= $p['status']; ?></b></td>
                            <?php elseif($p['status'] == 'done') : ?>
                                <td> <b class="badge badge-success"><?= $p['status']; ?></b></td>
                            <?php elseif($p['status'] == 'proses') : ?>
                                <td> <b class="badge badge-secondary"><?= $p['status']; ?></b></td>
                            <?php elseif($p['status'] == 'reject') : ?>
                                <td> <b class="badge badge-danger"><?= $p['status']; ?></b></td>
                            <?php endif ?>

                            <td><?= $p['created_at']; ?></td>
                            <!-- <td><?= $p['tanggal_pengajuan']; ?></td> -->

                            <?php if($p['lama_pengajuan'] == 0) : ?>
                                <td>Hari ini</td>
                            <?php else :?>
                                <td><?= $p['lama_pengajuan']; ?> hari</td>
                            <?php endif ?>

                            <td>
                            <?php if($p['status'] == 'proses') : ?>
                                <a href="<?= base_url('peminjaman/proses/').$p['id_peminjaman_ruang']; ?>" class="badge badge-info">Proses</a>
                            <?php elseif($p['status'] == 'request') : ?>
                                <a href="<?= base_url('peminjaman/proses/').$p['id_peminjaman_ruang']; ?>" class="badge badge-info">Proses</a>
                            <?php elseif($p['status'] == 'done') : ?>
                                <a href="<?= base_url('peminjaman/show/').$p['id_peminjaman_ruang']; ?>" class="badge badge-secondary">Lihat</a>
                            <?php elseif($p['status'] == 'reject') : ?>
                                <a href="<?= base_url('peminjaman/show/').$p['id_peminjaman_ruang']; ?>" class="badge badge-secondary">Lihat</a>
                            <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->






</div>
<!-- End of Main Content -->

<!-- MODAL -->




                        
                        
                        
                        
                        
                        
                        
                        

