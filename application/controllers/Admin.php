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
        $data['minggukuliah'] = $this->db->get('tb_minggu_perkuliahan')->result_array();
        // $data['jadwal'] = $this->Peminjaman_model->jadwal();
        // $data['lab'] = $this->Peminjaman_model->getLaboratorium();
        // $data['lab_all'] = $this->db->get('tb_peminjaman_ruang')->result_array();
        // $data['jadwal1'] = $this->Peminjaman_model->jadwal1();

        $getMingguPerkuliahan = $this->db->get('tb_minggu_perkuliahan')->result_array();
        $mingguKuliah = $this->input->get('mingguPerkuliahan');
        if ($mingguKuliah) {
            foreach($getMingguPerkuliahan as $mk){
                if($mingguKuliah == $mk['id']){
                    $tglMulai = $mk['tgl_mulai'];
                    $tglSelesai = $mk['tgl_selesai'];
                }
            }

            $filter = $this->Peminjaman_model->search($tglMulai, $tglSelesai);
            $hariIni =  $tglMulai;
            $akhir = $tglSelesai;

        }else {
            $filter = $this->Peminjaman_model->jadwal3();

            $hariIni =  "2023-01-01";
            $akhir = "2023-06-30";
        }

        $data['jadwal2'] = $filter;
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
                
                $num++;
        }
        $q_case.=" from tb_peminjaman_ruang a JOIN `tb_laboratorium` b ON `a`.`id_laboratorium` = `b`.`id_laboratorium`
          
        where status='done'
        group by a.id_laboratorium ORDER BY a.id_laboratorium,tanggal_penggunaan";

        $query=$this->db->query($q_case)->result_array();

        $data['tgl'] = $kirim;
        $data['resultQuery'] = $query;
        $data['td']=$td;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
}
