<?php 
require_once('Conexion.php');

class Metodos extends Conexion{

    public function __construct(){
        $this->db = parent::__construct();
    }


    public function getProductos(){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM productos");
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }
    public function getSecciones(){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM secciones");
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }

    public function getAdministradores(){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Administrador'");
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }

    public function getEstados(){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM estado");
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }

}

?>