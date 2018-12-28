<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Investments_model extends CI_Model {

	private $table = 'investments';

	public function add_investment($investment_data)
	{
		$this->db->insert($this->table, $investment_data);
		$result = $this->db->insert_id();
		return $result;
	}

	public function check_total_invest($lender_id)
	{
		$query = "SELECT SUM(invest_amount) AS total_invest FROM investments WHERE `lender_id` = $lender_id AND `status` = 1";
		$result = $this->db->query($query);
		return $result;
	}

	public function my_investment($lender_id)
	{
		$result = $this->db->get_where($this->table, array('lender_id' => $lender_id, 'status' => 1));
		return $result;
	}

	public function check_investment_end_term()
	{
		$query = "
				SELECT i.investment_id, i.registered_brgy_id, i.lender_id, i.investment_application_id, i.invest_amount, ia.email, ia.mobile_no, i.reference_code, TIMESTAMPDIFF(DAY, CURDATE(), i.end_term) AS 'remaining_days_term'
				FROM investments AS i
				INNER JOIN investment_applications AS ia ON i.investment_application_id = ia.investment_application_id
				WHERE i.status = 1
				AND i.is_ended = 0
				AND TIMESTAMPDIFF(DAY,CURDATE(),i.end_term) < 1";
		$result = $this->db->query($query);
		return $result;
		//AND i.registered_brgy_id = ".$this->session->registered_brgy_id."
	}

	public function update_investment($investment_data, $investment_id)
	{
		$this->db->where('investment_id', $investment_id);
		$result = $this->db->update($this->table, $investment_data);
		return $result;
	}

	public function get_lender_investments_limit($lender_id)
	{
		$this->db->order_by('investment_id', 'DESC');
		$result = $this->db->get_where($this->table, array('lender_id' => $lender_id), 5, 0);
		return $result;
	}

	public function get_my_investments($lender_id)
	{
		$this->db->order_by('investment_id', 'DESC');
		$result = $this->db->get_where($this->table, array('lender_id' => $lender_id));
		return $result;
	}

	public function get_this_investment($investment_data)
	{
		$result = $this->db->get_where($this->table, $investment_data);
		return $result;
	}

	public function available_co_maker($registered_brgy_id)
	{
		$query = "
			SELECT i.lender_id, ia.full_name AS co_maker, SUM(i.invest_amount) AS total_invest, uds.photo
			FROM investments AS i
			INNER JOIN investment_applications AS ia ON i.investment_application_id = ia.investment_application_id
			INNER JOIN lender AS l ON l.lender_id = ia.lender_id
			INNER JOIN user_details AS uds ON l.user_account_id = uds.user_account_id
			WHERE i.status = 1 AND i.registered_brgy_id = $registered_brgy_id
			GROUP BY i.lender_id";
		$result = $this->db->query($query);
		return $result;
	}
}