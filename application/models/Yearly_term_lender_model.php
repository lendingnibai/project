<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yearly_term_lender_model extends CI_Model {

	private $table = 'yearly_term_lender';

	public function set_yearly_term_lender($brgy_account_id_data)
	{
		$this->db->insert($this->table, $brgy_account_id_data);
	}

	public function get_this_yearly_terms($registered_brgy_id)
	{
		$this->db->select('yearly_term_lender.*, registered_brgy.registered_brgy_id');
		$this->db->from($this->table);
		$this->db->where(array('brgy_accounts.registered_brgy_id' => $registered_brgy_id));
		$this->db->join('brgy_accounts', 'brgy_accounts.brgy_account_id = yearly_term_lender.brgy_account_id', 'inner');
		$this->db->join('registered_brgy', 'registered_brgy.registered_brgy_id = brgy_accounts.registered_brgy_id', 'inner');
		$result = $this->db->get();
		return $result;
	}
	
}