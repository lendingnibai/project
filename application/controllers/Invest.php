<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invest extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Registered_brgy_model', 'rbm');
		
	}

	public function index()
	{
		$data['invest'] = 'invest';
		$data['title'] = 'Invest | MangJuam';

		$data['registered_brgy'] = $this->rbm->registered_brgy();

		$this->load->view('templates/headerlandingpage.php', $data);
		$this->load->view('landing_page/invest');
		$this->load->view('templates/modalslandingpage');
		$this->load->view('templates/footerlandingpage');
	}
}
