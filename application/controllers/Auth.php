<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Auth extends CI_Controller
{
	 public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('model_user', 'user');
    }    

	public function index()

	{	//si la session est active
		//var_dump( password_hash("alimohamed", PASSWORD_DEFAULT));
		//var_dump(password_verify("alimohamed",'$2y$10$cE5rSEg.gX4rfgv6Dhpz6.tNrMlE3Emslxce0USb94V/R9UfFz1pG'));

		if(  $this->session->userdata('log_receveur')==true ){
			
			redirect(site_url('receveur/accueil'));
		}
		elseif ( $this->session->userdata('log_donneur')) {
			redirect(site_url('donneur/accueil'));
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
					$this->session->set_userdata('tel',$res['tel']);
					if($res['type'] == USER_R ){
						$this->session->set_userdata('log_receveur',true);
					    redirect(site_url('receveur/accueil'));
					}
					else if($res['fonction'] == USER_D){
						$this->session->set_userdata('log_donneur',true);
					    redirect(site_url('donneur/accueil'));
					}
					else if( $res['fonction'] == ADMIN ){
						
						$this->session->set_userdata('log_admin',true);
						$this->session->set_userdata('nbUser',$this->user->getNbTotalUser());
						$this->session->set_userdata('nbEtudiant',$this->user->getNbReceveur());
						$this->session->set_userdata('nbEns',$this->user->getNbDonneur());
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

	// To be completed
	public function mp(){
		$email = $this->input->get('email'); 
		$user = $this->user->getUserByEmail($email);
		if($user){
			$pwd = generateRandomString(15);
			if($this->user->modifierUserPwd($user['idPersonnel'],password_hash($pwd, PASSWORD_DEFAULT))){
				$message = 'Votre nouveau mot de passe temporaire est : <b> '.$pwd;
				sendMail($_GET["email"], "Mot de passe temporaire ",$message);
				echo "un mail contenant un mot de passe temporaire a été envoyé à l'adresse : <b>".$_GET["email"]."</b>";
			}
			else {
				echo "Erreur inattendue : vueillez réessayer plus tard ou contacter votre administrateur";
			}
		 
		}
		else {
			echo "untilisateur non existant";
		}
	}
	
}

?>
