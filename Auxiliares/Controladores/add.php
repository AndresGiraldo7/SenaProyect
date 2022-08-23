<?php

require_once('../Modelo/Auxiliares.php');

if($_POST){
    $ModeloAuxiliares = new Auxiliares();
    
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Documento = $_POST['Documento'];
    $Usuario = $_POST['Usuario'];
    $Password = $_POST['Password'];
    $Correo = $_POST['Correo'];
    $Seccion = $_POST['Seccion'];
    $Fecha_registro = date('Y-m-d');
    $Estado = $_POST['Estado'];   
    $ModeloAuxiliares->add($Nombre, $Apellido,  $Documento, $Usuario, $Password, $Correo, $Seccion, 
    $Fecha_registro , $Estado);
}else{
    header("Location: ../../index.php");
}

?>