<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_donneur extends CI_Model
{
	    private $table='user';


//========================================SELECT============================


   




  
//==============================Insert==================================================





//===========================END INSERT=====================================


//====================================UPDATE==============================={

    public function metArticleAttente($id) {
        $tab = array(
            'etat' => EN_ATTENTE
            );
        $res = $this->db->where('id_article', $id)
                        ->update(TAB_ARTICLE, $tab);
        return $res;
    }

//================================END UPDATE==================================}


//==========================DELETE============================================
   

}