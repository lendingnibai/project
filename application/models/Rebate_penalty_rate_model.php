<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rebate_penalty_rate_model extends CI_Model {

	private $table = 'rebate_penalty_rate';

	public function set_min_max_rebate_penalty_rate($min_max_rebate_penalty_rate_data)
	{
		$this->db->insert($this->table, $min_max_rebate_penalty_rate_data);
	}

	public function get_rebate_penalty_rate($brgy_account_id)
	{
		$result = $this->db->get_where($this->table,array('brgy_account_id' => $brgy_account_id));
		return $result;
	}
}