<?php
require_once ("././libs/smarty/Smarty.class.php");

class UserView {
    private $smarty;

    function __construct($logged) {
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('logged', $logged);
    }

    function showLogin () {
        $this->smarty->display("templates/login.tpl");
    }

    function showSignUp () {
        $this->smarty->display("templates/signup.tpl");
    }

    function redirectHome () {
        header("location: ".BASE_URL);
    }

    function redirectLogin () {
        header("location: ".BASE_URL.'login');
    }
}


?>