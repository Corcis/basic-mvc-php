<?php

if( isset($_POST['funcion']) ) {
	include_once("../models/ElimimnarProduct.php");

	$productos = json_decode($_POST['productos']);
	foreach ($productos as $item ) {
		
		$producto = new Product2( $item -> _id);
		$producto->eliminar();
	}
} else {
	include_once("../models/ElimimnarProduct.php");
	$productos = Product::get();
}