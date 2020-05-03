<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_stat', 'stat');
         } 
    
	public function index()
	{
		$demandes = $this->stat->getNbDemandes();
		$demandeurs = $this->stat->getNbDemandeurs();
		$donneurs = $this->stat->getNbDonneurs();
		
		//redirect('auth');
		$this->load->view('welcome_message',  array('demandeurs' => $demandeurs, 'donneurs' => $donneurs ,'demandes' => $demandes));
		//$data['demandes'] = $demandes;
		//$this->load->view('welcome_message',  $data);
	}
}
