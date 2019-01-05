<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lender extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->lender_session();
		$this->load->model('User_details_model', 'udm');
		$this->load->model('User_accounts_model', 'uam');
		$this->load->model('Registered_brgy_model', 'rbm');
		$this->load->model('Yearly_term_lender_model', 'ytlm');
		$this->load->model('Min_max_loan_invest_model', 'mmlim');
		$this->load->model('Investment_applications_model', 'iam');
		$this->load->model('Investment_requirements_model', 'irm');
		$this->load->model('Invest_interest_rate_model', 'iirm');
		$this->load->model('Investments_model', 'im');
		$this->load->model('Lender_transactions_model', 'ltm');
		$this->load->model('Lender_monthly_returns_model', 'lmrm');
		$this->load->model('Withdrawals_model', 'wm');
		$this->load->model('Member_requests_model', 'mrm');

	}

	public function __check_password($password)
	{
		$credentials_data = array(
			'password' => md5($password),
			'user_account_id' => $this->session->user_account_id,
		);
		return $this->uam->check_password($credentials_data)->num_rows();
	}

	//USER'S FULL DETAILS
	public function __get_this_user_details()
	{
		$get_this_user_details = $this->uam->get_this_user_details();
		if ($get_this_user_details->num_rows() > 0) 
		{
			foreach ($get_this_user_details->result() as $row) 
			{
				if ($row->is_borrower == 1) 
					$data['main_user_type'] = 'borrower';
				else
					$data['main_user_type'] = 'lender';

				$data['first_name'] = $row->first_name;
				$data['middle_name'] = $row->middle_name;
				$data['last_name'] = $row->last_name;
				$data['gender'] = $row->gender;
				$data['dob'] = $row->dob;
				$data['civil_status'] = $row->civil_status;
				$data['spouse_name'] = $row->spouse_name;
				$data['profile'] = $row->photo;
				$data['mobile_no'] = $row->mobile_no;
				$data['street'] = $row->street;
				$data['barangay'] = $row->barangay;
				$data['city'] = $row->city;
				$data['state_prov'] = $row->state_prov;
				$data['zip_code'] = $row->zip_code;
				$data['oor'] = $row->oor;
				$data['gov_id'] = $row->gov_id;
				$data['photo'] = $row->photo;

				$data['email'] = $row->email;
				$data['username'] = $row->username;
			}
		}
		return $data;
	}


	public function index()
	{
		$this->__is_not_completed();
		//QUARTERLY CHECKER
		$this->check_quarterly_earnings();
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
		
		$data['all_brgy'] = $this->rbm->get_all_brgy();
		$data['member_request'] = $this->mrm->get_member_request();

		$data['lender_dashboard'] = 'lender_dashboard'; //JQUERY INDICATOR
		$data['title'] = 'Dashboard | MangJuam';
		$data['dashboard'] = 'active';

		$data['user_details'] = $this->__get_this_user_details();

		$data['current_balance'] = $this->ltm->get_lender_current_balance($this->session->lender_id);

		$investment_return_data = array(
			'status' => 0,
			'lender_id' => $this->session->lender_id
		);
		$data['my_monthly_returns'] = $this->lmrm->get_my_monthly_returns($investment_return_data);

		$data['my_investment'] = $this->im->my_investment($this->session->lender_id);

		$data['transactions_limit'] = $this->ltm->get_lender_transactions_limit($this->session->lender_id);
		$data['investments_limit'] = $this->im->get_lender_investments_limit($this->session->lender_id);

		$this->load->view('templates/lender_header', $data);
		$this->load->view('templates/lendernav');
		$this->load->view('user/lender/lender_dashboard');
		$this->load->view('templates/lender_footer');
	}

	public function dashboard()
	{
		$this->index();
	}

	public function __do_trapping_apply_invest($barangay_for_other,$invest_term,$invest_amount,$full_name,$mobile_no,$email,$address,$payment_options,$source_of_income,$monthly_income,$gov_id)
	{
		$total_invest = 0;
		$max_invest = 0;
		$min_invest = 0;

		if ($this->session->registered_brgy_id) 
			$registered_brgy_id = $this->session->registered_brgy_id;
		else
			$registered_brgy_id = $this->secret_id_md5($barangay_for_other);

		$get_max_min_ivest = $this->mmlim->get_this_min_max_invest_loan($registered_brgy_id);
		if ($get_max_min_ivest->num_rows() > 0) 
		{
			foreach ($get_max_min_ivest->result() as $row) 
			{
				$max_invest = $row->max_invest;
				$min_invest = $row->min_invest;
			}
		}
			
		$check_total_invest = $this->im->check_total_invest($this->session->lender_id);
		if ($check_total_invest->num_rows() > 0) 
		{
			foreach ($check_total_invest->result() as $row) 
			{
				$total_invest = $row->total_invest;
			}
		}

		if (!$barangay_for_other && !$invest_term && !$invest_amount && !$full_name && !$mobile_no && !$email && !$address && !$payment_options && !$source_of_income && !$monthly_income && !$gov_id) {
			return 'Please fill all the required fields';
		}
		elseif (!$barangay_for_other && !$this->session->registered_brgy_id) {
			return 'Please select barangay you want to invest';
		}
		elseif (!$invest_term) {
			return 'Please select investment term';
		}
		elseif (!$invest_amount) {
			return 'Please input investment amount';
		}
		elseif (!is_numeric($invest_amount)) {
			return 'Please input investment amount';
		}
		elseif (!$payment_options) {
			return 'Please select payment options';
		}
		elseif (!$source_of_income) {
			return 'Please select source of income';
		}
		elseif (!$monthly_income) {
			return 'Please input monthly income';
		}
		elseif (!is_numeric($monthly_income)) {
			return 'Invalid input monthly income';
		}
		elseif (!$gov_id) {
			return 'Please upload any valid government id';
		}
		elseif ($min_invest > $invest_amount) {
			return 'Minimum invest at least '.number_format($min_invest,2);
		}
		elseif ($this->iam->check_pending_investment_app($this->session->lender_id)->num_rows() > 0) 
		{
			return 'Sorry you can\'t submit an application right now. Make sure you have have no pending investment application.';
		}
		elseif (!$full_name || !$mobile_no || !is_numeric($mobile_no) || !$email || !valid_email($email) || !$address) {
			return 'Opps something went wrong!';
		}
		else 
		{
			$total_invest += $invest_amount;
			if ($total_invest > $max_invest)
			{
				return 'Maximum investment to your brgy is '.number_format($max_invest,2);
			}
			//ika duha check kung ni lapas a maximum investment sa iyang brgy
		}
			
	}

	public function get_brgy_interest_rates()
	{
		$barangay_for_other = $this->secret_id_md5($this->input->post('barangay_for_other'));
		$get_brgy_interest_rates = $this->iirm->get_brgy_interest_rates($barangay_for_other);

		if ($get_brgy_interest_rates->num_rows() > 0) 
		{
			foreach ($get_brgy_interest_rates->result() as $row)
			{
				$ajax_ret_brgy_interest_rates[] = array(
					'one_year' => $row->one_year,
					'two_year' => $row->two_year,
					'three_year' => $row->three_year,
					'four_year' => $row->four_year,
					'five_year' => $row->five_year
				);
			}
		}
		return $this->output->set_output(json_encode($ajax_ret_brgy_interest_rates));
	}

	public function invest()
	{
		$this->__is_not_completed();
		$data['all_brgy'] = $this->rbm->get_all_brgy();
		$data['member_request'] = $this->mrm->get_member_request();

		$data['lender_invest'] = 'invest';//JQUERY INDICATOR
		$data['title'] = 'Invest | MangJuam';
		$data['invest'] = 'active';

		$other_brgy = $this->secret_id_md5($this->input->get('brgy'));

		if ($other_brgy)
			$registered_brgy_id = $other_brgy;
		else
			$registered_brgy_id = $this->session->registered_brgy_id;

		$data['user_details'] = $this->__get_this_user_details();
		$data['registered_brgy'] = $this->rbm->registered_brgy();
		$data['get_this_yearly_terms'] = $this->ytlm->get_this_yearly_terms($registered_brgy_id);

		$get_this_min_max_invest = $this->mmlim->get_this_min_max_invest_loan($registered_brgy_id);
		if ($get_this_min_max_invest->num_rows() > 0) 
		{
			foreach ($get_this_min_max_invest->result() as $row ) 
			{
				$data['min_invest'] = $row->min_invest;
				$data['max_invest'] = $row->max_invest;
			}
		}

		$this->load->view('templates/lender_header', $data);
		$this->load->view('templates/lendernav');
		$this->load->view('user/lender/lender_invest');
		$this->load->view('templates/lender_footer');
	}

	public function re_apply()
	{
		$this->__is_not_completed();
		$data['all_brgy'] = $this->rbm->get_all_brgy();
		$data['member_request'] = $this->mrm->get_member_request();

		$data['lender_invest'] = 'invest';//JQUERY INDICATOR
		$data['title'] = 'Re-Apply | MangJuam';
		$data['invest'] = 'active';

		$other_brgy = $this->secret_id_md5($this->input->get('brgy'));
		$investment_application_id = $this->secret_id_md5($this->input->get('investment_app'));

		if ($other_brgy)
			$registered_brgy_id = $other_brgy;
		else
			$registered_brgy_id = $this->session->registered_brgy_id;

		$data['user_details'] = $this->__get_this_user_details();
		$data['registered_brgy'] = $this->rbm->registered_brgy();
		$data['get_this_yearly_terms'] = $this->ytlm->get_this_yearly_terms($registered_brgy_id);
		
		$get_this_invest_app_req = $this->iam->get_this_invest_app_req($investment_application_id);
		if ($get_this_invest_app_req->num_rows() > 0) 
		{
			foreach ($get_this_invest_app_req->result() as $row) 
			{
				$data['investment_application_id'] = $row->investment_application_id.md5('scrt');
				$data['invest_amount'] = $row->invest_amount;
				$data['invest_term'] = $row->invest_term;
				$data['source_of_income'] = $row->source_of_income;
				$data['monthly_income'] = $row->monthly_income;
				$data['gov_id'] = $row->gov_id;
				$data['payment_options'] = $row->payment_options;
			}
		}
		
		$get_this_min_max_invest = $this->mmlim->get_this_min_max_invest_loan($registered_brgy_id);
		if ($get_this_min_max_invest->num_rows() > 0) 
		{
			foreach ($get_this_min_max_invest->result() as $row ) 
			{
				$data['min_invest'] = $row->min_invest;
				$data['max_invest'] = $row->max_invest;
			}
		}

		$this->load->view('templates/lender_header', $data);
		$this->load->view('templates/lendernav');
		$this->load->view('user/lender/lender_invest_re_apply');
		$this->load->view('templates/lender_footer');
	}

	public function re_apply_invest()
	{
		$this->__is_not_completed();
		$code_number = 0;
		//REGISTERED BRGY ID WHERE HE/SHE WANT TO INVEST
		$barangay_for_other = $this->input->post('barangay_for_other');
		$invest_term = $this->input->post('invest_term');
		$invest_amount = $this->input->post('invest_amount');
		$full_name = $this->input->post('full_name');
		$mobile_no = $this->input->post('mobile_no');
		$email = $this->input->post('email');
		$address = $this->input->post('address');
		$payment_options = $this->input->post('payment_options');
		$source_of_income = $this->input->post('source_of_income');
		$monthly_income = $this->input->post('monthly_income');
		$gov_id = $_FILES['gov_id']['name'];
		$investment_app_id = $this->secret_id_md5($this->input->post('investment_app_id'));
		//BYPASS THE TRAPPING
		if (!$gov_id) 
		{
			$gov_id = 'set*';	
		}

		$trapping_message = null;
        $trapping_message = $this->__do_trapping_apply_invest($barangay_for_other,$invest_term,$invest_amount,$full_name,$mobile_no,$email,$address,$payment_options,$source_of_income,$monthly_income,$gov_id);

        if (!$investment_app_id) 
        {
        	$this->output->set_output(json_encode(
				array('message' => 'Something went wrong!', 'code' => $code_number)
			));
        }
        elseif ($trapping_message) 
        {
        	$this->output->set_output(json_encode(
				array('message' => $trapping_message, 'code' => $code_number)
			));
        }
        else
        {
        	$upload_err = '';
        	//USER UPLOAD PHOTOS
        	if ($gov_id != 'set*') 
        	{
        		$config['upload_path']          = './public/uploads/main_user/lender/req/gov_ids';
		        $config['allowed_types']        = 'gif|jpg|png';
		        $config['max_size']             = 1000;
		        $config['max_width']            = 0;
		        $config['max_height']           = 0;

		        $this->load->library('upload', $config);

		        $this->upload->initialize($config);

		        if ( ! $this->upload->do_upload('gov_id'))
		        {
		            $upload_err = strip_tags($this->upload->display_errors());
		        }
		        else 
		        {
		        	$data = array('upload_data' => $this->upload->data());
		  		 	$target_file = $data['upload_data']['full_path'];
		            $pos = strpos($target_file, 'public/');//GET THE PATH THAT STARTS FROM "public/"
		            $target_file = substr($target_file, $pos);
		        }
        	}

        	if ($upload_err != '') 
        	{
        		$code_number = 0;
        		$this->output->set_output(json_encode(
					array('message' => $upload_err, 'code' => $code_number)
				));
        	}
        	else
        	{
        		$investment_app_data = array(
					'invest_term' => $invest_term,
					'invest_amount' => $invest_amount,
					'payment_options' => $payment_options,
					'is_accepted' => 0,
				);
				$update_invetsment_application = $this->iam->update_investment_app($investment_app_data, $investment_app_id);

				if ($gov_id != 'set*') 
				{
					$investment_req_data = array(
						'source_of_income' => $source_of_income,
						'monthly_income' => $monthly_income,
						'gov_id' => $target_file
					);
				}
				else
				{
					$investment_req_data = array(
						'source_of_income' => $source_of_income,
						'monthly_income' => $monthly_income
					);
				}
				$update_invetsment_req = $this->irm->update_investment_req($investment_req_data, $investment_app_id);

				$log_data = array(
					'action' => 'Re-Applied investment application',
					'user_agent' => $this->user_agent(),
					'platform' => $this->platform(),
					'user_account_id' => $this->session->user_account_id,
					'user_type' => $this->session->user_type
				);
				$this->lm->log($log_data);

				$code_number = 1;
				$this->output->set_output(json_encode(
						array('message' => 'You have successfully re-applied your investment application', 'code' => $code_number)
				));
        	}
        }
	}

	public function apply_invest()
	{
		$this->__is_not_completed();
		$code_number = 0;
		$reference_code = rand(111,999).strtoupper(substr($this->session->username, 0, 3)).rand(1111,9999).'LNDR'.substr(date('Y'), 2, 2);
		$barangay_for_other = $this->input->post('barangay_for_other');//BRGY ID WHERE THE USER WANT TO INVEST
		$invest_term = $this->input->post('invest_term');
		$invest_amount = $this->input->post('invest_amount');
		$full_name = $this->input->post('full_name');
		$mobile_no = $this->input->post('mobile_no');
		$email = $this->input->post('email');
		$address = $this->input->post('address');
		$payment_options = $this->input->post('payment_options');
		$source_of_income = $this->input->post('source_of_income');
		$monthly_income = $this->input->post('monthly_income');
		$gov_id = $_FILES['gov_id']['name'];

		//CHECK IF USER IS VERIFIED
		if (!$this->session->has_userdata('registered_brgy_id'))
			$registered_brgy_id = $this->secret_id_md5($barangay_for_other);
		else
			$registered_brgy_id = $this->session->registered_brgy_id;

		$trapping_message = null;
        $trapping_message = $this->__do_trapping_apply_invest($barangay_for_other,$invest_term,$invest_amount,$full_name,$mobile_no,$email,$address,$payment_options,$source_of_income,$monthly_income,$gov_id);

        if ($trapping_message) 
        {
        	$this->output->set_output(json_encode(
				array('message' => $trapping_message, 'code' => $code_number)
			));
        }
        else
        {
        	$config['upload_path']          = './public/uploads/main_user/lender/req/gov_ids';
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

	            $investment_app_data = array(
					'lender_id' => $this->session->lender_id,
					'registered_brgy_id' => $registered_brgy_id,
					'reference_code' => $reference_code,
					'invest_term' => $invest_term,
					'invest_amount' => $invest_amount,
					'full_name' => $full_name,
					'mobile_no' => $mobile_no,
					'email' => $email,
					'address' => $address,
					'payment_options' => $payment_options
				);
				$invetsment_application = $this->iam->insert_investment_app($investment_app_data);

				$investment_req_data = array(
					'lender_id' => $this->session->lender_id,
					'registered_brgy_id' => $registered_brgy_id,
					'investment_application_id' => $invetsment_application,
					'source_of_income' => $source_of_income,
					'monthly_income' => $monthly_income,
					'gov_id' => $target_file
				);
				$invetsment_req = $this->irm->insert_investment_req($investment_req_data);

				$log_data = array(
					'action' => 'Submitted investment application',
					'user_agent' => $this->user_agent(),
					'platform' => $this->platform(),
					'user_account_id' => $this->session->user_account_id,
					'user_type' => $this->session->user_type
				);
				$this->lm->log($log_data);

				$code_number = 1;
				$this->output->set_output(json_encode(
						array('message' => 'You have successfully submitted your investment application', 'code' => $code_number)
				));
	        }
        }
	}

	public function review_invest_app()
	{
		$this->__is_not_completed();
		$data['all_brgy'] = $this->rbm->get_all_brgy();
		$data['member_request'] = $this->mrm->get_member_request();

		$data['lender_review_invest_app'] = 'review_invest_app';//JQUERY INDICATOR
		$data['title'] = 'Review Applications | MangJuam';
		$data['review_invest_app'] = 'active';

		$data['user_details'] = $this->__get_this_user_details();
		$data['invest_app'] = $this->iam->get_my_investment_app();

		$this->load->view('templates/lender_header', $data);
		$this->load->view('templates/lendernav');
		$this->load->view('user/lender/lender_review_invest_app');
		$this->load->view('templates/lender_footer');
	}

	//AJAX RETURNED
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
					'investment_application_id' => $row->investment_application_id.md5('scrt'),
					'b_photo_brgy' => $row->b_photo_brgy,//brgy details starts here
					'b_barangay' => $row->b_barangay,
					'b_street' => $row->b_street,
					'b_city' => $row->b_city,
					'b_state_prov' => $row->b_state_prov,
					'b_zip_code' => $row->b_zip_code,
					'b_mobile_no' => $row->b_mobile_no,
					'b_tel_no' => $row->b_tel_no
				);
			}
		}
			
		if (!$ajax_ret_invest_app_req_registered_brgy) 
			show_404();
		else
			$this->output->set_output(json_encode($ajax_ret_invest_app_req_registered_brgy));
	}

	public function investments()
	{
		$this->__is_not_completed();
		$data['all_brgy'] = $this->rbm->get_all_brgy();
		$data['member_request'] = $this->mrm->get_member_request();

		$data['lender_investments'] = 'investments';//JQUERY INDICATOR
		$data['title'] = 'Investments | MangJuam';
		$data['investments'] = 'active';

		$data['user_details'] = $this->__get_this_user_details();
		$data['my_investments'] = $this->im->get_my_investments($this->session->lender_id);

		$this->load->view('templates/lender_header', $data);
		$this->load->view('templates/lendernav');
		$this->load->view('user/lender/lender_investments');
		$this->load->view('templates/lender_footer');
	}

	public function investment_status()
	{
		$this->__is_not_completed();
		$data['all_brgy'] = $this->rbm->get_all_brgy();
		$data['member_request'] = $this->mrm->get_member_request();

		$data['lender_investment_status'] = 'investment_status';//JQUERY INDICATOR
		$data['title'] = 'Investment Status | MangJuam';
		$data['investment_status'] = 'active';

		$data['user_details'] = $this->__get_this_user_details();
		$investment_data = array(
			'reference_code' => $this->input->get('ref'),
			'lender_id' => $this->session->lender_id
		);
		$data['investment'] = $this->im->get_this_investment($investment_data);
		$investment_return_data = array(
			'reference_code' => $this->input->get('ref'),
			'lender_id' => $this->session->lender_id
		);
		$data['monthly_returns'] = $this->lmrm->get_my_monthly_returns($investment_return_data);

		$this->load->view('templates/lender_header', $data);
		$this->load->view('templates/lendernav');
		$this->load->view('user/lender/lender_investment_status');
		$this->load->view('templates/lender_footer');
	}

	public function cancel_request($withdrawal_id = 0)
	{
		$this->__is_not_completed();

		$withdrawal_id = $this->secret_id_md5($withdrawal_id);

		$withdrawal_data = array(
			'status' => 2//CANCELLED
		);

		$cancle_request = $this->wm->update_withdrawal($withdrawal_data,$withdrawal_id);

		if ($cancle_request > 0) 
		{
			$log_data = array(
				'action' => 'Cancelled request for withdrawal',
				'user_agent' => $this->user_agent(),
				'platform' => $this->platform(),
				'user_account_id' => $this->session->user_account_id,
				'user_type' => $this->session->user_type
			);

			$this->lm->log($log_data);
			header("location: ".base_url('lender/transactions/withdrawals?cancelled_request=?'.md5(date('H:i:s')))."");
		}
	}

	public function transactions($type = 'all')
	{
		$this->__is_not_completed();
		$data['all_brgy'] = $this->rbm->get_all_brgy();
		$data['member_request'] = $this->mrm->get_member_request();

		if ($type == 'all') 
		{
			$data['all'] = 'active';
			$data['lender_all_transactions'] = 'all_transactions';//JQUERY INDICATOR
			$data['lender_transactions'] = $this->ltm->get_lender_transactions($this->session->lender_id);
		}
		elseif ($type == 'withdrawals') 
		{
			$data['withdrawals'] = 'active';
			$data['lender_withdrawals'] = 'withdrawals';//JQUERY INDICATOR
			$data['lender_current_balance'] = $this->ltm->get_lender_current_balance($this->session->lender_id);
			$data['my_withdrawals'] = $this->ltm->get_lender_withdrawals($this->session->lender_id);
			$request_data = array('lender_id' => $this->session->lender_id, 'status' => 0);
			$data['request_withdrawals'] = $this->wm->lender_request_withdrawals($request_data);

			if (!$this->session->registered_brgy_id) 
			{
				$data['my_available_balance_from_any_brgy'] = $this->ltm->get_available_balance_from_many_brgy($this->session->lender_id);//total balance from all of brgy invested
			}
		}
		elseif ($type == 'monthly_returned') 
		{
			$data['monthly_returned'] = 'active';
			$data['lender_monthly_returned'] = 'monthly_returned';//JQUERY INDICATOR
			$data['my_monthly_returned'] = $this->ltm->get_lender_monthly_returned($this->session->lender_id);
		}
		elseif ($type == 'investment_returned') 
		{
			$data['investment_returned'] = 'active';
			$data['lender_investment_returned'] = 'investment_returned';//JQUERY INDICATOR
			$data['my_investment_returned'] = $this->ltm->get_lender_investment_returned($this->session->lender_id);
		}
		$data['title'] = ucwords(str_replace('_', ' ', $type)).' transactions | MangJuam';
		$data['transactions'] = 'active';
		$data['user_details'] = $this->__get_this_user_details();

		$this->load->view('templates/lender_header', $data);
		$this->load->view('templates/lendernav');
		$this->load->view('user/lender/lender_'.$type);
		$this->load->view('templates/lender_footer');
	}

	public function __do_trapping_withdraw_cash($amount, $password, $barangay_for_other_w)
	{
		$current_balance = 0.00;

		if (!$this->session->registered_brgy_id) 
			$my_current_balance = $this->ltm->get_available_balance_from_this_brgy($this->session->lender_id,$barangay_for_other_w);//get the specfic balance from any other brgy
		else
			$my_current_balance = $this->ltm->get_lender_current_balance($this->session->lender_id);

		if ($my_current_balance->num_rows() > 0) 
		{
			foreach ($my_current_balance->result() as $row) 
			{
				$current_balance = $row->current_balance;
			}
		}

		if (!$this->session->registered_brgy_id && !$barangay_for_other_w) 
		{
			return 'Please select barangay';
		}
		elseif (!$amount && !$password) 
		{
			return 'Please input amount & password';
		}
		elseif ($amount === null) 
		{
			return 'Please input amount';
		}
		elseif (!$password) 
		{
			return 'Please input password';
		}
		elseif ($this->__check_password($password) < 1) 
		{
			return 'Incorrect password';
		}
		elseif (!is_numeric($amount)) 
		{
			return 'Invalid amount';
		}
		elseif ($amount < 1) 
		{
			return 'Minimum amount 1 peso';
		}
		elseif ($current_balance < $amount) 
		{
			return 'Insufficient balance';
		}

	}

	public function withdraw_cash()
	{
		$this->__is_not_completed();
		$code_number = 0;
		$password = $this->input->post('password_w');
		$amount = $this->input->post('amount_w');
		$barangay_for_other_w = $this->secret_id_md5($this->input->post('barangay_for_other_w'));
		
		$request_data = array('lender_id' => $this->session->lender_id, 'status' => 0);
		$pending_request = $this->wm->lender_request_withdrawals($request_data)->num_rows();

		$trapping_message = null;
		$trapping_message = $this->__do_trapping_withdraw_cash($amount, $password, $barangay_for_other_w);

		if ($trapping_message) 
		{
			$this->output->set_output(json_encode(
				array('message' => $trapping_message, 'code' => $code_number)
			));
		}
		elseif ($pending_request > 0) 
		{
			$this->output->set_output(json_encode(
				array('message' => 'Sorry you cannot send another request.', 'code' => $code_number)
			));
		}
		else
		{
			$date_time = date('Y-m-d H:i:s');

			if (!$this->session->registered_brgy_id) 
				$registered_brgy_id = $barangay_for_other_w;
			else
				$registered_brgy_id = $this->session->registered_brgy_id;

			$reference_code = rand(111,999).strtoupper(substr($this->session->username, 0, 3)).rand(1111,9999).'WDRW'.substr(date('Y'), 2, 2);
			$withdrawal_data = array(
				'lender_id' => $this->session->lender_id,
				'registered_brgy_id' => $registered_brgy_id,
				'reference_code' => $reference_code,
				'amount' => $amount
			);

			$withdrawn = $this->wm->insert_withdrawal($withdrawal_data);

			if ($withdrawn > 0) 
			{
				foreach ($this->uam->get_this_user_details()->result() as $row) 
				{
					if (strtolower($row->gender) == 'male')
						$suffix = 'Mr.';
					else
						$suffix = 'Ms.';

					$name = $row->first_name;
					$mobile_no = $row->mobile_no;
					$email = $row->email;
					$barangay = $row->barangay;
				}

				if (!$this->session->has_userdata('registered_brgy_id'))
					$barangay = 'you have requested for withdrawal';

				$sms_message = $suffix.' '.$name.', claim your cash '.$reference_code.' at Brgy. Hall '.$barangay.'. Bring any valid ID.';
				$to_send_sms = $this->to_send_sms($mobile_no, $sms_message);//uncomment lang ni kung i activate

				$log_data = array(
					'action' => 'Request for withdrawal',
					'user_agent' => $this->user_agent(),
					'platform' => $this->platform(),
					'user_account_id' => $this->session->user_account_id,
					'user_type' => $this->session->user_type
				);
				$this->lm->log($log_data);

				$code_number = 1;
				$this->output->set_output(json_encode(
					array('message' => 'Request for withdrawal was successfully submitted', 'code' => $code_number, 'amount' => number_format($amount,2),
					'reference_code' => $reference_code, 'date_time' => $date_time)
				));
			}	
		}
	}

	//COMMON VIEWS USED BY BORROWER & LENDER
	public function inbox()
	{
		$this->__is_not_completed();
		$data['all_brgy'] = $this->rbm->get_all_brgy();
		$data['member_request'] = $this->mrm->get_member_request();
		$data['inbox'] = 'l_inbox';//JQUERY INDICATOR
		$data['title'] = 'Inbox | MangJuam';
		$data['user_details'] = $this->__get_this_user_details();

		$this->load->view('templates/lender_header', $data);
		$this->load->view('templates/lendernav');
		$this->load->view('user/inbox');
		$this->load->view('templates/lender_footer');
	}

	//CHECK IF THE DETAILS IS INCOMPLETE THEN STAY TO INCOMPLETE PAGE
	public function __is_not_completed()
	{
		$get_this_incomplete_main_user = $this->udm->get_this_incomplete_main_user();
		if ($get_this_incomplete_main_user->num_rows() > 0) 
		{
			if ($this->session->is_lender > 0) 
			{
				header("location: ".base_url('lender/incomplete')."");
				die();
			}
			else 
			{	
				show_404();//IF THE SESSION SET AS BORROWER SHOW 404()
				die();
			}
			
		}
	}

	public function incomplete()
	{
		$data['user_incomplete'] = 'incomplete';//JQUERY INDICATOR
		$data['title'] = 'Incomplete | MangJuam';

		$get_this_incomplete_main_user = $this->udm->get_this_incomplete_main_user();
		//CHECK IF ALREADY COMPLETED
		if ($get_this_incomplete_main_user->num_rows() < 1) 
		{
			header("location: ".base_url('lender')."");
			die();
		}
		else
		{
			//FOR INCOMPLETE
			foreach ($get_this_incomplete_main_user->result() as $row) 
			{
				$data['first_name'] = $row->first_name;
				$data['middle_name'] = $row->middle_name;
				$data['last_name'] = $row->last_name;
				$data['gender'] = $row->gender;
				$data['dob'] = $row->dob;
				$data['civil_status'] = $row->civil_status;
				$data['spouse_name'] = $row->spouse_name;
				$data['mobile_no'] = $row->mobile_no;
				$data['street'] = $row->street;
				$data['barangay'] = $row->barangay;
				$data['city'] = $row->city;
				$data['state_prov'] = $row->state_prov;
				$data['zip_code'] = $row->zip_code;
				$data['oor'] = $row->oor;
				$data['gov_id'] = $row->gov_id;
				$data['url_location'] = $row->url_location;
				$data['for_approval'] = $row->for_approval;
				$data['reason_message'] = $row->reason_message;
			}
		}

		$this->load->view('templates/lender_header', $data);
		$this->load->view('templates/main_user_nav_incomplete');
		$this->load->view('user/incomplete');
		$this->load->view('templates/lender_footer');
	}

	public function profile()
	{
		$this->__is_not_completed();
		$data['all_brgy'] = $this->rbm->get_all_brgy();
		$data['member_request'] = $this->mrm->get_member_request();

		$data['user_profile'] = 'l_profile';//JQUERY INDICATOR
		$data['title'] = 'Profile | MangJuam';

		$data['user_details'] = $this->__get_this_user_details();

		$this->load->view('templates/lender_header', $data);
		$this->load->view('templates/lendernav');
		$this->load->view('user/profile');
		$this->load->view('templates/lender_footer');
	}

	public function settings($account = '')
	{
		$this->__is_not_completed();
		$data['all_brgy'] = $this->rbm->get_all_brgy();
		$data['member_request'] = $this->mrm->get_member_request();

		$data['user_settings'] = 'l_settings';

		$data['user_details'] = $this->__get_this_user_details();

			if ($account == 'change-email') 
			{
				$data['lender_change_email'] = 'change_email';//JQUERY INDICATOR
				$data['title'] = 'Change Email | MangJuam';
				$this->load->view('templates/lender_header', $data);
				$this->load->view('templates/lendernav');
				$this->load->view('user/change_email');
			}
			elseif($account == 'change-username')
			{
				$data['lender_change_username'] = 'change_username';//JQUERY INDICATOR
				$data['title'] = 'Change Username | MangJuam';
				$this->load->view('templates/lender_header', $data);
				$this->load->view('templates/lendernav');
				$this->load->view('user/change_username');
			}
			elseif ($account == 'change-password') 
			{
				$data['lender_change_password'] = 'change_password';//JQUERY INDICATOR
				$data['title'] = 'Change Username | MangJuam';
				$this->load->view('templates/lender_header', $data);
				$this->load->view('templates/lendernav');
				$this->load->view('user/change_password');
			}
			else
			{
				$data['lender_settings'] = 'settings';//JQUERY INDICATOR
				$data['title'] = 'Settings | MangJuam';

				$this->load->view('templates/lender_header', $data);
				$this->load->view('templates/lendernav');
				$this->load->view('user/settings');
			}

		$this->load->view('templates/lender_footer');
		
	}

	public function register_to_brgy()
	{
		$this->__is_not_completed();
		$code_number = 0;
		//CHECK FIRST IF THE USER ALREADY SENT A REQUEST TO SET A MEMO KUNG ASA DAPIT
		$count_request = $this->mrm->get_member_request()->num_rows();

		$register_to_brgy = $this->secret_id_md5($this->input->post('register_to_brgy'));
		$password = $this->input->post('password');
		$request_gov_id = $_FILES['request_gov_id']['name'];

		if (!$request_gov_id) 
		{
            return 'Please upload any government id';
        }
		elseif ($this->__check_password($password) < 1) 
		{
			//INCORRECT PASSWORD
			$this->output->set_output(json_encode(
				array('message' => 'Incorrect password', 'code' => $code_number)
			));
		}
		else
		{
			$config['upload_path']          = './public/uploads/main_user/gov_ids';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000;
            $config['max_width']            = 0;
            $config['max_height']           = 0;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('request_gov_id'))
            {
                $this->output->set_output(json_encode(
                    array('message' => strip_tags($this->upload->display_errors()), 'code' => $code_number)
                ));
            }
            else
            {

            	$data = array('upload_data' => $this->upload->data());
                $target_file = $data['upload_data']['full_path'];//PATH NAME
                $pos = strpos($target_file, 'public/');//GET THE PATH THAT STARTS FROM "public/"
                $target_file = substr($target_file, $pos);

                $user_profile_data = array(
                    'gov_id' => $target_file
                );

                $update_user_profile = $this->udm->update_user_profile($user_profile_data);

				if ($count_request > 0) 
				{
					$member_request_data = array(
						'registered_brgy_id' => $register_to_brgy,
						'status' => 0,
						'memo' => 'Waiting for approval'
					);

					$member_request_id = $this->mrm->update($member_request_data, $this->session->user_account_id);
				}
				else
				{
					//INSERT DATA
					$member_request_data = array(
						'registered_brgy_id' => $register_to_brgy,
						'user_account_id' => $this->session->user_account_id,
						'memo' => 'Waiting for approval'
					);

					$member_request_id = $this->mrm->insert($member_request_data);
				}
				if ($member_request_id > 0) 
				{
					$code_number = 1;
					$this->output->set_output(json_encode(
						array('message' => 'Request to register successfully submitted', 'code' => $code_number, 'memo' => 'Waiting for approval', 'count_request' => $count_request)
					));
				}
			}
		}
	}
}