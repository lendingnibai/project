<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invest_interest_rate_model extends CI_Model {

	private $table = 'invest_interest_rate';

	public function set_invest_interest_rate($invest_interest_rate_data)
	{
		$result = $this->db->insert($this->table, $invest_interest_rate_data);
		return $result;
	}

	public function get_brgy_interest_rates($barangay_for_other = 0)
	{	
		if ($barangay_for_other != 0) 
		{
			$brgy_account_id = $barangay_for_other;
		}
		else
		{
			$brgy_account_id = $this->session->registered_brgy_id;
		}

		$result = $this->db->get_where($this->table, array('brgy_account_id' => $brgy_account_id));
		return $result;
	}
	
}