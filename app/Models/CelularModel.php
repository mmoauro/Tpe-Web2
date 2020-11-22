<?php

class CelularModel{

    private $db;

    public function __construct(){
        $this->db= new PDO('mysql:host=localhost;'.'dbname=db_celulares;charset=utf8', 'root', '');
    }
        
    function getCelulares($offset) {
        $query = $this->db->prepare("SELECT marcas.nombre AS marca, celulares.* FROM celulares JOIN marcas ON celulares.id_marca = marcas.id LIMIT 5 OFFSET $offset");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCelular ($id) {
        $query = $this->db->prepare("SELECT marcas.nombre AS marca, celulares.* FROM celulares JOIN marcas ON celulares.id_marca = marcas.id WHERE celulares.id = ?");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getCelularesMarca($id, $offset){
        $query = $this->db->prepare("SELECT marcas.nombre AS marca, celulares.* FROM celulares JOIN marcas ON celulares.id_marca = marcas.id WHERE id_marca = ? LIMIT 5 OFFSET $offset");
        $query->execute(array($id));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCountCelulares () {
        $query = $this->db->prepare("SELECT COUNT(id) AS total FROM celulares");
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getCountCelularesMarca ($id) {
        $query = $this->db->prepare("SELECT COUNT(id) AS total FROM celulares WHERE id_marca = ?");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function addCelular($modelo, $marca, $especificaciones, $img){
        $query = $this->db->prepare("INSERT INTO celulares(modelo, id_marca, especificaciones, imagen) VALUES (?,?,?,?)");
        $query->execute(array($modelo, $marca, $especificaciones, $img));
    }

    function removeCelular($id){
        $query = $this->db->prepare("DELETE FROM celulares WHERE id = ?");
        $query->execute(array($id));
    }

    function editCelular($modelo, $especificaciones, $img, $id){
        $query = $this->db->prepare("UPDATE celulares SET modelo = ?, especificaciones = ?, imagen = ? WHERE id = ?");
        $query->execute(array($modelo, $especificaciones, $img, $id));
    }

    function celularLike($busqueda, $offset){
        $query = $this->db->prepare("SELECT marcas.nombre AS marca, celulares.* FROM celulares JOIN marcas ON celulares.id_marca = marcas.id WHERE celulares.especificaciones LIKE CONCAT('%',?,'%') OR celulares.modelo LIKE CONCAT('%',?,'%') OR marcas.nombre LIKE CONCAT('%',?,'%') LIMIT 5 OFFSET $offset");
        $query->execute(array($busqueda, $busqueda, $busqueda));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function removeImg ($id) {
        $query = $this->db->prepare("UPDATE celulares SET imagen = NULL WHERE id = ?");
        $query->execute(array($id));
    }
}