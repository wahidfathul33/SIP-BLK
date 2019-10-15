<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_member extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_member', 'mm');
        $this->load->model('M_wilayah', 'wil');
        $this->load->library('form_validation');

        //cek login
        if(($this->session->userdata('role') != 2) && ($this->session->userdata('role') != 3)){
            redirect('c_login/login');
        }
    }

    public function index()
    {
        $row = $this->mm->get_member();
        if ($row) {
            //umur
            $dob = strtotime($row->tgl_lahir);
            $current_time = time();
            $age_years = date('Y',$current_time) - date('Y',$dob);

            //alamat
            $alamat_ktp = json_decode($row->alamat_ktp);
            $alamat_now = json_decode($row->alamat_now);

            $date_gabung = explode(' ',$this->session->userdata('tanggal'));
            $tgl_gabung = date(('d F Y'), strtotime($date_gabung[0]));

            $date_lahir = explode(' ',$row->tgl_lahir);
            $tgl_lahir = date(('d F Y'), strtotime($date_lahir[0]));

            $data = array(
                    'jenis_user' => ucwords($this->session->userdata('jenis_user')),
                    'email' => $this->session->userdata('ses_email'),
                    'tgl_gabung' => $tgl_gabung,
                    'nik' => $row->id_member,
                    'id_users' => $row->id_users,
                    'nama' => $row->nama,
                    'agama' => $row->agama,
                    'jk' => $row->jenis_kelamin,
                    'gol_darah' => $row->gol_darah,
                    'umur' => $age_years,
                    'tmp_lahir' => $row->tmp_lahir,
                    'tgl_lahir' => $tgl_lahir,
                    'tinggi_badan' => $row->tinggi_badan,
                    'berat_badan' => $row->berat_badan,
                    'status_nikah' => $row->status_nikah,
                    'alamat_ktp' => $alamat_ktp->alamat,
                    'kel_ktp' => $alamat_ktp->kelurahan,
                    'kec_ktp' => $alamat_ktp->kecamatan,
                    'kota_ktp' => $alamat_ktp->kota,
                    'prov_ktp' => $alamat_ktp->provinsi,
                    'alamat_now' => $alamat_now->alamat,
                    'kel_now' => $alamat_now->kelurahan,
                    'kec_now' => $alamat_now->kecamatan,
                    'kota_now' => $alamat_now->kota,
                    'prov_now' => $alamat_now->provinsi,
                    'no_hp' => $row->no_hp,
                    'no_wa' => $row->no_wa,
                    'foto' => $row->foto,
                    'riwayat_pendidikan_data' => $this->mm->get_pendidikan(),
                    'riwayat_kerja_data' => $this->mm->get_kerja(),
                    'organisasi_data' => $this->mm->get_organisasi(),
                    'kursus_data' => $this->mm->get_kursus(),
                    'bahasa_data' => $this->mm->get_bahasa(),
                    'lamaran_data' => $this->mm->get_lamaran(),
                    'berita_data' => $this->mm->get_berita(),
                    'jml_berita' => $this->mm->count_berita(),
                );
            $this->template->set('title', 'Member | SIP BLK Surakarta');
            $this->template->load('frontend_layout', 'contents' , 'v_member/member_dashboard', $data);
        }else{
            $data = array(
                    'jenis_user' => $this->session->userdata('jenis_user'),
                    'email' => $this->session->userdata('ses_email'),
                    'provinsi' => $this->wil->get_provinsi(),
                    'nik' => '',
                    'id_users' => '',
                    'nama' => '',
                    'agama' => '',
                    'jk' => '',
                    'gol_darah' => '',
                    'umur' => '',
                    'tmp_lahir' => '',
                    'tgl_lahir' => '',
                    'tinggi_badan' => '',
                    'berat_badan' => '',
                    'status_nikah' => '',
                    'alamat_ktp' => '',
                    'kel_ktp' =>'',
                    'kec_ktp' =>'',
                    'kota_ktp' =>'',
                    'prov_ktp' =>'',
                    'alamat_now' =>'',
                    'kel_now' =>'',
                    'kec_now' =>'',
                    'kota_now' =>'',
                    'prov_now' =>'',
                    'no_hp' => '',
                    'no_wa' => '',
                    'foto' => '',
                    'riwayat_pendidikan_data' => '',
                    'riwayat_kerja_data' => '',
                    'organisasi_data' => '',
                    'kursus_data' => '',
                    'bahasa_data' => '',
                    'lamaran_data' => '',
                    'berita_data' => '',
                );
            $this->template->set('title', 'Member | SIP BLK Surakarta');
            $this->template->load('frontend_layout', 'contents' , 'v_member/profil_input', $data);
        }
    }

    public function profil_input()
    {
        $data['provinsi'] = $this->wil->get_provinsi();
        $data['email'] = $this->session->userdata('ses_email');

        $this->template->set('title', 'Member | SIP BLK Surakarta');
        $this->template->load('frontend_layout', 'contents' , 'v_member/profil_input', $data);
    }

    public function profil_input_act()
    {
        $alamat_ktp_data = array(
            'alamat' => $this->input->post('alamat_ktp'),
            'kelurahan' => $this->wil->get_kel_nama($id = $this->input->post('kelurahan_ktp')),
            'kecamatan' => $this->wil->get_kec_nama($id = $this->input->post('kecamatan_ktp')),
            'kota' => $this->wil->get_kota_nama($id = $this->input->post('kota_ktp')),
            'provinsi' => $this->wil->get_prov_nama($id = $this->input->post('provinsi_ktp')),
        );
        $alamat_ktp = json_encode($alamat_ktp_data);

        $alamat_now_data = array(
            'alamat' => $this->input->post('alamat_now'),
            'kelurahan' => $this->wil->get_kel_nama($id = $this->input->post('kelurahan_now')),
            'kecamatan' => $this->wil->get_kec_nama($id = $this->input->post('kecamatan_now')),
            'kota' => $this->wil->get_kota_nama($id = $this->input->post('kota_now')),
            'provinsi' => $this->wil->get_prov_nama($id = $this->input->post('provinsi_now')),
        );
        $alamat_now = json_encode($alamat_now_data);

        if(! empty($_FILES) && $_FILES['foto']['name'] != null){
                $namaFile = "foto-".$this->session->userdata('id_users')."-".preg_replace('/\s+/', '_',$_FILES['foto']['name']);

                $config['upload_path'] = './uploads/images/avatar';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']     = '1024';
                $this->load->library('upload', $config);

                $config['file_name'] = $namaFile;
                $this->upload->initialize($config);

                if($this->upload->do_upload('foto')){
                    $foto = $namaFile;
                }
                else{
                    $error['error'] =$this->upload->display_errors();
                    $this->session->set_flashdata('foto',$error['error']);
                    redirect('c_member/profil_input','refresh');
                }
            }
        else{
            $this->session->set_flashdata('foto', 'Logo tidak boleh kosong');
            redirect('c_member/profil_input','refresh');
        }

        $data = array(
            'id_member' => $this->input->post('nik'),
            'id_users' => $this->session->userdata('id_users'),
            'nama' => $this->input->post('nama'),
            'agama' => $this->input->post('agama'),
            'status_nikah' => $this->input->post('nikah'),
            'jenis_kelamin' => $this->input->post('jk'),
            'gol_darah' => $this->input->post('gol_darah'),
            'tmp_lahir' => $this->input->post('tmp_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'tinggi_badan' => $this->input->post('tinggi'),
            'berat_badan' => $this->input->post('berat'),
            'no_hp' => $this->input->post('no_hp'),
            'no_wa' => $this->input->post('no_wa'),
            'email' => $this->input->post('email'),
            'alamat_ktp' => $alamat_ktp,
            'alamat_now' => $alamat_now,
            'foto'  => $foto,
        );

        $this->session->set_flashdata('notif', '<div class="alert alert-success">Input profil member berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        $this->mm->insert_member($data);
        redirect('c_member','refresh');
    }

    public function profil_edit()
    {
        $row = $this->mm->get_member();
        $alamat_ktp = json_decode($row->alamat_ktp);
        $alamat_now = json_decode($row->alamat_now);
        $data = array(
                'jenis_user' => ucwords($this->session->userdata('jenis_user')),
                'email' => $this->session->userdata('ses_email'),
                'nik' => $row->id_member,
                'id_users' => $row->id_users,
                'nama' => $row->nama,
                'agama' => $row->agama,
                'jk' => $row->jenis_kelamin,
                'gol_darah' => $row->gol_darah,
                'tmp_lahir' => $row->tmp_lahir,
                'tgl_lahir' => $row->tgl_lahir,
                'tinggi' => $row->tinggi_badan,
                'berat' => $row->berat_badan,
                'provinsi' => $this->wil->get_provinsi(),
                'nikah' => $row->status_nikah,
                'alamat_ktp' => $alamat_ktp->alamat,
                'prov_ktp' => $alamat_ktp->provinsi,
                'alamat_now' => $alamat_now->alamat,
                'prov_now' => $alamat_now->provinsi,
                'idkota_ktp' => $this->wil->get_kota_id($alamat_ktp->kota),
                'idkec_ktp'  => $this->wil->get_kec_id($alamat_ktp->kecamatan),
                'idkel_ktp'  => $this->wil->get_kel_id($alamat_ktp->kelurahan),
                'idkota_now' => $this->wil->get_kota_id($alamat_now->kota),
                'idkec_now'  => $this->wil->get_kec_id($alamat_now->kecamatan),
                'idkel_now'  => $this->wil->get_kel_id($alamat_now->kelurahan),
                'no_hp' => $row->no_hp,
                'no_wa' => $row->no_wa,
                'email' => $row->email,
                'foto' => $row->foto,
        );

        $this->template->set('title', 'Member | SIP BLK Surakarta');
        $this->template->load('frontend_layout', 'contents' , 'v_member/profil_edit', $data);
    }

    public function profil_edit_act()
    {
        $row = $this->mm->get_member();
        $alamat_ktp_data = array(
            'alamat' => $this->input->post('alamat_ktp'),
            'kelurahan' => $this->wil->get_kel_nama($id = $this->input->post('kelurahan_ktp')),
            'kecamatan' => $this->wil->get_kec_nama($id = $this->input->post('kecamatan_ktp')),
            'kota' => $this->wil->get_kota_nama($id = $this->input->post('kota_ktp')),
            'provinsi' => $this->wil->get_prov_nama($id = $this->input->post('provinsi_ktp')),
        );
        $alamat_ktp = json_encode($alamat_ktp_data);

        $alamat_now_data = array(
            'alamat' => $this->input->post('alamat_now'),
            'kelurahan' => $this->wil->get_kel_nama($id = $this->input->post('kelurahan_now')),
            'kecamatan' => $this->wil->get_kec_nama($id = $this->input->post('kecamatan_now')),
            'kota' => $this->wil->get_kota_nama($id = $this->input->post('kota_now')),
            'provinsi' => $this->wil->get_prov_nama($id = $this->input->post('provinsi_now')),
        );
        $alamat_now = json_encode($alamat_now_data);

        if(! empty($_FILES) && $_FILES['foto']['name'] != null){
                if ($row->foto != NULL) {
                    
                $path_to_file = './uploads/images/avatar/'.$row->foto;
                    if (file_exists($path_to_file)) 
                    {
                        unlink($path_to_file);
                    }
                }
                $namaFile = "foto-".$this->session->userdata('id_users')."-".preg_replace('/\s+/', '_',$_FILES['foto']['name']);

                $config['upload_path'] = './uploads/images/avatar';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']     = '1024';
                $this->load->library('upload', $config);

                $config['file_name'] = $namaFile;
                $this->upload->initialize($config);

                if($this->upload->do_upload('foto')){
                    $foto = $namaFile;
                }
                else{
                    $error['error'] =$this->upload->display_errors();
                    $this->session->set_flashdata('foto',$error['error']);
                    redirect('c_member/profil_edit','refresh');
                }
            }
            else{
                $foto = $row->foto;
            }

        $data = array(
            'id_member' => $this->input->post('nik'),
            'id_users' => $this->session->userdata('id_users'),
            'nama' => $this->input->post('nama'),
            'agama' => $this->input->post('agama'),
            'status_nikah' => $this->input->post('nikah'),
            'jenis_kelamin' => $this->input->post('jk'),
            'gol_darah' => $this->input->post('gol_darah'),
            'tmp_lahir' => $this->input->post('tmp_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'tinggi_badan' => $this->input->post('tinggi'),
            'berat_badan' => $this->input->post('berat'),
            'no_hp' => $this->input->post('no_hp'),
            'no_wa' => $this->input->post('no_wa'),
            'email' => $this->input->post('email'),
            'alamat_ktp' => $alamat_ktp,
            'alamat_now' => $alamat_now,
            'foto'  => $foto,
        );

        $this->mm->update_member($data);
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Input profil member berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_member','refresh');
    }

    public function pendidikan_input()
    {
        $data = array(
            'id_member' => $this->mm->get_member()->id_member,
            'nama_sekolah' => $this->input->post('sekolah'), 
            'jurusan'      => $this->input->post('jurusan'),
            'thn_masuk'    => $this->input->post('thn_masuk'),
            'thn_lulus'    => $this->input->post('thn_lulus')
        );

        $this->mm->insert_pendidikan($data);
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Tambah riwayat pendidikan berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_member','refresh');
    }

    public function pendidikan_del($id)
    {
        $this->mm->delete_pendidikan($id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Hapus riwayat pendidikan berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_member','refresh');
    }

    public function kerja_input()
    {
        $data = array(
            'id_member' => $this->mm->get_member()->id_member,
            'nama_perusahaan' => $this->input->post('perusahaan'), 
            'jabatan'         => $this->input->post('jabatan'),
            'tgl_mulai'       => $this->input->post('tgl_mulai'),
            'tgl_selesai'     => $this->input->post('tgl_selesai'),
            'alasan'          => $this->input->post('alasan')
        );

        $this->mm->insert_kerja($data);
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Tambah pengalaman kerja berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_member','refresh');
    }

    public function kerja_del($id)
    {
        $this->mm->delete_kerja($id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Hapus pengalaman kerja berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_member','refresh');
    }

    public function organisasi_input()
    {
        $data = array(
            'id_member' => $this->mm->get_member()->id_member,
            'nama_organisasi' => $this->input->post('nama_org'), 
            'tempat'         => $this->input->post('tempat'),
            'jabatan'       => $this->input->post('jabatan'),
            'periode'     => $this->input->post('periode'),
        );

        $this->mm->insert_organisasi($data);
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Tambah riwayat organisasi berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_member','refresh');
    }

    public function organisasi_del($id)
    {
        $this->mm->delete_organisasi($id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Hapus riwayat organisasi berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_member','refresh');
    }

    public function kursus_input()
    {
        $data = array(
            'id_member' => $this->mm->get_member()->id_member,
            'nama_pelatihan' => $this->input->post('nama_pelatihan'), 
            'tempat'         => $this->input->post('tempat'),
            'tgl_mulai'       => $this->input->post('tgl_mulai'),
            'tgl_selesai'     => $this->input->post('tgl_selesai'),
        );

        $this->mm->insert_kursus($data);
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Tambah riwayat kursus/pelatihan berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_member','refresh');
    }

    public function kursus_del($id)
    {
        $this->mm->delete_kursus($id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Hapus riwayat kursus/pelatihan berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_member','refresh');
    }

    public function bahasa_input()
    {
        $data = array(
            'id_member' => $this->mm->get_member()->id_member,
            'bahasa'    => $this->input->post('bahasa'), 
            'bicara'    => $this->input->post('bicara'),
            'membaca'   => $this->input->post('membaca'),
            'mendengar' => $this->input->post('mendengar'),
            'menulis'   => $this->input->post('menulis')
        );

        $this->mm->insert_bahasa($data);
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Tambah kemampuan bahasa asing berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_member','refresh');
    }

    public function bahasa_del($id)
    {
        $this->mm->delete_bahasa($id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Hapus kemampuan bahasa asing berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
        redirect('c_member','refresh');
    }

    public function ubah_password()
    {
        $pwd_new = $this->input->post('password_new');
        $pwd_old_post = $this->input->post('password_old');
        $pwd_old = $this->mm->get_pwd_old();
        
        if (password_verify($pwd_old_post, $pwd_old)) {

            $data['password'] = password_hash($pwd_new, PASSWORD_DEFAULT);

            $this->mm->update_pwd($data);

            $this->session->set_flashdata('notif', '<div class="alert alert-success">Ubah password berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
            redirect('c_member','refresh');
        }else{
            $this->session->set_flashdata('notif', '<div class="alert alert-danger">Gagal! Password lama salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>');
            redirect('c_member','refresh');
        }
    }
}