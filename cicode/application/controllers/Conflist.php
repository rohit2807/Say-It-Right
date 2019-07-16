<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Conflist extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(array('session','form_validation'));
        $this->load->model('Confmodel');
    }
	
	public function index()
	{
	    $this->load->helper('url');
        $this->load->model('Confmodel');
	    $data['conf'] = $this->Confmodel->fetch_conf();
	    $this->load->view('conflist', $data);
		

	}
	    
	
}

