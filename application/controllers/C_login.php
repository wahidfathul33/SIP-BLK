<?php
class C_login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('M_perusahaan', 'mp');
    }
  
    public function login()
    {
        $this->template->set('title', 'Login | SIP BLK Surakarta');
        $this->template->load('frontend_layout', 'contents' , 'v_login/login_form');
    }

    function auth(){
                // echo "<pre>";
                // print_r ($_POST);
                // echo "</pre>";
                // exit();
        $email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
        $pwd=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES); 
        //$cek=$this->login_model->auth_login($email,$password);

        $data = $this->login_model->get_user($email);
        $user_pwd = $data['password'];

        if(password_verify($pwd, $user_pwd)){

                 if($data['id_level']=='2'){ //alumni
                    
                    if ($data['is_active'] == '1') {
                        $this->session->set_userdata('role',$data['id_level']);
                    $this->session->set_userdata('ses_email',$data['email']);
                    $this->session->set_userdata('jenis_user',$data['nama_level']);
                    $this->session->set_userdata('status',$data['is_active']);
                    $this->session->set_userdata('id_users',$data['id_users']);
                    $this->session->set_userdata('tanggal',$data['tanggal']);
                        $this->session->set_flashdata('alert','<div class="alert alert-success">Berhasil login<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
                        redirect('c_member');
                    }else{
                        $this->session->set_flashdata('alert','<div class="alert alert-danger">Akun anda belum aktif, Silakan verifikasi akun anda!<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
                        redirect('c_login/login');
                    }

                 }elseif($data['id_level']=='3'){ //non alumni
                    
                    if ($data['is_active'] == '1') {
                        $this->session->set_userdata('role',$data['id_level']);
                    $this->session->set_userdata('ses_email',$data['email']);
                    $this->session->set_userdata('jenis_user',$data['nama_level']);
                    $this->session->set_userdata('status',$data['is_active']);
                    $this->session->set_userdata('id_users',$data['id_users']);
                    $this->session->set_userdata('tanggal',$data['tanggal']);
                        $this->session->set_flashdata('alert','<div class="alert alert-success">Berhasil login!<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
                        redirect('c_member');
                    }else{
                         $this->session->set_flashdata('alert','<div class="alert alert-danger">Akun anda belum aktif, Silakan verifikasi akun anda!<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
                        redirect('c_login/login');
                    }
                    redirect('data_member');
                 }elseif($data['id_level']=='4'){ //PerusahaanW
                    
                    if ($data['is_active'] == '1') {
                        $this->session->set_userdata('role',$data['id_level']);
                    $this->session->set_userdata('ses_email',$data['email']);
                    $this->session->set_userdata('namalv',$data['nama_level']);
                    $this->session->set_userdata('status',$data['is_active']);
                    $this->session->set_userdata('id_users',$data['id_users']);
                    $this->session->set_userdata('tanggal',$data['tanggal']);
                    $this->session->set_userdata('id_perusahaan',$data['id_perusahaan']);
                        $this->session->set_flashdata('log', 'berhasil');
                        redirect('c_perusahaan/index');
                    }else{
                         $this->session->set_flashdata('alert','<div class="alert alert-danger">Anda terdaftar sebagai perusahaan. Silakan hubungi admin untuk verifikasi akun!<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
                        redirect('c_login/login');  
                    }
                }        
        }else{  // jika username dan password tidak ditemukan atau salah
            $this->session->set_flashdata('alert','<div class="alert alert-danger">Email Atau Password Salah! <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
            redirect('c_login/login');
        }
    }
 
    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('alert','<div class="alert alert-success">Anda berhasil Keluar <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
        redirect('c_login/login');
    }
 
}