<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    //tabel users
    function input_user($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    //tabel member
    function total_member() {
        $this->db->from('member');
        return $this->db->count_all_results();
    }
 
    function get_member($id)
    {
        $this->db->join('member', 'member.id_users = users.id_users', 'left');
        $this->db->where('users.id_level', $id);
        $this->db->where('is_active', 1);
        return $this->db->get('users')->result();
    }

    function input_member($data)
    {
        $this->db->insert('member', $data);
    }

    //tabel perusahaan
    function total_perusahaan() {
        $this->db->from('perusahaan');
        return $this->db->count_all_results();
    }

    function get_perusahaan($id)
    {
        $this->db->join('perusahaan', 'perusahaan.id_users = users.id_users', 'left');
        $this->db->where('users.id_level', $id);
        $this->db->where('is_active', 1);
        return $this->db->get('users')->result();
    }

    function input_perusahaan($data)
    {
        $this->db->insert('perusahaan', $data);
    }

    //tabel lowongan
    function total_lowongan() {
        $this->db->from('lowongan');
        return $this->db->count_all_results();
    }

    function get_lowongan()
    {
        $this->db->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan', 'left');
        return $this->db->get('lowongan')->result();
    }

    function get_loker_id($id)
    {
        $this->db->where('id_lowongan', $id);
        return $this->db->get('lowongan')->row();
    }

    function loker_status($data, $id)
    {
        $this->db->where('id_lowongan', $id);
        $this->db->update('lowongan', $data);
    }
    function get_kategori()
    {
        return $this->db->get('kategori_loker')->result();
    }

    function del_kategori($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->delete('kategori_loker');
    }

    // tabel users
    function get_users($id)
    {
        $this->db->select('perusahaan.nama_perusahaan, member.nama,users.id_users, users.id_level, users.email, is_active as status');
        $this->db->join('level', 'level.id_level = users.id_level', 'left');
        $this->db->join('member', 'member.id_users = users.id_users', 'left');
        $this->db->join('perusahaan', 'perusahaan.id_users = users.id_users', 'left');
        $this->db->where('users.id_level', $id);
        $this->db->order_by('is_active', 'asc');
        return $this->db->get('users')->result();
    }

    function del_user($id)
    {
        $this->db->where('id_users', $id);
        return $this->db->delete('users');
    }

    function user_ubah_status($id, $data)
    {
        $this->db->where('id_users', $id);
        $this->db->update('users', $data);
    }

    //tabel kejuruan
    function get_kejuruan()
    {
        return $this->db->get('kejuruan')->result();
    }

    function get_kejuruan_id($id)
    {
        $this->db->where('id_kejuruan', $id);
        return $this->db->get('kejuruan')->row();
    }

    function add_kejuruan($data)
    {
        $this->db->insert('kejuruan', $data);
    }

    function edit_kejuruan($data, $id)
    {
        $this->db->where('id_kejuruan', $id);
        return $this->db->update('kejuruan', $data);
    }

    function del_kejuruan($id)
    {
        $this->db->where('id_kejuruan', $id);
        return $this->db->delete('kejuruan');
    }

    //tabel sub_kejuruan
    function get_sub_kejuruan()
    {
        $this->db->join('kejuruan', 'kejuruan.id_kejuruan = sub_kejuruan.id_kejuruan', 'left');
        return $this->db->get('sub_kejuruan')->result();
    }

    function get_sub_kejuruan_id($id)
    {
        $this->db->join('kejuruan', 'kejuruan.id_kejuruan = sub_kejuruan.id_kejuruan', 'left');
        $this->db->where('id_sub_kejuruan', $id);
        return $this->db->get('sub_kejuruan')->row();
    }

    function add_sub_kejuruan($data)
    {
        $this->db->insert('sub_kejuruan', $data);
    }

    function edit_sub_kejuruan($data, $id)
    {
        $this->db->where('id_sub_kejuruan', $id);
        return $this->db->update('sub_kejuruan', $data);
    }

    function del_sub_kejuruan($id)
    {
        $this->db->where('id_sub_kejuruan', $id);
        return $this->db->delete('sub_kejuruan');
    }

    function notif_perusahaan()
    {
        $this->db->where('is_active','0');
        $this->db->where('id_level','4');
        return $this->db->count_all_results('users');
    }

    function waktu_notif_perusahaan()
    {
        $this->db->where('is_active','0');
        $this->db->where('id_level','4');
        $this->db->order_by('tanggal', 'asc');
        $d = $this->db->get('users', 1, 0)->result();

        foreach ($d as $row) {
            $tanggal = $row->tanggal;
            return $tanggal;
        }

        
    }

    function notif_loker()
    {
        $this->db->where('status_publish','Menunggu');
        return $this->db->count_all_results('lowongan');
    }

    function waktu_notif_loker()
    {
        $this->db->where('status_publish','Menunggu');
        $this->db->order_by('tgl_posting', 'asc');
        $d = $this->db->get('lowongan', 1, 0)->result();

        foreach ($d as $row) {
            $tanggal = $row->tgl_posting;
            return $tanggal;
        }

        
    }
}
