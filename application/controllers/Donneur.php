<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donneur extends CI_Controller {

    private $data = array();
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_user', 'user');
        $this->load->model('model_donneur', 'donneur');
        $this->load->model('model_quartier', 'quartier');
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

    public function demandesQuartier()
	{
        $this->checkUserlogged();
        $res = $this->user->getDemandeursParQuartier($this->session->userdata('userInfo')['id_quartier']);
        $data['title'] = 'Les demandes de mon voisinage';
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
            $this->user->creerLienUser($this->session->userdata('userInfo')['tel'],$tel);
            $this->load->view('donneur/base_view',$data);
            $this->load->view('donneur/demande_view');
            $this->load->view('donneur/modal_confirm');
            $this->load->view('donneur/footer');
        }
     
    }

    public function confirmerDon()
	{
        $this->checkUserlogged();
        $articles = $this->input->post('articles');
        if(!$articles) return;
        $res = [];
        
        foreach ($articles as $article){
            $tmp = $this->donneur->updateArticleState($article, EN_ATTENTE);
            if($tmp > 0){
                array_push($res,$article);
            }
        }
        if(sizeof($articles) > 0 && sizeof($res) > 0) {
            $tmp = $this->user->getArticleById($articles[0]);
            if($tmp){
                $this->donneur->updateDemandeState($tmp['user_tel'], EN_ATTENTE);
            }
           
        }
        echo json_encode($res);
       
     
    }

    public function get_districts()
    {
        log_message('debug', $this->input->post('ville'));
        //die(print_r($this->input->post('ville'), TRUE));
        $country=$this->input->post('ville');
        //$this->load->model('model_quartier');
        $districts = array();
        $districts = $this->quartier->getQuartier($country);
        echo json_encode($districts);
    }

    public function add_applicant()
    {
        log_message('debug', $this->input->post('tel'));
        //die(print_r($this->input->post('tel'), TRUE));
        //$country=$this->input->post('ville');
        //$this->load->model('model_quartier');
        //$districts = array();
        //$districts = $this->quartier->getQuartier($country);
        //echo json_encode($districts);
    }
    
    
    public function referents()
	{
        $this->checkUserlogged();
        $res = $this->user->getAdminVille($this->session->userdata('userInfo')['id_ville']);
        $data['title'] = 'Les ambassadeurs de la ville';
        $data['referents'] = $res;
        $this->load->view('donneur/base_view',$data);
        $this->load->view('donneur/contacts_view');
        $this->load->view('donneur/footer');
    }
    
    public function demandesSuivies()
	{
        $this->checkUserlogged();
        $res = $this->donneur->getDemandesSuivies($this->session->userdata('userInfo')['tel']);
        $data['title'] = 'Les demandes de soutien';
        $data['demandes'] = $res;
        $this->load->view('donneur/base_view',$data);
        $this->load->view('donneur/demSuiv_view');
        $this->load->view('donneur/footer');
    }
 
    public function signaler()
	{
        $this->checkUserlogged();
        if( $articles = $this->input->post('tel')){
            $phone =  $this->input->post('tel');
            $valid_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
            if (strlen($valid_number) < 8 || strlen($valid_number) > 14) {
                echo "Numero invalide";
            } 
            else {
                $tmp = $this->user->getUserByTel($phone);
                if(!$tmp){
                    echo "Ce numéro n’est pas inscrit";
                    return;
                }
                $res = $this->user->signal($this->session->userdata('userInfo')['tel'],$phone);
                if($res == 1){
                    echo " Signalement pris en compte !";
                }
                else {
                    echo " Opération non prise en compte, merci de réessayer plus tard !";
                }
                
            }     
        }
        else{
            $data['title'] = 'Signaler un abus';
            $this->load->view('donneur/base_view',$data);
            $this->load->view('donneur/signal_view');
            $this->load->view('donneur/footer');
        }
       
    }

    private function checkUserlogged() {
        if( !$this->session->userdata("log_donneur") ) {
            redirect(site_url('auth'));
        }
	}
}
