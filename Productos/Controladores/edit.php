<?php
require_once('../Modelo/Productos.php');

if($_POST){
    $Modelo = new Productos();

    $Id = $_POST['Id'];
    $Nombre = $_POST['Nombre'];
    $Proveedor = $_POST['Proveedor'];
    $FechaIng = $_POST['FechaIng'];
    $FechaVen = $_POST['FechaVen'];
    $Cantidad = $_POST['Cantidad'];
    $Modelo->update($Id, $Nombre, $Proveedor, $FechaIng, $FechaVen, $Cantidad);
    
}else{
    header('Location: ../../index.php');
}


?>