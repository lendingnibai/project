<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangay_logout extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->brgy_session();
	}


	public function index($account_id_md5 = '')
	{
		if ($this->session->has_userdata('brgy_staff_account_id')) 
		{
			if ($account_id_md5 == md5($this->session->brgy_account_id)) //check if the singout link is set
			{
				$log_data = array(
					'action' => 'Logged out',
					'user_agent' => $this->user_agent(),
					'platform' => $this->platform(),
					'brgy_staff_account_id' => $this->session->brgy_staff_account_id,
					'user_type' => $this->session->user_type
					);
				$this->lm->log($log_data);

				session_destroy();
				session_start();
				$this->session->logout = 'set';//for js indicator
				
				header("location: ".base_url('barangay_login?timeout?').date('Ymdhis?').md5(1).md5(2).md5(3));
			}
		}
		elseif ($account_id_md5 == md5($this->session->brgy_account_id)) //check if the singout link is set
		{
			$log_data = array(
				'action' => 'Logged out',
				'user_agent' => $this->user_agent(),
				'platform' => $this->platform(),
				'brgy_account_id' => $this->session->brgy_account_id,
				'user_type' => $this->session->user_type
				);
			$this->lm->log($log_data);

			session_destroy();
			session_start();
			$this->session->logout = 'set';//for js indicator
			
			header("location: ".base_url('barangay_login?timeout?').date('Ymdhis?').md5(1).md5(2).md5(3));
		}
		else
		{
			show_404();
			die();
		}
		
	}

}
