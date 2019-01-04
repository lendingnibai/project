<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brgy_earnings_model extends CI_Model {

	private $table = 'brgy_earnings';

	public function insert_brgy_earnings($earnings_data)
	{
		$this->db->insert($this->table, $earnings_data);
		$result = $this->db->insert_id();
		return $result;
	}
}