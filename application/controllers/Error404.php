<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Error404 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Lowongan_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $this->load->view('errors/404');
    }
}