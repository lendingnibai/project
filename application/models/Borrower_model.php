<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrower_model extends CI_Model {

	private $table = 'borrower';

	public function insert_borrower($borrower_data)
	{
		$this->db->insert($this->table, $borrower_data);
		$result = $this->db->insert_id();
		return $result;
	}

	public function get_borrower($user_account_id)
	{
		$result = $this->db->get_where($this->table, array('user_account_id' => $user_account_id));
		return $result;
	}

	public function activate_borrower()
	{
		$this->db->where('user_account_id', $this->session->user_account_id);
		$result = $this->db->update($this->table, array('status' => 1));
		return $result;
	}

	public function deactivate_borrower()
	{
		$this->db->where('user_account_id', $this->session->user_account_id);
		$result = $this->db->update($this->table, array('status' => 0));
		return $result;
	}
	
}