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

    }