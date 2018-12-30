<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loans_model extends CI_Model {

	private $table = 'loans';

	public function release_loan($loan_data)
	{
		$this->db->insert($this->table, $loan_data);
		$result = $this->db->insert_id();
		return $result;
	}

	public function check_total_loan($borrower_id)
	{
		$query = "SELECT SUM(loan_amount) AS total_loan FROM loans WHERE `borrower_id` = $borrower_id AND `status` = 1";
		$result = $this->db->query($query);
		return $result;
	}

	public function get_my_loans($borrower_id)
	{
		$this->db->order_by('loan_id', 'DESC');
		$result = $this->db->get_where($this->table, array('borrower_id' => $borrower_id));
		return $result;
	}

	public function get_this_loan($loan_data)
	{
		$result = $this->db->get_where($this->table, $loan_data);
		return $result;
	}

	public function get_this_loan_details($reference_code)
	{
		//for brgy admin
		$this->db->select('user_details.first_name, user_details.last_name, loans.*');
		$this->db->from($this->table);
		$this->db->where(array('loans.registered_brgy_id' => $this->session->registered_brgy_id, 'loans.reference_code' => $reference_code));
		$this->db->join('borrower', 'borrower.borrower_id = loans.borrower_id', 'inner');
		$this->db->join('user_details', 'user_details.user_account_id = borrower.user_account_id', 'inner');
		$result = $this->db->get();
		return $result;
	}

	public function update_loan($reference_code,$loan_data)
	{
		$this->db->where('reference_code', $reference_code);
		$result = $this->db->update($this->table, $loan_data);
		return $result;
	}

	public function check_loan_end_term()
	{
		$query = "
				SELECT l.status, l.loan_id, l.registered_brgy_id, l.borrower_id, l.loan_application_id, l.loan_amount, la.email, la.mobile_no, l.reference_code, TIMESTAMPDIFF(DAY, CURDATE(), l.end_term) AS 'remaining_days_term'
				FROM loans AS l
				INNER JOIN loan_applications AS la ON l.loan_application_id = la.loan_application_id
				WHERE l.is_ended = 0
				AND TIMESTAMPDIFF(DAY,CURDATE(),l.end_term) < 1";
		$result = $this->db->query($query);
		return $result;
		//AND l.registered_brgy_id = ".$this->session->registered_brgy_id."
	}

}
