<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_donneur extends CI_Model
{
	    private $table='user';


//========================================SELECT============================


public function getDemandesSuivies($tel){

    $this->db->select('receveur')->from(TAB_USER_LINK)->where('donneur', $tel);
    $sub_query = $this->db->get_compiled_select();

    $res = $this->db->select('d.label, d.date, d.etat, u.tel, q.nom as quartier, v.nom as ville')
    ->from(TAB_USER.' u, '.TAB_DEMANDE.' d,'.TAB_QUARTIER.' q, '.TAB_VILLE.' v')
    ->where('d.user_tel = u.tel')
    ->where('u.id_quartier = q.id_quartier')
    ->where('q.id_ville = v.id_ville')
    ->where('u.dt_archive is NULL')
    ->where('d.dt_archive is NULL')
    ->where("d.user_tel IN ($sub_query)")
    ->get()
    ->result_array();
    return $res;
}





  
//==============================Insert==================================================





//===========================END INSERT=====================================


//====================================UPDATE==============================={

    public function updateArticleState($id, $state) {
        $tab = array(
            'etat' => $state
            );
        $res = $this->db->where('id_article', $id)
                        ->update(TAB_ARTICLE, $tab);
        return $res;
    }

    public function updateDemandeState($tel, $state) {
        $tab = array(
            'etat' => $state
            );
        $res = $this->db->where('user_tel', $tel)
                        ->update(TAB_DEMANDE, $tab);
        return $res;
    }

//================================END UPDATE==================================}


//==========================DELETE============================================
   

}