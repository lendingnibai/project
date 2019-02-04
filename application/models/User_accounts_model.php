<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_accounts_model extends CI_Model {

	private $table = 'user_accounts';

	public function check_credentials_user_account($email_username, $password)
	{
		$query = "SELECT * FROM $this->table WHERE (email = '$email_username' OR username = '$email_username') AND password = '$password'";
		$result = $this->db->query($query);
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

	public function check_password($credentials_data)//password ug user account id
	{
		$result = $this->db->get_where($this->table, $credentials_data);
		return $result;
	}
	
	public function insert_user_account($user_account_data)
	{
		$this->db->insert($this->table, $user_account_data);
		$result = $this->db->insert_id();
		return $result;
	}

	public function verified_user($user_account_data, $user_account_id)
	{
		$this->db->where('user_account_id', $user_account_id);
		$result = $this->db->update($this->table,$user_account_data);
		return $result;
	}

	public function update_user_account($user_account_data)
	{
		$this->db->where('user_account_id', $this->session->user_account_id);
		$result = $this->db->update($this->table, $user_account_data);
		return $result;
	}

	public function get_this_user_details()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where(array('user_accounts.user_account_id' => $this->session->user_account_id));
		$this->db->join('user_details', 'user_accounts.user_account_id = user_details.user_account_id', 'inner');
		$result = $this->db->get();
		return $result;
	}
	
}