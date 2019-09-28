<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sub_kejuruan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sub_kejuruan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sub_kejuruan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sub_kejuruan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sub_kejuruan/index.html';
            $config['first_url'] = base_url() . 'sub_kejuruan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sub_kejuruan_model->total_rows($q);
        $sub_kejuruan = $this->Sub_kejuruan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sub_kejuruan_data' => $sub_kejuruan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'Home');
        $this->template->load('admin_layout', 'contents' , 'sub_kejuruan/sub_kejuruan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Sub_kejuruan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_sub_kejuruan' => $row->id_sub_kejuruan,
		'id_kejuruan' => $row->id_kejuruan,
		'nama_sub_kejuruan' => $row->nama_sub_kejuruan,
	    );
            $this->template->set('title', 'Home');
        $this->template->load('admin_layout', 'contents' , 'sub_kejuruan/sub_kejuruan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sub_kejuruan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sub_kejuruan/create_action'),
	    'id_sub_kejuruan' => set_value('id_sub_kejuruan'),

        'dd_kejuruan' => $this->Sub_kejuruan_model->dd_kejuruan(),
        'kejuruan_selected' => $this->input->post('id_kejuruan') ? $this->input->post('id_kejuruan') : '',

	    'id_kejuruan' => set_value('id_kejuruan'),
	    'nama_sub_kejuruan' => set_value('nama_sub_kejuruan'),
	);
        $this->template->set('title', 'Home');
        $this->template->load('admin_layout', 'contents' , 'sub_kejuruan/sub_kejuruan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kejuruan' => $this->input->post('id_kejuruan',TRUE),
		'nama_sub_kejuruan' => $this->input->post('nama_sub_kejuruan',TRUE),
	    );

            $this->Sub_kejuruan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sub_kejuruan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sub_kejuruan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sub_kejuruan/update_action'),
		'id_sub_kejuruan' => set_value('id_sub_kejuruan', $row->id_sub_kejuruan),

        'dd_kejuruan' => $this->Sub_kejuruan_model->dd_kejuruan(),
        'kejuruan_selected' => $this->input->post('id_kejuruan') ? $this->input->post('id_kejuruan') : $row->id_kejuruan,

		'nama_sub_kejuruan' => set_value('nama_sub_kejuruan', $row->nama_sub_kejuruan),
	    );
            $this->load->view('sub_kejuruan/sub_kejuruan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sub_kejuruan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sub_kejuruan', TRUE));
        } else {
            $data = array(
		'id_kejuruan' => $this->input->post('id_kejuruan',TRUE),
		'nama_sub_kejuruan' => $this->input->post('nama_sub_kejuruan',TRUE),
	    );

            $this->Sub_kejuruan_model->update($this->input->post('id_sub_kejuruan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sub_kejuruan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sub_kejuruan_model->get_by_id($id);

        if ($row) {
            $this->Sub_kejuruan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sub_kejuruan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sub_kejuruan'));
        }
    }



    public function _rules() 
    {
	$this->form_validation->set_rules('id_kejuruan', 'id kejuruan', 'trim|required');
	$this->form_validation->set_rules('nama_sub_kejuruan', 'nama sub kejuruan', 'trim|required');

	$this->form_validation->set_rules('id_sub_kejuruan', 'id_sub_kejuruan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Sub_kejuruan.php */
/* Location: ./application/controllers/Sub_kejuruan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-10 08:21:33 */
/* http://harviacode.com */