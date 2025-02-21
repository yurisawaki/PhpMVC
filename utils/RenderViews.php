<?php

class RenderViews{
    public function loadView($view, $args){
     
        if (!empty($args)) {
            extract($args); 
        }
        
        require_once __DIR__. "/../views/$view.php";
    }
}
