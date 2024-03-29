<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        $this->load->library('upload');
        $this->load->library('unit_test');
        is_logged_in();
        
    }

    private function testPeminjaman($data){
        if($this->db->insert('tb_peminjaman_ruang', $data)){
            return true;
        }
        else{
            return false;
        }
    }

    public function testBuatPeminjaman(){

        $data = [
            'nama' => 'testing12345',
            'nrk' => '1610040309010001',
            'prodi' => 'Teknik Informatika',
            'notlp' => '082377102513',
            'email' => 'tugrp@example.com',
            'nama_kegiatan' => 'Kegiatan Tugas Akhir',
            'dokumen_pendukung' => 'Dokumen.pdf',
            'status' => 'request',
            'tanggal_penggunaan' => '2021-10-01',
            'kapasitas' => '80',
            'id_range_waktu' => '2',
            'email_pengguna' => 'wihtiandiko@gmail.com'
        ];

        $test = $this->testPeminjaman($data);

        $expectedResult = true;
        $testName = "Menguji fungsi buat peminjaman";

        echo $this->unit->run($test, $expectedResult, $testName);
    }

    public function index()
    {

        $data['title'] = 'Halaman Staff';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }


    public function peminjaman()
    {
        $sessionUser = $this->session->userdata('email');

        $data['title'] = 'Halaman Peminjaman';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $sessionUser])->row_array();
        
        // $data['peminjaman'] = $this->Peminjaman_model->peminjamanUser($sessionUser);

        $data['peminjaman'] = $this->db->query("SELECT `tb_peminjaman_ruang`.*
        FROM `tb_peminjaman_ruang`
        WHERE `tb_peminjaman_ruang`.`email_pengguna` = '$sessionUser'
        GROUP BY `nama_kegiatan`")->result_array();

        $data['lab'] = $this->db->get('tb_laboratorium')->result_array();
        $data['rangeWaktu'] = $this->Peminjaman_model->roadster();
        $data['mingguKuliah'] = $this->db->get('tb_minggu_perkuliahan')->result_array();

        $getStatus = $this->input->get('status_peminjaman');

        if($getStatus){
            $filter = $this->Peminjaman_model->filterPeminjamanUser($sessionUser,$getStatus);
            
        } else {
            $filter =$this->db->query("SELECT `tb_peminjaman_ruang`.*
            FROM `tb_peminjaman_ruang`
            WHERE `tb_peminjaman_ruang`.`email_pengguna` = '$sessionUser'
            GROUP BY `nama_kegiatan`")->result_array();
        }

        $data['peminjaman'] = $filter;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/index', $data);
        $this->load->view('templates/footer');
    }

    public function buatpeminjaman(){
        $data['title'] = 'Peminjaman Laboratorium';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['lab'] = $this->db->get('tb_laboratorium')->result_array();
        $data['rangeWaktu'] = $this->Peminjaman_model->roadster();

        $validasi = array(
            array(
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'Masukkan nama lengkap. Nama wajib diisi!'
                ),
            ),
            array(
                'field' => 'nrk',
                'label' => 'NRK',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'NRK wajib diisi'
                ),
            ),
            array(
                'field' => 'prodi',
                'label' => 'Program Studi',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'Program Studi wajib diisi'
                ),
            ),
            array(
                'field' => 'notlp',
                'label' => 'Nomor Telpon',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'Masukkan nomor hp yang bisa dihubungi'
                ),
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email|trim',
                'errors' => array(
                    'required' => 'Email wajib diisi',
                    'valid_email' => 'Email harus valid'
                ),
            ),
            array(
                'field' => 'nama_kegiatan',
                'label' => 'Nama Kegiatan',
                'rules' => 'required|trim|max_length[35]',
                'errors' => array(
                    'required' => 'Nama kegiatan wajib diisi',
                    'max_length[35]' => 'Nama kegiatan kepanjangan'
                ),
            )
        );

        $this->form_validation->set_rules($validasi);

        if($this->form_validation->run()){
    
                    $config['upload_path']          = 'dokumen';
                    $config['allowed_types']        = 'pdf';
    
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
    
                        if ($this->upload->do_upload('dokumen_pendukung')) 
                        {
                            
                            $dokumen = $this->upload->data();
    
                                    $nama = $this->input->post('nama');
                                    $nrk = $this->input->post('nrk');
                                    $prodi = $this->input->post('prodi');
                                    $notlp = $this->input->post('notlp');
                                    $email = $this->input->post('email');
                                    $nama_kegiatan = $this->input->post('nama_kegiatan');
                                    $dokumen_pendukung = $dokumen['file_name'];
                                    $status = $this->input->post('status');
                                    $kapasitas = $this->input->post('kapasitas');
                                    $range_waktu = $this->input->post('id_range_waktu');
                                    $email_pengguna = $this->input->post('email_pengguna');
    
                                    if($_POST['kapasitas']){
                                        //KULIAH
                                        $data = array();
                                        $index = 0;

                                        

                                        foreach($_POST['multi'] as $l){
                                            foreach($_POST['tgl'] as $m){
                                                
            
                                                array_push($data, array(
                                                    'nama' => $nama,
                                                    'nrk' => $nrk,
                                                    'prodi' => $prodi,
                                                    'notlp' => $notlp,
                                                    'email' => $email,
                                                    'nama_kegiatan' => $nama_kegiatan,
                                                    'dokumen_pendukung' => $dokumen_pendukung,
                                                    'status' => $status,
                                                    'tanggal_penggunaan' => $m['tanggal_penggunaan'],
                                                    'kapasitas' => $kapasitas,
                                                    'id_range_waktu' => $l['id_range_waktu'],
                                                    'email_pengguna' => $email_pengguna
                                                ));
            
                                                $index++;
                                            }
            
                                        }
                                            $this->db->insert_batch('tb_peminjaman_ruang', $data);
                                        
                                        
                                    }else{
                                        //UMUM

                                        $data = array();
                                        $index = 0;

                                        
    
                                            foreach($_POST['multiple'] as $m){
                                                
        
                                                array_push($data, array(
                                                    'nama' => $nama,
                                                    'nrk' => $nrk,
                                                    'prodi' => $prodi,
                                                    'notlp' => $notlp,
                                                    'email' => $email,
                                                    'nama_kegiatan' => $nama_kegiatan,
                                                    'dokumen_pendukung' => $dokumen_pendukung,
                                                    'status' => $status,
                                                    'tanggal_penggunaan' => $m['tanggal_penggunaan'],
                                                    'kapasitas' => $m['kapasitas'],
                                                    'id_range_waktu' => $m['id_range_waktu'],
                                                    'email_pengguna' => $email_pengguna
                                                ));
        
                                                $index++;
                                            }
        
                                            $this->db->insert_batch('tb_peminjaman_ruang', $data);

                                        
                                    }
                                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                    Peminjaman lab berhasil diajukan
                                    </div>');
                                    redirect('user/peminjaman');
                        }
                        else{
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                    Peminjaman gagal dokumen tidak sesuai format. Harus format .pdf
                                    </div>');
                                    redirect('user/buatpeminjaman');
                        }
    
                            
                        
                    } else {
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/sidebar', $data);
                        $this->load->view('templates/topbar', $data);
                        $this->load->view('peminjaman/buat_peminjaman', $data);
                        $this->load->view('templates/footer');
                    }
    }     

    //Melihat detail peminjaman
    public function show($id){
        

        $data['title'] = 'Detail Peminjaman';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['detailPeminjaman'] = $this->Peminjaman_model->showPeminjaman($id);
        $data['lab'] = $this->db->get('tb_laboratorium')->result_array();
        $data['nama_lab'] = $this->Peminjaman_model->ruangLab($id);
        $data['mingguKuliah'] = $this->db->get('tb_minggu_perkuliahan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/show', $data);
        $this->load->view('templates/footer');

    }

    public function getDay(){

        $mingguPerkuliahan = $this->db->get('tb_minggu_perkuliahan')->result_array();
        $hari = $this->input->post('hari');
        $mydate=getdate(date("U"));
        $hariIni =  "$mydate[year]-$mydate[mon]-$mydate[mday]";

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
            '6'=>'Sabtu',
            '7'=>'Minggu'
        );
        $kirim="";
        $num = 0;
        for($i = $begin; $i <= $end; $i->modify('+1 day')){
            $tgl=$i->format("Y-m-d");
            $dayofweek = date('w', strtotime($tgl));
            if($dayofweek==$hari){
                //Cek minggu keberapa
                foreach ($mingguPerkuliahan as $mk) {
                    if($tgl >= $mk['tgl_mulai'] && $tgl <= $mk['tgl_selesai']){
                        $timestamp = strtotime($tgl); 
                        $new_date = date("d-m-Y", $timestamp);
                        $kirim.="<input type='checkbox' class='form-check-input' name='tgl[$num][tanggal_penggunaan]' value='$tgl'>".$mk['nama_minggu'].', '.$new_date."<br>";
                    }    
                }


                
                $num++;
            }
        }
        
        echo json_encode($kirim);
    }

    public function lihat($nama_kegiatan){
        $sessionUser = $this->session->userdata('email');
        $data['url'] = $nama_kegiatan;
        $getStatus = $this->input->get('status_peminjaman');


        $nama = str_replace('%20', ' ', $nama_kegiatan);

        $data['title'] = $nama;
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $sessionUser])->row_array();
        $data['rangeWaktu'] = $this->Peminjaman_model->roadster();
        
        $data['lab'] = $this->db->get('tb_laboratorium')->result_array();
        $data['mingguKuliah'] = $this->db->get('tb_minggu_perkuliahan')->result_array();

        //$data['peminjaman'] = $this->db->query("SELECT `tb_peminjaman_ruang`.*,`tb_range_waktu`.`range_waktu` FROM `tb_peminjaman_ruang` JOIN `tb_range_waktu` ON `tb_peminjaman_ruang`.`id_range_waktu`=`tb_range_waktu`.`id_range_waktu`  WHERE `tb_peminjaman_ruang`.`nama_kegiatan`='$nama' AND `tb_peminjaman_ruang`.`email_pengguna`='$sessionUser'")->result_array();
        
        if($getStatus){
            $filter = $this->Peminjaman_model->searchStatus($getStatus,$nama);
            
        } else {
            $filter = $this->db->query("SELECT `tb_peminjaman_ruang`.*,`tb_range_waktu`.`range_waktu` FROM `tb_peminjaman_ruang` JOIN `tb_range_waktu` ON `tb_peminjaman_ruang`.`id_range_waktu`=`tb_range_waktu`.`id_range_waktu`  WHERE `tb_peminjaman_ruang`.`nama_kegiatan`='$nama' AND `tb_peminjaman_ruang`.`email_pengguna`='$sessionUser'")->result_array();
        }

        $data['peminjaman'] = $filter;




        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihatKelas', $data);
        $this->load->view('templates/footer');
    }
}