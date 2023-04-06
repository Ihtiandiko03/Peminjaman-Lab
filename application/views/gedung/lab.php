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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#labModel">Tambah Laboratorium</a>

            <table id="lab" class=" table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Lab</th>
                        <th scope="col">Lantai</th>
                        <th scope="col">Nama Gedung</th>
                        <th scope="col">Kontak</th>
                        <th scope="col">Kapasitas</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($lab as $l) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $l['nama_lab']; ?></td>
                            <td><?= $l['lantai']; ?></td>
                            <td><?= $l['nama_gedung']; ?></td>
                            <td><?= $l['kontak']; ?></td>
                            <td><?= $l['kapasitas']; ?></td>
                            <td>
                                <a href="<?= base_url('gedung/editLab/').$l['id_laboratorium']; ?>" class="badge badge-warning" data-toggle="modal" data-target="#editlabModel<?= $l['id_laboratorium']?>">Edit</a>
                                <a href="<?= base_url('gedung/deleteLab/').$l['id_laboratorium']; ?>" class="badge badge-danger">Delete</a>
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

<div class="modal fade" id="labModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Laboratorium Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="<?= base_url('gedung/lab'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="kode_ruang" name="kode_ruang" placeholder="Kode Ruang" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_lab" name="nama_lab" placeholder="Nama Laboratorium" required>
                    </div>
                    <div class="form-group">
                        <select name="id_gedung" id="id_gedung" class="form-control" required>
                            <option value="">Pilih Gedung</option>
                            <?php foreach ($gedung as $g) : ?>
                                <option value="<?= $g['id_gedung']; ?>"><?= $g['nama_gedung']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="lantai" name="lantai" placeholder="Lantai" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Masukkan lokasi gedung" id="lokasi" name="lokasi" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="kontak" name="kontak" placeholder="Kontak" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Kapasitas" required>
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



<?php foreach ($lab as $l): ?>
<div class="modal fade" id="editlabModel<?= $l['id_laboratorium']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Gedung</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="<?= base_url('gedung/editLab/').$l['id_laboratorium']; ?>" method="post">
                <div class="modal-body">
                <div class="form-group">
                        <label for="kode_ruang">Kode Ruang</label>
                        <input type="text" class="form-control" id="kode_ruang" name="kode_ruang" placeholder="Kode Ruang" value="<?=$l['kode_ruang']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_lab">Nama Lab</label>
                        <input type="text" class="form-control" id="nama_lab" name="nama_lab" placeholder="Nama Laboratorium" value="<?=$l['nama_lab']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="id_gedung">Gedung</label>
                        <select name="id_gedung" id="id_gedung" class="form-control" required>
                            <option value="<?=$l['id_gedung']; ?>"><?=$l['nama_gedung']; ?> (Gedung saat ini) </option>
                            <?php foreach ($gedung as $g) : ?>
                                <option value="<?= $g['id_gedung']; ?>"><?= $g['nama_gedung']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lantai">Lantai</label>
                        <input type="text" class="form-control" id="lantai" name="lantai" placeholder="Lantai" value="<?=$l['lantai']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <textarea class="form-control" placeholder="Masukkan lokasi gedung" id="lokasi" name="lokasi" required><?=$l['lokasi']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?=$l['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kontak">Kontak</label>
                        <input type="text" class="form-control" id="kontak" name="kontak" placeholder="Kontak" value="<?=$l['kontak']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kapasitas">Kapasitas</label>
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Kapasitas" value="<?=$l['kapasitas']; ?>" required>
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




