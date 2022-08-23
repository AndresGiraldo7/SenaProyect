<?php
require_once('../Modelo/Auxiliares.php');

if($_POST){
    $Modelo = new Auxiliares();

    $Id = $_POST['Id'];
    $Modelo->delete($Id);

}else{
    header('Location:../../index.php');
}

?>