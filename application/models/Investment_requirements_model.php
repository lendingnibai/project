<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Investment_requirements_model extends CI_Model {

	private $table = 'investment_requirements';

	public function insert_investment_req($investment_req_data)
	{
		$this->db->insert($this->table, $investment_req_data);
		$result = $this->db->insert_id();
		return $result;
	}

	public function update_investment_req($investment_req_data, $investment_application_id)
	{	
		$this->db->where(array('investment_application_id' => $investment_application_id));
		$result =  $this->db->update($this->table, $investment_req_data);
		return $result;
	}

	public function get_this_requirements($investment_application_id)
	{	
		$result = $this->db->get_where($this->table, array('investment_application_id' => $investment_application_id));
		return $result;
	}
	
}