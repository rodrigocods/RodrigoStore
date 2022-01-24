<?php

namespace App\Controllers;

class HomeController{

    public function index(){

        try{
            $products = \App\Models\Product::getAll();

            $loader = new \Twig\Loader\FilesystemLoader('app/Views');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');

            $parameters = array();
            $parameters["products"] = $products;

            $content = $template->render($parameters);
            echo $content;
        } catch(\Exception $e){
            echo $e->getMessage();
        }
    }

}