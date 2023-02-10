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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Range Waktu</h5>
            </div>

            <form action="<?= base_url('peminjaman/upload_rangewaktu'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <h6> Range waktu ke-1</h6>

                    <div class="form-group">
                        <label for="">Jam Mulai</label>
                        <input type="time" class="form-control" name="multiple[0][jam_mulai]" placeholder="Jam Mulai" required> 
                    </div>
                    <div class="form-group">
                    <label for="">Jam Selesai</label>
                        <input type="time" class="form-control"  name="multiple[0][jam_selesai]" placeholder="Jam Selesai" required>
                    </div>


                    <div id="newinput"></div>

                    <button id="btn-tambah-form" type="button"
						class="btn btn-primary">ADD
					</button>

                    <button type="button" id="btn-reset-form" class="btn btn-secondary">Reset Form</button><br>

                    <input type="hidden" class="form-control" id="status" name="status" value="request">
                    <input type="hidden" id="jumlah-form" name="jumlah-form" value="0">
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Buat Range Waktu</button>
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

        $(document).ready(function(){
            $("#btn-tambah-form").click(function(){ 
                var jumlah = parseInt($("#jumlah-form").val());
                var nextform = jumlah + 1;

                $("#newinput").append('<h6> Jadwal ke-' + (nextform + 1) + '</h6><div class="form-group"><label for="">Jam Mulai</label><input type="time" class="form-control" name="multiple['+nextform+'][jam_mulai]" placeholder="Jam Mulai" required> </div><div class="form-group"><label for="">Jam Selesai</label><input type="time" class="form-control"  name="multiple['+nextform+'][jam_selesai]" placeholder="Jam Selesai" required></div>');
                $("#jumlah-form").val(nextform);
            });

            $("#btn-reset-form").click(function(){
                $("#newinput").html("");
                $("#jumlah-form").val("1");
            });
        });

    </script>





                        
                        
                        
                        
                        
                        
                        
                        

