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


            <table id="tabel" class="table table-hover">
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
                            <td scope="row"><b><?= $i++; ?></b></td>
                            <td><?= $p['nama']; ?></td>
                            <td><?=date("l", strtotime($p['tanggal_penggunaan']))?>, <?php $timestamp = strtotime($p['tanggal_penggunaan']); $new_date = date("d-m-Y", $timestamp); echo $new_date;  ?></td>
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
                                <a href="<?= base_url('user/show/').$p['id_peminjaman_ruang']; ?>" class="badge badge-secondary">Lihat</a>
                            <?php elseif($p['status'] == 'reject') : ?>
                                <a href="<?= base_url('user/show/').$p['id_peminjaman_ruang']; ?>" class="badge badge-secondary">Lihat</a>
                            <?php endif ?>
                            <a href="<?= base_url('peminjaman/hapus/').$p['id_peminjaman_ruang']; ?>" class="badge badge-danger" data-toggle="modal" data-target="#hapusModal">Hapus</a>
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

<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus peminjaman ini?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="<?= base_url('peminjaman/hapus/').$p['id_peminjaman_ruang']; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>






                        
                        
                        
                        
                        
                        
                        
                        

