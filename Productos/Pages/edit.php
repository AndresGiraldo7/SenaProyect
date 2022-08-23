<?php
require_once('../../Usuarios/Modelo/Usuarios.php');
require_once('../Modelo/Productos.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

$Modelo = new Productos();

$Id = $_GET['Id'];
$InformacionProducto = $Modelo->getById($Id);
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
        <div class="centrar">
        <h1 > Sistema De Alertas Tipo Semaforo</h1>
    <br><h2 >Editar Productos</h2><br>
    <form method="POST" action="../Controladores/edit.php">
        <input type="hidden" name="Id" value="<?php echo $Id; ?>">
        <?php
        if($InformacionProducto != null){
            foreach ($InformacionProducto as $Info){
        ?>
        <p>Nombre</p>
        <input type="text" name="Nombre" required="required" autocomplete="off" placeholder="Nombre Producto" value="<?php echo $Info['NOMBRE']?>"> <br><br>
        <p>Proveedor</p>
        <input type="text" name="Proveedor" required="required" autocomplete="off" placeholder="Nombre Proveedor" value="<?php echo $Info['PROVEEDOR']?>"><br><br>
        <p>Fecha de Ingreso</p>
        <input type="date" name="FechaIng" required="required" autocomplete="off" placeholder="Fecha de Ingreso" value="<?php echo $Info['FECHA_INGRESO']?>"><br><br>
        <p>Fecha de Vencimiento</p>
        <input type="date" name="FechaVen" required="required" autocomplete="off" placeholder="Fecha de vencimiento" value="<?php echo $Info['FECHA_VENCIMIENTO']?>"><br><br>
        <p>Cantidad</p>
        <input type="text" name="Cantidad" required="required" autocomplete="off" placeholder="Cantidad" value="<?php echo $Info['CANTIDAD']?>"><br><br>
        <?php
            }
        }
        ?>
        <br><button class="button button3" type="submit" value="Editar Producto">Editar Producto</button>
    </form>
    </div>
    </div>
</body>
</html>