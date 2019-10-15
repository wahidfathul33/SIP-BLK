<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_perusahaan extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_perusahaan', 'mp');
        $this->load->model('M_wilayah', 'wil');
        $this->load->library('form_validation');
 
        //cek login
        if($this->session->userdata('role') != '4'){
            redirect('c_login/login');            
        }
    }

    public function index()
    {
        if ($this->mp->get_id_perusahaan() == NULL) 
        {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger">Silakan isi data perusahaan Anda!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
            redirect('c_perusahaan/profil_input');
        }

        // $tot_member = $this->mp->total_loker();
        // $tot_perusahaan = $this->mp->total_perusahaan();
        // $tot_lowongan = $this->mp->total_lowongan();

        // $data = array(
        //     'tot_member' => $tot_member,
        //     'tot_perusahaan' => $tot_perusahaan,
        //     'tot_lowongan' => $tot_lowongan );

        $this->template->set('title', 'Dashbord Perusahaan | SIP BLK Surakarta');
        $this->template->set('header', 'Selamat Datang');
        $this->template->set('breadcrumb', 'Dashboard');
        $this->template->set('breadcrumb2', '');
        $this->template->load('perusahaan_layout', 'contents' , 'v_perusahaan/dashboard');
    }

    public function cek_data_profil()
    {
        $row    = $this->mp->get_perusahaan();
        if($row->id_perusahaan == NULL){
            $this->session->set_flashdata('notif', '<div class="alert alert-danger">Silakan isi data perusahaan Anda!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
            redirect(site_url('c_perusahaan/profil_input'));
        }elseif ($row->deskripsi == NULL) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger">Silakan lengkapi data perusahaan Anda!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
            redirect(site_url('c_perusahaan/profil_edit'));
        }
    }

    // =============================================================================
    // menu profil start
    // =============================================================================

    public function profil()
    {
        $this->cek_data_profil();
        $row    = $this->mp->get_perusahaan();
        $alamat = json_decode($row->alamat_perusahaan);
        
        $data = array(
            'id_perusahaan' => $row->id_perusahaan,
            'id_users' => $row->id_users,
            'nama_perusahaan' => $row->nama_perusahaan,
            'alamat' => $alamat->alamat,
            'kelurahan' => $alamat->kelurahan,
            'kecamatan' => $alamat->kecamatan,
            'kota' => $alamat->kota,
            'provinsi' => $alamat->provinsi,
            'kode_pos' => $row->kode_pos,
            'skala' => $row->skala,
            'no_telpon' => $row->no_telpon,
            'email' => $row->email,
            'bidang_usaha' => $row->bidang_usaha,
            'website' => $row->website,
            'deskripsi' => $row->deskripsi,
            'logo' => $row->logo,
            'siup' => $row->siup,
            'npwp' => $row->npwp,
            );            
        $this->template->set('title', 'Profil | SIP BLK Surakarta');
        $this->template->set('header', 'Profil');
        $this->template->set('breadcrumb', 'Profil');
        $this->template->set('breadcrumb2', '');
        $this->template->load('perusahaan_layout', 'contents' , 'v_perusahaan/profil', $data);
    }

    public function profil_input()
    {
        $skala = array('','Mikro','Kecil','Menengah','Besar');
        $pemilikan = array('','Perusahaan perorangan (PO)','Firma (Fa)','Perseroan Komanditer (CV)','Perseroan Terbatas (PT)','Perseroan Terbatas Negara (Persero)','Perusahaan Daerah (PD)','Perusahaan Negara Umum (Perum)','Perusahaan Negara Jawatan (Perjan)','Koperasi','Yayasan');
        $data = array(
            'provinsi' => $this->wil->get_provinsi(),
            'bidang' => $this->mp->get_bidang(),
            'skala' => $skala,
            'pemilikan' => $pemilikan,
        );


        $this->template->set('title', 'Profil | SIP BLK Surakarta');
        $this->template->set('header', 'Profil');
        $this->template->set('breadcrumb', 'Profil');
        $this->template->set('breadcrumb2', '');
        $this->template->load('perusahaan_layout', 'contents' , 'v_perusahaan/profil_add', $data);
    }

    public function profil_input_act()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger">Input profil perusahaan gagal! Silakan cek kembali data perusahaan Anda!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
            $this->profil_input();
        } else {

            if(! empty($_FILES) && $_FILES['logo']['name'] != null){
                $namaFile = "logo-".$this->session->userdata('id_users')."-".preg_replace('/\s+/', '_',$_FILES['logo']['name']);

                $config['upload_path'] = './uploads/images';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']     = '1024';
                $this->load->library('upload', $config);

                $config['file_name'] = $namaFile;
                $this->upload->initialize($config);

                if($this->upload->do_upload('logo')){
                    $logo = $namaFile;
                }
                else{
                    $error['error'] =$this->upload->display_errors();
                    $this->session->set_flashdata('logo',$error['error']);
                    redirect('c_perusahaan/profil_input','refresh');
                }
            }
            else{
                $this->session->set_flashdata('logo', 'Logo tidak boleh kosong');
                redirect('c_perusahaan/profil_input','refresh');
            }

            if(! empty($_FILES) && $_FILES['siup']['name'] != null){
                $namaFile = "siup-".$this->session->userdata('id_users')."-".preg_replace('/\s+/', '_',$_FILES['siup']['name']);

                $config['upload_path'] = './uploads/documents';
                $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                $config['max_size']     = '1024';
                $this->load->library('upload', $config);

                $config['file_name'] = $namaFile;
                $this->upload->initialize($config);

                if($this->upload->do_upload('siup')){
                    $siup = $namaFile;
                }
                else{
                    $error['error'] =$this->upload->display_errors();
                    $this->session->set_flashdata('siup',$error['error']);
                    redirect('c_perusahaan/profil_input','refresh');
                }
            }
            else{
                $this->session->set_flashdata('siup', 'SIUP tidak boleh kosong');
                redirect('c_perusahaan/profil_input','refresh');
            }

            if(! empty($_FILES) && $_FILES['npwp']['name'] != null){
                $namaFile = "npwp-".$this->session->userdata('id_users')."-".preg_replace('/\s+/', '_',$_FILES['npwp']['name']);

                $config['upload_path'] = './uploads/documents';
                $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                $config['max_size']     = '1024';
                $this->load->library('upload', $config);

                $config['file_name'] = $namaFile;
                $this->upload->initialize($config);

                if($this->upload->do_upload('npwp')){
                    $npwp = $namaFile;
                }
                else{
                    $error['error'] =$this->upload->display_errors();
                    $this->session->set_flashdata('npwp',$error['error']);
                    redirect('c_perusahaan/profil_input','refresh');
                }
            }
            else{
                $this->session->set_flashdata('npwp', 'NPWP tidak boleh kosong');
                redirect('c_perusahaan/profil_input','refresh');
            }

            $alamat_data = array(
                'alamat' => $this->input->post('alamat'),
                'kelurahan' => $this->wil->get_kel_nama($this->input->post('kelurahan')),
                'kecamatan' => $this->wil->get_kec_nama($this->input->post('kecamatan')),
                'kota' => $this->wil->get_kota_nama($this->input->post('kota')),
                'provinsi' => $this->wil->get_prov_nama($this->input->post('provinsi')),
            );

            $alamat = json_encode($alamat_data);

            $data = array(
                'id_users' => $this->session->userdata('id_users'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'email' => $this->input->post('email'),
                'no_telpon' => $this->input->post('telpon'),
                'website' => $this->input->post('website'),
                'pemilikan' => $this->input->post('pemilikan'),
                'bidang_usaha' => $this->input->post('bidang'),
                'alamat_perusahaan' => $alamat,
                'kode_pos' => $this->input->post('kode_pos'),
                'skala' => $this->input->post('skala'),
                'deskripsi' => $this->input->post('deskripsi'),
                'logo' => $logo,
                'siup' => $siup,
                'npwp' => $npwp,
            );   
            $this->session->set_flashdata('notif', '<div class="alert alert-success">Input profil perusahaan berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
            $this->mp->input_profil($data);
            redirect('c_perusahaan/profil','refresh');
        }
    }

    public function profil_edit()
    {
        $row    = $this->mp->get_perusahaan();
        $alamat_data = json_decode($row->alamat_perusahaan);
        $skala_data = array('','Mikro','Kecil','Menengah','Besar');
        $pemilikan_data = array('','Perusahaan perorangan (PO)','Firma (Fa)','Perseroan Komanditer (CV)','Perseroan Terbatas (PT)','Perseroan Terbatas Negara (Persero)','Perusahaan Daerah (PD)','Perusahaan Negara Umum (Perum)','Perusahaan Negara Jawatan (Perjan)','Koperasi','Yayasan');
        $kota = $alamat_data->kota;
        $kec = $alamat_data->kecamatan;
        $kel = $alamat_data->kelurahan;
        $data = array(
                'id_perusahaan' => $row->id_perusahaan,
                'id_users' => $row->id_users,
                'nama_perusahaan' => $row->nama_perusahaan,
                'alamat' => $alamat_data->alamat,
                // 'kelurahan' => $alamat_data->kelurahan,
                // 'kecamatan' => $alamat_data->kecamatan,
                // 'kota' => $alamat_data->kota,
                'provinsi' => $this->wil->get_provinsi(),
                'idkota' => $this->wil->get_kota_id($kota),
                'idkec'  => $this->wil->get_kec_id($kec),
                'idkel'  => $this->wil->get_kel_id($kel),
                'provinsi_data' => $alamat_data->provinsi,
                'kode_pos' => $row->kode_pos,
                'skala_data' => $skala_data,
                'skala' => $row->skala,
                'pemilikan_data' => $pemilikan_data,
                'pemilikan' => $row->pemilikan,
                'no_telpon' => $row->no_telpon,
                'email' => $row->email,
                'bidang' => $this->mp->get_bidang(),
                'bidang_usaha' => $row->bidang_usaha,
                'website' => $row->website,
                'deskripsi' => $row->deskripsi,
                'logo' => $row->logo,
                'siup' => $row->siup,
                'npwp' => $row->npwp,
                );
        
        $this->template->set('title', 'Profil | SIP BLK Surakarta');
        $this->template->set('header', 'Profil');
        $this->template->set('breadcrumb', 'Profil');
        $this->template->set('breadcrumb2', '');
        $this->template->load('perusahaan_layout', 'contents' , 'v_perusahaan/profil_edit', $data);    
    }

    public function profil_edit_act()
    {
        
        $row = $this->mp->get_perusahaan();

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger">Update profil perusahaan gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
            $this->profil_edit();
        } else {
                
            if(! empty($_FILES) && $_FILES['logo']['name'] != null){
                if ($row->logo != NULL) {
                    
                $path_to_file = './uploads/images/'.$row->logo;
                    if (file_exists($path_to_file)) 
                    {
                        unlink($path_to_file);
                    }
                }
                $namaFile = "logo-".$this->session->userdata('id_users')."-".preg_replace('/\s+/', '_',$_FILES['logo']['name']);

                $config['upload_path'] = './uploads/images';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']     = '1024';
                $this->load->library('upload', $config);

                $config['file_name'] = $namaFile;
                $this->upload->initialize($config);

                if($this->upload->do_upload('logo')){
                    $logo = $namaFile;
                }
                else{
                    $error['error'] =$this->upload->display_errors();
                    $this->session->set_flashdata('logo',$error['error']);
                    redirect('c_perusahaan/profil_edit','refresh');
                }
            }
            else{
                $logo = $row->logo;
            }
            
            if(! empty($_FILES) && $_FILES['siup']['name'] != null){
                if ($row->siup != NULL) {
                $path_to_file = './uploads/documents/'.$row->siup;
                    if (file_exists($path_to_file)) 
                    {
                        unlink($path_to_file);
                    }
                }
                $namaFile = "siup-".$this->session->userdata('id_users')."-".preg_replace('/\s+/', '_', $_FILES['siup']['name']);

                $config['upload_path'] = './uploads/documents';
                $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                $config['max_size']     = '2048';
                $this->load->library('upload', $config);

                $config['file_name'] = $namaFile;
                $this->upload->initialize($config);

                if($this->upload->do_upload('siup')){
                    $siup = $namaFile;
                }
                else{
                    $error['error'] =$this->upload->display_errors();
                    $this->session->set_flashdata('siup',$error['error']);
                    redirect('c_perusahaan/profil_edit','refresh');
                }
            }
            else{
                $siup = $row->siup;
            }
            
            if(! empty($_FILES) && $_FILES['npwp']['name'] != null){
                if ($row->npwp != NULL) 
                {
                    $path_to_file = './uploads/documents/'.$row->npwp;
                    if (file_exists($path_to_file)) 
                    {
                        unlink($path_to_file);
                    }
                }
                $namaFile = "npwp-".$this->session->userdata('id_users')."-".preg_replace('/\s+/', '_', $_FILES['npwp']['name']);

                $config['upload_path'] = './uploads/documents';
                $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                $config['max_size']     = '2048';
                $this->load->library('upload', $config);

                $config['file_name'] = $namaFile;
                $this->upload->initialize($config);

                if($this->upload->do_upload('npwp')){
                    $npwp = $namaFile;
                }
                else{
                    $error['error'] =$this->upload->display_errors();
                    $this->session->set_flashdata('npwp',$error['error']);
                    redirect('c_perusahaan/profil_edit','refresh');

                }
            }
            else{
                $npwp = $row->npwp;
            }


            $alamat_data = array(
                'alamat' => $this->input->post('alamat'),
                'kelurahan' => $this->wil->get_kel_nama($id = $this->input->post('kelurahan')),
                'kecamatan' => $this->wil->get_kec_nama($id = $this->input->post('kecamatan')),
                'kota' => $this->wil->get_kota_nama($id = $this->input->post('kota')),
                'provinsi' => $this->wil->get_prov_nama($id = $this->input->post('provinsi')),
            );

            $alamat = json_encode($alamat_data);
            $data = array(
                'id_users' => $this->session->userdata('id_users'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'email' => $this->input->post('email'),
                'no_telpon' => $this->input->post('telpon'),
                'website' => $this->input->post('website'),
                'pemilikan' => $this->input->post('pemilikan'),
                'bidang_usaha' => $this->input->post('bidang'),
                'alamat_perusahaan' => $alamat,
                'kode_pos' => $this->input->post('kode_pos'),
                'skala' => $this->input->post('skala'),
                'deskripsi' => $this->input->post('deskripsi'),
                'logo' => $logo,
                'siup' => $siup,
                'npwp' => $npwp,
            );   
            
            $this->session->set_flashdata('notif', '<div class="alert alert-success">Update profil perusahaan berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
            $this->mp->update_profil($data);
            redirect('c_perusahaan/profil','refresh');
        }
    }

    // =============================================================================
    // menu profil end
    // =============================================================================
    // =============================================================================
    // menu berita start
    // =============================================================================
    public function berita()
    {
        $this->cek_data_profil();
        $data['berita'] = $this->mp->get_berita();

        // echo "<pre>";
        // print_r ($data['berita']);
        // echo "</pre>";exit();
          
        $this->template->set('title', 'Berita | SIP BLK Surakarta');
        $this->template->set('header', 'Berita');
        $this->template->set('breadcrumb', 'Berita');
        $this->template->set('breadcrumb2', '');
        $this->template->load('perusahaan_layout', 'contents' , 'v_perusahaan/v_berita/berita_list', $data);
    }

    public function berita_detail()
    {
        $this->cek_data_profil();

        $id = $this->input->get('id');
        
        $get_berita = $this->mp->get_berita_id($id);
        $this->session->set_userdata('id_berita', $get_berita->id_panggilan);
        echo json_encode($get_berita);
        exit();
    }

    public function loker_posted($q)
    {
        $this->cek_data_profil();

        $data['loker'] = $this->mp->get_posted_loker();
        $data['q'] = $q;

        if ($data['loker']) 
        {            
            $this->template->set('title', '
                Berita | SIP BLK Surakarta');
            $this->template->set('header', 'Tabel Lowongan');
            $this->template->set('breadcrumb', 'Berita');
            $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">Tambah Berita</li>');
            $this->template->load('perusahaan_layout', 'contents' , 'v_perusahaan/v_loker/loker_posted', $data);
        }else{
            $this->session->set_flashdata('notif', '<div class="alert alert-danger">Belum ada lowongan yang terpublish!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
            redirect('c_perusahaan/berita','refresh');
        }
    }

    public function berita_add($id)
    {
        $this->cek_data_profil();
        $row = $this->mp->get_loker_id($id);
        $data['jns_tes'] = array('','Tes Tertulis','Psikotes','Interview','Tes Kesehatan');

        $data['id_lowongan'] = $id;
        $data['judul_loker'] = $row->judul;

        $this->template->set('title', '
            Berita | SIP BLK Surakarta');
        $this->template->set('header', 'Tambah Berita');
        $this->template->set('breadcrumb', 'Berita');
        $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">Tambah Berita</li>');
        $this->template->load('perusahaan_layout', 'contents' , 'v_perusahaan/v_berita/berita_add', $data);
    }

    public function berita_add_act()
    {
        $id_lowongan = $this->input->post('id_lowongan');
        if(! empty($_FILES) && $_FILES['lampiran']['name'] != null){
                $namaFile = "lampiran-".$this->session->userdata('id_users')."-".preg_replace('/\s+/', '_',$_FILES['lampiran']['name']);

                $config['upload_path'] = './uploads/documents';
                $config['allowed_types'] = 'pdf';
                $config['max_size']     = '10240';
                $this->load->library('upload', $config);

                $config['file_name'] = $namaFile;
                $this->upload->initialize($config);

                if($this->upload->do_upload('lampiran')){
                    $lampiran = $namaFile;
                }
                else{
                    $error['error'] =$this->upload->display_errors();
                    $this->session->set_flashdata('lampiran',$error['error']);
                    redirect('c_perusahaan/berita_add/'.$id_lowongan,'refresh');
                }
        }else{
            $this->session->set_flashdata('lampiran', 'Lampiran tidak boleh kosong');
            redirect('c_perusahaan/berita_add/'.$id_lowongan,'refresh');
        }

        $data = array(
            'id_lowongan'   => $id_lowongan,
            'header'        => $this->input->post('header'),
            'jenis_tes'     => $this->input->post('jns_tes'),
            'tanggal'       => $this->input->post('tanggal'),
            'waktu_mulai'   => $this->input->post('waktu_mulai'),
            'waktu_selesai' => $this->input->post('waktu_selesai'),
            'lokasi'        => $this->input->post('lokasi'),
            'maps_lokasi'   => $this->input->post('maps_lokasi'),
            'keterangan'    => $this->input->post('keterangan'),
            'lampiran'      => $lampiran
        );

        $this->mp->add_berita($data);
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Tambah berita berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_perusahaan/berita','refresh');
    }

    public function berita_edit($id)
    {
        $this->cek_data_profil();
        $row = $this->mp->get_berita_id($id);
        $jns_tes = array('','Tes Tertulis','Psikotes','Interview','Tes Kesehatan');
        
        $data = array(
            'id_panggilan'  => $row->id_panggilan,
            'judul_loker'   => $row->judul,
            'id_lowongan'   => $row->id_lowongan,
            'header'        => $row->header,
            'tanggal'       => $row->tanggal,
            'waktu_mulai'   => $row->waktu_mulai,
            'waktu_selesai' => $row->waktu_selesai,
            'lokasi'        => $row->lokasi,
            'maps'          => $row->maps_lokasi,
            'jns_tes_data'  => $row->jenis_tes,
            'jns_tes'       => $jns_tes,
            'keterangan'    => $row->keterangan,
            'lampiran'      => $row->lampiran
        );

        $this->template->set('title', '
            Berita | SIP BLK Surakarta');
        $this->template->set('header', 'Edit Berita');
        $this->template->set('breadcrumb', 'Berita');
        $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">Edit Berita</li>');
        $this->template->load('perusahaan_layout', 'contents' , 'v_perusahaan/v_berita/berita_edit', $data);

    }

    public function berita_edit_act($id)
    {
        if(! empty($_FILES) && $_FILES['lampiran']['name'] != null){
                $namaFile = "lampiran-".$this->session->userdata('id_users')."-".preg_replace('/\s+/', '_',$_FILES['lampiran']['name']);

                $config['upload_path'] = './uploads/documents';
                $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                $config['max_size']     = '1024';
                $this->load->library('upload', $config);

                $config['file_name'] = $namaFile;
                $this->upload->initialize($config);

                if($this->upload->do_upload('lampiran')){
                    $lampiran = $namaFile;
                }
                else{
                    $error['error'] =$this->upload->display_errors();
                    $this->session->set_flashdata('lampiran',$error['error']);
                    redirect('c_perusahaan/profil_input','refresh');
                }
        }else{
            $lampiran = $row->lampiran;
        }

        $data = array(
            'id_lowongan'   => $this->input->post('id_lowongan'),
            'header'        => $this->input->post('header'),
            'jenis_tes'     => $this->input->post('jns_tes'),
            'tanggal'       => $this->input->post('tanggal'),
            'waktu_mulai'   => $this->input->post('waktu_mulai'),
            'waktu_selesai' => $this->input->post('waktu_selesai'),
            'lokasi'        => $this->input->post('lokasi'),
            'maps_lokasi'   => $this->input->post('maps_lokasi'),
            'keterangan'    => $this->input->post('keterangan'),
            'lampiran'      => $lampiran
        );

        $this->mp->update_berita($data, $id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Edit berita berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_perusahaan/berita','refresh');
    }

    public function berita_delete($id)
    {
        $this->cek_data_profil();

        $row = $this->mp->get_berita_id($id);
        $path_to_file = './uploads/images/'.$row->lampiran;
        if (file_exists($path_to_file)) 
        {
            unlink($path_to_file);
        }

        $del = $this->mp->del_berita($id);

        if ($del > 0) {
            $this->session->set_flashdata('notif', '<div class="alert alert-success">Hapus Berita berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
         
            redirect('c_perusahaan/berita','refresh');
        }else{
            $this->session->set_flashdata('notif', '<div class="alert alert-danger">Hapus Berita gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
         
            redirect('c_perusahaan/berita','refresh');
        }
    }

    // =============================================================================
    // menu berita end
    // =============================================================================
    // =============================================================================
    // menu lowongan start
    // =============================================================================

    public function loker()
    {
        $this->cek_data_profil();

        $data['loker'] = $this->mp->get_loker();

        $this->template->set('title', 'SIP BLK Surakarta | Loker');
        $this->template->set('header', 'Lowongan Kerja');
        $this->template->set('breadcrumb', 'Loker');
        $this->template->set('breadcrumb2', '');
        $this->template->load('perusahaan_layout', 'contents' , 'v_perusahaan/v_loker/loker_list', $data);
    }

    public function loker_detail()
    {
        $this->cek_data_profil();

        $id = $this->input->get('id');
        
        $get_loker = $this->mp->get_loker_id($id);
        $this->session->set_userdata('id_loker', $get_loker->id_lowongan);
        echo json_encode($get_loker);
        exit();
    }    

    public function loker_add()
    {
        $kontrak = array('','Penuh Waktu','Kontrak','Magang','Fresh Graduate','Paruh Waktu','Permanen');
        $data = array(
            'jns_kontrak' => $kontrak,
            'lokasi' => $this->wil->get_kab(),
            'kategori' => $this->mp->get_bidang()
        );


        $this->template->set('title', 'SIP BLK Surakarta | Loker');
        $this->template->set('header', 'Lowongan Kerja');
        $this->template->set('breadcrumb', 'Loker');
        $this->template->set('breadcrumb2', '');
        $this->template->load('perusahaan_layout', 'contents' , 'v_perusahaan/v_loker/loker_add', $data);
    }

    //Upload image loker
    function upload_image(){
        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = './uploads/images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $namaFile = "loker-".$this->session->userdata('id_users')."-".preg_replace('/\s+/', '_', $_FILES['image']['name']);
            $config['file_name'] = $namaFile;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image')){
                $this->upload->display_errors();
                return FALSE;
            }else{
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./uploads/images/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '60%';
                $config['width']= 800;
                $config['height']= 800;
                $config['new_image']= './uploads/images/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url().'uploads/images/'.$data['file_name'];
            }
        }
    }
 
    //Delete image loker
    function delete_image(){
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
    }

    public function loker_add_act()
    {
        $id  = $this->mp->get_perusahaan()->id_perusahaan;
        $lokasi = strtolower($this->input->post('lokasi'));

        $data = array(
            'id_perusahaan' => $id,
            'judul' => $this->input->post('judul'),
            'posisi' => $this->input->post('posisi'),
            'pendidikan' => $this->input->post('pendidikan'),
            'jurusan' => $this->input->post('jurusan'),
            'jns_kontrak' => $this->input->post('jns_kontrak'),
            'gaji' => $this->input->post('gaji'),
            'kategori_loker' => $this->input->post('kategori'),
            'thn_pengalaman' => $this->input->post('pengalaman'),
            'lokasi_kerja' => ucwords($lokasi),
            'batas_kuota' => $this->input->post('batas_kuota'),
            'tgl_tutup' => $this->input->post('tgl_tutup'),
            'ket_lowongan' => $this->input->post('deskripsi'),
        );

        $this->session->set_flashdata('notif', '<div class="alert alert-success">Tambah Lowongan berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        $this->mp->input_loker($data);
        redirect('c_perusahaan/loker','refresh');
    }

    public function loker_edit($id)
    {
        $this->cek_data_profil();

        $row = $this->mp->get_loker_id($id);
        $kontrak = array('','Penuh Waktu','Kontrak','Magang','Fresh Graduate','Paruh Waktu','Permanen');
        if ($row) {
        $data = array(
            'id_loker' => $row->id_lowongan,
            'judul' => $row->judul,
            'posisi' => $row->posisi,
            'pendidikan' => $row->pendidikan,
            'jurusan' => $row->jurusan,
            'jns_kontrak' => $kontrak,
            'jns_kontrak_data' => $row->jns_kontrak,
            'gaji' => $row->gaji,
            'kategori' => $this->mp->get_bidang(),
            'kategori_data' => $row->kategori_loker,
            'pengalaman' => $row->thn_pengalaman,
            'lokasi' => $this->wil->get_kab(),
            'lokasi_data' => $row->lokasi_kerja,
            'batas_kuota' => $row->batas_kuota,
            'tgl_tutup' => $row->tgl_tutup,
            'ket_lowongan' => $row->ket_lowongan,
        );
        }else{
            $this->session->set_flashdata('notif', '<div class="alert alert-danger">Data Lowongan tidak ditemukan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
            redirect('c_perusahaan/loker','refresh');
        }
        $this->template->set('title', 'SIP BLK Surakarta | Loker');
        $this->template->set('header', 'Lowongan Kerja');
        $this->template->set('breadcrumb', 'Loker');
        $this->template->set('breadcrumb2', '');
        $this->template->load('perusahaan_layout', 'contents' , 'v_perusahaan/v_loker/loker_edit', $data);
    }

    public function loker_edit_act()
    {
        $id     = $this->input->post('id_loker');
        $lokasi = strtolower($this->input->post('lokasi'));
        
        $data = array(
            'judul' => $this->input->post('judul'),
            'posisi' => $this->input->post('posisi'),
            'pendidikan' => $this->input->post('pendidikan'),
            'jurusan' => $this->input->post('jurusan'),
            'jns_kontrak' => $this->input->post('jns_kontrak'),
            'gaji' => $this->input->post('gaji'),
            'kategori_loker' => $this->input->post('kategori'),
            'thn_pengalaman' => $this->input->post('pengalaman'),
            'lokasi_kerja' => ucwords($lokasi),
            'batas_kuota' => $this->input->post('batas_kuota'),
            'tgl_tutup' => $this->input->post('tgl_tutup'),
            'ket_lowongan' => $this->input->post('deskripsi')
        );

        $this->session->set_flashdata('notif', '<div class="alert alert-success">Update Lowongan berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        $this->mp->update_loker($data, $id);
        redirect('c_perusahaan/loker','refresh');
    }

    public function loker_del($id)
    {
        $this->cek_data_profil();

        $del = $this->mp->del_loker($id);
        // echo "<pre>";
        // print_r ($del);
        // echo "</pre>";exit();
        if ($del > 0) {
            $this->session->set_flashdata('notif', '<div class="alert alert-success">Hapus Lowongan berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
         
            redirect('c_perusahaan/loker','refresh');
        }else{
            $this->session->set_flashdata('notif', '<div class="alert alert-danger">Hapus Lowongan gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
         
            redirect('c_perusahaan/loker','refresh');
        }
    }

    // =============================================================================
    // menu lowongan end
    // =============================================================================
    // =============================================================================
    // menu seleksi start
    // =============================================================================
    public function pelamar_list($q)
    {
        $id = $this->uri->segment(4);
        if ($q==0) {
            $status = 'Diproses';
        }else{
            $status = 'Diterima';
        }
        $data['q'] = $q;
        $data['pelamar'] = $this->mp->get_pelamar($id, $status);
        $this->session->set_userdata('id_lowongan', $id);
        $this->template->set('title', 'Seleksi | SIP BLK Surakarta');
        $this->template->set('header', 'Seleksi');
        $this->template->set('breadcrumb', 'Seleksi');
        $this->template->set('breadcrumb2', '');
        $this->template->load('perusahaan_layout', 'contents' , 'v_perusahaan/v_seleksi/pelamar_list', $data);
    }

    public function seleksi_pelamar($q)
    {
        $id_pelamar = $this->uri->segment(4);
        $id_lowongan = $this->session->userdata('id_lowongan');
        if ($q != 0) {
            $data['status'] = 'Diterima';
        }else{
            $data['status'] = 'Ditolak';
        }
        
        $this->mp->update_status_pelamar($id_pelamar, $data);
        redirect('c_perusahaan/pelamar_list/'.$id_lowongan,'refresh');
    }
    // =============================================================================
    // menu seleksi end
    // =============================================================================
    // =============================================================================
    // menu setting start
    // =============================================================================

    public function ubah_pwd()
    {
        $this->template->set('title', 'SIP BLK Surakarta | Setting');
        $this->template->set('header', 'Setting');
        $this->template->set('breadcrumb', 'Setting');
        $this->template->set('breadcrumb2', '');
        $this->template->load('perusahaan_layout', 'contents' , 'v_perusahaan/ubah_pwd');
    }

    public function ubah_pwd_act()
    {
        $pwd_new = $this->input->post('password');
        $pwd_old_post = $this->input->post('pass_old');
        $pwd_old = $this->mp->get_pwd_old();
        
        if (password_verify($pwd_old_post, $pwd_old)) {

            $data['password'] = password_hash($pwd_new, PASSWORD_DEFAULT);

            $this->mp->update_pwd($data);

            $this->session->set_flashdata('notif', '<div class="alert alert-success">Update password berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
            redirect('c_perusahaan/ubah_pwd','refresh');
        }else{
            $this->session->set_flashdata('notif', '<div class="alert alert-danger">Password lama salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
            redirect('c_perusahaan/ubah_pwd','refresh');
        }
    }

    // =============================================================================
    // menu setting end
    // =============================================================================

    public function _rules() 
    {

        $row = $this->mp->get_perusahaan();
        if ($this->input->post('email') != $row->email) {
           
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[perusahaan.email]', ['is_unique' => 'Email sudah terdaftar']);
        }else{
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email', ['valid_email' => 'Email tidak valid']);
        }
            
        $this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|required|alpha_numeric|min_length[5]|max_length[5]|regex_match[/^[][0-9@# ,().]+$/]', ['min_length' => 'Pastikan kode pos adalah benar', 'regex_match' => 'Pastikan kode pos adalah benar']);
            
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}