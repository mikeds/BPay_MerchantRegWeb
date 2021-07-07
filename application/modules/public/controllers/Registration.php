<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends Public_Controller {

	private
		$_gender = array(
			array(
				'id'	=> 1,
				'name' 	=> "Male"
			),
			array(
				'id'	=> 2,
				'name' 	=> "Female"
			)
		);

	public function after_init(){
		$this->set_scripts_and_styles();
	}

	public function index() {
		$this->load->model('last_inserted_user_model', 'last_inserted_user');		
		$this->add_scripts(base_url() . "assets/public/js/biz-type-selected.js", true);

		$this->_data['form_url']		= base_url();
		$this->_data['notification'] 	= $this->session->flashdata('notification');

		$country_id 	= "169"; // PH
		$province_id 	= "";
		$sof			= "";
		$now			= "";
		$id_type		= "";

		if ($_POST) {

			$this->_data['post'] = $_POST;

			$province_id 	= $this->input->post("province");
			$sof			= $this->input->post("sof");
			$now			= $this->input->post("now");
			$id_type		= $this->input->post("id-type");

			if ($this->form_validation->run('validate')) {
				$profile_picture	= isset($_FILES['profile-picture']) ? $_FILES['profile-picture'] : "";
				$first_name			= $this->input->post("first-name");
				$middle_name		= $this->input->post("middle-name");
				$last_name			= $this->input->post("last-name");
				$email_address		= $this->input->post("email-address");
				$password			= $this->input->post("password");
				$repeat_password	= $this->input->post("repeat-password");
				$mobile_no			= $this->input->post("mobile-no");
				$dob				= $this->input->post("dob");
				$pob				= $this->input->post("pob");
				$gender				= $this->input->post("gender");
				$house_no			= $this->input->post("house-no");
				$street				= $this->input->post("street");
				$barangay			= $this->input->post("barangay");
				$city				= $this->input->post("city");
				$province_id		= $this->input->post("province");
				$postal_code		= $this->input->post("postal-code");
				$sof				= $this->input->post("sof");
				$now				= $this->input->post("now");
				$id_type			= $this->input->post("id-type");
				$id_no				= $this->input->post("id-no");
				$id_expiration_date	= $this->input->post("exp-date");
				$agent_code			= $this->input->post("agent-code");
				$id_front			= isset($_FILES['id-front']) ? $_FILES['id-front'] : "";
				$id_back			= isset($_FILES['id-back']) ? $_FILES['id-back'] : "";

				$agreement_policy	= $this->input->post("agreement-policy");


				if ($password != $repeat_password) {
					$this->_data['notification'] = $this->generate_notification('warning', 'Password confirmation is not the same!');
					goto end;
				}

				if (!isset($_FILES['id-front'])) {
					$this->_data['notification'] = $this->generate_notification('warning', 'ID Photo Front is required!');
					goto end;
				}

				if (!isset($_FILES['id-back'])) {
					$this->_data['notification'] = $this->generate_notification('warning', 'ID Photo Back is required!');
					goto end;
				}



				$password = hash("sha256", $password);

				$response = $this->set_register_client(
					$profile_picture,
					$first_name,
					$middle_name,
					$last_name,
					$email_address,
					$password,
					$mobile_no,
					$dob,
					$pob,
					$gender,
					$house_no,
					$street,
					$barangay,
					$city,
					$country_id,
					$province_id,
					$postal_code,
					$sof,
					$now,
					$id_type,
					$id_no,
					$id_expiration_date,
					$id_front,
					$id_back,
					$agent_code
				);

				if (isset($response['error'])) {
					if ($response['error']) {
						$this->_data['notification'] = $this->generate_notification('warning', $response['error_description']);
						goto end;
<<<<<<< HEAD
					}else{
						$last_user = array(
							'user_type' 		=> 2, // client
							'user_phone_no'		=> $mobile_no
						);
						$this->last_inserted_user->insert($last_user);
						redirect('http://developer.globelabs.com.ph/dialog/oauth/AMM8H69MMeCb5Tp4nBiMnGC8kM7MHMba');
					} 

=======
					} else {
						if($enroll_as_agent == 1){
							$agent_enroll_response = $this->set_register_agent(
								$profile_picture,
								$first_name,
								$middle_name,
								$last_name,
								$email_address,
								$password,
								$mobile_no,
								$dob,
								$pob,
								$gender,
								$house_no,
								$street,
								$barangay,
								$city,
								$country_id,
								$province_id,
								$postal_code,
								$sof,
								$now,
								$id_type,
								$id_no,
								$id_expiration_date,
								$id_front,
								$id_back
							);
								$this->session->set_flashdata('notification', $this->generate_notification('success', isset($response['message']) ? $response['message'] : "Successfully registered to merchant and agent account!"));
								redirect($this->_data['form_url']);
						}else{
							$last_user = array(
								'user_type' 		=> 1, // merchant
								'user_phone_no'		=> $mobile_no
							);
							$this->last_inserted_user->insert($last_user);
							redirect('http://developer.globelabs.com.ph/dialog/oauth/AMM8H69MMeCb5Tp4nBiMnGC8kM7MHMba');
							//$this->session->set_flashdata('notification', $this->generate_notification('success', isset($response['message']) ? $response['message'] : "Successfully registered!"));
						}	
						
					}
>>>>>>> 6c8c51c11e6a10a8374f64be18048200731c1bd1
				}

				$this->_data['notification'] = $this->generate_notification('warning', "Unable to save registration to server!");
				goto end;
			}
		}

		end:

		$this->_data['gender'] = $this->generate_selection(
			"gender", 
			$this->_gender, 
			1, 
			"id", 
			"name", 
			true
		);
		
		$this->_data['province']	= $this->generate_selection(
			"province", 
			$this->get_provinces($country_id), 
			$province_id, 
			"id", 
			"name", 
			false,
			"Please Select Province"
		);

		$this->_data['sof']	= $this->generate_selection(
			"sof", 
			$this->get_sof(), 
			$sof, 
			"id", 
			"name", 
			false,
			"Please Select"
		);

		$this->_data['now']	= $this->generate_selection(
			"now", 
			$this->get_now(), 
			$now, 
			"id", 
			"name", 
			false,
			"Please Select"
		);

		$this->_data['id_type'] = $this->generate_selection(
			"id-type", 
			$this->get_id_types(), 
			$id_type, 
			"id", 
			"name", 
			false,
			"Please Select"
		);

		$this->_data['title']  = "Client Registration";
		$this->set_template("registration/form", $this->_data);
	}

	public function otp_validation($mobile_no=0){
		$this->_data['form_url']		= base_url().'otp-validation/'.$mobile_no;
		$this->_data['notification'] 	= $this->session->flashdata('notification');
		$this->_data['title']  = "OTP Validation";
<<<<<<< HEAD
=======

>>>>>>> 6c8c51c11e6a10a8374f64be18048200731c1bd1
		$otp_code = $this->input->post('otp-code');
		if(empty($otp_code)){
			$response = $this->otp_request(
				$mobile_no,
				'reg',
<<<<<<< HEAD
				'client'
=======
				'merchant'
>>>>>>> 6c8c51c11e6a10a8374f64be18048200731c1bd1
			); 
		}
		if($_POST){
			$submit_response = $this->otp_submit(
				$otp_code,
				$mobile_no
			);

			if (isset($submit_response['message'])) {
				$this->session->set_flashdata('notification', $this->generate_notification('success', $submit_response['message']));
				redirect(base_url());
			}
			if(isset($submit_response['error_description'])){
			$this->session->set_flashdata('notification', $this->generate_notification('warning', $submit_response['error_description']));
			}
		}

		$this->set_template("registration/otp_form", $this->_data);
	}
}




















