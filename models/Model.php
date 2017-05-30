<?php

include_once("models/Product.php");

class Model {
	public function get()
	{
		// here goes some hardcoded values to simulate the database
		return array(
			"Pizza Hawaiana" => new Product("Pizza hawaiana grande", 225, "Pizzas", "Pizza con piña y jamón"),
			"Pizza Mexicana" => new Product("Pizza Mexicana grande", 25, "Pizzas", "Pizza con ingredientes mexicanos")
		);
	}

	public function find($name)
	{
		$products = $this->get();
		return $products[$name];
	}


}

?>
