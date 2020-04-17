<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donneur extends CI_Controller {

    private $data = array();
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('model_user', 'user');
    } 
    
    
	public function index()
	{
        $this->checkUserlogged();
        $res = $this->user->getDemandeursParVille($this->session->userdata('userInfo')['id_ville']);
        $data['title'] = 'Les demandes de soutien';
        $data['demandes'] = $res;
        $this->load->view('donneur/base_view',$data);
        $this->load->view('donneur/home_view');
        $this->load->view('donneur/modal_details');
        $this->load->view('donneur/footer');
    }

    public function detailsDemande()
	{
        $this->checkUserlogged();
        $tel = $this->input->get('tel');
        if(!$tel) return;
        $res = $this->user->getUserDemande($tel);
        if($this->input->get('view')){
            echo json_encode($res);
        }
        else{
            $data['title'] = 'Je participe à aider cette personne';
            $data['articles'] = $res;
            $this->load->view('donneur/base_view',$data);
            $this->load->view('donneur/home_view');
            $this->load->view('donneur/footer');
        }
     
    }
    
    

    private function checkUserlogged() {
        if( !$this->session->userdata("log_donneur") ) {
            redirect(site_url('auth'));
        }
	}
}
