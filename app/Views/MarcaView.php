<?php
require_once ('././libs/smarty/Smarty.class.php');
class MarcaView {

    function __construct () {

    }

    function showMarcas ($marcas) {
        $smarty = new Smarty();
        $smarty->assign('marcas', $marcas);
        $smarty->assign('base_url', BASE_URL);
        $smarty->display('templates/marcas.tpl');
    }

    function showCelularesMarca ($celulares) {
        // Es lo mismo que el showHome. Solo que vienen todos los celulares de la misma marca
        $smarty = new Smarty();
        $smarty->assign('celulares', $celulares);
        $smarty->assign('marcas', null);
        $smarty->assign('base_url', BASE_URL);
        $smarty->display('templates/home.tpl');
    }

    function redirectMarcas () {
        header ('Location: '.BASE_URL.'marcas');
    }

    function redirectCelularesMarca ($id) {
        header ('Location: '.BASE_URL."marcas/$id/celulares");
    }
}

?>