<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->session->keep_flashdata('message');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        //Jika user belum login
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Login'
            ];
            $this->load->view('templates/auth_header', $data);

            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }
        //Jika user melakukan login
        else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        //membandingkan email dari inputan dengan email di database
        $user = $this->db->get_where('tb_pengguna', ['email' => $email])->row_array();

        //Jika usernya ada
        if ($user) {
            //mengecek apakah dalam kondisi aktif
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];

                    //Mengirim data ke session
                    $this->session->set_userdata($data);

                    //mengecek apabila rolenya admin akan redirect ke halaman admin
                    //apabila rolenya user akan redirect ke halaman user
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                }
                //Jika password inputan salah
                else {
                    $this->session->set_flashdata('message', 'Password Salah ');
                    redirect('auth');
                }
            }
            //JIka akun tidak aktif
            else {
                $this->session->set_flashdata('message', 'Akun tidak AKTIF');
                redirect('auth');
            }
        }
        //Jika tidak ada akun
        else {
            $this->session->set_flashdata('message', 'Tidak Ada Akun');
            redirect('auth');
        }
    }

    public function register()
    {
        $data = [
            'title' => 'Halaman Register'
        ];

        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Nama Lengkap harus diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_pengguna.email]', [
            'required' => 'Email wajib diisi',
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Password wajib diisi',
            'matches' => 'Password tidak sama'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'required' => 'Masukkan ulang password'
        ]);

        //JIka tidak melakukan registrasi
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        }
        //Jika melakukan registrasi
        else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => $this->input->post('email', true),
                'image' => 'default.PNG',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('tb_pengguna', $data);

            $this->session->set_flashdata('message', 'Akun sudah dibuat');

            redirect('auth');
        }
    }

    public function logout()
    {
        //logout menghapus session
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', 'Telah Keluar');

        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
