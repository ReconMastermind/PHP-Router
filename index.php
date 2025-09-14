<?php 
	declare(strict_types=1);
	
	$parsed_url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
	
	require "Router.php";
	$router = new Router;
	$router->add("/", function() {
		echo "this is the home page";
	});

	$router->add("/about", function() {
		echo "this is the about page";
	});

	$router->add("/products/{id}", function($id) {

		echo "this is the page for product $id";
	
	}); 
	
	$router->add("/orders/{product_id}/{order_id}", function($product_id, $order_id) {
		echo "Product id: $product_id<br>Order id: $order_id";
	});

	$router->dispatch($parsed_url);	

	/*
	switch($parsed_url) {
		case "/contact":
			echo "this is the contact page";
			break;
		case "/login":
			echo "this is the login page";
			break;
		default:
			echo "page not found";
	}
	 */
?>
