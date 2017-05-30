<?php
require_once 'Database.php';
class Product {
	public $name;
	public $price;
	public $category;
	public $description;

	public function __construct($name, $price, $category, $description) {
      $this->name = $name;
			$this->price = $price;
	    $this->category = $category;
	    $this->description = $description;
  }
	//mysqli->insert_id
	// return rows
 

  public function save(){
  	$db = new Database();
  	$sql = "INSERT INTO Producto(nombre, precio, categoria_id, descripcion)
  			VALUES ('".$this->name."', $this->price, $this->category, '".$this->description."')";
  	$db->query($sql);
  	$lastid = (int)$db->mysqli->insert_id;
  	echo $lastid;
  	$db -> close();
  	return true;
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
