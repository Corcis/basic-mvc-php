<?php
require_once 'Database.php';
class Product2{
  public $id;
	public function __construct($id) {
      $this->id=$id;
  }

 
  public function eliminar(){
    $db = new Database();
    $sql= " delete from producto where id=$this->id";
    $db->query($sql);
    $db -> close();
    echo "Se Elimino";
   header("Location: ../views/verproductos.php");

  }

  static function get(){
  	$sql = "SELECT * FROM Producto";
  	$db = new Database();
  	if($rows = $db->query($sql)){
  		//var_dump($rows);
  		return $rows;
  	}
  	return false;
  }

}
