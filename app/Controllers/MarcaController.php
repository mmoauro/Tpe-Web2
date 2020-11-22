<?php
require_once ('app/Models/MarcaModel.php');
require_once ('app/Views/MarcaView.php');
require_once ('app/Models/CelularModel.php');

class MarcaController {
    private $model;
    private $view;
    private $auth;

    function __construct() {
        $this->model= new MarcaModel();
        $this->auth = new AuthHelper();
        $status = $this->auth->getUserStatus();
        $this->view = new MarcaView($status);
    }

    function showMarcas () {
        $marcas = $this->model->getMarcas();
        $this->view->showMarcas($marcas);
    }

    function showCelularesMarca ($params = null) {
        $id = $params[':ID']; // id de la marca
        $offset = 0;
        if (isset($params[':OFFSET']) && is_numeric($params[':OFFSET']))
            $offset = $params[':OFFSET'];
        $celularModel = new CelularModel();
        $celulares = $celularModel->getCelularesMarca($id, $offset * 5);
        $totalCelulares = (int) $celularModel->getCountCelularesMarca($id)->total;
        $nombreMarca = $this->model->getNombreMarca($id);
        $max = count($celulares) < 5;
        $this->view->showCelularesMarca($celulares, $nombreMarca, $id, $offset, $max, $totalCelulares);
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
        if ($this->auth->getUserStatus() == 1) {
            $this->model->removeMarca($id);
        }
        $this->view->redirectMarcas();
    }

}




?>