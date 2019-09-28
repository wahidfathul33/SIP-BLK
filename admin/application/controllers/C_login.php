<?php
class C_login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }
 
    function auth(){
        $this->load->view('login/v_login');
    }

    function auth_act(){
        $email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
        $pwd=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $user = $this->login_model->get_user($email);
        $user_pwd = $user->password;

        if(password_verify($pwd, $user_pwd)){
            $array = array(
                'role' => $user->id_level
            );

            $this->session->set_userdata( $array );
            $this->session->set_flashdata('log', 'berhasil');
            redirect('c_admin/index');
        
        }else{  // jika username dan password tidak ditemukan atau salah
            $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><p><i class="icon fa fa-ban"></i> Username Atau Password Salah</p></div>');
            
            redirect('c_login/auth');
        }   
    }
 
    function logout(){
        $this->session->sess_destroy();
        redirect('../index');
    } 
}