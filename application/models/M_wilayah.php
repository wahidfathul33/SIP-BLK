<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_wilayah extends CI_Model {

    public function get_provinsi()
    {
        $this->db->select('provinces.id as prov_id, provinces.name as prov_name');
        $this->db->order_by('provinces.name', 'asc');
        return $this->db->get('provinces')->result_array();
    }

    public function get_kab()
    {
        $this->db->select('regencies.name as kota_name, regencies.id as kota_id');
        $this->db->order_by('regencies.name', 'asc');

        return $this->db->get('regencies')->result_array();
    }

    public function get_kota_id($nama)
    {
        $this->db->where('regencies.name', $nama);

        return $this->db->get('regencies')->row()->id;
    }

    public function get_kec_id($nama)
    {
        $this->db->where('districts.name', $nama);

        return $this->db->get('districts')->row()->id;
    }

    public function get_kel_id($nama)
    {
        $this->db->where('villages.name', $nama);

        return $this->db->get('villages')->row()->id;
    }

    public function get_kota($provID)
    {
        $this->db->select('regencies.name as kota_name, regencies.id as kota_id, regencies.province_id as provinsi_id');
        $this->db->where('regencies.province_id', $provID);
        $this->db->order_by('regencies.name', 'asc');

        return $this->db->get('regencies')->result_array();
    }

    public function get_kecamatan($kotaID)
    {
        $this->db->select('districts.name as kec_name, districts.id as kec_id, districts.regency_id as kota_id');
        $this->db->where('districts.regency_id', $kotaID);
        $this->db->order_by('districts.name', 'asc');
        return $this->db->get('districts')->result_array();
    }
    public function get_kelurahan($kecID)
    {
        $this->db->select('villages.name as kel_name, villages.id as kel_id, district_id');
        $this->db->where('villages.district_id', $kecID);
        $this->db->order_by('villages.name', 'asc');
        return $this->db->get('villages')->result_array();
    }


    function get_prov_nama($id)
    {
        $this->db->select('name');
        $this->db->where('id', $id);
        return $this->db->get('provinces')->row()->name;
    }

    function get_kota_nama($id)
    {
        $this->db->select('name');
        $this->db->where('id', $id);
        return $this->db->get('regencies')->row()->name;
    }

    function get_kec_nama($id)
    {
        $this->db->select('name');
        $this->db->where('id', $id);
        return $this->db->get('districts')->row()->name;
    }

    function get_kel_nama($id)
    {
        $this->db->select('name');
        $this->db->where('id', $id);
        return $this->db->get('villages')->row()->name;
    }
}