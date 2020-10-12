<?php
require_once('app/Models/CelularModel.php');
require_once ('app/Models/MarcaModel.php');
require_once('app/Views/CelularView.php');
require_once('app/Controllers/AuthHelper.php');

class CelularController {
    private $view;
    private $model;
    private $auth;

    function __construct () {
        $this->model = new CelularModel();
        $this->auth = new AuthHelper();
        $status = $this->auth->getUserStatus();
        // logged y admin se puede simplificar en un entero: -1 si no esta logueado, 0 si esta logueado, y 1 si es admin.
        $this->view= new CelularView($status);
    }

    function showHome () {
        // Hago un model de marca porque necesito las marcas para el formulario
        $modelMarca = new MarcaModel();
        $marcas = $modelMarca->getMarcas();
        $celulares = $this->model->getCelulares();
        $this->view->showHome($celulares, $marcas);
    }

    function addCelular(){
        if (isset ($_POST["modelo"]) && isset($_POST['especificaciones']) && isset($_POST['marca'])) {
            $modelo = $_POST["modelo"];
            $especificaciones = $_POST['especificaciones'];
            $marca = $_POST['marca'];
            $this->model->addCelular($modelo, $marca, $especificaciones);
        }
        $this->view->redirectHome();
    }

    function editCelular ($params = null) {
        $id = $params[':ID'];
        if (isset ($_POST["modelo"]) && isset($_POST['especificaciones'])) {
            $modelo = $_POST["modelo"];
            $especificaciones = $_POST['especificaciones'];
            $this->model->editCelular($modelo, $especificaciones, $id);
        }
        $this->view->redirectCelular($id);
    }

    function removeCelular ($params = null) {
        $id = $params[':ID'];
        if ($this->auth->getUserStatus() == 1) {
            $this->model->removeCelular($id);
        }
        $this->view->redirectHome();
    }

    function showCelularEspecifico ($params = null) {
        $id = $params[':ID'];
        $celular = $this->model->getCelular($id);
        $this->view->showCelular($celular);
    }
}


?>