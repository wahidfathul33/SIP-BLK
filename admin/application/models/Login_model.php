<?php
class Login_model extends CI_Model{

    function get_user($email)
    {
    	$this->db->where('email', $email);
    	return $this->db->get('users')->row();
    }
}