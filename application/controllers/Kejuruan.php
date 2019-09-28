<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kejuruan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kejuruan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kejuruan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kejuruan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kejuruan/index.html';
            $config['first_url'] = base_url() . 'kejuruan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kejuruan_model->total_rows($q);
        $kejuruan = $this->Kejuruan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kejuruan_data' => $kejuruan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'SIP BLK Surakarta');
        $this->template->load('admin_layout', 'contents' , 'kejuruan/kejuruan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kejuruan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kejuruan' => $row->id_kejuruan,
		'nama_kejuruan' => $row->nama_kejuruan,
	    );
            $this->template->set('title', 'SIP BLK Surakarta');
            $this->template->load('admin_layout', 'contents' , 'kejuruan/kejuruan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kejuruan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kejuruan/create_action'),
	    'id_kejuruan' => set_value('id_kejuruan'),
	    'nama_kejuruan' => set_value('nama_kejuruan'),
	);
        $this->template->set('title', 'SIP BLK Surakarta');
        $this->template->load('admin_layout', 'contents' , 'kejuruan/kejuruan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kejuruan' => $this->input->post('nama_kejuruan',TRUE),
	    );

            $this->Kejuruan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kejuruan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kejuruan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kejuruan/update_action'),
		'id_kejuruan' => set_value('id_kejuruan', $row->id_kejuruan),
		'nama_kejuruan' => set_value('nama_kejuruan', $row->nama_kejuruan),
	    );
            $this->template->set('title', 'SIP BLK Surakarta');
        $this->template->load('admin_layout', 'contents' , 'kejuruan/kejuruan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kejuruan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kejuruan', TRUE));
        } else {
            $data = array(
		'nama_kejuruan' => $this->input->post('nama_kejuruan',TRUE),
	    );

            $this->Kejuruan_model->update($this->input->post('id_kejuruan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kejuruan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kejuruan_model->get_by_id($id);

        if ($row) {
            $this->Kejuruan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kejuruan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kejuruan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kejuruan', 'nama kejuruan', 'trim|required');

	$this->form_validation->set_rules('id_kejuruan', 'id_kejuruan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kejuruan.php */
/* Location: ./application/controllers/Kejuruan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-10 08:21:32 */
/* http://harviacode.com */