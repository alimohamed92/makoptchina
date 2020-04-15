<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donneur extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('model_user', 'user');
    } 
    
    
	public function index()
	{
		$this->load->view('donneur/base_view');
	}
}
