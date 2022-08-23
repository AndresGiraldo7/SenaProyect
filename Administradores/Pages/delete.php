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
    <link rel="stylesheet" href="../../estilos.css" type="text/css" />
    <title>Control de Vencidos</title>
</head>
<body>
    <br><h1>Eliminar Administrador<h1>
    <form method="POST" action="../Controladores/delete.php">
        <input type="hidden" name="Id" value="<?php echo $Id ?>">
        <br><h5>¿Estas seguro que deseas eliminar este Administrador?</h5>
        <br><button class="button button3" type="submit" value="Eliminar Administrador">Eliminar Administrador</button>
    </form>

</body>
</html>