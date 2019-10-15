<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_wilayah extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_wilayah', 'wil');
    }
	

	public function getKota() {
        $json = array();
        $json = $this->wil->get_kota($this->input->post('provID'));
        header('Content-Type: application/json');
        echo json_encode($json);
    }

    // public function getIDKota() {
    //     $json = array();
    //     $json = $this->wil->get_kota($this->input->post('provID'));
    //     header('Content-Type: application/json');
    //     echo json_encode($json);
    // }
 
    public function getKecamatan() {
        $json = array();
        $json = $this->wil->get_kecamatan($this->input->post('kotaID'));
        header('Content-Type: application/json');
        echo json_encode($json);
    }

    public function getKelurahan() {
        $json = array();
        $json = $this->wil->get_kelurahan($this->input->post('kecID'));
        header('Content-Type: application/json');
        echo json_encode($json);
    }
    
    // ====================================================================
    public function getKotaNow() {
        $json = array();
        $json = $this->wil->get_kota($this->input->post('provIDnow'));
        header('Content-Type: application/json');
        echo json_encode($json);
    }

    public function getIDKotaNow() {
        $json = array();
        $json = $this->wil->get_kota($this->input->post('provIDnow'));
        header('Content-Type: application/json');
        echo json_encode($json);
    }
 
    public function getKecamatanNow() {
        $json = array();
        $json = $this->wil->get_kecamatan($this->input->post('kotaIDnow'));
        header('Content-Type: application/json');
        echo json_encode($json);
    }

    public function getKelurahanNow() {
        $json = array();
        $json = $this->wil->get_kelurahan($this->input->post('kecIDnow'));
        header('Content-Type: application/json');
        echo json_encode($json);
    }

}

/* End of file C_wilayah.php */
/* Location: ./application/controllers/C_wilayah.php */