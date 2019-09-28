<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_wilayah extends CI_Model {
    private $_provID;
    private $_kotaID;
    private $_kecID;

    public function set_provinsi_id($provID) {
        return $this->_provID = $provID;
    }
    
    public function set_kota_id($kotaID) {
        return $this->_kotaID = $kotaID;
    }

    public function set_kec_id($kecID) {
        return $this->_kecID = $kecID;
    }

    public function get_provinsi()
    {
        $this->db->select('provinces.id as prov_id, provinces.name as prov_name');
        $this->db->order_by('provinces.name', 'asc');
        return $this->db->get('provinces')->result_array();
    }

    public function get_kota()
    {
        $this->db->select('regencies.name as kota_name, regencies.id as kota_id, regencies.province_id as provinsi_id');
        $this->db->where('regencies.province_id', $this->_provID);
        $this->db->order_by('regencies.name', 'asc');
        // $this->db->join('provinces', 'regencies.province_id = provinces.id');

        return $this->db->get('regencies')->result_array();
    }

    public function get_kab()
    {
        $this->db->select('regencies.name as kota_name, regencies.id as kota_id');
        $this->db->order_by('regencies.name', 'asc');

        return $this->db->get('regencies')->result_array();
    }

    public function get_kecamatan()
    {
        $this->db->select('districts.name as kec_name, districts.id as kec_id, districts.regency_id as kota_id');
        $this->db->where('districts.regency_id', $this->_kotaID);
        $this->db->order_by('districts.name', 'asc');
        //$this->db->join('regencies', 'districts.regency_id = regencies.id');
        return $this->db->get('districts')->result_array();
    }
    public function get_kelurahan()
    {
        $this->db->select('villages.name as kel_name, villages.id as kel_id, district_id');
        $this->db->where('villages.district_id', $this->_kecID);
        $this->db->order_by('villages.name', 'asc');
        //$this->db->join('districts', 'villages.district_id = districts.id');
        return $this->db->get('villages')->result_array();
    }


    function get_prov_nama($id)
    {
        $this->db->select('name');
        $this->db->where('id', $id);
        return strtolower($this->db->get('provinces')->row()->name);
    }

    function get_kota_nama($id)
    {
        $this->db->select('name');
        $this->db->where('id', $id);
        return strtolower($this->db->get('regencies')->row()->name);
    }

    function get_kec_nama($id)
    {
        $this->db->select('name');
        $this->db->where('id', $id);
        return strtolower($this->db->get('districts')->row()->name);
    }

    function get_kel_nama($id)
    {
        $this->db->select('name');
        $this->db->where('id', $id);
        return strtolower($this->db->get('villages')->row()->name);
    }

    // untuk edit ambil dari id level paling bawah
    public function get_selected_by_id_kelurahan($id_kelurahan)
    {
        $this->db->where('villages.id', $id_kelurahan);
        $this->db->join('districts', 'villages.district_id = districts.id');
        $this->db->join('regencies', 'districts.regency_id = regencies.id');
        $this->db->join('provinces', 'regencies.province_id = provinces.id');
        return $this->db->get('villages')->row();
    }
}