<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_requests_model extends CI_Model {

	private $table = 'member_requests';

	public function insert($member_request_data)
	{
		//using: brgy
		$this->db->insert($this->table, $member_request_data);
		$result = $this->db->insert_id();
		return $result;
	}

	public function update($member_request_data, $user_account_id)
	{
		$this->db->where('user_account_id', $user_account_id);
		$result = $this->db->update($this->table, $member_request_data);
		return $result;
	}

	public function get_member_request($user_account_id = 0)
	{
		if ($user_account_id == 0) 
			$user_account_id = $this->session->user_account_id;

		$result = $this->db->get_where($this->table, array('user_account_id' => $user_account_id));//remove ('status')
		return $result;
	}

}