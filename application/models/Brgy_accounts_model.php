<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brgy_accounts_model extends CI_Model {

	private $table = 'brgy_accounts';

	public function check_credentials_brgy_admin($email_username, $password)
	{
		$query = "SELECT * FROM $this->table WHERE (email = '$email_username' OR username = '$email_username') AND password = '$password'";
		$result = $this->db->query($query);
		return $result;

	}

	public function get_this_brgy_admin_details()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where(array('brgy_accounts.brgy_account_id' => $this->session->brgy_account_id));
		$this->db->join('brgy_user_details', 'brgy_accounts.brgy_account_id = brgy_user_details.brgy_account_id', 'inner');
		$result = $this->db->get();
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

	public function create_brgy_account($brgy_account_data)
	{
		$this->db->insert($this->table, $brgy_account_data);
		$result = $this->db->insert_id();
		return $result;
	}
	
}