<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brgy_yearly_quarters_model extends CI_Model {

	private $table = 'brgy_yearly_quarters';

	public function insert_brgy_quarters($quarters_data)
	{
		$this->db->insert($this->table, $quarters_data);
		$result = $this->db->insert_id();
		return $result;
	}

	public function get_this_quarters($quarter_data)
	{
		$result = $this->db->get_where($this->table, $quarter_data);
		return $result;
	}
	
}