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

            <a href="<?= base_url('user/buatpeminjaman/'); ?>" class="btn btn-primary mb-3">Buat Peminjaman</a>

            <table class=" table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Kapasitas</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($peminjaman as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $p['nama']; ?></td>
                            <td><?=  $p['tanggal_penggunaan']; ?></td>
                            <td><?=  $p['kapasitas']; ?></td>
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


                            <td>
                                <a href="<?= base_url('user/show/').$p['id_peminjaman_ruang']; ?>" class="badge badge-primary">Lihat</a>
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

<!-- <div class="modal fade" id="gedungModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan">
                    </div>
                    <div class="form-group">
                         <input type="file" class="form-control" id="dokumen_pendukung" name="dokumen_pendukung">
                    </div>

                    <h6> Jadwal ke-1</h6>

                    <div class="form-group">
                        <input type="date" class="form-control" name="tanggal_penggunaan[]" placeholder="Tanggal Pelaksanaan"> 
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control"  name="kapasitas[]" placeholder="Jumlah peserta">
                    </div>
                    <div class="form-group">
                        <select name="id_range_waktu[]" class="form-control">
                            <option value="">Pilih Jam</option>
                            <?php foreach ($rangeWaktu as $r) : ?>
                                <option value="<?= $r['id_range_waktu']; ?>"><?= $r['range_waktu']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>


                    <div id="newinput"></div>

                    <button id="btn-tambah-form" type="button"
						class="btn btn-primary">ADD
					</button>

                    <button type="button" id="btn-reset-form" class="btn btn-secondary">Reset Form</button><br>

                    <input type="hidden" class="form-control" id="status" name="status" value="request">
                    <input type="hidden" id="jumlah-form" name="jumlah-form" value="1">
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Buat Peminjaman</button>
                </div>
                
            </form>
        </div>
    </div>
</div> -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <script type="text/javascript">

        $(document).ready(function(){
            $("#btn-tambah-form").click(function(){ 
                var jumlah = parseInt($("#jumlah-form").val());
                var nextform = jumlah + 1;

                $("#newinput").append('<h6> Jadwal ke-' + nextform + '</h6><div class="form-group"><input type="date" class="form-control" id="tanggal_penggunaan" name="tanggal_penggunaan" placeholder="Tanggal Pelaksanaan"> </div><div class="form-group"><input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Jumlah peserta"></div><div class="form-group"><select name="id_range_waktu" id="id_range_waktu" class="form-control"><option value="">Pilih Jam</option><?php foreach ($rangeWaktu as $r) : ?><option value="<?= $r['id_range_waktu']; ?>"><?= $r['range_waktu']; ?></option><?php endforeach ?></select></div>');
                $("#jumlah-form").val(nextform);
            });

            $("#btn-reset-form").click(function(){
                $("#newinput").html("");
                $("#jumlah-form").val("1");
            });
        });

    </script> -->





                        
                        
                        
                        
                        
                        
                        
                        

