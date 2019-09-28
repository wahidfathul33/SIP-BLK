<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
        $this->template->set('header', '');
    }

    public function index()
    {
        if($this->session->userdata('jenis_users') != '1'){
            redirect('login');
        }

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'users/index.html';
            $config['first_url'] = base_url() . 'users/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows($q);
        $users = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'users_data' => $users,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        //$this->load->view('users/users_list', $data);
        $this->template->set('title', 'Home');
        $this->template->load('admin_layout', 'contents' , 'users/users_list', $data);
    }

    public function read($id) 
    {
        if($this->session->userdata('jenis_users') != '1'){
            redirect('login');
        }

        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_users' => $row->id_users,
		'email' => $row->email,
		'nama_level' => $row->nama_level,
		'status' => $row->status,
	    );
            //$this->load->view('users/users_read', $data);
            $this->template->set('title', 'Home');
            $this->template->load('admin_layout', 'contents' , 'users/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create()
    {
        if($this->session->userdata('jenis_users') != '1'){
            redirect('login');
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('users/create_action'),
	    'id_users' => set_value('id_users'),
	    'email' => set_value('email'),
	    'password' => set_value('password'),
	    'id_level' => set_value('id_level'),
	    'status' => set_value('status'),
	);
        $this->template->set('title', 'Home');
        $this->template->load('admin_layout', 'contents' , 'users/users_form', $data);
    }

    public function register()
    {
        $this->template->set('title', 'Home');
        $this->template->load('user_profile', 'contents' , 'users/v_register');
    }

    public function cek_status()
    {
        $this->template->set('title', 'Home');
        $this->template->load('user_profile', 'contents' , 'users/v_register_status');
    }
    
    public function register_action()
    {
        $secretKey = '6LfpWrcUAAAAADfSPVJSAnocuZkF1Hl7YOQfUGZV';
        $captcha = $_POST['g-recaptcha-response'];

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->register();
        } else {
            $data = array(
        'email' => $this->input->post('email',TRUE),
        'password' => md5($this->input->post('password',TRUE)),
        'id_level' => $this->input->post('id_level',TRUE),
        'status' => $this->input->post('status',TRUE),
        );
            $cek = $this->Users_model->cek_email($data['email']);
            if ($cek != NULL) {
                $this->session->set_flashdata('cek_email', 'Email sudah terdaftar di sistem');
                $this->register();
            }elseif (!$captcha) {
                $this->session->set_flashdata('cek_captcha', 'Anda harus eklis Captcha');
                $this->register();            
            }else{
                $id = $this->Users_model->insert($data);
                $this->kirim_email($id);
            }
        }
    }

    public function kirim_email($id){
        $this->load->library('email');

        $data=$this->Users_model->get_by_id($id);
        $id_users=$id;
               $config = array( 
                'charset' => 'utf-8',
                'useragent'=> 'Codeigniter', 
                'protocol' => "smtp",
                'smtp_host' => "ssl://smtp.gmail.com",  
                'smtp_port' => "465",
                'smtp_timeout'=> "400", 
                'smtp_user' => "wahidfr33@gmail.com",   
                'smtp_pass' => "j4t1s4r1",
                'mailtype' => "html",
                'crlf'=>"\r\n",
                'newline'=>"\r\n",   
                'smtp_crypto'=> "SSL",
                'wordwrap'=> TRUE,
                'warpchars'=>"80",
                'mailpath'=> '/usr/sbin/sendmail', 
               ); 
            $this->email->initialize($config);
            $this->email->from('wahidfr33@gmail.com', 'Bursa Pasar Kerja BLK Surakarta');
            $this->email->to($data->email); 
            $this->email->subject('Bursa Pasar Kerja BLK Surakarta');
            $this->email->message('Selamat datang '.$data->email.' di Sistem Informasi Pasar Kerja BLK Surakarta. <br> 
                Silahkan klik link di bawah ini untuk aktivasi users anda <br> 
                '.anchor(site_url('users/verifikasi/'.$id),'Aktivasi users'));
            $this->email->send();
            $this->template->set('title', 'Home');
            $this->template->load('user_profile', 'contents' , 'users/v_register_success');
    }

    public function verifikasi($id){
        $this->Users_model->verifikasi($id);
        $this->session->set_userdata('status','Aktif');
        $this->template->set('title', 'Home');
        $this->template->load('user_profile', 'contents' , 'users/v_register_status');
    }

    public function create_action() 
    {

        // echo "<pre>";
        // print_r ($_POST);
        // echo "</pre>";
        // exit;
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'email' => $this->input->post('email',TRUE),
		'password' => md5($this->input->post('password',TRUE)),
		'id_level' => $this->input->post('id_level',TRUE),
		//'status' => $this->input->post('status',TRUE),
	    );

            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/update_action'),
		'id_users' => set_value('id_users', $row->id_users),
		'email' => set_value('email', $row->email),
		'id_level' => set_value('id_level', $row->id_level),
		'status' => set_value('status', $row->status),
	    );
            $this->template->set('title', 'Home');
            $this->template->load('admin_layout', 'contents' , 'users/users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_action() 
    {
        
            $data = array(
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Users_model->update($this->input->post('id_users', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users'));
        
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }


    public function _rules() 
    {
    	$this->form_validation->set_rules('email', 'Email', 'trim|required');
    	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[30]');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]');
    	$this->form_validation->set_rules('id_level', 'Jenis users', 'trim|required');
    	//$this->form_validation->set_rules('status', 'status', 'trim|required');

    	//$this->form_validation->set_rules('id_users', 'id_users', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-10 08:21:32 */
/* http://harviacode.com */