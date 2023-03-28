
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

            <div class="row mb-2">
                        <form action="<?=base_url()?>user/lihat/<?=$url;?>/" method="get">
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
                    </div>

            <a href="<?= base_url('user/buatpeminjaman/'); ?>" class="btn btn-primary mb-3">Buat Peminjaman</a>

            <table class="table table-hover" id="peminjaman">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Tanggal Kegiatan</th>
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

                            <?php  $hari = date("l", strtotime($p['tanggal_penggunaan'])); ?>
                            <?php if($hari == 'Monday') : ?>
                                <td>Senin</td>
                            <?php elseif($hari == 'Tuesday') : ?>
                                <td>Selasa</td>
                            <?php elseif($hari == 'Wednesday') : ?>
                                <td>Rabu</td>
                            <?php elseif($hari == 'Thursday') : ?>
                                <td>Kamis</td>
                            <?php elseif($hari == 'Friday') : ?>
                                <td>Jumat</td>
                            <?php elseif($hari == 'Saturday') : ?>
                                <td>Sabtu</td>
                            <?php elseif($hari == 'Sunday') : ?>
                                <td>Minggu</td>
                            <?php endif ?>


                            <?php foreach ($mingguKuliah as $mk) : ?>
                                <?php if($p['tanggal_penggunaan'] >= $mk['tgl_mulai'] && $p['tanggal_penggunaan'] <= $mk['tgl_selesai']) : ?>
                                    <td><?php $timestamp = strtotime($p['tanggal_penggunaan']); $new_date = date("d-m-Y", $timestamp); echo $mk['nama_minggu'].', '.$new_date;  ?></td>
                                <?php endif?>
                            <?php endforeach ?>


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





                        
                        
                        
                        
                        
                        
                        
                        

