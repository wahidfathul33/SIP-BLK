<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelamar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pelamar_model');
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
            $config['base_url'] = base_url() . 'pelamar/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pelamar/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pelamar/index.html';
            $config['first_url'] = base_url() . 'pelamar/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pelamar_model->total_rows($q);
        $pelamar = $this->Pelamar_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pelamar_data' => $pelamar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'SIP BLK Surakarta');
        $this->template->load('admin_layout', 'contents' , 'pelamar/pelamar_list', $data);
    }

    public function list_pelamar($id)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pelamar/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pelamar/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pelamar/index.html';
            $config['first_url'] = base_url() . 'pelamar/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pelamar_model->total_rows($q, $id);
        $pelamar = $this->Pelamar_model->get_data_pelamar($config['per_page'], $start, $q, $id);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pelamar_data' => $pelamar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'SIP BLK Surakarta');
        $this->template->load('admin_layout', 'contents' , 'pelamar/pelamar_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pelamar_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pelamar' => $row->id_pelamar,
		'id_member' => $row->id_member,
		'id_lowongan' => $row->id_lowongan,
	    );
            $this->load->view('pelamar/pelamar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelamar'));
        }
    }

    public function update_status($id){
        $this->Pelamar_model->update_status($id);
        redirect('pelamar','refresh');
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pelamar/create_action'),
	    'id_pelamar' => set_value('id_pelamar'),
	    'id_member' => set_value('id_member'),
	    'id_lowongan' => set_value('id_lowongan'),
	);
        $this->template->set('title', 'SIP BLK Surakarta');
        $this->template->load('admin_layout', 'contents' , 'pelamar/pelamar_form', $data);
    }
    
    public function create_action($id) 
    {
        $id_member = $this->Pelamar_model->get_id_member();
        $id_member_data = $id_member->id_member;
        $d = $this->Pelamar_model->get_all();
        if ($d->id_member == $id_member_data || $d->$id_lowongan == $id) {
            $this->template->set('title', 'SIP BLK Surakarta');
            $this->template->load('admin_layout', 'contents' , 'pelamar/pelamar_failed', $data);
        }else{

        // $this->_rules();

        // if ($this->form_validation->run() == FALSE) {
        //     $this->create();
        // } else {
            $data = array(
		'id_member' => $id_member_data,
		'id_lowongan' => $id,
        'status' => 'Diproses'
	    );

            $this->Pelamar_model->insert($data);
           // $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('lowongan/read_front/'.$id));

        }
    }
    
    public function update($id) 
    {
        $row = $this->Pelamar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pelamar/update_action'),
		'id_pelamar' => set_value('id_pelamar', $row->id_pelamar),
		'id_member' => set_value('id_member', $row->id_member),
		'id_lowongan' => set_value('id_lowongan', $row->id_lowongan),
	    );
            $this->template->set('title', 'SIP BLK Surakarta');
            $this->template->load('admin_layout', 'contents' , 'pelamar/pelamar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelamar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pelamar', TRUE));
        } else {
            $data = array(
		'id_member' => $this->input->post('id_member',TRUE),
		'id_lowongan' => $this->input->post('id_lowongan',TRUE),
	    );

            $this->Pelamar_model->update($this->input->post('id_pelamar', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pelamar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pelamar_model->get_by_id($id);

        if ($row) {
            $this->Pelamar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('member'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('member'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_member', 'id member', 'trim');
	$this->form_validation->set_rules('id_lowongan', 'id lowongan', 'trim');

	$this->form_validation->set_rules('id_pelamar', 'id_pelamar', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file pelamar.php */
/* Location: ./application/controllers/pelamar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-10 08:21:32 */
/* http://harviacode.com */