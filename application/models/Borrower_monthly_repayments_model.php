<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrower_monthly_repayments_model extends CI_Model {

	private $table = 'borrower_monthly_repayments';

	public function insert_monthly_repayments($monthly_repayments_data)
	{
		$result = $this->db->insert_batch($this->table, $monthly_repayments_data);
		return $result;
	}

	public function update_batch_bmr($bmr_data_arr)
	{
		$this->db->update_batch($this->table, $bmr_data_arr, 'borrower_monthly_repayment_id');
	}

	public function get_my_monthly_repayments($loan_repayment_data)
	{
		$result = $this->db->get_where($this->table,$loan_repayment_data);
		return $result;
	}
	//outstanding_repayment
	public function my_monthly_repayment_group_by($borrower_id, $month_of, $year_of)
	{
		$query = "
		SELECT *, (sum(monthly_repayment) + sum(penalty)) - (sum(amount_paid) + sum(penalty_paid)) as outstanding_repayment 
		FROM borrower_monthly_repayments
		WHERE borrower_id = $borrower_id
		AND is_fully_paid = 0
		AND MONTH(due_date) = $month_of
		AND YEAR(due_date) = $year_of
		GROUP BY reference_code";
		$result = $this->db->query($query);
		return $result;
	}

	public function update_monthly_repayment($repayment_data, $borrower_monthly_repayment_id)
	{
		$this->db->where('borrower_monthly_repayment_id', $borrower_monthly_repayment_id);
		$result = $this->db->update($this->table, $repayment_data);
		return $result;
	}

	//CHECK THE DUE DATE OF MONTHLY REPAYMENT KUNG NALAPAS NA MAG BUTANG UG PENALTY
	public function check_monthly_repayment_due_date()
	{
		$query = "
			SELECT bmr.borrower_monthly_repayment_id, bmr.registered_brgy_id, bmr.loan_id, bmr.borrower_id, bmr.loan_application_id, bmr.monthly_repayment, bmr.amount_paid, bmr.due_date, la.email, la.mobile_no, bmr.reference_code, TIMESTAMPDIFF(DAY, CURDATE(), bmr.due_date) AS 'remaining_days'
			FROM borrower_monthly_repayments AS bmr
			INNER JOIN loan_applications AS la 
			ON bmr.loan_application_id = la.loan_application_id
			WHERE bmr.status = 1
			AND TIMESTAMPDIFF(DAY,CURDATE(),bmr.due_date) < 0 /*due date*/
			AND bmr.is_fully_paid = 0
			AND bmr.penalty = 0
			AND bmr.is_passed_due_date = 0";
		$result = $this->db->query($query);
		return $result;
		// AND bmr.registered_brgy_id = ".$this->session->registered_brgy_id."
	}

	//NOTIFY THE BORROWER FOR THE DUE DATE OF HIS/HER MONTHLY REPAYMENT
	public function notify_borrower_monthly_repayment_due_date()
	{
		$query = "
		SELECT bmr.borrower_monthly_repayment_id, bmr.registered_brgy_id, bmr.monthly_repayment, bmr.amount_paid, bmr.due_date, la.email, la.mobile_no, bmr.reference_code, TIMESTAMPDIFF(DAY, CURDATE(), bmr.due_date) AS 'remaining_days'
		FROM borrower_monthly_repayments AS bmr
		INNER JOIN loan_applications AS la 
		ON bmr.loan_application_id = la.loan_application_id
		WHERE bmr.status = 1
		AND TIMESTAMPDIFF(DAY,CURDATE(),bmr.due_date) IN (0,1,2,3,4,5,6,7)
		AND bmr.is_fully_paid = 0
		AND bmr.is_notified = 0";
		$result = $this->db->query($query);
		return $result;
		// AND bmr.registered_brgy_id = ".$this->session->registered_brgy_id."
	}

	// CHECK THE TOTAL LOAN EARNINGS EVERY QUARTER
	public function check_quarterly_earnings($date_quarter, $registered_brgy_id)
	{
		$query = "
		SELECT ((SUM(amount_paid) - SUM(monthly_loan_repayment) + SUM(penalty_paid)) - SUM(rebate)) AS loan_earnings, TIMESTAMPDIFF(DAY,CURDATE(),'$date_quarter') AS end_quarter
		FROM borrower_monthly_repayments
		WHERE amount_paid > monthly_loan_repayment
		AND is_commission_counted = 0
		AND registered_brgy_id = $registered_brgy_id
		AND TIMESTAMPDIFF(DAY,CURDATE(),'$date_quarter') < 1";
		$result = $this->db->query($query);
		return $result;
	}

	public function check_quarterly_to_be_collected($date_quarter, $registered_brgy_id)
	{
		$query = "
		SELECT borrower_monthly_repayment_id
		FROM borrower_monthly_repayments
		WHERE amount_paid > monthly_loan_repayment
		AND is_commission_counted = 0
		AND registered_brgy_id = $registered_brgy_id
		AND TIMESTAMPDIFF(DAY,CURDATE(),'$date_quarter') < 1";
		$result = $this->db->query($query);
		return $result;
	}
	//BRGY MOS EARNINGS KUNG GANAHAN KAG ACCURATE I CONDITION ANG IS_FULLY_PAID  = 1
	public function monthly_earnings($registered_brgy_id)
	{
		$query = "
		SELECT registered_brgy_id, ((SUM(amount_paid) - SUM(monthly_loan_repayment) + SUM(penalty_paid)) - SUM(rebate)) AS monthly_earnings, 
		CONCAT(DATE_FORMAT(date_updated, '%M'),',',YEAR(date_updated)) AS 'date'
		FROM borrower_monthly_repayments
		WHERE registered_brgy_id = $registered_brgy_id
		AND amount_paid > monthly_loan_repayment
		GROUP BY CONCAT(DATE_FORMAT(date_updated, '%M'),',',YEAR(date_updated))
		ORDER BY date_updated";
		$result = $this->db->query($query);
		return $result;
	}

	public function all_monthly_earnings()
	{
		$query = "
		SELECT registered_brgy_id, ((SUM(amount_paid) - SUM(monthly_loan_repayment) + SUM(penalty_paid)) - SUM(rebate)) AS monthly_earnings, 
		CONCAT(DATE_FORMAT(date_updated, '%M'),',',YEAR(date_updated)) AS 'date'
		FROM borrower_monthly_repayments
		WHERE amount_paid > monthly_loan_repayment
		GROUP BY CONCAT(DATE_FORMAT(date_updated, '%M'),',',YEAR(date_updated))
		ORDER BY date_updated";
		$result = $this->db->query($query);
		return $result;
	}
	//FOR DASHBOARD DISPLAY
	public function borrower_savings($borrower_id)
	{
		$query = "
		SELECT loans.borrower_id, loans.loan_id, loans.loan_amount, loans.reference_code,  IF( ISNULL( SUM( rebate ) ),0,SUM(rebate)) AS savings, loans.status, loans.date_updated
		FROM borrower_monthly_repayments AS bmr
		INNER JOIN loans
		ON bmr.loan_id = loans.loan_id
		WHERE loans.status = 2
		AND is_rebate_withdrawn = 0
		AND loans.borrower_id = $borrower_id";
		$result = $this->db->query($query);
		return $result;
	}

	//FOR LISTING DISPLAY
	public function borrower_savings_list($borrower_id)
	{
		$query = "
		SELECT loans.borrower_id, loans.loan_id, loans.loan_amount, loans.reference_code,  IF( ISNULL( SUM( rebate ) ),0,SUM(rebate)) AS savings, loans.status, loans.date_updated, loans.is_rebate_withdrawn, loans.rebate_to_withdrawn
		FROM borrower_monthly_repayments AS bmr
		INNER JOIN loans
		ON bmr.loan_id = loans.loan_id
		WHERE loans.borrower_id = $borrower_id";
		$result = $this->db->query($query);
		return $result;
	}

}