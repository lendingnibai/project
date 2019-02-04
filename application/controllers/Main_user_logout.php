<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_user_logout extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}


	public function index($account_id_md5 = '')
	{

		if ($account_id_md5 == md5($this->session->user_account_id)) //check if the singout link is press
		{
			if ($this->session->is_borrower == 1) 
				$user_type_b_or_l = 'borrower';
			else
				$user_type_b_or_l = 'lender';
			
			$log_data = array(
				'action' => 'Logged out',
				'user_agent' => $this->user_agent(),
				'platform' => $this->platform(),
				'user_account_id' => $this->session->user_account_id,
				'user_type' => $this->session->user_type.' as ('.$user_type_b_or_l.')'
				);
			$this->lm->log($log_data);

			session_destroy();

			header("location: ".base_url('homepage?timeout?').date('Ymdhis?').md5(1).md5(2).md5(3));
		}
		else
		{
			show_404();
			die();
		}
		
	}

}
