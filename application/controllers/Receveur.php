<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receveur extends CI_Controller {

    private $data = array();
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_user', 'user');
        $this->load->model('model_receveur', 'receveur');
    } 
    
    
	public function index()
	{
        $this->checkUserlogged();
        $res = $this->user->getUserDemande($this->session->userdata('userInfo')['tel']);
        $data['title'] = 'Mon dossier de demande';
        $data['articles'] = $res;
        $this->load->view('receveur/base_view',$data);
        $this->load->view('receveur/demande_view');
        $this->load->view('receveur/modal_confirm');
        $this->load->view('receveur/footer');
    }

    public function confirmerReception()
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
            }
        }
        $res['articles'] = $resArticle;
   
        if($articleDemande &&  $this->user->getDemNbArticle($articleDemande['user_tel']) == 0 ){
            $this->user->archiverUserDemande($articleDemande['user_tel']);
            $res['demande'] = true;
        }
        echo json_encode($res);
       
     
    }
    
    
    public function referents()
	{
        $this->checkUserlogged();
        $res = $this->user->getAdminVille($this->session->userdata('userInfo')['id_ville']);
        $data['title'] = 'Les ambassadeurs de la ville';
        $data['referents'] = $res;
        $this->load->view('receveur/base_view',$data);
        $this->load->view('receveur/contacts_view');
        $this->load->view('receveur/footer');
    }
    
    public function newDossier(){
        $this->checkUserlogged();
        $demandePossibility = $this->checkNewDemandepossibility();
        $articles  = $this->input->post('articles');
        if($articles) {
            $resArticle = [];
            $tel = $this->session->userdata('userInfo')['tel'];
            if( !$demandePossibility['isPossible'] ){
                echo json_encode($demandePossibility);
                return;
            }
            if($demandePossibility['demande'] === null){
                $this->user->addDemande($tel, 'Alimentaire');
            }
            else {
                $this->user->activerUserDemande($tel);
            }
            foreach ($articles as $article){
                $tmp = $this->user->addArticle($tel, $article);
                if($tmp > 0){
                    array_push($resArticle,$article);
                }
            }
            $this->user->incrementUserDemande($tel);
            echo json_encode($resArticle);
        }
        else {
            $data['title'] = 'Nouvelle demande';
            $data['message'] = $demandePossibility['message'];
            $data['articles'] = $demandePossibility['articles'];
            $this->load->view('receveur/base_view',$data);
            $this->load->view('receveur/newDemande_view');
            $this->load->view('receveur/footer');
        }
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
                if($res === 1){
                    echo " Signalement pris en compte !";
                }
                else {
                    echo " Opération non prise en compte, merci de réessayer plus tard !";
                }
                
            }     
        }
        else{
            $data['title'] = 'Signaler un abus';
            $this->load->view('receveur/base_view',$data);
            $this->load->view('receveur/signal_view');
            $this->load->view('receveur/footer');
        }
       
    }

    private function checkNewDemandepossibility() {
        $message ='';
        $article = [];
        $possible =  false;
        $demande = $this->user->getDemandeById($this->session->userdata('userInfo')['tel']);
        if($demande && $demande['dt_archive'] === null){
                $message = 'Vous ne pouvez pas effectuer une nouvelle demande, car il y en a une déjà en cours';
                $article = [];
                $possible = false;
        }
        else if($demande && $demande['dt_archive'] !== null){
            $dateArchive = new DateTime($demande['dt_archive']);
            $dateCourante = new DateTime();
            $diff = $dateArchive->diff($dateCourante);
            if($diff->days < 14){
                $article = [];
                $possible = false;
                $nbJoursRestant = 14 - $diff->days;
                $message = 'Vous ne pouvez pas effectuer une nouvelle demande, car la dernière a été traitée il y a moins de 2 semaines ('.$demande['dt_archive'].'). Réessayez dans '.$nbJoursRestant.' jour(s)';
            }
            else{
                    $article =  $this->receveur->getCatalogArticles();
                    $possible = true;
            }
                
        }
        else {
            $article =  $this->receveur->getCatalogArticles();
            $possible = true;
        }
        return array("articles"=>$article, "message" => $message, "isPossible" =>  $possible, "demande" => $demande );
    }

    private function checkUserlogged() {
        if( !$this->session->userdata("log_receveur") ) {
            redirect(site_url('auth'));
        }
	}
}
