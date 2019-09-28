<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelamar_model extends CI_Model
{

    public $table = 'pelamar';
    public $id = 'id_pelamar';
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
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

//===============================================================================================================

    function get_data_pelamar($id, $limit, $start = 0, $q = NULL) {
        $this->db->join('member', 'pelamar.id_member = member.id_member', 'left');
        $this->db->join('lowongan', 'lowongan.id_lowongan = pelamar.id_lowongan', 'left');
        $this->db->where('pelamar.id_lowongan', $id);
        $this->db->order_by($this->id, $this->order);
        $this->db->like('pelamar.id_pelamar', $q);
    $this->db->or_like('pelamar.id_member', $q);
    $this->db->or_like('pelamar.id_lowongan', $q);
    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

//===============================================================================================================

    function get_id_member(){
        $this->db->select('id_member');
        $id_users = $this->session->userdata('id_users');
        $this->db->where('id_users', $id_users);
        return $this->db->get('member')->row();
    }

    function cek_data(){
        $id_member = $this->get_id_member();
        $id = $id_member->id_member;
        $this->db->select('id_pelamar');
        $this->db->where('id_member', $id);
        $this->db->get('pelamar')->row();
    }

    // function get_id_lowongan()
    // {
    //     $id_member = $this->get_id_member();
    //     $this->db->select('id_lowongan');
    //     //$this->db->join('lowongan', 'lowongan.id_lowongan = pelamar.id_lowongan', 'left');
    //     $this->db->where('id_member', $id_member);
    //     $this->db->where('status', 'Diterima');
    //     return $this->db->get('pelamar')->row()->id_lowongan;
    // }

    // function get_id_panggilan()
    // {
    //     $id_lowongan = $this->get_id_lowongan();
    //     $this->db->select('id_paggilan');
    //     $this->db->join('panggilan', 'panggilan.id_panggilan = lowongan.id_panggilan', 'left');
    //     $this->db->where('id_lowongan', $id_lowongan);
    //     return $this->db->get('lowongan')->row()->id_panggilan;
    // }

    // function get_data_panggilan()
    // {
    //     $id_panggilan = $this->get_id_panggilan();
    //     $this->db->select('*');
    //     $this->db->where('id_panggilan', $id_panggilan);
    //     return $this->db->get('panggilan')->result();
    // }
    
//===============================================================================================================

    // get total rows
    function total_rows($id, $q = NULL) {
        $this->db->where('id_lowongan', $id);
        $this->db->like('id_pelamar', $q);
	$this->db->or_like('id_member', $q);
	$this->db->or_like('id_lowongan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->join('member', 'pelamar.id_member = member.id_member', 'left');
        $this->db->join('lowongan', 'lowongan.id_lowongan = pelamar.id_lowongan', 'left');
        $this->db->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan', 'left');
        $this->db->order_by($this->id, $this->order);
        $this->db->like('pelamar.id_pelamar', $q);
	$this->db->or_like('pelamar.id_member', $q);
	$this->db->or_like('pelamar.id_lowongan', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_limit_data_profil($id, $limit, $start = 0, $q = NULL) {
        $this->db->join('member', 'pelamar.id_member = member.id_member', 'left');
        $this->db->join('lowongan', 'lowongan.id_lowongan = pelamar.id_lowongan', 'left');
        $this->db->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan', 'left');
        $this->db->where('pelamar.id_member', $id);
        $this->db->order_by($this->id, $this->order);
        $this->db->like('pelamar.id_pelamar', $q);
    $this->db->or_like('pelamar.id_member', $q);
    $this->db->or_like('pelamar.id_lowongan', $q);
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
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function update_status($id)
    {
        $this->db->set('status', 'Diterima');
        $this->db->where($this->id, $id);
        $this->db->update($this->table);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file pelamar_model.php */
/* Location: ./application/models/pelamar_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-10 08:21:32 */
/* http://harviacode.com */