<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brgy_user_details_model extends CI_Model {

	private $table = 'brgy_user_details';

	public function insert_brgy_details($brgy_data)
	{
		$this->db->insert($this->table, $brgy_data);
		$result = $this->db->insert_id();
		return $result;
	}

	public function get_this_incomplete_brgy_admin()
	{
		$result = $this->db->get_where($this->table, array('is_completed' => 0, 'brgy_account_id' => $this->session->brgy_account_id));
		return $result;
	}

	public function get_this_incomplete_brgy_staff()
	{
		$result = $this->db->get_where($this->table, array('is_completed' => 0, 'brgy_staff_account_id' => $this->session->brgy_staff_account_id));
		return $result;
	}

	public function update_brgy_admin_user_details($brgy_user_details_data)
	{
		$this->db->where('brgy_account_id', $this->session->brgy_account_id);
		$result = $this->db->update($this->table, $brgy_user_details_data);
		return $result;
	}

	public function update_brgy_staff_user_details($brgy_user_details_data)
	{
		$this->db->where('brgy_staff_account_id', $this->session->brgy_staff_account_id);
		$result = $this->db->update($this->table, $brgy_user_details_data);
		return $result;
	}
	
}