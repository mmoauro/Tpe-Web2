<?php

require_once ('app/Models/UserModel.php');
require_once ('app/Views/UserView.php');
require_once ('app/Controllers/AuthHelper.php');

class UserController{
    private $model;
    private $view;
    private $auth;
    
    function __construct(){
        $this->model= new UserModel();
        $this->auth = new AuthHelper();
        $status = $this->auth->getUserStatus();
        $this->view = new UserView($status);
    }

    function showLogin(){
        if ($this->auth->getUserStatus() >= 0)
            $this->view->redirectHome();
        else
            $this->view->showLogin();
        
    }

    function showSignUp () {
        if ($this->auth->getUserStatus() >= 0)
            $this->view->redirectHome();
        else
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
                $_SESSION['ID_USER'] = $usuario->id;
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
                $usuario = $this->model->getUsuario($email);
                $_SESSION['ID_USER'] = $usuario->id;
                $this->view->redirectLogin();
            }
            else {
                $this->view->showError("El email ingresado ya esta en uso.", 'signup');
            }
            
        }
    }

    function showUsers () {
        if ($this->auth->getUserStatus() == 1) {
            $users = $this->model->getUsers();
            foreach ($users as $key => $user) {
                if ($user->id == $this->auth->getUserId()) {
                    unset($users[$key]);
                    break;
                }
            }
            $this->view->showUsers($users);
        }
        else
            $this->view->redirectHome();
    }

    function removeUser($params = null){
        if ($this->auth->getUserStatus() == 1) {
            $id= $params[":ID"];

            $user= $this->model->getUsuarioById($id);

            if ($user){
                $this->model->removeUser($id);
                $this->view->redirectUsers();
            }
            else{
                $this->view->showError("El usuario con id = $id no existe", "users");
            }
        }
        else
            $this->view->redirectHome();
    }

    function editUser($params = null){
        if ($this->auth->getUserStatus() == 1) {
            $id= $params[":ID"];
            
            if (isset($_POST['role'])) {
                $role = $_POST['role']; // value 1 para admin, 0 para user.
                $user = $this->model->getUsuarioById($id);

                if ($user){
                    $this->model->updateUserRole($id, $role);
                    $this->view->redirectUsers();
                }
            }
        }
        else
            $this->view->redirectHome();
    }
}
