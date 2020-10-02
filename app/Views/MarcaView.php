<?php
require_once ('././libs/smarty/Smarty.class.php');
class MarcaView {

    private $smarty;

    function __construct ($logged, $admin) {
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('isAdmin', $admin);

    }

    function showMarcas ($marcas) {
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->display('templates/marcas.tpl');
    }

    function showCelularesMarca ($celulares, $nombreMarca) {
        // Es lo mismo que el showHome. Solo que vienen todos los celulares de la misma marca
        $this->smarty->assign('celulares', $celulares);
        $this->smarty->assign('nombreMarca', $nombreMarca);
        $this->smarty->display('templates/celularesMarca.tpl');
    }

    function redirectMarcas () {
        header ('Location: '.BASE_URL.'marcas');
    }

    function redirectCelularesMarca ($id) {
        header ('Location: '.BASE_URL."marcas/$id");
    }
}

?>