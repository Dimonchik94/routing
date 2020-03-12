<?php

use System\View;


class UserController extends System\Controller{
    
    function registration(){

        if ( !empty($_SESSION) ){
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/user/profile');
        }

        $errors = [];
        
        if ( isset($_POST['submit']) ){
            $errors = self::regFormValidate($_POST, $errors);
        }
        
        if ( isset($_POST['submit']) && empty($errors) ){
            self::registerUser($_POST);
        }
        
        View::render('User/registration', [ 'errors' => $errors ]);
    }
    
    static function regFormValidate($data, $errors){
        
        if ( isset($data['name']) && empty($data['name']) ){
            array_push($errors, 'The name must not be empty');
        }

        if ( isset($data['name']) && !empty($data['name']) ){
            $name = trim($data['name']);
            $user = new User();
            $user = $user->getUserByName($name);
            if ( $user ){
                array_push($errors, 'Name not available');
            }
        }
        
        if ( isset($data['Password']) && empty($data['Password']) ){
            array_push($errors, 'Password must not be empty');
        }
        
        if ( isset($data['Password']) && strlen($data['Password']) < 6 ){
            array_push($errors, 'Password must not be shorter than 6 characters');
        }
        
        if ( isset($data['Password']) && isset($data['confirmPassword']) && $data['Password'] != $data['confirmPassword'] ){
            array_push($errors, 'Passwords do not match');
        }
        
        return $errors;
    }
    
    static function registerUser($data){

        $User = new User();
        $name = trim($data['name']);
        $password = password_hash($data['Password'], PASSWORD_DEFAULT);
        $User->create_user($name, $password, 'user');

        View::render('User/registration', [ 'registration' => true ]);
    }

    function auth(){


        if ( !empty($_SESSION) ){
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/user/profile');
        }

        $errors = [];

        if ( isset($_POST['submit']) ){
            $errors = self::authValidate($_POST, $errors);
        }

        View::render('User/auth', [ 'errors' => $errors ]);
    }

    static function authValidate($data, $errors){

        if ( isset($data['name']) && empty($data['name']) ){
            array_push($errors, 'The name must not be empty');
        }

        $name = trim($data['name']);
        $user = new User();
        $user = $user->getUserByName($name);

        if ( isset($data['name']) && empty($user) ){
            array_push($errors, 'Wrong login or password');
        }

        if ( isset($data['Password']) && !password_verify( $data['Password'], $user['password'] ) ){
            array_push($errors, 'Wrong login or password');
        }

        if ( !empty($errors) ) {
            return $errors;
        } else {
            self::autorithation($user);
        }

    }

    static private function autorithation( $user ){

        $_SESSION = [
            'username' => $user['name'],
            'status'   => $user['status']
        ];

        if ( $user['status'] == 'user' ) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/user/profile');
        }

        if ( $user['status'] == 'admin' ) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/admin');
        }
    }

    function profile(){

        if ( isset($_SESSION['status']) ){
            View::render('User/profile' );
        }

        if ( empty($_SESSION) ) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . '/user/auth');
        }
    }

    function logout(){
        session_unset();
        header("Location: / ");
    }
}

