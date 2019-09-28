<?php
class Login_model extends CI_Model{
	public $table = 'users';
	public $limit = '1';

  //   function auth_login($email,$password){
  //       $this->db->select('member.*,users.*');
		// $this->db->from('users');
		// $this->db->join('level', 'users.id_level = level.id_level');
		// $this->db->join('member', 'member.id_users = users.id_users', 'left');
		// $this->db->where('email', $email);
		// $this->db->where('password', $password);
		// $this->db->limit($this->limit);
		// return $this->db->get();
  //   }

    function get_user($email)
    {
    	$this->db->join('level', 'users.id_level = level.id_level');
		$this->db->join('member', 'member.id_users = users.id_users', 'left');
		$this->db->join('perusahaan', 'perusahaan.id_users = users.id_users', 'left');
    	$this->db->where('users.email', $email);
    	$this->db->limit($this->limit);
    	return $this->db->get('users')->row_array();
    }
}