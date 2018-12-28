<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super_admin_model extends CI_Model {

	private $table = 'super_admin';

	public function check_credentials($email_username, $password)
	{
		$query = "SELECT * FROM $this->table WHERE (email = '$email_username' OR username = '$email_username') AND password = '$password'";
		$result = $this->db->query($query);
		return $result;

	}

	public function get_this_super_admin()
	{
		$result = $this->db->get_where($this->table, array('super_admin_id' => $this->session->super_admin_id));
		return $result;
	}

	public function check_email($email_data)
	{
		$result = $this->db->get_where($this->table, $email_data);
		return $result;
	}

	public function check_username($username_data)
	{
		$result = $this->db->get_where($this->table, $username_data);
		return $result;
	}
	
}