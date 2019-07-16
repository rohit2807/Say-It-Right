<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('templates/header.php');
    }    
    
	public function index(){
		$this->load->library('form_validation');
	    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	    $this->form_validation->set_rules('pass', 'Password', 'required');
	    
	    
	    if ($this->form_validation->run() == TRUE){
	        $this->load->model('Loginmodel');
    	    $check = $this->Loginmodel->credcheck();
    	    
    	    if($check){
    	        $_SESSION['user_email'] = $check;
    	        redirect('individualhome');
    	    }
    	    else{
    	        $data["error"]="Invalid User Id or Password";
                $this->load->view('login',$data);
    	    }
	    }
	    else{
	        $this->load->view('login');
	    }
	    $this->load->view('templates/footer.php');
	}
	
}

