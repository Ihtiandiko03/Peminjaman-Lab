<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `tb_sub_menu`.*, `tb_menu`.`menu` 
                FROM `tb_sub_menu` JOIN `tb_menu`
                ON `tb_sub_menu`.`menu_id` = `tb_menu`.`id`";

        return $this->db->query($query)->result_array();
    }
}
