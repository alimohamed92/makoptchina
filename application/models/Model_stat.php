<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_stat extends CI_Model{

//========================================SELECT============================


public function getNbDemandes(){
		
			$this->db->select('*')
			->from('demande');

		$demandes = $this->db->get();
    return $demandes->result();
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