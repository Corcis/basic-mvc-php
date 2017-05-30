<?php
require_once 'Database.php';
class Product{
  public $id;
	public $name;
	public $price;
	public $description;

	
	
	
  public function __construct($id,$name, $price,  $description) {
      $this->id=$id;
      $this->name = $name;
      $this->price = $price;
      $this->description = $description;
  }

 
  public function modificar(){
    $db = new Database();
    $sql= " update producto set nombre='".$this->name."', descripcion='".$this->description."', precio=$this->price where id=$this->id";
    $db->query($sql);
        $db -> close();
        echo "Se pudo";
     

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
