<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Investment_applications_model extends CI_Model {

	private $table = 'investment_applications';

	public function insert_investment_app($investment_app_data)
	{
		$this->db->insert($this->table, $investment_app_data);
		$result = $this->db->insert_id();
		return $result;
	}

	public function update_investment_app($investment_app_data, $investment_application_id)
	{
		$this->db->where('investment_application_id', $investment_application_id);
		$result = $this->db->update($this->table, $investment_app_data);
		return $result;
	}

	public function get_my_investment_app()
	{
		$result = $this->db->get_where($this->table, array('lender_id' => $this->session->lender_id));
		return $result;
	}

	public function get_investment_app_req_registered_brgy($investment_application_id)
	{
		//for brgy admin & main user
		$this->db->select('investment_applications.*, investment_requirements.*, registered_brgy.barangay as b_barangay, registered_brgy.brgy_captain as b_brgy_captain, registered_brgy.street as b_street, registered_brgy.city as b_city, registered_brgy.state_prov as b_state_prov, registered_brgy.zip_code as b_zip_code, registered_brgy.photo_brgy as b_photo_brgy, registered_brgy.mobile_no as b_mobile_no, registered_brgy.tel_no as b_tel_no');
		$this->db->from($this->table);
		$this->db->where(array('investment_applications.investment_application_id' => $investment_application_id));
		$this->db->join('registered_brgy', 'registered_brgy.registered_brgy_id = investment_applications.registered_brgy_id', 'inner');
		$this->db->join('investment_requirements', 'investment_requirements.investment_application_id = investment_applications.investment_application_id', 'inner');
		$result = $this->db->get();
		return $result;
	}

	public function new_investment_app()
	{
		//for brgy admin
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where(array('investment_applications.registered_brgy_id' => $this->session->registered_brgy_id, 'investment_applications.is_accepted' => 0));
		$this->db->join('investment_requirements', 'investment_requirements.investment_application_id = investment_applications.investment_application_id', 'inner');
		$result = $this->db->get();
		return $result;
	}

	public function accept_investment_app($investment_application_id)
	{
		$this->db->where('investment_application_id', $investment_application_id);
		$result = $this->db->update($this->table, array('is_accepted' => 1, 'note' => 'Bring the exact amount & present your ref. code'));
		return $result;
	}

	public function reject_investment_app($investment_application_id, $note)
	{
		$this->db->where('investment_application_id', $investment_application_id);
		$result = $this->db->update($this->table, array('is_accepted' => 2, 'note' => $note));
		return $result;
	}

	public function check_pending_investment_app($lender_id)//check kung naa bay pending or wala pa ma complete
	{
		$query = "SELECT * FROM investment_applications WHERE (is_accepted = 1 OR is_accepted = 0) AND lender_id = $lender_id";
		$result = $this->db->query($query);
		return $result;
	}

	public function get_this_invest_app_req($investment_application_id)
	{
		//current using lender
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where(array('investment_applications.investment_application_id' => $investment_application_id));
		$this->db->join('investment_requirements', 'investment_requirements.investment_application_id = investment_applications.investment_application_id', 'inner');
		$result = $this->db->get();
		return $result;
	}

	public function get_invest_app_brgy()//get all investment applications submitted from this brgy
	{
		$query = "SELECT * FROM `investment_applications` WHERE `registered_brgy_id` = ".$this->session->registered_brgy_id." AND (`is_accepted` = 1 OR `is_accepted` = 3)";
		$result = $this->db->query($query);
		return $result;
	}

	public function get_invest_app_by_ref($invest_app_data)
	{
		//brgy using
		$result = $this->db->get_where($this->table, $invest_app_data);
		return $result;
	}
	
}