<?php 
require_once('../../Conexion.php');

class Administradores extends Conexion{

    public function __construct(){
        $this->db = parent::__construct();
    }
    
    public function add($Nombre, $Apellido, $Documento, $Usuario, $Password, $Correo, $Seccion, 
    $Fecha_registro, $Estado){
            $statement = $this->db->prepare("INSERT INTO usuarios (NOMBRE, APELLIDO, PERFIL, DOCUMENTO, USUARIO, 
            PASSWORD, CORREO, SECCION, FECHA_REGISTRO, ESTADO)
            VALUES(:Nombre, :Apellido, 'Administrador', :Documento, :Usuario, 
            :Password, :Correo, :Seccion, :Fecha_registro, :Estado)");
            
                    $statement->bindParam(':Nombre',$Nombre);
                    $statement->bindParam(':Apellido', $Apellido);
                    $statement->bindParam(':Documento', $Documento);
                    $statement->bindParam(':Usuario', $Usuario);
                    $statement->bindParam(':Password', $Password);
                    $statement->bindParam(':Correo', $Correo);
                    $statement->bindParam(':Seccion', $Seccion);
                    $statement->bindParam(':Fecha_registro',$Fecha_registro);
                    $statement->bindParam(':Estado', $Estado);  
        if($statement->execute()){
            header('Location: ../Pages/index.php');
        }else{
            header('Location: ../Pages/add.php');
        }
    }
    public function get(){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Administrador'");
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }
    public function getById($Id){
        $rows = null;
        $statement = $this->db->prepare("SELECT ID_USUARIO,NOMBRE, APELLIDO, DOCUMENTO, USUARIO, PASSWORD, 
        CORREO, SECCION, FECHA_REGISTRO, ESTADO FROM usuarios WHERE ID_USUARIO = :Id AND PERFIL = 'Administrador'");
        $statement->bindParam(':Id',$Id);
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }
    public function update($Id, $Nombre, $Apellido, $Documento, $Usuario, $Password, $Correo, $Seccion, $Fecha_registro, $Estado){
        $statement = $this->db->prepare("UPDATE usuarios SET NOMBRE = :Nombre, APELLIDO = :Apellido, 
        DOCUMENTO = :Documento, USUARIO = :Usuario, PASSWORD = :Password,
        CORREO = :Correo, SECCION = :Seccion, FECHA_REGISTRO = :Fecha_registro, ESTADO = :Estado WHERE ID_USUARIO = :Id");
        $statement->bindParam(':Id',$Id);
        $statement->bindParam(':Nombre',$Nombre);
        $statement->bindParam(':Apellido', $Apellido);
        $statement->bindParam(':Documento', $Documento);
        $statement->bindParam(':Usuario', $Usuario);
        $statement->bindParam(':Password', $Password);
        $statement->bindParam(':Correo', $Correo);
        $statement->bindParam(':Seccion', $Seccion);
        $statement->bindParam(':Fecha_registro',$Fecha_registro);
        $statement->bindParam(':Estado', $Estado);
        if($statement->execute()){
            header('Location: ../Pages/index.php');
        }else{
            header('Location: ../Pages/edit.php');
        }
    }
    public function delete($Id){
        $statement = $this->db->prepare("DELETE FROM usuarios WHERE ID_USUARIO = :Id");
        $statement->bindParam(':Id', $Id);
        if($statement->execute()){
            header('Location: ../Pages/index.php');
        }else{
            header('Location: ../Pages/delete.php');
        }
    }
}

?>