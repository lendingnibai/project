<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Default_model extends CI_Model {

	private $table = 'default';

	public function get_all_default_val()
	{
		$result = $this->db->get($this->table);
		return $result;
	}
}