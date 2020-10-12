<?php

require_once ('app/Models/UserModel.php');
require_once ('app/Views/UserView.php');
require_once('app/Controllers/AuthHelper.php');

class UserController{
    private $model;
    private $view;
    
    function __construct(){
        $this->model= new UserModel();
        $auth = new AuthHelper();
        $status = $auth->getUserStatus();
        $this->view = new UserView($status);
        if ($status >= 0) {
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
                $this->view->showError("Usuario o contrasena incorrecto.", 'login');
            }
        }
    }

    function registryUser(){
        if(isset($_POST["email"])){

            $email= $_POST["email"];
            if (!$this->model->getUsuario($email)) {
                $password= $_POST["password"];

                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $this->model->insertUser($email, $password_hash);
                session_start();
                $_SESSION["ADMIN"]= false;
                $_SESSION["LOGGED"]= true;
                $this->view->redirectLogin();
            }
            else {
                $this->view->showError("El email ingresado ya esta en uso.", 'signup');
            }
            
        }
    }


}
