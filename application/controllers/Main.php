<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        $this->output->enable_profiler(TRUE);
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
        $data['title'] = 'Timeline';
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

            // $filter = $this->Peminjaman_model->search($tglMulai, $tglSelesai);
            $awal =  $tglMulai;
            $akhir = $tglSelesai;

        }else {
            // $filter = $this->Peminjaman_model->jadwal3();

            $awal =  "2023-01-01";
            $akhir = "2023-06-30";
        }

        // $dataKuliah = $filter;
        
        // $akhir =  date('Y-m-d', strtotime('+153 days', strtotime($awal)));

        $begin = new DateTime( $awal );
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
        $q_case='SELECT `a`.`id_laboratorium`, `d`.`nama_lab`, ';
        $td = '';
        $td=array();

        $rw = $this->db->get('tb_range_waktu')->result_array();
        // echo count($rw);
        // // var_dump($rw);
        // die;

        

        for($i = $begin; $i <= $end; $i->modify('+1 day')){
            $tgl=$i->format("Y-m-d");
            $tgl_name = array();

            $hari = date("l", strtotime($tgl));
            if($hari == 'Saturday' || $hari == 'Sunday'){

            }

            else{

                for($j=1; $j<=count($rw); $j++){
                    $tgl_nama=$i->format("Y_m_d_$j");
                    array_push($tgl_name, $tgl_nama);
                }



                // $tgl_name_1=$i->format("Y_m_d_1");
                // $tgl_name_2=$i->format("Y_m_d_2");
                // $tgl_name_3=$i->format("Y_m_d_3");
                // $tgl_name_4=$i->format("Y_m_d_4");
                
            
                array_push($kirim,$tgl);

                $num=1;
                if($i != $end){
                    foreach ($tgl_name as $key) {
                        $q_case.="(SELECT `nama_kegiatan` from `tb_peminjaman_ruang` `b` where `a`.`id_laboratorium`=`b`.`id_laboratorium` and `b`.`tanggal_penggunaan`='$tgl' and `b`.`id_range_waktu`='$num') as '$key',";
                        $num++;
                    }
                }
                else{
                    foreach ($tgl_name as $key) {
                        if($num == count($tgl_name)){
                            $q_case.="(SELECT `nama_kegiatan` from `tb_peminjaman_ruang` `b` where `a`.`id_laboratorium`=`b`.`id_laboratorium` and `b`.`tanggal_penggunaan`='$tgl' and `b`.`id_range_waktu`='$num') as '$key'";
                        }
                        else{
                            $q_case.="(SELECT `nama_kegiatan` from `tb_peminjaman_ruang` `b` where `a`.`id_laboratorium`=`b`.`id_laboratorium` and `b`.`tanggal_penggunaan`='$tgl' and `b`.`id_range_waktu`='$num') as '$key',";
                        }
                        $num++;
                    }
                }

                
                // $q_case.=", `b.$no.1`.`nama_kegiatan` as '$tgl_name_1', `b.$no.2`.`nama_kegiatan` as '$tgl_name_2', `b.$no.3`.`nama_kegiatan` as '$tgl_name_3', `b.$no.4`.`nama_kegiatan` as '$tgl_name_4'  ";

                // $temporary.="LEFT JOIN(SELECT * FROM tb_peminjaman_ruang  where tanggal_penggunaan='$tgl' and id_range_waktu='1') as `b.$no.1` on `b.$no.1`.`id_laboratorium`=`a`.`id_laboratorium`";
                // $temporary.="LEFT JOIN(SELECT * FROM tb_peminjaman_ruang  where tanggal_penggunaan='$tgl' and id_range_waktu='2') as `b.$no.2` on `b.$no.2`.`id_laboratorium`=`a`.`id_laboratorium`";
                // $temporary.="LEFT JOIN(SELECT * FROM tb_peminjaman_ruang  where tanggal_penggunaan='$tgl' and id_range_waktu='3') as `b.$no.3` on `b.$no.3`.`id_laboratorium`=`a`.`id_laboratorium`";
                // $temporary.="LEFT JOIN(SELECT * FROM tb_peminjaman_ruang  where tanggal_penggunaan='$tgl' and id_range_waktu='4') as `b.$no.4` on `b.$no.4`.`id_laboratorium`=`a`.`id_laboratorium`";


                foreach ($tgl_name as $key) {
                    $td[]=array(
                        'periode'=>$key
                    );
                }

                // $td[]=array(
                //     'periode'=>$tgl_name_1
                // );
                // $td[]=array(
                //     'periode'=>$tgl_name_2
                // );
                // $td[]=array(
                //     'periode'=>$tgl_name_3
                // );
                // $td[]=array(
                //     'periode'=>$tgl_name_4
                // );
            }
            // $no++;
        }

        // $q_case.=substr($q_case, 0, -1);

        $q_case.=" from tb_laboratorium a JOIN tb_laboratorium d ON `a`.`id_laboratorium`=`d`.`id_laboratorium`";
        

        // var_dump($q_case);
        // die;

        // $q_case.=" ORDER BY a.id_laboratorium";
        $query=$this->db->query($q_case)->result_array();

        $data['query'] = $query;
        $data['colspan'] = count($rw);

        // var_dump($td);
        // die;

        // $tmp = array();

        // foreach($query as $jadwal){
        //     foreach($td as $t){
        //         if($jadwal[$t['periode']] == 1){
        //             foreach ($dataKuliah as $j) {
        //                 $date = $j['tanggal_penggunaan'];
        //                 $id_range_waktu = $j['id_range_waktu'];
        //                 $tgl = date('Y_m_d', strtotime($date));
        //                 $gabung = $tgl.'_'.$id_range_waktu;

        //                 if($gabung == $t['periode']){
        //                     if($j['id_laboratorium'] == $jadwal['id_laboratorium']){       
        //                         $a2 = array($t['periode'] => $j['id_laboratorium'].','.$j['tanggal_penggunaan'].','.$j['id_range_waktu']);
        //                         $jadwal = array_replace($jadwal,$a2);
        //                     }
        //                 }
        //             }
        //         }
        //         else {
        //             // $a2 = array($t['periode'] => '');
        //             // $jadwal = array_replace($jadwal,$a2);
        //         }
        //     }
        //     // var_dump($jadwal);
        //     // die;

        //     array_push($tmp,$jadwal);
        // }

        // // var_dump($tmp);
        // // die;

        // $data['result'] = $tmp;
        

        
    
        // foreach ($td as $t) {
        //     foreach ($dataKuliah as $j) {
        //         $date = $j['tanggal_penggunaan'];
        //         $id_range_waktu = $j['id_range_waktu'];
        //         $tgl = date('Y_m_d', strtotime(str_replace('-', '/', $date)));
                
        //         $gabung = $tgl.'_'.$id_range_waktu;

        //         if($gabung == $t['periode']){
        //             array_push($te, array(
        //                 'periode' => $t['periode'],
        //                 'nama_kegiatan' => $j['nama_kegiatan'],
        //                 'id_laboratorium' => $j['id_laboratorium'],
        //                 'prodi' => $j['prodi']
        //             ));
        //         } 
        //     }

        // }

        // var_dump($te);
        // die;


        // foreach ($query as $key) {
        //     foreach ($td as $t) {
        //         if($key[$t['periode']] == 1){
        //             echo 'Ada';
        //         }
        //     }
        // }
        
        

        $data['tgl'] = $kirim;
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
