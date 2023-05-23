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
                        <form action="<?=base_url()?>peminjaman/lihat/<?=$url;?>/" method="get">
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


            <table id="tabel" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Check</th>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Status</th>
                        <th scope="col">Dibuat</th>
                        <!-- <th scope="col">Tanggal Pengajuan</th> -->
                        
                        <!-- <th scope="col">Lama Pengajuan</th> -->
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; $today = date("Y/m/d") ?>
                    
                    <form action="" method="post">
                    <?php foreach ($peminjaman as $p) : ?>
                        <tr>

                            <td><center><input type="checkbox" name="check[]" value='<?=$p['id_peminjaman_ruang']?>'/>&nbsp;</center></td>

                            <td scope="row"><b><?= $i++; ?></b></td>
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

                            <td><?= $p['created_at']; ?></td>
                            <!-- <td><?= $p['tanggal_pengajuan']; ?></td> -->

                            <!-- <?php if($p['lama_pengajuan'] == 0) : ?>
                                <td>Hari ini</td>
                            <?php else :?>
                                <td><?= $p['lama_pengajuan']; ?> hari</td>
                            <?php endif ?> -->

                            <td>
                            <?php if($p['status'] == 'proses') : ?>
                                <a href="<?= base_url('peminjaman/proses/').$p['id_peminjaman_ruang']; ?>" class="badge badge-info">Proses</a>
                            <?php elseif($p['status'] == 'request') : ?>
                                <a href="<?= base_url('peminjaman/proses/').$p['id_peminjaman_ruang']; ?>" class="badge badge-info">Proses</a>
                            <?php elseif($p['status'] == 'done') : ?>
                                <a href="<?= base_url('user/show/').$p['id_peminjaman_ruang']; ?>" class="badge badge-secondary">Lihat</a>
                                <a href="<?= base_url('peminjaman/editPeminjaman/').$p['id_peminjaman_ruang']; ?>" class="badge badge-warning">Edit</a>
                            <?php elseif($p['status'] == 'reject') : ?>
                                <a href="<?= base_url('user/show/').$p['id_peminjaman_ruang']; ?>" class="badge badge-secondary">Lihat</a>
                                
                            <?php endif ?>

                            <a href="<?= base_url('peminjaman/hapus/').$p['id_peminjaman_ruang'].'/'.$url; ?>" class="badge badge-danger">Hapus</a>
                            <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Apakah anda yakin ingin menghapus peminjaman ini?</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-danger" href="<?= base_url('peminjaman/hapus/').$p['id_peminjaman_ruang']; ?>">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            </td>
                        </tr>
                    <?php endforeach ?>

                    <td>
                        <select name="id_laboratorium" id="id_laboratorium" class="form-control">
                            <option value="">Pilih Ruangan Lab</option>
                            <?php foreach ($lab as $l) : ?>
                            <option value="<?= $l['id_laboratorium']; ?>"><?= $l['nama_lab']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                            
                    <td colspan="2" align="center"><input type="submit" class="form-control bg-primary text-white" value="Submit" name="sub">
                </tbody>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- MODAL -->








                        
                        
                        
                        
                        
                        
                        
                        

