<?php 
require_once('../../Conexion.php');

class Productos extends Conexion{

    public function __construct(){
        $this->db = parent::__construct();
    }

    public function add($Nombre, $Proveedor, $FechaIng, $FechaVen, $Cantidad){
        $statement = $this->db->prepare("INSERT INTO productos (NOMBRE, PROVEEDOR, FECHA_INGRESO, FECHA_VENCIMIENTO, CANTIDAD)
                                        VALUES(:Nombre, :Proveedor, :FechaIng, :FechaVen, :Cantidad)");
        $statement->bindParam(':Nombre',$Nombre);
        $statement->bindParam(':Proveedor', $Proveedor);
        $statement->bindParam(':FechaIng', $FechaIng);
        $statement->bindParam(':FechaVen', $FechaVen);
        $statement->bindParam(':Cantidad', $Cantidad);
        if($statement->execute()){
            header('Location: ../Pages/index.php');
        }else{
            header('Location: ../Pages/add.php');
        }
    }

    public function get(){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM productos");
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }

    public function getById($Id){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM productos WHERE ID_PRODUCTO = :Id");
        $statement->bindParam(':Id', $Id);
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }
    public function update($Id, $Nombre, $Proveedor, $FechaIng, $FechaVen, $Cantidad){
        $statement = $this->db->prepare("UPDATE productos SET NOMBRE = :Nombre, PROVEEDOR = :Proveedor,
        FECHA_INGRESO = :FechaIng, FECHA_VENCIMIENTO = :FechaVen, CANTIDAD = :Cantidad  WHERE ID_PRODUCTO = :Id");
        $statement->bindParam(':Id', $Id);
        $statement->bindParam(':Nombre', $Nombre);
        $statement->bindParam(':Proveedor', $Proveedor);
        $statement->bindParam(':FechaIng', $FechaIng);
        $statement->bindParam(':FechaVen', $FechaVen);
        $statement->bindParam(':Cantidad', $Cantidad);
        if($statement->execute()){
            header("Location: ../Pages/index.php");
        }else{
            header("Location: ../Pages/edit.php");
        }
    }
    
    public function delete($Id){
        $statement = $this->db->prepare("DELETE FROM productos WHERE ID_PRODUCTO = :Id");
        $statement ->bindParam(':Id', $Id);
        if($statement->execute()){
            header('Location: ../Pages/index.php');
        }else
            header('Location: ../Pages/delete.php');
    }
}

?>