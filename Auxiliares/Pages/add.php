<?php
require_once('../../Usuarios/Modelo/Usuarios.php');
require_once('../../Metodos.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

$ModeloMetodos = new Metodos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos.css" type="text/css"/>
    <title>Sistema de Vencidos</title>
</head>
<body>
    <div class="contenedor">
    <h2>Sistema De Alertas Tipo Semaforo</h2>
    <br><h1>Registrar Auxiliar</h1><br>
    <div class="centrar">
    <form method="POST" action="../Controladores/add.php">
    <br><p>Nombre</p><br>
    <input type="text" name="Nombre" required="required" autocomplete="off" placeholder="Nombre"><br><br>
    <p>pellido</p><br>
    <input type="text" name="Apellido" required="required" autocomplete="off" placeholder="Apellido"><br><br>   
    <p>Documento</p><br>
    <input type="number" name="Documento" required="required" autocomplete="off" placeholder="Documento"><br><br>
    <p>Usuario</p><br>
    <input type="text" name="Usuario" required="required" autocomplete="off" placeholder="Usuario"><br><br>
    <p>Password</p><br>
    <input type="password" name="Password" required="required" autocomplete="off" placeholder="Contraseña"><br><br> 
    <p>Correo</p><br>
    <input type="email" name="Correo" required="required" autocomplete="off" placeholder="Email"><br><br>
    
    <p>Secciones</p><br>
    <select name="Seccion" required="required" ><br><br>  
        <option>Seleccione</option>
        <?php
        $Secciones = $ModeloMetodos->getSecciones();
        if($Secciones!= null){
            foreach($Secciones as $Seccion){
            ?>
            <option value= "<?php echo $Seccion['SECCION']; ?>"> <?php echo $Seccion['SECCION']; ?> 
            </option>
            <?php
            }
        }
        ?>
    </select><br><br>

    <p>Estado</p><br>
    <select name="Estado" required="" >
    <option>Seleccione</option>
        <?php
        $Estados =$ModeloMetodos->getEstados();
        if($Estados != null){
        foreach($Estados as $Estado){
        ?>
        <option value="<?php echo $Estado['ESTADO']?>"><?php echo $Estado['ESTADO']; ?></option>
        <?php
            }
        }
        ?> 
    </select><br><br>
    <br><button class="button button3" type="submit" value="Registrar auxiliar">Registrar Auxiliar</button>
</form>
</body>
</html>