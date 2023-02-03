<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
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
}
