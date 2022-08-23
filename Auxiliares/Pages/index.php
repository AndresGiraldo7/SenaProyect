<?php

require_once('../../Usuarios/Modelo/Usuarios.php');
require_once('../Modelo/Auxiliares.php');

$ModeloUsuarios = new Usuarios();
$ModeloAuxiliares = new Auxiliares();

$ModeloUsuarios->validateSessionAdministrator();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos.css" type="text/css" />
    <title>Control De Vencidos</title>
</head>
<body>
<?php
 if ($ModeloUsuarios->getPerfil() == 'Administrador') {
     ?>

    <br><h1>
        <a href="../../Administradores/Pages/index.php">Administradores</a> -
        <a href="#">Auxiliares</a> - 
        <a href="../../Productos/Pages/index.php">Productos</a> -
        <a href="../../Usuarios/Controladores/Salir.php">Salir</a> 
    </h1>
    <?php
 }else{
     ?>
     <a href="../../Productos/Pages/index.php">Productos</a> - 
     <a href="../../Usuarios/Controladores/Salir.php">Salir</a> 

     <?php
 }
    ?>
    <div class="contenedorAdm">
    <h2>Sistema De Alertas Tipo Semaforo</h2>
    <br><h3>Bienvenida/o: <?php echo $ModeloUsuarios->getNombre(); ?> - <?php echo $ModeloUsuarios->getPerfil(); ?></h3><br><br>
    <div class="centrar">
    <button class="button button3" target="_blank" onclick="location.href='add.php'" >Registrar Auxiliar</button><br><br>
    </div>  
    <br><br><table id="customers">
    <thead >
    <tr>
            <th><p>Id</p></th>
            <th><p>Nombre</p></th>
            <th><p>Apellido</p></th>
            <th><p>Documento</p></th>
            <th><p>Usuario</p></th>
            <th><p>Password</p></th>
            <th><p>Correo</p></th>
            <th><p>Seccion</p></th>
            <th><p>Fecha de Registro</p></th>
            <th><p>Estado</p></th>
            <th><p>Acciones</p></th>
        </tr>
    </thead>
    <?php
    $Auxiliares = $ModeloAuxiliares->get();
    if($Auxiliares != null){
        foreach ($Auxiliares as $Auxiliar) {
            ?>      
        <tr>
            <td><p><?php echo $Auxiliar['ID_USUARIO'] ?></p></td>
            <td><p><?php echo $Auxiliar['NOMBRE'] ?></p></td>
            <td><p><?php echo $Auxiliar['APELLIDO'] ?></p></td>
            <td><p><?php echo $Auxiliar['DOCUMENTO'] ?></p></td>
            <td><p><?php echo $Auxiliar['USUARIO'] ?></p></td>
            <td><p><?php echo $Auxiliar['PASSWORD'] ?></p></td>
            <td><p><?php echo $Auxiliar['CORREO'] ?></p></td>
            <td><p><?php echo $Auxiliar['SECCION'] ?></p></td>
            <td><p><?php echo $Auxiliar['FECHA_REGISTRO'] ?></p></td>
            <td><p><?php echo $Auxiliar['ESTADO'] ?></p></td>
            <td>
            <p><a href="edit.php?Id=<?php echo $Auxiliar['ID_USUARIO'] ?>"target="_blank">Editar</a></p>
            <p><a href="delete.php?Id=<?php echo $Auxiliar['ID_USUARIO'] ?>"target="_blank">Eliminar</a></p>
        </td>
        </tr>   
       <?php
        }
    }
       ?>
    </table>
</div>
<footer>
<div class="container">
      <div>
      <br><br><br><br><br><br><br><br><br><br> 
      Designed by <a href="https://andresggdeveloper.herokuapp.com/">Andrés Giraldo | Developer</a>
      </div>
    </div> 
</footer>
</body>
</html>