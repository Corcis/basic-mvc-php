<?php
require_once 'Database.php';
class Pedido {
	public $cliente_id;

	public function __construct($cliente_id) {
      $this->cliente_id = $cliente_id;
  }

	// return rows
	public function save() {
		$db = new Database();
		$sql = "INSERT INTO
						 	pedido(cliente_id,fecha)
					VALUES(
									$this->cliente_id,
                  now()
								)
					";
		$db->query($sql);
		$lastId = (int)$db->mysqli->insert_id;
		echo $lastId;
		$db->close();
		return $lastId;
	}
}
