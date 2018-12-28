<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_details_model extends CI_Model {

	private $table = 'user_details';

	public function insert_user_details($user_details_data)
	{
		$this->db->insert($this->table, $user_details_data);
		$result = $this->db->insert_id();
		return $result;
	}

	//for trapping purposes sa gov id 
	public function get_this_date_updated($user_account_id)
	{
		$this->db->select('date_updated, gov_id');
		$this->db->from($this->table);
		$this->db->where('date_updated !=', null);
		$this->db->where('user_account_id', $user_account_id);
		$result = $this->db->get();
		return $result;
	}

	public function get_this_incomplete_main_user()
	{
		$result = $this->db->get_where($this->table, array('is_completed' => 0, 'user_account_id' => $this->session->user_account_id));
		return $result;
	}

	public function update_user_profile($user_profile_data)
	{
		$this->db->where('user_account_id', $this->session->user_account_id);
		$result = $this->db->update($this->table, $user_profile_data);
		return $result;
	}

	public function get_for_approval_accounts()
	{
		//for brgy use only
		$this->db->select('user_details.first_name, user_details.middle_name, user_details.last_name, user_details.user_detail_id, user_details.user_account_id, user_details.gov_id, user_details.mobile_no, user_accounts.email, user_accounts.username, user_accounts.is_borrower, user_accounts.is_lender');
		$this->db->from($this->table);
		$this->db->where(array('user_details.for_approval'=> 1, 'user_accounts.registered_brgy_id' => $this->session->registered_brgy_id));
		$this->db->join('user_accounts', 'user_accounts.user_account_id = user_details.user_account_id', 'left');
		$result = $this->db->get();
		return $result;
	}

	public function get_for_verification_accounts()
	{
		$registered_brgy_id = $this->session->registered_brgy_id;

		$query = "SELECT * FROM user_details 
				JOIN member_requests ON user_details.user_account_id = member_requests.user_account_id 
				JOIN user_accounts ON user_details.user_account_id = user_accounts.user_account_id 
				WHERE member_requests.status = 0 
				AND user_accounts.is_verified = 0 
				AND user_details.is_completed = 1 
				AND member_requests.registered_brgy_id = '$registered_brgy_id'";
		$result = $this->db->query($query);
		return $result;

	}

	public function get_this_for_approval_account($user_account_id)
	{
		//for brgy use only
		$this->db->select('CONCAT(user_details.first_name," ",user_details.middle_name," ",user_details.last_name) as full_name, user_details.user_detail_id, user_details.user_account_id, user_details.gov_id, user_details.mobile_no, CONCAT(user_details.barangay," ",user_details.street," ",user_details.city," ",user_details.zip_code) as address, user_accounts.email, user_accounts.username, user_accounts.is_borrower, user_accounts.is_lender');
		$this->db->from($this->table);
		$this->db->where(array('user_details.for_approval'=> 1, 'user_accounts.registered_brgy_id' => $this->session->registered_brgy_id, 'user_accounts.user_account_id' => $user_account_id));
		$this->db->join('user_accounts', 'user_accounts.user_account_id = user_details.user_account_id', 'left');
		$result = $this->db->get();
		return $result;
	}

	public function get_this_for_verification_account($user_account_id)
	{
		//for brgy use only
		$this->db->select('CONCAT(user_details.first_name," ",user_details.middle_name," ",user_details.last_name) as full_name, user_details.user_detail_id, user_details.user_account_id, user_details.gov_id, user_details.mobile_no, CONCAT(user_details.barangay," ",user_details.street," ",user_details.city," ",user_details.zip_code) as address, user_accounts.email, user_accounts.username, user_accounts.is_borrower, user_accounts.is_lender');
		$this->db->from($this->table);
		$this->db->where(array('member_requests.status'=> 0, 'member_requests.registered_brgy_id' => $this->session->registered_brgy_id, 'user_accounts.user_account_id' => $user_account_id));
		$this->db->join('user_accounts', 'user_accounts.user_account_id = user_details.user_account_id', 'left');
		$this->db->join('member_requests', 'member_requests.user_account_id = user_details.user_account_id', 'left');
		$result = $this->db->get();
		return $result;
	}

	public function approve_user($approve_user_data, $user_account_id)
	{
		$this->db->where('user_account_id', $user_account_id);
		$result = $this->db->update($this->table, $approve_user_data);
		return $result;
	}

	public function reject_user($reject_user_data, $user_account_id)
	{
		$this->db->where('user_account_id', $user_account_id);
		$result = $this->db->update($this->table, $reject_user_data);
		return $result;
	}

	public function get_this_user_details($lender_id)
	{
		//for brgy use only
		$this->db->select('user_details.first_name, user_details.middle_name, user_details.last_name, user_details.mobile_no, user_accounts.email, lender.lender_id');
		$this->db->from($this->table);
		$this->db->where(array('lender.lender_id'=> $lender_id));
		$this->db->join('user_accounts', 'user_accounts.user_account_id = user_details.user_account_id', 'inner');
		$this->db->join('lender', 'lender.user_account_id = user_accounts.user_account_id', 'inner');
		$result = $this->db->get();
		return $result;
	}
	
}