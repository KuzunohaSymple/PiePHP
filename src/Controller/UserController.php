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

    public function errorAction() {
      echo "Error 404 url not found";
    }

    public function registerAction() {

        if (isset($_POST['mail']) && isset($_POST['password'])) {
            $insert_into = new UserModel($_POST['mail'], $_POST['password']);
            $insert_into->save();
            $this->render("login");
        }

//        $params = $this->request->getQueryParams()

        else {
            $this->render("register");
        }
    }

    public function loginAction() {
        $this->render("login");
    }
}