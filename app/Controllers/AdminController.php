<?php

namespace App\Controllers;

if($_SESSION['admin'] == false){
    echo '<script>location.href="http://localhost/RodrigoStore/?page=home"</script>';
};

class AdminController{

    public function index(){

        $products = \App\Models\Product::getAll();

        $loader = new \Twig\Loader\FilesystemLoader('app/Views');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('admin.html');

        $parameters = array();
        $parameters["products"] = $products;

        $content = $template->render($parameters);
        echo $content;

    }

    public function add(){
            
            $loader = new \Twig\Loader\FilesystemLoader('app/Views');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('add.html');

            $parameters = [];

            $content = $template->render($parameters);
            echo $content;

    }

    public function insert(){

        try {
            $res = \App\Models\Product::insert($_POST);
            
            if($res == true){
                echo '<script>alert("Product successfully inserted!");</script>';
                echo '<script>location.href="http://localhost/RodrigoStore/?page=admin&method=index"</script>';  
            } else{
                echo '<script>alert("Failed to insert product!");</script>';
                echo '<script>location.href="http://localhost/RodrigoStore/?page=admin&method=add"</script>';
            }
        } catch(\Exception $e) {
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="http://localhost/RodrigoStore/?page=admin&method=add"</script>';
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

        $content = $template->render($parameters);
        echo $content;
    }

    public function update(){

        try{
            \App\Models\Product::update($_POST);

            echo '<script>alert("Product successfully updated!");</script>';
            echo '<script>location.href="http://localhost/RodrigoStore/?page=admin&method=index"</script>';
        } catch (\Exception $e){
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="http://localhost/RodrigoStore/?page=admin&method=change&id='.$_POST['id'].'"</script>';
        }
    }

    public function delete(){

        $id = $_GET['id'];
        try{
            \App\Models\Product::delete($id);

            echo '<script>alert("Product successfully deleted!");</script>';
            echo '<script>location.href="http://localhost/RodrigoStore/?page=admin&method=index"</script>';
        } catch(\Exception $e) {
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="http://localhost/RodrigoStore/?page=admin&method=index"</script>';
        }

    }
}