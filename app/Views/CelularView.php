<?php
require_once ('././libs/smarty/Smarty.class.php');
class CelularView {

    function __construct () {

    }

    function showHome ($celulares, $marcas) {
        $smarty = new Smarty();
        $smarty->assign('celulares', $celulares);
        $smarty->assign('marcas', $marcas);
        $smarty->assign('base_url', BASE_URL);
        $smarty->display('templates/home.tpl');
    }

    function showCelular($celular){
        $smarty = new Smarty();
        $smarty->assign('celular', $celular);
        $smarty->assign('base_url', BASE_URL);
        $smarty->display('templates/celular.tpl');
    }

    function redirectHome () {
        header ('Location: '.BASE_URL.'home');
    }

    function redirectCelular ($id) {
        header('Location: '.BASE_URL."celular/$id");
    }
}

?>