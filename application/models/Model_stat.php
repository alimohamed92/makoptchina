<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_stat extends CI_Model{

//========================================SELECT============================


public function getNbDemandes(){
		
		//$donneurs = $db->query("SELECT COUNT(*) FROM table");
		//$demandeurs = $db->query("SELECT COUNT(*) FROM table");
	$this->db->select('SUM(nb_total) as total')
			 ->from(TAB_DEMANDE);
	$demandes = $this->db->get();
    return $demandes->result()[0];
}

   

}