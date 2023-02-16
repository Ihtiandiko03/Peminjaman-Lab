<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
    }


    public function index()
    {
        $this->load->view('main/index');
    }

    public function kontak()
    {
        $data = [
            'title' => 'Kontak'
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('main/kontak');
        $this->load->view('layout/footer');
    }

    public function roadster()
    {
        $data['title'] = 'Roadster';
        $data['range_waktu'] = $this->Peminjaman_model->roadster();
        $data['jadwal'] = $this->Peminjaman_model->jadwal2();
        $data['jadwal2'] = $this->Peminjaman_model->jadwal3();

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



        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('main/roadster', $data);
        $this->load->view('layout/footer');
    }

    public function kapasitasRuangan(){
        $data['title'] = 'Roadster';
        $data['lab'] =  $this->Peminjaman_model->getLaboratorium();



        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('main/kapasitasruangan', $data);
        $this->load->view('layout/footer');
    }
}
