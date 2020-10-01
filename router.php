<?php

    require_once('app/Controllers/CelularController.php');
    require_once ('app/Controllers/MarcaController.php');
    require_once 'RouterClass.php';
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    //Muestra home, y celular especifico
    $r->addRoute("", "GET", "CelularController", "showHome");
    $r->addRoute("celular/:ID", "GET", "CelularController", "showCelularEspecifico");

    // Mostras todas las marcas, y los celulares de una marca
    $r->addRoute("marcas", "GET", "MarcaController", "showMarcas");
    $r->addRoute("marcas/:ID", "GET", "MarcaController", "showCelularesMarca");
    // Es mejor ir a la marca por el id o por el nombre de la marca?

    // Agregar, editar, y borrar un celular
    $r->addRoute("celular/add", "POST", "CelularController", "addCelular");
    $r->addRoute("celular/edit/:ID", "POST", "CelularController", "editCelular");
    $r->addRoute("celular/remove/:ID", "GET", "CelularController", "removeCelular");

    $r->addRoute("marca/add", "POST", "MarcaController", "addMarca");
    $r->addRoute("marca/edit/:ID", "POST", "MarcaController", "editMarca");
    $r->addRoute("marca/remove/:ID", "GET", "MarcaController", "removeMarca");

    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>