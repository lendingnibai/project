<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set("Asia/Manila");
require_once(APPPATH . '/third_party/vendor/autoload.php');

use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;

class MY_Controller	extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('user_agent');
		$this->load->model('Logs_model', 'lm');
		$this->load->model('Transactions_model', 'transaction');
		$this->load->model('Lender_transactions_model', 'ltm');
		$this->load->model('Borrower_transactions_model', 'btm');
		$this->load->model('Loans_model', 'loan');
		$this->load->model('Borrower_monthly_repayments_model', 'bmrm');
		$this->load->model('Lender_monthly_returns_model', 'lmrm');
		$this->load->model('Investments_model', 'im');
		$this->load->model('Brgy_yearly_quarters_model', 'byqm');
		$this->load->model('Brgy_earnings_model', 'bem');
	}

	public function __check_investment_end_term()
	{
		$investment_end_term = $this->im->check_investment_end_term();
		if ($investment_end_term->num_rows() > 0) 
		{
			foreach ($investment_end_term->result() as $row) 
			{
				$lender_id = $row->lender_id;
				$investment_id = $row->investment_id;
				$invest_amount = $row->invest_amount;
				$reference_code = $row->reference_code;
				$mobile_no = $row->mobile_no;
				$email = $row->email;
				$registered_brgy_id = $row->registered_brgy_id;

				$investment_data = array(
					'status' => 0,
					'is_ended' => 1
				);
				//SET STATUS TO 0 AS TERM ENDED
				$update_investment = $this->im->update_investment($investment_data,$investment_id);
				if ($update_investment > 0) 
				{
					//GET THE CURRENT BALANCE THE ADD CAPITAL INVESTMENT RETURN TO MAKE A NEW BALANCE
					$new_balance = $invest_amount + $this->lender_current_balance($lender_id);
					$lender_transaction_data = array(
						'lender_id' => $lender_id,
						'from_brgy_id' => $registered_brgy_id,
						'investment_id' => $investment_id,
						'credit' => $invest_amount,
						'reference_code' => $reference_code,
						'type' => 'Capital Investment Return',
						'type_code' => 1,
						'balance' => $new_balance
					);
					$lender_transaction = $this->ltm->insert_lender_transaction($lender_transaction_data);
					//DO LOGS
					$log_data = array(
						'action' => 'Investment was ended '.$reference_code,
						'user_agent' => 'Mangjuam',
						'platform' => 'Mangjuam',
						'brgy_account_id' => $registered_brgy_id, //$this->session->brgy_account_id, always same no.
						'user_type' => 'Mangjuam'
					);
					$this->lm->log($log_data);
					//NOTIFY THE USER
					$email_message = 'Your investment successfully ended the term reference code: '.$reference_code.' for more info login your account @ http://localhost/mangjuam.com';
					$from = 'mangjuamlending@gmail.com';
					$from_name = 'Mangjuam';
					$subject = 'Your Investment Was Successfully Ended';
					$to = array($email);
					$reply_to = '';
					$reply_to_name = '';
					$to_send_email = $this->to_send_email($email_message, $from, $from_name, $subject, $to, $reply_to, $reply_to_name);

					$sms_message = 'Your investment successfully ended the term reference code: '.$reference_code.' for more info login your account @ http://localhost/mangjuam.com';
					$to_send_sms = $this->to_send_sms($mobile_no, $sms_message);
				}
			}
		}
	}

	//CHECK EVERY LOGIN IF THEIR'S DUE DATE FOR MONTHLY RETURN
	public function __check_monthly_return()
	{
		$monthly_return_end_term = $this->lmrm->check_monthly_return_end_term();
		if ($monthly_return_end_term->num_rows() > 0) 
		{
			foreach ($monthly_return_end_term->result() as $row) 
			{
				$lender_id = $row->lender_id;
				$investment_id = $row->investment_id;
				$lender_monthly_return_id = $row->lender_monthly_return_id;
				$monthly_return = $row->monthly_return;
				$reference_code = $row->reference_code;
				$mobile_no = $row->mobile_no;
				$email = $row->email;
				$registered_brgy_id = $row->registered_brgy_id;

				$lender_monthly_return_data = array(
					'status' => 0,//ENDED TERM
					'is_returned' => 1//RETURNED
				);
				//SET STATUS TO 0 AS TERM ENDED
				$update_lender_monthly_return = $this->lmrm->update_lender_monthly_return($lender_monthly_return_data,$lender_monthly_return_id);
				if ($update_lender_monthly_return > 0) 
				{
					//GET THE CURRENT BALANCE THE ADD THE MONTHLY RETURN TO MAKE IT NEW BALANCE
					$new_balance = $monthly_return + $this->lender_current_balance($lender_id);
					$lender_transaction_data = array(
						'lender_id' => $lender_id,
						'from_brgy_id' => $registered_brgy_id,
						'investment_id' => $investment_id,
						'credit' => $monthly_return,
						'type' => 'Monthly Return',
						'type_code' => 2,
						'reference_code' => $reference_code,
						'balance' => $new_balance
					);
					$lender_transaction = $this->ltm->insert_lender_transaction($lender_transaction_data);
					//DO LOGS
					$log_data = array(
						'action' => 'Monthly return was added to lender\'s wallet '.$reference_code,
						'user_agent' => 'Mangjuam',
						'platform' => 'Mangjuam',
						'brgy_account_id' => $registered_brgy_id,//$this->session->brgy_account_id,
						'user_type' => 'Mangjuam'
					);
					$this->lm->log($log_data);
					//NOTIFY THE USER THRU EMAIL & SMS
					$email_message = 'Your monthly return as of '.date('M. d, Y').' was successfully added to your wallet reference code: '.$reference_code.' for more info login your account @ http://localhost/mangjuam.com';
					$from = 'mangjuamlending@gmail.com';
					$from_name = 'Mangjuam';
					$subject = 'Your Monthly Return Was Successfully Added To Your Wallet';
					$to = array($email);
					$reply_to = '';
					$reply_to_name = '';
					$to_send_email = $this->to_send_email($email_message, $from, $from_name, $subject, $to, $reply_to, $reply_to_name);

					$sms_message = 'Your investment successfully ended the term reference code: '.$reference_code.' for more info login your account @ http://localhost/mangjuam.com';
					$to_send_sms = $this->to_send_sms($mobile_no, $sms_message);
				}
			}
		}
	}
	// NOTIFY THE USER
	public function __notify_borrower_due_date()
	{
		$notify_this_borrower = $this->bmrm->notify_borrower_monthly_repayment_due_date();
		if ($notify_this_borrower->num_rows() > 0) 
		{
			foreach ($notify_this_borrower->result() as $row) 
			{
				$borrower_monthly_repayment_id = $row->borrower_monthly_repayment_id;
				$monthly_repayment = $row->monthly_repayment;
				$amount_paid = $row->amount_paid;
				$due_date = $row->due_date;
				$email = $row->email;
				$mobile_no = $row->mobile_no;
				$reference_code = $row->reference_code;
				$remaining_days = $row->remaining_days;
				$registered_brgy_id = $row->registered_brgy_id;

				$outstanding = $monthly_repayment - $amount_paid;//GET THE OUTSTANDING BALANCE OF AMORTAZATION

				$repayment_data = array(
					'is_notified' => 1//set 1 as notified user
				);
				$this->bmrm->update_monthly_repayment($repayment_data, $borrower_monthly_repayment_id);

				//DO LOGS
				$log_data = array(
					'action' => 'Monthly repayment penlaty '.$reference_code,
					'user_agent' => 'Mangjuam',
					'platform' => 'Mangjuam',
					'user_type' => 'Mangjuam',
					'brgy_account_id' => $registered_brgy_id//$this->session->brgy_account_id
				);
				$this->lm->log($log_data);

				$sms_message = 'Please pay on due date '.date('Y-m-d', strtotime($due_date)).' amount due '.number_format($outstanding,2).'  reference code: '.$reference_code.' for more info login your account @ http://localhost/mangjuam.com';
				$to_send_sms = $this->to_send_sms($mobile_no, $sms_message);
			}
		}
	}
	//CHECK LOAN END TERM
	public function __check_loan_end_term()
	{
		$loan_end_term = $this->loan->check_loan_end_term();
		if ($loan_end_term->num_rows() > 0) 
		{
			foreach ($loan_end_term->result() as $row) 
			{
				$borrower_id = $row->borrower_id;
				$loan_id = $row->loan_id;
				$loan_amount = $row->loan_amount;
				$reference_code = $row->reference_code;
				$mobile_no = $row->mobile_no;
				$email = $row->email;
				$registered_brgy_id = $row->registered_brgy_id;
				//CHECK STATUS FIRST
				if ($row->status == 1)
					$status = 3;
				else
					$status = 2;

				$loan_data = array(
					'status' => $status,
					'is_ended' => 1
				);
				//SET STATUS TO 0 AS TERM ENDED
				$update_loan = $this->loan->update_loan($reference_code,$loan_data);
				if ($update_loan > 0) 
				{
					//DO LOGS
					$log_data = array(
						'action' => 'Loan was ended '.$reference_code,
						'user_agent' => 'Mangjuam',
						'platform' => 'Mangjuam',
						'brgy_account_id' => $registered_brgy_id, //$this->session->brgy_account_id, always same no.
						'user_type' => 'Mangjuam'
					);
					$this->lm->log($log_data);
				}
			}
		}
	}

	//CHECK IF THE DUE DATE THEN ADD PENALTY
	public function __check_monthly_repayment()
	{
		$monthly_repayment_due_date = $this->bmrm->check_monthly_repayment_due_date();
		if ($monthly_repayment_due_date->num_rows() > 0) 
		{
			foreach ($monthly_repayment_due_date->result() as $row) 
			{
				$borrower_monthly_repayment_id = $row->borrower_monthly_repayment_id;
				$loan_id = $row->loan_id;
				$borrower_id = $row->borrower_id;
				$loan_application_id = $row->loan_application_id;
				$monthly_repayment = $row->monthly_repayment;
				$amount_paid = $row->amount_paid;
				$due_date = $row->due_date;
				$email = $row->email;
				$mobile_no = $row->mobile_no;
				$reference_code = $row->reference_code;
				$registered_brgy_id = $row->registered_brgy_id;

				//TO GET THE PENALTY RATE SET FROM LOAN DETAILS
				$loan_data = array(
					'loan_application_id' => $loan_application_id
				);
				$get_loan = $this->loan->get_this_loan($loan_data);
				if ($get_loan->num_rows() > 0) 
				{
					foreach ($get_loan->result() as $row) 
					{
						$penalty_rate = $row->penalty_rate;
					}
				}
				$outstanding = $monthly_repayment - $amount_paid;//GET THE OUTSTANDING BALANCE OF AMORTAZATION
				$penalty = $penalty_rate * ($outstanding / 100);
				$repayment_data = array(
					'penalty' => $penalty,
					'is_passed_due_date' => 1//INDICATOR FOR ADDING A PENALTY
				);
				$this->bmrm->update_monthly_repayment($repayment_data, $borrower_monthly_repayment_id);
				//DO LOGS
				$log_data = array(
					'action' => 'Monthly repayment penlaty '.$reference_code,
					'user_agent' => 'Mangjuam',
					'platform' => 'Mangjuam',
					'user_type' => 'Mangjuam',
					'brgy_account_id' => $registered_brgy_id//$this->session->brgy_account_id
				);
				$this->lm->log($log_data);
			}
		}
	}

	public function check_quarterly_earnings()
	{	
		$get_quarters = $this->byqm->get_this_quarters();
		foreach ($get_quarters->result() as $row) 
		{
			$date_quarter = null;
			$quarter_type = 'First Quarter of '.date('Y');
			if (date('m') == date('m', strtotime($row->first_quarter))) 
			{
				$quarter_type = 'First Quarter of '.date('Y');
				$date_quarter = date('Y').'-'.date('m-d', strtotime($row->first_quarter));
			}
			elseif (date('m') == date('m', strtotime($row->second_quarter)))
			{
				$quarter_type = 'Second Quarter of '.date('Y');
				$date_quarter = date('Y').'-'.date('m-d', strtotime($row->second_quarter));
			}
			elseif (date('m') == date('m', strtotime($row->third_quarter)))
			{
				$quarter_type = 'Third Quarter of '.date('Y');
				$date_quarter = date('Y').'-'.date('m-d', strtotime($row->third_quarter));
			}
			//&& DATE TO AVOID DISPLAYING THE FOURTH QUARTER FROM STARTING
			elseif (date('m') == date('m', strtotime($row->fourth_quarter)) && date('Y') != date('Y', strtotime($row->date_created)))
			{
				$quarter_type = 'Fourth Quarter of '.date('Y');
				$date_quarter = date('Y').'-'.date('m-d', strtotime($row->fourth_quarter));
			}
			$loan_earnings = $this->bmrm->check_quarterly_earnings($date_quarter, $row->registered_brgy_id);
			$to_be_collected_earnings = $this->bmrm->check_quarterly_to_be_collected($date_quarter, $row->registered_brgy_id);
			
			foreach ($loan_earnings->result() as $l_e_row) 
			{
				
				//CHECK IF THERE'S A QUARTERLY EARNINGS THEN INSERT TO TABLE BRGY EARNINGS AND UPDATE brgy_mos_repayment table
				if ($l_e_row->loan_earnings != null && $l_e_row->end_quarter != null) 
				{
					$admin_commission_rate = 5;
					$admin_commission = $admin_commission_rate * ($l_e_row->loan_earnings  / 100);
					//INSERT TO BRGY EARNINGS
					$earnings_data = array(
						'registered_brgy_id' => $row->registered_brgy_id,
						'earnings' => $l_e_row->loan_earnings,//WALA PA NI GI DEDUCAN SA INVESTMENT RETURN RATE
						'quarter_type' => $quarter_type,
						'admin_commission_rate' => $admin_commission_rate.'%',
						'admin_commission' => $admin_commission
					);
					$brgy_earned = $this->bem->insert_brgy_earnings($earnings_data);

					$log_data = array(
						'action' => 'Quarterly earnings',
						'user_agent' => 'Mangjuam',
						'platform' => 'Mangjuam',
						'brgy_account_id' => $row->registered_brgy_id, //$this->session->brgy_account_id, always same no.
						'user_type' => 'Mangjuam'
					);
					$this->lm->log($log_data);

					$bmr_data_arr = array();

					foreach ($to_be_collected_earnings->result() as $bmr_row) 
					{
						$bmr_data_arr[] = array(
							'borrower_monthly_repayment_id' => $bmr_row->borrower_monthly_repayment_id,
							'is_commission_counted' => 1,
						);
					}
					//UPDATE BORROWER MONTGLY REPAYMENTS
					$this->bmrm->update_batch_bmr($bmr_data_arr);
				}
			}
		}
	}

	public function brgy_monthly_earnings()
	{
		return $this->bmrm->monthly_earnings($this->session->registered_brgy_id);
	}

	public function all_brgy_monthly_earnings()
	{
		return $this->bmrm->all_monthly_earnings();
	}

	public function has_internet()
	{
	    $connected = @fsockopen("www.google.com", 80); 
	     //website, port  (try 80 or 443)
	    if ($connected){
	        $connection = true; //action when connected
	        fclose($connected);
	    }else{
	        $connection = false; //action in connection failure
	    }
	    return $connection;
	}

	//BRGY CURRENT BALANCE
	public function brgy_current_balance()
	{
		$get_current_balance =  $this->transaction->get_current_balance();
		$current_balance = 0.00;
		if ($get_current_balance->num_rows() > 0) 
		{
			foreach ($get_current_balance->result() as $row) 
			{
				$current_balance = ($row->current_balance) ? $row->current_balance : 0.00;
			}
		}
		return $current_balance;
	}
	//LENDER CURRENT BALANCE
	public function lender_current_balance($lender_id)
	{
		$get_current_balance = $this->ltm->get_lender_current_balance($lender_id);//get the current balance first
		$current_balance = 0.00;
		if ($get_current_balance->num_rows() > 0) 
		{
			foreach ($get_current_balance->result() as $row) 
			{
				$current_balance = ($row->current_balance) ? $row->current_balance : 0.00;
			}
		}
		return $current_balance;
	}

	//LENDER CURRENT BALANCE
	public function get_borrower_outstanding_current_balance($borrower_id)
	{
		$get_outstanding_current_balance = $this->btm->get_borrower_outstanding_current_balance($borrower_id);//get the current balance first
		$outstanding_balance = 0.00;
		if ($get_outstanding_current_balance->num_rows() > 0) 
		{
			foreach ($get_outstanding_current_balance->result() as $row) 
			{
				$outstanding_balance = ($row->outstanding_balance) ? $row->outstanding_balance : 0.00;
			}
		}
		return $outstanding_balance;
	}

	public function transaction_withdrawals()
	{
		$get_transaction_withdrawals = $this->transaction->get_transaction_withdrawals();
		return $get_transaction_withdrawals;
	}

	public function transaction_payments()
	{
		$get_transaction_payments = $this->transaction->get_transaction_payments();
		return $get_transaction_payments;
	}

	//get the secret id
	public function secret_id_md5($secret_id)
	{
		return substr($secret_id, 0, strlen($secret_id) - 32);//always  minus 32 for md5 lenght
	}

	public function user_agent()
	{
		if ($this->agent->is_browser())
		{
		    $agent = $this->agent->browser().' version '.$this->agent->version();
		}
		elseif ($this->agent->is_robot())
		{
		    $agent = $this->agent->robot();
		}
		elseif ($this->agent->is_mobile())
		{
		    $agent = $this->agent->mobile();
		}
		else
		{
		    $agent = 'Unidentified User Agent';
		}
		return $agent;
	}

	public function platform()
	{
		return $this->agent->platform(); // Platform info (Windows, Linux, Mac, etc.)
	}

	public function admin_session()
	{
		if ($this->session->has_userdata('user_type')) //check if the user type super_admin id is set
		{
			if ($this->session->user_type != 'super_admin') 
			{
				show_404();
				die();
			}
		}
		else
		{
			header("location: ".base_url('admin_login')."");
			die();
		}
	}

	public function brgy_session()
	{
		if ($this->session->has_userdata('user_type')) //check if the user type is bgry_admin and id is set
		{
			if ($this->session->user_type == 'brgy_admin' || $this->session->user_type == 'brgy_staff') 
			{
				//do nothing
			}
			else
			{
				show_404();
				die();
			}
		}
		else
		{
			header("location: ".base_url('barangay_login')."");
			die();
		}
	}

	public function lender_session()
	{
		if ($this->session->has_userdata('user_type')) //check if the user type is bgry_admin and id is set
		{
			if ($this->session->user_type == 'main_user') 
			{
				if ($this->session->is_lender == 1) 
				{
					//do nothing...
				}
				else 
				{
					header("location: ".base_url('borrower')."");
					die();
				}
			}
			else
			{
				show_404();
				die();
			}
		}
		else
		{
			show_404();
			die();
		}
	}

	public function borrower_session()
	{
		if ($this->session->has_userdata('user_type')) //check if the user type is bgry_admin and id is set
		{
			if ($this->session->user_type == 'main_user') 
			{
				if ($this->session->is_borrower == 1) 
				{
					//do nothing...
				}
				else 
				{
					header("location: ".base_url('lender')."");
					die();
				}
			}
			else
			{
				show_404();
				die();
			}
		}
		else
		{
			show_404();
			die();
		}
	}

	public function main_user_session()//for common page of mian user
	{
		if ($this->session->has_userdata('user_type')) //check if the user type is bgry_admin and id is set
		{
			if ($this->session->user_type == 'main_user') 
			{
				//do nothing
			}
			else
			{
				show_404();
				die();
			}
		}
		else
		{
			show_404();
			die();
		}
	}

	public function out_session()
	{
		if ($this->session->has_userdata('user_type')) //check if the user type and id is set
		{
			if ($this->session->user_type == 'super_admin') 
			{
				header("location: ".base_url('admin')."");
				die();
			}
			elseif ($this->session->user_type == 'brgy_admin' || $this->session->user_type == 'brgy_taff') {
				header("location: ".base_url('barangay')."");
				die();
			}
			elseif ($this->session->user_type == 'main_user') {
				//check what kind of user
				if ($this->session->is_borrower == 1) 
				{
					header("location: ".base_url('borrower')."");
					die();
				}
				else
				{
					header("location: ".base_url('lender')."");
					die();
				}
			}
		}
	}

	public function to_send_email($email_message = '', $from = '', $from_name = '', $subject = '', $to = array(), $reply_to = '', $reply_to_name = '')
    {
      $config = Array(
        'protocol' => 'mail',
        'smtp_host' => 'ssl://smtp.googlemail.com',// for webmail mail.bestsystemstech.com, for google smtp.googlemail.com
        'smtp_port' => 465,
        'smtp_user' => 'mangjuamlending@gmail.com', // change it to yours
        'smtp_pass' => 'mangjuamnata', // change it to yours
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
      );

      $htmlMEssage = '<!DOCTYPE html>';
      $htmlMEssage .='<html>';
      $htmlMEssage .='<body>';
      $htmlMEssage .='<img width="170px;" style="padding: 2px" src="https://scontent.fmnl6-1.fna.fbcdn.net/v/t1.15752-9/45271537_2224624141152468_4567767246226587648_n.png?_nc_cat=103&_nc_eui2=AeF8DOe9WiBnf98XZAgEhUexM_DPtYzhdqzd1MrFz0vqOxDuolmVswMLrm1EBEpvNeoUScRlpTBP9t6efhTk-pJA_gndkswFfj7ngBwdmfiQlFULZve7r0r6p_6vVPmhpT8&_nc_ht=scontent.fmnl6-1.fna&oh=0760f0792e502f48386d837f996f1e82&oe=5C49D7B6" alt="banner">';
      $htmlMEssage .='<div style="border-style: none;">';
      $htmlMEssage .='<h4>Subject: '.$subject.'</h4>';
      $htmlMEssage .='<h4>Message:</h4>';
      $htmlMEssage .='<blockquote style="width: 500px"><em>'.$email_message.'</em></blockquote>';
      $htmlMEssage .='</div>';
      $htmlMEssage .='</body>';
      $htmlMEssage .='</html>';

      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from($from, $from_name);
      $this->email->to($to);// change it to yours
      if ($reply_to != '') 
      {
      	$this->email->reply_to($reply_to, $reply_to_name);
      }
      //$this->email->subject($subject);
      $this->email->message($htmlMEssage);

      $send_email  = null;
      if ($this->has_internet()) 
      {
      	$send_email = $this->email->send();
       //return strip_tags(show_error($this->email->print_debugger()));
      }
	  
	if ($send_email)
		return 'Email sent';
	else
		return 'Email not sent';
    }

    public function to_send_sms($mobile_no = '', $sms_message = '')
    {
    	// Configure client
		$config = Configuration::getDefaultConfiguration();
		$config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU0MTIzOTI2MiwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjYzNTA3LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.C_aMIqp1fOJpaHyj3mseweGOttWKXZkVIYoXD2sv1H0');
		$apiClient = new ApiClient($config);
		$messageClient = new MessageApi($apiClient);

		// Sending a SMS Message
		$sendMessageRequest = new SendMessageRequest([
		    'phoneNumber' => $mobile_no,//09424855562
		    'message' => $sms_message,
		    'deviceId' => 104516
		]);

		$sendMessages = null;
		if ($this->has_internet()) 
		{
			$sendMessages = $messageClient->sendMessages([$sendMessageRequest]);
		}

		if ($sendMessages)
			return 'SMS sent';
		else
			return 'SMS not sent';
    }
}