<?php

namespace App\Controllers;

class LoginController{
    
    public function index(){

        try{
            $loader = new \Twig\Loader\FilesystemLoader('app/Views');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('login.html');

            $content = $template->render();
            echo $content;
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function login(){
        try{

            $user = \App\Models\User::search($_POST['email']);

            if(password_verify($_POST['password'], $user->password_hashed)){
                $_SESSION['id'] = $user->id;
                $_SESSION['username'] = $user->username;
                $_SESSION['email'] = $user->email;
                $_SESSION['admin'] = $user->admin;
                $_SESSION['loggedin'] = true;

                echo '<script>location.href="http://localhost/RodrigoStore/?page=home"</script>';

            }else{
                throw new \Exception("Incorrect password!");
            }
        } catch(\Exception $e){
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="http://localhost/RodrigoStore/?page=login"</script>';
        }
        
    }

    public function logout(){

        session_unset();

        session_destroy();

        echo '<script>location.href="http://localhost/RodrigoStore/?page=home"</script>';

    }

    public function register(){

        $loader = new \Twig\Loader\FilesystemLoader('app/Views');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('register.html');

        $content = $template->render();
        echo $content;
    }

    public function insert(){

        try {

            if(\App\Models\User::search($_POST['email'])){
                throw new \Exception("This email already exists");
            }else{

                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $_POST['password'] = $password;

                $res = \App\Models\User::insert($_POST);
                
                if($res == true){
                    echo '<script>alert("Registration done successfully!");</script>';
                    echo '<script>location.href="http://localhost/RodrigoStore/?page=login"</script>';  
                }else{
                    echo '<script>alert("Failed to insert product!");</script>';
                    echo '<script>location.href="http://localhost/RodrigoStore/?page=login&method=register"</script>';
                }
            }
        } catch(\Exception $e) { 
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="http://localhost/RodrigoStore/?page=login&method=register"</script>';
        }

    }
}