<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        $this->load->library('upload');
        is_logged_in();
    }

    // public function index()
    // {
    //     $data['title'] = 'Halaman Peminjaman';
    //     $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        
    //     $data['peminjaman'] = $this->Peminjaman_model->peminjamanUser();
    //     $data['lab'] = $this->db->get('tb_laboratorium')->result_array();
    //     $data['rangeWaktu'] = $this->Peminjaman_model->roadster();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('peminjaman/index', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function buatpeminjaman(){
    //     $data['title'] = 'Halaman Peminjaman';
    //     $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        
    //     $data['peminjaman'] = $this->Peminjaman_model->peminjamanUser();
    //     $data['lab'] = $this->db->get('tb_laboratorium')->result_array();
    //     $data['rangeWaktu'] = $this->Peminjaman_model->roadster();

    //     $validasi = array(
    //         array(
    //             'field' => 'nama',
    //             'label' => 'Nama',
    //             'rules' => 'required|trim',
    //             'errors' => array(
    //                 'required' => 'Masukkan nama lengkap. Nama wajib diisi!'
    //             ),
    //         ),
    //         array(
    //             'field' => 'nrk',
    //             'label' => 'NRK',
    //             'rules' => 'required|trim',
    //             'errors' => array(
    //                 'required' => 'NRK wajib diisi'
    //             ),
    //         ),
    //         array(
    //             'field' => 'prodi',
    //             'label' => 'Program Studi',
    //             'rules' => 'required|trim',
    //             'errors' => array(
    //                 'required' => 'Program Studi wajib diisi'
    //             ),
    //         ),
    //         array(
    //             'field' => 'notlp',
    //             'label' => 'Nomor Telpon',
    //             'rules' => 'required|trim',
    //             'errors' => array(
    //                 'required' => 'Masukkan nomor hp yang bisa dihubungi'
    //             ),
    //         ),
    //         array(
    //             'field' => 'email',
    //             'label' => 'Email',
    //             'rules' => 'required|valid_email|trim',
    //             'errors' => array(
    //                 'required' => 'Email wajib diisi',
    //                 'valid_email' => 'Email harus valid'
    //             ),
    //         ),
    //         array(
    //             'field' => 'nama_kegiatan',
    //             'label' => 'Nama Kegiatan',
    //             'rules' => 'required|trim',
    //             'errors' => array(
    //                 'required' => 'Nama kegiatan wajib diisi'
    //             ),
    //         )
    //     );

    //     $this->form_validation->set_rules($validasi);

    //     if($this->form_validation->run()){
    
    //                 $config['upload_path']          = 'dokumen';
    //                 $config['allowed_types']        = 'pdf';
    
    
    //                 $this->load->library('upload', $config);
    //                 $this->upload->initialize($config);
    
    //                     if ($this->upload->do_upload('dokumen_pendukung')) 
    //                     {
    //                         $dokumen = $this->upload->data();
    
    //                                 $nama = $this->input->post('nama');
    //                                 $nrk = $this->input->post('nrk');
    //                                 $prodi = $this->input->post('prodi');
    //                                 $notlp = $this->input->post('notlp');
    //                                 $email = $this->input->post('email');
    //                                 $nama_kegiatan = $this->input->post('nama_kegiatan');
    //                                 $dokumen_pendukung = $dokumen['file_name'];
    //                                 $status = $this->input->post('status');
    //                                 $kapasitas = $this->input->post('kapasitas');
    //                                 $range_waktu = $this->input->post('id_range_waktu');
    
    //                                 if($_POST['kapasitas']){
    //                                     //KULIAH
    //                                     $data = array();
    //                                     $index = 0;
        
    //                                     foreach($_POST['tgl'] as $m){
                                            
        
    //                                         array_push($data, array(
    //                                             'nama' => $nama,
    //                                             'nrk' => $nrk,
    //                                             'prodi' => $prodi,
    //                                             'notlp' => $notlp,
    //                                             'email' => $email,
    //                                             'nama_kegiatan' => $nama_kegiatan,
    //                                             'dokumen_pendukung' => $dokumen_pendukung,
    //                                             'status' => $status,
    //                                             'tanggal_penggunaan' => $m['tanggal_penggunaan'],
    //                                             'kapasitas' => $kapasitas,
    //                                             'id_range_waktu' => $range_waktu,
    //                                         ));
        
    //                                         $index++;
    //                                     }
        
    //                                     $this->db->insert_batch('tb_peminjaman_ruang', $data);
    
                                        
    //                                 }else{
    //                                     //UMUM
    //                                     $data = array();
    //                                     $index = 0;
    
    //                                     foreach($_POST['multiple'] as $m){
                                            
    
    //                                         array_push($data, array(
    //                                             'nama' => $nama,
    //                                             'nrk' => $nrk,
    //                                             'prodi' => $prodi,
    //                                             'notlp' => $notlp,
    //                                             'email' => $email,
    //                                             'nama_kegiatan' => $nama_kegiatan,
    //                                             'dokumen_pendukung' => $dokumen_pendukung,
    //                                             'status' => $status,
    //                                             'tanggal_penggunaan' => $m['tanggal_penggunaan'],
    //                                             'kapasitas' => $m['kapasitas'],
    //                                             'id_range_waktu' => $m['id_range_waktu']
    //                                         ));
    
    //                                         $index++;
    //                                     }
    
    //                                     $this->db->insert_batch('tb_peminjaman_ruang', $data);
    //                                 }
    //                         }
    
                            
    //                         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //                         Peminjaman lab berhasil diajukan
    //                         </div>');
    //                         redirect('peminjaman');
                        
    //                 } else {
    //                     $this->load->view('templates/header', $data);
    //                     $this->load->view('templates/sidebar', $data);
    //                     $this->load->view('templates/topbar', $data);
    //                     $this->load->view('peminjaman/buat_peminjaman', $data);
    //                     $this->load->view('templates/footer');
    //                 }

    // }     

    // Melihat detail peminjaman
    // public function show($id){
    //     $data['title'] = 'Detail Peminjaman';
    //     $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
    //     $data['detailPeminjaman'] = $this->Peminjaman_model->showPeminjaman($id);
    //     $data['lab'] = $this->db->get('tb_laboratorium')->result_array();
    //     $data['nama_lab'] = $this->Peminjaman_model->ruangLab($id);

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('peminjaman/show', $data);
    //     $this->load->view('templates/footer');

    // }

    public function kelola(){
        $data['title'] = 'Kelola Peminjaman';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['lab'] = $this->db->get('tb_laboratorium')->result_array();
        $data['grupPeminjaman'] = $this->db->query("SELECT * FROM `tb_peminjaman_ruang` GROUP BY `nama_kegiatan`")->result_array();

        $getPeminjamanLab = $this->Peminjaman_model->pengajuan();
        $getStatus = $this->input->get('status_peminjaman');

        if($getStatus){
            $filter = $this->Peminjaman_model->searchStatus($getStatus);
            
        } else {
            $filter = $this->Peminjaman_model->pengajuan();
        }

        $data['peminjaman'] = $filter;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/kelola_peminjaman', $data);
        $this->load->view('templates/footer');
    }

    public function proses($id){
        // var_dump($id);
        // die;

        $this->db->set('status', 'proses');
        $this->db->where('id_peminjaman_ruang', $id);
        $this->db->update('tb_peminjaman_ruang');

        $data['title'] = 'Proses Peminjaman';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        // $data['detailPeminjaman'] = $this->Peminjaman_model->showPeminjaman($id);
        $data['detailPeminjaman'] = $this->db->query("SELECT `tb_peminjaman_ruang`.*, `tb_range_waktu`.`range_waktu`
        FROM `tb_peminjaman_ruang` JOIN `tb_range_waktu`
        ON `tb_peminjaman_ruang`.`id_range_waktu` = `tb_range_waktu`.`id_range_waktu`
        WHERE  `tb_peminjaman_ruang`.`id_peminjaman_ruang`= $id")->result_array();
        $data['lab'] = $this->db->get('tb_laboratorium')->result_array();

        // var_dump( $data['detailPeminjaman']);
        // die;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/proses_peminjaman', $data);
        $this->load->view('templates/footer');
    }

    public function prosesPeminjaman($id){

        if($this->input->method() == 'post'){

            $getSeluruhDataPeminjaman = $this->Peminjaman_model->peminjamanDone();

            foreach($getSeluruhDataPeminjaman as $getData){
                //Kondisi Lab Prodi 1 hanya untuk prodi Teknik Informatika
                // if(($this->input->post('id_laboratorium') == '00001') && (($this->input->post('prodi') != 'Teknik Informatika'))){
                //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                //    Lab Prodi 1 hanya untuk Prodi Teknik Informatika
                //     </div>');
                //     redirect('peminjaman/proses/'.$id);
                // }

                //Kondisi ketika tanggal,jam, dan ruangan sudah terisi
                if(  ($getData['tanggal_penggunaan'] == ($this->input->post('tanggal_penggunaan'))) &&  ($getData['id_laboratorium'] == ($this->input->post('id_laboratorium'))) && ($getData['range_waktu'] == ($this->input->post('range_waktu'))) && ($this->input->post('status') == 'done') ){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Terdapat Tanggal, Jam, dan Ruang yang sama. Silahkan memilih ruangan yang lain
                    </div>');
                    redirect('peminjaman/proses/'.$id);
                }
            }

            $this->form_validation->set_rules('status', 'Status', 'required');

            $data = [
                'status' => $this->input->post('status'),
                'komentar' => $this->input->post('komentar') ? $this->input->post('komentar') : '',
                'id_laboratorium' => $this->input->post('id_laboratorium') ? $this->input->post('id_laboratorium') : ''
            ];

            $this->db->where('id_peminjaman_ruang', $id);
            $this->db->update('tb_peminjaman_ruang', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Success
                    </div>');
            redirect('peminjaman/kelola');
        }

    }

    public function rangewaktu(){
        $data['title'] = 'Range Waktu dan Tanggal Perkuliahan';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['range_waktu'] = $this->Peminjaman_model->roadster();
        $data['mingguKuliah'] = $this->db->get('tb_minggu_perkuliahan')->result_array();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/range_waktu', $data);
        $this->load->view('templates/footer');
    }

    public function buatrangewaktu(){
        $data['title'] = 'Form Range Waktu';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $data['range_waktu'] = $this->Peminjaman_model->roadster();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/buat_rangewaktu', $data);
        $this->load->view('templates/footer');
    }

    public function upload_rangewaktu(){
        if($this->input->method() == 'post'){
            $data = array();
            $index = 0;

            foreach($_POST['multiple'] as $m){

                $range_waktu = "".$m['jam_mulai']."-".$m['jam_selesai']."";

                array_push($data, array(
                    'range_waktu' => $range_waktu,
                    'jam_mulai' => $m['jam_mulai'],
                    'jam_selesai' => $m['jam_selesai']
                ));

                $index++;
            }

            $this->db->insert_batch('tb_range_waktu', $data);

        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Range waktu berhasil dibuat
        </div>');
        redirect('peminjaman/rangewaktu');
    }

    public function edit_rangewaktu($id){
        if($this->input->method() == 'post'){

            $range_waktu = "".$this->input->post('jam_mulai')."-".$this->input->post('jam_selesai')."";

            $data = [
                'range_waktu' => $range_waktu,
                'jam_mulai' => $this->input->post('jam_mulai'),
                'jam_selesai' => $this->input->post('jam_selesai')
            ];

            $this->db->where('id_range_waktu', $id);
            $this->db->update('tb_range_waktu', $data);

        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Range waktu berhasil diubah
        </div>');
        redirect('peminjaman/rangewaktu');

    }

    public function editMingguKuliah($id){
        if($this->input->method() == 'post'){

            $data = [
                'tgl_mulai' => $this->input->post('tgl_mulai'),
                'tgl_selesai' => $this->input->post('tgl_selesai')
            ];

            $this->db->where('id', $id);
            $this->db->update('tb_minggu_perkuliahan', $data);

        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Tanggal berhasil diubah
        </div>');
        redirect('peminjaman/rangewaktu');
    }

    public function hapusrangewaktu($id){
        $this->db->where('id_range_waktu', $id);
        $this->db->delete('tb_range_waktu');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Range waktu berhasil dihapus
        </div>');
        redirect('peminjaman/rangewaktu');
    }

    public function hapus($id,$url){

        // var_dump($id);
        // var_dump($url);
        // die;

        $this->db->query("DELETE FROM `tb_peminjaman_ruang` WHERE `id_peminjaman_ruang`=$id");
        // $this->Peminjaman_model->hapus($id);
        
        // unlink('dokumen/'.$getPeminjaman['dokumen_pendukung']);

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Peminjaman berhasil dihapus </div>');
        redirect('peminjaman/lihat/'.$url);
    }



    public function editPeminjaman($id){
        $data['title'] = 'Edit Peminjaman';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['rangeWaktu'] = $this->Peminjaman_model->roadster();
        $data['lab'] = $this->db->get('tb_laboratorium')->result_array();
        $data['data'] = $this->Peminjaman_model->showPeminjaman2($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/edit', $data);
        $this->load->view('templates/footer');
    }

    public function prosesEditPeminjaman($id){
        
        if($this->input->method() == 'post'){

            // var_dump($this->input->post('id_laboratorium'));
            // die;

            $getSeluruhDataPeminjaman = $this->Peminjaman_model->peminjamanDone();
            
            foreach($getSeluruhDataPeminjaman as $getData){
                //Kondisi ketika tanggal,jam, dan ruangan sudah terisi
                if(  (($this->input->post('tanggal_penggunaan')) == $getData['tanggal_penggunaan']) && (($this->input->post('id_laboratorium')) == $getData['id_laboratorium']) && (($this->input->post('id_range_waktu')) == $getData['id_range_waktu']) ){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Terdapat Tanggal, Jam, dan Ruang yang sama. Silahkan memilih ruangan yang lain
                    </div>');
                    redirect('peminjaman/editPeminjaman/'.$id);
                }
            }



            $id_peminjaman = (int)$id;

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
                $tanggal_penggunaan = $this->input->post('tanggal_penggunaan');
                $id_laboratorium = $this->input->post('id_laboratorium');

                $data = array(
                    'id_laboratorium' => $id_laboratorium,
                    'nama' => $nama,
                    'nrk' => $nrk,
                    'prodi' => $prodi,
                    'notlp' => $notlp,
                    'email' => $email,
                    'nama_kegiatan' => $nama_kegiatan,
                    'dokumen_pendukung' => $dokumen_pendukung,
                    'status' => $status,
                    'tanggal_penggunaan' => $tanggal_penggunaan,
                    'kapasitas' => $kapasitas,
                    'id_range_waktu' => $range_waktu,
                    'email_pengguna' => $email_pengguna
                );

                $this->db->where('id_peminjaman_ruang', $id_peminjaman);
                $this->db->update('tb_peminjaman_ruang', $data);

            } 
            else {
                $nama = $this->input->post('nama');
                $nrk = $this->input->post('nrk');
                $prodi = $this->input->post('prodi');
                $notlp = $this->input->post('notlp');
                $email = $this->input->post('email');
                $nama_kegiatan = $this->input->post('nama_kegiatan');
                $status = $this->input->post('status');
                $kapasitas = $this->input->post('kapasitas');
                $range_waktu = $this->input->post('id_range_waktu');
                $email_pengguna = $this->input->post('email_pengguna');
                $tanggal_penggunaan = $this->input->post('tanggal_penggunaan');
                $id_laboratorium = $this->input->post('id_laboratorium');

                $data = array(
                    'id_laboratorium' => $id_laboratorium,
                    'nama' => $nama,
                    'nrk' => $nrk,
                    'prodi' => $prodi,
                    'notlp' => $notlp,
                    'email' => $email,
                    'nama_kegiatan' => $nama_kegiatan,
                    'status' => $status,
                    'tanggal_penggunaan' => $tanggal_penggunaan,
                    'kapasitas' => $kapasitas,
                    'id_range_waktu' => $range_waktu,
                    'email_pengguna' => $email_pengguna
                );


                $this->db->where('id_peminjaman_ruang', $id_peminjaman);
                $this->db->update('tb_peminjaman_ruang', $data);
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                    Peminjaman lab berhasil diedit
                                    </div>');
                                    redirect('peminjaman/kelola');

        }
    }

    function lihat($nama_kegiatan){
        if ($_POST) {

            // var_dump($_POST['check']);
            // die;

            $data = array();
            $index = 0;

            foreach($_POST['check'] as $a){
                array_push($data, array(
                    'id_peminjaman_ruang' => $a,
                    'id_laboratorium' => $this->input->post('id_laboratorium'),
                    'status' => 'done'
                ));

                $index++;
            }

            $this->db->update_batch('tb_peminjaman_ruang', $data, 'id_peminjaman_ruang');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Peminjaman lab berhasil diajukan
                            </div>');
            redirect('peminjaman/lihat/'.$nama_kegiatan);

        }

        $nama = str_replace('%20', ' ', $nama_kegiatan);
    
        $data['url'] = $nama_kegiatan;
        $data['title'] = $nama;
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['lab'] = $this->db->get('tb_laboratorium')->result_array();
        $data['mingguKuliah'] = $this->db->get('tb_minggu_perkuliahan')->result_array();
        

        $getPeminjamanLab = $this->Peminjaman_model->pengajuan();
        $getStatus = $this->input->get('status_peminjaman');

        if($getStatus){
            $filter = $this->Peminjaman_model->searchStatus($getStatus,$nama);
            
        } else {
            $filter = $this->db->query("SELECT `tb_peminjaman_ruang`.*,  `tb_range_waktu`.`range_waktu`,DATEDIFF(CURRENT_DATE(), `created_at`) as `lama_pengajuan`
            FROM `tb_peminjaman_ruang` JOIN `tb_range_waktu`
            ON `tb_peminjaman_ruang`.`id_range_waktu` = `tb_range_waktu`.`id_range_waktu`
            WHERE `nama_kegiatan`= '$nama'
            ORDER BY `tb_peminjaman_ruang`.`status` ASC ")->result_array();
        }

        $data['peminjaman'] = $filter;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/lihatKelas', $data);
        $this->load->view('templates/footer');
    }

    // public function getDay(){

    //     $hari = $this->input->post('hari');
    //     $mydate=getdate(date("U"));
    //     $hariIni =  "$mydate[year]-$mydate[mon]-$mydate[mday]";

    //     $begin = new DateTime( $hariIni );
    //     $end   = new DateTime( "2023-05-31" );
    //     $arr=array(
    //         '0'=>'Minggu',
    //         '1'=>'Senin',
    //         '2'=>'Selasa',
    //         '3'=>'Rabu',
    //         '4'=>'Kamis',
    //         '5'=>'Jumat',
    //         '6'=>'Sabtu',
    //         '7'=>'Minggu'
    //     );
    //     $kirim="";
    //     $num = 0;
    //     for($i = $begin; $i <= $end; $i->modify('+1 day')){
    //         $tgl=$i->format("Y-m-d");
    //         $dayofweek = date('w', strtotime($tgl));
    //         if($dayofweek==$hari){
    //             $kirim.="<input type='checkbox' class='form-check-input' name='tgl[$num][tanggal_penggunaan]' value='$tgl'>".$arr[$hari].", ".$tgl."<br>";
    //             $num++;
    //         }
    //     }
        
    //     echo json_encode($kirim);
    // }

    
}
