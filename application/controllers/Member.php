<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Member_model','Riwayat_pendidikan_model','Riwayat_kerja_model'));
        $this->load->library('form_validation');
        $this->template->set('header', '');

    }

    public function index()
    {
       
        $row = $this->Member_model->get_by_id();
        if ($row) {
    	$this->load->model('Pelamar_model');
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
        
        $cek = $this->Pelamar_model->cek_data();
        if ($cek == NULL) {
            $id_member = $this->Pelamar_model->get_id_member();
            $id = $id_member->id_member;
            $pelamar = $this->Pelamar_model->get_limit_data_profil($config['per_page'], $start, $q,$id);
        }else{
            $id = $this->Pelamar_model->get_id_member();
            $pelamar = $this->Pelamar_model->get_limit_data_profil($config['per_page'], $start, $q,$id);
        }

        $config['total_rows'] = $this->Pelamar_model->total_rows($q);
        

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $dob = strtotime($row->tgl_lahir);
        $current_time = time();

        $age_years = date('Y',$current_time) - date('Y',$dob);
        $data = array(
            'pelamar_data' => $pelamar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'umur' => $age_years,
            'id_member' => $row->id_member,
            'jenis_member' => $row->nama_level,
            'nama' => $row->nama,
            'sekolah' => $row->sekolah,
            'jurusan' => $row->Jurusan,
            'foto' => $row->foto,
        );
        $this->template->set('title', 'SIP BLK Surakarta - Profil');
        $this->template->load('user_profile', 'contents' , 'member/content_profile',$data);
        }else{
            redirect(site_url('member/create'));        }
    }

    public function show_alumni()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'member/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'member/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'member/index.html';
            $config['first_url'] = base_url() . 'member/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
       $config['total_rows'] = $this->Member_model->total_rows($q);
        $member = $this->Member_model->get_alumni($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'member_data' => $member,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'SIP BLK Surakarta - Profil');
        $this->template->set('header', 'Member Alumni');
        $this->template->load('admin_layout', 'contents' , 'member/list_alumni',$data);
    }

        public function show_non_alumni()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'member/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'member/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'member/index.html';
            $config['first_url'] = base_url() . 'member/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Member_model->total_rows($q);
        $member = $this->Member_model->get_non_alumni($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'member_data' => $member,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'SIP BLK Surakarta - Profil');
        $this->template->set('header', 'Member Non Alumni');
        $this->template->load('admin_layout', 'contents' , 'member/list_non_alumni',$data);
    }

    public function read() 
    {
        $riwayat_pendidikan = $this->Riwayat_pendidikan_model->get_all_by_id();
        $riwayat_kerja = $this->Riwayat_kerja_model->get_all_by_id();

        $row = $this->Member_model->get_by_id();
        if ($row) {
            $data = array(
            	'riwayat_pendidikan_data' => $riwayat_pendidikan,
            	'riwayat_kerja_data' => $riwayat_kerja,
		'id_member' => $row->id_member,
		'id_users' => $row->id_users,
		'nama' => $row->nama,
		'agama' => $row->agama,
		'jenis_kelamin' => $row->jenis_kelamin,
		'gol_darah' => $row->gol_darah,
		'tmp_lahir' => $row->tmp_lahir,
		'tgl_lahir' => $row->tgl_lahir,
		'tinggi_badan' => $row->tinggi_badan,
		'berat_badan' => $row->berat_badan,
		'status_nikah' => $row->status_nikah,
		'alamat_ktp' => $row->alamat_ktp,
		'alamat_now' => $row->alamat_now,
		'no_hp' => $row->no_hp,
		'no_wa' => $row->no_wa,
		'pendidikan' => $row->pendidikan,
		'sekolah' => $row->sekolah,
		'Jurusan' => $row->Jurusan,
		'id_sub_kejuruan' => $row->id_sub_kejuruan,
		'pbk_tahun' => $row->pbk_tahun,
		'pbk_angkatan' => $row->pbk_angkatan,
		'foto' => $row->foto,
	    );
            $this->template->set('title', 'SIP BLK Surakarta - Profil');
        	$this->template->load('user_profile', 'contents' , 'member/member_read',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('member/create'));
        }
    }

    public function detail_member($id) 
    {
    	$riwayat_pendidikan = $this->Riwayat_pendidikan_model->get_all_by_id2($id);
        $riwayat_kerja = $this->Riwayat_kerja_model->get_all_by_id2($id);

        $row = $this->Member_model->get_by_id2($id);
        if ($row) {
            $data = array(
            	'riwayat_pendidikan_data' => $riwayat_pendidikan,
            	'riwayat_kerja_data' => $riwayat_kerja,
		'id_member' => $row->id_member,
		'id_users' => $row->id_users,
		'nama' => $row->nama,
		'agama' => $row->agama,
		'jenis_kelamin' => $row->jenis_kelamin,
		'gol_darah' => $row->gol_darah,
		'tmp_lahir' => $row->tmp_lahir,
		'tgl_lahir' => $row->tgl_lahir,
		'tinggi_badan' => $row->tinggi_badan,
		'berat_badan' => $row->berat_badan,
		'status_nikah' => $row->status_nikah,
		'alamat_ktp' => $row->alamat_ktp,
		'alamat_now' => $row->alamat_now,
		'no_hp' => $row->no_hp,
		'no_wa' => $row->no_wa,
		'pendidikan' => $row->pendidikan,
		'sekolah' => $row->sekolah,
		'Jurusan' => $row->Jurusan,
		'id_sub_kejuruan' => $row->id_sub_kejuruan,
		'pbk_tahun' => $row->pbk_tahun,
		'pbk_angkatan' => $row->pbk_angkatan,
		'foto' => $row->foto,
	    );
            $this->template->set('title', 'SIP BLK Surakarta - Profil');
        	$this->template->load('admin_layout', 'contents' , 'member/member_read',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelamar'));
        }
    }

    public function create() 
    {
        // echo "<pre>";
        // print_r ($this->session->all_userdata());
        // echo "</pre>";exit();

        $data = array(
            'button' => 'Create',
            'action' => site_url('member/create_action'),
	    'id_member' => set_value('id_member'),
	    'id_users' => set_value('id_users'),
	    'nama' => set_value('nama'),
	    'agama' => set_value('agama'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'gol_darah' => set_value('gol_darah'),
	    'tmp_lahir' => set_value('tmp_lahir'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'tinggi_badan' => set_value('tinggi_badan'),
	    'berat_badan' => set_value('berat_badan'),
	    'status_nikah' => set_value('status_nikah'),
	    'alamat_ktp' => set_value('alamat_ktp'),
	    'alamat_now' => set_value('alamat_now'),
	    'no_hp' => set_value('no_hp'),
	    'no_wa' => set_value('no_wa'),
	    'pendidikan' => set_value('pendidikan'),
	    'sekolah' => set_value('sekolah'),
	    'Jurusan' => set_value('Jurusan'),
	    'id_sub_kejuruan' => set_value('id_sub_kejuruan'),
	    'pbk_tahun' => set_value('pbk_tahun'),
	    'pbk_angkatan' => set_value('pbk_angkatan'),
	    'foto' => set_value('foto'),
	);
        $this->template->set('title', 'SIP BLK Surakarta - Profil');
        $this->template->load('user_profile', 'contents' , 'member/member_form',$data);
    }
    
    public function create_action() 
    {
    	// echo "<pre>";
    	// print_r ($_POST);
    	// echo "</pre>";
    	// exit;

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        if(! empty($_FILES) && $_FILES['foto']['name'] != null){
            $namaFile = $this->session->userdata('id_users')."-".$_FILES['foto']['name'];

            $config['upload_path'] = './uploads/img';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '11024';
            $this->load->library('upload', $config);

            $config['file_name'] = $namaFile;
            $this->upload->initialize($config);

            if($this->upload->do_upload('foto')){
                $foto = $namaFile;
            }
            else{
                $foto = null;
            }
        }
        else{
            $foto = null;
        }
            $data = array(
		'id_member' => $this->input->post('id_member',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'gol_darah' => $this->input->post('gol_darah',TRUE),
		'tmp_lahir' => $this->input->post('tmp_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'tinggi_badan' => $this->input->post('tinggi_badan',TRUE),
		'berat_badan' => $this->input->post('berat_badan',TRUE),
		'status_nikah' => $this->input->post('status_nikah',TRUE),
		'alamat_ktp' => $this->input->post('alamat_ktp',TRUE),
		'alamat_now' => $this->input->post('alamat_now',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'no_wa' => $this->input->post('no_wa',TRUE),
		'pendidikan' => $this->input->post('pendidikan',TRUE),
		'sekolah' => $this->input->post('sekolah',TRUE),
		'Jurusan' => $this->input->post('Jurusan',TRUE),
		'id_sub_kejuruan' => $this->input->post('id_sub_kejuruan',TRUE),
		'pbk_tahun' => $this->input->post('pbk_tahun',TRUE),
		'pbk_angkatan' => $this->input->post('pbk_angkatan',TRUE),
		'foto' => $foto,
	    );

            $this->Member_model->insert($data);
            
            $this->session->set_userdata( 'foto', $foto );

            redirect(site_url('member'));
        }
    }

    
    public function update() 
    {

    	$cek = $this->Member_model->cek_data();
        if ($cek == NULL) {
            $this->create();
        }else{
        $row = $this->Member_model->get_by_id();

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('member/update_action'),
		'id_member' => set_value('id_member', $row->id_member),
		'id_users' => set_value('id_users', $row->id_users),
		'nama' => set_value('nama', $row->nama),
		'agama' => set_value('agama', $row->agama),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'gol_darah' => set_value('gol_darah', $row->gol_darah),
		'tmp_lahir' => set_value('tmp_lahir', $row->tmp_lahir),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'tinggi_badan' => set_value('tinggi_badan', $row->tinggi_badan),
		'berat_badan' => set_value('berat_badan', $row->berat_badan),
		'status_nikah' => set_value('status_nikah', $row->status_nikah),
		'alamat_ktp' => set_value('alamat_ktp', $row->alamat_ktp),
		'alamat_now' => set_value('alamat_now', $row->alamat_now),
		'no_hp' => set_value('no_hp', $row->no_hp),
		'no_wa' => set_value('no_wa', $row->no_wa),
		'pendidikan' => set_value('pendidikan', $row->pendidikan),
		'sekolah' => set_value('sekolah', $row->sekolah),
		'Jurusan' => set_value('Jurusan', $row->Jurusan),
		'id_sub_kejuruan' => set_value('id_sub_kejuruan', $row->id_sub_kejuruan),
		'pbk_tahun' => set_value('pbk_tahun', $row->pbk_tahun),
		'pbk_angkatan' => set_value('pbk_angkatan', $row->pbk_angkatan),
		'foto' => set_value('foto', $row->foto),
	    );
            $this->template->set('title', 'SIP BLK Surakarta - Profil');
        	$this->template->load('user_profile', 'contents' , 'member/member_form',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('member/update'));
        }}

    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_member', TRUE));
        } else {
        if(! empty($_FILES) && $_FILES['foto']['name'] != null){
            $namaFile = $this->session->userdata('id_users')."-".$_FILES['foto']['name'];

            $config['upload_path'] = './uploads/img';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '11024';
            $this->load->library('upload', $config);

            $config['file_name'] = $namaFile;
            $this->upload->initialize($config);

            if($this->upload->do_upload('foto')){
                $foto = $namaFile;
            }
            else{
                $foto = $this->input->post('foto',TRUE);
            }
        }
        else{
            $foto = $this->input->post('foto',TRUE);
        }
            $data = array(
		'id_users' => $this->input->post('id_users',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'gol_darah' => $this->input->post('gol_darah',TRUE),
		'tmp_lahir' => $this->input->post('tmp_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'tinggi_badan' => $this->input->post('tinggi_badan',TRUE),
		'berat_badan' => $this->input->post('berat_badan',TRUE),
		'status_nikah' => $this->input->post('status_nikah',TRUE),
		'alamat_ktp' => $this->input->post('alamat_ktp',TRUE),
		'alamat_now' => $this->input->post('alamat_now',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'no_wa' => $this->input->post('no_wa',TRUE),
		'pendidikan' => $this->input->post('pendidikan',TRUE),
		'sekolah' => $this->input->post('sekolah',TRUE),
		'Jurusan' => $this->input->post('Jurusan',TRUE),
		'id_sub_kejuruan' => $this->input->post('id_sub_kejuruan',TRUE),
		'pbk_tahun' => $this->input->post('pbk_tahun',TRUE),
		'pbk_angkatan' => $this->input->post('pbk_angkatan',TRUE),
		'foto' => $foto,
	    );

            $this->Member_model->update($this->input->post('id_users', TRUE), $data);
            $this->session->set_userdata( 'foto', $foto );
            redirect(site_url('member'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Member_model->get_by_id($id);

        if ($row) {
            $this->Member_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('member'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('member'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_member', 'id member', 'trim|required');
	$this->form_validation->set_rules('id_users', 'id akun', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('gol_darah', 'gol darah', 'trim|required');
	$this->form_validation->set_rules('tmp_lahir', 'tmp lahir', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('tinggi_badan', 'tinggi badan', 'trim|required');
	$this->form_validation->set_rules('berat_badan', 'berat badan', 'trim|required');
	$this->form_validation->set_rules('status_nikah', 'status nikah', 'trim|required');
	$this->form_validation->set_rules('alamat_ktp', 'alamat ktp', 'trim|required');
	$this->form_validation->set_rules('alamat_now', 'alamat now', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('no_wa', 'no wa', 'trim|required');
	$this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
	$this->form_validation->set_rules('sekolah', 'sekolah', 'trim|required');
	$this->form_validation->set_rules('Jurusan', 'jurusan', 'trim|required');
	$this->form_validation->set_rules('pbk_tahun', 'pbk tahun', 'trim|required');
	$this->form_validation->set_rules('pbk_angkatan', 'pbk angkatan', 'trim|required');
	//$this->form_validation->set_rules('foto', 'foto', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "member.xls";
        $judul = "member";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id member");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Akun");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Agama");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Gol Darah");
	xlsWriteLabel($tablehead, $kolomhead++, "Tmp Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tinggi Badan");
	xlsWriteLabel($tablehead, $kolomhead++, "Berat Badan");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Nikah");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Ktp");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Now");
	xlsWriteLabel($tablehead, $kolomhead++, "No Hp");
	xlsWriteLabel($tablehead, $kolomhead++, "No Wa");
	xlsWriteLabel($tablehead, $kolomhead++, "Pendidikan");
	xlsWriteLabel($tablehead, $kolomhead++, "Sekolah");
	xlsWriteLabel($tablehead, $kolomhead++, "Jurusan");
	xlsWriteLabel($tablehead, $kolomhead++, "Pbk Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "Pbk Angkatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto");

	foreach ($this->Member_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_member);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->agama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gol_darah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tmp_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tinggi_badan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->berat_badan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_nikah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_ktp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_now);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_hp);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_wa);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pendidikan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sekolah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Jurusan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pbk_tahun);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pbk_angkatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file member.php */
/* Location: ./application/controllers/member.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-04-17 14:46:25 */
/* http://harviacode.com */