<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan_interest_rate_model extends CI_Model {

	private $table = 'loan_interest_rate';

	public function set_loan_interest_rate($loan_interest_rate_data)
	{
		$this->db->insert($this->table, $loan_interest_rate_data);
	}

	public function get_brgy_interest_rates_loan()
	{	
		$result = $this->db->get_where($this->table, array('brgy_account_id' => $this->session->registered_brgy_id));
		return $result;
	}
	
}