<?php

require_once ('../../Usuarios/Modelo/Usuarios.php');
require_once ('../Modelo/Administradores.php');

$ModeloUsuarios = new Usuarios();
$ModeloAdministradores = new Administradores();

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
    <br><h1>
        <a href="#" >Administradores</a> - 
        <a href="../../Auxiliares/Pages/index.php">Auxiliares</a> -
        <a href="../../Productos/Pages/index.php">Productos</a> -
        <a href="../../Usuarios/Controladores/Salir.php">Salir</a> 
    </h1>
    <div class="contenedorAdm">
    <h2>Sistema De Alertas Tipo Semaforo</h2>
    <br><h3>Bienvenida/o: <?php echo $ModeloUsuarios->getNombre(); ?> - <?php echo $ModeloUsuarios->getPerfil(); ?></h3><br><br>
    <!--<a href="add.php"  class="button" target="_blank">Registrar Administrador</a>-->
    <div class="centrar">
    <button class="button button3" target="_blank" onclick="location.href='add.php'" >Registrar Administrador</button>
    </div>
    <br><br><br>
    <table id="customers">
        <thead>
            <tr>
            <th><p>Id</p></th>
            <th><p>Nombre</p></th>
            <th><p>Apellido</p></th>
            <th><p>Perfil</p></th>
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
        $Administradores = $ModeloAdministradores->get();
        if($Administradores != null){
            foreach ($Administradores as $Administrador) {
                ?>
        <tr>
            <td><p><?php echo $Administrador['ID_USUARIO'] ?></p></td>
            <td><p><?php echo $Administrador['NOMBRE'] ?></p></td>
            <td><p><?php echo $Administrador['APELLIDO'] ?></p></td>
            <td><p><?php echo $Administrador['PERFIL'] ?></p></td>
            <td><p><?php echo $Administrador['DOCUMENTO'] ?></p></td>
            <td><p><?php echo $Administrador['USUARIO'] ?></p></td>
            <td><p><?php echo $Administrador['PASSWORD'] ?></p></td>
            <td><p><?php echo $Administrador['CORREO'] ?></p></td>
            <td><p><?php echo $Administrador['SECCION'] ?></p></td>
            <td><p><?php echo $Administrador['FECHA_REGISTRO'] ?></p></td>
            <td><p><?php echo $Administrador['ESTADO'] ?></p></td>
            <td>
            <p><a href="edit.php?Id=<?php echo $Administrador['ID_USUARIO'] ?>" target="_blank">Editar</a></p> 
            <p><a href="delete.php?Id=<?php echo $Administrador['ID_USUARIO'] ?>" target="_blank">Eliminar</a></p>
            </td>
        </tr>
        <?php
            }
        }
        ?>

    </table>
    </div>
</body>
<footer>
<div class="container">
      <div>
      <br><br><br><br><br><br><br><br><br><br> 
      Designed by <a href="https://andresggdeveloper.herokuapp.com/">Andrés Giraldo | Developer</a>
      </div>
    </div> 
</footer>
</html>