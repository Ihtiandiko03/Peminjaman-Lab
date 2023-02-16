<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?= form_error(
                'menu',
                '<div class="alert alert-danger" role="alert">',
                '</div>'
            ) ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="<?= base_url('peminjaman/buatrangewaktu/'); ?>" class="btn btn-primary mb-3">Buat range waktu</a>

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
                                <a href="<?= base_url('peminjaman/editrangewaktu/').$rw['id_range_waktu']; ?>" class="badge badge-warning" data-toggle="modal" data-target="#editrangewaktuModal<?= $rw['id_range_waktu']?>">Edit</a>
                                <a href="<?= base_url('peminjaman/hapusrangewaktu/').$rw['id_range_waktu']; ?>" class="badge badge-danger">Hapus</a>
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