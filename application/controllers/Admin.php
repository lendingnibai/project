<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->admin_session();//located in MY_Controller
		$this->load->model('Super_admin_model', 'sam');
		$this->load->model('Brgy_accounts_model', 'bam');
		$this->load->model('Brgy_staff_accounts_model', 'bsam');
		$this->load->model('User_accounts_model', 'uam');
		$this->load->model('Registered_brgy_model', 'rbm');
		$this->load->model('Brgy_user_details_model', 'budm');

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

	public function __do_trapping_add_brgy($first_name, $last_name, $email, $cap_mobile_no, $barangay, $street, $city, $state_prov, $zip_code, $photo_brgy, $photo_docs)
	{

		if (!$first_name && !$last_name && !$email && !$cap_mobile_no && !$barangay && !$street && !$city && !$state_prov && !$zip_code && !$photo_brgy && !$photo_docs) {
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
		elseif (!$cap_mobile_no) {
			return 'Please input client mobile no.';
		}
		elseif (!$barangay) {
			return 'Please input barangay';
		}
		elseif (!$street) {
			return 'Please input street';
		}
		elseif (!$city) {
			return 'Please input city';
		}
		elseif (!$state_prov) {
			return 'Please input state/province';
		}
		elseif (!$zip_code) {
			return 'Please input zip code';
		}
		elseif (!$photo_brgy) {
			return 'Please upload barangay hall photo';
		}
		elseif (!$photo_docs) {
			return 'Please upload barangay ordinance photo';
		}
		elseif ($this->__check_email($email) > 0) {
			return 'Email address already exist';
		}
	}

	public function __get_this_super_admin()
	{
		$get_this_super_admin = $this->sam->get_this_super_admin();
		if ($get_this_super_admin ->num_rows() > 0) 
		{
			foreach ($get_this_super_admin ->result() as $row) 
			{
				$data['first_name'] = $row->first_name;
				$data['last_name'] = $row->last_name;
				$data['email'] = $row->email;
				$data['username'] = $row->username;
				$data['profile'] = $row->profile;
			}
		}
		return $data;
		//used by all the methods
	}

	public function index()
	{	

		$data['active_dashboard'] = 'active';//for navbar activate
		$data['title'] = 'Dashboard';
		$data['admin_dashboard'] = 'admin_dashboard';//for js indicator

		$data['details'] = $this->__get_this_super_admin();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/adminnav');
		$this->load->view('admin/admin_dashboard');
		$this->load->view('templates/admin_footer');
	}

	public function manage_barangay()
	{
		
		$data['active_manage_barangay'] = 'active';//for navbar activate
		$data['title'] = 'Manage Barangay';
		$data['manage_barangay'] = 'manage_barangay';//for js indicator

		$data['details'] = $this->__get_this_super_admin();
		$data['registered_brgy'] = $this->rbm->registered_brgy();
		
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/adminnav');
		$this->load->view('admin/admin_manage_barangay');
		$this->load->view('templates/admin_footer');
	}

	public function add_brgy_account()
	{
		$code_number = 0;
		$error_file_count = 0;
		$error_file_message = '';
		$which_file = '';

		$first_name = $this->input->post('first_name');
	    $middle_name = $this->input->post('middle_name');
	    $last_name = $this->input->post('last_name');
	    $email = $this->input->post('email');
	    $cap_mobile_no = $this->input->post('cap_mobile_no');
		$barangay =	$this->input->post('barangay');
    	$street = $this->input->post('street');
        $city = $this->input->post('city');
        $state_prov = $this->input->post('state_prov');
        $zip_code = $this->input->post('zip_code');
        $mobile_no = $this->input->post('mobile_no');
        $tel_no = $this->input->post('tel_no');
        $photo_brgy = $_FILES['photo_file']['name'][0];//for brgy hall photo
        $photo_docs = $_FILES['photo_file']['name'][1];//for brgy ordinance docs as photo
		$file_count = count($_FILES['photo_file']['name']);
		
		$trapping_message  = null;//use for disbled trapping

		$trapping_message = $this->__do_trapping_add_brgy($first_name, $last_name, $email, $cap_mobile_no, $barangay, $street, $city, $state_prov, $zip_code,$photo_brgy, $photo_docs);

		if ($trapping_message) 
		{
			$this->output->set_output(json_encode(
				array('message' => $trapping_message, 'code' => $code_number)
			));
		}
		else
		{
			for ($i=0; $i < $file_count; $i++) 
			{ 
				$_FILES['file']['name']     = $_FILES['photo_file']['name'][$i];
	            $_FILES['file']['type']     = $_FILES['photo_file']['type'][$i];
	            $_FILES['file']['tmp_name'] = $_FILES['photo_file']['tmp_name'][$i];
	            $_FILES['file']['error']    = $_FILES['photo_file']['error'][$i];
	            $_FILES['file']['size']     = $_FILES['photo_file']['size'][$i];

				$config['upload_path']      = './public/uploads/super_admin/registered_brgy';
		        $config['allowed_types']    = 'gif|jpg|png';
		        $config['max_size']         = 2000;
		        $config['max_width']        = 0;
		        $config['max_height']       = 0;

		        $this->load->library('upload', $config);
		        $this->upload->initialize($config);

		        if (!$this->upload->do_upload('file'))
		        {
		        	$error_file_count++;
		        	$error_file_message =  strip_tags($this->upload->display_errors());
		        	//break;
		        }
		        else
		        {
		        	//check if there's an error for file upload just escape/don't upload the but don't break the loop
		  			if ($error_file_count < 1) 
		  			{
		  				$data = array('upload_data' => $this->upload->data());
			  		 	$target_file = $data['upload_data']['full_path'];
			            $pos = strpos($target_file, 'public/');
			            $target_file = substr($target_file, $pos);
			           	$photo_files[] =  $target_file;
		  			}
		        }
			}

			//check if there's an error in uploading a file
			if ($error_file_count > 0) 
			{
				$this->output->set_output(json_encode(
						array('message' => $error_file_message.' (Brgy hall/Brgy Ordinance)', 'code' => $code_number)
				));
			}
			else
			{
				if (!$middle_name) 
				{
					$middle_name = '';
				}
				$brgy_data = array(
	            	'super_admin_id' => $this->session->super_admin_id,
	            	'barangay' => $barangay,
	            	'brgy_captain' => $first_name.' '.$middle_name.' '.$last_name,
	            	'street' => $street,
	            	'city' => $city,
	            	'state_prov' => $state_prov,
	            	'zip_code' => $zip_code,
	            	'photo_brgy' => $photo_files[0],
	            	'photo_docs' => $photo_files[1],
	            	'mobile_no' => $mobile_no,
	            	'tel_no' => $tel_no
	            );

	           	$insert_brgy = $this->rbm->insert_brgy($brgy_data);//return id no

	           	//create generated username & password
	           	$username = $email;
				$pos = strpos($username, '@');//fin the position of @
			    $username = substr($username, 0, $pos);//remove starting from @
				$username = 'mj' . date('Y') . $username . '_' . rand(1,9) . rand(1,9) . rand(1,9);//create username
				$password = rand(1,9) . rand(1,9) . 'mangjuam' . rand(1,9) . rand(1,9) . rand(1,9);//create password

	           	$brgy_account_data = array(
		           	'registered_brgy_id' => $insert_brgy,
		           	'email' => $email,
		           	'username' => $username,
		           	'password' => md5($password)
		        );

		        $create_brgy_account = $this->bam->create_brgy_account($brgy_account_data);//return last id

		        $brgy_user_details_data = array(
		        	'brgy_account_id' => $create_brgy_account,
		        	'first_name' => $first_name,
		        	'middle_name' => $middle_name,
		        	'last_name' => $last_name,
		        	'position' => 'Barangay Captain',
		        	'photo' => $photo_files[0],//for default profile pic bgry logo/picture
		        	'mobile_no' => $cap_mobile_no,
		        	'barangay' => $barangay,
		        	'city' => $city,
		        	'state_prov' => $state_prov,
		        	'zip_code' => $zip_code
		        );

		        $insert_brgy_details = $this->budm->insert_brgy_details($brgy_user_details_data);//return 1 if success

		        if ($insert_brgy_details > 0) 
		        {
		        	$log_data = array(
						'action' => 'Super admin added new barangay ' . '('.$barangay.')',
						'user_agent' => $this->user_agent(),
						'platform' => $this->platform(),
						'super_admin_id' => $this->session->super_admin_id,
						'user_type' => $this->session->user_type
						);

					$this->lm->log($log_data);

					//create xml and store account use for without internet 
					$xml = '<brgy_account>
								<email>'.$email.'</email>
								<username>'.$username.'</username>
								<password>'.$password.'</password>
							</brgy_account>';

					$dom = new DOMDocument;
					$dom->preserveWhiteSpace = FALSE;
					$dom->loadXML($xml);
					$dom->save('public/uploads/super_admin/brgy_accounts/'.$barangay.'_'.date('Y-m-d H-i-s').'.xml');

					$email_message = 'Good day Brgy. Captain '. ucwords($first_name) . ' ' . ucwords($last_name) . ' of barangay ' . $barangay . '. Thank you for registering your barangay to MangJuam. <br> To login use your email or username (' . $username . ') and your password is (' . $password . ') Click <a href ="'.base_url("barangay_login").'">here</a> to login.';
					$from = 'mangjuamlending@gmail.com';
					$from_name = 'Mangjuam';
					$subject = 'Your Barangay Successfully Registered To Mangjuam';
					$to = array($email);
					$reply_to = '';
					$reply_to_name = '';
					$to_send_email = $this->to_send_email($email_message, $from, $from_name, $subject, $to, $reply_to, $reply_to_name);

					$sms_message = '';
					$sms_message = 'Congrats Brgy. Captain '. ucwords($first_name) . ' ' . ucwords($last_name) . ' your brgy was successfully registered. We have sent an email to you containing your Mangjuam credentials.';
					$to_send_sms = '';
					$to_send_sms = $this->to_send_sms($cap_mobile_no, $sms_message);

					$code_number = 1;
		        	$this->output->set_output(json_encode(
							array('message' => 'Barangay '.$barangay.' was successfully registered. '.$to_send_email.' '.$to_send_sms, 'code' => $code_number)
					));
		        }
			}
		}
	}

	public function set_defaults()
	{
		
		$data['active_settings'] = 'active';//for navbar activate
		$data['title'] = 'Set Defaults';
		$data['set_defaults'] = 'set_defaults';//for js indicator

		$data['details'] = $this->__get_this_super_admin();
		
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/adminnav');
		$this->load->view('admin/admin_set_defaults');
		$this->load->view('templates/admin_footer');

	}

	public function account_settings()
	{
		
		$data['active_settings'] = 'active';//for navbar activate
		$data['title'] = 'Account settings';
		$data['account_settings'] = 'account_settings';//for js indicator

		$data['details'] = $this->__get_this_super_admin();
		
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/adminnav');
		$this->load->view('admin/admin_account_settings');
		$this->load->view('templates/admin_footer');

	}

	public function logs($type = 'main_user')
	{

		$data['active_logs'] = 'active';
		$data['title'] = 'User Logs';
		$data['logs'] = 'logs';//for js indicator

		$data['details'] = $this->__get_this_super_admin();
		$data['main_user_logs'] = $this->lm->main_user_logs();
		$data['brgy_admin_logs'] = $this->lm->brgy_admin_logs();
		$data['brgy_staff_logs'] = $this->lm->brgy_staff_logs();
		$data['super_admin_logs'] = $this->lm->super_admin_logs();

		$data['main_user_names_ids'] = $this->lm->main_user_names_ids();
		$data['brgy_admin_names_ids'] = $this->lm->brgy_admin_names_ids();
		$data['brgy_staff_names_ids'] = $this->lm->brgy_staff_names_ids();
		$data['super_admin_names_ids'] = $this->lm->super_admin_names_ids();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/adminnav');
		$this->load->view('admin/admin_'.$type.'_logs');
		$this->load->view('templates/admin_footer');
	}

}