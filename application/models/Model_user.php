<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_user extends CI_Model
{
	    //private $table='user';


//========================================SELECT============================

    public function getcompte($log,$mp) {
        
        $res = $this->db->select('*')
                        ->from(TAB_USER)
                        ->where('tel', $log)
                        ->where('dt_archive is NULL')
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
        $res = $this->db->limit(500)->select('d.label, d.date, d.etat, u.tel, q.nom as quartier, v.nom as ville')
        ->from(TAB_USER.' u, '.TAB_DEMANDE.' d,'.TAB_QUARTIER.' q, '.TAB_VILLE.' v')
        ->where('d.user_tel = u.tel')
        ->where('u.id_quartier = q.id_quartier')
        ->where('q.id_ville = v.id_ville')
        ->where('v.id_ville', $idVille)
        ->where('u.dt_archive is NULL')
        ->where('d.dt_archive is NULL')
        ->order_by('quartier', 'asc')
        ->get()
        ->result_array();
        return  $res;
    }

    public function getDemandeursEnAttente($idVille){
        $res = $this->db->limit(500)->select('d.label, d.date, d.etat, u.tel, q.nom as quartier, v.nom as ville')
        ->from(TAB_USER.' u, '.TAB_DEMANDE.' d,'.TAB_QUARTIER.' q, '.TAB_VILLE.' v')
        ->where('d.user_tel = u.tel')
        ->where('u.id_quartier = q.id_quartier')
        ->where('q.id_ville = v.id_ville')
        ->where('v.id_ville', $idVille)
        ->where('d.etat', EN_ATTENTE)
        ->where('u.dt_archive is NULL')
        ->order_by('quartier', 'asc')
        ->get()
        ->result_array();
        return  $res;
    }

    public function getDemandeursParQuartier($idq){
        $res = $this->db->select('d.label, d.date, d.etat, u.tel, q.nom as quartier, v.nom as ville')
        ->from(TAB_USER.' u, '.TAB_DEMANDE.' d,'.TAB_QUARTIER.' q, '.TAB_VILLE.' v')
        ->where('d.user_tel = u.tel')
        ->where('u.id_quartier = q.id_quartier')
        ->where('q.id_ville = v.id_ville')
        ->where('u.id_quartier', $idq)
        ->where('u.dt_archive is NULL')
        ->get()
        ->result_array();
        return $res;
    }

    public function getAdminVille($idVille){
        $res = $this->db->select('u.tel, q.nom as quartier, v.nom as ville')
        ->from(TAB_USER.' u, '.TAB_QUARTIER.' q, '.TAB_VILLE.' v')
        ->where('u.id_quartier = q.id_quartier')
        ->where('q.id_ville = v.id_ville')
        ->where('v.id_ville', $idVille)
        ->where('u.type', ADMIN)
        ->where('u.dt_archive is NULL')
        ->get()
        ->result_array();
        return $res;
    }

    public function getAdminQuartier($idq){
        $res = $this->db->select('u.tel, q.nom as quartier, v.nom as ville')
        ->from(TAB_USER.' u, '.TAB_QUARTIER.' q, '.TAB_VILLE.' v')
        ->where('u.id_quartier = q.id_quartier')
        ->where('q.id_ville = v.id_ville')
        ->where('u.id_quartier', $idq)
        ->where('u.type', ADMIN)
        ->where('u.dt_archive is NULL')
        ->get()
        ->result_array();
        return $res;
    }

    public function getUserQuartier($idq){
        $res = $this->db->select('u.tel, q.nom as quartier, v.nom as ville, u.type')
        ->from(TAB_USER.' u, '.TAB_QUARTIER.' q, '.TAB_VILLE.' v')
        ->where('u.id_quartier = q.id_quartier')
        ->where('q.id_ville = v.id_ville')
        ->where('u.id_quartier', $idq)
        ->where('u.type !=', ADMIN)
        ->where('u.type !=', ROOT)
        ->where('u.dt_archive is NULL')
        ->get()
        ->result_array();
        return $res;
    }

    public function getAllUserVille($idVille){
        $res = $this->db->select('u.tel, q.nom as quartier, v.nom as ville, u.type')
        ->from(TAB_USER.' u, '.TAB_QUARTIER.' q, '.TAB_VILLE.' v')
        ->where('u.id_quartier = q.id_quartier')
        ->where('q.id_ville = v.id_ville')
        ->where('v.id_ville', $idVille)
        ->where('u.type !=', ROOT)
        ->where('u.dt_archive is NULL')
        ->get()
        ->result_array();
        return $res;
    }

    public function getUserDemande($tel){
        $res = $this->db->select('d.label, d.date, a.*')
        ->from(TAB_DEMANDE.' d')
        ->from(TAB_ARTICLE.' a')
        ->where('d.user_tel = a.user_tel')
        ->where('d.user_tel', $tel)
        ->where('d.dt_archive is NULL')
        ->get()
        ->result_array();
        return $res;
    }

    public function getDemNbArticle($tel){
        $res = $this->db->select('count(*) as nb')
        ->from(TAB_ARTICLE)
        ->where('user_tel', $tel)
        ->get()
        ->result_array();
        return sizeof($res) > 0 ? $res[0]['nb'] : 0;
    }

    
    public function getDemArticleEnAttente($tel){
        $res = $this->db->select('*')
        ->from(TAB_ARTICLE)
        ->where('user_tel', $tel)
        ->where('etat', EN_ATTENTE)
        ->get()
        ->result_array();
        return $res;
    }

    public function getDemandeById($tel){
        //$query = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
        $res = $this->db->select(' * ')
        ->from(TAB_DEMANDE)
        ->where('user_tel', $tel)
        ->get()
        ->result_array();
        return sizeof($res) > 0 ? $res[0] : null;
    }

    public function getArticleById($idArticle){
        $res = $this->db->select('*')
        ->from(TAB_ARTICLE)
        ->where('id_article', $idArticle)
        ->get()
        ->result_array();
        return sizeof($res) > 0 ? $res[0] : null;
    }

    public function getUserLink($telD, $telR){
        $res = $this->db->select('*')
        ->from(TAB_USER_LINK)
        ->where('donneur', $telD)
        ->where('receveur', $telR)
        ->get()
        ->result_array();
        return sizeof($res) > 0 ? $res[0] : null;
    }

    public function getUsersSignales(){
        $res = $this->db->select('s.tel_s, count(s.id) as nbSignal, u.type, u.id_quartier, q.nom as quartier, v.nom as ville')
        ->from(TAB_SIGNAL.' s')
        ->from(TAB_USER.' u')
        ->from(TAB_QUARTIER.' q')
        ->from(TAB_VILLE.' v')
        ->where('u.tel = s.tel_s')
        ->where('u.id_quartier = q.id_quartier')
        ->where('q.id_ville = v.id_ville')
        ->group_by("tel_s")
        ->get()
        ->result_array();
        return $res;
    }

    public function getVilles(){
        $res = $this->db->select('*')
        ->from(TAB_VILLE)
        ->order_by('nom', 'asc')
        ->get()
        ->result_array();
        return $res;
    }

    public function getQuartiers($idVille){
        $res = $this->db->select('*')
        ->from(TAB_QUARTIER)
        ->where('id_ville', $idVille)
        ->order_by('nom', 'asc')
        ->get()
        ->result_array();
        return $res;
    }

//==============================Insert==================================================

    public function addUser($user, $pwd)
    {
        $mp = password_hash($pwd, PASSWORD_DEFAULT);
        return $this->db->set('tel', htmlspecialchars($user->tel,ENT_QUOTES))
        ->set('mp', $mp)
        ->set('type', $user->type)
        ->set('id_quartier', $user->idQuartier)
        ->insert(TAB_USER);
    }

     public function addApplicant($user, $pwd, $nbr_pers_charge)
    {
        $mp = password_hash($pwd, PASSWORD_DEFAULT);
        return $this->db->set('tel', htmlspecialchars($user->tel,ENT_QUOTES))
        ->set('mp', $mp)
        ->set('type', $user->type)
        ->set('id_quartier', $user->idQuartier)
        ->set('nbr_pers_charge', $nbr_pers_charge)
        ->insert(TAB_USER);
    }

    public function creerLienUser($telD, $telR)
    {
        if( $this->getUserLink($telD, $telR) == null ){
            return $this->db->set('donneur', $telD)
            ->set('receveur', $telR)
            ->set('date', 'NOW()', false)
            ->insert(TAB_USER_LINK);
        }
                     
    }

    public function signal($telUser, $tel)
    {
        return $this->db->set('tel_s', $tel)
        ->set('user_tel', $telUser)
        ->set('date', 'NOW()', false)
        ->insert(TAB_SIGNAL);
                     
    }

    public function addArticle($telUser, $nom)
    {
        return $this->db->set('nom', $nom)
        ->set('user_tel', $telUser)
        ->set('quantite', 0)
        ->insert(TAB_ARTICLE);
                     
    }

    public function addDemande($telUser, $label)
    {
        return $this->db->set('label', $label)
                        ->set('user_tel', $telUser)
                        ->set('date', 'NOW()', false)
                        ->set('dt_archive', null)
                        ->insert(TAB_DEMANDE);
                     
    }


//
//===========================END INSERT=====================================


//====================================UPDATE==============================={


    public function modifierUserPwd($tel,$pwd) {
        $tab = array(
            'mp' => $pwd
            );
        $res = $this->db->where('tel', $tel)
                        ->update(TAB_USER, $tab);
        return $res;
    }

    public function archiverUserDemande($tel){
        $res = $this->db->set('dt_archive', 'NOW()', false)
                        ->set('etat', 0)
                        ->where('user_tel', $tel)
                        ->update(TAB_DEMANDE);
        return $res;
    }

    public function activerUserDemande($tel){
        $res = $this->db->set('dt_archive', null)
                        ->where('user_tel', $tel)
                        ->update(TAB_DEMANDE);
        return $res;
    }

    public function incrementUserDemande($tel){
        $res = $this->db->set('nb_total', 'nb_total + 1', false)
                        ->where('user_tel', $tel)
                        ->update(TAB_DEMANDE);
        return $res;
    }

    public function incrementUserArticleTraite($tel){
        $res = $this->db->set('nb_article_traite', 'nb_article_traite + 1', false)
                        ->where('user_tel', $tel)
                        ->update(TAB_DEMANDE);
        return $res;
    }
//================================END UPDATE==================================}


//==========================DELETE============================================


    public function archiverUser($tel){
         /*$res = $this->db->where('tel',$tel)
                         ->delete(TAB_USER);
         return $res;*/
        $res = $this->db->set('dt_archive', 'NOW()', false)
                        ->where('tel', $tel)
                        ->update(TAB_USER);
   
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