<?php

if( isset($_POST['funcion']) ) {
	include_once("../models/ModificarProduct.php");

	$productos = json_decode($_POST['productos']);
	foreach ($productos as $item ) {
		
		$producto = new Product( $item -> _id, $item -> _nombre, $item-> _precio,$item-> _descripcion);
		$producto->modificar();
	}
} else {
	include_once("../models/ModificarProduct.php");
	$productos = Product::get();
}