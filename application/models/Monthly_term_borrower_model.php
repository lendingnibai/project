<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monthly_term_borrower_model extends CI_Model {

	private $table = 'monthly_term_borrower';

	public function set_monthly_term_borrower($brgy_account_id_data)
	{
		$this->db->insert($this->table, $brgy_account_id_data);
	}
	
	public function get_this_monthly_term_borrower($registered_brgy_id)
	{
		$this->db->select('monthly_term_borrower.*, registered_brgy.registered_brgy_id');
		$this->db->from($this->table);
		$this->db->where(array('brgy_accounts.registered_brgy_id' => $registered_brgy_id));
		$this->db->join('brgy_accounts', 'brgy_accounts.brgy_account_id = monthly_term_borrower.brgy_account_id', 'inner');
		$this->db->join('registered_brgy', 'registered_brgy.registered_brgy_id = brgy_accounts.registered_brgy_id', 'inner');
		$result = $this->db->get();
		return $result;
	}
}