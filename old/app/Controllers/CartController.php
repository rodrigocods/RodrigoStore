<?php

namespace App\Controllers;

if($_SESSION['loggedin'] == false){
    echo '<script>location.href="http://localhost/RodrigoStore/?page=home"</script>';
};

if($_SESSION['admin'] == true){
    echo '<script>location.href="http://localhost/RodrigoStore/?page=home"</script>';
}

class CartController{

    public function index(){

        $loader = new \Twig\Loader\FilesystemLoader('app/Views');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('cart.html');

        $parameters = array();

        $cart = \App\Models\Cart::search();
        $cart->total = 0;
        $cart_items = \App\Models\Cart::getAll($cart->id);
        foreach($cart_items as $cart_item){
            $product = \App\Models\Product::search($cart_item->product_id);
            $product->quantity = $cart_item->quantity;
            $parameters['products'][] = $product;
            $cart->total = $cart->total + ($product->price * $product->quantity);
        }

        \App\Models\Cart::updateTotal($cart->total);

        $parameters['total'] = $cart->total;

        $content = $template->render($parameters);
        echo $content;
    }

    public function add(){
        \App\Models\Cart::add();
        echo '<script>alert("Product added to cart!");</script>';
        if($_GET['header'] == 'cart'){
            echo '<script>location.href="http://localhost/RodrigoStore/?page=cart"</script>';
        } else{
            echo '<script>location.href="http://localhost/RodrigoStore/?page=product&method=getProduct&id='.$_GET['id'].'"</script>';
        }
    }

    public function updateCartItem(){
        \App\Models\Cart::updateCartItem();
        echo '<script>location.href="http://localhost/RodrigoStore/?page=cart"</script>';
    }

    public function delete(){
        \App\Models\Cart::delete();
        echo '<script>location.href="http://localhost/RodrigoStore/?page=cart"</script>';
    }
}