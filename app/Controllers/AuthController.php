<?php
require_once ('app/Views/CelularView.php');

class AuthController {

    function __construct() {
        session_start();
    }

    function verifyUserIsAdmin () {
        if (isset ($_SESSION['LOGGED']) && isset($_SESSION['ADMIN'])) {
            return $_SESSION['LOGGED'] && $_SESSION['ADMIN'];
        }
        return false;
    }

    function verifyUserIsLogged () {
        if (isset ($_SESSION['LOGGED'])) {
            return $_SESSION['LOGGED'];
        }
        return false;
    }

    function logout () {
        session_destroy();
        $view = new CelularView(false, false);
        $view->redirectHome();
    }
}

?>