<?php

namespace App\Controllers;

class AdminController{

    public function index(){

        $produtos = \App\Models\Produto::getAll();

        $loader = new \Twig\Loader\FilesystemLoader('app/Views');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('admin.html');

        $paramentros = array();
        $paramentros["produtos"] = $produtos;

        $conteudo = $template->render($paramentros);
        echo $conteudo;

    }

    public function add(){
            
            $loader = new \Twig\Loader\FilesystemLoader('app/Views');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('add.html');

            $paramentros = [];

            $conteudo = $template->render($paramentros);
            echo $conteudo;

    }

    public function insert(){

        try {
            \App\Models\Produto::insert($_POST);

            echo '<script>alert("Produto inserida com sucesso!");</script>';
            echo '<script>location.href="http://localhost/RodrigoStore/?pagina=admin&metodo=index"</script>';
        } catch(Exception $e) {
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="http://localhost/RodrigoStore/?pagina=admin&metodo=add"</script>';
        }

    }

    public function change(){

        $loader = new \Twig\Loader\FilesystemLoader('app/Views');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('update.html');        

        $produto = \App\Models\Produto::search($_GET['id']);

        $paramentros = array();
        $paramentros['id'] = $produto->id;
        $paramentros['productName'] = $produto->productName;
        $paramentros['descricao'] = $produto->descricao;
        $paramentros['preco'] = $produto->preco;

        $conteudo = $template->render($paramentros);
        echo $conteudo;
    }

    public function update(){

        try{
            \App\Models\Produto::update($_POST);

            echo '<script>alert("Produto alterado com sucesso!");</script>';
            echo '<script>location.href="http://localhost/RodrigoStore/?pagina=admin&metodo=index"</script>';
        } catch (Exception $e){
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="http://localhost/RodrigoStore/?pagina=admin&metodo=change&id='.$_POST['id'].'"</script>';
        }
    }

    public function delete(){

        $id = $_GET['id'];
        try{
            \App\Models\Produto::delete($id);

            echo '<script>alert("Produto excluído com sucesso!");</script>';
            echo '<script>location.href="http://localhost/RodrigoStore/?pagina=admin&metodo=index"</script>';
        } catch(Exception $e) {
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="http://localhost/RodrigoStore/?pagina=admin&metodo=index"</script>';
        }

    }
}