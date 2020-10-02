<?php

require_once ('app/Models/UserModel.php');
require_once ('app/Views/UserView.php');
require_once ('app/Controllers/AuthController.php');

class UserController{
    private $model;
    private $view;
    
    function __construct(){
        $this->model= new UserModel();
        $auth = new AuthController();
        $logged = $auth->verifyUserIsLogged();
        $this->view = new UserView($logged);
        if ($logged) {
            $this->view->redirectHome();
        }
    }

    function showLogin(){
        $this->view->showLogin();
    }

    function showSignUp () {
        $this->view->showSignUp();
    }

    function verifyUser(){

        if(isset($_POST["email"]) and isset($_POST["password"])){

            $email= $_POST["email"];
            $password= $_POST["password"];
            
            $usuario = $this->model->getUsuario($email);

            if($usuario and password_verify($password, $usuario->password)){
                session_start();
                $_SESSION["ADMIN"]= $usuario->admin;
                $_SESSION["LOGGED"]= true;
                $this->view->redirectHome();
            }
            else{
                $this->view->redirectLogin(); // falta implementar en view un mensaje.
            }
        }
    }

    function registryUser(){
        if(isset($_POST["email"]) and isset($_POST["password"]) and isset($_POST["cPassword"])){

            $email= $_POST["email"];
            if (!$this->model->verifyEmailIsTaken($email)) {
                $password= $_POST["password"];

                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $this->model->insertUser($email, $password_hash);
                session_start();
                $_SESSION["ADMIN"]= false;
                $_SESSION["LOGGED"]= true;
                $this->view->redirectLogin();
            }
            else {
                $this->view->redirectLogin(); // falta implementar en view un mensaje.
            }
            
        }
    }


}
