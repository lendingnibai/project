<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan_applications_model extends CI_Model {

	private $table = 'loan_applications';

	public function insert_loan_app($loan_app_data)
	{
		$this->db->insert($this->table, $loan_app_data);
		$result = $this->db->insert_id();
		return $result;
	}

	public function new_loan_app()
	{
		//for brgy admin
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where(array('loan_applications.registered_brgy_id' => $this->session->registered_brgy_id, 'loan_applications.is_accepted' => 0));
		$this->db->join('loan_requirements', 'loan_requirements.loan_application_id = loan_applications.loan_application_id', 'inner');
		$result = $this->db->get();
		return $result;
	}

	public function get_loan_app_brgy()//get all loan applications submitted from this brgy
	{
		$query = "SELECT * FROM `loan_applications` WHERE `registered_brgy_id` = ".$this->session->registered_brgy_id." AND (`is_accepted` = 1 OR `is_accepted` = 3)";
		$result = $this->db->query($query);
		return $result;
	}

	public function get_loan_app_req_registered_brgy($loan_application_id)
	{
		//for brgy admin & main user
		$this->db->select('loan_applications.*, loan_requirements.*, registered_brgy.barangay as b_barangay, registered_brgy.brgy_captain as b_brgy_captain, registered_brgy.street as b_street, registered_brgy.city as b_city, registered_brgy.state_prov as b_state_prov, registered_brgy.zip_code as b_zip_code, registered_brgy.photo_brgy as b_photo_brgy, registered_brgy.mobile_no as b_mobile_no, registered_brgy.tel_no as b_tel_no');
		$this->db->from($this->table);
		$this->db->where(array('loan_applications.loan_application_id' => $loan_application_id));
		$this->db->join('registered_brgy', 'registered_brgy.registered_brgy_id = loan_applications.registered_brgy_id', 'inner');
		$this->db->join('loan_requirements', 'loan_requirements.loan_application_id = loan_applications.loan_application_id', 'inner');
		$result = $this->db->get();
		return $result;
	}

	public function reject_loan_app($loan_application_id, $note)
	{
		$this->db->where('loan_application_id', $loan_application_id);
		$result = $this->db->update($this->table, array('is_accepted' => 2, 'note' => $note));
		return $result;
	}

	public function accept_loan_app($loan_application_id)
	{
		$this->db->where('loan_application_id', $loan_application_id);
		$result = $this->db->update($this->table, array('is_accepted' => 1, 'note' => 'Bring any government ID & present your ref. code'));
		return $result;
	}

	public function get_my_loan_app()
	{
		$result = $this->db->get_where($this->table, array('borrower_id' => $this->session->borrower_id));
		return $result;
	}

	public function get_this_loan_app_req($loan_application_id)
	{
		//current using lender
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where(array('loan_applications.loan_application_id' => $loan_application_id));
		$this->db->join('loan_requirements', 'loan_requirements.loan_application_id = loan_applications.loan_application_id', 'inner');
		$result = $this->db->get();
		return $result;
	}

	public function check_pending_loan_app($borrower_id)//check kung naa bay pending or wala pa ma complete
	{
		$query = "SELECT * FROM loan_applications WHERE (is_accepted = 1 OR is_accepted = 0) AND borrower_id = $borrower_id";
		$result = $this->db->query($query);
		return $result;
	}

	public function update_loan_app($loan_app_data, $loan_application_id)
	{
		$this->db->where('loan_application_id', $loan_application_id);
		$result = $this->db->update($this->table, $loan_app_data);
		return $result;
	}

	public function get_loan_app_by_ref($loan_app_data)
	{
		//brgy using
		$result = $this->db->get_where($this->table, $loan_app_data);
		return $result;
	}
	
}