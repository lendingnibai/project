<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments_model extends CI_Model {

	private $table = 'payments';

	public function insert_payment($payment_data)
	{
		//using: brgy
		$this->db->insert($this->table, $payment_data);
		$result = $this->db->insert_id();
		return $result;
	}
	
	//MAG BUTANG RA TA ANI KUNG MAG ADD TAG PAYMENT FOR REQUEST
	// public function lender_request_withdrawals($request_data)
	// {
	// 	$result = $this->db->get_where($this->table, $request_data);
	// 	return $result;
	// }

	// public function update_payment($payment_data, $payment_id)
	// {
	// 	$this->db->where('payment_id', $payment_id);
	// 	$result = $this->db->update($this->table, $payment_data);
	// 	return $result;
	// }
}