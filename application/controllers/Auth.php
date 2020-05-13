<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include APPPATH . '/models/VilleModel.php'; 
include APPPATH . '/models/User.php'; 
//include APPPATH . '/libraries/Utils.php'; 

class Auth extends CI_Controller
{
	 public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('model_user', 'user');
    }    

	public function index(){	//si la session est active
		//var_dump( password_hash("alimohamed", PASSWORD_DEFAULT));
		//var_dump(password_verify("alimohamed",'$2y$10$cE5rSEg.gX4rfgv6Dhpz6.tNrMlE3Emslxce0USb94V/R9UfFz1pG'));

		if(  $this->session->userdata('log_receveur')==true ){
			
			redirect(site_url('receveur/accueil'));
		}
		elseif ( $this->session->userdata('log_donneur')) {
			redirect(site_url('donneur/'));
		}
		elseif ( $this->session->userdata('log_admin')) {
			redirect(site_url('admin'));
		}
		//sinon
		else{
			$this->form_validation->set_rules('login', 'login', 'trim|required');
	        $this->form_validation->set_rules('mp', 'mot de passe', 'trim|required');
	        if($this->form_validation->run()==true){ 
				$res=$this->user->getCompte($this->input->post('login'),$this->input->post('mp'));
				//var_dump($res);
				if($res['error']==0){
					$this->session->set_userdata('log_user',true);
					$info = $this->user->getUserInfoByTel($res['tel']);
					$this->session->set_userdata('userInfo', $info);
					$this->session->set_userdata('referent',$this->user->getAdminQuartier($info['id_quartier']));
					if($res['type'] == USER_R ){
						$this->session->set_userdata('log_receveur',true);
					    redirect(site_url('receveur/'));
					}
					else if($res['type'] == USER_D){
						$this->session->set_userdata('log_donneur',true);
					    redirect(site_url('donneur/'));
					}
					else if( $res['type'] == ADMIN){
						
						$this->session->set_userdata('log_admin',true);
						$this->session->set_userdata('nbUser',$this->user->getNbTotalUser());
						$this->session->set_userdata('nbReceveur',$this->user->getNbReceveur());
						$this->session->set_userdata('nbDonneur',$this->user->getNbDonneur());
						$this->session->set_userdata('nbAdmin',$this->user->getNbAdmin());
					    redirect(site_url('admin/'));
					}
					
				}
				else{
					 $this->session->set_flashdata('message',"erreur d'authentification");
					 $this->load->view("view_auth");
				}
	        }
	        else{
	        	$this->load->view("view_auth");
	        }
		}
		
		
	}

	public function inscriptDon(){
		if($this->input->post('user')){
			$res = array("result"=>false, "msg" => "");
			$data = $this->input->post('user');
			$valid_number = filter_var($data['tel'], FILTER_SANITIZE_NUMBER_INT);

            if (strlen($valid_number) < 8 || strlen($valid_number) > 14) {
				$res['result'] = false;
				$res['msg'] = "Numero invalide";
				return;
			}
			
			$tmp = $this->user->getUserByTel($data['tel']);
            if($tmp){
				$res['result'] = false;
				$res['msg'] = "Ce numéro est déjà inscrit";
				echo json_encode($res);
                return;
			}

			$user = new User($data['tel'], USER_D, htmlspecialchars($data['quartier'],ENT_QUOTES));
			$tmp = $this->user->addUser($user,$data['pwd']);
			$res['result'] = $tmp;
			$res['msg'] = $tmp ? "Inscription réussie" : "Echec de l'opération vueillez contacter votre administrateur !";
			echo json_encode($res);
		}
		else {
			$this->load->view("view_inscriptDon");
		}
		
	}

	public function inscriptDemande() {
		if($this->input->post('user')){
			$res = array("result"=>false, "msg" => "");
			$data = $this->input->post('user');
			$valid_number = filter_var($data['tel'], FILTER_SANITIZE_NUMBER_INT);

            if (strlen($valid_number) < 8 || strlen($valid_number) > 14) {
				$res['result'] = false;
				$res['msg'] = "Numero invalide";
				$this->session->set_userdata('msg_accueil', $res['msg']);
				return;
			}
			
			$tmp = $this->user->getUserByTel($data['tel']);
            if($tmp){
				$res['result'] = false;
				$res['msg'] = "Ce numéro est déjà inscrit";
				$this->session->set_userdata('msg_accueil', $res['msg']);
				echo json_encode($res);
                return;
			}

			$user = new User($data['tel'], USER_R, htmlspecialchars($data['quartier'],ENT_QUOTES));
			$tmp = $this->user->addApplicant($user,$data['pwd'],$data["nbr_personne"]);
			$res['result'] = $tmp;
			if($tmp){
				if($this->user->getDemandeById($data['tel']) == null){
					$this->user->addDemande($data['tel'],"Demande");
				}
				if(array_key_exists("items", $data)){
					for($i=0; $i < count($data["items"]); $i++){
						$name = $this->db->get_where('catalogue', array('id_produit' => (int)$data['items'][$i]));
						$result = $name->result();
						if($result[0] != null){
							$add_item = $this->user->addArticle($data['tel'],$result[0]->nom_produit);
						}
					}
				}
				if(!empty($data["autre"])){
					$this->user->addArticle($data['tel'],$data["autre"]);
				}
				$this->session->set_userdata('msg_accueil', 'Inscription réussie');
				$res['msg'] = 'login_redirect'; 
				echo json_encode($res);
			}
			else{

				$res['msg'] = "Echec de l'opération vueillez contacter votre administrateur !";
				$this->session->set_userdata('msg_accueil', $res['msg']);
				echo json_encode($res);
			}
			#$res['msg'] = $tmp ? "Inscription réussie" : "Echec de l'opération vueillez contacter votre administrateur !";;
			#echo json_encode($res);
			//$this->load->view("view_inscriptDem");
		}
		else {
			$this->load->view("view_inscriptDem");
		}
	}

	public function villes(){
		$res = array();
		$villes = $this->user->getVilles(); //$this->user->getQuartiers
		foreach($villes as $ville){
			$villeModel = new VilleModel($ville['id_ville'], $ville['nom']);
			$villeModel->quartiers = $this->user->getQuartiers($villeModel->id);
			array_push($res,$villeModel);
		}
		echo json_encode($res);
	}

	// To be completed
	public function mp(){
		$tel = $this->input->get('tel'); 
		$user = $this->user->getUserByTel($tel);
		if($user){
			$pwd = generateRandomString(15);
			if($this->user->modifierUserPwd($tel,password_hash($pwd, PASSWORD_DEFAULT))){
				$message = 'Votre nouveau mot de passe temporaire est : <b> '.$pwd;
				$result = $this->sendSms($tel,$message);
				if($result->result === 'ok') {
					echo "un SMS contenant votre nouveau mot de passe  a été envoyé au numéro : <b>".$tel."</b>";
				}
				else {
					echo "Erreur inattendue : vueillez réessayer plus tard ou contacter votre administrateur";
				}
				
			}
			else {
				echo "Erreur inattendue : vueillez réessayer plus tard ou contacter votre administrateur";
			}
		 
		}
		else {
			echo "untilisateur non existant";
		}
	}

	public function sendSms($tel,$message){
		$urlSms = 'http://api.smflow.net/api/send_sms/';
		$urlAuth = 'http://api.smflow.net/api/auth/';
		$data =  array( 'username'=> SMS_USER, 'password' =>SMS_PWD) ;
		$smsParams = array(
						'token'=>'',
						'message' => $message,
						'destinataire' => $tel
					 );		
	 	
		$result = $this->httpPost($urlAuth,$data);
		if($result->token){
			$smsParams['token'] = $result->token;
			$res = $this->httpPost($urlSms,$smsParams);
			return $res;
		}
	}

	private function httpPost($url, $param){
		$ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($param)); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		$result = curl_exec($ch);
		curl_close($ch);
		return json_decode($result);
	}
	
}

?>
