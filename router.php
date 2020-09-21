<?php

    require_once ('app/Controllers/AppController.php');
    require_once ('app/Controllers/MarcaController.php');
    require_once 'RouterClass.php';
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    //Muestra home, y celular especifico
    $r->addRoute("home", "GET", "AppController", "showHome");
    $r->addRoute("celular/:ID", "GET", "AppController", "showCelularEspecifico");

    // Mostras todas las marcas, y los celulares de una marca
    $r->addRoute("marcas", "GET", "MarcaController", "showMarcas");
    $r->addRoute("marcas/:ID/celulares", "GET", "MarcaController", "showCelularesMarca");

    // Agregar, editar, y borrar un celular
    $r->addRoute("celular/add", "POST", "AppController", "addCelular");
    $r->addRoute("celular/edit/:ID", "POST", "AppController", "editCelular");
    $r->addRoute("celular/remove/:ID", "GET", "AppController", "removeCelular");

    $r->addRoute("marca/add", "POST", "MarcaController", "addMarca");
    $r->addRoute("marca/edit/:ID", "POST", "MarcaController", "editMarca");
    $r->addRoute("marca/remove/:ID", "GET", "MarcaController", "removeMarca");

    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>