<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions_model extends CI_Model {

	private $table = 'transactions';

	public function insert_transaction($transaction_data)
	{
		//using: brgy
		$this->db->insert($this->table, $transaction_data);
		$result = $this->db->insert_id();
		return $result;
	}

	public function get_current_balance()
	{
		$query = "SELECT SUM(credit) - SUM(debit) AS current_balance FROM ".$this->table." WHERE `registered_brgy_id` = ".$this->session->registered_brgy_id."";
		$result = $this->db->query($query);
		return $result;
	}

	public function get_transaction_withdrawals()
	{
		$this->db->where('withdrawal_id !=', null);
		$this->db->where('registered_brgy_id', $this->session->registered_brgy_id);
		$result = $this->db->get($this->table);
		return $result;
	}

	public function get_transaction_payments()
	{
		$this->db->where('payment_id !=', null);
		$this->db->where('registered_brgy_id', $this->session->registered_brgy_id);
		$result = $this->db->get($this->table);
		return $result;
	}

}