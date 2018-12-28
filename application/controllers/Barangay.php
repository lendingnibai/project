<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangay extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->brgy_session();//LOCATED IN MY_Controller
		$this->load->model('Super_admin_model', 'sam');
		$this->load->model('Brgy_accounts_model', 'bam');
		$this->load->model('Brgy_staff_accounts_model', 'bsam');
		$this->load->model('User_accounts_model', 'uam');
		$this->load->model('User_details_model', 'udm');
		$this->load->model('Registered_brgy_model', 'rbm');
		$this->load->model('Brgy_user_details_model', 'budm');
		$this->load->model('Investment_applications_model', 'iam');
		$this->load->model('Investment_requirements_model', 'irm');
		$this->load->model('Investments_model', 'im');
		$this->load->model('Lender_monthly_returns_model', 'lmrm');
		$this->load->model('Borrower_monthly_repayments_model', 'bmrm');
		$this->load->model('Loan_applications_model', 'lam');
		$this->load->model('Loan_requirements_model', 'lrm');
		$this->load->model('Loans_model', 'loan');
		$this->load->model('Withdrawals_model', 'wm');
		$this->load->model('Payments_model', 'pm');
		$this->load->model('Member_requests_model', 'mrm');
		$this->load->model('Borrower_transactions_model', 'btm');
		//DEFAULT SETTINGS
		$this->load->model('Default_model', 'dm');
		$this->load->model('Yearly_term_lender_model', 'ytlm');
		$this->load->model('Monthly_term_borrower_model', 'mtbm');
		$this->load->model('Min_max_loan_invest_model', 'mmlim');
		$this->load->model('Loan_interest_rate_model', 'lirm');
		$this->load->model('Invest_interest_rate_model', 'iirm');
		$this->load->model('Rebate_penalty_rate_model', 'rprm');
	}

	public function __check_credentials_brgy_admin($email_username, $password)
	{	
		return $this->bam->check_credentials_brgy_admin($email_username, md5($password));
	}

	public function __check_credentials_brgy_staff($email_username, $password)
	{	
		return $this->bsam->check_credentials_brgy_staff($email_username, md5($password));
	}

	public function __check_email($email)
	{
		$email_checker = 0;

		$email_data = array(
			'email' => $email
		);

		if ($this->sam->check_email($email_data)->num_rows() > 0) 
		{
			$email_checker = 1;//EMAIL ALREADY EXIST
		}
		elseif ($this->bam->check_email($email_data)->num_rows() > 0) 
		{
			$email_checker = 1;//EMAIL ALREADY EXIST
		}
		elseif ($this->bsam->check_email($email_data)->num_rows() > 0) 
		{
			$email_checker = 1;//EMAIL ALREADY EXIST
		}
		elseif ($this->uam->check_email($email_data)->num_rows() > 0) 
		{
			$email_checker = 1;//EMAIL ALREADY EXIST
		}
		return $email_checker;
	}

	//DO TRAPPING FOR ADDING BRGY STAFF
	public function __do_trapping_add_brgy_staff($first_name, $last_name, $email, $mobile_no, $position)
	{
		if (!$first_name && !$last_name && !$email && !$mobile_no && !$position) {
			return 'Please fill all the required fields';
		}
		elseif (!$first_name) {
			return 'Please input first name';
		}
		elseif (!$last_name) {
			return 'Please input last name';
		}
		elseif (!$email) {
			return 'Please input emaill address';
		}
		elseif (!valid_email($email))
		{
			return 'Invalid email address';
		}
		elseif (!$mobile_no) {
			return 'Please input client mobile no.';
		}
		elseif (!$position) {
			return 'Please input barangay';
		}
		elseif ($this->__check_email($email) > 0) {
			return 'Email address already exist';
		}
	}

	//GET THE FULL DETAILS OF THE BRGY ADMIN
	public function __get_this_brgy_admin_details()
	{
		$get_this_brgy_admin_details = $this->bam->get_this_brgy_admin_details();
		if ($get_this_brgy_admin_details->num_rows() > 0) 
		{
			foreach ($get_this_brgy_admin_details->result() as $row) 
			{
				$data['first_name'] = $row->first_name;
				$data['middle_name'] = $row->middle_name;
				$data['last_name'] = $row->last_name;
				$data['position'] = $row->position;
				$data['gender'] = $row->gender;
				$data['dob'] = $row->dob;
				$data['civil_status'] = $row->civil_status;
				$data['spouse_name'] = $row->spouse_name;
				$data['profile'] = $row->photo;
				$data['mobile_no'] = $row->mobile_no;
				$data['tel_no'] = $row->tel_no;
				$data['street'] = $row->street;
				$data['barangay'] = $row->barangay;
				$data['city'] = $row->city;
				$data['state_prov'] = $row->state_prov;
				$data['zip_code'] = $row->zip_code;
				$data['oor'] = $row->oor;
				$data['gov_id'] = $row->gov_id;
				$data['photo'] = $row->photo;
				$data['date_created'] = $row->date_created;

				$data['email'] = $row->email;
				$data['username'] = $row->username;
			}
		}
		return $data;
		//RETURN TO ALL THE METHODS
	}

	//GET THE FULL DETAILS OF THE BRGY STAFF
	public function __get_this_brgy_staff_details()
	{
		$get_this_brgy_staff_details = $this->bsam->get_this_brgy_staff_details();
		if ($get_this_brgy_staff_details->num_rows() > 0) 
		{
			foreach ($get_this_brgy_staff_details->result() as $row) 
			{
				$data['first_name'] = $row->first_name;
				$data['middle_name'] = $row->middle_name;
				$data['last_name'] = $row->last_name;
				$data['position'] = $row->position;
				$data['gender'] = $row->gender;
				$data['dob'] = $row->dob;
				$data['civil_status'] = $row->civil_status;
				$data['spouse_name'] = $row->spouse_name;
				$data['profile'] = $row->photo;
				$data['mobile_no'] = $row->mobile_no;
				$data['tel_no'] = $row->tel_no;
				$data['street'] = $row->street;
				$data['barangay'] = $row->barangay;
				$data['city'] = $row->city;
				$data['state_prov'] = $row->state_prov;
				$data['zip_code'] = $row->zip_code;
				$data['oor'] = $row->oor;
				$data['gov_id'] = $row->gov_id;
				$data['photo'] = $row->photo;
				$data['date_created'] = $row->date_created;

				$data['email'] = $row->email;
				$data['username'] = $row->username;
			}
		}
		return $data;
		//RETURN TO ALL THE METHODS
	}

	//GET THE FULL DETAILS OF THE REGISTERED BRGY
	public function __get_this_brgy_details()
	{
		$get_this_brgy_details = $this->rbm->get_this_brgy_details();
		if ($get_this_brgy_details->num_rows() > 0) 
		{
			foreach ($get_this_brgy_details->result() as $row) 
			{
				$data['barangay'] = $row->barangay;
				$data['brgy_captain'] = $row->brgy_captain;
				$data['street'] = $row->street;
				$data['city'] = $row->city;
				$data['state_prov'] = $row->state_prov;
				$data['zip_code'] = $row->zip_code;
				$data['photo_brgy'] = $row->photo_brgy;
				$data['photo_docs'] = $row->photo_docs;
				$data['mobile_no'] = $row->mobile_no;
				$data['tel_no'] = $row->tel_no;
				$data['date_created'] = $row->date_created;
			}
		}
		return $data;
		//RETURN TO ALL THE METHODS
	}

	//CHECK IF THE DETAILS IS INCOMPLETE THE STAY TO INCOMPLETE VIEW
	public function __is_not_completed()
	{
		//NEED TO CHECK THE FOLLOWING
		if (!$this->session->has_userdata('brgy_staff_account_id'))
		{
			$get_this_incomplete_brgy_admin = $this->budm->get_this_incomplete_brgy_admin()->num_rows();
			if ($get_this_incomplete_brgy_admin > 0) 
			{
				header("location: ".base_url('barangay/incomplete')."");
				die();
			}
		}
		else
		{
			$get_this_incomplete_brgy_staff = $this->budm->get_this_incomplete_brgy_staff()->num_rows();
			if ($get_this_incomplete_brgy_staff > 0) 
			{
				header("location: ".base_url('barangay/incomplete')."");
				die();
			}
		}
	}

	public function __is_completed()
	{
		//NEED TO CHECK THE FOLLOWING
		//IF THE DETAILS WAS ALREADY COMPLETE THE REDIRECT TO DASHBOARD
		if (!$this->session->has_userdata('brgy_staff_account_id'))
		{
			if ($this->budm->get_this_incomplete_brgy_admin()->num_rows() < 1) 
			{
				header("location: ".base_url('barangay')."");
				die();
			}
		}
		else
		{
			if ($this->budm->get_this_incomplete_brgy_staff()->num_rows() < 1) 
			{
				header("location: ".base_url('barangay')."");
				die();
			}
		}
		
	}

	public function incomplete()
	{
		$this->__is_completed();

		$data['title'] = 'Complete Your	 Profile';
		$data['barangay_incomplete'] = 'barangay_incomplete';//JQUERY INDICATOR

		if ($this->session->user_type == 'brgy_admin')//GET THE DETAILS OF THE USER WHO LOGGED IN
			$data['brgy_user_details'] = $this->__get_this_brgy_admin_details();
		else
			$data['brgy_user_details'] = $this->__get_this_brgy_staff_details();

		$data['brgy_details'] = $this->__get_this_brgy_details();//FULL DETAILS OF THE REGISTERED BRGY
		
		if (!$this->session->has_userdata('brgy_staff_account_id'))
		{
			$get_this_incomplete_brgy_admin = $this->budm->get_this_incomplete_brgy_admin();
			if ($get_this_incomplete_brgy_admin->num_rows() > 0) 
			{
				//BRGY ADMIN
				foreach ($get_this_incomplete_brgy_admin->result() as $row) 
				{
					$data['first_name'] = $row->first_name;
					$data['middle_name'] = $row->middle_name;
					$data['last_name'] = $row->last_name;
					$data['position'] = $row->position;
					$data['mobile_no'] = $row->mobile_no;
					$data['barangay'] = $row->barangay;
					$data['city'] = $row->city;
					$data['state_prov'] = $row->state_prov;
					$data['zip_code'] = $row->zip_code;
				}
			}

		}
		else
		{
			$get_this_incomplete_brgy_staff = $this->budm->get_this_incomplete_brgy_staff();
			if ($get_this_incomplete_brgy_staff->num_rows() > 0) 
			{
				//BRGY STAFF
				foreach ($get_this_incomplete_brgy_staff->result() as $row) 
				{
					$data['first_name'] = $row->first_name;
					$data['middle_name'] = $row->middle_name;
					$data['last_name'] = $row->last_name;
					$data['position'] = $row->position;
					$data['mobile_no'] = $row->mobile_no;
					$data['barangay'] = $row->barangay;
					$data['city'] = $row->city;
					$data['state_prov'] = $row->state_prov;
					$data['zip_code'] = $row->zip_code;
				}
			}
		}
		$this->load->view('templates/barangay_header_incomplete.php', $data);
		$this->load->view('templates/barangaynav_incomplete');
		$this->load->view('barangay/barangay_incomplete');
		$this->load->view('templates/barangay_footer');
	}

	public function index()
	{	
		$this->__is_not_completed();
		//IF THERE'S LOAN TERM ENDED UPDATE THE STATUS
		$this->__check_loan_end_term();
		//IF THERE'S INVESTMENT TERM ENDED ADD TO WALLET BALANCE, UPDATE THE STATUS AND NOTIFY THE USERS
		$this->__check_investment_end_term();
		//IF THERE'S MONTHLY RETURN TERM ENDED ADD TO WALLET BALANCE, UPDATE THE STATUS/INDICATOR AND NOTIFY THE USERS
		$this->__check_monthly_return();
		//IF THERE'S MONTHLY REPAYMENT NAHUMAN ANG DUE DATE WALA PA KABAYAD THEN SET UG PENALTY
		$this->__check_monthly_repayment();//LOCATE IN MY_CONTROLLER
		//NOTIFY THE BORROWER IF DUOL NA ANG DUE DATE SA IYANG AMORTAZATION
		$this->__notify_borrower_due_date();//LOCATE IN MY_CONTROLLER

		$data['active_dashboard'] = 'active';//FOR NAVBAR ACTIVATOR
		$data['barangay_dashboard'] = 'barangay_dashboard';//JQUERY INDICATOR
		$data['title'] = 'Dashboard';
		
		if ($this->session->user_type == 'brgy_admin')//GET THE DETAILS OF THE USER WHO LOGGED IN
			$data['brgy_user_details'] = $this->__get_this_brgy_admin_details();
		else
			$data['brgy_user_details'] = $this->__get_this_brgy_staff_details();

		$data['brgy_details'] = $this->__get_this_brgy_details();//FULL DETAILS OF THE REGISTERED BRGY

		$this->load->view('templates/barangay_header.php', $data);
		$this->load->view('templates/barangaynav');
		$this->load->view('barangay/barangay_dashboard');
		$this->load->view('templates/barangay_footer');
	}


	public function barangay_staff()
	{
		$this->__is_not_completed();
		$data['active_barangay_staff'] = 'active';//FOR NAVBAR ACTIVATOR
		$data['barangay_staff'] = 'barangay_staff';//JQUERY INDICATOR
		$data['title'] = 'Barangay Staff';

		if ($this->session->user_type == 'brgy_admin')//GET THE DETAILS OF THE USER WHO LOGGED IN
			$data['brgy_user_details'] = $this->__get_this_brgy_admin_details();
		else
			$data['brgy_user_details'] = $this->__get_this_brgy_staff_details();
		
		$data['brgy_details'] = $this->__get_this_brgy_details();//FULL DETAILS OF THE REGISTERED BRGY

		$this->load->view('templates/barangay_header.php', $data);
		$this->load->view('templates/barangaynav');
		$this->load->view('barangay/barangay_staff');
		$this->load->view('templates/barangay_footer');
	}

	public function add_brgy_staff_account()
	{
		$this->__is_not_completed();

		$code_number = 0;
		$brgy_details = $this->__get_this_brgy_admin_details();
		$barangay = $brgy_details['barangay'];
		$city = $brgy_details['city'];
		$state_prov = $brgy_details['state_prov'];
		$zip_code = $brgy_details['zip_code'];
		$photo = $brgy_details['photo'];

		$first_name = $this->input->post('first_name');
	    $middle_name = $this->input->post('middle_name');
	    $last_name = $this->input->post('last_name');
	    $email = $this->input->post('email');
	    $position = $this->input->post('position');
	    $mobile_no = $this->input->post('mobile_no');

	    $trapping_message  = null;
		$trapping_message = $this->__do_trapping_add_brgy_staff($first_name, $last_name, $email, $mobile_no, $position);

		if ($trapping_message) 
		{
			$this->output->set_output(json_encode(
				array('message' => $trapping_message, 'code' => $code_number)
			));
		}
		else
		{
			//GENERATE CREDENTIALS USERNAME & PASSWORD AND SEND TO HIS/HER EMAIL
	       	$username = $email;
			$pos = strpos($username, '@');//FIND THE POSITION OF @
		    $username = substr($username, 0, $pos);//REMOVE STRING STARTING FROM @
			$username = 'mj' . date('Y') . $username . '_' . rand(1,9) . rand(1,9) . rand(1,9);//GENERATED USERNAME
			$password = rand(1,9) . rand(1,9) . 'mangjuam' . rand(1,9) . rand(1,9) . rand(1,9);//GENERATED PASSWORD

	       	$brgy_staff_account_data = array(
	       		'brgy_account_id' => $this->session->brgy_account_id,
	           	'registered_brgy_id' => $this->session->registered_brgy_id,
	           	'email' => $email,
	           	'username' => $username,
	           	'password' => md5($password)
	        );
	        $create_brgy_staff_account = $this->bsam->create_brgy_staff_account($brgy_staff_account_data);

	        $brgy_user_details_data = array(
	        	'brgy_staff_account_id' => $create_brgy_staff_account,
	        	'first_name' => $first_name,
	        	'middle_name' => $middle_name,
	        	'last_name' => $last_name,
	        	'position' => $position,
	        	'mobile_no' => $mobile_no,
	        	'barangay' => $barangay,
	        	'city' => $city,
	        	'state_prov' => $state_prov,
	        	'zip_code' => $zip_code,
	        	'photo' => $photo
	        );
	        $insert_brgy_details = $this->budm->insert_brgy_details($brgy_user_details_data);
	        if ($insert_brgy_details > 0) 
	        {
	        	$code_number = 1;
	        	//DO LOGS
	        	$log_data = array(
					'action' => 'Brgy admin created a brgy staff account',
					'user_agent' => $this->user_agent(),
					'platform' => $this->platform(),
					'brgy_account_id' => $this->session->brgy_account_id,
					'user_type' => $this->session->user_type
				);
				$this->lm->log($log_data);

				//CREATE XML STORE THE CREDENTIALS THIS IS FOR UNDER DEVELOPMENT
				$xml = '<brgy_account>
							<email>'.$email.'</email>
							<username>'.$username.'</username>
							<password>'.$password.'</password>
						</brgy_account>';

				$dom = new DOMDocument;
				$dom->preserveWhiteSpace = FALSE;
				$dom->loadXML($xml);
				$dom->save('public/uploads/barangay/brgy_staff_accounts/'.$username.'_'.date('Y-m-d H-i-s').'.xml');

				$email_message = 'Good day '.$position.' '. ucwords($first_name) . ' ' . ucwords($last_name) . ' of barangay ' . $barangay . '. Your brgy staff account was successfully created. <br> To login use your email or username (' . $username . ') and your password is (' . $password . ') Click the link http://localhost/mangjuam.com to login.';
				$from = 'mangjuamlending@gmail.com';
				$from_name = 'Mangjuam';
				$subject = 'Your Account Was Successfully Created';
				$to = array($email);
				$reply_to = '';
				$reply_to_name = '';
				$to_send_email = $this->to_send_email($email_message, $from, $from_name, $subject, $to, $reply_to, $reply_to_name);

				$sms_message = 'Congrats '.$position.' '. ucwords($first_name) . ' ' . ucwords($last_name) . ' your account as (brgy staff) was successfully registered. We have sent an email to you containing your Mangjuam credentials.';
				$to_send_sms = $this->to_send_sms($mobile_no, $sms_message);

	        	$this->output->set_output(json_encode(
						array('message' => 'Barangay '.$barangay.' was successfully registered. '.$to_send_email.' '.$to_send_sms, 'code' => $code_number)
				));
	        }
		}
	}

	public function manage_users()
	{
		$this->__is_not_completed();

		$data['active_manage_users'] = 'active';//FOR NAVBAR ACTIVATOR
		$data['barangay_manage_users'] = 'barangay_manage_users';//JQUERY INDICATOR
		$data['title'] = 'Manage Users';

		if ($this->session->user_type == 'brgy_admin')//GET THE DETAILS OF THE USER WHO LOGGED IN
			$data['brgy_user_details'] = $this->__get_this_brgy_admin_details();
		else
			$data['brgy_user_details'] = $this->__get_this_brgy_staff_details();
		
		$data['brgy_details'] = $this->__get_this_brgy_details();//FULL DETAILS OF THE REGISTERED BRGY
		$data['for_approval'] = $this->udm->get_for_approval_accounts();
		$data['for_verification'] = $this->udm->get_for_verification_accounts();

		$this->load->view('templates/barangay_header.php', $data);
		$this->load->view('templates/barangaynav');
		$this->load->view('barangay/barangay_manage_users');
		$this->load->view('templates/barangay_footer');
	}

	public function get_this_for_approval_account()
	{
		$this->__is_not_completed();

		$user_account_id = $this->secret_id_md5($this->input->post('secret_id'));
		$get_this_for_approval_account = $this->udm->get_this_for_approval_account($user_account_id);
		$ajax_ret_get_this_for_approval_account = null;
		if ($get_this_for_approval_account->num_rows() > 0) 
		{
			foreach ($get_this_for_approval_account->result() as $row) 
			{
				if ($row->is_borrower == 1) 
					$main_user_type = 'Borrower';
				else
					$main_user_type = 'Lender';

				$ajax_ret_get_this_for_approval_account[] = array(
					'full_name' =>$row->full_name,
					'user_account_id' =>$row->user_account_id.md5('scrt'),
					'gov_id' =>$row->gov_id,
					'mobile_no' =>$row->mobile_no,
					'address' =>$row->address,
					'email' =>$row->email,
					'username' =>$row->username,
					'main_user_type' =>$main_user_type
				);
			}
		}	
		if (!$ajax_ret_get_this_for_approval_account) 
			show_404();
		else
			$this->output->set_output(json_encode($ajax_ret_get_this_for_approval_account));
	}

	public function get_this_for_verification_account()
	{
		$this->__is_not_completed();

		$user_account_id = $this->secret_id_md5($this->input->post('secret_id'));
		$get_this_for_verification_account = $this->udm->get_this_for_verification_account($user_account_id);

		$ajax_ret_get_this_for_verification_account = null;
		if ($get_this_for_verification_account->num_rows() > 0) 
		{
			foreach ($get_this_for_verification_account->result() as $row) 
			{
				if ($row->is_borrower == 1) 
					$main_user_type = 'Borrower';
				else
					$main_user_type = 'Lender';

				$ajax_ret_get_this_for_verification_account[] = array(
					'full_name' =>$row->full_name,
					'user_account_id' =>$row->user_account_id.md5('scrt'),
					'gov_id' =>$row->gov_id,
					'mobile_no' =>$row->mobile_no,
					'address' =>$row->address,
					'email' =>$row->email,
					'username' =>$row->username,
					'main_user_type' =>$main_user_type
				);
			}
		}
		if (!$ajax_ret_get_this_for_verification_account) 
			show_404();
		else
			$this->output->set_output(json_encode($ajax_ret_get_this_for_verification_account));
	}

	public function accept_member_request()
	{
		$this->__is_not_completed();

		$user_account_id = $this->secret_id_md5($this->input->post('user_account_id'));
		$mobile_no = $this->input->post('mobile_no');

		$member_request_data = array(
			'status' => 1,
			'memo' => 'Verified user. Please re-login'
		);
		// ACCEPT MEMBER REQUEST
		$member_request = $this->mrm->update($member_request_data, $user_account_id);
		if ($member_request > 0) 
		{
			$user_account_data = array(
				'is_verified' => 1,
				'registered_brgy_id' => $this->session->registered_brgy_id
			);
			$verified_user = $this->uam->verified_user($user_account_data,$user_account_id);

			$sms_message = 'Congrats your Mangjuam account was successfully verified. You can now login as borrower to http://localhost/mangjuam.com.';
			$to_send_sms = $this->to_send_sms($mobile_no, $sms_message);

			//DO LOGS
			$log_data = array(
				'action' => 'Old user was successfully verified',
				'user_agent' => $this->user_agent(),
				'platform' => $this->platform(),
				'brgy_account_id' => $this->session->brgy_account_id,
				'brgy_staff_account_id' => $this->session->brgy_staff_account_id,
				'user_type' => $this->session->user_type
			);
			$this->lm->log($log_data);
			header("location: ".base_url('barangay/manage_users/?user_verified?').date('Ymdhis?').md5(1).md5(2));
		}
	}

	public function reject_member_request()
	{
		$this->__is_not_completed();

		$user_account_id = $this->secret_id_md5($this->input->post('user_account_id'));
		$memo = $this->input->post('memo');
		$member_request_data = array(
			'status' => 2,
			'memo' => $memo//REJECTED MEMO
		);
		//REQUEST REJECTED
		$member_request = $this->mrm->update($member_request_data, $user_account_id);
		if ($member_request > 0) 
		{
			$log_data = array(
				'action' => 'Old user was rejected the request note: '.$memo,
				'user_agent' => $this->user_agent(),
				'platform' => $this->platform(),
				'brgy_account_id' => $this->session->brgy_account_id,
				'brgy_staff_account_id' => $this->session->brgy_staff_account_id,
				'user_type' => $this->session->user_type
			);
			$this->lm->log($log_data);
			header("location: ".base_url('barangay/manage_users/?user_rquest_rejected?').date('Ymdhis?').md5(1).md5(2));
		}
	}

	public function accept_user_account()
	{
		$this->__is_not_completed();

		$user_account_id = $this->secret_id_md5($this->input->post('user_account_id'));
		$mobile_no = $this->input->post('mobile_no');

		$approve_user_data = array(
			'is_completed' => 1,
			'for_approval' => 0,//APPROVED
			'reason_message' => 'This is a verified user'
		);
		$approve_user = $this->udm->approve_user($approve_user_data, $user_account_id);
		if ($approve_user > 0) 
		{
			$user_account_data = array('is_verified' => 1);
			$verified_user = $this->uam->verified_user($user_account_data,$user_account_id);

			$sms_message = 'Congrats your Mangjuam account was successfully approved. Login to http://localhost/mangjuam.com';
			$to_send_sms = $this->to_send_sms($mobile_no, $sms_message);

			$log_data = array(
				'action' => 'New user was successfully approved',
				'user_agent' => $this->user_agent(),
				'platform' => $this->platform(),
				'brgy_account_id' => $this->session->brgy_account_id,
				'brgy_staff_account_id' => $this->session->brgy_staff_account_id,
				'user_type' => $this->session->user_type
			);
			$this->lm->log($log_data);
			header("location: ".base_url('barangay/manage_users/?user_accepted?').date('Ymdhis?').md5(1).md5(2));
		}
	}

	public function reject_user_account()
	{
		$this->__is_not_completed();

		$user_account_id = $this->secret_id_md5($this->input->post('user_account_id'));
		$reason_message = $this->input->post('reason_message');

		$reject_user_data = array(
			'is_completed' => 0,
			'for_approval' => 2,//REJECTED
			'reason_message' => $reason_message
		);
		$reason_message = 'Note: '.$reason_message; 
		$reject_user = $this->udm->reject_user($reject_user_data, $user_account_id);
		if ($reject_user > 0) 
		{
			$log_data = array(
				'action' => 'New user was rejected '.$reason_message,
				'user_agent' => $this->user_agent(),
				'platform' => $this->platform(),
				'brgy_account_id' => $this->session->brgy_account_id,
				'brgy_staff_account_id' => $this->session->brgy_staff_account_id,
				'user_type' => $this->session->user_type
			);
			$this->lm->log($log_data);
			header("location: ".base_url('barangay/manage_users/?user_rejected?').date('Ymdhis?').md5(1).md5(2));
		}
	}

	public function manage_funds()
	{
		$this->__is_not_completed();

		$data['active_transactions'] = 'manage_funds';//FOR NAVBAR ACTIVATOR
		$data['barangay_manage_funds'] = 'manage_funds';//JQUERY INDICATOR
		$data['title'] = 'Transactions | Fundings';

		if ($this->session->user_type == 'brgy_admin')//GET THE DETAILS OF THE USER WHO LOGGED IN
			$data['brgy_user_details'] = $this->__get_this_brgy_admin_details();
		else
			$data['brgy_user_details'] = $this->__get_this_brgy_staff_details();
		
		$data['brgy_details'] = $this->__get_this_brgy_details();//FULL DETAILS OF THE REGISTERED BRGY

		$this->load->view('templates/barangay_header.php', $data);
		$this->load->view('templates/barangaynav');
		$this->load->view('barangay/barangay_manage_funds');
		$this->load->view('templates/barangay_footer');
	}

	public function __borrower_monthly_repayments($borrower_id, $loan_id, $loan_application_id, $reference_code, $monthly_repayment, $loan_term)
	{
		$date_entry = date('Y-m-d');
		$current_time = date('H:i:s');
		$date_entry_day = date("d", strtotime($date_entry));
		$date_entry_month = date("m", strtotime($date_entry));
		$date_entry_year = date("Y", strtotime($date_entry));
		$startdate = strtotime($date_entry);
		$startdate = strtotime("+1 month", $startdate);// + 1 TO START THE COUNTING TO NEXT MONTH
		$enddate = strtotime("+$loan_term month", $startdate);
		$year_term_in_mos = $loan_term;
		$ctr = 0;//COUNTER TO INDICATE WHERE WE GONNA BREAK THE WHILE LOOP

		//DECLARE ARRAY FIRST WE WILL USING THIS VARIABLE FOR STORING MONTHS RESULT
		$date_monthly_repayment_arr = array();
		//STARTS FROM 29 AND UP
		if ($date_entry_day >= 29)
		{
			while ($ctr < $year_term_in_mos) 
			{	
				//SET TO 0 AFTER COUTING THE 12 AS DECEMBER TO START AGAIN THE COUNTING IN JANUARY
				if ($date_entry_month == 12)
					$date_entry_month = 0;
				//ADD 1 EVERY LOOP FOR COUTING MONTHS
				$date_entry_month++;
				//COUNT THE TOTAL DAYS OF THE MONTH
				$number_of_days_to_this_month = cal_days_in_month(CAL_GREGORIAN, $date_entry_month, date('Y',$startdate));
				//CHECK IF THE DAY ENTERED IS GREATER THAN THEN USE THE MAXIMUM DAY OF THE MONTH
				if ($date_entry_day > $number_of_days_to_this_month)
				{
					$dateObj   = DateTime::createFromFormat('!m', $date_entry_month);
					$monthName = $dateObj->format('m');  //CONVERT NUMBER TO MONTH NAME
					$date_monthly_repayment =  date('Y',$startdate).'-'.$monthName.'-'.$number_of_days_to_this_month.' '.$current_time;//Y-m-d H:i:s 
					$date_entry = strtotime(date('Y', $startdate).'-'.sprintf('%02d', $date_entry_month).'-'.$date_entry_day);
					$startdate = strtotime("+$number_of_days_to_this_month days", $date_entry);//ADD 1 MONTH
				}
				else
				{
					$dateObj   = DateTime::createFromFormat('!m', $date_entry_month);
					$monthName = $dateObj->format('m'); //CONVERT NUMBER TO MONTH NAME
					$date_monthly_repayment = date('Y',$startdate).'-'.$monthName.'-'.$date_entry_day.' '.$current_time;
					$date_entry = strtotime(date('Y', $startdate).'-'.sprintf('%02d', $date_entry_month).'-'.$date_entry_day);
					$startdate = strtotime("+$number_of_days_to_this_month days", $date_entry);//ADD 1 MONTH
				}
				$ctr++;
				//STORE DATA TO AN ARRAY
				$date_monthly_repayment_arr[] .= $date_monthly_repayment;
			}
		}
		else
		{
			while ($startdate < $enddate) 
			{
			  	$date_monthly_repayment =  date("Y-m-d", $startdate).' '.$current_time;//Y-m-d H:i:s
			  	$startdate = strtotime("+1 month", $startdate);
			  	//STORE DATA TO AN ARRAY
			  	$date_monthly_repayment_arr[] .= $date_monthly_repayment;
			}
		}

		//COUNT ALL THE MONTHS TO BE repaymentED
		$ctr_mos = count($date_monthly_repayment_arr);
		for ($i = 0; $i < $ctr_mos; $i++) 
		{
			$monthly_repayments_data[] = array(
				'due_date' => $date_monthly_repayment_arr[$i],
				'borrower_id' => $borrower_id,
				'loan_id' => $loan_id,
				'loan_application_id' => $loan_application_id,
				'registered_brgy_id' => $this->session->registered_brgy_id,
				'reference_code' => $reference_code,
				'monthly_repayment' => $monthly_repayment
			);
		}
		$insert_monthly_repayments = $this->bmrm->insert_monthly_repayments($monthly_repayments_data);
		return $insert_monthly_repayments;
	}

	//RELESED LOAN FUNDS
	public function loan_released()
	{
		$this->__is_not_completed();

		$code_number = 0;
		$interest_repayment = 0;
		$monthly_repayment  = 0;
		$total_repayment = 0;
		$reference_code = $this->input->post('reference_code');
		$loan_application_id = $this->secret_id_md5($this->input->post('loan_application_id'));
		$borrower_id = $this->secret_id_md5($this->input->post('borrower_id'));
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$loan_amount = $this->input->post('loan_amount');
		$loan_term = $this->input->post('loan_term');
		$mobile_no = $this->input->post('mobile_no');

		if ($this->session->has_userdata('brgy_staff_account_id'))
			$check_pass = $this->__check_credentials_brgy_staff($this->session->email, $password);
		else
			$check_pass = $this->__check_credentials_brgy_admin($this->session->email, $password);

		//CHECK FOR AN EXACT AMOUNT
		$loan_app_data = array('reference_code' => $reference_code, 'loan_amount' => $loan_amount);
		if (!$loan_amount && !$password) 
		{
			$this->output->set_output(json_encode(
				array('message' => 'Input amount & password', 'code' => $code_number))
			);
		}
		elseif (!$password) 
		{
			$this->output->set_output(json_encode(
				array('message' => 'Input password', 'code' => $code_number))
			);
		}
		elseif (!$loan_amount) 
		{
			$this->output->set_output(json_encode(
				array('message' => 'Input amount', 'code' => $code_number))
			);
		}
		elseif (!is_numeric($loan_amount)) 
		{
			$this->output->set_output(json_encode(
				array('message' => 'Invalid amount', 'code' => $code_number))
			);
		}
		elseif ($check_pass->num_rows() < 1) 
		{
			$this->output->set_output(json_encode(
				array('message' => 'Invalid password', 'code' => $code_number))
			);
		}
		elseif ($this->lam->get_loan_app_by_ref($loan_app_data)->num_rows() < 1)
		{
			$this->output->set_output(json_encode(
				array('message' => 'Input exact amount', 'code' => $code_number))
			);
		}
		elseif (!$loan_term || !$borrower_id || !$loan_application_id || !$reference_code) 
		{
			$this->output->set_output(json_encode(
				array('message' => 'Opps something went wrong!', 'code' => $code_number))
			);
		}
		else
		{
			//COMPUTE THE OR GET THE RESULTS OF COMPUTED FROM LOANS
			$computed = $this->__compute_loan($loan_amount, $loan_term);
			$interest_rate = $computed['interest_rate'];
			$interest_repayment = $computed['interest_repayment'];
			$monthly_repayment = $computed['monthly_repayment'];
			$total_repayment = $computed['total_repayment'];

			//UPDATE LOAN APPLICATION
			$loan_app_data = array(
				'is_accepted' => 3,
				'is_released' => 1,//LOAN WAS RELEASED
				'note' => 'Loan released!'
			);
			$update_loan_app = $this->lam->update_loan_app($loan_app_data, $loan_application_id);
			if ($update_loan_app)
			{
				$rebate_penalty_rate = $this->rprm->get_rebate_penalty_rate($this->session->brgy_account_id);
				foreach ($rebate_penalty_rate->result() as $row) 
				{
					$penalty_rate = $row->penalty_rate;
					$rebate_rate = $row->rebate_rate;
				}
				$month_term = $loan_term;
				$start_date = strtotime(date('Y-m-d H:i:s'));
				$end_date = strtotime("+$month_term month", $start_date);
				$end_term = date('Y-m-d H:i:s', $end_date);

				$loan_data = array(
					'borrower_id' => $borrower_id,
					'registered_brgy_id' => $this->session->registered_brgy_id,
					'loan_application_id' => $loan_application_id,
					'reference_code' => $reference_code,
					'interest_rate' => $interest_rate,
					'loan_amount' => $loan_amount,
					'loan_term' => $loan_term,
					'interest_repayment' => $interest_repayment,
					'monthly_repayment' => $monthly_repayment,
					'total_repayment' => $total_repayment,
					'end_term' => $end_term,
					'rebate_rate' => $rebate_rate,
					'penalty_rate' => $penalty_rate
				);
				// INSERT TO LOANS
				$loan_id = $this->loan->release_loan($loan_data);
				if ($loan_id > 0) 
				{
					//INSERT TO BORROWER MONTHLY REPAYMENTS TABLE
					$borrower_monthly_repayment = $this->__borrower_monthly_repayments($borrower_id, $loan_id, $loan_application_id ,$reference_code, $monthly_repayment, $loan_term);

					$new_balance = $this->brgy_current_balance() - $loan_amount;
					//INSERT BRGY TRANSACTIONS
					$transaction_data = array(
						'registered_brgy_id' => $this->session->registered_brgy_id,
						'debit' => $loan_amount,
						'reference_code' => $reference_code,
						'loan_id' => $loan_id,
						'type' => 'Loan',
						'type_code' => 3,
						'balance' => $new_balance
					);
					$this->transaction->insert_transaction($transaction_data);
					//INSERT BORROWER TRANSACTIONS
					$borrower_new_outstanding_balance = $this->get_borrower_outstanding_current_balance($borrower_id) + $loan_amount;
					$borrower_transaction_data = array(
						'borrower_id' => $borrower_id,
						'loan_id' => $loan_id,
						'reference_code' => $reference_code,
						'from_brgy_id' => $this->session->registered_brgy_id,
						'debit' => $loan_amount,
						'type' => 'Loan',
						'type_code' => 1,
						'outstanding_balance' => $borrower_new_outstanding_balance
					);
					$this->btm->insert_borrower_transaction($borrower_transaction_data);
					//NOTIFY THE USER THAT HIS/HER LOAN WAS SUCCESSFULLY RELEASED
					$email_message = 'Thank you for applying a loan from your Brgy. of the amount '.number_format($loan_amount, 2).' for '.$loan_term.' month(s) term. Ref Code: '.$reference_code;
					$from = 'mangjuamlending@gmail.com';
					$from_name = 'Mangjuam';
					$subject = 'Your Loan Was Successfully Released';
					$to = array($email);
					$reply_to = '';
					$reply_to_name = '';
					$to_send_email = $this->to_send_email($email_message, $from, $from_name, $subject, $to, $reply_to, $reply_to_name);

					$sms_message = 'Thank you for applying a loan from your Brgy. of the amount '.number_format($loan_amount, 2).' for '.$loan_term.' month(s) term. Ref Code: '.$reference_code;
					$to_send_sms = $this->to_send_sms($mobile_no, $sms_message);

					//DO LOGS
					$log_data = array(
						'action' => 'New loan released',
						'user_agent' => $this->user_agent(),
						'platform' => $this->platform(),
						'brgy_account_id' => $this->session->brgy_account_id,
						'brgy_staff_account_id' => $this->session->brgy_staff_account_id,
						'user_type' => $this->session->user_type
					);
					$this->lm->log($log_data);

					$code_number = 1;
					$this->output->set_output(json_encode(
						array('message' => 'Loan was successfully released', 'code' => $code_number))
					);
				}
			}
		}
	}

	public function loans()
	{
		$this->__is_not_completed();

		$data['active_transactions'] = 'loans';//FOR NAVBAR ACTIVATOR
		$data['barangay_loans'] = 'loans';//JQUERY INDICATOR
		$data['title'] = 'Transactions | Loans';

		if ($this->session->user_type == 'brgy_admin')//GET THE DETAILS OF THE USER WHO LOGGED IN
			$data['brgy_user_details'] = $this->__get_this_brgy_admin_details();
		else
			$data['brgy_user_details'] = $this->__get_this_brgy_staff_details();
		
		$data['brgy_details'] = $this->__get_this_brgy_details();//FULL DETAILS OF THE REGISTERED BRGY

		$reference_code = $this->input->get('reference_code');//SEARCH FOR ACCEPTED INVESTMENT
		$data['get_loan_app_by_ref'] = null;

		if (isset($reference_code)) 
		{	
			$loan_app_data = array('reference_code' => $reference_code, 'is_accepted' => 1);
			$data['get_loan_app_by_ref'] = $this->lam->get_loan_app_by_ref($loan_app_data);
		}

		$this->load->view('templates/barangay_header.php', $data);
		$this->load->view('templates/barangaynav');
		$this->load->view('barangay/barangay_loans');
		$this->load->view('templates/barangay_footer');
	}

	public function loan_applications()
	{
		$this->__is_not_completed();

		$data['active_transactions'] = 'loan_applications';//FOR NAVBAR ACTIVATOR
		$data['barangay_loan_applications'] = 'loan_applications';//JQUERY INDICATOR
		$data['title'] = 'Transactions | Loan Applications';

		if ($this->session->user_type == 'brgy_admin')//GET THE DETAILS OF THE USER WHO LOGGED IN
			$data['brgy_user_details'] = $this->__get_this_brgy_admin_details();
		else
			$data['brgy_user_details'] = $this->__get_this_brgy_staff_details();
		
		$data['brgy_details'] = $this->__get_this_brgy_details();//FULL DETAILS OF THE REGISTERED BRGY

		$data['new_loan_app'] = $this->lam->new_loan_app();
		
		$data['loan_app_accepted'] = $this->lam->get_loan_app_brgy();
		
		$this->load->view('templates/barangay_header.php', $data);
		$this->load->view('templates/barangaynav');
		$this->load->view('barangay/barangay_loan_applications');
		$this->load->view('templates/barangay_footer');
	}

	public function reject_loan_app()
	{
		$this->__is_not_completed();

		$loan_application_id = $this->secret_id_md5($this->input->post('id'));

		$full_name = $this->input->post('full_name');
		$reference_code = $this->input->post('reference_code');
		$mobile_no = $this->input->post('mobile_no');
		$amount = $this->input->post('amount');
		$note = $this->input->post('note');

		$reject_loan_app = $this->lam->reject_loan_app($loan_application_id, $note);
		if ($reject_loan_app) 
		{
			//NOTIFY THE USER THAT HIS/HER APPLICATION WAS REJECTED
			$sms_message = 'Hello '.$full_name.' your loan application was rejected by the Brgy. Note: '.$note.' Ref Code: '.$reference_code;
			$to_send_sms = $this->to_send_sms($mobile_no, $sms_message);

			//DO LOGS
			$log_data = array(
				'action' => 'Loan application rejected',
				'user_agent' => $this->user_agent(),
				'platform' => $this->platform(),
				'brgy_account_id' => $this->session->brgy_account_id,
				'brgy_staff_account_id' => $this->session->brgy_staff_account_id,
				'user_type' => $this->session->user_type
			);
			$this->lm->log($log_data);
			header("location: ".base_url('barangay/loan_applications/?loan_app_rejected?').date('Ymdhis?').md5(1).md5(2));
		}
	}

	public function accept_loan_app()
	{
		$this->__is_not_completed();

		$loan_application_id = $this->secret_id_md5($this->input->post('id'));
		$full_name = $this->input->post('full_name');
		$reference_code = $this->input->post('reference_code');
		$mobile_no = $this->input->post('mobile_no');
		$amount = $this->input->post('amount');

		$accept_loan_app = $this->lam->accept_loan_app($loan_application_id);
		if ($accept_loan_app) 
		{
			//NOTIFY THE USER THAT HIS/HER APPLICATION WAS APPROVED
			$sms_message = 'Congrats '.$full_name.' your loan application was approved by the Brgy. pls bring any government ID & present your ref. code: '.$reference_code;
			$to_send_sms = $this->to_send_sms($mobile_no, $sms_message);

			//DO LOGS
			$log_data = array(
				'action' => 'New loan application approved',
				'user_agent' => $this->user_agent(),
				'platform' => $this->platform(),
				'brgy_account_id' => $this->session->brgy_account_id,
				'brgy_staff_account_id' => $this->session->brgy_staff_account_id,
				'user_type' => $this->session->user_type
			);
			$this->lm->log($log_data);
			header("location: ".base_url('barangay/loan_applications/?loan_app_accepted?').date('Ymdhis?').md5(1).md5(2));
		}
	}

	//GET THE SPECIFIC REQUIREMENT INVESTMENT
	public function get_this_requirements_loan()
	{
		$this->__is_not_completed();
		
		$loan_application_id = $this->secret_id_md5($this->input->post('secret_id'));

		$get_this_requirements = $this->lrm->get_this_requirements($loan_application_id);
		$ajax_ret_requirements = null;

		if ($get_this_requirements->num_rows() > 0) 
		{
			foreach ($get_this_requirements->result() as $row) 
			{
				$ajax_ret_requirements[] = array(
					'gov_id' => $row->gov_id,
					'bill' => $row->water_elect_bill,
					'brgy_permit' => $row->brgy_permit,
					'mayor_permit' => $row->mayor_permit,
					'payslip' => $row->payslip,
					'source_of_income' => $row->source_of_income,
					'monthly_income' => number_format($row->monthly_income,2)
				);
			}
		}
			
		if (!$ajax_ret_requirements) 
			show_404();
		else
			$this->output->set_output(json_encode($ajax_ret_requirements));
	}

	//AJAX RETURN
	public function get_loan_app_req_registered_brgy()
	{	
		$this->__is_not_completed();
		$loan_application_id = $this->secret_id_md5($this->input->post('secret_id'));

		$get_loan_app_req_registered_brgy = $this->lam->get_loan_app_req_registered_brgy($loan_application_id);
		$ajax_ret_loan_app_req_registered_brgy = null;
		if ($get_loan_app_req_registered_brgy->num_rows() > 0) 
		{
			foreach ($get_loan_app_req_registered_brgy->result() as $row) 
			{
				$co_maker_1[0] = $co_maker_2[1] = array();

				if ($row->co_maker_1 && $row->co_maker_2) 
				{
					//get first co-maker name
					foreach ($this->udm->get_this_user_details($row->co_maker_1)->result() as $row_c) 
					{
						$co_maker_1[0] = $row_c->first_name.' '.$row_c->middle_name.' '.$row_c->last_name;
					}
					//get first co-maker name
					foreach ($this->udm->get_this_user_details($row->co_maker_2)->result() as $row_c) 
					{
						$co_maker_2[1] = $row_c->first_name.' '.$row_c->middle_name.' '.$row_c->last_name;
					}

				}
				elseif ($row->co_maker_1) 
				{
					//get first co-maker name
					foreach ($this->udm->get_this_user_details($row->co_maker_1)->result() as $row_c) 
					{
						$co_maker_1[0] = $row_c->first_name.' '.$row_c->middle_name.' '.$row_c->last_name;
					}
				}
				else 
				{
					//get first co-maker name
					foreach ($this->udm->get_this_user_details($row->co_maker_2)->result() as $row_c) 
					{
						$co_maker_2[1] = $row_c->first_name.' '.$row_c->middle_name.' '.$row_c->last_name;
					}
				}

				$ajax_ret_loan_app_req_registered_brgy[] = array(
					'full_name' => $row->full_name,
					'mobile_no' => $row->mobile_no,
					'email' => $row->email,
					'address' => $row->address,
					'date_created' => $row->date_created,
					'reference_code' => $row->reference_code,
					'loan_amount' => number_format($row->loan_amount,2),
					'gov_id' => $row->gov_id,
					'bill' => $row->water_elect_bill,
					'payslip' => $row->payslip,
					'brgy_permit' => $row->brgy_permit,
					'mayor_permit' => $row->mayor_permit,
					'source_of_income' => $row->source_of_income,
					'monthly_income' => number_format($row->monthly_income,2),
					'loan_term' => $row->loan_term,
					'co_maker_1' => $co_maker_1[0],
					'co_maker_2' => $co_maker_2[1],
					'loan_application_id' => $row->loan_application_id.md5('scrt')
				);
			}
		}
			
		if (!$ajax_ret_loan_app_req_registered_brgy) 
			show_404();
		else
			$this->output->set_output(json_encode($ajax_ret_loan_app_req_registered_brgy));
	}

	public function investments()
	{
		$this->__is_not_completed();

		$data['active_transactions'] = 'investments';//FOR NAVBAR ACTIVATOR
		$data['barangay_investments'] = 'investments';//JQUERY INDICATOR
		$data['title'] = 'Transactions | Investments';

		$reference_code = $this->input->get('reference_code');//SEARCH FOR ACCEPTED INVESTMENT

		if ($this->session->user_type == 'brgy_admin')//GET THE DETAILS OF THE USER WHO LOGGED IN
			$data['brgy_user_details'] = $this->__get_this_brgy_admin_details();
		else
			$data['brgy_user_details'] = $this->__get_this_brgy_staff_details();
		
		$data['brgy_details'] = $this->__get_this_brgy_details();//FULL DETAILS OF THE REGISTERED BRGY

		$data['get_invest_app_by_ref'] = null;

		if (isset($reference_code)) 
		{	
			$invest_app_data = array('reference_code' => $reference_code, 'is_accepted' => 1);
			$data['get_invest_app_by_ref'] = $this->iam->get_invest_app_by_ref($invest_app_data);
		}

		$this->load->view('templates/barangay_header.php', $data);
		$this->load->view('templates/barangaynav');
		$this->load->view('barangay/barangay_investments');
		$this->load->view('templates/barangay_footer');
	}

	public function investment_applications()
	{	
		$this->__is_not_completed();

		$data['active_transactions'] = 'investment_applications';//FOR NAVBAR ACTIVATOR
		$data['barangay_investment_applications'] = 'investment_applications';//JQUERY INDICATOR
		$data['title'] = 'Transactions | Investment Applications';

		if ($this->session->user_type == 'brgy_admin')//GET THE DETAILS OF THE USER WHO LOGGED IN
			$data['brgy_user_details'] = $this->__get_this_brgy_admin_details();
		else
			$data['brgy_user_details'] = $this->__get_this_brgy_staff_details();
		
		$data['brgy_details'] = $this->__get_this_brgy_details();//FULL DETAILS OF THE REGISTERED BRGY

		$data['new_investment_app'] = $this->iam->new_investment_app();
		
		$data['investment_app_accepted'] = $this->iam->get_invest_app_brgy();
		
		$this->load->view('templates/barangay_header.php', $data);
		$this->load->view('templates/barangaynav');
		$this->load->view('barangay/barangay_investment_applications');
		$this->load->view('templates/barangay_footer');
	}

	//ADD INVESTMENT FUNDS
	public function investment_received()
	{
		$this->__is_not_completed();

		$code_number = 0;
		$interest_return = 0;
		$monthly_return = 0;
		$total_return = 0;
		$reference_code = $this->input->post('reference_code');
		$investment_application_id = $this->secret_id_md5($this->input->post('investment_application_id'));
		$lender_id = $this->secret_id_md5($this->input->post('lender_id'));
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$invest_amount = $this->input->post('invest_amount');
		$invest_term = $this->input->post('invest_term');
		$mobile_no = $this->input->post('mobile_no');

		if ($this->session->has_userdata('brgy_staff_account_id'))
			$check_pass = $this->__check_credentials_brgy_staff($this->session->email, $password);
		else
			$check_pass = $this->__check_credentials_brgy_admin($this->session->email, $password);

		//CHECK FOR AN EXACT AMOUNT
		$invest_app_data = array('reference_code' => $reference_code, 'invest_amount' => $invest_amount);
		if (!$invest_amount && !$password) 
		{
			$this->output->set_output(json_encode(
				array('message' => 'Input amount & password', 'code' => $code_number))
			);
		}
		elseif (!$password) 
		{
			$this->output->set_output(json_encode(
				array('message' => 'Input password', 'code' => $code_number))
			);
		}
		elseif (!$invest_amount) 
		{
			$this->output->set_output(json_encode(
				array('message' => 'Input amount', 'code' => $code_number))
			);
		}
		elseif ($check_pass->num_rows() < 1) 
		{
			$this->output->set_output(json_encode(
				array('message' => 'Invalid password', 'code' => $code_number))
			);
		}
		elseif ($this->iam->get_invest_app_by_ref($invest_app_data)->num_rows() < 1)
		{
			$this->output->set_output(json_encode(
				array('message' => 'Input exact amount', 'code' => $code_number))
			);
		}
		elseif (!$invest_term || !$lender_id || !$investment_application_id || !$reference_code) 
		{
			$this->output->set_output(json_encode(
				array('message' => 'Opps something went wrong!', 'code' => $code_number))
			);
		}
		else
		{
			//COMPUTE THE OR GET THE RESULTS OF COMPUTED FROM INVESTMENTS
			$computed = $this->__compute_investment($invest_amount, $invest_term);
			$interest_rate = $computed['interest_rate'];
			$interest_return = $computed['interest_return'];
			$monthly_return = $computed['monthly_return'];
			$total_return = $computed['total_return'];

			//UPDATE INVESTMENTS APPLICATION
			$investment_app_data = array(
				'is_accepted' => 3,
				'is_funded' => 1,//INVESTMENT WAS FUNDED
				'note' => 'Thanks for investing!'
			);
			$update_investment_app = $this->iam->update_investment_app($investment_app_data, $investment_application_id);
			if ($update_investment_app)
			{
				$year_term = $invest_term;
				$start_date = strtotime(date('Y-m-d H:i:s'));
				$end_date = strtotime("+$year_term year", $start_date);
				$end_term = date('Y-m-d H:i:s', $end_date);

				$investment_data = array(
					'lender_id' => $lender_id,
					'registered_brgy_id' => $this->session->registered_brgy_id,
					'investment_application_id' => $investment_application_id,
					'reference_code' => $reference_code,
					'interest_rate' => $interest_rate,
					'invest_amount' => $invest_amount,
					'invest_term' => $invest_term,
					'interest_return' => $interest_return,
					'monthly_return' => $monthly_return,
					'total_return' => $total_return,
					'end_term' => $end_term
				);
				$investment_id = $this->im->add_investment($investment_data);
				if ($investment_id > 0) 
				{
					//INSERT TO LENDER MONTHLY RETURN TABLE
					$lender_monthly_return = $this->__lender_monthly_return($lender_id, $investment_id, $investment_application_id ,$reference_code, $monthly_return, $invest_term);

					$new_balance = $invest_amount + $this->brgy_current_balance();

					$transaction_data = array(
						'registered_brgy_id' => $this->session->registered_brgy_id,
						'credit' => $invest_amount,
						'reference_code' => $reference_code,
						'investment_id' => $investment_id,
						'type' => 'Investment',
						'type_code' => 4,
						'balance' => $new_balance
					);
					$this->transaction->insert_transaction($transaction_data);
					//NOTIFY THE USER THAT HIS/HER INVESTMENT WAS SUCCESSFULLY FUNDED
					$email_message = 'Thank you for investing to your Brgy. of the amount '.number_format($invest_amount, 2).' for '.$invest_term.' year(s) term. Ref Code: '.$reference_code;
					$from = 'mangjuamlending@gmail.com';
					$from_name = 'Mangjuam';
					$subject = 'Your Investment Fund Was Successfully Deposited';
					$to = array($email);
					$reply_to = '';
					$reply_to_name = '';
					$to_send_email = $this->to_send_email($email_message, $from, $from_name, $subject, $to, $reply_to, $reply_to_name);

					$sms_message = 'Thank you for investing to your Brgy. of the amount '.number_format($invest_amount, 2).' for '.$invest_term.' year(s) term. Ref Code: '.$reference_code;
					$to_send_sms = $this->to_send_sms($mobile_no, $sms_message);

					//DO LOGS
					$log_data = array(
						'action' => 'New investment fund added',
						'user_agent' => $this->user_agent(),
						'platform' => $this->platform(),
						'brgy_account_id' => $this->session->brgy_account_id,
						'brgy_staff_account_id' => $this->session->brgy_staff_account_id,
						'user_type' => $this->session->user_type
					);
					$this->lm->log($log_data);

					$code_number = 1;
					$this->output->set_output(json_encode(
						array('message' => 'Investment fund was successfully added', 'code' => $code_number))
					);
				}
			}
		}
	}

	public function __lender_monthly_return($lender_id, $investment_id, $investment_application_id , $reference_code, $monthly_return, $invest_term)
	{
		$year_term = $invest_term;
		$date_entry = date('Y-m-d');
		$current_time = date('H:i:s');
		$date_entry_day = date("d", strtotime($date_entry));
		$date_entry_month = date("m", strtotime($date_entry));
		$date_entry_year = date("Y", strtotime($date_entry));
		$startdate = strtotime($date_entry);
		$startdate = strtotime("+1 month", $startdate);// + 1 TO START THE COUNTING TO NEXT MONTH
		$enddate = strtotime("+$year_term year", $startdate);
		$year_term_in_mos = $year_term * 12;//GET THE TOTAL MONTHLY FROM YEARS
		$ctr = 0;//COUNTER TO INDICATE WHERE WE GONNA BREAK THE WHILE LOOP

		//DECLARE ARRAY FIRST WE WILL USING THIS VARIABLE FOR STORING MONTHS RESULT
		$date_monthly_return_arr = array();
		//STARTS FROM 29 AND UP
		if ($date_entry_day >= 29)
		{
			while ($ctr < $year_term_in_mos) 
			{	
				//SET TO 0 AFTER COUTING THE 12 AS DECEMBER TO START AGAIN THE COUNTING IN JANUARY
				if ($date_entry_month == 12)
					$date_entry_month = 0;
				//ADD 1 EVERY LOOP FOR COUTING MONTHS
				$date_entry_month++;
				//COUNT THE TOTAL DAYS OF THE MONTH
				$number_of_days_to_this_month = cal_days_in_month(CAL_GREGORIAN, $date_entry_month, date('Y',$startdate));
				//CHECK IF THE DAY ENTERED IS GREATER THAN THEN USE THE MAXIMUM DAY OF THE MONTH
				if ($date_entry_day > $number_of_days_to_this_month)
				{
					$dateObj   = DateTime::createFromFormat('!m', $date_entry_month);
					$monthName = $dateObj->format('m');  //CONVERT NUMBER TO MONTH NAME
					$date_monthly_return =  date('Y',$startdate).'-'.$monthName.'-'.$number_of_days_to_this_month.' '.$current_time;//Y-m-d H:i:s 
					$date_entry = strtotime(date('Y', $startdate).'-'.sprintf('%02d', $date_entry_month).'-'.$date_entry_day);
					$startdate = strtotime("+$number_of_days_to_this_month days", $date_entry);//ADD 1 MONTH
				}
				else
				{
					$dateObj   = DateTime::createFromFormat('!m', $date_entry_month);
					$monthName = $dateObj->format('m'); //CONVERT NUMBER TO MONTH NAME
					$date_monthly_return = date('Y',$startdate).'-'.$monthName.'-'.$date_entry_day.' '.$current_time;
					$date_entry = strtotime(date('Y', $startdate).'-'.sprintf('%02d', $date_entry_month).'-'.$date_entry_day);
					$startdate = strtotime("+$number_of_days_to_this_month days", $date_entry);//ADD 1 MONTH
				}
				$ctr++;
				//STORE DATA TO AN ARRAY
				$date_monthly_return_arr [] .= $date_monthly_return;
			}
		}
		else
		{
			while ($startdate < $enddate) 
			{
			  	$date_monthly_return =  date("Y-m-d", $startdate).' '.$current_time;//Y-m-d H:i:s
			  	$startdate = strtotime("+1 month", $startdate);
			  	//STORE DATA TO AN ARRAY
			  	$date_monthly_return_arr [] .= $date_monthly_return;
			}
		}

		//COUNT ALL THE MONTHS TO BE RETURNED
		$ctr_mos = count($date_monthly_return_arr);
		for ($i = 0; $i < $ctr_mos; $i++) 
		{
			$monthly_returns_data[] = array(
				'date_return' => $date_monthly_return_arr[$i],
				'lender_id' => $lender_id,
				'investment_id' => $investment_id,
				'investment_application_id' => $investment_application_id,
				'registered_brgy_id' => $this->session->registered_brgy_id,
				'reference_code' => $reference_code,
				'monthly_return' => $monthly_return
			);
		}
		$insert_monthly_returns = $this->lmrm->insert_monthly_returns($monthly_returns_data);
		return $insert_monthly_returns;
	}

	//START COMPUTING FROM INNVESTMENT TO GET THE INTEREST RATES, TOTAL RETURN AND THE MONTHLY INTEREST RATES
	//TAKE NOTE THE INTEREST RATES IS DYNAMIC FOR EVEY BRGY. IT'S NOT ALL THE SAME 
	public function __compute_investment($invest_amount, $invest_term)
	{
		$year_terms = $invest_term;
		$total_interest = 0;
	    $interest_rate = 0;
	    $monthly_return = 0;
	    $total_return = 0;
	    $no_of_mos = 0;

	    $get_brgy_interest_rates = $this->iirm->get_brgy_interest_rates();
	    if ($get_brgy_interest_rates->num_rows() > 0) 
	    {
	    	foreach ($get_brgy_interest_rates->result() as $row) 
		    {
		    	$one_year_interest = $row->one_year;
		    	$two_year_interest = $row->two_year;
		    	$three_year_interest = $row->three_year;
		    	$four_year_interest = $row->four_year;
		    	$five_year_interest = $row->five_year;
		    }
	    }

	    if ($year_terms == 1) 
        {
          $no_of_mos = 12;//CONVERT YEAR TO 12 MOS
          $interest_rate = $one_year_interest;//INTEREST RATE FOR 1 YEAR
         $total_interest = $interest_rate * ($invest_amount  / 100);//TOTAL INTEREST
        }
        elseif ($year_terms == 2)
        {
          $no_of_mos = 24;//CONVERT YEAR TO 24 MOS
          $interest_rate = $two_year_interest;//INTEREST RATE FOR 2 YEARS
         $total_interest = $interest_rate * ($invest_amount  / 100);
        }
        elseif ($year_terms == 3)
        {
          $no_of_mos = 36;//CONVERT YEAR TO 36 MOS
          $interest_rate = $three_year_interest;//INTEREST RATE FOR 3 YEARS
         $total_interest = $interest_rate * ($invest_amount  / 100);
        }
        elseif ($year_terms == 4)
        {
          $no_of_mos = 48;//CONVERT YEAR TO 48 MOS
          $interest_rate = $four_year_interest;//INTEREST RATE FOR 4 YEARS
         $total_interest = $interest_rate * ($invest_amount  / 100);
        }
        elseif ($year_terms == 5)
        {
          $no_of_mos = 60;//CONVERT YEAR TO 60 MOS
          $interest_rate = $four_year_interest;//INTEREST RATE FOR 5 YEARS
         $total_interest = $interest_rate * ($invest_amount  / 100);
        }

        $total_return = $invest_amount + $total_interest;//TOTAL RETURN CAPITAL + TOTAL OF MONTHLY RETURN
        $monthly_return = $total_interest / $no_of_mos; //MONTHLY INTEREST RETURN
        $interest_return = $total_interest;//TOTAL INTEREST

        $return_results = array(
        	'interest_rate' => $interest_rate,
        	'interest_return' => $interest_return,
        	'monthly_return' => $monthly_return,
        	'total_return' => $total_return
        );
        return $return_results;//RETURN THE ALL RESULTS
	}

	//START COMPUTING FROM LOAN TO GET THE INTEREST RATES, TOTAL REPAYMENT AND THE MONTHLY INTEREST RATES
	//TAKE NOTE THE INTEREST RATES IS DYNAMIC FOR EVEY BRGY. IT'S NOT ALL THE SAME 
	public function __compute_loan($loan_amount, $loan_term)
	{
		$month_terms = $loan_term;
		$total_interest = 0;
	    $interest_rate = 0;
	    $monthly_repayment = 0;
	    $total_repayment = 0;

	    $get_brgy_interest_rates = $this->lirm->get_brgy_interest_rates_loan();
	    if ($get_brgy_interest_rates->num_rows() > 0) 
	    {
	    	foreach ($get_brgy_interest_rates->result() as $row) 
		    {
		    	$one_mo_interest = $row->one_mo;
		    	$two_mo_interest = $row->two_mo;
		    	$three_mo_interest = $row->three_mo;
		    	$four_mo_interest = $row->four_mo;
		    	$five_mo_interest = $row->five_mo;
		    	$six_mo_interest = $row->six_mo;
		    	$seven_mo_interest = $row->seven_mo;
		    	$eight_mo_interest = $row->eight_mo;
		    	$nine_mo_interest = $row->nine_mo;
		    	$ten_mo_interest = $row->ten_mo;
		    	$eleven_mo_interest = $row->eleven_mo;
		    	$twelve_mo_interest = $row->twelve_mo;
		    }
	    }

	    if ($month_terms == 1) 
        {
          	$interest_rate = $one_mo_interest;//INTEREST RATE FOR 1 YEAR
         	$total_interest = $interest_rate * ($loan_amount  / 100);//TOTAL INTEREST
        }
        elseif ($month_terms == 2)
        {
          	$interest_rate = $two_mo_interest;//INTEREST RATE FOR 2 YEARS
         	$total_interest = $interest_rate * ($loan_amount  / 100);
        }
        elseif ($month_terms == 3)
        {
          	$interest_rate = $three_mo_interest;//INTEREST RATE FOR 3 YEARS
         	$total_interest = $interest_rate * ($loan_amount  / 100);
        }
        elseif ($month_terms == 4)
        {
          	$interest_rate = $four_mo_interest;//INTEREST RATE FOR 4 YEARS
         	$total_interest = $interest_rate * ($loan_amount  / 100);
        }
        elseif ($month_terms == 5)
        {
          	$interest_rate = $five_mo_interest;//INTEREST RATE FOR 5 YEARS
         	$total_interest = $interest_rate * ($loan_amount  / 100);
        }
        elseif ($month_terms == 6)
        {
          	$interest_rate = $six_mo_interest;//INTEREST RATE FOR 5 YEARS
         	$total_interest = $interest_rate * ($loan_amount  / 100);
        }
        elseif ($month_terms == 7)
        {
          	$interest_rate = $seven_mo_interest;//INTEREST RATE FOR 5 YEARS
         	$total_interest = $interest_rate * ($loan_amount  / 100);
        }
        elseif ($month_terms == 8)
        {
          	$interest_rate = $eight_mo_interest;//INTEREST RATE FOR 5 YEARS
         	$total_interest = $interest_rate * ($loan_amount  / 100);
        }
        elseif ($month_terms == 9)
        {
          	$interest_rate = $nine_mo_interest;//INTEREST RATE FOR 5 YEARS
         	$total_interest = $interest_rate * ($loan_amount  / 100);
        }
        elseif ($month_terms == 10)
        {
          	$interest_rate = $ten_mo_interest;//INTEREST RATE FOR 5 YEARS
         	$total_interest = $interest_rate * ($loan_amount  / 100);
        }
        elseif ($month_terms == 11)
        {
          	$interest_rate = $eleven_mo_interest;//INTEREST RATE FOR 5 YEARS
         	$total_interest = $interest_rate * ($loan_amount  / 100);
        }
        elseif ($month_terms == 12)
        {
          	$interest_rate = $twelve_mo_interest;//INTEREST RATE FOR 5 YEARS
         	$total_interest = $interest_rate * ($loan_amount  / 100);
        }

        $total_repayment = $loan_amount + $total_interest;//TOTAL REPAYMENT CAPITAL + TOTAL OF MONTHLY REPAYMENT
        $monthly_repayment = ($loan_amount + $total_interest) / $month_terms; //MONTHLY REPAYMENT
        $interest_repayment = $total_interest;//TOTAL INTEREST

        $return_results = array(
        	'interest_rate' => $interest_rate,
        	'interest_repayment' => $interest_repayment,
        	'monthly_repayment' => $monthly_repayment,
        	'total_repayment' => $total_repayment
        );
        return $return_results;//RETURN THE ALL RESULTS
	}


	//AJAX RETURN
	public function get_investment_app_req_registered_brgy()
	{	
		$this->__is_not_completed();
		$investment_application_id = $this->secret_id_md5($this->input->post('secret_id'));

		$get_investment_app_req_registered_brgy = $this->iam->get_investment_app_req_registered_brgy($investment_application_id);
		$ajax_ret_invest_app_req_registered_brgy = null;
		if ($get_investment_app_req_registered_brgy->num_rows() > 0) 
		{
			foreach ($get_investment_app_req_registered_brgy->result() as $row) 
			{
				$ajax_ret_invest_app_req_registered_brgy[] = array(
					'full_name' => $row->full_name,
					'mobile_no' => $row->mobile_no,
					'email' => $row->email,
					'address' => $row->address,
					'date_created' => $row->date_created,
					'reference_code' => $row->reference_code,
					'invest_amount' => number_format($row->invest_amount,2),
					'payment_options' => $row->payment_options,
					'gov_id' => $row->gov_id,
					'source_of_income' => $row->source_of_income,
					'monthly_income' => number_format($row->monthly_income,2),
					'invest_term' => $row->invest_term,
					'investment_application_id' => $row->investment_application_id.md5('scrt')
				);
			}
		}
			
		if (!$ajax_ret_invest_app_req_registered_brgy) 
			show_404();
		else
			$this->output->set_output(json_encode($ajax_ret_invest_app_req_registered_brgy));
	}

	//GET THE SPECIFIC REQUIREMENT INVESTMENT
	public function get_this_requirements_investment()
	{
		$this->__is_not_completed();
		
		$investment_application_id = $this->secret_id_md5($this->input->post('secret_id'));

		$get_this_requirements = $this->irm->get_this_requirements($investment_application_id);
		$ajax_ret_requirements = null;

		if ($get_this_requirements->num_rows() > 0) 
		{
			foreach ($get_this_requirements->result() as $row) 
			{
				$ajax_ret_requirements[] = array(
					'gov_id' => $row->gov_id,
					'source_of_income' => $row->source_of_income,
					'monthly_income' => $row->monthly_income
				);
			}
		}
			
		if (!$ajax_ret_requirements) 
			show_404();
		else
			$this->output->set_output(json_encode($ajax_ret_requirements));
	}

	public function accept_investment_app()
	{
		$this->__is_not_completed();

		$investment_application_id = $this->secret_id_md5($this->input->post('id'));
		$full_name = $this->input->post('full_name');
		$reference_code = $this->input->post('reference_code');
		$mobile_no = $this->input->post('mobile_no');
		$amount = $this->input->post('amount');

		$accept_investment_app = $this->iam->accept_investment_app($investment_application_id);
		if ($accept_investment_app) 
		{
			//NOTIFY THE USER THAT HIS/HER APPLICATION WAS APPROVED
			$sms_message = 'Congrats '.$full_name.' your investment application was approved by the Brgy. pls bring the exact capital amount '.$amount.' to be invested. Ref Code: '.$reference_code;
			$to_send_sms = $this->to_send_sms($mobile_no, $sms_message);

			//DO LOGS
			$log_data = array(
				'action' => 'New investment application approved',
				'user_agent' => $this->user_agent(),
				'platform' => $this->platform(),
				'brgy_account_id' => $this->session->brgy_account_id,
				'brgy_staff_account_id' => $this->session->brgy_staff_account_id,
				'user_type' => $this->session->user_type
			);
			$this->lm->log($log_data);
			header("location: ".base_url('barangay/investment_applications/?invest_app_accepted?').date('Ymdhis?').md5(1).md5(2));
		}
	}

	public function reject_investment_app()
	{
		$this->__is_not_completed();

		$investment_application_id = $this->secret_id_md5($this->input->post('id'));

		$full_name = $this->input->post('full_name');
		$reference_code = $this->input->post('reference_code');
		$mobile_no = $this->input->post('mobile_no');
		$amount = $this->input->post('amount');
		$note = $this->input->post('note');

		$reject_investment_app = $this->iam->reject_investment_app($investment_application_id, $note);
		if ($reject_investment_app) 
		{
			//NOTIFY THE USER THAT HIS/HER APPLICATION WAS REJECTED
			$sms_message = 'Hello '.$full_name.' your investment application was rejected by the Brgy. Note: '.$note.' Ref Code: '.$reference_code;
			$to_send_sms = $this->to_send_sms($mobile_no, $sms_message);

			//DO LOGS
			$log_data = array(
				'action' => 'Investment application rejected',
				'user_agent' => $this->user_agent(),
				'platform' => $this->platform(),
				'brgy_account_id' => $this->session->brgy_account_id,
				'brgy_staff_account_id' => $this->session->brgy_staff_account_id,
				'user_type' => $this->session->user_type
			);
			$this->lm->log($log_data);
			header("location: ".base_url('barangay/investment_applications/?invest_app_rejected?').date('Ymdhis?').md5(1).md5(2));
		}
	}

	public function withdraw_cash()
	{
		$this->__is_not_completed();
		$code_number = 0;
		$lender_id = $this->secret_id_md5($this->input->post('lender_id'));
		$withdrawal_id = $this->secret_id_md5($this->input->post('withdrawal_id'));
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$mobile_no = $this->input->post('mobile_no');
		$withdraw_amount = $this->input->post('withdraw_amount');
		$reference_code = $this->input->post('reference_code');

		if ($this->session->has_userdata('brgy_staff_account_id'))
			$check_pass = $this->__check_credentials_brgy_staff($this->session->email, $password);
		else
			$check_pass = $this->__check_credentials_brgy_admin($this->session->email, $password);

		//CHECK FOR THE EXACT AMOUNT TO BE WITHDRAWN
		$withdraw_data = array('reference_code' => $reference_code, 'amount' => $withdraw_amount);
		//DO TRAPPINGS
		if (!$password) 
		{
			$this->output->set_output(json_encode(
				array('message' => 'Input password', 'code' => $code_number))
			);
		}
		elseif (!$email || !$lender_id || !$withdrawal_id || !$mobile_no || !$withdraw_amount || !$reference_code) 
		{
			$this->output->set_output(json_encode(
				array('message' => 'Opps something went wrong!', 'code' => $code_number))
			);
		}
		elseif ($check_pass->num_rows() < 1) 
		{
			$this->output->set_output(json_encode(
				array('message' => 'Invalid password', 'code' => $code_number))
			);
		}
		elseif ($this->wm->lender_request_withdrawals($withdraw_data)->num_rows() < 1)
		{
			$this->output->set_output(json_encode(
				array('message' => 'Opps something went wrong!', 'code' => $code_number))
			);
		}
		else
		{
			$brgy_new_balance = $this->brgy_current_balance() - $withdraw_amount;
			$brgy_transaction_data = array(
				'registered_brgy_id' => $this->session->registered_brgy_id,
				'debit' => $withdraw_amount,
				'withdrawal_id' => $withdrawal_id,
				'reference_code' => $reference_code,
				'type' => 'Withdraw',
				'type_code' => 1,
				'balance' => $brgy_new_balance
			);
			$brgy_transaction = $this->transaction->insert_transaction($brgy_transaction_data);

			if ($brgy_transaction > 0) 
			{
				//GET THE CURRENT BALANCE THEN MINUS FROM THE AMOUNT WITHDRAWN
				$lender_new_balance = $this->lender_current_balance($lender_id) - $withdraw_amount;
				$lender_transaction_data = array(
					'lender_id' => $lender_id,
					'from_brgy_id' => $this->session->registered_brgy_id,
					'withdrawal_id' => $withdrawal_id,
					'reference_code' => $reference_code,
					'debit' => $withdraw_amount,
					'type' => 'Withdraw',
					'type_code' => 3,//TYPE CODE 3 IS TO INDICATE THAT THIS TRANSACTION FOR WITHDRAWALS
					'balance' => $lender_new_balance
				);
				$lender_transaction = $this->ltm->insert_lender_transaction($lender_transaction_data);
				if ($lender_transaction > 0) 
				{
					//UPDATE THE WITHDRAWAL TABLE IT THE TRANSACTION WAS DONE
					$withdrawal_data = array(
						'status' => 1//WITHDRAWN
					);
					$approve_request = $this->wm->update_withdrawal($withdrawal_data,$withdrawal_id);//WITHDRAW
				}
			}
			//DO LOGS
			$log_data = array(
				'action' => 'Withdraw cash',
				'user_agent' => $this->user_agent(),
				'platform' => $this->platform(),
				'brgy_account_id' => $this->session->brgy_account_id,
				'brgy_staff_account_id' => $this->session->brgy_staff_account_id,
				'user_type' => $this->session->user_type
			);
			$this->lm->log($log_data);

			$code_number = 1;
			$this->output->set_output(json_encode(
				array('message' => 'Cash successfully withdrawn', 'code' => $code_number))
			);
		}
	}

	public function withdrawals()
	{
		$this->__is_not_completed();

		$data['active_transactions'] = 'withdarwals';//FOR NAVBAR ACTIVATOR
		$data['barangay_withdrawals'] = 'barangay_withdrawals';//JQUERY INDICATOR
		$data['title'] = 'Transactions | Withdarwals';

		$reference_code = $this->input->get('reference_code');//SEARCH FOR REQUESTED WITHDRAW
		$data['request_withdrawal'] = null;
		$data['user_details'] = null;
		if (isset($reference_code)) 
		{	
			$request_data = array('reference_code' => $reference_code, 'status' => 0);
			$data['request_withdrawal'] = $this->wm->lender_request_withdrawals($request_data);
			foreach ($data['request_withdrawal']->result() as $row) 
			{
				$data['user_details'] = $this->udm->get_this_user_details($row->lender_id);
			}
		}

		if ($this->session->user_type == 'brgy_admin')//GET THE DETAILS OF THE USER WHO LOGGED IN
			$data['brgy_user_details'] = $this->__get_this_brgy_admin_details();
		else
			$data['brgy_user_details'] = $this->__get_this_brgy_staff_details();
		
		$data['brgy_details'] = $this->__get_this_brgy_details();//FULL DETAILS OF THE REGISTERED BRGY
		$data['transaction_withdrawals'] = $this->transaction_withdrawals();

		$this->load->view('templates/barangay_header.php', $data);
		$this->load->view('templates/barangaynav');
		$this->load->view('barangay/barangay_withdrawals');
		$this->load->view('templates/barangay_footer');
	}

	public function __do_trapping_accept_monthly_repayment($reference_code, $payment_amount, $password)
	{
		if ($this->session->has_userdata('brgy_staff_account_id'))
			$check_pass = $this->__check_credentials_brgy_staff($this->session->email, $password);
		else
			$check_pass = $this->__check_credentials_brgy_admin($this->session->email, $password);

		if (!$payment_amount && !$password) 
		{
			return 'Please input payment amount & password';
		}
		elseif ($payment_amount == '') {
			return 'Please input payment amount';
		}
		elseif (!is_numeric($payment_amount)) {
			return 'Invalid payment amount';
		}
		elseif ($payment_amount == 00) {
			return 'Please input payment amount at least 1.00';
		}
		elseif (!$password) {
			return 'Please input password';
		}
		elseif (!$reference_code) {
			return 'Opps something went wrong!';
		}
		elseif ($check_pass->num_rows() < 1) 
		{
			return 'Invalid password';
		}
	}
	// MONTHLY REPAYMENTS
	public function accept_monthly_repayment()
	{
		$code_number = 0;

		$reference_code = $this->input->post('ref_code');
		$payment_amount = $this->input->post('payment_amount');
		$original_payment_amount = $this->input->post('payment_amount');
		$password = $this->input->post('password');

		$trapping_message = null;
		//COMMENT THIS SYNTAXT BELOW IF YOU WANT TO DIABLE THE TRAPPING
		$trapping_message = $this->__do_trapping_accept_monthly_repayment($reference_code, $payment_amount, $password);

		if ($trapping_message) 
        {
        	$this->output->set_output(json_encode(
				array('message' => $trapping_message, 'code' => $code_number)
			));
        }
		else 
		{
			// GET NOT FULLY PAID REPAYMENT
			$loan_repayment_data = array(
				'reference_code' => $reference_code,
				'is_fully_paid !=' => 1,
			);
			$pay_monthly_repayment = $this->bmrm->get_my_monthly_repayments($loan_repayment_data);
			if ($pay_monthly_repayment->num_rows() > 0) 
			{
				foreach ($pay_monthly_repayment->result() as $row) 
				{
					$borrower_id = $row->borrower_id;
					//A WEEK BEFORE TO GET REBATES
					if (strtotime(date('Y-m-d')) <= strtotime('-1 week', strtotime($row->due_date))) 
						$got_rebate = 1;
					else
						$got_rebate = 0;

					//TO GET THE REBATE RATE SET FROM LOAN DETAILS
					$loan_data = array(
						'loan_application_id' => $row->loan_application_id
					);
					$get_loan = $this->loan->get_this_loan($loan_data);
					if ($get_loan->num_rows() > 0) 
					{
						foreach ($get_loan->result() as $row_loan) 
						{
							$rebate_rate = $row_loan->rebate_rate;
						}
					}

					$outstanding = 0;
					$r_payable = 0;//REPAYMENT PAYABLE
					$p_payable = 0;//PENALTY PAYABLE
					$new_penalty_to_pay = 0;
					$new_amount_to_pay = 0;
					$check_fully_paid = 0;//counter or indicator
					//BREAK THE LOOP IF WALA NAY SAKTONG PAMBAYAD
					if ($payment_amount <= 0) {
						break;
					}

					$amount_to_be_paid = $row->monthly_repayment - $row->amount_paid;//USED FOR REBATE INDICATOR KUNG SAKTO BA ANG NA BAYAD SA SA AMONTAZATION

					$outstanding = ($row->monthly_repayment + $row->penalty) - ($row->amount_paid + $row->penalty_paid);
					//CHECK THE OUTSTANDING OF MONTHLY REPAYMENT THEN UPDATE THE FULLYPAID
					if ($outstanding <= $payment_amount) 
						$check_fully_paid = 1;

					if ($outstanding > 0 && $payment_amount > 0) 
					{
						//CHECK FIRST IF THE AMOUNT PAID KUNG KUWANG PA
						if ($row->monthly_repayment != $row->amount_paid && $row->monthly_repayment > $row->amount_paid) 
						{
							$r_payable = $row->monthly_repayment - $row->amount_paid;//KUWANG NGA BAYRANAN SA REPAYMENT
							if ($payment_amount >= $r_payable) 
							{	
								$payment_amount -= $r_payable;//MINUSAN PARA I PUNO SA KUWANG NGA REPAYMENT
								$new_amount_to_pay = $row->amount_paid + $r_payable;//MAO NI ANG I UPDATE SA AMOUNT PAID
							}
							else
							{
								$new_amount_to_pay = $row->amount_paid + $payment_amount;
								$payment_amount = 0.00;
							}
						}
						//CHECK IF THERE'S A PENALTY
						if ($row->penalty > 0 && number_format($payment_amount,2) > 0) 
						{
							$p_payable = $row->penalty - $row->penalty_paid;//KUWANG NGA BAYRANAN SA PENALTY
							if ($payment_amount >= $p_payable) 
							{	
								$payment_amount -= $p_payable;
								$new_penalty_to_pay = $row->penalty_paid + $p_payable;//MAO NI ANG I UPDATE SA PENALTY PAID
							}
							else
							{
								$new_penalty_to_pay = $row->penalty_paid + $payment_amount;
								$payment_amount = 0.00;
							}
						}

						if ($new_penalty_to_pay > 0 && $new_amount_to_pay > 0) 
						{
							$repayment_data = array(
								'amount_paid' => $new_amount_to_pay,
								'penalty_paid' => $new_penalty_to_pay
							);
						}
						elseif($new_amount_to_pay > 0)
						{
							$repayment_data = array(
								'amount_paid' => $new_amount_to_pay
							);
						}
						elseif($new_penalty_to_pay > 0)
						{
							$repayment_data = array(
								'penalty_paid' => $new_penalty_to_pay
							);
						}

						if ($check_fully_paid > 0) 
						{
							$repayment_data_outstanding = array(
								'is_fully_paid' => 1
							);
							//CHECK IF SAKTO SA MONTHLY REPAYMENT IYANG NABAYAD UG WEEK BEFORE PARA MAKA KUHA SIYAG REBATE
							if ($amount_to_be_paid == $new_amount_to_pay && $row->is_passed_due_date == 0.00 && $got_rebate > 0) 
							{
								$rebate = $rebate_rate * ($row->monthly_repayment / 100);
								$rebate_data = array(
									'rebate' => $rebate
								);
								$repayment_data = array_merge($repayment_data, $repayment_data_outstanding, $rebate_data);
							}
							else
							{
								$repayment_data = array_merge($repayment_data, $repayment_data_outstanding);
							}
						}
						$this->bmrm->update_monthly_repayment($repayment_data, $row->borrower_monthly_repayment_id);
					}
				}
				//INSERT TO PAYMENT TABLE
				$payment_data = array(
					'borrower_id' => $borrower_id,
					'registered_brgy_id' => $this->session->registered_brgy_id,
					'reference_code' => $reference_code,
					'amount' => $original_payment_amount,
					'type' => 'Payment Borrower',
					'type_code' => 1
				);
				$payment_id = $this->pm->insert_payment($payment_data);
				if ($payment_id > 0) 
				{
					//NOTE ADD TAG REMARKS KUNG WITH OR WITHOUT PENALTY
					//INSERT BORROWER TRANSACTIONS
					$borrower_new_outstanding_balance = $this->get_borrower_outstanding_current_balance($borrower_id) - $original_payment_amount;
					$borrower_transaction_data = array(
						'borrower_id' => $borrower_id,
						'payment_id' => $payment_id,
						'reference_code' => $reference_code,
						'from_brgy_id' => $this->session->registered_brgy_id,
						'credit' => $original_payment_amount,
						'type' => 'Payment',
						'type_code' => 2,
						'outstanding_balance' => $borrower_new_outstanding_balance
					);
					$this->btm->insert_borrower_transaction($borrower_transaction_data);
				}
			}

			// CHECK IF ALL HAVE FULLY PAID IF TRUE UPDATE LOAN STATUS SET TO 2 COMPLETED
			$check_loan_repayment_data = array(
				'reference_code' => $reference_code,
				'is_fully_paid !=' => 1,
			);
			$check_monthly_repayment = $this->bmrm->get_my_monthly_repayments($check_loan_repayment_data);
			if ($check_monthly_repayment->num_rows() == 0) 
			{
				//UPDATE LOAN STATUS
				$loan_data = array(
					'status' => 2 //SET TO 2 COMPLETED
				);

				$update_loan_status = $this->loan->update_loan($reference_code,$loan_data);
			}

			$loan_details = $this->loan->get_this_loan_details($this->input->post('ref_code'));
			if ($loan_details->num_rows() > 0) 
			{
				foreach ($loan_details->result() as $row) 
				{
					
					$full_name = $row->first_name.' '.$row->last_name;
					// 'loan_amount' => number_format($row->loan_amount,2),
					// 'total_repayment' => number_format($row->total_repayment,2),
					// 'interest_rate' => $row->interest_rate.'%',
					// 'loan_term' => $loan_term,
					// 'date_begin' => $row->date_created,
					// 'date_end' => $row->end_term,
					// 'status' => $loan_status,
					// 'reference_code' => $row->reference_code
				}
			}

			$log_data = array(
				'action' => 'Received payments',
				'user_agent' => $this->user_agent(),
				'platform' => $this->platform(),
				'brgy_account_id' => $this->session->brgy_account_id,
				'user_type' => $this->session->user_type
			);
			$this->lm->log($log_data);

			$code_number = 1;
			$this->output->set_output(json_encode(
				array('message' => 'Payment received '.number_format($original_payment_amount,2).' from '.$full_name, 'code' => $code_number))
			);
		}
	}

	public function payments()
	{
		$this->__is_not_completed();

		$data['active_transactions'] = 'payments';//FOR NAVBAR ACTIVATOR
		$data['barangay_payments'] = 'barangay_payments';//JQUERY INDICATOR
		$data['title'] = 'Transactions | Payments';

		if ($this->session->user_type == 'brgy_admin')//GET THE DETAILS OF THE USER WHO LOGGED IN
			$data['brgy_user_details'] = $this->__get_this_brgy_admin_details();
		else
			$data['brgy_user_details'] = $this->__get_this_brgy_staff_details();
		
		$data['brgy_details'] = $this->__get_this_brgy_details();//FULL DETAILS OF THE REGISTERED BRGY
		$data['transaction_payments'] = $this->transaction_payments();

		$this->load->view('templates/barangay_header.php', $data);
		$this->load->view('templates/barangaynav');
		$this->load->view('barangay/barangay_payments');
		$this->load->view('templates/barangay_footer');
	}

	// AJAX RETURN
	public function get_monthly_repayment()
	{
		$ajax_ret_get_this_monthly_repayments= null;

		$loan_repayment_data = array(
			'reference_code' => $this->input->post('reference_code')
		);
		$monthly_repayments = $this->bmrm->get_my_monthly_repayments($loan_repayment_data);
		$loan_details = $this->loan->get_this_loan_details($this->input->post('reference_code'));
		// var_dump($loan_details->result());
		// die();
		if ($loan_details->num_rows() > 0) 
		{
			foreach ($loan_details->result() as $row) 
			{
				if ($row->loan_term > 1)
					$loan_term = $row->loan_term.' months';
				else
					$loan_term = $row->loan_term.' month';

				if ($row->status == 1) 
	            {
	                $loan_status = 'Ongoing...';
	            }
	            elseif ($row->status == 2) 
	            {
	               	$loan_status = 'Completed';
	            }
	            elseif ($row->status == 3) 
	            {
	                $loan_status = 'Incomplete';  
	            }

	            $penalty_rate = $row->penalty_rate;
	            $rebate_rate = $row->rebate_rate;
				//0 index
				$ajax_ret_get_this_monthly_repayments[] = array(
					'full_name' => $row->first_name.' '.$row->last_name,
					'loan_amount' => number_format($row->loan_amount,2),
					'total_repayment' => number_format($row->total_repayment,2),
					'interest_rate' => $row->interest_rate.'%',
					'loan_term' => $loan_term,
					'date_begin' => $row->date_created,
					'date_end' => $row->end_term,
					'status' => $loan_status,
					'reference_code' => $row->reference_code
				);
			}
		}
		if ($monthly_repayments->num_rows() > 0) 
		{
			foreach ($monthly_repayments->result() as $row) 
			{
				$outstanding = ($row->monthly_repayment + $row->penalty) - ($row->amount_paid + $row->penalty_paid);
				$status =  ($row->is_fully_paid == 1 ) ? 'Fully paid' : 'Pending...';

				$ajax_ret_get_this_monthly_repayments[] = array(
					'monthly_repayment' => number_format($row->monthly_repayment,2),
					'amount_paid' => number_format($row->amount_paid,2),
					'outstanding' => number_format($outstanding,2),
					'rebate' => ($rebate_rate > 0) ? number_format($row->rebate,2) : 'N/A',//number_format($row->rebate,2),
					'penalty' => ($penalty_rate > 0) ? number_format($row->penalty,2) : 'N/A',//number_format($row->penalty,2),
					'penalty_paid' => ($penalty_rate > 0) ? number_format($row->penalty_paid,2) : 'N/A',//number_format($row->penalty_paid,2),
					'due_date' => date('Y-m-d H:i:s', strtotime($row->due_date)),
					'status' => $status,
					'countable_outstanding' => $outstanding //TOTAL OUTSTANDING SA MONTHLY REPAYMENT
				);
			}
		}
		
		$this->output->set_output(json_encode($ajax_ret_get_this_monthly_repayments));
	}

	public function earnings()
	{
		$this->__is_not_completed();

		$data['active_transactions'] = 'Earnings';//FOR NAVBAR ACTIVATOR
		$data['barangay_transactions'] = 'barangay_transactions';//JQUERY INDICATOR
		$data['title'] = 'Transactions | Earnings';

		if ($this->session->user_type == 'brgy_admin')//GET THE DETAILS OF THE USER WHO LOGGED IN
			$data['brgy_user_details'] = $this->__get_this_brgy_admin_details();
		else
			$data['brgy_user_details'] = $this->__get_this_brgy_staff_details();
		
		$data['brgy_details'] = $this->__get_this_brgy_details();//FULL DETAILS OF THE REGISTERED BRGY

		$this->load->view('templates/barangay_header.php', $data);
		$this->load->view('templates/barangaynav');
		$this->load->view('barangay/barangay_earnings');
		$this->load->view('templates/barangay_footer');
	}

	public function messages($page = 'inbox')
	{
		$this->__is_not_completed();

		$data['active_messages'] = 'active';//FOR NAVBAR ACTIVATOR
		$data['barangay_messages'] = 'barangay_messages';//JQUERY INDICATOR
		$data['title'] = 'Messages';

		if ($this->session->user_type == 'brgy_admin')//GET THE DETAILS OF THE USER WHO LOGGED IN
			$data['brgy_user_details'] = $this->__get_this_brgy_admin_details();
		else
			$data['brgy_user_details'] = $this->__get_this_brgy_staff_details();
		
		$data['brgy_details'] = $this->__get_this_brgy_details();//FULL DETAILS OF THE REGISTERED BRGY

		$this->load->view('templates/barangay_header.php', $data);
		$this->load->view('templates/barangaynav');
		$this->load->view('barangay/barangay_messages');
		$this->load->view('templates/barangay_footer');
	}

	public function feedbacks()
	{
		$this->__is_not_completed();

		$data['barangay_feedbacks'] = 'barangay_feedbacks';//JQUERY INDICATOR
		$data['title'] = 'Feedbacks';

		if ($this->session->user_type == 'brgy_admin')//GET THE DETAILS OF THE USER WHO LOGGED IN
			$data['brgy_user_details'] = $this->__get_this_brgy_admin_details();
		else
			$data['brgy_user_details'] = $this->__get_this_brgy_staff_details();
		
		$data['brgy_details'] = $this->__get_this_brgy_details();//FULL DETAILS OF THE REGISTERED BRGY
		$this->load->view('templates/barangay_header.php', $data);
		$this->load->view('templates/barangaynav');
		$this->load->view('barangay/barangay_feedbacks');
		$this->load->view('templates/barangay_footer');
	}

	public function __user_logs()
	{
		$this->__is_not_completed();

		$data['barangay_user_logs'] = 'barangay_user_logs';//JQUERY INDICATOR
		$data['title'] = 'User Logs';

		if ($this->session->user_type == 'brgy_admin')//GET THE DETAILS OF THE USER WHO LOGGED IN
			$data['brgy_user_details'] = $this->__get_this_brgy_admin_details();
		else
			$data['brgy_user_details'] = $this->__get_this_brgy_staff_details();
		
		$data['brgy_details'] = $this->__get_this_brgy_details();//FULL DETAILS OF THE REGISTERED BRGY
		$data['get_logs'] = $this->lm->get_logs();
		
		$this->load->view('templates/barangay_header.php', $data);
		$this->load->view('templates/barangaynav');
		$this->load->view('barangay/barangay_user_logs');
		$this->load->view('templates/barangay_footer');
	}

	//METHOD FOR TRAPPING
	public function __do_trapping_update_brgy($first_name, $last_name, $position, $gender, $dob, $civil_status, $mobile_no, $street, $barangay, $city, $state_prov, $zip_code, $oor, $gov_id)
	{

		if (!$first_name && !$last_name && !$position && !$gender && !$dob && !$civil_status && !$mobile_no && !$street && !$barangay && !$city && !$state_prov && !$zip_code && !$oor && !$gov_id) {
			return 'Please fill all the required fields';
		}
		elseif (!$first_name) {
			return 'Please input first name';
		}
		elseif (!$last_name) {
			return 'Please input last name';
		}
		elseif (!$position) {
			return 'Please input position';
		}
		elseif (!$gender) {
			return 'Please select gender';
		}
		elseif (!$dob) {
			return 'Please select date of birth';
		}
		elseif (!$civil_status) {
			return 'Please select civil status';
		}
		elseif (!$mobile_no) {
			return 'Please input mobile no.';
		}
		elseif (!$street) {
			return 'Please input street';
		}
		elseif (!$barangay) {
			return 'Please input barangay';
		}
		elseif (!$city) {
			return 'Please input city';
		}
		elseif (!$state_prov) {
			return 'Please input state/province';
		}
		elseif (!$zip_code) {
			return 'Please input zip_code';
		}
		elseif (!$oor) {
			return 'Please select Ownership of residence';
		}
		elseif (!$gov_id) {
			return 'Please upload any government id';
		}
	}

	public function update_profile()
	{
		$code_number = 0;

		$first_name = $this->input->post('first_name');
	    $middle_name = $this->input->post('middle_name');//NOT REQUIRED
	    $last_name = $this->input->post('last_name');
	    $position = $this->input->post('position');
	    $gender = $this->input->post('gender');
		$dob =	$this->input->post('dob');
    	$civil_status = $this->input->post('civil_status');
        $spouse_name = $this->input->post('spouse_name');//NOT REQUIRED
        $mobile_no = $this->input->post('mobile_no');
        $tel_no = $this->input->post('tel_no');//NOT REQUIRED
        $street = $this->input->post('street');
        $barangay = $this->input->post('barangay');
        $city = $this->input->post('city');
        $state_prov = $this->input->post('state_prov');
        $zip_code = $this->input->post('zip_code');
        $oor = $this->input->post('oor');
        $gov_id = $_FILES['gov_id']['name'];//FOR GOVERNMENT ID FILE

        $trapping_message = null;
        //COMMENT THIS SYNTAXT BELOW IF YOU WANT TO DIABLE THE TRAPPING
        $trapping_message = $this->__do_trapping_update_brgy($first_name, $last_name, $position, $gender, $dob, $civil_status, $mobile_no, $street, $barangay, $city, $state_prov, $zip_code, $oor, $gov_id);

        if ($trapping_message) 
        {
        	$this->output->set_output(json_encode(
				array('message' => $trapping_message, 'code' => $code_number)
			));
        }
        else
        {
        	$config['upload_path']          = './public/uploads/barangay/gov_ids';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 1000;
	        $config['max_width']            = 0;
	        $config['max_height']           = 0;
	        $this->load->library('upload', $config);
	        $this->upload->initialize($config);

	        if ( ! $this->upload->do_upload('gov_id'))
	        {
	            $this->output->set_output(json_encode(
					array('message' => strip_tags($this->upload->display_errors()), 'code' => $code_number)
				));
	        }
	        else
	        {
	        	$data = array('upload_data' => $this->upload->data());
	  		 	$target_file = $data['upload_data']['full_path'];
	            $pos = strpos($target_file, 'public/');//GET THE PATH THAT STARTS FROM "public/"
	            $target_file = substr($target_file, $pos);

	            $brgy_admin_staff_data = array(
	            	'first_name' => $first_name,
	            	'middle_name' => $middle_name,
	            	'last_name' => $last_name,
	            	'position' => $position,
	            	'gender' => $gender,
	            	'dob' => date('Y-m-d', strtotime($dob)),
	            	'civil_status' => $civil_status,
	            	'spouse_name' => $spouse_name,
	            	'mobile_no' => $mobile_no,
	            	'tel_no' => $tel_no,
	            	'street' => $street,
	            	'barangay' => $barangay,
	            	'city' => $city,
	            	'state_prov' => $state_prov,
	            	'zip_code' => $zip_code,
	            	'oor' => $oor,
	            	'gov_id' => $target_file,
	            	'is_completed' => 1
	            );

	            $update_brgy_admin_user_details = 0;
	            $update_brgy_staff_user_details = 0;

	            if (!$this->session->has_userdata('brgy_staff_account_id'))
					$update_brgy_admin_user_details = $this->budm->update_brgy_admin_user_details($brgy_admin_staff_data);//FOR BRGY ADMIN ONLY
				else
					$update_brgy_staff_user_details = $this->budm->update_brgy_staff_user_details($brgy_admin_staff_data);//FOR BRGY STAFF ONLY

				if ($update_brgy_staff_user_details > 0) 
				{
					$code_number = 1;
					//DO LOGS
					$log_data = array(
						'action' => 'Brgy staff account updated a profile',
						'user_agent' => $this->user_agent(),
						'platform' => $this->platform(),
						'brgy_staff_account_id' => $this->session->brgy_staff_account_id,
						'user_type' => $this->session->user_type
					);
					$this->lm->log($log_data);

					$this->output->set_output(json_encode(
						array('message' => 'Your profile was successfully updated', 'code' => $code_number)
					));
				}
	            elseif ($update_brgy_admin_user_details > 0) 
	            {
	            	$get_all_default_val = $this->dm->get_all_default_val();
	            	if ($get_all_default_val->num_rows() > 0) 
	            	{
	            		//GET ALL DEFAULTS VALUE THEN SET TO EACH BRGY.
		            	foreach ($get_all_default_val->result() as $row) 
		            	{
		            		$min_loan = $row->min_loan;//MINIMUM LOAN VALUE
		            		$max_loan = $row->max_loan;//MAXIMUM LOAN VALUE
		            		$min_invest = $row->min_invest;//MINIMUM INVESTMENT VALUE
		            		$max_invest = $row->max_invest;//MAXIMUM INVESTMENT VALUE
		            		$min_loan_rate = $row->min_loan_rate;//MINIMUM INTEREST RATE FOR LOAN
		            		$max_loan_rate = $row->max_loan_rate;//MAXIMUM INTEREST RATE FOR LOAN
		            		$min_invest_rate = $row->min_invest_rate;//MINIMUM INTEREST RATE FOR INVESTMENT
		            		$max_invest_rate = $row->max_invest_rate;//MAXIMUM INTEREST RATE FOR INVESTMENT
		            		$max_rebate_rate = $row->max_rebate_rate;//MAXIMUM RATE FOR RABATES
		            		$min_rebate_rate = $row->min_rebate_rate;//MINIMUM RATE FOR RABATES
		            		$max_penalty_rate = $row->max_penalty_rate;//MAXIMUM RATE FOR PENALTY
		            		$min_penalty_rate = $row->min_penalty_rate;//MINIMUM RATE FOR PENALTY
		            	}
	            	}
	            	//THE START INSERTING ALL DEFAULT VALUE SUCH AS INTEREST RATES, MIN & MAX LOAN, MIN & MAX INVEST ECT...
	            	$brgy_account_id_data = array(
	            		'brgy_account_id' => $this->session->brgy_account_id
	            	);
	            	$set_yearly_term_lender = $this->ytlm->set_yearly_term_lender($brgy_account_id_data);
	            	$set_monthly_term_borrower = $this->mtbm->set_monthly_term_borrower($brgy_account_id_data);
	            	
	            	$min_max_loan_invest_data = array(
	            		'brgy_account_id' => $this->session->brgy_account_id,
	            		'min_loan' => $min_loan,
	            		'max_loan' => $max_loan,
	            		'min_invest' => $min_invest,
	            		'max_invest' => $max_invest
	            	);
	            	$set_min_max_loan_invest = $this->mmlim->set_min_max_loan_invest($min_max_loan_invest_data);

	            	$loan_interest_rate_data = array(
	            		'brgy_account_id' => $this->session->brgy_account_id,
	            		'one_mo' => $min_loan_rate,
	            		'two_mo' => $max_loan_rate
	            	);
	            	$set_loan_interest_rate = $this->lirm->set_loan_interest_rate($loan_interest_rate_data);

	            	$invest_interest_rate_data = array(
	            		'brgy_account_id' => $this->session->brgy_account_id,
	            		'one_year' => $min_invest_rate,
	            		'two_year' => $min_invest_rate + 1,
	            		'three_year' => $min_invest_rate + 2,
	            		'four_year' => $min_invest_rate + 3,
	            		'five_year' => $max_invest_rate
	            	);
	            	$set_invest_interest_rate = $this->iirm->set_invest_interest_rate($invest_interest_rate_data);

	            	$min_max_rebate_penalty_rate_data = array(
	            		'brgy_account_id' => $this->session->brgy_account_id,
	            		'penalty_rate' => $min_penalty_rate,
	            		'rebate_rate' => $min_rebate_rate
	            	);
	            	$set_min_max_rebate_penalty_rate = $this->rprm->set_min_max_rebate_penalty_rate($min_max_rebate_penalty_rate_data);

	            	//DO LOGS
					$log_data = array(
						'action' => 'Brgy admin account updated a profile',
						'user_agent' => $this->user_agent(),
						'platform' => $this->platform(),
						'brgy_account_id' => $this->session->brgy_account_id,
						'user_type' => $this->session->user_type
					);
					$this->lm->log($log_data);
					$code_number = 1;
	            	$this->output->set_output(json_encode(
						array('message' => 'Your profile was successfully updated', 'code' => $code_number)
					));
	            }
	        }
        }
	}
}