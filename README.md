# PHP ROUTER

simple and effective router 
tested on php 8.3 previous versions work too

# Usage
```php

<?php
  //Declare the strict type
	declare(strict_types=1);
	//Parse the url to get the path
	$parsed_url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
	
	require "Router.php";
	$router = new Router;
	//Adds the page you want to route to
 $router->add("/", function() {
		echo "this is the home page";
	});

  //For paths with additional information, for example this one below, use the {example} to parse out aditional information
	$router->add("/products/{id}", function($id) {

		echo "this is the page for product $id";
	
	}); 
	//Dispatch it with the parsed url
 $router->dispatch($parsed_url);
?>

```

# htaccess file

make sure this is included in your .htaccess file
```htaccess
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ index.php [QSA,L]
```
