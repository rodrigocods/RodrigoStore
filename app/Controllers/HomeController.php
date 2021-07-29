<?php

namespace App\Controllers;

class HomeController{

    public function index(){

        try{
            $products = \App\Models\Product::getAll();

            $loader = new \Twig\Loader\FilesystemLoader('app/Views');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');

            $paramentros = array();
            $paramentros["products"] = $products;

            $conteudo = $template->render($paramentros);
            echo $conteudo;
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

}