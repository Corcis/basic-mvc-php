<?php
require_once 'Database.php';
class Cliente {
	public $nombre;
	public $direccion;
	public $telefono;

	public function __construct($nombre, $direccion, $telefono) {
      $this->nombre = $nombre;
			$this->direccion = $direccion;
	    $this->telefono = $telefono;
  }

	// return rows
	public function save() {
		$db = new Database();
		$sql = "INSERT INTO
						 	cliente(nombre,direccion,telefono)
					VALUES(
									'".$this->nombre."',
									'".$this->direccion."',
									'".$this->telefono."'
								)
					";
		$db->query($sql);
		$lastId = (int)$db->mysqli->insert_id;
		echo $lastId;
		$db->close();
		return $lastId;
	}
}
