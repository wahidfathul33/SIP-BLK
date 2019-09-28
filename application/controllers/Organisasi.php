<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Organisasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Organisasi_model');
        $this->load->library('form_validation');
        $this->template->set('header', '');

        if($this->session->userdata('masuk') != TRUE){
            redirect('index');
        }
        if ($this->session->userdata('status') != 'Aktif')
        {
            redirect('users/cek_status');
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'organisasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'organisasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'organisasi/index.html';
            $config['first_url'] = base_url() . 'organisasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Organisasi_model->total_rows($q);
        $organisasi = $this->Organisasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'organisasi_data' => $organisasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('organisasi/organisasi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Organisasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_organisasi' => $row->id_organisasi,
		'id_member' => $row->id_member,
		'nama_organisasi' => $row->nama_organisasi,
		'jabatan' => $row->jabatan,
		'masa_kerja' => $row->masa_kerja,
	    );
            $this->load->view('organisasi/organisasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('organisasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('organisasi/create_action'),
	    'id_organisasi' => set_value('id_organisasi'),
	    'id_member' => set_value('id_member'),
	    'nama_organisasi' => set_value('nama_organisasi'),
	    'jabatan' => set_value('jabatan'),
	    'masa_kerja' => set_value('masa_kerja'),
	);
        $this->load->view('organisasi/organisasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_member' => $this->input->post('id_member',TRUE),
		'nama_organisasi' => $this->input->post('nama_organisasi',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'masa_kerja' => $this->input->post('masa_kerja',TRUE),
	    );

            $this->Organisasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('organisasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Organisasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('organisasi/update_action'),
		'id_organisasi' => set_value('id_organisasi', $row->id_organisasi),
		'id_member' => set_value('id_member', $row->id_member),
		'nama_organisasi' => set_value('nama_organisasi', $row->nama_organisasi),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'masa_kerja' => set_value('masa_kerja', $row->masa_kerja),
	    );
            $this->load->view('organisasi/organisasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('organisasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_organisasi', TRUE));
        } else {
            $data = array(
		'id_member' => $this->input->post('id_member',TRUE),
		'nama_organisasi' => $this->input->post('nama_organisasi',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'masa_kerja' => $this->input->post('masa_kerja',TRUE),
	    );

            $this->Organisasi_model->update($this->input->post('id_organisasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('organisasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Organisasi_model->get_by_id($id);

        if ($row) {
            $this->Organisasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('organisasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('organisasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_member', 'id member', 'trim|required');
	$this->form_validation->set_rules('nama_organisasi', 'nama organisasi', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('masa_kerja', 'masa kerja', 'trim|required');

	$this->form_validation->set_rules('id_organisasi', 'id_organisasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Organisasi.php */
/* Location: ./application/controllers/Organisasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-10 08:21:32 */
/* http://harviacode.com */