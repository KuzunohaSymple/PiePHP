<?php

class UserController extends Controller
{

    public function __construct() {

    }

    public function indexAction() {
        
        $this->render("index");

    }

    public function addAction() {
        
        echo 'AddAction USER CONTROLLER';
    }

    public function lolAction() {
        $foo = new UserModel("bou@bou", "lol");
        echo $foo->getEmail();
        echo $foo->getPassword();
        $this->render("register");


    }
    public function registerAction() {
//        $this->render("register");

        if (isset($_POST['mail']) && isset($_POST['password'])) {
        $insert_into = new UserModel($_POST['mail'], $_POST['password']);
        $insert_into->save();
        $this->render("login");
//        var_dump($_POST);
        }

        else {
            $this->render("register");
        }
    }

    public function loginAction() {
        $this->render("login");
    }
}