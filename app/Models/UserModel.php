<?php

    class UserModel{
        private $db;

        function __construct(){
            $this->db= new PDO('mysql:host=localhost;'.'dbname=db_celulares;charset=utf8', 'root', '');
        }

        function getUsuario($email){
            $query = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
            $query->execute(array($email));
            return $query->fetch(PDO::FETCH_OBJ);
        }

        function insertUser($email, $password_hash){
            $query = $this->db->prepare("INSERT INTO usuarios (email, password, admin) VALUES(?,?,?)");
            $query->execute(array($email, $password_hash, 0));
        }

        function getUsers () {
            $query = $this->db->prepare("SELECT * FROM usuarios");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        function getUsuarioById($id){
            $query = $this->db->prepare("SELECT * FROM usuarios WHERE id = ?");
            $query->execute(array($id));
            return $query->fetch(PDO::FETCH_OBJ);
        }

        function removeUser($id){
            $query = $this->db->prepare("DELETE FROM usuarios WHERE id = ?");
            $query->execute(array($id));
        }

        function updateUserRole ($id, $role){
            $query = $this->db->prepare("UPDATE usuarios SET admin = ? WHERE id = ?");
            $query->execute(array($role, $id));
        }

    }