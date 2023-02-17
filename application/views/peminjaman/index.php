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





                        
                        
                        
                        
                        
                        
                        
                        

