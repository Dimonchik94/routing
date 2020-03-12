<?php

use System\View;


class AdminController extends System\Controller{

    private static function isAdmin(){
        if ( $_SESSION['status'] != 'admin'){
            header("Location: /");
        }
        return true;
    }

    function index(){
        self::isAdmin();

        View::render('Admin/admin');

    }

    function users($params = null){
        self::isAdmin();

        $user = new User();

        if ($params != null){

            if ( isset($params['id']) ) {
                $user = $user->getUserById($params['id']);

                if ($user == false) {
                    $user = 'Users with this id not found';
                }

                View::render('Admin/admin');
                View::render('Admin/user', ['user' => $user]);

                return;

            } else {

                $value = array_values($params);

                switch ($value[0]) {
                    case 'user':
                        $users = $user->getAllUser();

                        if ($users == false) {
                            $users = 'Users not found';
                        }

                        View::render('Admin/admin');
                        View::render('Admin/users', ['users' => $users]);
                        return;

                    case 'moderator':
                        $users = $user->getAllModerators();

                        if ($users == false) {
                            $users = 'Users not found';
                        }

                        View::render('Admin/admin');
                        View::render('Admin/users', ['users' => $users]);
                        return;

                    case 'baned':
                        $users = $user->getAllBaned();

                        if ($users == false) {
                            $users = 'Users not found';
                        }

                        View::render('Admin/admin');
                        View::render('Admin/users', ['users' => $users]);
                        return;
                }
            }
        }

        if ( isset($_POST['find']) ){

            $user = $user->getUserByName(trim($_POST['user_name']));

            if ($user == false) {
                $user = 'Users with this name not found';
            }

            View::render('Admin/admin');
            View::render('Admin/user', ['user' => $user]);

            return;
        }


        $users = $user->getAllUsers();

        if ( $users == false ){
            $users = 'Users not found';
        }

        View::render('Admin/admin');
        View::render('Admin/users', [ 'users' => $users ]);

    }

}