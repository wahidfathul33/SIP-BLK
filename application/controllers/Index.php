<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Lowongan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $h = '  <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="'.base_url().'assets/admin/dist/img/img_slider1.jpg" alt="Los Angeles">
                    </div>

                    <div class="item">
                      <img src="'.base_url().'assets/admin/dist/img/img_slider1.jpg" alt="Los Angeles">
                    </div>

                    <div class="item">
                      <img src="'.base_url().'assets/admin/dist/img/img_slider1.jpg" alt="Los Angeles">
                    </div>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>';

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'lowongan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'lowongan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'lowongan/index.html';
            $config['first_url'] = base_url() . 'lowongan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Lowongan_model->total_rows($q);
        $lowongan = $this->Lowongan_model->get_limit_data2($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'lowongan_data' => $lowongan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->template->set('title', 'SIP BLK Surakarta');
        $this->template->set('header', $h);
        $this->template->load('user_profile', 'contents' , 'front/home', $data);
    }
}