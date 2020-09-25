<?php

class CelularModel{

    private $db;

    public function __construct(){
        $this->db= new PDO('mysql:host=localhost;'.'dbname=db_celulares;charset=utf8', 'root', '');
    }
        
    function getCelulares() {
        $query = $this->db->prepare("SELECT marcas.nombre AS marca, celulares.* FROM celulares JOIN marcas ON celulares.id_marca = marcas.id");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCelular ($id) {
        $query = $this->db->prepare("SELECT marcas.nombre AS marca, celulares.* FROM celulares JOIN marcas ON celulares.id_marca = marcas.id WHERE celulares.id = ?");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function addCelular($modelo, $marca, $especificaciones){
        $query = $this->db->prepare("INSERT INTO celulares(modelo, id_marca, especificaciones) VALUES (?,?,?)");
        $query->execute(array($modelo, $marca, $especificaciones));
    }

    function removeCelular($id){
        $query = $this->db->prepare("DELETE FROM celulares WHERE id = ?");
        $query->execute(array($id));
    }

    function editCelular($modelo, $especificaciones, $id){
        $query = $this->db->prepare("UPDATE celulares SET modelo = ?, especificaciones = ? WHERE id = ?");
        $query->execute(array($modelo, $especificaciones, $id));
    }
}