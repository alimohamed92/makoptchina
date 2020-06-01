<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_stat extends CI_Model{

//========================================SELECT============================


public function getNbDemandes(){
	$this->db->select('SUM(nb_total) as total')
			 ->from(TAB_DEMANDE);
	$demandes = $this->db->get();
    return $demandes->result()[0];
}

public function getNbDons(){
	$this->db->select('SUM(nb_article_traite) as total')
			 ->from(TAB_DEMANDE);
	$demandes = $this->db->get();
    return $demandes->result()[0];
}

public function getNbDonneurs(){
		
	$this->db->select('*')
		->from('user')
		->where('type = 2');


	$donneurs = $this->db->get();
return $donneurs->result();
}

public function getNbDemandeurs(){
		
	$this->db->select('*')
		->from('user')
		->where('type = 3');

	$demandeurs = $this->db->get();
return $demandeurs->result();
}

   

}