<?php
require_once 'Database.php';
class PedidoProducto {
	public $pedido_id;
  public $producto_id;
  public $cantidad;

	public function __construct($pedido_id,$producto_id,$cantidad) {
      $this->pedido_id = $pedido_id;
      $this->producto_id = $producto_id;
      $this->cantidad = $cantidad;
  }

	// return rows
	public function save() {
		$db = new Database();
		$sql = "INSERT INTO
            pedido_producto(pedido_id,producto_id,cantidad)
					VALUES(
									$this->pedido_id,
                  $this->producto_id,
                  $this->cantidad
								)
					";
    $db->query($sql);
		$lastId = (int)$db->mysqli->insert_id;
		echo $lastId;
		$db->close();
		return $lastId;
	}
}
