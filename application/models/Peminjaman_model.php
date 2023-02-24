<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{
    public function laboratorium()
    {
        $query = "SELECT `tb_peminjaman_ruang`.*, DATEDIFF(CURRENT_DATE(), `created_at`) as `lama_pengajuan`
        FROM `tb_peminjaman_ruang`
        ORDER BY `tb_peminjaman_ruang`.`tanggal_penggunaan` ASC";

        return $this->db->query($query)->result_array();
    }

    public function peminjamanUser($emailUser){
        $query = "SELECT `tb_peminjaman_ruang`.*, `tb_range_waktu`.`range_waktu`
        FROM `tb_peminjaman_ruang` JOIN `tb_range_waktu`
        ON `tb_peminjaman_ruang`.`id_range_waktu` = `tb_range_waktu`.`id_range_waktu`
        WHERE `tb_peminjaman_ruang`.`email_pengguna` = '$emailUser'";

        return $this->db->query($query)->result_array();
    }


    public function showPeminjaman($id){
        $query = "SELECT `tb_peminjaman_ruang`.*, `tb_range_waktu`.`range_waktu`
        FROM `tb_peminjaman_ruang` JOIN `tb_range_waktu`
        ON `tb_peminjaman_ruang`.`id_range_waktu` = `tb_range_waktu`.`id_range_waktu`
        WHERE  `tb_peminjaman_ruang`.`id_peminjaman_ruang` = $id";
        
        return $this->db->query($query)->result_array();
    }

    public function ruangLab($id){
        $query = "SELECT `tb_peminjaman_ruang`.*, `tb_laboratorium`.`nama_lab`
                FROM `tb_peminjaman_ruang` JOIN `tb_laboratorium`
                ON `tb_peminjaman_ruang`.`id_laboratorium` = `tb_laboratorium`.`id_laboratorium`
                WHERE  `tb_peminjaman_ruang`.`id_peminjaman_ruang` = $id";

        return $this->db->query($query)->result_array();
    }

    public function pengajuan(){
        $query = "SELECT `tb_peminjaman_ruang`.*,  `tb_range_waktu`.`range_waktu`,DATEDIFF(CURRENT_DATE(), `created_at`) as `lama_pengajuan`
        FROM `tb_peminjaman_ruang` JOIN `tb_range_waktu`
        ON `tb_peminjaman_ruang`.`id_range_waktu` = `tb_range_waktu`.`id_range_waktu`
        ORDER BY `tb_peminjaman_ruang`.`status` ASC";

        return $this->db->query($query)->result_array();
    }

    public function roadster(){
        $query = "SELECT * FROM `tb_range_waktu`";

        return $this->db->query($query)->result_array();
    }

    public function jadwal(){
        $query = "select `tb_peminjaman_ruang`.*, `tb_laboratorium`.`nama_lab`,
        count(case when (id_range_waktu = 1) then 1 else null end) as J_07_00_09_00,
        count(case when (id_range_waktu = 2) then 1 else null end) as J_09_00_11_00,
        count(case when (id_range_waktu = 3) then 1 else null end) as J_11_00_13_00,
        count(case when (id_range_waktu = 4) then 1 else null end) as J_13_00_15_00,
        count(case when (id_range_waktu = 5) then 1 else null end) as J_15_00_17_00
        
        from tb_peminjaman_ruang JOIN `tb_laboratorium` ON `tb_peminjaman_ruang`.`id_laboratorium` = `tb_laboratorium`.`id_laboratorium`
          
          where status='done'
        group by id_laboratorium,tanggal_penggunaan ORDER BY id_laboratorium,tanggal_penggunaan";

        return $this->db->query($query)->result_array();
    }

    public function jadwal1(){
        $query = "select `tb_peminjaman_ruang`.`id_laboratorium`, `tb_laboratorium`.`nama_lab`,
        count(case when (id_range_waktu = 1) then 1 else null end) as J_07_00_09_00,
        count(case when (id_range_waktu = 2) then 1 else null end) as J_09_00_11_00,
        count(case when (id_range_waktu = 3) then 1 else null end) as J_11_00_13_00,
        count(case when (id_range_waktu = 4) then 1 else null end) as J_13_00_15_00,
        count(case when (id_range_waktu = 5) then 1 else null end) as J_15_00_17_00
        
        from tb_peminjaman_ruang JOIN `tb_laboratorium` ON `tb_peminjaman_ruang`.`id_laboratorium` = `tb_laboratorium`.`id_laboratorium`
          
          where status='done'
        group by id_laboratorium ORDER BY id_laboratorium,tanggal_penggunaan";

        return $this->db->query($query)->result_array();
    }

    public function jadwal3(){
        $query = "SELECT id_laboratorium, tanggal_penggunaan, id_range_waktu, nama_kegiatan, prodi, kapasitas
        
        from tb_peminjaman_ruang
        where status='done'";

        return $this->db->query($query)->result_array();
    }

    public function getLaboratorium(){
        $query="SELECT * FROM tb_laboratorium";

        return $this->db->query($query)->result_array();
    }

    public function hapus($id){
        $query = "SELECT * from tb_peminjaman_ruang WHERE id_peminjaman_ruang = $id";
        return $this->db->query($query)->result_array();

    }

    public function peminjamanDone(){
        $query = "SELECT `tb_peminjaman_ruang`.*,  `tb_range_waktu`.`range_waktu`
        FROM `tb_peminjaman_ruang` JOIN `tb_range_waktu`
        ON `tb_peminjaman_ruang`.`id_range_waktu` = `tb_range_waktu`.`id_range_waktu` WHERE `tb_peminjaman_ruang`.`status` = 'done'";
        return $this->db->query($query)->result_array();
    }




}
