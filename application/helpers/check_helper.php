<?php
function is_logged_in()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('tb_menu', ['menu' => $menu])->row_array();

        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('tb_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);


        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

// function check_query($id_laboratorium, $tgl, $range_waktu){
//     $query = "SELECT `nama_kegiatan` FROM `tb_peminjaman_ruang` WHERE `id_laboratorium` = '$id_laboratorium' AND `tanggal_penggunaan` = '$tgl' AND `id_range_waktu` = '$range_waktu'";
//     $ci = get_instance();

//     return $ci->db->query($query)->row_array();

    
// }
