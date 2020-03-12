<?php

namespace System;

class Controller{
    
    public function __construct() {
        self::get_header();
        self::get_footer();
    }
    
    static function get_header(){
        require_once 'Views/header.php';
    }
    
    static function get_footer(){
        require_once 'Views/footer.php';
    }
    
}

