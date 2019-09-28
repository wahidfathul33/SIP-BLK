<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Riwayat_kerja extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Riwayat_kerja_model');
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
            $config['base_url'] = base_url() . 'riwayat_kerja/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'riwayat_kerja/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'riwayat_kerja/index.html';
            $config['first_url'] = base_url() . 'riwayat_kerja/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Riwayat_kerja_model->total_rows($q);
        $id = $this->Riwayat_kerja_model->get_id_member();
        $riwayat_kerja = $this->Riwayat_kerja_model->get_limit_data($config['per_page'], $start, $q, $id);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        if ($riwayat_kerja) {
        $data = array(
            'riwayat_kerja_data' => $riwayat_kerja,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'SIP BLK Surakarta');
        $this->template->load('user_profile', 'contents' , 'riwayat_kerja/riwayat_kerja_list',$data);
        }else {
            redirect(site_url('riwayat_kerja/create'));
        }
    }

    public function read($id) 
    {
        $row = $this->Riwayat_kerja_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pekerjaan' => $row->id_pekerjaan,
		'id_member' => $row->id_member,
		'nama_perusahaan' => $row->nama_perusahaan,
		'jabatan' => $row->jabatan,
		'masa_kerja' => $row->masa_kerja,
	    );
            $this->load->view('riwayat_kerja/riwayat_kerja_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('riwayat_kerja'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('riwayat_kerja/create_action'),
	    'id_pekerjaan' => set_value('id_pekerjaan'),
	    //'id_member' => set_value('id_member'),
	    'nama_perusahaan' => set_value('nama_perusahaan'),
	    'jabatan' => set_value('jabatan'),
	    'masa_kerja' => set_value('masa_kerja'),
	);
        $this->template->set('title', 'SIP BLK Surakarta');
        $this->template->load('user_profile', 'contents' , 'riwayat_kerja/riwayat_kerja_form',$data);
    }
    
    public function create_action() 
    {
        $id_member = $this->Riwayat_kerja_model->get_id_member();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_member' => $id_member,
		'nama_perusahaan' => $this->input->post('nama_perusahaan',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'masa_kerja' => $this->input->post('masa_kerja',TRUE),
	    );

            $this->Riwayat_kerja_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('riwayat_kerja'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Riwayat_kerja_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('riwayat_kerja/update_action'),
		'id_pekerjaan' => set_value('id_pekerjaan', $row->id_pekerjaan),
		'nama_perusahaan' => set_value('nama_perusahaan', $row->nama_perusahaan),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'masa_kerja' => set_value('masa_kerja', $row->masa_kerja),
	    );
        $this->template->set('title', 'SIP BLK Surakarta');
        $this->template->load('user_profile', 'contents' , 'riwayat_kerja/riwayat_kerja_form',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('riwayat_kerja'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pekerjaan', TRUE));
        } else {
            $data = array(
		'nama_perusahaan' => $this->input->post('nama_perusahaan',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'masa_kerja' => $this->input->post('masa_kerja',TRUE),
	    );

            $this->Riwayat_kerja_model->update($this->input->post('id_pekerjaan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('riwayat_kerja'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Riwayat_kerja_model->get_by_id($id);

        if ($row) {
            $this->Riwayat_kerja_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('riwayat_kerja'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('riwayat_kerja'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_perusahaan', 'nama perusahaan', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('masa_kerja', 'masa kerja', 'trim|required');

	$this->form_validation->set_rules('id_pekerjaan', 'id_pekerjaan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Riwayat_kerja.php */
/* Location: ./application/controllers/Riwayat_kerja.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-10 08:21:32 */
/* http://harviacode.com */