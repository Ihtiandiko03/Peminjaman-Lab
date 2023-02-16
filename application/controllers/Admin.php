<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        is_logged_in();
    }


    public function index()
    {

        $data['title'] = 'Dashboard Laboran';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['range_waktu'] = $this->Peminjaman_model->roadster();
        $data['jadwal'] = $this->Peminjaman_model->jadwal2();
        $data['jadwal2'] = $this->Peminjaman_model->jadwal3();
        $data['lab'] = $this->Peminjaman_model->getLaboratorium();

        $hariIni =  "2023-02-13";
        $akhir =  date('Y-m-d', strtotime('+4 days', strtotime($hariIni)));

        $begin = new DateTime( $hariIni );
        $end   = new DateTime( $akhir );
        $arr=array(
            '0'=>'Minggu',
            '1'=>'Senin',
            '2'=>'Selasa',
            '3'=>'Rabu',
            '4'=>'Kamis',
            '5'=>'Jumat',
            '6'=>'Sabtu'
        );
        $kirim=array();
        $num = 0;
        for($i = $begin; $i <= $end; $i->modify('+1 day')){
            $tgl=$i->format("Y-m-d");
            $dayofweek = date('w', strtotime($tgl));
                array_push($kirim,$tgl);
                $num++;
        }

        $data['kirim'] = $kirim;



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
}
