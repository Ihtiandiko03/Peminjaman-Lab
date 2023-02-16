<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        $this->load->library('upload');
        is_logged_in();
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
        $data['title'] = 'Halaman Peminjaman';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['peminjaman'] = $this->Peminjaman_model->peminjamanUser();
        $data['lab'] = $this->db->get('tb_laboratorium')->result_array();
        $data['rangeWaktu'] = $this->Peminjaman_model->roadster();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/index', $data);
        $this->load->view('templates/footer');
    }

    public function buatpeminjaman(){
        $data['title'] = 'Halaman Peminjaman';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['peminjaman'] = $this->Peminjaman_model->peminjamanUser();
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
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'Nama kegiatan wajib diisi'
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
    
                                    if($_POST['kapasitas']){
                                        //KULIAH
                                        $data = array();
                                        $index = 0;
        
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
                                                'id_range_waktu' => $range_waktu,
                                            ));
        
                                            $index++;
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
                                                'id_range_waktu' => $m['id_range_waktu']
                                            ));
    
                                            $index++;
                                        }
    
                                        $this->db->insert_batch('tb_peminjaman_ruang', $data);
                                    }
                            }
    
                            
                            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Peminjaman lab berhasil diajukan
                            </div>');
                            redirect('peminjaman');
                        
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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/show', $data);
        $this->load->view('templates/footer');

    }
}
