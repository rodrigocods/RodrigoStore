<?php

session_start();

// require_once 'app/Controllers/HomeController.php';
// require_once 'app/Core/Core.php';
// require_once 'app/Models/Produto.php';
// require_once 'app/Controllers/AdminController.php';
// require_once 'lib/Database/Connection.php';
require_once 'vendor/autoload.php';

$template = file_get_contents('app/Views/Template/template.html');

ob_start();

	$core = new \App\Core\Core;
	$core->start($_GET);

	$saida = ob_get_contents();
ob_end_clean();

if(isset($_SESSION['loggedin'])){
	if($_SESSION['admin'] == true){
		$template = str_replace('{{login}}', '<a href="http://localhost/RodrigoStore/?page=login&method=logout">Logout</a>|<a href="http://localhost/RodrigoStore/?page=admin">Admin</a>', $template); 
	}else{
		$template = str_replace('{{login}}', '<a href="http://localhost/RodrigoStore/?page=login&method=logout">Logout</a>', $template); 
	}
}else{
	$template = str_replace('{{login}}', '<a href="http://localhost/RodrigoStore/?page=login">Login</a>', $template);
}

$template = str_replace('{{content}}', $saida, $template);

echo $template;