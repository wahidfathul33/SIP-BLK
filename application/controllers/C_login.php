<?php
class C_login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('M_perusahaan', 'mp');
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
                // echo "<pre>";
                // print_r ($data);
                // echo "</pre>";exit();

                $this->session->set_userdata('masuk',TRUE);
                 if($data['id_level']=='2'){ //alumni
                    $this->session->set_userdata('akses','2');
                    $this->session->set_userdata('jenis_users',$data['id_level']);
                    $this->session->set_userdata('ses_email',$data['email']);
                    $this->session->set_userdata('namalv',$data['nama_level']);
                    $this->session->set_userdata('status',$data['is_active']);
                    $this->session->set_userdata('id_users',$data['id_users']);
                    $this->session->set_userdata('nama',$data['nama']);
                    $this->session->set_userdata('foto',$data['foto']);
                    $this->session->set_userdata('tanggal',$data['tanggal']);
                    if ($data['is_active'] == '1') {
                        redirect('member');
                    }else{
                        redirect('users/cek_status');
                    }

                 }elseif($data['id_level']=='3'){ //non alumni
                    $this->session->set_userdata('akses','3');
                    $this->session->set_userdata('jenis_users',$data['id_level']);
                    $this->session->set_userdata('ses_email',$data['email']);
                    $this->session->set_userdata('namalv',$data['nama_level']);
                    $this->session->set_userdata('status',$data['is_active']);
                    $this->session->set_userdata('id_users',$data['id_users']);
                    $this->session->set_userdata('nama',$data['nama']);
                    $this->session->set_userdata('foto',$data['foto']);
                    $this->session->set_userdata('tanggal',$data['tanggal']);
                    if ($data['is_active'] == '1') {
                        redirect('member');
                    }else{
                        redirect('users/cek_status');
                    }
                    redirect('data_member');
                 }elseif($data['id_level']=='4'){ //PerusahaanW
                    $this->session->set_userdata('role',$data['id_level']);
                    $this->session->set_userdata('ses_email',$data['email']);
                    $this->session->set_userdata('namalv',$data['nama_level']);
                    $this->session->set_userdata('status',$data['is_active']);
                    $this->session->set_userdata('id_users',$data['id_users']);
                    $this->session->set_userdata('nama',$data['nama_perusahaan']);
                    $this->session->set_userdata('id_perusahaan',$data['id_perusahaan']);
                    $this->session->set_userdata('foto',$data['logo']);
                    $this->session->set_userdata('tanggal',$data['tanggal']);
                    if ($data['is_active'] == '1') {
                        $this->session->set_flashdata('log', 'berhasil');
                        redirect('c_perusahaan/index');
                    }else{
                        redirect('users/cek_status');  
                    }
                }        
        }else{  // jika username dan password tidak ditemukan atau salah
            
            echo $this->session->set_flashdata('msg','Username Atau Password Salah');
            $url=base_url();
            redirect($url);
        }
    }
 
    function logout(){
        $this->session->sess_destroy();
        $url=base_url();
        redirect($url);
    }
 
}