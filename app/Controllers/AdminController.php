<?php

namespace App\Controllers;

class AdminController{

    public function index(){

        $products = \App\Models\Product::getAll();

        $loader = new \Twig\Loader\FilesystemLoader('app/Views');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('admin.html');

        $parameters = array();
        $parameters["products"] = $products;

        $conteudo = $template->render($parameters);
        echo $conteudo;

    }

    public function add(){
            
            $loader = new \Twig\Loader\FilesystemLoader('app/Views');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('add.html');

            $parameters = [];

            $conteudo = $template->render($parameters);
            echo $conteudo;

    }

    public function insert(){

        try {
            $res = \App\Models\Product::insert($_POST);
            
            if($res == true){
                echo '<script>alert("Product successfully inserted!");</script>';
                echo '<script>location.href="http://localhost/RodrigoStore/?pagina=admin&metodo=index"</script>';  
            } else{
                echo '<script>alert("Failed to insert product!");</script>';
                echo '<script>location.href="http://localhost/RodrigoStore/?pagina=admin&metodo=add"</script>';
            }
        } catch(Exception $e) {
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="http://localhost/RodrigoStore/?pagina=admin&metodo=add"</script>';
        }

    }

    // Change method used by redirecting the user to a page where he can modify such as product information
    public function change(){

        $loader = new \Twig\Loader\FilesystemLoader('app/Views');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('update.html');        

        $product = \App\Models\Product::search($_GET['id']);

        $parameters = array();
        $parameters['id'] = $product->id;
        $parameters['product_name'] = $product->product_name;
        $parameters['description'] = $product->description;
        $parameters['price'] = $product->price;
        $parameters['quantity'] = $product->quantity;

        $conteudo = $template->render($parameters);
        echo $conteudo;
    }

    public function update(){

        try{
            \App\Models\Product::update($_POST);

            echo '<script>alert("Product successfully updated!");</script>';
            echo '<script>location.href="http://localhost/RodrigoStore/?pagina=admin&metodo=index"</script>';
        } catch (Exception $e){
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="http://localhost/RodrigoStore/?pagina=admin&metodo=change&id='.$_POST['id'].'"</script>';
        }
    }

    public function delete(){

        $id = $_GET['id'];
        try{
            \App\Models\Product::delete($id);

            echo '<script>alert("Product successfully deleted!");</script>';
            echo '<script>location.href="http://localhost/RodrigoStore/?pagina=admin&metodo=index"</script>';
        } catch(Exception $e) {
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="http://localhost/RodrigoStore/?pagina=admin&metodo=index"</script>';
        }

    }
}