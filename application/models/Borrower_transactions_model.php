<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrower_transactions_model extends CI_Model {

	private $table = 'borrower_transactions';

	public function insert_borrower_transaction($transaction_data)
	{
		//using: brgy
		$this->db->insert($this->table, $transaction_data);
		$result = $this->db->insert_id();
		return $result;
	}

	public function get_borrower_outstanding_current_balance($borrower_id)
	{
		$query = "SELECT SUM(debit) - SUM(credit) AS outstanding_balance FROM ".$this->table." WHERE `borrower_id` = $borrower_id";
		$result = $this->db->query($query);
		return $result;
	}
	//all transactions
	public function get_borrower_transactions($borrower_id)
	{
		$result = $this->db->get_where($this->table, array('borrower_id' => $borrower_id));
		return $result;
	}

	public function get_borrower_payments($borrower_id)
	{
		$result = $this->db->get_where($this->table, array('borrower_id' => $borrower_id, 'type_code' => 2));
		return $result;
	}

	public function get_borrower_loans($borrower_id)
	{
		$result = $this->db->get_where($this->table, array('borrower_id' => $borrower_id, 'type_code' => 1));
		return $result;
	}

	public function get_borrower_transactions_limit($borrower_id)
	{
		$this->db->order_by('borrower_transaction_id', 'DESC');
		$result = $this->db->get_where($this->table, array('borrower_id' => $borrower_id), 5, 0);
		return $result;
	}

}