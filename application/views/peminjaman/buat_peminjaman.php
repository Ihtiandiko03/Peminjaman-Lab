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

            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Peminjaman Ruang</h5>
            </div>

            <form action="<?=base_url()?>peminjaman/upload" method="post" enctype="multipart/form-data" id="formPeminjaman">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required> 
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nrk" name="nrk" placeholder="NRK" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Prodi" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="notlp" name="notlp" placeholder="Nomor Telepon" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <select class="form-control" aria-label="Default select example" id="jeniskegiatan">
                            <option selected>Pilih Jenis Kegiatan</option>
                            <option value="kuliah">Kuliah</option>
                            <option value="umum">Umum</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan">
                    </div>
                    <div class="form-group">
                         <input type="file" class="form-control" id="dokumen_pendukung" name="dokumen_pendukung">
                    </div>


                    <div id="isijadwal">
                        <h6> Jadwal ke-1</h6>

                        <div class="form-group">
                            <input type="date" class="form-control" name="multiple[0][tanggal_penggunaan]" placeholder="Tanggal Pelaksanaan"> 
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control"  name="multiple[0][kapasitas]" placeholder="Jumlah peserta">
                        </div>
                        <div class="form-group">
                            <select name="multiple[0][id_range_waktu]" class="form-control">
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
                        <input type="hidden" id="jumlah-form" name="jumlah-form" value="0">
                    </div>

                    <div id="isijadwal2">
                        <select class="form-control" aria-label="Default select example" id="namahari" onchange="fungsiHari()">
                            <option selected>Pilih Hari</option>
                            <option value="0">Minggu</option>
                            <option value="1">Senin</option>
                            <option value="2">Selasa</option>
                            <option value="3">Rabu</option>
                            <option value="4">Kamis</option>
                            <option value="5">Jumat</option>
                            <option value="6">Sabtu</option>
                        </select>
                        
                        <div id="daftartanggal" class="ml-5 mt-2">
                            <div class="form-group" id="tgl_plksn">
                                <p><?= $draftanggal; ?></p>
                            </div>
                        </div>


                    </div>
                    

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Buat Peminjaman</button>
                </div>
                
            </form>
        </div>


        </div>
    </div>
</div>
<!-- /.container-fluid -->






</div>
<!-- End of Main Content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <script type="text/javascript">

        // $(document).ready(function(){
        //     $("#btn-tambah-form").click(function(){ 
        //         var jumlah = parseInt($("#jumlah-form").val());
        //         var nextform = jumlah + 1;

        //         $("#newinput").append('<h6> Jadwal ke-' + (nextform+1) + '</h6><div class="form-group"><input type="date" class="form-control" id="tanggal_penggunaan" name="multiple['+nextform+'][tanggal_penggunaan]" placeholder="Tanggal Pelaksanaan"> </div><div class="form-group"><input type="number" class="form-control" id="kapasitas" name="multiple['+nextform+'][kapasitas]" placeholder="Jumlah peserta"></div><div class="form-group"><select name="multiple['+nextform+'][id_range_waktu]" class="form-control"><option value="">Pilih Jam</option><?php foreach ($rangeWaktu as $r) : ?><option value="<?= $r['id_range_waktu']; ?>"><?= $r['range_waktu']; ?></option><?php endforeach ?></select></div>');
        //         $("#jumlah-form").val(nextform);
        //     });

        //     $("#btn-reset-form").click(function(){
        //         $("#newinput").html("");
        //         $("#jumlah-form").val("1");
        //     });

        // });

        function fungsiHari() {
            // var jenisKegiatan = document.getElementById("jeniskegiatan").value;
            var hari = document.getElementById("namahari").value;
            
            $.ajax({
                    url: '<?=base_url()?>peminjaman/getday',
                    type: 'post',
                    dataType: 'JSON',
                    data: {
                    'hari': hari
                    },
                    success: function() {

                    }
                });


            // if(jenisKegiatan == 'kuliah'){

                


                // var x = document.getElementById("isijadwal2");

                // if (x.style.display === "none") {
                //     x.style.display = "block";
                // } else {
                //     x.style.display = "none";
                // }
            // }
            // else if(jenisKegiatan == 'umum'){
                // var x = document.getElementById("isijadwal");

                // if (x.style.display === "none") {
                //     x.style.display = "block";
                // } else {
                //     x.style.display = "none";
                // }
                
            // }
        }

        

    </script>





                        
                        
                        
                        
                        
                        
                        
                        

