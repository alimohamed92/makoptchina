<?php 
class VilleModel
{
  public $id;
  public $nom;
  public $quartiers;

  
  public function __construct($id,$nom){
    $this->quartiers = array();
    $this->id = $id;
    $this->nom = $nom;
  }

}
?>