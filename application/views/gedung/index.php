<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-6">
            <?= form_error(
                'menu',
                '<div class="alert alert-danger" role="alert">',
                '</div>'
            ) ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#gedungModal">Tambah Gedung</a>

            <table class=" table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gedung</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($gedung as $g) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $g['nama_gedung']; ?></td>
                            <td>
                                <a href="<?= base_url('gedung/edit/').$g['id_gedung']; ?>" class="badge badge-warning" data-toggle="modal" data-target="#editgedungModal<?= $g['id_gedung']?>">Edit</a>
                                <a href="<?= base_url('gedung/delete/').$g['id_gedung']; ?>" class="badge badge-danger">Delete</a>
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

<div class="modal fade" id="gedungModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Gedung Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="<?= base_url('gedung'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_gedung" name="nama_gedung" placeholder="Nama gedung">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($gedung as $g): ?>
<div class="modal fade" id="editgedungModal<?= $g['id_gedung']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Gedung</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="<?= base_url('gedung/edit/').$g['id_gedung']; ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_gedung" name="nama_gedung" placeholder="Nama gedung" value="<?=$g['nama_gedung']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>

