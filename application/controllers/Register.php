<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Registered_brgy_model', 'rbm');
		$this->load->model('User_details_model', 'udm');
		$this->load->model('Super_admin_model', 'sam');
		$this->load->model('Brgy_accounts_model', 'bam');
		$this->load->model('Brgy_staff_accounts_model', 'bsam');
		$this->load->model('User_accounts_model', 'uam');
		$this->load->model('Borrower_model', 'bm');
		$this->load->model('Lender_model', 'lender_m');
	}

	public function __check_email($email)
	{
		$email_checker = 0;

		$email_data = array(
			'email' => $email
		);

		if ($this->sam->check_email($email_data)->num_rows() > 0) 
		{
			$email_checker = 1;//email alread exist
		}
		elseif ($this->bam->check_email($email_data)->num_rows() > 0) 
		{
			$email_checker = 1;//email alread exist
		}
		elseif ($this->bsam->check_email($email_data)->num_rows() > 0) 
		{
			$email_checker = 1;//email alread exist
		}
		elseif ($this->uam->check_email($email_data)->num_rows() > 0) 
		{
			$email_checker = 1;//email alread exist
		}
		return $email_checker;
	}

	public function __check_username($username)
	{
		$username_checker = 0;
		$username_data = array(
			'username' => $username
		);

		if ($this->sam->check_username($username_data)->num_rows() > 0) 
		{
			$username_checker = 1;//email alread exist
		}
		elseif ($this->bam->check_username($username_data)->num_rows() > 0) 
		{
			$username_checker = 1;//email alread exist
		}
		elseif ($this->bsam->check_username($username_data)->num_rows() > 0) 
		{
			$username_checker = 1;//email alread exist
		}
		elseif ($this->uam->check_username($username_data)->num_rows() > 0) 
		{
			$username_checker = 1;//email alread exist
		}
		return $username_checker;
	}

	public function __do_trapping_reg_user($main_user_type, $barangay_id, $other_brgy, $username, $email, $password, $cpassword)
	{

		if (!$main_user_type && !$barangay_id && !$other_brgy && !$username && !$email && !$password && $cpassword) {
			return 'Please fill all the required fieds';
		}
		elseif (!$main_user_type) {
			return 'Oppss something went wrong!';
		}
		elseif (!$barangay_id && !$other_brgy) {
			return 'Please select brgy.';
		}
		elseif (!$username) {
			return 'Please input username';
		}
		elseif (!$email) {
			return 'Please input email address';
		}
		elseif (!$password) {
			return 'Please input password';
		}
		elseif (!$cpassword) {
			return 'Please input confirm password';
		}
		elseif ($password != $cpassword) {
			return 'Password did not match';
		}
		elseif ($this->__check_username($username) > 0) {
			return 'Username already exist';
		}
		elseif ($this->__check_email($email) > 0) {
			return 'Email address already exist';
		}

	}

	public function register_account()
	{
		if ($this->session->has_userdata('user_type')) 
		{
			show_404();
			die();
		}
		//don't forget to set a session here
		$code_number = 0;

		$main_user_type = $this->input->post('main_user_type');//icheck ang user kung borrower or lender ba siya during registration 1 kay borrower 2 kai lender
		$barangay_id = $this->input->post('barangay');
		$other_brgy = $this->input->post('other_brgy');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$cpassword = $this->input->post('cpassword');

		$is_borrower = 0;
		$is_lender = 0;
		$user_type_b_or_l = '';
		$registered_brgy_id = null;
		$city = '';
		$state_prov = '';
		$zip_code = '';

		if ($main_user_type == 1)
			$is_borrower = 1;
		else
			$is_lender = 1;

		if ($is_borrower == 1) 
			$user_type_b_or_l = 'borrower';
		else
			$user_type_b_or_l = 'lender';

		$trapping_message = $this->__do_trapping_reg_user($main_user_type, $barangay_id, $other_brgy, $username, $email, $password, $cpassword);

		if ($trapping_message) 
		{
			$this->output->set_output(json_encode(
				array('message' => $trapping_message, 'code' => $code_number)
			));
		}
		else
		{
			if (!$other_brgy)
			{
				$barangay_id = $this->secret_id_md5($barangay_id);
				foreach ($this->rbm->get_this_registered_brgy($barangay_id)->result() as $row) 
				{
					$registered_brgy_id = $row->registered_brgy_id;
					$city = $row->city;
					$state_prov = $row->state_prov;
					$zip_code = $row->zip_code;
					$name_of_brgy = $row->barangay;
				}
				
			}

			$user_account_data = array(
				'registered_brgy_id' => $registered_brgy_id,
				'email' => $email,
				'username' => $username,
				'password' => md5($password),
				'is_borrower' => $is_borrower,
				'is_lender' => $is_lender
			);

			$insert_user_account = $this->uam->insert_user_account($user_account_data);//data last id ang i return

			$from_brgy = '';//asign later for the brgy

			if ($insert_user_account > 0) 
			{
				$code_number = 1;

				if ($main_user_type == 1)//insert to borrower
				{
					$borrower_data = array(
						'user_account_id' => $insert_user_account,
					);
					$insert_borrower = $this->bm->insert_borrower($borrower_data);
					$this->session->borrower_id = $insert_borrower;
				}
				else//insert to lender account
				{
					$lender_data = array(
						'user_account_id' => $insert_user_account,
					);
					$insert_lender = $this->lender_m->insert_lender($lender_data);
					$this->session->lender_id = $insert_lender;
				}

				if ($other_brgy) 
				{
					$user_details_data = array(
						'user_account_id' => $insert_user_account,
						'barangay' => $other_brgy
					);
					$from_brgy = $other_brgy;
				}
				else
				{
					$user_details_data = array(
						'user_account_id' => $insert_user_account,
						'barangay' => $name_of_brgy,
						'state_prov' => $state_prov,
						'city' => $city,
						'zip_code' => $zip_code
					);
					$from_brgy = $name_of_brgy;
				}

				$insert_user_details = $this->udm->insert_user_details($user_details_data);

				$this->session->user_account_id = $insert_user_account;//user id
				$this->session->registered_brgy_id = $registered_brgy_id;
				$this->session->email = $email;
				$this->session->username = $username;
				$this->session->user_type = 'main_user';
				$this->session->is_borrower = $is_borrower;// value 1 or 0
				$this->session->is_lender = $is_lender;// value 1 or 0

				$log_data = array(
					'action' => 'New user registered from brgy. '.$from_brgy,
					'user_agent' => $this->user_agent(),
					'platform' => $this->platform(),
					'user_account_id' => $insert_user_account,
					'user_type' => 'main_user as ('.$user_type_b_or_l.')'//user_type_b_or_l value lender or borrower
				);

				$this->lm->log($log_data);

				$this->output->set_output(json_encode(
						array('message' => 'Your account was successfully registered.', 'code' => $code_number, 'main_user_type' => $is_borrower)
				));
			}
		}
	}
}
