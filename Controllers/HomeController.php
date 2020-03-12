<?php

use System\View;

class HomeController extends System\Controller{
    
    function index(){

        View::render('HomePage/home');
        
    }
    
    
}

