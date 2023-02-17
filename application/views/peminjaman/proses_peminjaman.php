<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
    <?php foreach ($detailPeminjaman as $p) : ?>
        <div class="col-lg-6">

        <form action="<?= base_url('peminjaman/prosesPeminjaman/'); ?><?= $p['id_peminjaman_ruang']?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Ruangan Lab</label>
                        <select name="id_laboratorium" id="id_laboratorium" class="form-control">
                            <option value="">Pilih Ruangan Lab</option>
                            <?php foreach ($lab as $l) : ?>
                                <option value="<?= $l['id_laboratorium']; ?>"><?= $l['nama_lab']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $p['nama'] ?>" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="">NRK</label>
                        <input type="text" class="form-control" id="nrk" name="nrk" placeholder="NRK" value="<?= $p['nrk'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Prodi</label>
                        <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Prodi" value="<?= $p['prodi'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Telepon</label>
                        <input type="text" class="form-control" id="notlp" name="notlp" placeholder="Nomor Telepon" value="<?= $p['notlp'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $p['email'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Pelaksanaan</label>
                        <input type="date" class="form-control" id="tanggal_penggunaan" name="tanggal_penggunaan" placeholder="Tanggal Pelaksanaan" value="<?= $p['tanggal_penggunaan'] ?>" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Peserta</label>
                        <input type="text" class="form-control" id="kapasitas" name="kapasitas" placeholder="Jumlah Peserta" value="<?= $p['kapasitas'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Jam</label>
                        <input type="text" class="form-control" id="range_waktu" name="range_waktu" placeholder="Jam" value="<?= $p['range_waktu'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan" value="<?= $p['nama_kegiatan'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="komentar" name="komentar" placeholder="Catatan">
                    </div>
                    <div class="form-group">
                        <select name="status" id="status" class="form-control" required>
                            <option value="" selected>Pilih</option>
                            <option value="done">Setuju</option>
                            <option value="reject">Tidak Setuju</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>

            <a href=" <?= base_url('peminjaman/kelola') ?>" class="ml-3">Kembali</a>
        </div>

        <div class="col-lg-6">
            <b>Dokumen</b><br> 
            <iframe src="<?php echo base_url("dokumen/"); ?><?= $p['dokumen_pendukung']; ?>" width="700" height="1000"></iframe>
        </div>
        <?php endforeach ?>
    </div>
</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->