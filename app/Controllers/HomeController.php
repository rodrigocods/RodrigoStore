<?php

namespace App\Controllers;

class HomeController{

    public function index(){

        try{
            $produtos = \App\Models\Produto::getAll();

            $loader = new \Twig\Loader\FilesystemLoader('app/Views');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');

            $paramentros = array();
            $paramentros["produtos"] = $produtos;

            $conteudo = $template->render($paramentros);
            echo $conteudo;
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

}