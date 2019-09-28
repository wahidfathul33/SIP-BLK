<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member_model extends CI_Model
{

    public $table = 'member';
    public $id = 'id_users';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id()
    {
        $id = $this->session->userdata('id_users');
        $this->db->join('users', 'users.id_users = member.id_users', 'left');
        $this->db->join('level', 'level.id_level = users.id_level', 'left');
        $this->db->where('member.id_users', $id);
        return $this->db->get($this->table)->row();
    }

    function get_by_id2($id)
    {
        $this->db->where('id_member', $id);
        return $this->db->get($this->table)->row();
    }

    function cek_data(){
        $id = $this->session->userdata('id_users');
        $this->db->select('id_member');
        $this->db->where('id_users', $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
	$this->db->or_like('id_member', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('gol_darah', $q);
	$this->db->or_like('tmp_lahir', $q);
	$this->db->or_like('tgl_lahir', $q);
	$this->db->or_like('tinggi_badan', $q);
	$this->db->or_like('berat_badan', $q);
	$this->db->or_like('status_nikah', $q);
	$this->db->or_like('alamat_ktp', $q);
	$this->db->or_like('alamat_now', $q);
	$this->db->or_like('no_hp', $q);
	$this->db->or_like('no_wa', $q);
	$this->db->or_like('pendidikan', $q);
	$this->db->or_like('sekolah', $q);
	$this->db->or_like('Jurusan', $q);
	$this->db->or_like('pbk_tahun', $q);
	$this->db->or_like('pbk_angkatan', $q);
	$this->db->or_like('foto', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function total_data() {
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by('id_member', $this->order);
	$this->db->or_like('id_member', $q);
	$this->db->or_like('id_users', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('gol_darah', $q);
	$this->db->or_like('tmp_lahir', $q);
	$this->db->or_like('tgl_lahir', $q);
	$this->db->or_like('tinggi_badan', $q);
	$this->db->or_like('berat_badan', $q);
	$this->db->or_like('status_nikah', $q);
	$this->db->or_like('alamat_ktp', $q);
	$this->db->or_like('alamat_now', $q);
	$this->db->or_like('no_hp', $q);
	$this->db->or_like('no_wa', $q);
	$this->db->or_like('pendidikan', $q);
	$this->db->or_like('sekolah', $q);
	$this->db->or_like('Jurusan', $q);
	$this->db->or_like('pbk_tahun', $q);
	$this->db->or_like('pbk_angkatan', $q);
	$this->db->or_like('foto', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_alumni($limit, $start = 0, $q = NULL) {
        $this->db->join('users', 'users.id_users = member.id_users', 'left');
        $this->db->join('level', 'level.id_level = users.id_level', 'left');
        $this->db->order_by('id_member', $this->order);
    $this->db->or_like('member.id_member', $q);
    $this->db->or_like('member.id_users', $q);
    $this->db->or_like('nama', $q);
    $this->db->or_like('agama', $q);
    $this->db->or_like('jenis_kelamin', $q);
    $this->db->or_like('gol_darah', $q);
    $this->db->or_like('tmp_lahir', $q);
    $this->db->or_like('tgl_lahir', $q);
    $this->db->or_like('tinggi_badan', $q);
    $this->db->or_like('berat_badan', $q);
    $this->db->or_like('status_nikah', $q);
    $this->db->or_like('alamat_ktp', $q);
    $this->db->or_like('alamat_now', $q);
    $this->db->or_like('no_hp', $q);
    $this->db->or_like('no_wa', $q);
    $this->db->or_like('pendidikan', $q);
    $this->db->or_like('sekolah', $q);
    $this->db->or_like('Jurusan', $q);
    $this->db->or_like('pbk_tahun', $q);
    $this->db->or_like('pbk_angkatan', $q);
    $this->db->or_like('foto', $q);
    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_non_alumni($limit, $start = 0, $q = NULL) {
        $this->db->join('users', 'users.id_users = member.id_users', 'left');
        $this->db->join('level', 'level.id_level = users.id_level', 'left');
        $this->db->order_by('id_member', $this->order);
    $this->db->or_like('member.id_member', $q);
    $this->db->or_like('member.id_users', $q);
    $this->db->or_like('nama', $q);
    $this->db->or_like('agama', $q);
    $this->db->or_like('jenis_kelamin', $q);
    $this->db->or_like('gol_darah', $q);
    $this->db->or_like('tmp_lahir', $q);
    $this->db->or_like('tgl_lahir', $q);
    $this->db->or_like('tinggi_badan', $q);
    $this->db->or_like('berat_badan', $q);
    $this->db->or_like('status_nikah', $q);
    $this->db->or_like('alamat_ktp', $q);
    $this->db->or_like('alamat_now', $q);
    $this->db->or_like('no_hp', $q);
    $this->db->or_like('no_wa', $q);
    $this->db->or_like('pendidikan', $q);
    $this->db->or_like('sekolah', $q);
    $this->db->or_like('Jurusan', $q);
    $this->db->or_like('pbk_tahun', $q);
    $this->db->or_like('pbk_angkatan', $q);
    $this->db->or_like('foto', $q);
    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where('id_users', $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file member_model.php */
/* Location: ./application/models/member_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-04-17 14:46:25 */
/* http://harviacode.com */