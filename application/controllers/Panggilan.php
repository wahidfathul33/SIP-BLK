<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Panggilan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Panggilan_model');
        $this->load->library('form_validation');
        $this->template->set('header', '');

        if($this->session->userdata('masuk') != TRUE){
            redirect('index');
        } 
        if ($this->session->userdata('status') != '1')
        {
            redirect('users/cek_status');
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'panggilan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'panggilan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'panggilan/index.html';
            $config['first_url'] = base_url() . 'panggilan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Panggilan_model->total_rows($q);
        $panggilan = $this->Panggilan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'panggilan_data' => $panggilan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'SIP BLK Surakarta - Panggilan');
        $this->template->load('admin_layout', 'contents' , 'panggilan/panggilan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Panggilan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_panggilan' => $row->id_panggilan,
		'header' => $row->header,
		'tanggal' => $row->tanggal,
		'waktu_mulai' => $row->waktu_mulai,
		'waktu_selesai' => $row->waktu_selesai,
		'lokasi' => $row->lokasi,
		'jenis_tes' => $row->jenis_tes,
		'keterangan' => $row->keterangan,
	    );
            $this->template->set('title', 'SIP BLK Surakarta - Panggilan');
            $this->template->load('admin_layout', 'contents' , 'panggilan/panggilan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panggilan'));
        }
    }

    public function read_member($id) 
    {
        $row = $this->Panggilan_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_panggilan' => $row->id_panggilan,
        'header' => $row->header,
        'tanggal' => $row->tanggal,
        'waktu_mulai' => $row->waktu_mulai,
        'waktu_selesai' => $row->waktu_selesai,
        'lokasi' => $row->lokasi,
        'jenis_tes' => $row->jenis_tes,
        'keterangan' => $row->keterangan,
        );
            $this->template->set('title', 'SIP BLK Surakarta - Panggilan');
            $this->template->load('user_profile', 'contents' , 'panggilan/panggilan_read_member', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panggilan'));
        }
    }


    public function panggilan_tes() 
    {

        $id_lowongan = $this->Panggilan_model->get_id_lowongan();


        echo "<pre>";
        print_r ($id_lowongan);
        echo "</pre>";exit();


        $id = $this->Panggilan_model->get_id_panggilan();
        $iad= $id->id_panggilan;
        $row = $this->Panggilan_model->get_by_id($iad);
        if ($row) {
            $data = array(
        'id_panggilan' => $row->id_panggilan,
        'header' => $row->header,
        'tanggal' => $row->tanggal,
        'waktu_mulai' => $row->waktu_mulai,
        'waktu_selesai' => $row->waktu_selesai,
        'lokasi' => $row->lokasi,
        'jenis_tes' => $row->jenis_tes,
        'keterangan' => $row->keterangan,
        );
            $this->template->set('title', 'SIP BLK Surakarta - Panggilan');
            $this->template->load('admin_layout', 'contents' , 'panggilan/panggilan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panggilan'));
        }
    }

    public function show_list()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'panggilan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'panggilan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'panggilan/index.html';
            $config['first_url'] = base_url() . 'panggilan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Panggilan_model->total_rows($q);
        $panggilan = $this->Panggilan_model->get_id_lowongan($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        if ($panggilan) {
        
        $data = array(
            'panggilan_data' => $panggilan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'SIP BLK Surakarta - Panggilan');
        $this->template->load('user_profile', 'contents' , 'panggilan/panggilan_list_member', $data);
        }else{
        $this->template->set('title', 'SIP BLK Surakarta - Panggilan');
        $this->template->load('user_profile', 'contents' , 'panggilan/panggilan_not_found');
        }  
    }

    public function create($id) 
    {
        $this->load->model('Lowongan_model');
        $lowongan_data = $this->Lowongan_model->get_by_id($id);
        $judul_lowongan = $lowongan_data->judul;
        $id_lowongan = $lowongan_data->id_lowongan;
        $data = array(
            'button' => 'Create',
            'action' => site_url('panggilan/create_action'),
	    'id_panggilan' => set_value('id_panggilan'),
	    'header' => set_value('header'),
	    'tanggal' => set_value('tanggal'),
	    'waktu_mulai' => set_value('waktu_mulai'),
	    'waktu_selesai' => set_value('waktu_selesai'),
	    'lokasi' => set_value('lokasi'),
	    'jenis_tes' => set_value('jenis_tes'),
	    'keterangan' => set_value('keterangan'),
        'judul_lowongan' => $judul_lowongan,
        'id_lowongan' => $id_lowongan
	);
        $this->template->set('title', 'SIP BLK Surakarta - Panggilan');
        $this->template->load('admin_layout', 'contents' , 'panggilan/panggilan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'header' => $this->input->post('header',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'waktu_mulai' => $this->input->post('waktu_mulai',TRUE),
		'waktu_selesai' => $this->input->post('waktu_selesai',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'jenis_tes' => $this->input->post('jenis_tes',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );
            $id_lowongan = $this->input->post('id_lowongan',TRUE);

            $id = $this->Panggilan_model->insert($data);
            echo "<pre>";
            print_r ($id);
            echo "</pre>";
            $this->Panggilan_model->update_lowongan($id, $id_lowongan);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('panggilan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Panggilan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('panggilan/update_action'),
		'id_panggilan' => set_value('id_panggilan', $row->id_panggilan),
		'header' => set_value('header', $row->header),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'waktu_mulai' => set_value('waktu_mulai', $row->waktu_mulai),
		'waktu_selesai' => set_value('waktu_selesai', $row->waktu_selesai),
		'lokasi' => set_value('lokasi', $row->lokasi),
		'jenis_tes' => set_value('jenis_tes', $row->jenis_tes),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->set('title', 'SIP BLK Surakarta - Panggilan');
            $this->template->load('admin_layout', 'contents' , 'panggilan/panggilan_form_update', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panggilan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_panggilan', TRUE));
        } else {
            $data = array(
		'header' => $this->input->post('header',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'waktu_mulai' => $this->input->post('waktu_mulai',TRUE),
		'waktu_selesai' => $this->input->post('waktu_selesai',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'jenis_tes' => $this->input->post('jenis_tes',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Panggilan_model->update($this->input->post('id_panggilan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('panggilan/read/'.$this->input->post('id_panggilan', TRUE)));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Panggilan_model->get_by_id($id);

        if ($row) {
            $this->Panggilan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('panggilan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panggilan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('header', 'header', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('waktu_mulai', 'waktu mulai', 'trim|required');
	$this->form_validation->set_rules('waktu_selesai', 'waktu selesai', 'trim|required');
	$this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
	$this->form_validation->set_rules('jenis_tes', 'jenis tes', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_panggilan', 'id_panggilan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Panggilan.php */
/* Location: ./application/controllers/Panggilan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-10 08:21:32 */
/* http://harviacode.com */