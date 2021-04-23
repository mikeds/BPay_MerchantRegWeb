<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CMS_Controller class
 * Base controller ?
 *
 * @author Marknel Pineda
 */
class Public_Controller extends Global_Controller {

	private 
		$_stylesheets = array(),
		$_scripts = array();
	
	protected
		$_base_controller = "public",
		$_base_session = "session",
		$_data = array(); // shared data with child controller

	protected
		$_token = "";

	/**
	 * Constructor
	 */
	public function __construct() {
		// Initialize all configs, helpers, libraries from parent
		parent::__construct();
		date_default_timezone_set("Asia/Manila");
		$this->_today = date("Y-m-d H:i:s");
		
		$this->validate_login();
		$this->token_request();
		$this->after_init();
	}

	public function validate_login() {
        $controller = strtolower(get_controller());
		if(!empty($this->session->userdata("{$this->_base_session}")) && $controller == 'login' ) {
            redirect(base_url() . "logout");
        }
	}

	public function generate_avatar($avatar_base_64) {
		$avatar = base_url() . "assets/images/user-default.png";

		if (!empty($avatar_base_64)) {
			$avatar = "data:image/png;base64,{$avatar_base_64}";
		}

		return $avatar;
	}

	private function token_request() {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => BASE_URL_API . 'token',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Basic ' . base64_encode(SECRET_KEY . ":" . SECRET_CODE),
			'Content-Type: application/x-www-form-urlencoded'
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		
		$response = json_decode($response);

		if (isset($response->access_token)) {
			$this->_token = $response->access_token;

			return $this->_token;
		}
	}

	public function set_register_merchant(
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
		$brgy,
		$city,
		$country_id,
		$province_id,
		$postal_code,
		$source_of_funds,
		$nature_of_work,
		$biz_type,
		$id_type,
		$id_no,
		$id_expiration_date,
		$id_front,
		$id_back
	) {

		$token = $this->token_request();

		$post = array(
			'first_name' 		=> $first_name,
			'middle_name' 		=> $middle_name,
			'last_name' 		=> $last_name,
			'email_address' 	=> $email_address,
			'password' 			=> $password,
			'mobile_no' 		=> $mobile_no,
			'dob' 				=> $dob,
			'pob' 				=> $pob,
			'gender' 			=> $gender,
			'house_no' 			=> $house_no,
			'street' 			=> $street,
			'brgy' 				=> $brgy,
			'city' 				=> $city,
			'country_id' 		=> $country_id,
			'province_id' 		=> $province_id,
			'postal_code' 		=> $postal_code,
			'source_of_funds' 	=> $source_of_funds,
			'nature_of_work' 	=> $nature_of_work,
			'biz_type'			=> $biz_type,
			'id_type' 			=> $id_type,
			'id_no' 			=> $id_no,
			'id_expiration_date'=> $id_expiration_date
		);

		if (isset($id_front['tmp_name'])) {
			$id_front = curl_file_create(
				$id_front['tmp_name'],
				$id_front['type'],
				$id_front['name']
			);

			$post = array_merge(
				$post,
				array(
					'id_front'=> $id_front
				)
			);
		}

		if (isset($profile_picture['tmp_name'])) {
			$profile_picture = curl_file_create(
				$profile_picture['tmp_name'],
				$profile_picture['type'],
				$profile_picture['name']
			);

			$post = array_merge(
				$post,
				array(
					'profile_picture'=> $profile_picture
				)
			);
		}

		if (isset($id_back['tmp_name'])) {
			$id_back = curl_file_create(
				$id_back['tmp_name'],
				$id_back['type'],
				$id_back['name']
			);

			$post = array_merge(
				$post,
				array(
					'id_back'=> $id_back
				)
			);
		}

		$curl = curl_init();
		
		curl_setopt_array($curl, array(
		  CURLOPT_URL => BASE_URL_API . 'merchants/registration',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => $post,
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer ' . $token,
			'Accept: */*',
			'Content-Type: multipart/form-data;'
		  ),
		));
		
		$response = curl_exec($curl);
		
		curl_close($curl);
	
		$response = json_decode($response);

		if (isset($response->error_description)) {
			return array(
				'error' 			=> true,
				'error_description'	=> $response->error_description
			);
		}

		if (isset($response->message)) {
			return array(
				'error' 	=> false,
				'message'	=> $response->message
			);
		}

		return array(
			'error' 			=> true,
			'error_description'	=> 'Unable to save registration info!'
		);
	}

	public function get_countries() {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL =>  BASE_URL_API . 'tools/countries',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer ' . $this->_token
		  ),
		));
		
		$response = curl_exec($curl);
		
		curl_close($curl);
		
		$response = json_decode($response);

		if (isset($response->response)) {
			$response = $response->response;

			$data = array();

			foreach($response as $item) {
				$data[] = array(
					'id' 	=> $item->country_id,
					'name' 	=> $item->country_name
				);
			}

			return $data;
		}

		return array();
	}

	public function get_provinces($country_id) {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL =>  BASE_URL_API . 'tools/provinces/' . $country_id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer ' . $this->_token
		  ),
		));
		
		$response = curl_exec($curl);
		
		curl_close($curl);
		
		$response = json_decode($response);

		if (isset($response->response)) {
			$response = $response->response;

			$data = array();

			foreach($response as $item) {
				$data[] = array(
					'id' 	=> $item->province_id,
					'name' 	=> $item->province_name
				);
			}

			return $data;
		}

		return array();
	}

	public function get_sof() {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL =>  BASE_URL_API . 'tools/source-of-funds',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer ' . $this->_token
		  ),
		));
		
		$response = curl_exec($curl);
		
		curl_close($curl);
		
		$response = json_decode($response);

		if (isset($response->response)) {
			$response = $response->response;

			$data = array();

			foreach($response as $item) {
				$data[] = array(
					'id' 	=> $item->sof_id,
					'name' 	=> $item->sof_name
				);
			}

			return $data;
		}

		return array();
	}

	public function get_now() {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL =>  BASE_URL_API . 'tools/nature-of-work',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer ' . $this->_token
		  ),
		));
		
		$response = curl_exec($curl);
		
		curl_close($curl);
		
		$response = json_decode($response);

		if (isset($response->response)) {
			$response = $response->response;

			$data = array();

			foreach($response as $item) {
				$data[] = array(
					'id' 	=> $item->now_id,
					'name' 	=> $item->now_name
				);
			}

			return $data;
		}

		return array();
	}

	public function get_biz_types() {
		return array(
			array(
				'id'	=> 1,
				'name'	=> "Sole Proprietary"
			),
			array(
				'id'	=> 2,
				'name'	=> "Partnership / Corporations Foundations"
			),
			array(
				'id'	=> 3,
				'name'	=> "Cooperatives / People's Organization"
			),
			array(
				'id'	=> 4,
				'name'	=> "Gov't Owned & Controlled Corporation (GOCC)"
			)
		);
	}

	public function get_id_types() {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL =>  BASE_URL_API . 'tools/id-types',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer ' . $this->_token
		  ),
		));
		
		$response = curl_exec($curl);
		
		curl_close($curl);
		
		$response = json_decode($response);

		if (isset($response->response)) {
			$response = $response->response;

			$data = array();

			foreach($response as $item) {
				$data[] = array(
					'id' 	=> $item->id_type_id,
					'name' 	=> $item->id_type_name
				);
			}

			return $data;
		}

		return array();
	}

	/**
	 * Generate Menu UI
	 *
	 */
	public function set_scripts_and_styles() {
		$this->add_styles(base_url() . "assets/frameworks/majestic-admin/vendors/mdi/css/materialdesignicons.min.css", true);
		$this->add_styles(base_url() . "assets/frameworks/majestic-admin/vendors/base/vendor.bundle.base.css", true);
		$this->add_styles(base_url() . "assets/frameworks/majestic-admin/css/style.css", true);
		$this->add_styles(base_url() . "assets/{$this->_base_controller}/css/style.css", true);

		// inject:js
		$this->add_scripts(base_url() . "assets/frameworks/majestic-admin/vendors/base/vendor.bundle.base.js", true);
		$this->add_scripts(base_url() . "assets/frameworks/majestic-admin/js/off-canvas.js", true);
		$this->add_scripts(base_url() . "assets/frameworks/majestic-admin/js/hoverable-collapse.js", true);
		$this->add_scripts(base_url() . "assets/frameworks/majestic-admin/js/template.js", true);
		// endinject

		$this->add_scripts(base_url() . "assets/{$this->_base_controller}/js/scripts.js", true);
	}
}
