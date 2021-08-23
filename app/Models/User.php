<?php

namespace App\Models;

class User{

    public static function search($email){
        $con = \App\Database\Connection::getConn();

        $sql = 'SELECT * FROM person WHERE email = :email';
        $sql = $con->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        $result = $sql->fetchObject();

        if (!$result) {     
            return False;
        }

        return $result;
    }

    public static function insert(){

        $con = \App\Database\Connection::getConn();

        $sql = 'INSERT INTO person(username, email, password_hashed) values(:us, :em, :pw)';
        $sql = $con->prepare($sql);
        $sql->bindValue(':us', $_POST['username']);
        $sql->bindValue(':em', $_POST['email']);
        $sql->bindValue(':pw', $_POST['password']);
        $res =$sql->execute();

        if ($res == false) {
            return false;
        }

        $user = \App\Models\User::search($_POST['email']);

        $sql = 'INSERT INTO cart(total, user_id) values(:to, :id)';
        $sql = $con->prepare($sql);
        $sql->bindValue(':to', 0);
        $sql->bindValue(':id', $user->id);
        $res = $sql->execute();

        if ($res == false) {
            return false;
        }

        return true;
    }
}