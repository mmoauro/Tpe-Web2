<?php
require_once ('app/Views/CelularView.php');

class AuthHelper {

    function __construct() {
        session_start();
    }

    function getUserStatus () {
        //devuelve 1 si es admin, 0 si esta loggeado, y -1 si no esta loggeado.
        if (isset ($_SESSION['LOGGED']) || isset($_SESSION['ADMIN'])){
            if ($_SESSION['LOGGED'] && $_SESSION['ADMIN']) {
                return 1;
            }
            return 0;
        }
        return -1;
    }

    function getUserId () {
        if (isset($_SESSION['ID_USER'])) {
            return $_SESSION['ID_USER'];
        }
        return null;
    }

    function logout () {
        session_destroy();
        $view = new CelularView(-1);
        $view->redirectHome();
        die();
    }
}

?>