<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Cart_Model');
        $this->load->helper('url');
        $this->load->view('templates/header');
    }    
    
	public function index(){
	    if($_SESSION['cart']){
        $data['products'] = $this->Cart_Model->fetch_pro();
        $this->load->view('cart', $data);
	    }
	    else{
	        
	        redirect('Homepage');
	    }
	
	    $this->load->view('templates/footer');
	}
	
	
	public function cart_validation(){
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	    $this->form_validation->set_rules('fname', 'First Name', 'required');
	    
	    $this->form_validation->set_rules('lname', 'Last Name', 'required');
	    $this->form_validation->set_rules('address', 'Address', 'required');
	    $this->form_validation->set_rules('apt', 'Aparrtment', 'required');
	    $this->form_validation->set_rules('city', 'City', 'required');
	    $this->form_validation->set_rules('postal', 'Zip Code', 'required');
	    
	    if ($this->form_validation->run() == TRUE){
	        $this->Cart_Model->punch_order();
	        $_SESSION['cart'] = array();
	        echo "<script>alert('Items has been ordered succesfully!');</script>";
	    }
         $this->index();
	}
}