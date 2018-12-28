<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Googlemap extends CI_Controller {

	public function index()
	{
		//check if incomplete then pass to incomplete method
		$data['title'] = 'Admin Dashboard | MangJuam';
		$this->load->view('templates/header.php', $data);
		//$this->load->view('templates/borrowernav');
		//$this->load->view('admin/admin_dashboard');
		$this->load->view('googlemap');
		//$this->load->view('templates/admin_footer');
	}
}