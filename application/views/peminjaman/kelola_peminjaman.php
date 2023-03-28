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

            <!-- <div class="row mb-2">
                        <form action="<?=base_url()?>peminjaman/kelola" method="get">
                            <div class="col">
                                
                                <select name="status_peminjaman" id="status_peminjaman" class="form-control">
                                        <option value="">Pilih status peminjaman...</option>
                                        <option value="request" class="bg bg-warning text-white"><b> Request </b></option>
                                        <option value="proses" class="bg bg-secondary text-white"><b> Proses </b></option>
                                        <option value="done" class="bg bg-success text-white"><b> Done </b></option>
                                        <option value="reject" class="bg bg-danger text-white"><b> Reject </b></option>
                                </select>
                            </div>
                            <div class="col">
                                <button class="btn btn-secondary mt-2" type="submit">Cari</button>
                            </div>
                        </form>
                    </div> -->


            <table id="lihat" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Program Studi</th>
                        <!-- <th scope="col">Tanggal</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Status</th>
                        <th scope="col">Dibuat</th> -->
                        <!-- <th scope="col">Tanggal Pengajuan</th> -->
                        
                        <!-- <th scope="col">Lama Pengajuan</th> -->
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; $today = date("Y/m/d") ?>
                    <?php foreach ($grupPeminjaman as $p) : ?>
                        <tr>
                            <td scope="row"><b><?= $i++; ?></b></td>
                            <td><?= $p['nama_kegiatan']; ?></td>
                            <td><?= $p['prodi']; ?></td>
                           

                            <td>
                            
                            <a href="<?= base_url('peminjaman/lihat/').$p['nama_kegiatan']; ?>" class="badge badge-primary">Lihat</a>

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








                        
                        
                        
                        
                        
                        
                        
                        

