<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs_model extends CI_Model {

	private $table = 'logs';

	public function log($log_data)
	{
		$result = $this->db->insert($this->table, $log_data);
		return $result;
	}

	public function get_logs()
	{
		$result = $this->db->get($this->table);
		return $result;
	}
	
	public function main_user_logs()
	{
		$this->db->select('user_details.*, logs.log_id, logs.user_account_id, logs.action, logs.user_agent, logs.platform, logs.user_type, logs.date_time, user_accounts.email, user_accounts.username');
		$this->db->from($this->table);
		$this->db->join('user_details', 'user_details.user_account_id = logs.user_account_id', 'inner');
		$this->db->join('user_accounts', 'user_accounts.user_account_id = logs.user_account_id', 'inner');
		//$this->db->where('user_details.is_completed =', 1);
		$this->db->where('logs.user_account_id !=', null);
		$result = $this->db->get();
		return $result;
	}
	//gikan sa lain table
	public function main_user_names_ids()
	{
		$this->db->select('user_details.first_name, user_details.last_name, user_accounts.user_account_id');
		$this->db->from('user_accounts');
		$this->db->join('user_details', 'user_details.user_account_id = user_accounts.user_account_id', 'inner');
		$this->db->where('user_details.first_name !=', null);
		$this->db->group_by('user_accounts.user_account_id'); 
		$result = $this->db->get();
		return $result;
	}

	public function brgy_admin_logs()
	{
		$this->db->select('brgy_user_details.*, logs.log_id, logs.brgy_account_id, logs.action, logs.user_agent, logs.platform, logs.user_type, logs.date_time, brgy_accounts.email, brgy_accounts.username');
		$this->db->from($this->table);
		$this->db->join('brgy_user_details', 'brgy_user_details.brgy_account_id = logs.brgy_account_id', 'inner');
		$this->db->join('brgy_accounts', 'brgy_accounts.brgy_account_id = logs.brgy_account_id', 'inner');
		//$this->db->where('user_details.is_completed =', 1);
		$this->db->where('logs.brgy_account_id !=', null);
		$result = $this->db->get();
		return $result;
	}
	//gikan sa lain table
	public function brgy_admin_names_ids()
	{
		$this->db->select('brgy_user_details.first_name, brgy_user_details.last_name, brgy_accounts.brgy_account_id');
		$this->db->from('brgy_accounts');
		$this->db->join('brgy_user_details', 'brgy_user_details.brgy_account_id = brgy_accounts.brgy_account_id', 'inner');
		$this->db->where('brgy_user_details.first_name !=', null);
		$this->db->group_by('brgy_accounts.brgy_account_id'); 
		$result = $this->db->get();
		return $result;
	}

	public function brgy_staff_logs()
	{
		$this->db->select('brgy_user_details.*, logs.log_id, logs.brgy_staff_account_id, logs.action, logs.user_agent, logs.platform, logs.user_type, logs.date_time, brgy_staff_accounts.email, brgy_staff_accounts.username');
		$this->db->from($this->table);
		$this->db->join('brgy_user_details', 'brgy_user_details.brgy_staff_account_id = logs.brgy_staff_account_id', 'inner');
		$this->db->join('brgy_staff_accounts', 'brgy_staff_accounts.brgy_staff_account_id = logs.brgy_staff_account_id', 'inner');
		//$this->db->where('user_details.is_completed =', 1);
		$this->db->where('logs.brgy_staff_account_id !=', null);
		$result = $this->db->get();
		return $result;
	}

	//gikan sa lain table
	public function brgy_staff_names_ids()
	{
		$this->db->select('brgy_user_details.first_name, brgy_user_details.last_name, brgy_staff_accounts.brgy_staff_account_id');
		$this->db->from('brgy_staff_accounts');
		$this->db->join('brgy_user_details', 'brgy_user_details.brgy_staff_account_id = brgy_staff_accounts.brgy_staff_account_id', 'inner');
		$this->db->where('brgy_user_details.first_name !=', null);
		$this->db->group_by('brgy_staff_accounts.brgy_staff_account_id'); 
		$result = $this->db->get();
		return $result;
	}

	public function super_admin_logs()
	{
		$this->db->select('super_admin.*, logs.log_id, logs.super_admin_id, logs.action, logs.user_agent, logs.platform, logs.user_type, logs.date_time');
		$this->db->from($this->table);
		$this->db->join('super_admin', 'super_admin.super_admin_id = logs.super_admin_id', 'inner');
		$this->db->where('logs.super_admin_id !=', null);
		$result = $this->db->get();
		return $result;
	}
	//gikan sa lain table
	public function super_admin_names_ids()
	{
		$result = $this->db->get('super_admin');
		return $result;
	}
	

}