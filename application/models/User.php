<?php 
class User
{
  public $tel;
  public $type;
  public $idQuartier;

  
  public function __construct($tel, $type, $idQuartier){
    $this->tel = $tel;
    $this->type = $type;
    $this->idQuartier = $idQuartier;
  }


}
?>