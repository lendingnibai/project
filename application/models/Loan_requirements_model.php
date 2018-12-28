<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan_requirements_model extends CI_Model {

	private $table = 'loan_requirements';

	public function insert_loan_req($loan_req_data)
	{
		$this->db->insert($this->table, $loan_req_data);
		$result = $this->db->insert_id();
		return $result;
	}

	public function get_this_requirements($loan_application_id)
	{	
		$result = $this->db->get_where($this->table, array('loan_application_id' => $loan_application_id));
		return $result;
	}

	public function update_loan_req($loan_req_data, $loan_application_id)
	{	
		$this->db->where(array('loan_application_id' => $loan_application_id));
		$result =  $this->db->update($this->table, $loan_req_data);
		return $result;
	}
}