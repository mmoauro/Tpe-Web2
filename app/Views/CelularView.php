<?php
require_once ('././libs/smarty/Smarty.class.php');
class CelularView {

    private $smarty;

    function __construct ($status) {
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('status', $status);
    }

    function showHome ($celulares, $marcas, $offset, $max, $totalCelulares, $query = null, $url = null) {
        $this->smarty->assign('celulares', $celulares);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->assign('offset', $offset);
        $this->smarty->assign('max', $max);
        $url != null ? $this->smarty->assign('url', $url) : $this->smarty->assign('url', 'celulares');
        $this->smarty->assign('totalCelulares', $totalCelulares);
        $this->smarty->assign('query', $query);
        $this->smarty->display('templates/home.tpl');
    }

    function showCelular($celular, $idUser){
        $this->smarty->assign('celular', $celular);
        $this->smarty->assign('idUser', $idUser); // Le paso el id del usuario para usarlo en vue.
        $this->smarty->display('templates/celular.tpl');
    }

    function redirectHome () {
        header ('Location: '.BASE_URL.'celulares/0');
    }

    function redirectCelular ($id) {
        header('Location: '.BASE_URL."celular/$id");
    }
}