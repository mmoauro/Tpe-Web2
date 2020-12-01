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
        $this->view= new CelularView($status);
    }

    function showHome ($params = null) {
        $offset = 0;
        if (isset($params[':OFFSET']) && is_numeric($params[':OFFSET']))
            $offset = $params[':OFFSET'];

        $marcas = $this->getMarcas();
        $celulares = $this->model->getCelulares($offset * 5);
        $max = count($celulares) < 5; // Variable para saber si pongo el link de siguiente pagina
        $totalCelulares = (int) $this->model->getCountCelulares()->total;
        $this->view->showHome($celulares, $marcas, $offset, $max, $totalCelulares);
    }

    function addCelular(){
        if (isset ($_POST["modelo"]) && isset($_POST['especificaciones']) && isset($_POST['marca'])) {
            $modelo = $_POST["modelo"];
            $especificaciones = $_POST['especificaciones'];
            $marca = $_POST['marca'];
            $img = $this->getImagesFromInput();
            $this->model->addCelular($modelo, $marca, $especificaciones, $img);
        }
        $this->view->redirectHome();
    }

    function editCelular ($params = null) {
        $id = $params[':ID'];
        if (isset ($_POST["modelo"]) && isset($_POST['especificaciones'])) {
            $modelo = $_POST["modelo"];
            $especificaciones = $_POST['especificaciones'];
            $celular = $this->model->getCelular($id);
            $img = $celular->imagen;
            $imgInput = $this->getImagesFromInput();
            if ($imgInput != null) {
                $img = $imgInput;
            }
            $this->model->editCelular($modelo, $especificaciones, $img, $id);
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

    function removeImg ($params = null) {
        $id = $params[':ID'];

        if ($this->auth->getUserStatus() == 1) {
            $this->model->removeImg($id);
        }
        $this->view->redirectCelular($id);
    }

    function showCelularEspecifico ($params = null) {
        $id = $params[':ID'];
        $celular = $this->model->getCelular($id);
        $this->view->showCelular($celular, $this->auth->getUserId()); // Le paso el id del usuario porque necesito pasarselo a vue.
    }

    function showCelularesLike($params = null){
        if(isset($_GET["query"])){
            $offset = 0;
            if (isset($params[':OFFSET']) && is_numeric($params[':OFFSET']))
                $offset = $params[':OFFSET'];

            $busqueda = $_GET["query"]; // Input del filtrado.

            $celulares= $this->model->celularLike($busqueda, $offset * 5);
            $marcas = $this->getMarcas();
            $max = count($celulares) < 5;
            $totalCelulares = (int) $this->model->getCountCelularesLike($busqueda)->total;
            $this->view->showHome($celulares, $marcas, $offset, $max, $totalCelulares, $busqueda, 'celulareslike');
        }
    }

    function getMarcas () {
        $modelMarca = new MarcaModel(); // Para mostrar las marcas en el formulario
        return$modelMarca->getMarcas();
    }

    function getImagesFromInput () {
        $img = null;

        if ($_FILES['img']['type'] == "image/jpg" || $_FILES['img']['type'] == "image/jpeg" || $_FILES['img']['type'] == "image/png") {
            $path = 'app/Images/'. uniqid("", true) . "." . strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));
            move_uploaded_file($_FILES['img']['tmp_name'], $path);
            $img = $path;
        }
        return $img;
    }
}