<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	
	function __construct() {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->model('Contactmodel');
    }    
    
	public function index(){
	    $this->load->helper('url');
	    $this->load->view('templates/cheader.php');
		$this->load->view('contact');
		$this->load->view('templates/footer.php');
	}
	
	public function contact_validation(){
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('c_fname', 'First Name', 'required');
	    $this->form_validation->set_rules('c_lname', 'Last Name', 'required');
	    $this->form_validation->set_rules('c_phone', 'Telephone', 'required|regex_match[/^[0-9]{10}$/]');
	    $this->form_validation->set_rules('c_message', 'Message', 'required');
	    
	    if ($this->form_validation->run() == TRUE){
            $this->Contactmodel->pushDetails();
	        echo "<script>alert('Message Sent!');</script>";
	       
	    }
        $this->index();
	}
}
