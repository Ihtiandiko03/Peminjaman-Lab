<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gedung_model extends CI_Model
{
    public function hapusGedung($id){
        $this->db->where('id_gedung', $id);
        $this->db->delete('tb_gedung');

        return true;
    }

    public function hapusLab($id){
        $this->db->where('id_laboratorium', $id);
        $this->db->delete('tb_laboratorium');

        return true;
    }

    public function laboratorium()
    {
        $query = "SELECT `tb_laboratorium`.*, `tb_gedung`.`nama_gedung` 
                FROM `tb_laboratorium` JOIN `tb_gedung`
                ON `tb_laboratorium`.`id_gedung` = `tb_gedung`.`id_gedung`";

        return $this->db->query($query)->result_array();
    }
}
