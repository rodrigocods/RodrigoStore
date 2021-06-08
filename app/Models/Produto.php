<?php

namespace App\Models;

class Produto{

    public static function getAll(){
        $con = \App\Database\Connection::getConn();

        $sql = "SELECT * FROM produtos";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject()) {
            $resultado[] = $row;
        }

        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum registro no banco");		
        }

        return $resultado;
    }

    public static function search($id){
        $con = \App\Database\Connection::getConn();

        $sql = "SELECT * FROM produtos WHERE id = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        $resultado = $sql->fetchObject();

        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum registro no banco");		
        }

        return $resultado;
    }

    public static function insert($dados){

        if(empty($dados['productName'] OR empty($dados['descricao'] OR empty($dados['preco'])))){
            throw new Exception("Preencha todos os campos");

            return FALSE;
        }

        $con = \App\Database\Connection::getConn();

        $sql = $con->prepare('INSERT INTO produtos(productName, descricao, preco) VALUES (:pN, :de, :pr)');
        $sql->bindValue(':pN', $dados['productName']);
        $sql->bindValue(':de', $dados['descricao']);
        $sql->bindValue(':pr', $dados['preco']);
        $res = $sql-> execute();

        if ($res == 0) {
            throw new Exception("Falha ao inserir produto");

            return false;
        }

        return true;
    }

    public static function update($parametros){

        $con = \App\Database\Connection::getConn();

        $sql = "UPDATE produtos SET productName = :pN, descricao = :de, preco = :pr WHERE id = :id";
		$sql = $con->prepare($sql);
		$sql->bindValue(':pN', $parametros['productName']);
		$sql->bindValue(':de', $parametros['descricao']);
		$sql->bindValue(':pr', $parametros['preco']);
        $sql->bindValue(':id', $parametros['id']);
		$res = $sql->execute();

        if($res == 0){
            throw new Exception("Falha ao alterar produto");

            return false;
        }

        return true;
        
    }
    public static function delete($id){

        $con = \App\Database\Connection::getConn();

        $sql = "DELETE FROM produtos WHERE id = :id";
		$sql = $con->prepare($sql);
		$sql->bindValue(':id', $id);
		$res = $sql->execute();

        if($res == 0){
            throw new Exception("Falha ao excluir produto");

            return false;
        }

        return true;
    }
}