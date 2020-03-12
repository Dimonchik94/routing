<?php

class User extends System\Model {
    
    function create_user($name, $password, $status){

        $User = R::dispense( 'user' );

        $User->name = $name;
        $User->password = $password;
        $User->status = $status;
        $User->baned = false;

        R::store($User);

        R::close();
    }

    function getUserByName( $name ){

        $user = R::findOne('user', 'name = ?', [$name]);

        if ( $user === null ){
            return false;
        }

        $user = $user->export();

        return $user;
    }

    function getUserById( $id ){

        $user = R::findOne('user', 'id = ?', [$id]);

        if ( $user === null ){
            return false;
        }

        $user = $user->export(); //Преобразует бин в массив

        return $user;
    }

    function getAllUsers(){

        $allUsers = [];

        $users = R::find( 'user', 'status != ?', array('admin') );

        if ( $users == null ){
            return false;
        }

        foreach ( $users as $user ){
            array_push( $allUsers, $user );
        }

        return $allUsers;

    }

    private function getUserBy( $column, $value){

        $allUsers = [];

        $users = R::findAll('user', "$column = ?", [$value]);

        if ( $users == null ){
            return false;
        }

        foreach ( $users as $user ){
            array_push( $allUsers, $user );
        }

        return $allUsers;

    }

    function getAllUser(){

        return self::getUserBy('status', 'user' );

    }

    function getAllModerators(){

        return self::getUserBy('status', 'moderator' );

    }

    function getAllBaned(){

        return self::getUserBy('baned', true );

    }


}

