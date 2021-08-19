<?php

namespace app\Controllers;

class ProductController{

    public function getProduct(){

        $product = \App\Models\Product::search($_GET['id']);

        $loader = new \Twig\Loader\FilesystemLoader('app/Views');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('product.html');

        $parameters = array();

        $parameters['id'] = $product->id;
        $parameters['product_name'] = $product->product_name;
        $parameters['description'] = $product->description;
        $parameters['price'] = $product->price;
        $parameters['quantity'] = $product->quantity;

        $content = $template->render($parameters);
        echo $content;
    }
}