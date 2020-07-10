<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    private $data = array();
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_user', 'user');
        $this->load->model('model_donneur', 'donneur');
    } 
    
    
	public function index()
	{
        $this->checkUserlogged();
        $res = $this->user->getDemandeursParVille($this->session->userdata('userInfo')['id_ville']);
        $data['title'] = 'Les demandes de soutien';
        $data['demandes'] = $res;
        $this->load->view('admin/base_view',$data);
        $this->load->view('admin/home_view');
        $this->load->view('admin/modal_details');
        $this->load->view('admin/footer');
    }

    public function demandesQuartier()
	{
        $this->checkUserlogged();
        $res = $this->user->getDemandeursParQuartier($this->session->userdata('userInfo')['id_quartier']);
        $data['title'] = 'Les demandes de mon voisinage';
        $data['demandes'] = $res;
        $this->load->view('admin/base_view',$data);
        $this->load->view('admin/home_view');
        $this->load->view('admin/modal_details');
        $this->load->view('admin/footer');
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
            $this->load->view('admin/base_view',$data);
            $this->load->view('admin/demande_view');
            $this->load->view('admin/modal_confirm');
            $this->load->view('admin/footer');
        }
     
    }

    public function confirmerDon()
	{
        $this->checkUserlogged();
        $articles = $this->input->post('articles');
        if(!$articles) return;
        $resArticle = [];
        $articleDemande = null;
        $res = array("articles"=>[], "demande" => null);
        if(sizeof($articles) > 0 ) {
            $articleDemande = $this->user->getArticleById($articles[0]);
        }
        foreach ($articles as $article){
            $tmp = $this->user->supprimerArticle($article);
            if($tmp > 0){
                array_push($resArticle,$article);
                $this->user->incrementUserArticleTraite($articleDemande['user_tel']);
            }
        }
        $res['articles'] = $resArticle;
   
        if($articleDemande &&  $this->user->getDemNbArticle($articleDemande['user_tel']) == 0 ){
            $this->user->archiverUserDemande($articleDemande['user_tel']);
            $this->user->incrementUserDemande($articleDemande['user_tel']); 
            $res['demande'] = true;
        }

        else if($articleDemande &&  sizeof($this->user->getDemArticleEnAttente($articleDemande['user_tel'])) == 0 ){
            $this->donneur->updateDemandeState($articleDemande['user_tel'], 0);
        }
        echo json_encode($res);
    }
    
    
    public function demandesEnAttentes()
	{
        $this->checkUserlogged();
        $res = $this->user->getDemandeursEnAttente($this->session->userdata('userInfo')['id_ville']);
        $data['title'] = 'Demandes traitées en attentes de confirmation';
        $data['demandes'] = $res;
        $this->load->view('admin/base_view',$data);
        $this->load->view('admin/demSuiv_view');
        $this->load->view('admin/footer');
    }
    

    public function users()
	{
        $this->checkUserlogged();
        if($this->session->userdata('userInfo')['type'] == ROOT){
            $res = $this->user->getAllUser();
            $data['title'] = 'Les utilisateurs de la ville de '.$this->session->userdata('userInfo')['ville'];
        }
        else{
            $res = $this->user->getUserQuartier($this->session->userdata('userInfo')['id_quartier']);
            $data['title'] = 'Les utilisateurs du quartier '.$this->session->userdata('userInfo')['quartier'];
        }

        $data['users'] = $res;
        $this->load->view('admin/base_view',$data);
        $this->load->view('admin/users_view');
        $this->load->view('admin/modal_supprim');
        $this->load->view('admin/footer');
    
    } 
    
    public function supprimUser ()
	{
        $this->checkUserlogged();
        $res = $this->user->archiverUser($this->input->post('tel'));
        if($res){
            $this->user->archiverUserDemande($this->input->post('tel'));
        }
        echo $res;
    
    }

    public function demandesSuivies()
	{
        $this->checkUserlogged();
        $res = $this->donneur->getDemandesSuivies($this->session->userdata('userInfo')['tel']);
        $data['title'] = 'Les demandes de soutien';
        $data['demandes'] = $res;
        $this->load->view('admin/base_view',$data);
        $this->load->view('admin/demSuiv_view');
        $this->load->view('admin/footer');
    }

    public function signaler()
	{
        $this->checkUserlogged();
        $res = $this->user->getUsersSignales();
        $data['title'] = 'Les numéros signalés';
        $data['users'] = $res;
        $this->load->view('admin/base_view',$data);
        $this->load->view('admin/signal_view');
        $this->load->view('admin/modal_supprim');
        $this->load->view('admin/footer');
       
    }

    private function checkUserlogged() {
        if( !$this->session->userdata("log_admin") ) {
            redirect(site_url('auth'));
        }
	}
}
