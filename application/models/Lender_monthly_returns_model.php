<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lender_monthly_returns_model extends CI_Model {

	private $table = 'lender_monthly_returns';

	public function insert_monthly_returns($monthly_returns_data)
	{
		$result = $this->db->insert_batch($this->table, $monthly_returns_data);
		return $result;
	}

	//CHECK THE DUE DATE OF MONTHLY RETURN
	public function check_monthly_return_end_term()
	{
		$query = "
			SELECT lmr.lender_monthly_return_id, lmr.registered_brgy_id, lmr.investment_id, lmr.lender_id, lmr.investment_application_id, lmr.monthly_return, ia.email, ia.mobile_no, lmr.reference_code, TIMESTAMPDIFF(DAY, CURDATE(), lmr.date_return) AS 'remaining_days_term'
			FROM lender_monthly_returns AS lmr
			INNER JOIN investment_applications AS ia ON lmr.investment_application_id = ia.investment_application_id
			WHERE lmr.status = 1 AND TIMESTAMPDIFF(DAY,CURDATE(),lmr.date_return) < 1";
		$result = $this->db->query($query);
		return $result;
		// AND lmr.registered_brgy_id = ".$this->session->registered_brgy_id."
	}

	public function update_lender_monthly_return($lender_monthly_return_data, $lender_monthly_return_id)
	{
		$this->db->where('lender_monthly_return_id', $lender_monthly_return_id);
		$result = $this->db->update($this->table, $lender_monthly_return_data);
		return $result;
	}

	public function get_my_monthly_returns($investment_return_data)
	{
		$result = $this->db->get_where($this->table, $investment_return_data);
		return $result;
	}

	public function my_monthly_returns_group_by($lender_id, $month_of)
	{
		$query = "
		SELECT *
		FROM lender_monthly_returns
		WHERE lender_id = $lender_id
		AND is_returned = 0
		AND MONTH(date_return) = $month_of
		GROUP BY reference_code";
		$result = $this->db->query($query);
		return $result;
	}

	public function total_interest_earned($lender_id)
	{
		$query ="
		SELECT SUM(monthly_return) as interest_earned
		FROM lender_monthly_returns
		WHERE is_returned = 1
		AND lender_id = $lender_id";
		$result = $this->db->query($query);
		return $result;
	}
	
}