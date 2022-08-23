<?php
require_once('../Modelo/Productos.php');

if($_POST){
    $Modelo = new Productos();

    $Id = $_POST['Id'];
    $Modelo->delete($Id);

}else{
    header('Location:../../index.php');
}

?>