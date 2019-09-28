<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lowongan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Lowongan_model');
        $this->load->library('form_validation');
    }

    //admin
    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'lowongan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'lowongan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'lowongan/index.html';
            $config['first_url'] = base_url() . 'lowongan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Lowongan_model->total_rows($q);
        $d = $this->Lowongan_model->get_id_perusahaan();
        if ($d) {
            $id = $d->id_perusahaan;
            $lowongan = $this->Lowongan_model->get_limit_data($config['per_page'], $start, $q, $id);
        }else{
            $lowongan = $this->Lowongan_model->get_limit_data($config['per_page'], $start, $q);
        }
        

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'lowongan_data' => $lowongan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'SIP BLK Surakarta - Lowongan');
        $this->template->set('header', 'List Lowongan');
        $this->template->load('admin_layout', 'contents' , 'lowongan/lowongan_list', $data);
    }

    //perusahaan
    public function show_list()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'lowongan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'lowongan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'lowongan/index.html';
            $config['first_url'] = base_url() . 'lowongan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Lowongan_model->total_rows($q);
        $lowongan = $this->Lowongan_model->get_limit_data2($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        if ($lowongan) {

        $data = array(
            'lowongan_data' => $lowongan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'SIP BLK Surakarta - Lowongan');
        $this->template->set('header', 'List Lowongan');
        $this->template->load('admin_layout', 'contents' , 'lowongan/lowongan_list', $data);
        }else{
            $this->template->set('title', 'SIP BLK Surakarta - Lowongan');
            $this->template->set('header', 'List Lowongan');
            $this->template->load('admin_layout', 'contents' , 'panggilan/panggilan_not_found');
        }
    }

    //perusahaan
    public function read($id) 
    {
        $row = $this->Lowongan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_lowongan' => $row->id_lowongan,
		'id_perusahaan' => $row->id_perusahaan,
		'judul' => $row->judul,
		'ket_lowongan' => $row->ket_lowongan,
		'batas_kuota' => $row->batas_kuota,
		'status_publish' => $row->status_publish,
		'tgl_publish' => $row->tgl_publish,
	    );
        
        $this->template->set('title', 'SIP BLK Surakarta - Lowongan');
        $this->template->set('header', 'Detail Lowongan');
        $this->template->load('admin_layout', 'contents' , 'lowongan/lowongan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lowongan'));
        }
    }

    //front end
    public function read_front($id) 
    {
        $row = $this->Lowongan_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_lowongan' => $row->id_lowongan,
        'id_perusahaan' => $row->id_perusahaan,
        'judul' => $row->judul,
        'ket_lowongan' => $row->ket_lowongan,
        'batas_kuota' => $row->batas_kuota,
        'status_publish' => $row->status_publish,
        'tgl_publish' => $row->tgl_publish,
        );
        
        $this->template->set('title', 'Lowongan');
        $this->template->set('header', 'Detail Lowongan');
        $this->template->load('user_profile', 'contents' , 'lowongan/detail_lowongan', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lowongan'));
        }
    }

    public function create() 
    {
        $d = $this->Lowongan_model->get_id_perusahaan();
        $id_perusahaan = $d->id_perusahaan;
        if ($id_perusahaan) {

        $data = array(
            'button' => 'Create',
            'action' => site_url('lowongan/create_action'),
	    'id_lowongan' => set_value('id_lowongan'),
	    'id_perusahaan' => set_value('id_perusahaan'),
	    'judul' => set_value('judul'),
	    'ket_lowongan' => set_value('ket_lowongan'),
	    'batas_kuota' => set_value('batas_kuota'),
	    'status_publish' => set_value('status_publish'),
	    'tgl_publish' => set_value('tgl_publish'),
	);
        $this->template->set('title', 'Lowongan');
        $this->template->set('header', 'Tambah Lowongan');
        $this->template->load('admin_layout', 'contents' , 'lowongan/lowongan_form', $data);
        }elseif ($this->session->userdata('jenis_users') != 4) {
            redirect(site_url('index'));
        }else{
            redirect(site_url('perusahaan/create'));
        }
    }
    
    public function create_action() 
    {
        $d = $this->Lowongan_model->get_id_perusahaan();
        $id_perusahaan = $d->id_perusahaan;

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_perusahaan' => $id_perusahaan,
		'judul' => $this->input->post('judul',TRUE),
		'ket_lowongan' => $this->input->post('ket_lowongan',TRUE),
		'batas_kuota' => $this->input->post('batas_kuota',TRUE),
		'status_publish' => $this->input->post('status_publish',TRUE),
		'tgl_publish' => $this->input->post('tgl_publish',TRUE),
	    );

            $this->Lowongan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('lowongan'));
        }
        
    }
    
    public function update($id) 
    {
        $row = $this->Lowongan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('lowongan/update_action'),
		'id_lowongan' => set_value('id_lowongan', $row->id_lowongan),
		'judul' => set_value('judul', $row->judul),
		'ket_lowongan' => set_value('ket_lowongan', $row->ket_lowongan),
		'batas_kuota' => set_value('batas_kuota', $row->batas_kuota),
		'status_publish' => set_value('status_publish', $row->status_publish),
		'tgl_publish' => set_value('tgl_publish', $row->tgl_publish),
	    );
            $this->template->set('title', 'Lowongan');
            $this->template->set('header', 'Edit Lowongan');
            $this->template->load('admin_layout', 'contents' , 'lowongan/lowongan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lowongan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_lowongan', TRUE));
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'ket_lowongan' => $this->input->post('ket_lowongan',TRUE),
		'batas_kuota' => $this->input->post('batas_kuota',TRUE),
		'status_publish' => $this->input->post('status_publish',TRUE),
		'tgl_publish' => $this->input->post('tgl_publish',TRUE),
	    );
            $this->Lowongan_model->update($this->input->post('id_lowongan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('lowongan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Lowongan_model->get_by_id($id);

        if ($row) {
            $this->Lowongan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('lowongan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lowongan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_perusahaan', 'id perusahaan', 'trim');
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('ket_lowongan', 'ket lowongan', 'trim|required');
	$this->form_validation->set_rules('batas_kuota', 'batas kuota', 'trim|required');
	$this->form_validation->set_rules('status_publish', 'status publish', 'trim|required');
	$this->form_validation->set_rules('tgl_publish', 'tgl publish', 'trim');

	$this->form_validation->set_rules('id_lowongan', 'id_lowongan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Lowongan.php */
/* Location: ./application/controllers/Lowongan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-10 08:21:32 */
/* http://harviacode.com */