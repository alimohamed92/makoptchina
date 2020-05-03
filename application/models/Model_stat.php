<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_stat extends CI_Model{

//========================================SELECT============================


public function getNbDemandes(){
		
<<<<<<< HEAD
			$this->db->select('*')
			->from('demande');

		$demandes = $this->db->get();
    return $demandes->result();
=======
		//$donneurs = $db->query("SELECT COUNT(*) FROM table");
		//$demandeurs = $db->query("SELECT COUNT(*) FROM table");
	$this->db->select('SUM(nb_total) as total')
			 ->from(TAB_DEMANDE);
	$demandes = $this->db->get();
    return $demandes->result()[0];
>>>>>>> 5b3525ff615c0f2f645498e10098c23201d2362c
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