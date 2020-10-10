<?php
require_once ('app//Models/MarcaModel.php');
require_once ('app//Views/MarcaView.php');

class MarcaController {
    private $model;
    private $view;
    private $auth;

    function __construct() {
        $this->model= new MarcaModel();
        $this->auth = new AuthHelper();
        $logged = $this->auth->verifyUserIsLogged();
        $admin = $this->auth->verifyUserIsAdmin();
        $this->view = new MarcaView($logged, $admin);
    }

    function showMarcas () {
        $marcas = $this->model->getMarcas();
        $this->view->showMarcas($marcas);
    }

    function showCelularesMarca ($params = null) {
        $id = $params[':ID']; // id de la marca
        $celulares = $this->model->getCelularesMarca($id);
        $nombreMarca = $this->model->getNombreMarca($id);
        $this->view->showCelularesMarca($celulares, $nombreMarca, $id);
    }

    function addMarca () {
        if (isset($_POST['nombre']) && isset($_POST['origen'])) {
            $nombre = $_POST['nombre'];
            $origen = $_POST['origen'];
            $this->model->addMarca($nombre, $origen);
            $this->view->redirectMarcas();
        }
    }

    function editMarca ($params = null) {
        $id = $params[':ID'];
        if (isset ($_POST['nombre']) && isset($_POST['origen'])) {
            $nombre = $_POST['nombre'];
            $origen = $_POST['origen'];
            $this->model->editMarca($nombre, $origen, $id);
        }
        $this->view->redirectCelularesMarca($id);
    }

    function removeMarca ($params = null) {
        $id = $params[':ID'];
        if ($this->auth->verifyUserIsAdmin()) {
            $this->model->removeMarca($id);
        }
        $this->view->redirectMarcas();
    }

}




?>