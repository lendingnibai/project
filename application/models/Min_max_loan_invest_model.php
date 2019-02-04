<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Min_max_loan_invest_model extends CI_Model {

	private $table = 'min_max_loan_invest';

	public function set_min_max_loan_invest($min_max_loan_invest_data)
	{
		$this->db->insert($this->table, $min_max_loan_invest_data);
	}

	public function get_this_min_max_invest_loan($registered_brgy_id)
	{
		$this->db->select('min_max_loan_invest.*, registered_brgy.registered_brgy_id');
		$this->db->from($this->table);
		$this->db->where(array('brgy_accounts.registered_brgy_id' => $registered_brgy_id));
		$this->db->join('brgy_accounts', 'brgy_accounts.brgy_account_id = min_max_loan_invest.brgy_account_id', 'inner');
		$this->db->join('registered_brgy', 'registered_brgy.registered_brgy_id = brgy_accounts.registered_brgy_id', 'inner');
		$result = $this->db->get();
		return $result;
	}
	
}