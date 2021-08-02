<?php

namespace App\Models;

class Product{

    public static function getAll(){
        $con = \App\Database\Connection::getConn();

        $sql = "SELECT * FROM product";
        $sql = $con->prepare($sql);
        $sql->execute();

        $result= array();

        while ($row = $sql->fetchObject()) {
            $result[] = $row;
        }

        return $result;
    }

    public static function search($id){
        $con = \App\Database\Connection::getConn();

        $sql = "SELECT * FROM product WHERE id = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        $result = $sql->fetchObject();

        if (!$result) {
            throw new \Exception("Did not find anything in the database");		
        }

        return $result;
    }

    public static function insert($data){

        $con = \App\Database\Connection::getConn();
        
        $sql = $con->prepare('INSERT INTO product(product_name, description, price, quantity ) VALUES (:pN, :de, :pr, :qu)');
        $sql->bindValue(':pN', $data['product_name']);
        $sql->bindValue(':de', $data['description']);
        $sql->bindValue(':pr', $data['price']);
        $sql->bindValue(':qu', $data['quantity']);
        $res = $sql->execute();

        if ($res == false) {
            return false;
        }

        return true;
    }

    public static function update($parameters){

        $con = \App\Database\Connection::getConn();

        $sql = "UPDATE product SET product_name = :pN, description = :de, price = :pr, quantity = :qu WHERE id = :id";
		$sql = $con->prepare($sql);
		$sql->bindValue(':pN', $parameters['product_name']);
		$sql->bindValue(':de', $parameters['description']);
		$sql->bindValue(':pr', $parameters['price']);
        $sql->bindValue(':qu', $parameters['quantity']);
        $sql->bindValue(':id', $parameters['id']);
		$res = $sql->execute();

        if($res == 0){
            throw new \Exception("Failed to update product");

            return false;
        }

        return true;
        
    }
    public static function delete($id){

        $con = \App\Database\Connection::getConn();

        $sql = "DELETE FROM product WHERE id = :id";
		$sql = $con->prepare($sql);
		$sql->bindValue(':id', $id);
		$res = $sql->execute();

        if($res == 0){
            throw new \Exception("Failed to delete product");

            return false;
        }

        return true;
    }
}