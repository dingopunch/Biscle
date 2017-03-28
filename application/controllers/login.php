<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*	
 *	@author : Joyonto Roy
 *	30th July, 2014
 *	Creative Item
 *	www.creativeitem.com
 *	http://codecanyon.net/user/joyontaroy
 */
 
 
class Login extends CI_Controller
{
    
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->database();
        /*cache control*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }
	
    //Default function, redirects to logged in user area
    public function index()
    {
      $this->load->view('backend/header');
        if ($this->session->userdata('user_login') == 1)
             $this->load->view('backend/user-home');
			  else
		    $this->load->view('backend/login');
        
			$this->load->view('backend/footer');
    }
    
	//Ajax login function 
	function user_home()
	{
		$response = array();
		
		//Recieving post input of email, password from ajax request
		$email 		= $_POST["email"];
		$password 	= $_POST["password"];
		$response['submitted_data'] = $_POST;		
		
		//Validating login
		$login_status = $this->validate_login( $email ,  $password );
		$response['login_status'] = $login_status;
		if ($login_status == 'success') {
			  $this->load->view('backend/header');
			  $this->load->view('backend/user-home');
				$this->load->view('backend/footer');
		}else {
			  $this->load->view('backend/header');
		    $page_data['error_message']  = 'Invalid email or password';
        $this->load->view('backend/login', $page_data);	
				$this->load->view('backend/footer');
		}
		//Replying ajax request with validation response
		//echo json_encode($response);
	}
    
    //Validating login from ajax request
    function validate_login($email	=	'' , $password	 =  '')
    {
		 $credential	=	array(	'email' => $email , 'password' => $password , 'status' => '1' );
		 
		 
		 // Checking login credential for admin
        $query = $this->db->get_where('user' , $credential);
		    $check=$query->num_rows();
        if ($query->num_rows() > 0) {
            $row = $query->row();
			  $this->session->set_userdata('user_login', '1');
			  $this->session->set_userdata('userId', $row->userId);
			  $this->session->set_userdata('username', $row->username);
			  $this->session->set_userdata('loginType', $row->loginType);
			  return 'success';
		}
		return 'invalid';
    }
    
    /***DEFAULT NOR FOUND PAGE*****/
    function four_zero_four()
    {
        $this->load->view('four_zero_four');
    }
    

	/***RESET AND SEND PASSWORD TO REQUESTED EMAIL****/
	function reset_password()
	{
		$account_type = $this->input->post('account_type');
		if ($account_type == "") {
			redirect(base_url(), 'refresh');
		}
		$email  = $this->input->post('email');
		$result = $this->email_model->password_reset_email($account_type, $email); //SEND EMAIL ACCOUNT OPENING EMAIL
		if ($result == true) {
			$this->session->set_flashdata('flash_message', get_phrase('password_sent'));
		} else if ($result == false) {
			$this->session->set_flashdata('flash_message', get_phrase('account_not_found'));
		}
		
		redirect(base_url(), 'refresh');		
	}
    /*******LOGOUT FUNCTION *******/
    function logout()
    {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url() , 'refresh');
    }
    
}
