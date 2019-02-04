<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangay_login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('Logs_model', 'lm'); already loaded in MY Cotroller
		$this->out_session();//located in MY_Controller
		$this->load->model('Brgy_accounts_model', 'bam');
		$this->load->model('Brgy_staff_accounts_model', 'bsam');
	}


	public function index()
	{
		$data['title'] = 'Login';
		$data['login_title'] = 'Barangay';
		$data['method_login'] = 'barangay_login';//for action form

		$this->load->view('templates/barangay_header', $data);
		$this->load->view('common/common_login');
		//$this->load->view('templates/footer');
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

	public function __check_credentials_brgy_admin($email_username, $password)
	{	
		return $this->bam->check_credentials_brgy_admin($email_username, md5($password));
	}

	public function __check_credentials_brgy_staff($email_username, $password)
	{	
		return $this->bsam->check_credentials_brgy_staff($email_username, md5($password));
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
			$brgy_admin_credentials =  $this->__check_credentials_brgy_admin($email_username, $password);

			$brgy_staff_credentials =  $this->__check_credentials_brgy_staff($email_username, $password);
			
			if ($brgy_admin_credentials->num_rows() > 0) 
			{
				//user exist
				$code_number = 1;

				foreach ($brgy_admin_credentials->result() as $row) 
				{
					$this->session->brgy_account_id = $row->brgy_account_id;
					//$this->session->brgy_staff_account_id = null;//para mahibaw.an kinsa ang nag online
					$this->session->registered_brgy_id = $row->registered_brgy_id;
					$this->session->email = $row->email;
					$this->session->username = $row->username;
					$this->session->user_type = $row->user_type;
				}

				$log_data = array(
					'action' => 'Logged in',
					'user_agent' => $this->user_agent(),
					'platform' => $this->platform(),
					'brgy_account_id' => $this->session->brgy_account_id,
					'user_type' => $this->session->user_type
					);

				$this->lm->log($log_data);

				$this->output->set_output(json_encode(
					array('message' => 'Logged in. Redirecting...', 'code' => $code_number, 'home' => 'barangay')
				));

			}
			elseif ($brgy_staff_credentials->num_rows() > 0) 
			{
				//user exist
				$code_number = 1;

				foreach ($brgy_staff_credentials->result() as $row) 
				{
					$this->session->brgy_account_id = $row->brgy_account_id;
					$this->session->brgy_staff_account_id = $row->brgy_staff_account_id;
					$this->session->registered_brgy_id = $row->registered_brgy_id;
					$this->session->email = $row->email;
					$this->session->username = $row->username;
					$this->session->user_type = $row->user_type;
				}

				$log_data = array(
					'action' => 'Logged in',
					'user_agent' => $this->user_agent(),
					'platform' => $this->platform(),
					'brgy_staff_account_id' => $this->session->brgy_staff_account_id,
					'user_type' => $this->session->user_type
					);

				$this->lm->log($log_data);

				$this->output->set_output(json_encode(
					array('message' => 'Logged in. Redirecting...', 'code' => $code_number, 'home' => 'barangay')
				));
			}
			else
			{

				$this->output->set_output(json_encode(
					array('message' => 'Invalid redentials.', 'code' => $code_number)
				));
				
			}

		}
		
	}

}
