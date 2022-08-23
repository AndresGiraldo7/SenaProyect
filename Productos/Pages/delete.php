<?php
require_once('../../Usuarios/Modelo/Usuarios.php');

$ModeloUsuarios= new Usuarios();
$ModeloUsuarios->validateSession();

$Id = $_GET['Id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos.css" type="text/css"/>
    <title>Control de Vencidos</title>
</head>
<body>
<br><h1>Sistema De Alertas Tipo Semaforo</h1>
    <br><h2>Eliminar Producto<h2>
    <form method="POST" action="../Controladores/delete.php">
        <input type="hidden" name="Id" value="<?php echo $Id ?>">
        <br><h6>¿Estas seguro que deseas eliminar este Producto?</h6>
        <br><button class="button button3" type="submit" value="Eliminar Producto">Eliminar Producto</button>
    </form>
</body>
</html>