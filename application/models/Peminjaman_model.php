<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{
    public function laboratorium()
    {
        $query = "SELECT `tb_peminjaman_ruang`.*, `tb_laboratorium`.`nama_lab` 
                FROM `tb_peminjaman_ruang` JOIN `tb_laboratorium`
                ON `tb_peminjaman_ruang`.`id_laboratorium` = `tb_laboratorium`.`id_laboratorium`";

        return $this->db->query($query)->result_array();
    }

    public function showPeminjaman($id){
        $query = "SELECT `tb_peminjaman_ruang`.*, `tb_laboratorium`.`nama_lab` 
                FROM `tb_peminjaman_ruang` JOIN `tb_laboratorium`
                ON `tb_peminjaman_ruang`.`id_laboratorium` = `tb_laboratorium`.`id_laboratorium`
                WHERE  `tb_peminjaman_ruang`.`id_peminjaman_ruang` = $id";
        
        return $this->db->query($query)->result_array();
    }
}
