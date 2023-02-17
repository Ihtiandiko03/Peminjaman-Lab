


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

            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Peminjaman Ruang</h5>
            </div>

            <form action="<?=base_url()?>user/buatpeminjaman" method="post" enctype="multipart/form-data" id="formPeminjaman">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo set_value('nama') ?>">
                        <?php echo form_error('nama', ' <small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nrk" name="nrk" placeholder="NRK" value="<?php echo set_value('nrk') ?>">
                        <?php echo form_error('nrk', ' <small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Prodi" value="<?php echo set_value('prodi') ?>">
                        <?php echo form_error('prodi', ' <small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="notlp" name="notlp" placeholder="Nomor Telepon" value="<?php echo set_value('notlp') ?>">
                        <?php echo form_error('notlp', ' <small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo set_value('email') ?>">
                        <?php echo form_error('email', ' <small class="text-danger pl-3">', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <select class="form-control" aria-label="Default select example" id="jeniskegiatan" onchange="jnsKegiatan()">
                            <option selected>Pilih Jenis Kegiatan</option>
                            <option value="kuliah">Kuliah</option>
                            <option value="umum">Umum</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan" value="<?php echo set_value('nama_kegiatan') ?>">
                        <?php echo form_error('nama_kegiatan', ' <small class="text-danger pl-3">', '</small>') ?>
                    </div>



                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>


                    <div class="form-group">
                         <label for="dokumen_pendukung">Upload Surat Permohonan (Wajib format .pdf)</label>
                         <input type="file" class="form-control" id="dokumen_pendukung" name="dokumen_pendukung">
                    </div>

                    


                    <div id="isijadwal" style="display:none;">
                        <h6> Jadwal ke-1 </h6>
                        <div class="form-group">
                            <input type="date" class="form-control" id="tanggal_penggunaan" name="multiple[0][tanggal_penggunaan]" placeholder="Tanggal Pelaksanaan"> 
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="kapasitas" name="multiple[0][kapasitas]" placeholder="Jumlah peserta">
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

                        
                        <input type="hidden" id="jumlah-form" name="jumlah-form" value="0">
                    </div>

                    <div id="isijadwal2" style="display:none;">

                        <div class="form-group">
                            <input type="number" class="form-control"  name="kapasitas" placeholder="Jumlah peserta">
                        </div>
                        <div class="form-group">
                            <select name="id_range_waktu" class="form-control">
                                <option value="">Pilih Jam</option>
                                <?php foreach ($rangeWaktu as $r) : ?>
                                    <option value="<?= $r['id_range_waktu']; ?>"><?= $r['range_waktu']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <select class="form-control" id="namahari" onchange="fungsiHari()">
                                <option selected>Pilih Hari</option>
                                <option value="0">Minggu</option>
                                <option value="1">Senin</option>
                                <option value="2">Selasa</option>
                                <option value="3">Rabu</option>
                                <option value="4">Kamis</option>
                                <option value="5">Jumat</option>
                                <option value="6">Sabtu</option>
                            </select>
                        </div>

                        <div class="form-group" name="tgl_plk" id="tgl_plk"></div>

                    </div>
                    
                    <input type="hidden" class="form-control" id="status" name="status" value="request">
                    <input type="hidden" class="form-control" id="email_pengguna" name="email_pengguna" value="<?=$user['email']?>">            
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Buat Peminjaman</button>
                </div>
            </form>
        </div>
        
    </div>
    
    <div class="col-lg-6" style="overflow-x:auto;">
        <b>Dokumen</b><br>
        <canvas id="pdfViewer"></canvas>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script type="text/javascript">

    function jnsKegiatan() {
        var jenisKegiatan = document.getElementById("jeniskegiatan").value;

        if(jenisKegiatan === 'umum'){
            var x = document.getElementById("isijadwal");
            var y = document.getElementById("isijadwal2");

            if (x.style.display == "none") {
                x.style.display = "block";
                y.style.display = "none";
            } else {
                x.style.display = "none";
                y.style.display = "block";
            }
        }
        else if(jenisKegiatan == 'kuliah'){
            var x = document.getElementById("isijadwal");
            var y = document.getElementById("isijadwal2");

            if (y.style.display === "none") {
                y.style.display = "block";
                x.style.display = "none";
            } else {
                y.style.display = "none";
                x.style.display = "block";
            }
            
        }
    }

        $(document).ready(function(){
            $("#btn-tambah-form").click(function(){ 
                var jumlah = parseInt($("#jumlah-form").val());
                var nextform = jumlah + 1;

                $("#newinput").append('<h6> Jadwal ke-' + (nextform+1) + '</h6><div class="form-group"><input type="date" class="form-control" id="tanggal_penggunaan" name="multiple['+nextform+'][tanggal_penggunaan]" placeholder="Tanggal Pelaksanaan"> </div><div class="form-group"><input type="number" class="form-control" id="kapasitas" name="multiple['+nextform+'][kapasitas]" placeholder="Jumlah peserta"></div><div class="form-group"><select name="multiple['+nextform+'][id_range_waktu]" class="form-control"><option value="">Pilih Jam</option><?php foreach ($rangeWaktu as $r) : ?><option value="<?= $r['id_range_waktu']; ?>"><?= $r['range_waktu']; ?></option><?php endforeach ?></select></div>');
                $("#jumlah-form").val(nextform);
            });

            $("#btn-reset-form").click(function(){
                $("#newinput").html("");
                $("#jumlah-form").val("1");
            });

        });

        function fungsiHari() {
            
            var hari = document.getElementById("namahari").value;
            
            $.ajax({
                    url: '<?=base_url()?>user/getday',
                    type: 'post',
                    dataType: 'json',
                    async : true,
                    data: {
                            'hari': hari
                            },
                    success: function(data) {
                        // console.log(data);
                        $('#tgl_plk').html(data);
                    }
            });

        }

        var pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

        $("#dokumen_pendukung").on("change", function(e){
            var file = e.target.files[0]
            if(file.type == "application/pdf"){
                var fileReader = new FileReader();  
                fileReader.onload = function() {
                var pdfData = new Uint8Array(this.result);
                var loadingTask = pdfjsLib.getDocument({data: pdfData});
                loadingTask.promise.then(function(pdf) {
                console.log('PDF loaded');
                                        
                var pageNumber = 1;
                pdf.getPage(pageNumber).then(function(page) {
                    console.log('Page loaded');
                                            
                    var scale = 1.5;
                    var viewport = page.getViewport({scale: scale});

                    var canvas = $("#pdfViewer")[0];
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    var renderTask = page.render(renderContext);
                    renderTask.promise.then(function () {
                    console.log('Page rendered');
                    });
                });
            }, function (reason) {
                console.error(reason);
                });
            };
                fileReader.readAsArrayBuffer(file);
            }
        });

    </script>





                        
                        
                        
                        
                        
                        
                        
                        

