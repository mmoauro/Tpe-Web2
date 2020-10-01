<?php
require_once ('././libs/smarty/Smarty.class.php');
class CelularView {

    private $smarty;

    function __construct () {
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
    }

    function showHome ($celulares, $marcas) {
        $this->smarty->assign('celulares', $celulares);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->display('templates/home.tpl');
    }

    function showCelular($celular){
        $this->smarty->assign('celular', $celular);
        $this->smarty->display('templates/celular.tpl');
    }

    function redirectHome () {
        header ('Location: '.BASE_URL);
    }

    function redirectCelular ($id) {
        header('Location: '.BASE_URL."celular/$id");
    }
}

?>