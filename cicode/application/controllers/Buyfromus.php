<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyfromus extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->view('templates/header');
        $this->load->library(array('session','form_validation'));
        
    }
	
	public function index()
	{
	    
		
		if(isset($_POST['submit'])){
		    redirect('Cart');
        }
        $this->load->model('Buyfromus_Model');
        $data['products'] = $this->Buyfromus_Model->fetch_product();
        $this->load->view('buyfromus', $data);
        
        if(isset($_POST['add_cart'])){   
    	    $this->form_validation->set_rules('quantity', 'Quantity', 'required|numeric');
    	    
    	    if ($this->form_validation->run() == TRUE){
                $_SESSION['cart'][$_POST['c_id']] = $_POST['quantity'];
    	    }
    	    
    	    else{
    	        $this->load->view('buyfromus');
    	    }
    	    
        }
	    $this->load->view('templates/footer');
	    
	}
}
        
        


