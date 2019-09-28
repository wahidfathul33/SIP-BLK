<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_perusahaan extends CI_Model
{
   
    function __construct()
    {
        parent::__construct();
    }

    // tabel perusahaan

    function get_perusahaan()
    {
    	$this->db->where('id_users', $this->session->userdata('id_users'));
        return $this->db->get('perusahaan')->row();
    }

    function get_id_perusahaan()
    {
        $this->db->where('id_users', $this->session->userdata('id_users'));
        return $this->db->get('perusahaan')->row();
    }

    function get_bidang()
    {
    	return $this->db->get('kategori_loker')->result();
    }

    function input_profil($data)
    {
        $this->db->insert('perusahaan', $data);
    }

    function update_profil($data)
    {
        $this->db->where('id_perusahaan', $this->get_id_perusahaan()->id_perusahaan);
        $this->db->update('perusahaan', $data);
    }
    // ============================================================================

    //tabel lamaran

    
    // ============================================================================

    //tabel panggilan

    function get_berita()
    {
        $id_perusahaan = $this->get_id_perusahaan()->id_perusahaan;
        $this->db->join('lowongan', 'panggilan.id_lowongan = lowongan.id_lowongan', 'left');
        $this->db->where('id_perusahaan', $id_perusahaan);
        return $this->db->get('panggilan')->result();
    }

    function get_berita_id($id)
    {
        $this->db->join('lowongan', 'panggilan.id_lowongan = lowongan.id_lowongan', 'left');
        $this->db->where('id_panggilan', $id);
        return $this->db->get('panggilan')->row();
    }

    function add_berita($data)
    {
        $this->db->insert('panggilan', $data);
    }

    function update_berita($data, $id)
    {
        $this->db->where('id_panggilan', $id);
        $this->db->update('panggilan', $data);
    }

    function del_berita($id)
    {
        $this->db->where('id_panggilan', $id);
        $this->db->delete('panggilan');
        return $this->db->affected_rows();
        $path_to_file = './uploads/documents/'.$row->npwp;
        
    }

    // ============================================================================

    //tabel lowongan

    function get_posted_loker()
    {
        $query = "SELECT *,
                (SELECT count(id_pelamar) FROM pelamar WHERE pelamar.id_lowongan=lowongan.id_lowongan) as tot_pelamar
                FROM lowongan 
                LEFT JOIN perusahaan ON perusahaan.id_perusahaan=lowongan.id_perusahaan 
                WHERE id_users = ".$this->session->userdata('id_users')." 
                AND NOT status_publish = 'Menunggu'";

        return $this->db->query($query)->result();
    }

    function get_loker()
    {
        $this->db->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan', 'left');
        $this->db->where('id_users', $this->session->userdata('id_users'));
        return $this->db->get('lowongan')->result();
    }

    function get_loker_id($id)
    {
        $this->db->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan', 'left');
        $this->db->where('id_users', $this->session->userdata('id_users'));
        $this->db->where('id_lowongan', $id);
        return $this->db->get('lowongan')->row();
    }

    function input_loker($data)
    {
        $this->db->insert('lowongan', $data);
    }

    function update_loker($data, $id)
    {
        $this->db->where('id_lowongan', $id);
        $this->db->update('lowongan', $data);
    }

    function del_loker($id)
    {
        $this->db->where('id_perusahaan', $this->get_id_perusahaan()->id_perusahaan);
        $this->db->where('status_publish', 'Menunggu');
        $this->db->where('id_lowongan', $id);
        $this->db->delete('lowongan');
        return $this->db->affected_rows();
    }

    // ============================================================================

    //tabel user

    function get_pwd_old()
    {
        $this->db->where('id_users', $this->session->userdata('id_users'));
        return $this->db->get('users')->row()->password;
    }

    function update_pwd($data)
    {
        $this->db->where('id_users', $this->session->userdata('id_users'));
        $this->db->update('users', $data);
    }

    // ============================================================================

}