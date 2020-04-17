<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_user extends CI_Model
{
	    //private $table='user';


//========================================SELECT============================

    public function getcompte($log,$mp) {
        
        $res = $this->db->select('*')
                        ->from(TAB_USER)
                        ->where('tel', $log)
                        ->get()
                        ->result_array();

        if(count($res)!=1){
            return array("error" => 1, "user" => false);
        } 
        else{
            if ( password_verify( $mp, $res['0']['mp'] ) ){
                return array("error" => 0, "user" => true, "type" => $res['0']['type'],"tel"=>$res[0]['tel']);
            }
            else return array("error" => 2, "user" => false);
        }               
   
    }

    public function getListAdmins(){
         $res = $this->db->select('*')
                        ->from(TAB_USER)
                        ->where('type = 1')
                        ->get()
                        ->result_array();
        return $res;
    }

    public function getUserByTel($tel){
        $res = $this->db->select('tel, type, id_quartier')
        ->from(TAB_USER)
        ->where('tel', $tel)
        ->get()
        ->result_array();
        return sizeof($res) > 0 ? $res[0] : null;
    }

    public function getUserInfoByTel($tel){
        $res = $this->db->select('u.tel, u.type, u.id_quartier, q.nom as quartier, v.nom as ville, v.id_ville')
        ->from(TAB_USER.' u')
        ->from(TAB_QUARTIER.' q')
        ->from(TAB_VILLE.' v')
        ->where('u.id_quartier = q.id_quartier')
        ->where('q.id_ville = v.id_ville')
        ->where('u.tel', $tel)
        ->get()
        ->result_array();
      return sizeof($res) > 0 ? $res[0] : null;
    }



    public function getNbTotalUser(){
        $res = $this->db->select('count(*) as nbUser')
        ->from(TAB_USER)
        ->get()
        ->result_array();
        return sizeof($res) > 0 ? $res[0]['nbUser'] : 0;
    }
    public function getNbReceveur(){
        $res = $this->db->select('count(*) as nbUser')
        ->from(TAB_USER)
        ->where('type', USER_R)
        ->get()
        ->result_array();
        return sizeof($res) > 0 ? $res[0]['nbUser'] : 0;
    }

    public function getNbDonneur(){
        $res = $this->db->select('count(*) as nbUser')
        ->from(TAB_USER)
        ->where('type', USER_D)
        ->get()
        ->result_array();
        return sizeof($res) > 0 ? $res[0]['nbUser'] : 0;
    }

    public function getNbAdmin(){
        $res = $this->db->select('count(*) as nbUser')
        ->from(TAB_USER)
        ->where('type', ADMIN)
        ->get()
        ->result_array();
        return sizeof($res) > 0 ? $res[0]['nbUser'] : 0;
    }

    public function getDemandeursParVille($idVille){
        $res = $this->db->select('d.label, d.date, u.tel, q.nom as quartier, v.nom as ville')
        ->from(TAB_USER.' u, '.TAB_DEMANDE.' d,'.TAB_QUARTIER.' q, '.TAB_VILLE.' v')
        ->where('d.user_tel = u.tel')
        ->where('u.id_quartier = q.id_quartier')
        ->where('q.id_ville = v.id_ville')
        ->where('v.id_ville', $idVille)
        ->get()
        ->result_array();
        return sizeof($res) > 0 ? $res : null;
    }

    public function getUserDemande($tel){
        $res = $this->db->select('d.label, d.date, a.*')
        ->from(TAB_DEMANDE.' d')
        ->from(TAB_ARTICLE.' a')
        ->where('d.user_tel = a.user_tel')
        ->where('d.user_tel', $tel)
        ->get()
        ->result_array();
        return sizeof($res) > 0 ? $res : null;
    }
    //==============================Insert==================================================

    public function addPersonnel($personnel, $pwd)
    {
        $mp = password_hash($pwd, PASSWORD_DEFAULT);
        return $this->db->set('tel', htmlspecialchars($personnel['tel'],ENT_QUOTES))
        ->set('mp', $mp)
        ->set('type', $personnel['type'])
        ->insert(TAB_USER);
                   

    }



//
//===========================END INSERT=====================================


//====================================UPDATE==============================={


    public function modifierUserPwd($tel,$pwd) {
        $tab = array(
            'mp' => $pwd
            );
        $res = $this->db->where('tel', $id)
                        ->update(TAB_USER, $tab);
        return $res;
    }
//================================END UPDATE==================================}


//==========================DELETE============================================


    public function supprimerUser($tel){
         $res = $this->db->where('tel',$tel)
                         ->delete(TAB_USER);
         return $res;
    }   
    
    public function supprimerArticle($id){
        $res = $this->db->where('id_article',$id)
                        ->delete(TAB_ARTICLE);
        return $res;
    }  
    
    public function supprimerDemande($tel){
        $res = $this->db->where('user_tel',$tel)
                        ->delete(TAB_DEMANDE);
        return $res;
    } 

}