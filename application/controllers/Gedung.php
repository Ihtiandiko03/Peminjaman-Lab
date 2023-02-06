<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gedung extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gedung_model');
        // is_logged_in();
    }

    public function index()
    {

        $data['title'] = 'Halaman Gedung';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['gedung'] = $this->db->get('tb_gedung')->result_array();

        $this->form_validation->set_rules('nama_gedung', 'Nama Gedung', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('gedung/index', $data);
            $this->load->view('templates/footer');
        }
        else{
            $this->db->insert('tb_gedung', ['nama_gedung' => $this->input->post('nama_gedung')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Gedung baru berhasil ditambahkan
            </div>');
            redirect('gedung');
        }
    }

    public function edit($id){
        
        $data = array(
            'nama_gedung' => $this->input->post('nama_gedung')
        );
    
        $this->db->where('id_gedung', $id);
        $this->db->update('tb_gedung', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Gedung berhasil diubah
            </div>');

        redirect('gedung');
    }

    public function delete($id){

        $this->Gedung_model->hapusGedung($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Gedung berhasil dihapus
        </div>');

        redirect('gedung');
    }

    public function lab(){
        $data['title'] = 'Halaman Laboratorium';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['lab'] = $this->db->get('tb_laboratorium')->result_array();

        $data['lab'] = $this->Gedung_model->laboratorium();
        $data['gedung'] = $this->db->get('tb_gedung')->result_array();

        $this->form_validation->set_rules('kode_ruang', 'Kode Ruang', 'required');
        $this->form_validation->set_rules('nama_lab', 'Nama Lab', 'required');
        $this->form_validation->set_rules('id_gedung', 'Id Gedung', 'required');
        $this->form_validation->set_rules('lantai', 'Lantai', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('kontak', 'Kontak', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('gedung/lab', $data);
            $this->load->view('templates/footer');
        }
        else{
            $data = [
                'kode_ruang' => $this->input->post('kode_ruang'),
                'nama_lab' => $this->input->post('nama_lab'),
                'id_gedung' => $this->input->post('id_gedung'),
                'lantai' => $this->input->post('lantai'),
                'lokasi' => $this->input->post('lokasi'),
                'email' => $this->input->post('email'),
                'kontak' => $this->input->post('kontak'),
                'kapasitas' => $this->input->post('kapasitas')
            ];

            $this->db->insert('tb_laboratorium', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Laboratorium berhasil ditambahkan
          </div>');
            redirect('gedung/lab');
        }
    }

    public function editLab($id){

        $this->form_validation->set_rules('kode_ruang', 'Kode Ruang', 'required');
        $this->form_validation->set_rules('nama_lab', 'Nama Lab', 'required');
        $this->form_validation->set_rules('id_gedung', 'Id Gedung', 'required');
        $this->form_validation->set_rules('lantai', 'Lantai', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('kontak', 'Kontak', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required');
        
        $data = array(
                'kode_ruang' => $this->input->post('kode_ruang'),
                'nama_lab' => $this->input->post('nama_lab'),
                'id_gedung' => $this->input->post('id_gedung'),
                'lantai' => $this->input->post('lantai'),
                'lokasi' => $this->input->post('lokasi'),
                'email' => $this->input->post('email'),
                'kontak' => $this->input->post('kontak'),
                'kapasitas' => $this->input->post('kapasitas')
        );
    
        $this->db->where('id_laboratorium', $id);
        $this->db->update('tb_laboratorium', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Laboratorium berhasil diubah
            </div>');

        redirect('gedung/lab');
    }

    public function deleteLab($id){

        $this->Gedung_model->hapusLab($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Laboratorium berhasil dihapus
        </div>');

        redirect('gedung/lab');
    }
}
