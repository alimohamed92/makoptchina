<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_quartier extends CI_Model
{
	    private $table='quartier';


//========================================SELECT============================


public function getQuartier($id_ville){
    $res = $this->db->select('nom, id_quartier')
    ->from(TAB_QUARTIER)
    ->where('id_ville', $id_ville)
    ->get()
    ->result_array();
    
    return $res;
}

  
//==============================Insert==================================================





//===========================END INSERT=====================================


//====================================UPDATE==============================={

   

//================================END UPDATE==================================}


//==========================DELETE============================================
   

}