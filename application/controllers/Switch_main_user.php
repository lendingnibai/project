<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Switch_main_user extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->main_user_session();
		$this->load->model('User_details_model', 'udm');
		$this->load->model('Borrower_model', 'bm');
		$this->load->model('Lender_model', 'lender_m');
		$this->load->model('User_accounts_model', 'uam');
	}

	public function __check_password($password)
	{
		$credentials_data = array(
			'password' => md5($password),
			'user_account_id' => $this->session->user_account_id,
		);
		return $this->uam->check_password($credentials_data)->num_rows();
	}

	public function __do_trapping($password)
	{
		if (!$password) 
		{
			return 'Please input your password';	
		}
	}

	public function switch_user()
	{
		$code_number = 0;
		$password = $this->input->post('password');

		$trapping_message = $this->__do_trapping($password);

		if ($trapping_message) 
		{
			$this->output->set_output(json_encode(
				array('message' => $trapping_message, 'code' => $code_number)
			));
		}
		elseif ($this->__check_password($password) < 1) 
		{
			$this->output->set_output(json_encode(
				array('message' => 'Incorrect password', 'code' => $code_number)
			));
		}
		else
		{
			
			if ($this->session->has_userdata('borrower_id')) 
			{
				//CHECK FIRST KUNG NAAY ONGOING NGA TRANSACTIONS
				//switch to lender
				//borrower status set to 0
				//check if naa nay lender then set status to 1 kung wala insert lender then set status to 1
				$user_account_data = array(
					'is_lender' => 1,
					'is_borrower' => 0
				);
				$this->uam->update_user_account($user_account_data);

				$deactivate_borrower = $this->bm->deactivate_borrower();//return true
				if ($deactivate_borrower > 0) 
				{
					$get_lender = $this->lender_m->get_lender($this->session->user_account_id);//check if there's already borrower
					if ($get_lender->num_rows() > 0) 
					{
						$activate_lender = $this->lender_m->activate_lender();//activate borrower
						foreach ($get_lender->result() as $row) 
						{
							$this->session->lender_id = $row->lender_id;
						}
					}
					else
					{
						$lender_data = array(
							'user_account_id' => $this->session->user_account_id
						);
						$insert_lender = $this->lender_m->insert_lender($lender_data);
						$this->session->lender_id = $insert_lender;
					}

				}

				$this->session->is_borrower = 0;
				$this->session->is_lender = 1;
				unset($_SESSION['borrower_id']);

				$log_data = array(
					'action' => 'Main user was switched from borrower to lender',
					'user_agent' => $this->user_agent(),
					'platform' => $this->platform(),
					'user_account_id' => $this->session->user_account_id,
					'user_type' => 'main_user as (lender)'//user_type_b_or_l value lender or borrower
				);

				$this->lm->log($log_data);

				$code_number = 1;

				$this->output->set_output(json_encode(
						array('message' => 'You have successfully switched to lender.', 'code' => $code_number, 'home' => 'lender')
				));

			}
			else
			{
				//CHECK FIRST KUNG NAAY ONGOING NGA TRANSACTIONS
				//switch to borrower
				//lender status set to 0
				//check if naa nay borrower then set status to 1 kung wala insert borrower then set status to 1
				$user_account_data = array(
					'is_lender' => 0,
					'is_borrower' => 1
				);
				$this->uam->update_user_account($user_account_data);

				$deactivate_lender = $this->lender_m->deactivate_lender();//return true 
				if ($deactivate_lender > 0) 
				{
					$get_borrower = $this->bm->get_borrower($this->session->user_account_id);//check if there's already borrower
					if ($get_borrower->num_rows() > 0) 
					{
						$activate_borrower = $this->bm->activate_borrower();//activate borrower
						foreach ($get_borrower->result() as $row) 
						{
							$this->session->borrower_id = $row->borrower_id;
						}
					}
					else
					{
						$borrower_data = array(
							'user_account_id' => $this->session->user_account_id
						);
						$insert_borrower = $this->bm->insert_borrower($borrower_data);
						$this->session->borrower_id = $insert_borrower;
					}

				}

				$this->session->is_borrower = 1;
				$this->session->is_lender = 0;
				unset($_SESSION['lender_id']);

				$log_data = array(
					'action' => 'Main user was switched from lender to borrower',
					'user_agent' => $this->user_agent(),
					'platform' => $this->platform(),
					'user_account_id' => $this->session->user_account_id,
					'user_type' => 'main_user as (borrower)'//user_type_b_or_l value lender or borrower
				);

				$this->lm->log($log_data);

				$code_number = 1;

				$this->output->set_output(json_encode(
						array('message' => 'You have successfully switched to borrower.', 'code' => $code_number, 'home' => 'borrower')
				));

			}

		}
		
	}

}