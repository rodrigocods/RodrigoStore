<?php

namespace App\Core;

class Core{

    public function start($urlGet){
        
        if (isset($urlGet['method'])) {
            $method = $urlGet['method'];
        } else {
            $method = 'index';
        }
        
        if(isset($urlGet['page'])){
            $controller = ucfirst("\App\Controllers\\".$urlGet['page']."Controller");
        } else {
            $controller = "\App\Controllers\HomeController";
        }

        if(isset($urlGet['id']) && $urlGet['id'] != null) {
            $id = $urlGet['id'];
        } else {
            $id = null;
        }

        call_user_func_array(array(new $controller, $method), array());

    }
}