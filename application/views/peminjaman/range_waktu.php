<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="text-align:center;"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-7 mx-auto mt-5">
            <?= $this->session->flashdata('pesan'); ?>

            <h5 style="text-align:center;" class="mb-3">Minggu Perkuliahan</h5>
            <table class=" table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Minggu</th>
                        <th scope="col">Tanggal Mulai Kuliah</th>
                        <th scope="col">Tanggal Selesai Kuliah</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($mingguKuliah as $mk) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $mk['nama_minggu']; ?></td>
                            <td><?= $mk['tgl_mulai']; ?></td>
                            <td><?= $mk['tgl_selesai']; ?></td>                            
                            <td>
                                <a href="<?= base_url('peminjaman/editMingguKuliah/').$mk['id']; ?>" class="badge badge-warning" data-toggle="modal" data-target="#editmingguModal<?= $mk['id']?>">Edit tanggal kuliah</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4 mx-auto mt-5">
            <?= form_error(
                'menu',
                '<div class="alert alert-danger" role="alert">',
                '</div>'
            ) ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="<?= base_url('peminjaman/buatrangewaktu/'); ?>" class="btn btn-primary mb-3">Tambah range waktu</a>
            <h5 style="text-align:center;" class="mb-3">Range Waktu</h5>
            <table class=" table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Range Waktu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($range_waktu as $rw) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $rw['range_waktu']; ?></td>

                            <td>
                                <a href="<?= base_url('peminjaman/edit_rangewaktu/').$rw['id_range_waktu']; ?>" class="badge badge-warning" data-toggle="modal" data-target="#editrangewaktuModal<?= $rw['id_range_waktu']?>">Edit</a>
                                <!-- <a href="<?= base_url('peminjaman/hapusrangewaktu/').$rw['id_range_waktu']; ?>" class="badge badge-danger">Hapus</a> -->
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

<!-- MODAL Edit Range Waktu -->
<?php foreach ($range_waktu as $rw): ?>
<div class="modal fade" id="editrangewaktuModal<?= $rw['id_range_waktu']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Range Waktu</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="<?= base_url('peminjaman/edit_rangewaktu/').$rw['id_range_waktu']; ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" placeholder="Jam Mulai" value="<?=$rw['jam_mulai']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Jam Selesai</label>
                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" placeholder="Jam Selesai" value="<?=$rw['jam_selesai']; ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>

<!-- MODAL Edit Minggu Perkuliahan -->
<?php foreach ($mingguKuliah as $mk): ?>
<div class="modal fade" id="editmingguModal<?= $mk['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Tanggal Minggu Perkuliahan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="<?= base_url('peminjaman/editMingguKuliah/').$mk['id']; ?>" method="post">
                <div class="modal-body">
                    <p><?=$mk['nama_minggu']; ?></p>
                    <div class="form-group">
                        <label for="">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" placeholder="Jam Mulai" value="<?=$mk['tgl_mulai']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" placeholder="Jam Selesai" value="<?=$mk['tgl_selesai']; ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>