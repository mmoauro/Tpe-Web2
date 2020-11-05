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

    function showHome ($params = null) {
        $offset = 0;
        if (isset($params[':OFFSET']) && is_numeric($params[':OFFSET']))
            $offset = $params[':OFFSET'];

        $marcas = $this->getMarcas();
        $celulares = $this->model->getCelulares($offset * 5);
        $max = count($celulares) < 5; // Variable para saber si pongo el link de siguiente pagina
        $this->view->showHome($celulares, $marcas, $offset, $max);
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
        $this->view->showCelular($celular, $this->auth->getUserId()); // Le paso el id del usuario porque necesito pasarselo a vue.
    }

    function showCelularesLike($params = null){
        if(isset($_POST["busqueda_input"])){
            $offset = 0;
            if (isset($params[':OFFSET']) && is_numeric($params[':OFFSET']))
                $offset = $params[':OFFSET'];

            $busqueda = $_POST["busqueda_input"]; // Input del filtrado.

            $celulares= $this->model->celularLike($busqueda, $offset * 5);
            $marcas = $this->getMarcas();
            $max = count($celulares) < 5;
            $this->view->showHome($celulares, $marcas, $offset, $max);
        }
    }

    function getMarcas () {
        $modelMarca = new MarcaModel(); // Para mostrar las marcas en el formulario
        return$modelMarca->getMarcas();
    }
}


?>