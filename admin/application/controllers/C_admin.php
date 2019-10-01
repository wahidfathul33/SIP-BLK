<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_admin extends CI_Controller  
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');

        if($this->session->userdata('role') != '1'){
            redirect('../error404');
        }
    }

    public function index()
    {
        $tot_member = $this->Admin_model->total_member();
        $tot_perusahaan = $this->Admin_model->total_perusahaan();
        $tot_lowongan = $this->Admin_model->total_lowongan();

        $data = array(
            'tot_member' => $tot_member,
            'tot_perusahaan' => $tot_perusahaan,
            'tot_lowongan' => $tot_lowongan );

        $this->template->set('title', 'SIP BLK Surakarta');
        $this->template->set('header', 'Dashboard SIP BLK Surakarta');
        $this->template->set('breadcrumb', 'Dashboard');
        $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">coba</li>');
        $this->template->load('admin_layout', 'contents' , 'dashboard', $data);
    }

    public function artikel($value='')
    {
        # code...
    }

    // ---------------------lowongan ---------------------
    public function lowongan()
    {
        $data['lowongan'] = $this->Admin_model->get_lowongan();

        $this->template->set('title', 'SIP BLK Surakarta - Lowongan');
        $this->template->set('header', 'Lowongan');
        $this->template->set('breadcrumb', 'Lowongan');
        $this->template->set('breadcrumb2', '');
        $this->template->load('admin_layout', 'contents' , 'lowongan/lowongan_list', $data);
    }

    public function loker_detail()
    {
        $id = $this->input->get('id');
        
        $get_loker = $this->Admin_model->get_loker_id($id);
        $this->session->set_userdata('id_loker', $get_loker->id_lowongan);
        echo json_encode($get_loker);
        exit();
    }  

    public function loker_status($q)
    {
        $id = $this->uri->segment(4);
        if ($q == 1) {
            $data['status_publish'] = "Publik";
        }else{
            $data['status_publish'] = "Privat";
        }

        $this->Admin_model->loker_status($data, $id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Ubah status publis berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_admin/lowongan');
    }

    public function kategori()
    {
        $data['kategori'] = $this->Admin_model->get_kategori();

        $this->template->set('title', 'SIP BLK Surakarta - Kategori Lowongan');
        $this->template->set('header', 'Kategori Lowongan');
        $this->template->set('breadcrumb', 'Data Master');
        $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">Kategori Lowongan</li>');
        $this->template->load('admin_layout', 'contents' , 'lowongan/kategori_list', $data);
    }

    public function kategori_del($id)
    {
        $this->Admin_model->del_kategori($id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Hapus data berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_admin/kategori');
    }

    public function users($id)
    {
        $this->session->set_userdata( 'id_level', $id );
        $data['users'] = $this->Admin_model->get_users($id);
        $data['level'] = $id;

        $this->template->set('title', 'SIP BLK Surakarta - Manajemen User');
        $this->template->set('header', 'Manajemen User');
        $this->template->set('breadcrumb', 'Manajemen User');
        if ($id == 1) {
            $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">Admin</li>');
        }elseif ($id == 2) {
            $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">Alumni</li>');
        }elseif ($id == 3) {
            $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">Non Alumni</li>');
        }else{
            $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">Perusahaan</li>');
        }
        $this->template->load('admin_layout', 'contents' , 'users/users_list', $data);
    }

    public function user_add($id)
    {
        $data['level']  = $id;
        
        $this->template->set('title', 'SIP BLK Surakarta - Manajemen User');
        $this->template->set('header', 'Manajemen User');
        $this->template->set('breadcrumb', 'Manajemen User');
        $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">Tambah User</li>');
        $this->template->load('admin_layout', 'contents' , 'users/users_add', $data);
    }

    public function user_add_act()
    {
        $level = $this->input->post('level');
        $this->_rules($level);

        if ($this->form_validation->run() == FALSE) {
            $this->user_add($level);
        } else {
            $pwd = $this->input->post('password', true);
            $data['email']  = $this->input->post('email', true);
            $data['password'] = password_hash($pwd, PASSWORD_DEFAULT);
            $data['id_level']  = $this->input->post('level');
            $row['id_users'] = $this->Admin_model->input_user($data);

            if ($level == 2 || $level == 3) {
                $row['id_member']   = $this->input->post('nik', true);
                $row['nama']   = $this->input->post('nama', true);
                $this->Admin_model->input_member($row);
            }elseif ($level == 4) {
                $row['nama_perusahaan']   = $this->input->post('nama', true);
                $this->Admin_model->input_perusahaan($row);
            }
            $this->session->set_flashdata('notif', '<div class="alert alert-success">Tambah data user berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
            
            redirect('c_admin/users/'.$level);

        }
    }

    public function user_del($id)
    {
        $this->Admin_model->del_user($id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Hapus data user berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_admin/users/'.$this->session->userdata('id_level'));
    }

    public function user_status($id)
    {
        $data['is_active'] = $this->uri->segment(4);
        
        $this->Admin_model->user_ubah_status($id, $data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success">Ubah status berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_admin/users/'.$this->session->userdata('id_level'));
    }

    public function member($id)
    {
        $data['member'] = $this->Admin_model->get_member($id);

        if ($id == 2) {
        $this->template->set('title', 'SIP BLK Surakarta - Member Alumni');
        $this->template->set('header', 'Member Alumni');
        $this->template->set('breadcrumb', 'Data Member');
        $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">Alumni</li>');
        }elseif($id == 3){
        $this->template->set('title', 'SIP BLK Surakarta - Member Non Alumni');
        $this->template->set('header', 'Member Non Alumni');
        $this->template->set('breadcrumb', 'Data Member');
        $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">Non Alumni</li>');
        }
        $this->template->load('admin_layout', 'contents' , 'member/member_list', $data);
    }

    public function perusahaan($id)
    {
        $data['perusahaan'] = $this->Admin_model->get_perusahaan($id);

        $this->template->set('title', 'SIP BLK Surakarta - Perusahaan');
        $this->template->set('header', 'Member Alumni');
        $this->template->set('breadcrumb', 'Data Perusahaan');
        $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">Perusahaan</li>');
        $this->template->load('admin_layout', 'contents' , 'perusahaan/perusahaan_list', $data);
    }

    //kejuruan
    public function kejuruan()
    {
        $data['kejuruan'] = $this->Admin_model->get_kejuruan();

        $this->template->set('title', 'SIP BLK Surakarta - Kejuruan');
        $this->template->set('header', 'Profil Kejuruan');
        $this->template->set('breadcrumb', 'Data Master');
        $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">Kejuruan</li>');
        $this->template->load('admin_layout', 'contents' , 'kejuruan/kejuruan_list', $data);
    }

    public function kejuruan_add()
    {
        $this->template->set('title', 'SIP BLK Surakarta - Kejuruan');
        $this->template->set('header', 'Profil Kejuruan');
        $this->template->set('breadcrumb', 'Data Master');
        $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">Kejuruan</li>');
        $this->template->load('admin_layout', 'contents' , 'kejuruan/kejuruan_add');
    }

    public function kejuruan_add_act()
    {
        $data['nama_kejuruan'] = $this->input->post('nama_kejuruan');
        $this->Admin_model->add_kejuruan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success">Tambah data berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_admin/kejuruan');
    }

    public function kejuruan_edit($id)
    {
        $data['kejuruan'] = $this->Admin_model->get_kejuruan_id($id);

        $this->template->set('title', 'SIP BLK Surakarta - Kejuruan');
        $this->template->set('header', 'Profil Kejuruan');
        $this->template->set('breadcrumb', 'Data Master');
        $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">Kejuruan</li>');
        $this->template->load('admin_layout', 'contents' , 'kejuruan/kejuruan_edit', $data);
    }

    public function kejuruan_edit_act($id)
    {
        $data['nama_kejuruan'] = $this->input->post('nama_kejuruan');
        $this->Admin_model->edit_kejuruan($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success">Edit data berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_admin/kejuruan');
    }

    public function kejuruan_del($id)
    {
        $d = $this->Admin_model->del_kejuruan($id);
        if ($d) {
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Hapus data kejuruan berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_admin/kejuruan/');
        }else{
            $this->session->set_flashdata('notif', '<div class="alert alert-danger">Hapus data kejuruan gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
            redirect('c_admin/kejuruan/');
        }
    }

    //sub_kejuruan
    public function sub_kejuruan()
    {
        $data['sub_kejuruan'] = $this->Admin_model->get_sub_kejuruan();

        $this->template->set('title', 'SIP BLK Surakarta - Sub Kejuruan');
        $this->template->set('header', 'Profil Sub Kejuruan');
        $this->template->set('breadcrumb', 'Data Master');
        $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">sub_Kejuruan</li>');
        $this->template->load('admin_layout', 'contents' , 'sub_kejuruan/sub_kejuruan_list', $data);
    }

    public function sub_kejuruan_add()
    {
        $data['kejuruan'] = $this->Admin_model->get_kejuruan();

        $this->template->set('title', 'SIP BLK Surakarta - Sub Kejuruan');
        $this->template->set('header', 'Profil Sub Kejuruan');
        $this->template->set('breadcrumb', 'Data Master');
        $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">sub_Kejuruan</li>');
        $this->template->load('admin_layout', 'contents' , 'sub_kejuruan/sub_kejuruan_add', $data);
    }

    public function sub_kejuruan_add_act()
    {
        $data['id_kejuruan'] = $this->input->post('id_kejuruan');
        $data['nama_sub_kejuruan'] = $this->input->post('nama_sub_kejuruan');
        $this->Admin_model->add_sub_kejuruan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success">Tambah data berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_admin/sub_kejuruan');
    }

    public function sub_kejuruan_edit($id)
    {
        $data['kejuruan'] = $this->Admin_model->get_kejuruan();
        $data['sub_kejuruan'] = $this->Admin_model->get_sub_kejuruan_id($id);

        $this->template->set('title', 'SIP BLK Surakarta - Sub Kejuruan');
        $this->template->set('header', 'Profil Sub Kejuruan');
        $this->template->set('breadcrumb', 'Data Master');
        $this->template->set('breadcrumb2', '<li class="breadcrumb-item active">sub_Kejuruan</li>');
        $this->template->load('admin_layout', 'contents' , 'sub_kejuruan/sub_kejuruan_edit', $data);
    }

    public function sub_kejuruan_edit_act()
    {
        $data['id_kejuruan'] = $this->input->post('id_kejuruan');
        $data['nama_sub_kejuruan'] = $this->input->post('nama_sub_kejuruan');
        $this->Admin_model->edit_sub_kejuruan($data, $id = $this->input->post('id_sub_kejuruan'));

        $this->session->set_flashdata('notif', '<div class="alert alert-success">Edit data berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_admin/sub_kejuruan');
    }

    public function sub_kejuruan_del($id)
    {
        $d = $this->Admin_model->del_sub_kejuruan($id);
        if ($d) {
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Hapus data sub_kejuruan berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_admin/sub_kejuruan/');
        }else{
            $this->session->set_flashdata('notif', '<div class="alert alert-danger">Hapus data sub_kejuruan gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
            redirect('c_admin/sub_kejuruan/');
        }
    }

    public function _rules($level = NULL) 
    {
        if ($level != 1) {
            $this->form_validation->set_rules('nik', 'NIK', 'trim|required|alpha_numeric|min_length[16]', ['required' => 'Pastikan NIK sesuai KTP']);
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]', ['is_unique' => 'Email sudah terdaftar']);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[30]');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'trim|required|matches[password]', ['matches' => 'Password tidak sama']);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function notif_verifikasi_perusahaan(){
        $notif       = $this->Admin_model->notif_perusahaan();
        $mytimestamp = $this->Admin_model->waktu_notif_perusahaan();
        // $d       = explode(' ',$mytimestamp);
        // $tgl     = $d[0];
        // $waktu   = date('d m Y', $tgl);
        // echo "<pre>";
        // print_r ($waktu);
        // echo "</pre>";
        $data = array('data' => $notif, 'waktu' => $mytimestamp);
        echo json_encode($data);
    }

    public function notif_verifikasi_loker(){
        $notif       = $this->Admin_model->notif_loker();
        $mytimestamp = $this->Admin_model->waktu_notif_loker();
        // $d       = explode(' ',$mytimestamp);
        // $tgl     = $d[0];
        // $waktu   = date('d m Y', $tgl);
        // echo "<pre>";
        // print_r ($waktu);
        // echo "</pre>";
        $data = array('dataloker' => $notif, 'waktuloker' => $mytimestamp);
        echo json_encode($data);
    }
}

