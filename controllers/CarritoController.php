<?php

if( isset($_POST['funcion']) ) {
	require_once("../models/Cliente.php");
  require_once("../models/Pedido.php");
  require_once("../models/PedidoProducto.php");
	require_once("../models/Cleaner.php");

	
	$productos = json_decode($_POST['productos']);

  $nombre = Cleaner::cleanInput($_POST['nombre']);
  $direccion = Cleaner::cleanInput($_POST['direccion']);
  $telefono = Cleaner::cleanInput($_POST['telefono']);

  $cliente = new Cliente($nombre,
                          $direccion,
                          $telefono);
  $cliente_id = $cliente->save();

  $pedido = new Pedido($cliente_id);
  $pedido_id = $pedido->save();

	foreach ($productos as $item) {
		$producto_id = (int)Cleaner::cleanInput($item->_id);
		$cantidad = (int)Cleaner::cleanInput($item->_cantidad);
		$pedido_producto = new PedidoProducto($pedido_id,
                                          $producto_id,
                                          $cantidad);
		$pedido_producto->save();
	}

} else {
	include_once("../models/Product.php");
	$productos = Product::get();
}
