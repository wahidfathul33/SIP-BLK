<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_perusahaan extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_perusahaan', 'mp');
        $this->load->model('M_wilayah', 'wil');
        $this->load->library('form_validation');

        //cek login
        if(($this->session->userdata('role') != '2') || ($this->session->userdata('role') != '3')){
            redirect('error404');
        }
    }

    public function FunctionName($value='')
    {
        # code...
    }
}