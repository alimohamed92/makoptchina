<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_receveur extends CI_Model
{
	    private $table='user';


//========================================SELECT============================
    public function getCatalogArticles(){
        $res = $this->db->select('*')
        ->from(TAB_CATALOGUE)
        ->order_by('nom_produit', 'asc')
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