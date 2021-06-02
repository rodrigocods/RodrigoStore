<?php

require_once 'app/Controllers/HomeController.php';
require_once 'app/Core/Core.php';
require_once 'app/Models/Produto.php';
require_once 'app/Controllers/AdminController.php';
require_once 'lib/Database/Connection.php';
require_once 'vendor/autoload.php';

$template = file_get_contents('app/Views/Template/template.html');

ob_start();
	$core = new Core;
	$core->start($_GET);

	$saida = ob_get_contents();
ob_end_clean();

$template = str_replace('{{conteudo}}', $saida, $template);

echo $template;