<?php
require_once ("././libs/smarty/Smarty.class.php");

class UserView {
    private $smarty;

    function __construct($status) {
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('status', $status);
    }

    function showLogin () {
        $this->smarty->display("templates/login.tpl");
    }

    function showSignUp () {
        $this->smarty->display("templates/signup.tpl");
    }

    function showError ($error, $urlRetorno) {
        // La url de retorno el la url a la que tiene que dirigir el link "Volver" luego de mostrar el error.
        $this->smarty->assign('error', $error);
        $this->smarty->assign('url', $urlRetorno);
        $this->smarty->display('templates/error.tpl');
    }

    function showUsers ($users) {
        $this->smarty->assign('users', $users);
        $this->smarty->display('templates/users.tpl');
    }

    function redirectHome () {
        header("location: ".BASE_URL."celulares/0");
    }

    function redirectLogin () {
        header("location: ".BASE_URL.'login');
    }

    function redirectSignUp () {
        header ("Location: ".BASE_URL."signup");
    }

    function redirectUsers(){
        header("location: ".BASE_URL."users");
    }
}


?>