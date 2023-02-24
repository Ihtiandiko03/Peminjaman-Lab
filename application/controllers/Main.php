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
        $data['title'] = 'Dashboard Laboran';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['range_waktu'] = $this->Peminjaman_model->roadster();
        // $data['jadwal'] = $this->Peminjaman_model->jadwal();
        $data['jadwal2'] = $this->Peminjaman_model->jadwal3();
        // $data['lab'] = $this->Peminjaman_model->getLaboratorium();
        // $data['lab_all'] = $this->db->get('tb_peminjaman_ruang')->result_array();
        // $data['jadwal1'] = $this->Peminjaman_model->jadwal1();

        $hariIni =  "2023-01-01";
        $akhir = "2023-06-30";
        // $akhir =  date('Y-m-d', strtotime('+153 days', strtotime($hariIni)));

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
        $q_case='SELECT * ';
        $td = '';
        $num = 0;
        $td=array();
        for($i = $begin; $i <= $end; $i->modify('+1 day')){
            $tgl=$i->format("Y-m-d");
            $tgl_name_1=$i->format("Y_m_d_1");
            $tgl_name_2=$i->format("Y_m_d_2");
            $tgl_name_3=$i->format("Y_m_d_3");
            $tgl_name_4=$i->format("Y_m_d_4");
            $tgl_name_5=$i->format("Y_m_d_5");
            $dayofweek = date('w', strtotime($tgl));
            
                array_push($kirim,$tgl);
                $q_case.=",count(case when (id_range_waktu = 1 AND tanggal_penggunaan='$tgl') then 1 else null end) as $tgl_name_1";
                $q_case.=",count(case when (id_range_waktu = 2 AND tanggal_penggunaan='$tgl') then 1 else null end) as $tgl_name_2";
                $q_case.=",count(case when (id_range_waktu = 3 AND tanggal_penggunaan='$tgl') then 1 else null end) as $tgl_name_3";
                $q_case.=",count(case when (id_range_waktu = 4 AND tanggal_penggunaan='$tgl') then 1 else null end) as $tgl_name_4";
                $q_case.=",count(case when (id_range_waktu = 5 AND tanggal_penggunaan='$tgl') then 1 else null end) as $tgl_name_5";
                $td[]=array(
                    'periode'=>$tgl_name_1
                );
                $td[]=array(
                    'periode'=>$tgl_name_2
                );
                $td[]=array(
                    'periode'=>$tgl_name_3
                );
                $td[]=array(
                    'periode'=>$tgl_name_4
                );
                $td[]=array(
                    'periode'=>$tgl_name_5
                );
                $num++;
        }
        $q_case.=" from tb_peminjaman_ruang a JOIN `tb_laboratorium` b ON `a`.`id_laboratorium` = `b`.`id_laboratorium`
          
        where status='done'
        group by a.id_laboratorium ORDER BY a.id_laboratorium,tanggal_penggunaan";

        $query=$this->db->query($q_case)->result();

        $data['tgl'] = $kirim;
        $data['resultQuery'] = $query;
        $data['td']=$td;



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
