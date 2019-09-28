<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Riwayat_pendidikan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Riwayat_pendidikan_model');
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
            $config['base_url'] = base_url() . 'riwayat_pendidikan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'riwayat_pendidikan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'riwayat_pendidikan/index.html';
            $config['first_url'] = base_url() . 'riwayat_pendidikan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Riwayat_pendidikan_model->total_rows($q);
        $id = $this->Riwayat_pendidikan_model->get_id_member();
        $riwayat_pendidikan = $this->Riwayat_pendidikan_model->get_limit_data($config['per_page'], $start, $q,$id);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        if ($riwayat_pendidikan){
        $data = array(
            'riwayat_pendidikan_data' => $riwayat_pendidikan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'SIP BLK Surakarta');
        $this->template->load('user_profile', 'contents' , 'riwayat_pendidikan/riwayat_pendidikan_list',$data);
        } else {
            redirect(site_url('riwayat_pendidikan/create'));
        }
    }

    public function read($id) 
    {
        $row = $this->Riwayat_pendidikan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pendidikan' => $row->id_pendidikan,
		'id_member' => $row->id_member,
		'nama_sekolah' => $row->nama_sekolah,
		'kota' => $row->kota,
		'jurusan' => $row->jurusan,
		'thn_masuk' => $row->thn_masuk,
		'thn_lulus' => $row->thn_lulus,
	    );
            $this->load->view('riwayat_pendidikan/riwayat_pendidikan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('riwayat_pendidikan'));
        }
    }

    public function create() 
    {
        
        $data = array(
            'button' => 'Create',
            'action' => site_url('riwayat_pendidikan/create_action'),
	    'id_pendidikan' => set_value('id_pendidikan'),
        //'id_member' => set_value('id_member'),
	    'nama_sekolah' => set_value('nama_sekolah'),
	    'jurusan' => set_value('jurusan'),
	    'thn_masuk' => set_value('thn_masuk'),
	    'thn_lulus' => set_value('thn_lulus'),
	);
         $this->template->set('title', 'SIP BLK Surakarta');
        $this->template->load('user_profile', 'contents' , 'riwayat_pendidikan/riwayat_pendidikan_form',$data);
    }
    
    public function create_action() 
    {        
        $id_member = $this->Riwayat_pendidikan_model->get_id_member();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_member' => $id_member,
		'nama_sekolah' => $this->input->post('nama_sekolah',TRUE),
		'jurusan' => $this->input->post('jurusan',TRUE),
		'thn_masuk' => $this->input->post('thn_masuk',TRUE),
		'thn_lulus' => $this->input->post('thn_lulus',TRUE),
	    );

            $this->Riwayat_pendidikan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('riwayat_pendidikan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Riwayat_pendidikan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('riwayat_pendidikan/update_action'),
		'id_pendidikan' => set_value('id_pendidikan', $row->id_pendidikan),
		'nama_sekolah' => set_value('nama_sekolah', $row->nama_sekolah),
		'jurusan' => set_value('jurusan', $row->jurusan),
		'thn_masuk' => set_value('thn_masuk', $row->thn_masuk),
		'thn_lulus' => set_value('thn_lulus', $row->thn_lulus),
	    );
            $this->template->set('title', 'SIP BLK Surakarta');
            $this->template->load('user_profile', 'contents' , 'riwayat_pendidikan/riwayat_pendidikan_form',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('riwayat_pendidikan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pendidikan', TRUE));
        } else {
            $data = array(
		'nama_sekolah' => $this->input->post('nama_sekolah',TRUE),
		'jurusan' => $this->input->post('jurusan',TRUE),
		'thn_masuk' => $this->input->post('thn_masuk',TRUE),
		'thn_lulus' => $this->input->post('thn_lulus',TRUE),
	    );

            $this->Riwayat_pendidikan_model->update($this->input->post('id_pendidikan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('riwayat_pendidikan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Riwayat_pendidikan_model->get_by_id($id);

        if ($row) {
            $this->Riwayat_pendidikan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('riwayat_pendidikan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('riwayat_pendidikan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_sekolah', 'nama sekolah', 'trim|required');
	$this->form_validation->set_rules('jurusan', 'jurusan', 'trim|required');
	$this->form_validation->set_rules('thn_masuk', 'thn masuk', 'trim|required');
	$this->form_validation->set_rules('thn_lulus', 'thn lulus', 'trim|required');

	$this->form_validation->set_rules('id_pendidikan', 'id_pendidikan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Riwayat_pendidikan.php */
/* Location: ./application/controllers/Riwayat_pendidikan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-10 08:21:33 */
/* http://harviacode.com */