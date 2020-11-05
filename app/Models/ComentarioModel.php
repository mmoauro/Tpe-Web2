<?php

class ComentarioModel{

    private $db;

    public function __construct(){
        $this->db= new PDO('mysql:host=localhost;'.'dbname=db_celulares;charset=utf8', 'root', '');
    }
        
   function getComentarios ($id_celular) {
       $query = $this->db->prepare("SELECT usuarios.email AS email, comentarios.* FROM comentarios JOIN usuarios ON usuarios.id = comentarios.id_user WHERE comentarios.id_celular = ?");
       $query->execute(array($id_celular));
       return $query->fetchAll(PDO::FETCH_OBJ);
   }

   function getComentario ($id) {
        $query = $this->db->prepare("SELECT usuarios.email AS email, comentarios.* FROM comentarios 
        JOIN usuarios ON comentarios.id_user = usuarios.id
        WHERE comentarios.id = ?");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_OBJ);
   }

   function deleteComentario ($id) {
       $query = $this->db->prepare("DELETE FROM comentarios WHERE id = ?");
       $query->execute(array($id));
   }

   function addComentario ($puntuacion, $comentario, $id_user, $id_celular) {
       $query = $this->db->prepare("INSERT INTO comentarios (puntuacion, comentario, id_user, id_celular) VALUES (? ,? ,? ,?)");
       $query->execute(array($puntuacion, $comentario, $id_user, $id_celular));
       return $this->db->lastInsertId();
   }

}