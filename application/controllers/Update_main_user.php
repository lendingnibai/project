<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_main_user extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->main_user_session();
        $this->load->model('User_details_model', 'udm');
    }

    public function __do_trapping_update_profile($first_name, $last_name, $gender, $dob, $civil_status, $gov_id, $mobile_no, $barangay, $street, $city, $state_prov, $zip_code, $oor)
    {

        if (!$first_name && !$last_name && !$gender && !$dob && !$civil_status && !$gov_id && !$mobile_no && !$barangay && !$street && !$city && !$state_prov && !$zip_code && !$oor) {
            return 'Please fill all the required fields';
        }
        elseif (!$first_name) {
            return 'Please input first name';
        }
        elseif (!$last_name) {
            return 'Please input last name';
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
        elseif (!$gov_id) {
            return 'Please upload any government id';
        }
        elseif (!$mobile_no) {
            return 'Please input mobile no.';
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
            return 'Please input zip_code';
        }
        elseif (!$oor) {
            return 'Please select Ownership of residence';
        }
    }

    public function update_profile()
    {
        $code_number = 0;
        $user_details_gov_id_date_updated = $this->udm->get_this_date_updated($this->session->user_account_id);

        $gov_id_trapping = null;
        $target_file = null;
        if ($user_details_gov_id_date_updated->num_rows() > 0) 
        {
            foreach ($user_details_gov_id_date_updated->result() as $row) 
            {
                $gov_id_trapping = 1;
                $gov_id_path = $row->gov_id;
            }
        }

        $for_approval_indicator = $this->input->post('for_approval_indicator');//VALUE 1 KUNF NAG UPDATE SILA SA IALNG PROFILE SA NAKAGAMIT NA

        $first_name = $this->input->post('first_name');
        $middle_name = $this->input->post('middle_name');//not required
        $last_name = $this->input->post('last_name');
        $gender = $this->input->post('gender');
        $dob = $this->input->post('dob');
        $civil_status = $this->input->post('civil_status');
        $spouse_name = $this->input->post('spouse_name');//not required
        $gov_id = $_FILES['gov_id']['name'];
        $mobile_no = $this->input->post('mobile_no');
        $barangay = $this->input->post('barangay');
        $street = $this->input->post('street');
        $city = $this->input->post('city');
        $state_prov = $this->input->post('state_prov');
        $zip_code = $this->input->post('zip_code');
        $oor = $this->input->post('oor');
        //$url_location = $this->input->post('url_location');
        
        //CHECK FIRST IF NOT TRUE
        if (!$gov_id) 
        {
            //IF TRUE IT MEANS THEY'RE SUBMITTED ONCE THEN SET THE OLD UPLOADED FILE PATH
            if ($gov_id_trapping == 1)
            {
                $target_file = $gov_id_path;
                $gov_id = 'submitted_once';
            }
        }

        $trapping_message  = null;//use for disbled trapping
        $trapping_message = $this->__do_trapping_update_profile($first_name, $last_name, $gender, $dob, $civil_status, $gov_id, $mobile_no, $barangay, $street, $city, $state_prov, $zip_code, $oor);

        if ($trapping_message) 
        {
            $this->output->set_output(json_encode(
                array('message' => $trapping_message, 'code' => $code_number)
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

            if (!$this->upload->do_upload('gov_id') && $gov_id != 'submitted_once')
            {
                $this->output->set_output(json_encode(
                    array('message' => strip_tags($this->upload->display_errors()), 'code' => $code_number)
                ));
            }
            else
            {
                if ($gov_id != null && $gov_id != '' && $gov_id != 'submitted_once') 
                {
                    $data = array('upload_data' => $this->upload->data());
                    $target_file = $data['upload_data']['full_path'];//path name
                    $pos = strpos($target_file, 'public/');
                    $target_file = substr($target_file, $pos);
                }
                    
                if ($this->session->registered_brgy_id == null)//check kung wala na register iyang brgy pwede ra siya dili na i approve
                {
                    $for_approval = 0;
                    $is_completed = 1;
                    $reason_message = '';
                }
                else
                {
                    $for_approval = 1;
                    $is_completed = 0;
                    $reason_message = 'Waiting for approval.';//set to default message 

                    //PARA NI SA UPDATED
                    if ($for_approval_indicator == 1) 
                    {
                        $for_approval = 0;
                        $is_completed = 1;
                        $reason_message = '';
                    }
                }

                if (strtoupper($gender) == 'MALE') 
                    $photo = 'public/img/default_profile/male.jpg';
                else
                    $photo = 'public/img/default_profile/female.jpg';

                $user_profile_data = array(
                    'first_name' => $first_name,
                    'middle_name' => $middle_name,
                    'last_name' => $last_name,
                    'gender' => $gender,
                    'dob' => date('Y-m-d', strtotime($dob)),
                    'civil_status' => $civil_status,
                    'spouse_name' => $spouse_name,
                    'mobile_no' => $mobile_no,
                    'street' => $street,
                    'barangay' => $barangay,
                    'city' => $city,
                    'state_prov' => $state_prov,
                    'zip_code' => $zip_code,
                    'oor' => $oor,
                    'gov_id' => $target_file,
                    'photo' => $photo,
                    'is_completed' => $is_completed,
                    'for_approval' => $for_approval,//para ma kita sa brgy admin kung kinsa ang ni register para ma aprobahan
                    'reason_message' => $reason_message
                );

                $update_user_profile = $this->udm->update_user_profile($user_profile_data);

                if ($update_user_profile > 0) 
                {
                    $code_number = 1;

                    //do notify the brgy after updating the details

                    if ($this->session->is_borrower == 1) 
                        $user_type_b_or_l = 'borrower';
                    else
                        $user_type_b_or_l = 'lender';

                    $log_data = array(
                        'action' => 'Updated incomplete user profile',
                        'user_agent' => $this->user_agent(),
                        'platform' => $this->platform(),
                        'user_account_id' => $this->session->user_account_id,
                        'user_type' => 'main_user as ('.$user_type_b_or_l.')'//user_type_b_or_l value lender or borrower
                        );

                    $this->lm->log($log_data);

                    $this->output->set_output(json_encode(
                            array('message' => 'Your personal information was successfully updated.', 'code' => $code_number)
                    ));
                }
            }
        }
    }
}
