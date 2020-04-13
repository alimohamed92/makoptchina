<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_user extends CI_Model
{
	    private $table='user';


//========================================SELECT============================

public function getcompte($log,$mp) {
        
    $res = $this->db->select('*')
                    ->from($this->table)
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
                        ->from($this->table)
                        ->where('type = 1')
                        ->get()
                        ->result_array();
        return $res;
    }

   public function getUserByTel($tel){
        $res = $this->db->select('tel, type')
        ->from($this->table)
        ->where('tel', $tel)
        ->get()
        ->result_array();
        return sizeof($res) > 0 ? $res[0] : null;
    }



    public function getNbTotalUser(){
        $res = $this->db->select('count(*) as nbUser')
        ->from($this->table)
        ->get()
        ->result_array();
        return sizeof($res) > 0 ? $res[0]['nbUser'] : 0;
    }
    public function getNbReceveur(){
        $res = $this->db->select('count(*) as nbUser')
        ->from($this->table)
        ->where('type', USER_R)
        ->get()
        ->result_array();
        return sizeof($res) > 0 ? $res[0]['nbUser'] : 0;
    }

    public function getNbDonneur(){
        $res = $this->db->select('count(*) as nbUser')
        ->from($this->table)
        ->where('type', USER_D)
        ->get()
        ->result_array();
        return sizeof($res) > 0 ? $res[0]['nbUser'] : 0;
    }

    public function getNbAdmin(){
        $res = $this->db->select('count(*) as nbUser')
        ->from($this->table)
        ->where('type', ADMIN)
        ->get()
        ->result_array();
        return sizeof($res) > 0 ? $res[0]['nbUser'] : 0;
    }
//==============================Insert==================================================

    public function addPersonnel($personnel)
    {
        $mp = password_hash(generateRandomString(), PASSWORD_DEFAULT);
        return $this->db->set('tel', htmlspecialchars($personnel['tel'],ENT_QUOTES))
        ->set('mp', $mp)
        ->set('type', $personnel['type'])
        ->insert($this->table);
                   

    }



//===========================END INSERT=====================================


//====================================UPDATE==============================={


    public function modifierUserPwd($tel,$pwd) {
        $tab = array(
            'mp' => $pwd
            );
        $res = $this->db->where('tel', $id)
                        ->update($this->table, $tab);
        return $res;
    }
//================================END UPDATE==================================}


//==========================DELETE============================================


    public function supprimerUser($tel){
         $res = $this->db->where('tel',$tel)
                         ->delete($this->table);
         return $res;
        }      

}