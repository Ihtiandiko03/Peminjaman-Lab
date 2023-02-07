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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#gedungModal">Buat Peminjaman Ruangan</a>

            <table class=" table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Laboratorium</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam Mulai</th>
                        <th scope="col">Jam Selesai</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($peminjaman as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $p['nama_lab']; ?></td>
                            <td><?= $p['tanggal_penggunaan']; ?></td>
                            <td><?= $p['mulai_penggunaan']; ?></td>
                            <td><?= $p['selesai_penggunaan']; ?></td>
                            <?php if($p['status'] == 'request') : ?>
                                <td> <b class="badge badge-warning"><?= $p['status']; ?></b></td>
                            <?php elseif($p['status'] == 'done') : ?>
                                <td> <b class="badge badge-success"><?= $p['status']; ?></b></td>
                            <?php elseif($p['status'] == 'reject') : ?>
                                <td> <b class="badge badge-danger"><?= $p['status']; ?></b></td>
                            <?php endif ?>


                            <td>
                                <a href="<?= base_url('peminjaman/show/').$p['id_peminjaman_ruang']; ?>" class="badge badge-primary">Lihat</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Peminjaman Ruang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="<?= base_url('peminjaman/upload'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="id_laboratorium" id="id_laboratorium" class="form-control">
                            <option value="">Pilih Laboratorium</option>
                            <?php foreach ($lab as $l) : ?>
                                <option value="<?= $l['id_laboratorium']; ?>"><?= $l['nama_lab']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama"> 
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nrk" name="nrk" placeholder="NRK">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Prodi">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="notlp" name="notlp" placeholder="Nomor Telepon">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="tanggal_penggunaan" name="tanggal_penggunaan" placeholder="Tanggal Pelaksanaan"> 
                    </div>
                    <div class="form-group">
                        <input type="time" class="form-control" id="mulai_penggunaan" name="mulai_penggunaan" placeholder="Jam Mulai">
                    </div>
                    <div class="form-group">
                        <input type="time" class="form-control" id="selesai_penggunaan" name="selesai_penggunaan" placeholder="Jam Selesai">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="judul_penelitian" name="judul_penelitian" placeholder="Judul Penelitian">
                    </div>
                    <div class="form-group">
                         <input type="file" class="form-control" id="dokumen_pendukung" name="dokumen_pendukung">
                    </div>
                    <input type="hidden" class="form-control" id="status" name="status" value="request">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Buat Peminjaman</button>
                </div>
            </form>
        </div>
    </div>
</div>



                        
                        
                        
                        
                        
                        
                        
                        

