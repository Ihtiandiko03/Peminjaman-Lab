<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        $this->load->library('upload');
        // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Halaman Peminjaman';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['peminjaman'] = $this->Peminjaman_model->laboratorium();
        $data['lab'] = $this->db->get('tb_laboratorium')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/index', $data);
        $this->load->view('templates/footer');
    }


    public function upload(){

        $this->form_validation->set_rules('id_laboratorium', 'Id Laboratorium', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nrk', 'NRK', 'required');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required');
        $this->form_validation->set_rules('notlp', 'Nomor Telephone', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('tanggal_penggunaan', 'Tanggal Penggunaan', 'required');
        $this->form_validation->set_rules('mulai_penggunaan', 'Mulai Penggunaan', 'required');
        $this->form_validation->set_rules('selesai_penggunaan', 'Selesai Penggunaan', 'required');

        if($this->input->method() === 'post'){

                $config['upload_path']          = 'assets';
                $config['allowed_types']        = 'pdf';


                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                
                if($this->input->post('mulai_penggunaan') < $this->input->post('selesai_penggunaan')){
                    if ($this->upload->do_upload('dokumen_pendukung')) 
                    {
                        $dokumen = $this->upload->data();

                        $data = [
                            'id_laboratorium' => $this->input->post('id_laboratorium'),
                            'nama' => $this->input->post('nama'),
                            'nrk' => $this->input->post('nrk'),
                            'prodi' => $this->input->post('prodi'),
                            'notlp' => $this->input->post('notlp'),
                            'email' => $this->input->post('email'),
                            'tanggal_penggunaan' => $this->input->post('tanggal_penggunaan'),
                            'mulai_penggunaan' => $this->input->post('mulai_penggunaan'),
                            'selesai_penggunaan' => $this->input->post('selesai_penggunaan'),
                            'judul_penelitian' => $this->input->post('judul_penelitian'),
                            'dokumen_pendukung' => $dokumen['file_name'],
                            'status' => $this->input->post('status')
                        ];
        
                        $this->db->insert('tb_peminjaman_ruang', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Peminjaman lab berhasil ditambahkan
                        </div>');
                        redirect('peminjaman');
                    }
                    else{
                        echo 'No File';
                        die;
                    }
                }
                else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Waktu tidak sesuai
                    </div>');
                    redirect('peminjaman');
                } 
        }
            
    }

    //Melihat detail peminjaman
    public function show($id){
        $data['title'] = 'Detail Peminjaman';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['detailPeminjaman'] = $this->Peminjaman_model->showPeminjaman($id);
        $data['lab'] = $this->db->get('tb_laboratorium')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/show', $data);
        $this->load->view('templates/footer');

    }
}
