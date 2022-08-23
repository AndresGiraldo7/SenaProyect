<?php
require_once('../../Usuarios/Modelo/Usuarios.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos.css" type="text/css"/>
    <title>Control De Vencidos</title>
</head>
<body>
    <div class="contenedor">
    <h1>Sistema De Alertas Tipo Semaforo</h1>
   <br><h2>Registrar Productos</h2><br>
    <div class= "centrar">
    <form method="POST" action="../Controladores/add.php">
        <p>Nombre</p><br>
        <input type="text" name="Nombre" required="required" autocomplete="off" placeholder="Nombre Producto"><br><br>
        <p>Proveedor</p><br>
        <input type="text" name="Proveedor" required="required" autocomplete="off" placeholder="Nombre Proveedor"><br><br>
        <p>Fecha de Ingreso</p><br>
        <input type="date" name="FechaIng" required="required" autocomplete="off" placeholder="Fecha de Ingreso"><br><br>
        <p>Fecha de Vencimiento</p><br>
        <input type="date" name="FechaVen" required="required" autocomplete="off" placeholder="Fecha de vencimiento"><br><br>
        <p>Cantidad</p><br>
        <input type="text" name="Cantidad" required="required" autocomplete="off" placeholder="Cantidad"><br><br>
        <br><button class="button button3" type="submit" value="Registrar Producto">Registrar Producto</button>
    </form>
    </div>
    </div>
</body>
</html>