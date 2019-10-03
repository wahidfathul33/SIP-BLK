<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('M_user', 'mdl');
		$this->load->library('form_validation');

	}

	public function register()
	{
		$this->template->set('title', 'Registrasi Pengguna | SIP BLK Surakarta');
        $this->template->load('frontend_layout', 'contents' , 'v_user/register_pilih');
	}

	// Add a new item
	public function register_create()
	{
		$data['role'] = $this->uri->segment(3);
		$this->template->set('title', 'Registrasi Pengguna | SIP BLK Surakarta');
        $this->template->load('frontend_layout', 'contents' , 'v_user/register_form', $data);
	}

	public function register_action()
    {
        $secretKey = '6LfpWrcUAAAAADfSPVJSAnocuZkF1Hl7YOQfUGZV';
        $captcha = $_POST['g-recaptcha-response'];
        // echo "<pre>";
        // print_r ($_POST);
        // echo "</pre>";exit();

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('gagal', '<div class="alert alert-danger">Registrasi gagal! '.form_error('email').'<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
            redirect('c_user/register_create/'.$this->input->post('role',TRUE),'refresh');
        } else {
            $data = array(
			        'email' => $this->input->post('email',TRUE),
			        'password' => password_hash($this->input->post('password',TRUE), PASSWORD_DEFAULT),
			        // 'passconf' => password_hash($this->input->post('passconf',TRUE), PASSWORD_DEFAULT),
			        'id_level' => $this->input->post('role',TRUE),
			        );
            if (!$captcha) {            	
                $this->session->set_flashdata('gagal', '<div class="alert alert-danger">Anda harus ceklis Captcha<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
                redirect('c_user/register_create/'.$this->input->post('role',TRUE),'refresh');
            }else{
                $id = $this->mdl->insert($data);
                $this->verif_email($this->input->post('email'));
            }
        }
    }

	public function verif_email($email){
        $this->load->library('email');
        $row = $this->mdl->get_user_id($email);
        if ($row->id_level != 4) {
           	$config = array( 
                'charset' => 'utf-8',
                'useragent'=> 'Codeigniter', 
                'protocol' => "smtp",
                'smtp_host' => "ssl://smtp.gmail.com",  
                'smtp_port' => "465",
                'smtp_timeout'=> "400", 
                'smtp_user' => "team.antigay@gmail.com",   
                'smtp_pass' => "antigay123",
                'mailtype' => "html",
                'crlf'=>"\r\n",
                'newline'=>"\r\n",   
                'smtp_crypto'=> "SSL",
                'wordwrap'=> TRUE,
                'warpchars'=>"80",
                'mailpath'=> '/usr/sbin/sendmail', 
               ); 
            $this->email->initialize($config);
            $this->email->from('team.antigay@gmail.com', 'Bursa Pasar Kerja BLK Surakarta');
            $this->email->to($email); 
            $this->email->subject('Bursa Pasar Kerja BLK Surakarta');
            $this->email->message('Selamat datang '.$email.' di Sistem Informasi Pasar Kerja BLK Surakarta. <br> Silahkan klik link di bawah ini untuk aktivasi akun anda <br> 
                '.anchor(site_url('c_user/verifikasi/'.$email),'Aktivasi akun'));

            if ($this->email->send()) {
            	$this->session->set_flashdata('alert', '<div class="alert alert-success">Registrasi berhasil! <br>Silakan cek email anda untuk verifikasi akun!<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
	        } else {
	            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Registrasi gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
	        }
        }else{
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Registrasi berhasil! <br>Silakan hubungi admin untuk verifikasi akun!<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
        }
            
            redirect('C_user/register_create/'.$row->id_level,'refresh');
            
    }

    public function resend_verif_email(){
        $this->load->library('email');
        $email = $this->input->post('email');
        $row = $this->mdl->get_user_id($email);
        if ($row) {
            if ($row->is_active == 0) {
                if ($row->id_level != 4) {
                    $config = array( 
                        'charset' => 'utf-8',
                        'useragent'=> 'Codeigniter', 
                        'protocol' => "smtp",
                        'smtp_host' => "ssl://smtp.gmail.com",  
                        'smtp_port' => "465",
                        'smtp_timeout'=> "400", 
                        'smtp_user' => "team.antigay@gmail.com",   
                        'smtp_pass' => "antigay123",
                        'mailtype' => "html",
                        'crlf'=>"\r\n",
                        'newline'=>"\r\n",   
                        'smtp_crypto'=> "SSL",
                        'wordwrap'=> TRUE,
                        'warpchars'=>"80",
                        'mailpath'=> '/usr/sbin/sendmail', 
                       ); 
                    $this->email->initialize($config);
                    $this->email->from('team.antigay@gmail.com', 'Bursa Pasar Kerja BLK Surakarta');
                    $this->email->to($email); 
                    $this->email->subject('Bursa Pasar Kerja BLK Surakarta');
                    $this->email->message('Selamat datang '.$email.' di Sistem Informasi Pasar Kerja BLK Surakarta. <br> Silahkan klik link di bawah ini untuk aktivasi akun anda <br> 
                        '.anchor(site_url('c_user/verifikasi/'.$email),'Aktivasi akun'));

                    if ($this->email->send()) {
                    $this->session->set_flashdata('alert', '<div class="alert alert-success">Kirim ulang email verifikasi berhasil! <br>Silakan cek email anda untuk verifikasi akun!<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
                    } else {
                        $this->session->set_flashdata('alert', '<div class="alert alert-danger">Kirim ulang email verifikasi gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
                    }

                }else{
                    $this->session->set_flashdata('alert', '<div class="alert alert-success">Anda terdaftar sebagai perusahaan. Silakan hubungi admin untuk verifikasi akun!<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
                }
            }else{
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Akun anda sudah aktif!<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
            }
        }else{
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Email belum terdaftar!<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
        }
            
        redirect('C_login/login/','refresh');
    }

    public function verifikasi($email){
    	$data['is_active'] = 1;
        $this->mdl->verifikasi($email, $data);
        
        $this->session->set_flashdata('alert', '<div class="alert alert-success">Verifikasi email berhasil! Silakan login!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
            
        redirect('c_login/user_login','refresh');
    }

    public function forgot_password()
    {
        $this->load->library('email');
        $email = $this->input->post('email');
        $row = $this->mdl->get_user_id($email);
        if ($row) {
            $config = array( 
                'charset' => 'utf-8',
                'useragent'=> 'Codeigniter', 
                'protocol' => "smtp",
                'smtp_host' => "ssl://smtp.gmail.com",  
                'smtp_port' => "465",
                'smtp_timeout'=> "400", 
                'smtp_user' => "team.antigay@gmail.com",   
                'smtp_pass' => "antigay123",
                'mailtype' => "html",
                'crlf'=>"\r\n",
                'newline'=>"\r\n",   
                'smtp_crypto'=> "SSL",
                'wordwrap'=> TRUE,
                'warpchars'=>"80",
                'mailpath'=> '/usr/sbin/sendmail', 
               ); 
            $this->email->initialize($config);
            $this->email->from('team.antigay@gmail.com', 'Bursa Pasar Kerja BLK Surakarta');
            $this->email->to($email); 
            $this->email->subject('Lupa password | Bursa Pasar Kerja BLK Surakarta');
            $email_uri = str_replace('@', 'EMAIL',$email);
            $this->email->message('Silahkan klik link di bawah ini untuk membuat password baru <br> 
                '.anchor(site_url('c_user/create_new_pwd/'.$email_uri),'Aktivasi akun'));

            if ($this->email->send()) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Berhasil! <br>Silakan cek email anda untuk membuat password baru anda!<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Kirim ulang email verifikasi gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
            }
        }else{
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Email belum terdaftar!<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button></div>');
        }
            
        redirect('C_login/login/','refresh');
    }

    public function create_new_pwd($email)
    {
        $data['email'] = str_replace('EMAIL', '@', $email);
        
        $this->template->set('title', 'Lupa Password | SIP BLK Surakarta');
        $this->template->load('frontend_layout', 'contents' , 'v_user/forgot_pwd_form', $data);
    }

    public function create_new_pwd_act(){
        $email = $this->input->post('email');
        $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $this->mdl->update_pwd($email, $data);
        
        $this->session->set_flashdata('alert', '<div class="alert alert-success">Buat password baru berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
            
        redirect('c_login/login','refresh');
    }

	public function _rules() 
    {
    	$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]', ['is_unique' => 'Email sudah terdaftar']);
    	//$this->form_validation->set_rules('status', 'status', 'trim|required');

    	//$this->form_validation->set_rules('id_users', 'id_users', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file C_user.php */
/* Location: ./application/controllers/C_user.php */
