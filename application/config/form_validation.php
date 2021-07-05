<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Form validation rules by on controller
 *
 */
$default_rules 		= "trim|alpha_numeric_spaces|xss_clean";
$required_rules 	= "trim|required|alpha_numeric_spaces|xss_clean";

$default_numeric_rules 	= "trim|numeric|xss_clean";
$required_numeric_rules = "trim|required|numeric|xss_clean";

$default_alpha_rules 	= "trim|alpha|xss_clean";
$required_alpha_rules 	= "trim|required|alpha|xss_clean";

$default_alphanumeric_rules 	= "trim|alpha_numeric|xss_clean";
$required_alphanumeric_rules 	= "trim|required|alpha_numeric|xss_clean";

$required_email_rules 	= "trim|required|valid_email|xss_clean";

switch( strtolower(get_controller()) ) {
	case 'registration' : 
		$config = array(
			'validate' => array(
				array( 	
					'field' => 'first-name',
					'label' => 'First Name',
					'rules'	=> $required_rules
				),
				array( 	
					'field' => 'middle-name',
					'label' => 'Middle Name',
					'rules'	=> $default_rules
				),
				array( 	
					'field' => 'last-name',
					'label' => 'Last Name',
					'rules'	=> $required_rules
				),
				array( 	
					'field' => 'email-address',
					'label' => 'Email Address',
					'rules'	=> $required_email_rules
				),
				array( 	
					'field' => 'password',
					'label' => 'Password',
					'rules'	=> "trim|xss_clean|required"
				),
				array( 	
					'field' => 'repeat-password',
					'label' => 'Repeat Password',
					'rules'	=> "trim|xss_clean|required"
				),
				array( 	
					'field' => 'mobile-no',
					'label' => 'Mobile Number',
					'rules'	=> $required_numeric_rules
				),
				array( 	
					'field' => 'dob',
					'label' => 'Date of Birth',
					'rules'	=> 'trim|xss_clean|required'
				),
				array( 	
					'field' => 'pob',
					'label' => 'Place of Birth',
					'rules'	=> $required_rules
				),
				array( 	
					'field' => 'gender',
					'label' => 'Gender',
					'rules'	=> 'trim|xss_clean|required'
				),
				array( 	
					'field' => 'house-no',
					'label' => 'House No.',
					'rules'	=> 'trim|xss_clean|required'
				),
				array( 	
					'field' => 'street',
					'label' => 'Street',
					'rules'	=> 'trim|xss_clean|required'
				),
				array( 	
					'field' => 'barangay',
					'label' => 'Barangay',
					'rules'	=> 'trim|xss_clean|required'
				),
				array( 	
					'field' => 'city',
					'label' => 'City',
					'rules'	=> 'trim|xss_clean|required'
				),
				array( 	
					'field' => 'province',
					'label' => 'State/Province',
					'rules'	=> 'trim|xss_clean|required'
				),
				array( 	
					'field' => 'postal-code',
					'label' => 'Postal Code',
					'rules'	=> 'trim|xss_clean|required'
				),
				array( 	
					'field' => 'sof',
					'label' => 'Source of Income',
					'rules'	=> 'trim|xss_clean|required'
				),
				array( 	
					'field' => 'now',
					'label' => 'Nature of Work',
					'rules'	=> 'trim|xss_clean|required'
				),
				array( 	
					'field' => 'id-type',
					'label' => 'ID Type',
					'rules'	=> 'trim|xss_clean|required'
				),
				array( 	
					'field' => 'id-no',
					'label' => 'ID No.',
					'rules'	=> 'trim|xss_clean|required'
				),
				array( 	
					'field' => 'exp-date',
					'label' => 'ID Expiration Date',
					'rules'	=> 'trim|xss_clean|required'
				),
				array( 	
					'field' => 'agent-code',
					'label' => 'Agent Referral Code',
					'rules'	=> 'trim|xss_clean|required'
				),
				array( 	
					'field' => 'agreement-policy',
					'label' => 'Terms and Condition, Privacy Policy and EULA',
					'rules'	=> 'trim|xss_clean|required'
				)
			),
		);
	break;

	default : $config = array();
}


// pre( $config );

/* End of file form_validation.php */
/* Location: ./application/config/form_validation.php */