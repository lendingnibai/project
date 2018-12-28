<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registered_brgy_model extends CI_Model {

	private $table = 'registered_brgy';

	public function insert_brgy($brgy_data)
	{
		$this->db->insert($this->table, $brgy_data);
		$result = $this->db->insert_id();
		return $result;
	}

	public function registered_brgy()
	{
		$this->db->select('registered_brgy.*');
		$this->db->from($this->table);
		$this->db->where(array('brgy_user_details.is_completed' => 1));
		$this->db->join('brgy_accounts', 'brgy_accounts.registered_brgy_id = registered_brgy.registered_brgy_id', 'inner');
		$this->db->join('brgy_user_details', 'brgy_user_details.brgy_account_id = brgy_accounts.brgy_account_id', 'inner');
		$result = $this->db->get();
		return $result;
	}

	public function get_this_registered_brgy($registered_brgy_id)
	{
		$result = $this->db->get_where($this->table, array('registered_brgy_id'=> $registered_brgy_id));
		return $result;
	}

	public function get_this_brgy_details()
	{
		$result = $this->db->get_where($this->table, array('registered_brgy_id' => $this->session->registered_brgy_id));
		return $result;
	}

	public function get_all_brgy()
	{
		$this->db->select('registered_brgy_id, barangay');
		$this->db->from($this->table);
		$result = $this->db->get();
		return $result;
	}
	
}