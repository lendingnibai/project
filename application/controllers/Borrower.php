<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrower extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->borrower_session();
		$this->load->model('User_details_model', 'udm');
		$this->load->model('Investments_model', 'im');
		$this->load->model('Investment_applications_model', 'iam');
		$this->load->model('User_accounts_model', 'uam');
		$this->load->model('Registered_brgy_model', 'rbm');
		$this->load->model('Monthly_term_borrower_model', 'mtbm');
		$this->load->model('Min_max_loan_invest_model', 'mmlim');
		$this->load->model('Loan_interest_rate_model', 'lirm');
		$this->load->model('Loans_model', 'loans');
		$this->load->model('Loan_applications_model', 'lam');
		$this->load->model('Loan_requirements_model', 'lrm');
		$this->load->model('Borrower_monthly_repayments_model', 'bmrm');
		$this->load->model('Borrower_transactions_model', 'btm');
	}

	public function __get_this_user_details()//details sa user
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
		//used by all the methods
	}

	public function index()
	{
		//check if incomplete then pass to incomplete method
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

		//CHECK IF INCOMPLETE THEN PASS TO INCOMPLETE METHOD
		$data['borrower_dashboard'] = 'borrower_dashboard'; // FOR JQUERY PORPUSES
		$data['title'] = 'Dashboard | MangJuam';
		$data['dashboard'] = 'active';

		$data['user_details'] = $this->__get_this_user_details();

		$loan_data = array(
			'status !=' => 2,
			'borrower_id' => $this->session->borrower_id
		);
		$data['my_loan'] = $this->loans->get_this_loan($loan_data);
		$data['savings'] = $this->bmrm->borrower_savings($this->session->borrower_id);
		$data['outstanding_balance'] = $this->btm->get_borrower_outstanding_current_balance($this->session->borrower_id);
		$data['monthly_repayments'] = $this->bmrm->my_monthly_repayment_group_by($this->session->borrower_id, date('m'));
		$data['transactions_limit'] = $this->btm->get_borrower_transactions_limit($this->session->borrower_id);
		$data['loans_limit'] = $this->loans->get_borrower_loans_limit($this->session->borrower_id);

		$this->load->view('templates/borrower_header', $data);
		$this->load->view('templates/borrowernav');
		$this->load->view('user/borrower/borrower_dashboard');
		$this->load->view('templates/borrower_footer');
	}

	public function dashboard()
	{
		$this->index();
	}

	public function savings_list()
	{
		$this->__is_not_completed();

		//CHECK IF INCOMPLETE THEN PASS TO INCOMPLETE METHOD
		$data['borrower_savings'] = 'borrower_savings'; // FOR JQUERY PORPUSES
		$data['title'] = 'Savings List | MangJuam';
		$data['savings'] = 'active';

		$data['user_details'] = $this->__get_this_user_details();
		$data['savings'] = $this->bmrm->borrower_savings_list($this->session->borrower_id);
		$this->load->view('templates/borrower_header', $data);
		$this->load->view('templates/borrowernav');
		$this->load->view('user/borrower/borrower_savings');
		$this->load->view('templates/borrower_footer');

	}

	public function get_brgy_interest_rates_loan()
	{
		$this->__is_not_completed();

		$interest_rates_loan = $this->lirm->get_brgy_interest_rates_loan();
		if ($interest_rates_loan->num_rows() > 0) 
		{
			foreach ($interest_rates_loan->result() as $row) 
			{
				$ajax_ret_brgy_interest_rates_loan[] = array(
					'one_mo' => $row->one_mo,
					'two_mo' => $row->two_mo,
					'three_mo' => $row->three_mo,
					'four_mo' => $row->four_mo,
					'five_mo' => $row->five_mo,
					'six_mo' => $row->six_mo,
					'seven_mo' => $row->seven_mo,
					'eight_mo' => $row->eight_mo,
					'nine_mo' => $row->nine_mo,
					'ten_mo' => $row->ten_mo,
					'eleven_mo' => $row->eleven_mo,
					'twelve_mo' => $row->twelve_mo,
				);
			}
		}
		return $this->output->set_output(json_encode($ajax_ret_brgy_interest_rates_loan));
	}

	public function __do_trapping_apply_loan($loan_term,$loan_amount,$full_name,$mobile_no,$email,$address,$co_maker_1,$co_maker_2,$source_of_income,$monthly_income,$gov_id,$bill,$payslip,$brgy_permit,$mayor_permit)
	{
		$total_loan = 0;
		$total_invest = 0;
		$max_loan = 0;
		$min_loan = 0;

		$get_max_min_loan = $this->mmlim->get_this_min_max_invest_loan($this->session->registered_brgy_id);
		if ($get_max_min_loan->num_rows() > 0) 
		{
			foreach ($get_max_min_loan->result() as $row) 
			{
				$max_loan = $row->max_loan;
				$min_loan = $row->min_loan;
			}
		}

		$check_total_loan = $this->loans->check_total_loan($this->session->borrower_id);
		if ($check_total_loan->num_rows() > 0) 
		{
			foreach ($check_total_loan->result() as $row) 
			{
				$total_loan = $row->total_loan;
			}
		}

		$co_maker_arr = null;
		//CHECK IF THE BORROWER HAS 2 CO MAKERS
		if ($co_maker_1 && $co_maker_2){
			$loop = 2;
			$co_maker_arr[] = $co_maker_1;
			$co_maker_arr[] = $co_maker_2;
		}
		elseif($co_maker_1){
			$loop = 1;
			$co_maker_arr[] = $co_maker_1;
		}
		elseif($co_maker_2){
			$loop = 1;
			$co_maker_arr[] = $co_maker_2;
		}

		if (count($co_maker_arr) > 0) 
		{
			for ($i = 0; $i < $loop; $i++) {
				//CHECK TOTAL INVESTMENT OF THE CO MAKER
				$check_total_invest = $this->im->check_total_invest($co_maker_arr[$i]);
				if ($check_total_invest->num_rows() > 0) 
				{
					foreach ($check_total_invest->result() as $row) 
					{
						$total_invest += $row->total_invest;
					}
				}
			}
		}
			
		if (!$loan_term && !$loan_amount && !$full_name && !$mobile_no && !$email && !$address && !$co_maker_1 && !$co_maker_2 && !$source_of_income && !$monthly_income && !$gov_id && !$bill &&!$payslip && !$brgy_permit && !$mayor_permit) {
			return 'Please fill all the required fields';
		}
		elseif (!$loan_term) {
			return 'Please loan term';
		}
		elseif (!$loan_amount) {
			return 'Please input loan amount';
		}
		elseif (!is_numeric($loan_amount)) {
			return 'Invalid input loan amount';
		}
		elseif ($co_maker_arr == null) {
			return 'Select at least one co-maker';
		}
		elseif (!$source_of_income) {
			return 'Please select source of income';
		}
		elseif (!$monthly_income) {
			return 'Please input monthly income';
		}
		elseif (count($co_maker_arr) == 1 && $loan_amount > $total_invest) {
			return 'You need to choose an additional co-maker';
		}
		elseif (count($co_maker_arr) == 2 && $loan_amount > $total_invest) {
			return 'Sorry you need to choose another co-maker';
		}
		elseif ($co_maker_1 == $co_maker_2) {
			return 'Please select different co-maker';
		}
		elseif (!$gov_id) {
			return 'Please upload government ID';
		}
		elseif (!$bill) {
			return 'Please upload water/electrict bill';
		}
		elseif ($source_of_income == 'Business' && !$brgy_permit) {
			return 'Please upload brgy permit';
		}
		elseif ($source_of_income == 'Self Employed' && !$mayor_permit) {
			return 'Please upload mayor permit';
		}
		elseif ($source_of_income == 'Employee' && !$payslip) {
			return 'Please upload latest payslip';
		}
		elseif ($loan_amount < $min_loan) {
			return 'Minimum loan at least '.number_format($min_loan,2);
		}
		elseif ($this->lam->check_pending_loan_app($this->session->borrower_id)->num_rows() > 0) 
		{
			return 'Sorry you can\'t submit an application right now. Make sure you have no pending loan application.';
		}
		elseif (!$full_name || !$mobile_no || !is_numeric($mobile_no) || !$email || !valid_email($email) || !$address) {
			return 'Opps something went wrong!';
		}
		else
		{
			$total_loan += $loan_amount;
			if ($total_loan > $max_loan)
			{
				return 'Maximum loan to your brgy is '.number_format($max_loan,2);
			}
			//ika duha check kung ni lapas a maximum investment sa iyang brgy
		}
	}

	public function loan()
	{
		$this->__is_not_completed();

		$data['borrower_loan'] = 'loan';//for jquery porpuses
		$data['title'] = 'Loan | MangJuam';
		$data['loan']= 'active';

		$data['user_details'] = $this->__get_this_user_details();
		$data['monthly_term'] = $this->mtbm->get_this_monthly_term_borrower($this->session->registered_brgy_id);
		$data['co_makers'] = $this->im->available_co_maker($this->session->registered_brgy_id);

		$get_this_min_max_loan = $this->mmlim->get_this_min_max_invest_loan($this->session->registered_brgy_id);
		if ($get_this_min_max_loan->num_rows() > 0) 
		{
			foreach ($get_this_min_max_loan->result() as $row ) 
			{
				$data['min_loan'] = $row->min_loan;
				$data['max_loan'] = $row->max_loan;
			}
		}
		$this->load->view('templates/borrower_header', $data);
		$this->load->view('templates/borrowernav');
		$this->load->view('user/borrower/borrower_loan');
		$this->load->view('templates/borrower_footer');
	}

	public function apply_loan()
	{
		$this->__is_not_completed();
		$code_number = 0;
		$error_file_count = 0;
		$error_file_message = '';

		$reference_code = rand(111,999).strtoupper(substr($this->session->username, 0, 3)).rand(1111,9999).'BRWR'.substr(date('Y'), 2, 2);
		$loan_term = $this->input->post('loan_term');
		$loan_amount = $this->input->post('loan_amount');
		$full_name = $this->input->post('full_name');
		$mobile_no = $this->input->post('mobile_no');
		$email = $this->input->post('email');
		$address = $this->input->post('address');
		$co_maker_1 = $this->secret_id_md5($this->input->post('co_maker_1'));
		$co_maker_2 = $this->secret_id_md5($this->input->post('co_maker_2'));
		$source_of_income = $this->input->post('source_of_income');
		$monthly_income = $this->input->post('monthly_income');
		$gov_id = $_FILES['photo_file']['name'][0];//gov_id
		$bill = $_FILES['photo_file']['name'][1];//bills
		$payslip = $_FILES['photo_file']['name'][2];//payslip
		$brgy_permit = $_FILES['photo_file']['name'][3];//brgy permit
		$mayor_permit = $_FILES['photo_file']['name'][4];//mayot permit
		$file_count = 2;//default count for gov id and water/electrict bill
		$trapping_message = null;
		$trapping_message = $this->__do_trapping_apply_loan($loan_term,$loan_amount,$full_name,$mobile_no,$email,$address,$co_maker_1,$co_maker_2,$source_of_income,$monthly_income,$gov_id,$bill,$payslip,$brgy_permit,$mayor_permit);
		if ($trapping_message) 
        {
        	$this->output->set_output(json_encode(
				array('message' => $trapping_message, 'code' => $code_number)
			));
        }
        else
        {
        	if ($source_of_income == 'Employee') {
        		$other_file = 2;
        	}
        	elseif ($source_of_income == 'Business') {
        		$other_file = 3;
        	}
        	elseif ($source_of_income == 'Self Employed') {
        		$other_file = 4;
        	}

        	$_FILES['file']['name']     = $_FILES['photo_file']['name'][$other_file];
            $_FILES['file']['type']     = $_FILES['photo_file']['type'][$other_file];
            $_FILES['file']['tmp_name'] = $_FILES['photo_file']['tmp_name'][$other_file];
            $_FILES['file']['error']    = $_FILES['photo_file']['error'][$other_file];
            $_FILES['file']['size']     = $_FILES['photo_file']['size'][$other_file];

        	$config['upload_path']          = './public/uploads/main_user/borrower/req/all';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 1000;
	        $config['max_width']            = 0;
	        $config['max_height']           = 0;
	        $this->load->library('upload', $config);
	        $this->upload->initialize($config);
	        //UPLOAD FIRST THE OPTIONAL REQUIREMENTS
	        if (!$this->upload->do_upload('file'))
	        {
	        	if ($other_file == 2) 
	        	{
	        		$type_err = 'Payslip';
	        	}
	        	elseif ($other_file == 3){
	        		$type_err = 'Brgy permit';
	        	}
	        	elseif ($other_file == 4){
	        		$type_err = 'Mayor permit';//4
	        	}
	            $this->output->set_output(json_encode(
						array('message' => strip_tags($this->upload->display_errors()).' '.$type_err, 'code' => $code_number)
				));
	        }
	        else 
	        {
	        	//FOR OPTIONAL REQUIRED WILL BE SET TO INDEX 0
	        	$data = array('upload_data' => $this->upload->data());
	  		 	$target_file = $data['upload_data']['full_path'];
	            $pos = strpos($target_file, 'public/');
	            $target_file = substr($target_file, $pos);
	           	$photo_files[] =  $target_file;

	        	for ($i = 0; $i < $file_count; $i++) 
	        	{
	        		$_FILES['file']['name']     = $_FILES['photo_file']['name'][$i];
		            $_FILES['file']['type']     = $_FILES['photo_file']['type'][$i];
		            $_FILES['file']['tmp_name'] = $_FILES['photo_file']['tmp_name'][$i];
		            $_FILES['file']['error']    = $_FILES['photo_file']['error'][$i];
		            $_FILES['file']['size']     = $_FILES['photo_file']['size'][$i];

		        	$config['upload_path']      = './public/uploads/main_user/borrower/req/all';
			        $config['allowed_types']    = 'gif|jpg|png';
			        $config['max_size']         = 1000;
			        $config['max_width']        = 0;
			        $config['max_height']       = 0;
			        $this->load->library('upload', $config);
			        $this->upload->initialize($config);

			        if (!$this->upload->do_upload('file'))
			        {
			            $error_file_count++;
				        $error_file_message =  strip_tags($this->upload->display_errors());
			        }
			        else
			        {
			        	//check if there's an error for file upload just escape/don't upload but don't break the loop
			  			if ($error_file_count < 1) 
			  			{
			  				$data = array('upload_data' => $this->upload->data());
				  		 	$target_file = $data['upload_data']['full_path'];
				            $pos = strpos($target_file, 'public/');
				            $target_file = substr($target_file, $pos);
				           	$photo_files[] =  $target_file;
			  			}
			        }
	        	}//end for loop

	        	//check if there's an error in uploading a file for gov id ang billings
				if ($error_file_count > 0) 
				{
					if ($error_file_count == 1)
						$err_type = 'Government ID';
					else
						$err_type = 'Billings';

					$this->output->set_output(json_encode(
							array('message' => $error_file_message.''.$err_type, 'code' => $code_number)
					));
				}
				else
				{
					$loan_data = array(
						'registered_brgy_id' => $this->session->registered_brgy_id,
						'borrower_id' => $this->session->borrower_id,
						'reference_code' => $reference_code,
						'full_name' => $full_name,
						'loan_amount' => $loan_amount,
						'loan_term' => $loan_term,
						'mobile_no' => $mobile_no,
						'email' => $email,
						'address' => $address,
						'co_maker_1' => $co_maker_1,
						'co_maker_2' => $co_maker_2
					);
					$loan_application = $this->lam->insert_loan_app($loan_data);

					//get the optinal required fil upload
					if ($other_file == 2) 
					{
						$loan_req_data1 = array('payslip' => $photo_files[0]);
					}
					elseif ($other_file == 3) {
						$loan_req_data1 = array('brgy_permit' => $photo_files[0]);
					}
					elseif($other_file == 4){
						$loan_req_data1 = array('mayor_permit' => $photo_files[0]);
					}
					
					$loan_req_data2 = array(
						'registered_brgy_id' => $this->session->registered_brgy_id,
						'borrower_id' => $this->session->borrower_id,
						'loan_application_id' => $loan_application,
						'source_of_income' => $source_of_income,
						'monthly_income' => $monthly_income,
						'gov_id' => $photo_files[1],
						'water_elect_bill' => $photo_files[2]
					);
					$loan_req_merge = array_merge($loan_req_data1, $loan_req_data2);
					$this->lrm->insert_loan_req($loan_req_merge);
					//do logs
					$log_data = array(
						'action' => 'Submitted loan application',
						'user_agent' => $this->user_agent(),
						'platform' => $this->platform(),
						'user_account_id' => $this->session->user_account_id,
						'user_type' => $this->session->user_type
					);
					$this->lm->log($log_data);

					$code_number = 1;
		        	$this->output->set_output(json_encode(
						array('message' => 'You have successfully submitted your loan application', 'code' => $code_number)
					));
				}
	        }
        }
	}

	public function re_apply_loan()
	{
		$this->__is_not_completed();
		$code_number = 0;
		$error_file_count = 0;
		$error_file_message = '';

		$loan_app_id = $this->secret_id_md5($this->input->post('loan_app_id'));
		$loan_term = $this->input->post('loan_term');
		$loan_amount = $this->input->post('loan_amount');
		$full_name = $this->input->post('full_name');
		$mobile_no = $this->input->post('mobile_no');
		$email = $this->input->post('email');
		$address = $this->input->post('address');
		$co_maker_1 = $this->secret_id_md5($this->input->post('co_maker_1'));
		$co_maker_2 = $this->secret_id_md5($this->input->post('co_maker_2'));
		$source_of_income = $this->input->post('source_of_income');
		$monthly_income = $this->input->post('monthly_income');
		$gov_id = $_FILES['photo_file']['name'][0];//gov_id
		$bill = $_FILES['photo_file']['name'][1];//bills
		$payslip = $_FILES['photo_file']['name'][2];//payslip
		$brgy_permit = $_FILES['photo_file']['name'][3];//brgy permit
		$mayor_permit = $_FILES['photo_file']['name'][4];//mayot permit
		$file_count = 2;

		//BYPASS ERROR TRAP FOR THESE FF FILE UPLOAD
		if (!$gov_id) {
			$gov_id = 'set*';
		}
		if (!$bill) {
			$bill = 'set*';
		}
		if (!$payslip) {
			$payslip = 'set*';
		}
		if (!$brgy_permit) {
			$brgy_permit = 'set*';
		}
		if (!$mayor_permit) {
			$mayor_permit = 'set*';
		}

		$trapping_message = null;
		$trapping_message = $this->__do_trapping_apply_loan($loan_term,$loan_amount,$full_name,$mobile_no,$email,$address,$co_maker_1,$co_maker_2,$source_of_income,$monthly_income,$gov_id,$bill,$payslip,$brgy_permit,$mayor_permit);
		if (!$loan_app_id) 
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
        	if ($source_of_income == 'Employee') {
        		$other_file = 2;
        	}
        	elseif ($source_of_income == 'Business') {
        		$other_file = 3;
        	}
        	elseif ($source_of_income == 'Self Employed') {
        		$other_file = 4;
        	}

        	$_FILES['file']['name']     = $_FILES['photo_file']['name'][$other_file];
            $_FILES['file']['type']     = $_FILES['photo_file']['type'][$other_file];
            $_FILES['file']['tmp_name'] = $_FILES['photo_file']['tmp_name'][$other_file];
            $_FILES['file']['error']    = $_FILES['photo_file']['error'][$other_file];
            $_FILES['file']['size']     = $_FILES['photo_file']['size'][$other_file];

        	$config['upload_path']          = './public/uploads/main_user/borrower/req/all';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 1000;
	        $config['max_width']            = 0;
	        $config['max_height']           = 0;
	        $this->load->library('upload', $config);
	        $this->upload->initialize($config);
	        //UPLOAD FIRST THE OPTIONAL REQUIREMENTS
	        if (!$this->upload->do_upload('file') && $other_file == 2 && $payslip != 'set*')
	        {
	        	$type_err = 'Payslip';
	            $this->output->set_output(json_encode(
						array('message' => strip_tags($this->upload->display_errors()).' '.$type_err, 'code' => $code_number)
				));
	        }
	        elseif (!$this->upload->do_upload('file') && $other_file == 3 && $brgy_permit != 'set*')
	        {
	        	$type_err = 'Brgy permit';
	        	$this->output->set_output(json_encode(
						array('message' => strip_tags($this->upload->display_errors()).' '.$type_err, 'code' => $code_number)
				));
	        }
	        elseif (!$this->upload->do_upload('file') && $other_file == 4 && $mayor_permit != 'set*')
	        {
	        	$type_err = 'Mayor permit';//4
	        	$this->output->set_output(json_encode(
						array('message' => strip_tags($this->upload->display_errors()).' '.$type_err, 'code' => $code_number)
				));
	        }
	        else 
	        {
	        	//FOR OPTIONAL REQUIRED WILL BE SET TO INDEX 0
	        	$data = array('upload_data' => $this->upload->data());
	  		 	$target_file = $data['upload_data']['full_path'];
	            $pos = strpos($target_file, 'public/');
	            $target_file = substr($target_file, $pos);
	           	$photo_files[] =  $target_file;

	        	for ($i = 0; $i < $file_count; $i++) 
	        	{
	        		$_FILES['file']['name']     = $_FILES['photo_file']['name'][$i];
		            $_FILES['file']['type']     = $_FILES['photo_file']['type'][$i];
		            $_FILES['file']['tmp_name'] = $_FILES['photo_file']['tmp_name'][$i];
		            $_FILES['file']['error']    = $_FILES['photo_file']['error'][$i];
		            $_FILES['file']['size']     = $_FILES['photo_file']['size'][$i];

		        	$config['upload_path']      = './public/uploads/main_user/borrower/req/all';
			        $config['allowed_types']    = 'gif|jpg|png';
			        $config['max_size']         = 1000;
			        $config['max_width']        = 0;
			        $config['max_height']       = 0;
			        $this->load->library('upload', $config);
			        $this->upload->initialize($config);

			        if (!$this->upload->do_upload('file') && $bill != 'set*' && $i == 1)
			        {
			            $error_file_count++;
				        $error_file_message =  strip_tags($this->upload->display_errors());
			        }
			        elseif (!$this->upload->do_upload('file') && $gov_id !='set*' && $i == 2) {
			        	$error_file_count++;
				        $error_file_message =  strip_tags($this->upload->display_errors());
			        }
			        else
			        {
			        	//check if there's no error for file upload the asign the file 
			  			if ($error_file_count < 1) 
			  			{
			  				$data = array('upload_data' => $this->upload->data());
				  		 	$target_file = $data['upload_data']['full_path'];
				            $pos = strpos($target_file, 'public/');
				            $target_file = substr($target_file, $pos);
				           	$photo_files[] =  $target_file;
			  			}
			        }
	        	}//end for loop
	        	
	        	//check if there's an error in uploading a file for gov id ang billings
				if ($error_file_count > 0) 
				{
					if ($error_file_count == 1)
						$err_type = 'Government ID';
					else
						$err_type = 'Billings';

					$this->output->set_output(json_encode(
							array('message' => $error_file_message.''.$err_type, 'code' => $code_number)
					));
				}
				else
				{
					
					$loan_app_data = array(
						'registered_brgy_id' => $this->session->registered_brgy_id,
						'borrower_id' => $this->session->borrower_id,
						'full_name' => $full_name,
						'loan_amount' => $loan_amount,
						'loan_term' => $loan_term,
						'mobile_no' => $mobile_no,
						'email' => $email,
						'address' => $address,
						'co_maker_1' => $co_maker_1,
						'co_maker_2' => $co_maker_2,
						'is_accepted' => 0
					);
					$loan_app_update = $this->lam->update_loan_app($loan_app_data, $loan_app_id);

					//get the optinal required file upload
					if ($other_file == 2) 
					{
						$loan_req_data1 = array('payslip' => $photo_files[0]);
					}
					elseif ($other_file == 3) {
						$loan_req_data1 = array('brgy_permit' => $photo_files[0]);
					}
					elseif($other_file == 4){
						$loan_req_data1 = array('mayor_permit' => $photo_files[0]);
					}

					$loan_req_data2 = array();
					
					if ($gov_id != 'set*' && $bill != 'set*') 
					{
						$loan_req_data2 = array(
							'source_of_income' => $source_of_income,
							'monthly_income' => $monthly_income,
							'gov_id' => $photo_files[1],
							'water_elect_bill' => $photo_files[2]
						);
					}
					elseif ($gov_id != 'set*') {
						$loan_req_data2 = array(
							'source_of_income' => $source_of_income,
							'monthly_income' => $monthly_income,
							'gov_id' => $photo_files[1]
						);
					}
					elseif ($bill != 'set*') {
						$loan_req_data2 = array(
							'source_of_income' => $source_of_income,
							'monthly_income' => $monthly_income,
							'water_elect_bill' => $photo_files[2]
						);
					}

					$loan_req_merge = array_merge($loan_req_data1, $loan_req_data2);
					$req_update = $this->lrm->update_loan_req($loan_req_merge, $loan_app_id);

					//do logs
					$log_data = array(
						'action' => 'Re-applied loan application',
						'user_agent' => $this->user_agent(),
						'platform' => $this->platform(),
						'user_account_id' => $this->session->user_account_id,
						'user_type' => $this->session->user_type
					);
					$this->lm->log($log_data);

					$code_number = 1;
		        	$this->output->set_output(json_encode(
						array('message' => 'You have successfully re-apply your loan application', 'code' => $code_number)
					));
				}
	        }
        }
		
	}

	public function loanbook()
	{
		//check if incomplete then pass to incomplete method
		$this->__is_not_completed();

		$data['borrower_loanbook'] = 'loanbook';//for jquery porpuses
		$data['title'] = 'Loanbook | MangJuam';
		$data['loanbook'] = 'active';

		$data['user_details'] = $this->__get_this_user_details();
		$data['loans'] = $this->loans->get_my_loans($this->session->borrower_id);

		$this->load->view('templates/borrower_header', $data);
		$this->load->view('templates/borrowernav');
		$this->load->view('user/borrower/borrower_loanbook');
		$this->load->view('templates/borrower_footer');
	}

	public function loan_status()
	{
		//check if incomplete then pass to incomplete method
		$this->__is_not_completed();

		$data['borrower_loanbook'] = 'loanbook';//for jquery porpuses
		$data['title'] = 'Loanbook | MangJuam';
		$data['loanbook'] = 'active';

		$data['user_details'] = $this->__get_this_user_details();
		$loan_data = array(
			'reference_code' => $this->input->get('ref'),
			'borrower_id' => $this->session->borrower_id
		);
		$data['my_loan'] = $this->loans->get_this_loan($loan_data);
		$loan_repayment_data = array(
			'reference_code' => $this->input->get('ref'),
			'borrower_id' => $this->session->borrower_id
		);
		$data['monthly_repayments'] = $this->bmrm->get_my_monthly_repayments($loan_repayment_data);

		$this->load->view('templates/borrower_header', $data);
		$this->load->view('templates/borrowernav');
		$this->load->view('user/borrower/borrower_loan_status');
		$this->load->view('templates/borrower_footer');
		
	}

	public function review_loan_app()
	{
		$this->__is_not_completed();

		$data['borrower_review_loan_app'] = 'review_loan_app';//JQUERY INDICATOR
		$data['title'] = 'Review Applications | MangJuam';
		$data['review_loan_app'] = 'active';

		$data['user_details'] = $this->__get_this_user_details();
		$data['loan_app'] = $this->lam->get_my_loan_app();

		$this->load->view('templates/borrower_header', $data);
		$this->load->view('templates/borrowernav');
		$this->load->view('user/borrower/borrower_review_app_loan');
		$this->load->view('templates/borrower_footer');
	}

	public function re_apply()
	{
		$this->__is_not_completed();

		$data['borrower_loan'] = 'loan';//JQUERY INDICATOR
		$data['title'] = 'Re-Apply | MangJuam';
		$data['loan'] = 'active';

		$loan_application_id = $this->secret_id_md5($this->input->get('loan_app'));

		$data['user_details'] = $this->__get_this_user_details();
		$data['monthly_term'] = $this->mtbm->get_this_monthly_term_borrower($this->session->registered_brgy_id);
		$data['co_makers'] = $this->im->available_co_maker($this->session->registered_brgy_id);

		$get_this_min_max_loan = $this->mmlim->get_this_min_max_invest_loan($this->session->registered_brgy_id);
		if ($get_this_min_max_loan->num_rows() > 0) 
		{
			foreach ($get_this_min_max_loan->result() as $row ) 
			{
				$data['min_loan'] = $row->min_loan;
				$data['max_loan'] = $row->max_loan;
			}
		}
		
		$get_this_loan_app_req = $this->lam->get_this_loan_app_req($loan_application_id);
		if ($get_this_loan_app_req->num_rows() > 0) 
		{
			foreach ($get_this_loan_app_req->result() as $row) 
			{
				$data['loan_application_id'] = $row->loan_application_id.md5('scrt');
				$data['loan_amount'] = $row->loan_amount;
				$data['loan_term'] = $row->loan_term;
				$data['source_of_income'] = $row->source_of_income;
				$data['monthly_income'] = $row->monthly_income;
				$data['gov_id'] = $row->gov_id;
				$data['water_elect_bill'] = $row->water_elect_bill;
				$data['brgy_permit'] = $row->brgy_permit;
				$data['mayor_permit'] = $row->mayor_permit;
				$data['payslip'] = $row->payslip;
				$data['co_maker_1'] = $row->co_maker_1;
				$data['co_maker_2'] = $row->co_maker_2;
			}
		}
		
		$get_this_min_max_loan = $this->mmlim->get_this_min_max_invest_loan($this->session->registered_brgy_id);
		if ($get_this_min_max_loan->num_rows() > 0) 
		{
			foreach ($get_this_min_max_loan->result() as $row ) 
			{
				$data['min_loan'] = $row->min_loan;
				$data['max_loan'] = $row->max_loan;
			}
		}

		$this->load->view('templates/borrower_header', $data);
		$this->load->view('templates/borrowernav');
		$this->load->view('user/borrower/borrower_loan_re_apply');
		$this->load->view('templates/borrower_footer');
	}

	//AJAX RETURNED
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
					'source_of_income' => $row->source_of_income,
					'monthly_income' => number_format($row->monthly_income,2),
					'loan_term' => $row->loan_term,
					'co_maker_1' => $co_maker_1[0],
					'co_maker_2' => $co_maker_2[1],
					'loan_application_id' => $row->loan_application_id.md5('scrt'),
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
			
		if (!$ajax_ret_loan_app_req_registered_brgy) 
			show_404();
		else
			$this->output->set_output(json_encode($ajax_ret_loan_app_req_registered_brgy));
	}

	public function transactions($type = 'all')
	{
		if ($type == 'all') 
		{
			$data['borrower_all'] = 'all';//for jquery porpuses
			$data['all'] = 'active';
			$data['borrower_transactions'] = $this->btm->get_borrower_transactions($this->session->borrower_id);
		}
		elseif ($type == 'payments') 
		{
			$data['borrower_payments'] = 'payments';//for jquery porpuses
			$data['payments'] = 'active';
			$data['my_payments'] = $this->btm->get_borrower_payments($this->session->borrower_id);

		}
		elseif ($type == 'loan_received') 
		{
			$data['borrower_loan_received'] = 'loan_received';//for jquery porpuses
			$data['loan_received'] = 'active';
			$data['my_loans'] = $this->btm->get_borrower_loans($this->session->borrower_id);
		}

		$data['title'] = ucwords(str_replace('_', ' ', $type)).' transactions | MangJuam';
		$data['user_details'] = $this->__get_this_user_details();

		$this->load->view('templates/borrower_header', $data);
		$this->load->view('templates/borrowernav');
		$this->load->view('user/borrower/borrower_'.$type);
		$this->load->view('templates/borrower_footer');
	}

	//common used borrower and lender...
	public function inbox()
	{
		//check if incomplete then pass to incomplete method
		$this->__is_not_completed();

		$data['inbox'] = 'b_inbox';//for jquery porpuses
		$data['title'] = 'Inbox | MangJuam';

		$data['user_details'] = $this->__get_this_user_details();

		$this->load->view('templates/borrower_header', $data);
		$this->load->view('templates/borrowernav');
		$this->load->view('user/inbox');
		$this->load->view('templates/borrower_footer');
	}

	//check if the datails is incomplete then stay to incomplete page
	public function __is_not_completed()
	{
		$get_this_is_icomplete = $this->udm->get_this_incomplete_main_user()->num_rows();
		if ($get_this_is_icomplete > 0) 
		{
			if ($this->session->is_borrower > 0) 
			{
				header("location: ".base_url('borrower/incomplete')."");
				die();
			}
			else 
			{
				show_404();//if the session set borrower show 404
				die();
			}
		}
	}

	public function incomplete()
	{
		$data['user_incomplete'] = 'incomplete';//for jquery porpuses
		$data['title'] = 'Incomplete | MangJuam';
		$get_this_incomplete_main_user = $this->udm->get_this_incomplete_main_user();
		//check if already completed
		if ($get_this_incomplete_main_user->num_rows() < 1) 
		{
			header("location: ".base_url('borrower')."");
			die();
		}
		else
		{
			//for incomplete
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

		$this->load->view('templates/borrower_header', $data);
		$this->load->view('templates/main_user_nav_incomplete');
		$this->load->view('user/incomplete');
		$this->load->view('templates/borrower_footer');
	}

	public function profile()
	{
		//check if incomplete then pass to incomplete method
		$this->__is_not_completed();

		$data['user_profile'] = 'b_profile';//for jquery porpuses
		$data['title'] = 'Profile | MangJuam';

		$data['user_details'] = $this->__get_this_user_details();

		$this->load->view('templates/borrower_header', $data);
		$this->load->view('templates/borrowernav');
		$this->load->view('user/profile');
		$this->load->view('templates/borrower_footer');
	}

	public function update_profile()
	{
		$this->__is_not_completed();

		$data['user_profile'] = 'b_profile';//JQUERY INDICATOR
		$data['title'] = 'Update Profile | MangJuam';

		$data['user_details'] = $this->__get_this_user_details();

		$this->load->view('templates/borrower_header', $data);
		$this->load->view('templates/borrowernav');
		$this->load->view('user/update_profile');
		$this->load->view('templates/borrower_footer');
	}

	public function settings($account = '')
	{
		//check if incomplete then pass to incomplete method
		$this->__is_not_completed();
		$data['user_details'] = $this->__get_this_user_details();

		$data['user_settings'] = 'b_settings';

			if ($account == 'change-email') 
			{
				$data['borrower_change_email'] = 'change_email';//for jquery porpuses
				$data['title'] = 'Change Email | MangJuam';
				$this->load->view('templates/borrower_header', $data);
				$this->load->view('templates/borrowernav');
				$this->load->view('user/change_email');
			}
			elseif($account == 'change-username')
			{
				$data['borrower_change_username'] = 'change_username';//for jquery porpuses
				$data['title'] = 'Change Username | MangJuam';
				$this->load->view('templates/borrower_header', $data);
				$this->load->view('templates/borrowernav');
				$this->load->view('user/change_username');
			}
			elseif ($account == 'change-password') 
			{
				$data['borrower_change_password'] = 'change_password';//for jquery porpuses
				$data['title'] = 'Change Username | MangJuam';
				$this->load->view('templates/borrower_header', $data);
				$this->load->view('templates/borrowernav');
				$this->load->view('user/change_password');
			}
			else
			{
				$data['borrower_settings'] = 'settings';//for jquery porpuses
				$data['title'] = 'Settings | MangJuam';

				$this->load->view('templates/borrower_header', $data);
				$this->load->view('templates/borrowernav');
				$this->load->view('user/settings');
			}
		$this->load->view('templates/borrower_footer');
	}
}
