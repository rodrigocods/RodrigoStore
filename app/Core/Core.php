<?php

class Core{

    public function start($urlGet){
        
        if (isset($urlGet['metodo'])) {
            $metodo = $urlGet['metodo'];
        } else {
            $metodo = 'index';
        }
        
        if(isset($urlGet['pagina'])){
            $controller = ucfirst($urlGet['pagina']."Controller");
        } else {
            $controller = "HomeController";
        }

        if(isset($urlGet['id']) && $urlGet['id'] != null) {
            $id = $urlGet['id'];
        } else {
            $id = null;
        }

        call_user_func_array(array(new $controller, $metodo), array());

    }
}