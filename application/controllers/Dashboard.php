<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
	public function index()
	{
        $this->auth_lib->redirect_if_not_authenticated('auth');
        
        // $this->load->view('pages/dashboard/index');
	}
}
