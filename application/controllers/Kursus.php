<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kursus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kursus_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kursus/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kursus/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kursus/index.html';
            $config['first_url'] = base_url() . 'kursus/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kursus_model->total_rows($q);
        $kursus = $this->Kursus_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kursus_data' => $kursus,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('kursus/kursus_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kursus_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kursus' => $row->id_kursus,
		'id_member' => $row->id_member,
		'nama_kursus' => $row->nama_kursus,
		'penyelenggara' => $row->penyelenggara,
		'kota' => $row->kota,
		'tahun' => $row->tahun,
		'lama_kursus' => $row->lama_kursus,
	    );
            $this->load->view('kursus/kursus_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kursus'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kursus/create_action'),
	    'id_kursus' => set_value('id_kursus'),
	    'id_member' => set_value('id_member'),
	    'nama_kursus' => set_value('nama_kursus'),
	    'penyelenggara' => set_value('penyelenggara'),
	    'kota' => set_value('kota'),
	    'tahun' => set_value('tahun'),
	    'lama_kursus' => set_value('lama_kursus'),
	);
        $this->load->view('kursus/kursus_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_member' => $this->input->post('id_member',TRUE),
		'nama_kursus' => $this->input->post('nama_kursus',TRUE),
		'penyelenggara' => $this->input->post('penyelenggara',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'lama_kursus' => $this->input->post('lama_kursus',TRUE),
	    );

            $this->Kursus_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kursus'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kursus_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kursus/update_action'),
		'id_kursus' => set_value('id_kursus', $row->id_kursus),
		'id_member' => set_value('id_member', $row->id_member),
		'nama_kursus' => set_value('nama_kursus', $row->nama_kursus),
		'penyelenggara' => set_value('penyelenggara', $row->penyelenggara),
		'kota' => set_value('kota', $row->kota),
		'tahun' => set_value('tahun', $row->tahun),
		'lama_kursus' => set_value('lama_kursus', $row->lama_kursus),
	    );
            $this->load->view('kursus/kursus_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kursus'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kursus', TRUE));
        } else {
            $data = array(
		'id_member' => $this->input->post('id_member',TRUE),
		'nama_kursus' => $this->input->post('nama_kursus',TRUE),
		'penyelenggara' => $this->input->post('penyelenggara',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'lama_kursus' => $this->input->post('lama_kursus',TRUE),
	    );

            $this->Kursus_model->update($this->input->post('id_kursus', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kursus'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kursus_model->get_by_id($id);

        if ($row) {
            $this->Kursus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kursus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kursus'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_member', 'id member', 'trim|required');
	$this->form_validation->set_rules('nama_kursus', 'nama kursus', 'trim|required');
	$this->form_validation->set_rules('penyelenggara', 'penyelenggara', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('lama_kursus', 'lama kursus', 'trim|required');

	$this->form_validation->set_rules('id_kursus', 'id_kursus', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kursus.php */
/* Location: ./application/controllers/Kursus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-10 08:21:32 */
/* http://harviacode.com */