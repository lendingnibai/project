<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('Logs_model', 'lm'); already loaded in MY Cotroller
		$this->out_session();//located in MY_Controller
		$this->load->model('Super_admin_model', 'sam');
	}


	public function index()
	{
		
		$data['title'] = 'Login';
		$data['login_title'] = 'Super Admin';
		$data['method_login'] = 'admin_login';//for action form

		$this->load->view('templates/admin_header', $data);
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

	public function __check_credentials($email_username, $password)
	{	
		return $this->sam->check_credentials($email_username, md5($password));
	}

	public function login()
	{
		
		$code_number = 0;
		$email_username = $this->input->post('email_username');
		$password = $this->input->post('password');
		$trapping_message = $this->__do_trapping_credentials($email_username, $password);

		//if do trapping return something its mean there's something wrong
		if($trapping_message)
		{
			$this->output->set_output(json_encode(
				array('message' => $trapping_message, 'code' => $code_number)
			));
		}
		else
		{
			$credentials =  $this->__check_credentials($email_username, $password);

			if ($credentials->num_rows() > 0) 
			{
				//user exist
				$code_number = 1;

				foreach ($credentials->result() as $row) 
				{
					$this->session->super_admin_id = $row->super_admin_id;
					$this->session->email = $row->email;
					$this->session->username = $row->username;
					$this->session->user_type = $row->user_type;
				}

				$log_data = array(
					'action' => 'Logged in',
					'user_agent' => $this->user_agent(),
					'platform' => $this->platform(),
					'super_admin_id' => $this->session->super_admin_id,
					'user_type' => $this->session->user_type
					);

				$this->lm->log($log_data);

				$this->output->set_output(json_encode(
					array('message' => 'Logged in. Redirecting...', 'code' => $code_number, 'home' => 'admin')
				));

			}
			else
			{
				$this->output->set_output(json_encode(
					array('message' => 'Credentials.', 'code' => $code_number)
				));
			}
		}
		
	}
}
