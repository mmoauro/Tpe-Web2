<?php

class MarcaModel{

    private $db;

    public function __construct(){
        $this->db= new PDO('mysql:host=localhost;'.'dbname=db_celulares;charset=utf8', 'root', '');
    }

    function getMarcas(){
        $query = $this->db->prepare("SELECT * FROM marcas");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCelularesMarca($id){
        $query = $this->db->prepare("SELECT marcas.nombre AS marca, celulares.* FROM celulares JOIN marcas ON celulares.id_marca = marcas.id WHERE id_marca = ?");
        $query->execute(array($id));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function addMarca($nombre, $origen){
        $query = $this->db->prepare("INSERT INTO marcas(nombre, origen) VALUES (?,?)");
        $query->execute(array($nombre, $origen));
    }

    function removeMarca($id){
        $query = $this->db->prepare("DELETE FROM marcas WHERE id = ?");
        $query->execute(array($id));
    }

    function editMarca($nombre, $origen, $id){
        $query = $this->db->prepare("UPDATE marcas SET  nombre = ?, origen = ? WHERE id = ?");
        $query->execute(array($nombre, $origen, $id));
    }
}