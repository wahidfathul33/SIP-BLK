<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perusahaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Perusahaan_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $this->template->set('title', 'SIP BLK Surakarta');
        $this->template->set('header', 'Dashboard');
        $this->template->load('admin_layout', 'contents' , 'perusahaan/perusahaan_dashboard');
    }

    public function show_list()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'perusahaan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'perusahaan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'perusahaan/index.html';
            $config['first_url'] = base_url() . 'perusahaan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Perusahaan_model->total_rows($q);
        $perusahaan = $this->Perusahaan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'perusahaan_data' => $perusahaan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'Perusahaan');
        $this->template->set('header', 'List Perusahaan');
        $this->template->load('admin_layout', 'contents' , 'perusahaan/perusahaan_list', $data);
    }

    public function read($id) 
    {
        // $cek = $this->Perusahaan_model->cek_data($id);
        // if ($cek == NULL) {
        //     $this->create();
        // }

        $row = $this->Perusahaan_model->get_by_id_users($id);
        if ($row) {
            $data = array(
		'id_perusahaan' => $row->id_perusahaan,
		'id_users' => $row->id_users,
		'nama_perusahaan' => $row->nama_perusahaan,
		'alamat_perusahaan' => $row->alamat_perusahaan,
		'kode_pos' => $row->kode_pos,
		'skala' => $row->skala,
		'no_telpon' => $row->no_telpon,
		'email' => $row->email,
		'bidang_usaha' => $row->bidang_usaha,
		'website' => $row->website,
		'deskripsi' => $row->deskripsi,
		'logo' => $row->logo,
		'siup' => $row->siup,
		'npwp' => $row->npwp,
	    );
            $this->template->set('title', 'Profil');
            $this->template->set('header', 'Profil Perusahaan');
            $this->template->load('admin_layout', 'contents' , 'perusahaan/perusahaan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perusahaan/create'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('perusahaan/create_action'),
	    'id_perusahaan' => set_value('id_perusahaan'),
	    'id_users' => set_value('id_users'),
	    'nama_perusahaan' => set_value('nama_perusahaan'),
	    'alamat_perusahaan' => set_value('alamat_perusahaan'),
	    'kode_pos' => set_value('kode_pos'),
	    'skala' => set_value('skala'),
	    'no_telpon' => set_value('no_telpon'),
	    'email' => set_value('email'),
	    'bidang_usaha' => set_value('bidang_usaha'),
	    'website' => set_value('website'),
	    'deskripsi' => set_value('deskripsi'),
	    'logo' => set_value('logo'),
	    'siup' => set_value('siup'),
	    'npwp' => set_value('npwp'),
	);
        $this->template->set('title', 'Profil');
        $this->template->set('header', 'Profil Perusahaan');
        $this->template->load('admin_layout', 'contents' , 'perusahaan/perusahaan_form', $data);

    }
    
    public function create_action() 
    {
        $id = $this->session->userdata('id_users');

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

        if(! empty($_FILES) && $_FILES['logo']['name'] != null){
            $namaFile = $this->session->userdata('id_users')."-".$_FILES['logo']['name'];

            $config['upload_path'] = './uploads/documents';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '11024';
            $this->load->library('upload', $config);

            $config['file_name'] = $namaFile;
            $this->upload->initialize($config);

            if($this->upload->do_upload('logo')){
                $logo = $namaFile;
            }
            else{
                $logo = null;
            }
        }
        else{
            $logo = null;
        }

        if(! empty($_FILES) && $_FILES['siup']['name'] != null){
            $namaFile = $this->session->userdata('id_users')."-".$_FILES['siup']['name'];

            $config['upload_path'] = './uploads/documents';
            $config['allowed_types'] = 'jpg|png|jpeg|pdf';
            $config['max_size']     = '11024';
            $this->load->library('upload', $config);

            $config['file_name'] = $namaFile;
            $this->upload->initialize($config);

            if($this->upload->do_upload('siup')){
                $siup = $namaFile;
            }
            else{
                $siup = null;
            }
        }
        else{
            $siup = null;
        }

        if(! empty($_FILES) && $_FILES['npwp']['name'] != null){
            $namaFile = $this->session->userdata('id_users')."-".$_FILES['npwp']['name'];

            $config['upload_path'] = './uploads/documents';
            $config['allowed_types'] = 'jpg|png|jpeg|pdf';
            $config['max_size']     = '11024';
            $this->load->library('upload', $config);

            $config['file_name'] = $namaFile;
            $this->upload->initialize($config);

            if($this->upload->do_upload('npwp')){
                $npwp = $namaFile;
            }
            else{
                $npwp = null;
            }
        }
        else{
            $npwp = null;
        }

            $data = array(
		'id_users' => $id,
		'nama_perusahaan' => $this->input->post('nama_perusahaan',TRUE),
		'alamat_perusahaan' => $this->input->post('alamat_perusahaan',TRUE),
		'kode_pos' => $this->input->post('kode_pos',TRUE),
		'skala' => $this->input->post('skala',TRUE),
		'no_telpon' => $this->input->post('no_telpon',TRUE),
		'email' => $this->input->post('email',TRUE),
		'bidang_usaha' => $this->input->post('bidang_usaha',TRUE),
		'website' => $this->input->post('website',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'logo' => $logo,
		'siup' => $siup,
		'npwp' => $npwp,
	    );

            $this->Perusahaan_model->insert($data);
            $this->read($id);
        }
    }
    
    public function update($id) 
    {
        // echo "<pre>";
        // print_r ($cek);
        // echo "</pre>";exit();

        $row = $this->Perusahaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('perusahaan/update_action'),
		'id_perusahaan' => set_value('id_perusahaan', $row->id_perusahaan),
		'id_users' => set_value('id_users', $row->id_users),
		'nama_perusahaan' => set_value('nama_perusahaan', $row->nama_perusahaan),
		'alamat_perusahaan' => set_value('alamat_perusahaan', $row->alamat_perusahaan),
		'kode_pos' => set_value('kode_pos', $row->kode_pos),
		'skala' => set_value('skala', $row->skala),
		'no_telpon' => set_value('no_telpon', $row->no_telpon),
		'email' => set_value('email', $row->email),
		'bidang_usaha' => set_value('bidang_usaha', $row->bidang_usaha),
		'website' => set_value('website', $row->website),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'logo' => set_value('logo', $row->logo),
		'siup' => set_value('siup', $row->siup),
		'npwp' => set_value('npwp', $row->npwp),
	    );
            $this->template->set('title', 'Profil');
            $this->template->set('header', 'Profil Perusahaan');
            $this->template->load('admin_layout', 'contents' , 'perusahaan/perusahaan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perusahaan'));
        }
    }
    
    public function update_action() 
    {
        $id = $this->session->userdata('id_users');

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_perusahaan', TRUE));
        } else {
            $row = $this->Perusahaan_model->get_by_id($id);
            $path_to_file = './uploads/img/'.$row->logo;
            unlink($path_to_file);
            if(! empty($_FILES) && $_FILES['logo']['name'] != null){
            $namaFile = $this->session->userdata('id_users')."-".$_FILES['logo']['name'];

            $config['upload_path'] = './uploads/img';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '11024';
            $this->load->library('upload', $config);

            $config['file_name'] = $namaFile;
            $this->upload->initialize($config);

                if($this->upload->do_upload('logo')){
                    $logo = $namaFile;
                }
                else{
                    $logo = null;
                }
            }
            else{
                $logo = null;
            }

        if(! empty($_FILES) && $_FILES['siup']['name'] != null){
            $namaSiup = $this->session->userdata('id_users')."-".$_FILES['siup']['name'];

            $config['upload_path'] = './uploads/documents';
            $config['allowed_types'] = 'pdf';
            $config['max_size']     = '11024';
            $this->load->library('upload', $config);

            $config['file_name'] = $namaSiup;
            $this->upload->initialize($config);

            if($this->upload->do_upload('siup')){
                $siup = $namaSiup;
            }
            else{
                $siup = null;
            }
        }
        else{
            $siup = null;
        }

        if(! empty($_FILES) && $_FILES['npwp']['name'] != null){
            $namaNpwp = $this->session->userdata('id_users')."-".$_FILES['npwp']['name'];

            $config['upload_path'] = './uploads/documents';
            $config['allowed_types'] = 'pdf';
            $config['max_size']     = '11024';
            $this->load->library('upload', $config);

            $config['file_name'] = $namaNpwp;
            $this->upload->initialize($config);

            if($this->upload->do_upload('npwp')){
                $npwp = $namaNpwp;
            }
            else{
                $npwp = null;
            }
        }
        else{
            $npwp = null;
        }


        $data = array(
        		'id_users' => $id,
        		'nama_perusahaan' => $this->input->post('nama_perusahaan',TRUE),
        		'alamat_perusahaan' => $this->input->post('alamat_perusahaan',TRUE),
        		'kode_pos' => $this->input->post('kode_pos',TRUE),
        		'skala' => $this->input->post('skala',TRUE),
        		'no_telpon' => $this->input->post('no_telpon',TRUE),
        		'email' => $this->input->post('email',TRUE),
        		'bidang_usaha' => $this->input->post('bidang_usaha',TRUE),
        		'website' => $this->input->post('website',TRUE),
        		'deskripsi' => $this->input->post('deskripsi',TRUE),
        		'logo' => $logo,
        		'siup' => $siup,
        		'npwp' => $npwp,
	           );

            $this->Perusahaan_model->update($this->input->post('id_perusahaan', TRUE), $data);
            
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('perusahaan/read/'.$id));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Perusahaan_model->get_by_id($id);

        if ($row) {
            $this->Perusahaan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('perusahaan/show_list'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perusahaan/show_list'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_users', 'id akun', 'trim');
	$this->form_validation->set_rules('nama_perusahaan', 'nama perusahaan', 'trim|required');
	$this->form_validation->set_rules('alamat_perusahaan', 'alamat perusahaan', 'trim|required');
	$this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|required');
	$this->form_validation->set_rules('skala', 'skala', 'trim|required');
	$this->form_validation->set_rules('no_telpon', 'no telpon', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('bidang_usaha', 'bidang usaha', 'trim|required');
	$this->form_validation->set_rules('website', 'website', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	// $this->form_validation->set_rules('logo', 'logo', 'trim|required');
	// $this->form_validation->set_rules('siup', 'siup', 'trim|required');
	// $this->form_validation->set_rules('npwp', 'npwp', 'trim|required');

	$this->form_validation->set_rules('id_perusahaan', 'id_perusahaan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Perusahaan.php */
/* Location: ./application/controllers/Perusahaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-10 08:21:32 */
/* http://harviacode.com */