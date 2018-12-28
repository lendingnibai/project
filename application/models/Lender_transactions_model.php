<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lender_transactions_model extends CI_Model {

	private $table = 'lender_transactions';

	public function insert_lender_transaction($transaction_data)
	{
		//using: brgy
		$this->db->insert($this->table, $transaction_data);
		$result = $this->db->insert_id();
		return $result;
	}

	public function get_lender_current_balance($lender_id)
	{
		$query = "SELECT SUM(credit) - SUM(debit) AS current_balance FROM ".$this->table." WHERE `lender_id` = $lender_id";
		$result = $this->db->query($query);
		return $result;
	}

	public function get_available_balance_from_many_brgy($lender_id)
	{
		$query = "
		SELECT SUM(lender_transactions.credit) - SUM(lender_transactions.debit) AS current_balance,
		registered_brgy.barangay, registered_brgy.registered_brgy_id
		FROM lender_transactions
		INNER JOIN registered_brgy ON lender_transactions.from_brgy_id = registered_brgy.registered_brgy_id
		WHERE lender_transactions.lender_id = '$lender_id'
		GROUP BY lender_transactions.from_brgy_id";
		$result = $this->db->query($query);
		return $result;
	}

	public function get_available_balance_from_this_brgy($lender_id, $registered_brgy_id)
	{
		$query = "
		SELECT SUM(lender_transactions.credit) - SUM(lender_transactions.debit) AS current_balance,
		registered_brgy.barangay, registered_brgy.registered_brgy_id
		FROM lender_transactions
		INNER JOIN registered_brgy ON lender_transactions.from_brgy_id = registered_brgy.registered_brgy_id
		WHERE lender_transactions.lender_id = '$lender_id' AND lender_transactions.from_brgy_id = '$registered_brgy_id'
		GROUP BY lender_transactions.from_brgy_id";
		$result = $this->db->query($query);
		return $result;
	}

	//all transactions
	public function get_lender_transactions($lender_id)
	{
		$result = $this->db->get_where($this->table, array('lender_id' => $lender_id));
		return $result;
	}

	public function get_lender_transactions_limit($lender_id)
	{
		$this->db->order_by('lender_transaction_id', 'DESC');
		$result = $this->db->get_where($this->table, array('lender_id' => $lender_id), 5, 0);
		return $result;
	}

	public function get_lender_withdrawals($lender_id)
	{
		$result = $this->db->get_where($this->table, array('lender_id' => $lender_id, 'type_code' => 3));
		return $result;
	}

	public function get_lender_monthly_returned($lender_id)
	{
		$result = $this->db->get_where($this->table, array('lender_id' => $lender_id, 'type_code' => 2));
		return $result;
	}

	public function get_lender_investment_returned($lender_id)
	{
		$result = $this->db->get_where($this->table, array('lender_id' => $lender_id, 'type_code' => 1));
		return $result;
	}
	
}