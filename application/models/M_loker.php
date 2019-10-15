<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_loker extends CI_Model {

	function get_loker_limit_publik($limit, $start = 0) 
	{
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan', 'left');
        $this->db->order_by('id_lowongan', 'tgl_posting', 'asc');
        $this->db->where('status_publish', 'Publik');
		$this->db->limit($limit, $start);
        return $this->db->get('lowongan')->result();
    }

    function get_loker_limit_all($limit, $start = 0) 
	{
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan', 'left');
        $this->db->order_by('id_lowongan', 'tgl_posting', 'asc');
		$this->db->limit($limit, $start);
        return $this->db->get('lowongan')->result();
    }

    function count_loker_all()
    {
        $this->db->from('lowongan');
        return $this->db->count_all_results();
    }

    function count_loker_publik()
    {
        $this->db->from('lowongan');
        $this->db->where('status_publish', 'Publik');
        return $this->db->count_all_results();
    }

    //loker search
    function get_loker_cari_publik($limit, $start = 0, $keyword=NULL, $lokasi=NULL, $kategori=NULL) 
    {
        $this->db->order_by('id_lowongan', 'tgl_posting', 'asc');
        $this->db->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan', 'left');
        $this->db->where('status_publish', 'Publik');
        $this->db->like('lokasi_kerja', $lokasi);
        $this->db->like('kategori_loker', $kategori);
        $this->db->like('judul', $keyword);
    $this->db->or_like('nama_perusahaan', $keyword);
    $this->db->or_like('posisi', $keyword);
    $this->db->or_like('thn_pengalaman', $keyword);
    $this->db->or_like('pendidikan', $keyword);
    $this->db->or_like('jurusan', $keyword);
    $this->db->or_like('jns_kontrak', $keyword);
    $this->db->or_like('gaji', $keyword);
        $this->db->limit($limit, $start);
        return $this->db->get('lowongan')->result();
    }

    function get_loker_cari_all($limit, $start = 0, $keyword=NULL, $lokasi=NULL, $kategori=NULL) 
    {
        $this->db->order_by('id_lowongan', 'tgl_posting', 'asc');
        $this->db->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan', 'left');
        $this->db->like('lokasi_kerja', $lokasi);
        $this->db->like('kategori_loker', $kategori);
        $this->db->like('judul', $keyword);
    $this->db->or_like('nama_perusahaan', $keyword);
    $this->db->or_like('posisi', $keyword);
    $this->db->or_like('thn_pengalaman', $keyword);
    $this->db->or_like('pendidikan', $keyword);
    $this->db->or_like('jurusan', $keyword);
    $this->db->or_like('jns_kontrak', $keyword);
    $this->db->or_like('gaji', $keyword);
        $this->db->limit($limit, $start);
        return $this->db->get('lowongan')->result();
    }

    function count_loker_cari_all($keyword=NULL, $lokasi=NULL, $kategori=NULL)
    {
        $this->db->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan', 'left');
        $this->db->like('lokasi_kerja', $lokasi);
        $this->db->like('kategori_loker', $kategori);
        $this->db->like('judul', $keyword);
    $this->db->or_like('nama_perusahaan', $keyword);
    $this->db->or_like('posisi', $keyword);
    $this->db->or_like('thn_pengalaman', $keyword);
    $this->db->or_like('pendidikan', $keyword);
    $this->db->or_like('jurusan', $keyword);
    $this->db->or_like('jns_kontrak', $keyword);
    $this->db->or_like('gaji', $keyword);
        $this->db->from('lowongan');
        return $this->db->count_all_results();
    }

    function count_loker_cari_publik($keyword=NULL, $lokasi=NULL, $kategori=NULL)
    {
        $this->db->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan', 'left');
        $this->db->like('lokasi_kerja', $lokasi);
        $this->db->like('kategori_loker', $kategori);
        $this->db->like('judul', $keyword);
    $this->db->or_like('nama_perusahaan', $keyword);
    $this->db->or_like('posisi', $keyword);
    $this->db->or_like('thn_pengalaman', $keyword);
    $this->db->or_like('pendidikan', $keyword);
    $this->db->or_like('jurusan', $keyword);
    $this->db->or_like('jns_kontrak', $keyword);
    $this->db->or_like('gaji', $keyword);
        $this->db->from('lowongan');
        $this->db->where('status_publish', 'Publik');
        return $this->db->count_all_results();
    }

    function count_kategori()
    {
    	$query = "SELECT kategori_loker, count(*) as jml FROM lowongan GROUP BY kategori_loker ORDER BY jml DESC";
    	return $this->db->query($query)->result_array();
    }

    function get_loker_detail($id)
    {
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan', 'left');
    	$this->db->where('id_lowongan', $id);
    	return $this->db->get('lowongan')->row();
    }

    function insert_lamaran($data)
    {
    	$this->db->insert('pelamar', $data);
    }

    function cek_daftar($id_loker, $id_member)
    {
        $this->db->where('id_lowongan', $id_loker);
        $this->db->where('id_member', $id_member);
        return $this->db->get('pelamar')->row();
    }

    function get_kategori()
    {
        return $this->db->get('kategori_loker')->result();
    }

}

/* End of file M_loker.php */
/* Location: ./application/models/M_loker.php */