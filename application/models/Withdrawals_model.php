<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdrawals_model extends CI_Model {

	private $table = 'withdrawals';

	public function insert_withdrawal($withdrawal_data)
	{
		//using: brgy
		$this->db->insert($this->table, $withdrawal_data);
		$result = $this->db->insert_id();
		return $result;
	}
	
	public function lender_request_withdrawals($request_data)
	{
		$result = $this->db->get_where($this->table, $request_data);
		return $result;
	}

	public function update_withdrawal($withdrawal_data, $withdrawal_id)
	{
		$this->db->where('withdrawal_id', $withdrawal_id);
		$result = $this->db->update($this->table, $withdrawal_data);
		return $result;
	}
}