<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	function insert($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

	function verifikasi($email, $data){
        $this->db->where('email', $email);
        return $this->db->update('users', $data);
    }

    function get_user_id($email)
    {
    	$this->db->where('email', $email);
    	return $this->db->get('users')->row();
    }
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */

