<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lender_model extends CI_Model {

	private $table = 'lender';

	public function insert_lender($lender_data)
	{
		$this->db->insert($this->table, $lender_data);
		$result = $this->db->insert_id();
		return $result;
	}

	public function get_lender($user_account_id)
	{
		$result = $this->db->get_where($this->table, array('user_account_id' => $user_account_id));
		return $result;
	}

	public function activate_lender()
	{
		$this->db->where('user_account_id', $this->session->user_account_id);
		$result = $this->db->update($this->table, array('status' => 1));
		return $result;
	}

	public function deactivate_lender()
	{
		$this->db->where('user_account_id', $this->session->user_account_id);
		$result = $this->db->update($this->table, array('status' => 0));
		return $result;
	}
	
}