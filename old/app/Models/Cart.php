<?php

namespace App\Models;

class Cart{

    public static function getAll($cart_id){
        $con = \App\Database\Connection::getConn();

        $sql = 'SELECT * FROM cart_item WHERE cart_id = :ci';
        $sql = $con->prepare($sql);
        $sql->bindValue(":ci", $cart_id);
        $sql->execute();

        $result= array();

        while ($row = $sql->fetchObject()) {
            $result[] = $row;
        }

        return $result;
    }

    public static function search(){
        $con = \App\Database\Connection::getConn();
        
        $sql = 'SELECT * FROM cart WHERE user_id = :id';
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $_SESSION['id']);
        $sql->execute();

        $result = $sql->fetchObject();

        if (!$result) {
            throw new \Exception("Did not find anything in the database");		
        }

        return $result;
    }

    public static function add(){
        $con = \App\Database\Connection::getConn();

        $cart = \App\Models\Cart::search();

        $sql = 'SELECT * FROM cart_item WHERE product_id = :pi AND cart_id = :ci';
        $sql = $con->prepare($sql);
        $sql->bindValue(':pi', $_GET['id']);
        $sql->bindValue(':ci', $cart->id);
        $res = $sql->execute();

        if($res == false){ 
            return false;
        }
        
        $sql = 'INSERT INTO cart_item(quantity, cart_id, product_id) VALUES(:qu, :ci, :pi)';
        $sql = $con->prepare($sql);
        $sql->bindValue(':qu', 1);
        $sql->bindValue(':ci', $cart->id);
        $sql->bindValue(':pi', $_GET['id']);
        $res = $sql->execute();

        if ($res == false) {
            return false;
        }

        return true;
    }

    public static function updateCartItem(){
        $con = \App\Database\Connection::getConn();

        $cart = \App\Models\Cart::search();

        $sql = 'UPDATE cart_item SET quantity = :qu WHERE cart_id = :ci AND product_id = :pi';
		$sql = $con->prepare($sql);
		$sql->bindValue(':qu', $_GET['quantity']);
        $sql->bindValue(':ci', $cart->id);
        $sql->bindValue(':pi', $_GET['id']);
        $res = $sql->execute();

        if ($res == false) {
            return false;
        }

        return true;
    }

    public static function delete(){
        $con = \App\Database\Connection::getConn();

        $cart = \App\Models\Cart::search();

        $sql = 'DELETE FROM cart_item WHERE product_id = :pi AND cart_id = :ci';
        $sql = $con->prepare($sql);
        $sql->bindValue(':ci', $cart->id);
        $sql->bindValue(':pi', $_GET['id']);
        $res = $sql->execute();

        if($res = false){
            return false;
        }

        return true;
    }

    public static function updateTotal($total){
        $con = \App\Database\Connection::getConn();

        $cart = \App\Models\Cart::search();

        $sql = 'UPDATE cart SET total = :to WHERE id = :id';
        $sql = $con->prepare($sql);
        $sql->bindValue(':to', $total);
        $sql->bindValue(':id', $cart->id);
        $sql->execute();

        return true;
    }
}

