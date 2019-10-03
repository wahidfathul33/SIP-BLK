<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_member extends CI_Model {


	// function get_id_member()
	// {
		
	// }
	// tabel member
	function get_member()
	{
		$id_user = $this->session->userdata('id_users');
		$this->db->where('id_users', $id_user);
		return	$this->db->get('member')->row();
	}

	function insert_member($data)
	{
		$this->db->insert('member', $data);
	}

	function update_member($data)
	{
		$this->db->where('id_users', $this->session->userdata('id_users'));
		$this->db->update('member', $data);
	}

	// tabel riwayat_pendidikan
	function get_pendidikan()
	{
		$id_user = $this->session->userdata('id_users');
		$this->db->join('member', 'riwayat_pendidikan.id_member = member.id_member', 'left');
		$this->db->where('id_users', $id_user);
		return $this->db->get('riwayat_pendidikan')->result();
	}

	function insert_pendidikan($data)
	{
		$this->db->insert('riwayat_pendidikan', $data);
	}

	function delete_pendidikan($id)
	{
		$this->db->where('id_pendidikan', $id);
		$this->db->delete('riwayat_pendidikan');
	}

	// tabel riwayat_kerja
	function get_kerja()
	{
		$id_user = $this->session->userdata('id_users');
		$this->db->join('member', 'riwayat_kerja.id_member = member.id_member', 'left');
		$this->db->where('id_users', $id_user);
		return $this->db->get('riwayat_kerja')->result();
	}

	function insert_kerja($data)
	{
		$this->db->insert('riwayat_kerja', $data);
	}

	function delete_kerja($id)
	{
		$this->db->where('id_pekerjaan', $id);
		$this->db->delete('riwayat_kerja');
	}

	//tabel organisasi
	function get_organisasi()
	{
		$id_user = $this->session->userdata('id_users');
		$this->db->join('member', 'organisasi.id_member = member.id_member', 'left');
		$this->db->where('id_users', $id_user);
		return $this->db->get('organisasi')->result();
	}

	function insert_organisasi($data)
	{
		$this->db->insert('organisasi', $data);
	}

	function delete_organisasi($id)
	{
		$this->db->where('id_organisasi', $id);
		$this->db->delete('organisasi');
	}

	//tabel kursus
	function get_kursus()
	{
		$id_user = $this->session->userdata('id_users');
		$this->db->join('member', 'kursus.id_member = member.id_member', 'left');
		$this->db->where('id_users', $id_user);
		return $this->db->get('kursus')->result();
	}

	function insert_kursus($data)
	{
		$this->db->insert('kursus', $data);
	}

	function delete_kursus($id)
	{
		$this->db->where('id_kursus', $id);
		$this->db->delete('kursus');
	}

	//tabel bhs_asing
	function get_bahasa()
	{
		$id_user = $this->session->userdata('id_users');
		$this->db->join('member', 'bhs_asing.id_member = member.id_member', 'left');
		$this->db->where('id_users', $id_user);
		return $this->db->get('bhs_asing')->result();
	}

	function insert_bahasa($data)
	{
		$this->db->insert('bhs_asing', $data);
	}

	function delete_bahasa($id)
	{
		$this->db->where('id_bhs', $id);
		$this->db->delete('bhs_asing');
	}

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

    // tabel pelamar
    function get_lamaran()
    {
    	$id_user = $this->session->userdata('id_users');
    	$this->db->select('tgl_apply, lowongan.judul, perusahaan.nama_perusahaan, status');
    	$this->db->join('member', 'pelamar.id_member = member.id_member', 'left');
        $this->db->join('lowongan', 'lowongan.id_lowongan = pelamar.id_lowongan', 'left');
        $this->db->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan', 'left');
        $this->db->where('member.id_users', $id_user);
		return $this->db->get('pelamar')->result();
    }

    // tabel panggilan
    function get_berita()
    {
    	$id_user = $this->session->userdata('id_users');
    	$this->db->join('lowongan', 'lowongan.id_lowongan = panggilan.id_lowongan', 'left');
    	$this->db->join('pelamar', 'pelamar.id_lowongan = lowongan.id_lowongan', 'left');
    	$this->db->join('member', 'member.id_member = pelamar.id_member', 'left');
        $this->db->where('member.id_users', $id_user);
        $this->db->where('pelamar.status', 'Diterima');
		return $this->db->get('panggilan')->result();
    }

    function count_berita()
    {
    	$id_user = $this->session->userdata('id_users');
    	$this->db->from('panggilan');
    	$this->db->join('lowongan', 'lowongan.id_lowongan = panggilan.id_lowongan', 'left');
    	$this->db->join('pelamar', 'pelamar.id_lowongan = lowongan.id_lowongan', 'left');
    	$this->db->join('member', 'member.id_member = pelamar.id_member', 'left');
        $this->db->where('member.id_users', $id_user);
        $this->db->where('pelamar.status', 'Diterima');
		return $this->db->count_all_results();
    }

}

/* End of file M_member.php */
/* Location: ./application/models/M_member.php */