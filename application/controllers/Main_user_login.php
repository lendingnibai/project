<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_user_login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->out_session();
		$this->load->model('User_accounts_model', 'uam');
		$this->load->model('Borrower_model', 'bm');
		$this->load->model('Lender_model', 'lender_m');
	}

	public function __do_trapping_credentials($email_username, $password)
	{

		if (!$password && !$email_username) 
		{
			return 'Please enter your login credentials';
		}
		elseif (!$email_username) 
		{
			return 'Please enter your email or username';
		}
		elseif (!$password) 
		{
			return 'Please enter your password';
		}

	}

	public function __check_credentials_user_account($email_username, $password)
	{	
		return $this->uam->check_credentials_user_account($email_username, md5($password));
	}

	public function login()
	{
		
		$code_number = 0;
		$email_username = $this->input->post('email_username');
		$password = $this->input->post('password');
		$trapping_message = $this->__do_trapping_credentials($email_username, $password);

		//if do trapping return something its mean there's blank field/s
		if($trapping_message)
		{
			$this->output->set_output(json_encode(
				array('message' => $trapping_message, 'code' => $code_number)
			));
		}
		else
		{
			$user_account_credentials =  $this->__check_credentials_user_account($email_username, $password);

			if ($user_account_credentials->num_rows() > 0) 
			{
				//user exist
				$code_number = 1;

				foreach ($user_account_credentials->result() as $row) 
				{
					$this->session->user_account_id = $row->user_account_id;
					$this->session->registered_brgy_id = $row->registered_brgy_id;//null kung wala na registered sa brgy
					$this->session->email = $row->email;
					$this->session->username = $row->username;
					$this->session->user_type = $row->user_type;
					$this->session->is_borrower = $row->is_borrower;// value 1 or 0
					$this->session->is_lender = $row->is_lender;// value 1 or 0
					$this->session->is_verified = $row->is_verified;// value 1 or 0
				}


				if ($this->session->is_borrower == 1)
				{
					$user_type_b_or_l = 'borrower';
					foreach ($this->bm->get_borrower($this->session->user_account_id)->result() as $row) 
					{
						$this->session->borrower_id = $row->borrower_id;
					}
				}
				else
				{
					$user_type_b_or_l = 'lender';
					foreach ($this->lender_m->get_lender($this->session->user_account_id)->result() as $row) 
					{
						$this->session->lender_id = $row->lender_id;
					}
				}

				$log_data = array(
					'action' => 'Logged in',
					'user_agent' => $this->user_agent(),
					'platform' => $this->platform(),
					'user_account_id' => $this->session->user_account_id,
					'user_type' => $this->session->user_type.' as ('.$user_type_b_or_l.')'
					);
				$this->lm->log($log_data);

				$this->output->set_output(json_encode(
					array('message' => 'Logged in. Redirecting...', 'code' => $code_number, 'main_user_type' => $this->session->is_borrower)
				));

			}
			else
			{
				$this->output->set_output(json_encode(
					array('message' => 'Invalid credentials.', 'code' => $code_number)
				));
			}
			
		}
		
	}

}