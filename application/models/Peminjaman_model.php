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

    public function peminjamanUser(){
        $query = "SELECT `tb_peminjaman_ruang`.*, `tb_range_waktu`.`range_waktu`
        FROM `tb_peminjaman_ruang` JOIN `tb_range_waktu`
        ON `tb_peminjaman_ruang`.`id_range_waktu` = `tb_range_waktu`.`id_range_waktu`";

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
        ORDER BY `tb_peminjaman_ruang`.`tanggal_penggunaan` ASC";

        return $this->db->query($query)->result_array();
    }

    public function roadster(){
        $query = "SELECT * FROM `tb_range_waktu`";

        return $this->db->query($query)->result_array();
    }

    public function jadwal(){
        $query = "select *,
        count(case when (id_range_waktu = 1) then 1 else null end) as J_07_00_09_00,
        count(case when (id_range_waktu = 2) then 1 else null end) as J_09_00_11_00,
        count(case when (id_range_waktu = 3) then 1 else null end) as J_11_00_13_00,
        count(case when (id_range_waktu = 4) then 1 else null end) as J_13_00_15_00,
        count(case when (id_range_waktu = 5) then 1 else null end) as J_15_00_17_00
        
        from tb_peminjaman_ruang
        
        where status='done'
        group by id_laboratorium,tanggal_penggunaan,id_range_waktu ORDER BY tanggal_penggunaan";

        
        
        return $this->db->query($query)->result_array();
    }




}
