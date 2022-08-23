<?php
require_once('../../Usuarios/Modelo/Usuarios.php');
require_once('../Modelo/Productos.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

$Modelo= new Productos();
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
    if ($ModeloUsuarios->getPerfil() == 'Auxiliar') {
        ?>
    <br><h1>
        <a href="#">Productos</a> - 
        <a href="../../Usuarios/Controladores/Salir.php">Salir</a> 
    </h1>
    <?php
    }else{
        ?>
        <br><h1>
        <a href="../../Administradores/Pages/index.php">Administradores</a> -
        <a href="../../Auxiliares/Pages/index.php">Auxiliares</a> -
        <a href="#">Productos</a> - 
        <a href="../../Usuarios/Controladores/Salir.php">Salir</a> 
        </h1>
        <?php
    }
    ?>
    <div class="contenedorAdm">
    <div class="centrar">
    <h2><img src="../../Imagenes/semaforo.jpg">&nbsp; &nbsp; Sistema De Alertas Tipo Semaforo &nbsp; &nbsp; <img src="../../Imagenes/semaforo.jpg"></h2>
    <br><h3>Bienvenida/o: <?php echo $ModeloUsuarios->getNombre(); ?> - <?php echo $ModeloUsuarios->getPerfil(); ?></h3><br>
   
    <button id="open">Ver Alertas </button>      
    <div id="1modal_container" class="modal-container">
        <div class="modal">
            <h1><img src="../../Imagenes/semaforo.jpg">&nbsp; &nbsp;Alertas Tipo Semaforo</h1><br>
            <ol type=1>
            <li class="alertaRoja"> Alerta ROJA: Marca los productos que tengan una fecha de vencimiento menor o igual a 8 días.</li><br>
            <li class="alertaAmarilla"> Alerta AMARILLA: Marca los productos que su fecha de vencimiento este entre los proximos 9 a 19 días.</li><br>
            <li class="alertaVerde"> Alerta VERDE: Marca los productos que su fecha de vencimiento este entre los proximos 20 a 30 días.</li><br>
            </ol>
            <button id="close">Cerrar</button>
        </div>
    </div><br>
    <br><button class="button button3" target="_blank" onclick="location.href='add.php'" >Registrar Producto</button><br><br>
    </div>
    <form method="POST" action="../../Mermas/Controladores/add.php">
    <br><br><table id="customers">
        <thead>
        <tr>
            <th><p>Id</p></th>
            <th><p class="alertaVerde">Alerta VERDE <br><i class="iconify icono" data-icon="noto:vertical-traffic-light"></i><script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script></p></th>
            <th><p class="alertaAmarilla">Alerta AMARILLA<br><i class="iconify icono" data-icon="noto:vertical-traffic-light"></i><script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script></p></th>
            <th><p class="alertaRoja">Alerta ROJA<br><i class="iconify icono" data-icon="noto:vertical-traffic-light"></i><script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script></p></th>
            <th><p>Nombre de Producto</p></th>
            <th><p>Proveedor</p></th>
            <th><p>Fecha de Ingreso</p></th>
            <th><p>Fecha de Vencimiento</p></th>
            <th><p>Cantidad</p></th>
            <th><p>Acciones</p></th>
        </tr>
        </thead>
        <?php
        $Productos= $Modelo->get();
        if($Productos != null){
            foreach ($Productos as $Producto) {
        ?>
        <tr>
            <p><td><?php echo $Producto['ID_PRODUCTO']?></td></p>
            <td><label class="inputGreen">
            <input  type ="checkbox" name = "alerta[]" value="alertRoja" >
            <span></span>
            </label></td>
            <td><label class ="inputYellow">
            <input type ="checkbox" name = "alerta[]"value= "alertAmarilla" >
            <span></span>
            </label></td> 
            <td><label class ="inputRed">
            <input type ="checkbox" name = "alerta[]"  value = "alertaVerde" >
            <span></span>
            </label></td>
            <td><p><?php echo $Producto['NOMBRE']?></p></td>
            <td><p><?php echo $Producto['PROVEEDOR']?></p></td>
            <td><p><?php echo $Producto['FECHA_INGRESO']?></p></td>
            <td><p><?php echo $Producto['FECHA_VENCIMIENTO']?></p></td>
            <td><p><?php echo $Producto['CANTIDAD']?></p></td>
            <td>
            <p><a href="delete.php?Id=<?php echo $Producto['ID_PRODUCTO']?>" target="_blank">Eliminar</a></p>
            <p><a href="edit.php?Id=<?php echo $Producto['ID_PRODUCTO']?>" target="_blank">Editar</a></p>
            </td>
            <!---<td><input name="insertar" type="submit" value="Enviar a merma"></td>-->
        </tr>
        <?php
            }
        }
        ?>
    </table>
    </form>
    </div>
</body>
<footer>
<div class="container">
      <div>
       <br><br> Designed by <a href="https://andresggdeveloper.herokuapp.com/">Andrés Giraldo | Developer</a>
      </div>
    </div> 
</footer>
</html>
<script>
const open = document.getElementById('open');
const modal_container = document.getElementById('1modal_container','2modal_container');
const close = document.getElementById('close');

document.addEventListener('click', e => {  
  if (e.target == document.querySelector('.modal-container.show')) {
    modal_container.classList.remove('show');
  }
});

document.addEventListener('keyup', e => {
  if (e.key == 'Escape' && document.querySelector('.modal-container.show')) {
    modal_container.classList.remove('show');
  }
});

open.addEventListener('click', () => {
  modal_container.classList.add('show');  
});

close.addEventListener('click', () => {
  modal_container.classList.remove('show');
});
    </script>