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
        $data['title'] = 'Form Peminjaman Lab';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $data['peminjaman'] = $this->Peminjaman_model->peminjamanUser();
        $data['lab'] = $this->db->get('tb_laboratorium')->result_array();
        $data['rangeWaktu'] = $this->Peminjaman_model->roadster();

        $mydate=getdate(date("U"));
        $hariIni =  "$mydate[year]-$mydate[mon]-$mydate[mday]";
        
        

        $begin = new DateTime( $hariIni );
        $end   = new DateTime( "2023-05-31" );
        $arr=array(
            '0'=>'Minggu',
            '1'=>'Senin',
            '2'=>'Selasa',
            '3'=>'Rabu',
            '4'=>'Kamis',
            '5'=>'Jumat',
            '6'=>'Sabtu'
        );

        
        $kirim="";
        for($i = $begin; $i <= $end; $i->modify('+1 day')){
            $tgl=$i->format("Y-m-d");
            $dayofweek = date('w', strtotime($tgl));
            if($dayofweek==1){
                $kirim.="<input type='checkbox' class='form-check-input' name='tgl[]' value='tgl'> Senin, ".$tgl."<br>";
            }
            else if($dayofweek==2){
                $kirim.="<input type='checkbox' class='form-check-input' name='tgl[]' value='tgl'> Selasa, ".$tgl."<br>";
            }
            else if($dayofweek==3){
                $kirim.="<input type='checkbox' class='form-check-input' name='tgl[]' value='tgl'> Rabu, ".$tgl."<br>";
            }
            else if($dayofweek==4){
                $kirim.="<input type='checkbox' class='form-check-input' name='tgl[]' value='tgl'> Kamis, ".$tgl."<br>";
            }
            else if($dayofweek==5){
                $kirim.="<input type='checkbox' class='form-check-input' name='tgl[]' value='tgl'> Jumat, ".$tgl."<br>";
            }
        }

        $data['draftanggal'] = $kirim;


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('peminjaman/buat_peminjaman', $data);
            $this->load->view('templates/footer');
        


    }



    public function upload(){

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nrk', 'NRK', 'required');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required');
        $this->form_validation->set_rules('notlp', 'Nomor Telephone', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('tanggal_penggunaan', 'Tanggal Penggunaan', 'required');
        $this->form_validation->set_rules('id_range_waktu', 'Range Waktu', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required');

        if($this->input->method() === 'post'){

                $config['upload_path']          = 'assets';
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

                        
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Peminjaman lab berhasil diajukan
                        </div>');
                        redirect('peminjaman');
                    
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

    public function kelola(){
        $data['title'] = 'Kelola Peminjaman';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['peminjaman'] = $this->Peminjaman_model->pengajuan();
        $data['lab'] = $this->db->get('tb_laboratorium')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/kelola_peminjaman', $data);
        $this->load->view('templates/footer');
    }

    public function proses($id){
        $this->db->set('status', 'proses');
        $this->db->where('id_peminjaman_ruang', $id);
        $this->db->update('tb_peminjaman_ruang');

        $data['title'] = 'Proses Peminjaman';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['detailPeminjaman'] = $this->Peminjaman_model->showPeminjaman($id);
        $data['lab'] = $this->db->get('tb_laboratorium')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/proses_peminjaman', $data);
        $this->load->view('templates/footer');
    }

    public function prosesPeminjaman($id){
        if($this->input->method() == 'post'){
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
        $data['title'] = 'Proses Peminjaman';
        $data['user'] = $this->db->get_where('tb_pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['range_waktu'] = $this->Peminjaman_model->roadster();

        
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

    public function hapusrangewaktu($id){
        $this->db->where('id_range_waktu', $id);
        $this->db->delete('tb_range_waktu');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Range waktu berhasil dihapus
        </div>');
        redirect('peminjaman/rangewaktu');
    }

    public function getDay(){

        $hari = $this->input->post('hari');
        var_dump($hari);
        die;
        

        $begin = new DateTime( "2023-01-01" );
        $end   = new DateTime( "2023-05-31" );
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
        for($i = $begin; $i <= $end; $i->modify('+1 day')){
            // echo $i->format("Y-m-d");echo '<br>';
            $tgl=$i->format("Y-m-d");
            // $tgl=new Datetime($i);
            $dayofweek = date('w', strtotime($tgl));
            // $result    = date('Y-m-d', strtotime(($day - $dayofweek).' day', strtotime($i)));
            // var_dump($dayofweek);
            if($dayofweek==$hari){
                $kirim.="<input type='checkbox' name='tgl[]' value='tgl'> ".$tgl;
            }
        }
        
        echo json_encode($kirim);
    }

    
}
