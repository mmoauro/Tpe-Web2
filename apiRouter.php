<?php
    require_once ('api/ComentarioApiController.php');
    require_once 'RouterClass.php';

    $r = new Router();

    $r->addRoute("comentarios/:ID", "GET", "ComentarioApiController", "getComentarios");
    $r->addRoute("comentarios", "POST", "ComentarioApiController", "addComentario");
    $r->addRoute("comentarios/:ID", "DELETE", "ComentarioApiController", "deleteComentario");


    $r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 
?>