<?php
    require_once "app/Models/ComentarioModel.php";
    require_once "api/ApiController.php";

    class ComentarioApiController extends ApiController{

        function __construct(){
            parent::__construct();
            $this->model = new ComentarioModel();
        }

        function getComentarios($params = null){
            $id = $params[':ID']; // Id del celular
            $comentarios= $this->model->getComentarios($id);

            if($comentarios)
                $this->view->response($comentarios, 200);
            else
                $this->view->response($comentarios, 404);
        }

        function deleteComentario($params = null){
            $id= $params[":ID"];
            $comentario= $this->model->getComentario($id);

            if($comentario){
                $this->model->deleteComentario($id);
                $this->view->response($comentario, 200);
            }
            else
                $this->view->response("El comentario con id = $id no existe", 404);
        }

        function addComentario(){
            $request = $this->getRequest();

            $id = $this->model->addComentario($request->puntuacion, $request->comentario, $request->id_user, $request->id_celular);
            $comentario = $this->model->getComentario($id);

            if($comentario)
                $this->view->response($comentario, 200);
            else
                $this->view->response("No se pudo insertar el comentario", 404);

        }
    }