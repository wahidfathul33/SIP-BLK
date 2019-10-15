<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_loker extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_loker', 'loker');
		$this->load->model('M_wilayah', 'wil');
		$this->load->model('M_member', 'member');
	}

	public function index()
	{
		//pagination
		$page = intval($this->input->get('page'));
		$this->load->library('pagination');
		$config['base_url'] = site_url('c_loker/index'); //site url
		if ($this->session->userdata('role') == 2) {
        	$config['total_rows'] = $this->loker->count_loker_all(); //total row
	    }else{
	    	$config['total_rows'] = $this->loker->count_loker_publik(); //total row
	    }
        $config['per_page'] = 1;  //show record per halaman
        $config['page_query_string'] = TRUE;
 		
        $this->pagination->initialize($config);

 		if ($this->session->userdata('role') == 2) {
 			$data['loker_data'] = $this->loker->get_loker_limit_all($config["per_page"], $page);
 		}else{
 			$data['loker_data'] = $this->loker->get_loker_limit_publik($config["per_page"], $page);    
 		}
               
        $data['pagination'] = $this->pagination->create_links();
        // endpagination
        $data['lokasi'] = $this->wil->get_kab();
        $data['kategori'] = $this->loker->get_kategori();

        
        $kategori=$this->loker->count_kategori();

        $data['jml_kategori_data'] = $kategori;

		$this->template->set('title', 'Home | SIP BLK Surakarta');
        $this->template->load('frontend_layout', 'contents' , 'v_loker/beranda', $data);
	}

	public function loker_detail($id_loker)
	{
		$data['loker'] = $this->loker->get_loker_detail($id_loker);
		//cek daftar is 1
		if($this->session->userdata('role') == 2 || $this->session->userdata('role') == 3){
		$id_member = $this->member->get_member()->id_member;
		$data['cek_daftar'] = $this->loker->cek_daftar($id_loker, $id_member);}
		// echo "<pre>";
		// print_r ($data['cek_daftar']);
		// echo "</pre>";exit();

		$this->template->set('title', 'Lowongan Kerja | SIP BLK Surakarta');
        $this->template->load('frontend_layout', 'contents' , 'v_loker/loker_detail', $data);
	}

	public function loker_cari()
	{
		$keyword = $this->input->get('keyword');
		$lokasi	 = $this->input->get('lokasi');
		$kategori= $this->input->get('kategori');

		//pagination
		$page = intval($this->input->get('page'));
		$this->load->library('pagination');
		$config['base_url'] = site_url('c_loker/loker_cari'); //site url
		if ($this->session->userdata('role') == 2) {
        	$config['total_rows'] = $this->loker->count_loker_cari_all($keyword, $lokasi, $kategori); //total row
	    }else{
	    	$config['total_rows'] = $this->loker->count_loker_cari_publik($keyword, $lokasi, $kategori); //total row
	    }
        $config['per_page'] = 1;  //show record per halaman
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
 		
        $this->pagination->initialize($config);

 		if ($this->session->userdata('role') == 2) {
 			$data['loker_data'] = $this->loker->get_loker_cari_all($config["per_page"], $page, $keyword, $lokasi, $kategori);
 		}else{
 			$data['loker_data'] = $this->loker->get_loker_cari_publik($config["per_page"], $page, $keyword, $lokasi, $kategori);    
 		}
               
        $data['pagination'] = $this->pagination->create_links();
        // endpagination
        $data['lokasi'] = $this->wil->get_kab();
        $data['kategori'] = $this->loker->get_kategori();

        $data['cari_keyword'] = $keyword;
        $data['cari_lokasi'] = $lokasi;
        $data['cari_kategori'] = $kategori;

        if ($_GET) {
        	$this->session->set_flashdata('pencarian', 'Hasil pencarian dari '.$keyword.' '.$lokasi.' '.$kategori);
        }

		$this->template->set('title', 'Lowongan Kerja | SIP BLK Surakarta');
        $this->template->load('frontend_layout', 'contents' , 'v_loker/loker_cari', $data);
	}

	public function lamaran($id)
	{
		$data['id_lowongan'] = $id;
		$data['id_member'] = $this->member->get_member()->id_member;

		$this->loker->insert_lamaran($data);
		$this->session->set_flashdata('notif', '<div class="alert alert-success">Lamaran berhasil! Masuk ke halaman <a href"'.base_url().'/c_member">profil</a> untuk melihat riwayat lamaran.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
		redirect('c_loker/loker_detail/'.$id ,'refresh');
	}
}

/* End of file C_lowongan.php */
/* Location: ./application/controllers/C_lowongan.php */