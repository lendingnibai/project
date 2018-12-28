<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_logout extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->admin_session();//located in MY_Controller
		// $this->load->library('user_agent');//located in MY_Controller
		// $this->load->model('Logs_model', 'lm');//located in MY_Controller
	}


	public function index($account_id_md5 = '')
	{
		
		if ($account_id_md5 == md5($this->session->super_admin_id)) //check if the singout link is press
		{
			$log_data = array(
				'action' => 'Logged out',
				'user_agent' => $this->user_agent(),
				'platform' => $this->platform(),
				'super_admin_id' => $this->session->super_admin_id,
				'user_type' => $this->session->user_type
				);

			$this->lm->log($log_data);

			session_destroy();
			session_start();
			$this->session->logout = 'set';//for js indicator
			
			header("location: ".base_url('admin_login?timeout?').date('Ymdhis?').md5(1).md5(2).md5(3));
		}
		else
		{
			show_404();
		}
		
	}

}
