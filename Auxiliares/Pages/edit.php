<?php
require_once('../../Usuarios/Modelo/Usuarios.php');
require_once('../Modelo/Auxiliares.php');
require_once('../../Metodos.php');

$ModeloUsuarios = new Usuarios();
$ModeloUsuarios->validateSession();

$Modelo = new Auxiliares();
$Id = $_GET['Id'];
$InfoAux = $Modelo->getById($Id);

$ModeloMetodos = new Metodos();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos.css" type="text/css" />
    <title>Sistema de Vencidos</title>
</head>

<body>
    <div class="contenedor">
        <br>
        <h1>Editar Auxiliar</h1><br>
        <div class="centrar">
            <form method="POST" action="../Controladores/edit.php">
                <input type="hidden" name="Id" value="<?php echo $Id; ?>">
                <?php
                if ($InfoAux != null) {
                    foreach ($InfoAux as $Info) {

                ?>
                        <p>Nombre</p>
                        <input type="text" name="Nombre" required="required" autocomplete="off" placeholder="Nombre" value="<?php echo $Info['NOMBRE']; ?>"><br><br>
                        <p>Apellido</p>
                        <input type="text" name="Apellido" required="required" autocomplete="off" placeholder="Apellido" value="<?php echo $Info['APELLIDO']; ?>"><br><br>
                        <p>Documento</p>
                        <input type="number" name="Documento" required="required" autocomplete="off" placeholder="Documento" value="<?php echo $Info['DOCUMENTO']; ?>"><br><br>
                        <p>Usuario</p>
                        <input type="text" name="Usuario" required="required" autocomplete="off" placeholder="Usuario" value="<?php echo $Info['USUARIO']; ?>"><br><br>
                        <p>Contraseña</p>
                        <input type="password" name="Password" required="required" autocomplete="off" placeholder="Contraseña" value="<?php echo $Info['PASSWORD']; ?>"><br><br>
                        <p>Correo</p>
                        <input type="email" name="Correo" required="required" autocomplete="off" placeholder="Email" value="<?php echo $Info['CORREO']; ?>"><br><br>
                        <p>Seccion</p>
                        <select name="Seccion" required="required"><br><br>
                            <option value="<?php echo $Info['SECCION']; ?>"><?php echo $Info['SECCION']; ?></option>
                            <?php
                            $Secciones = $ModeloMetodos->getSecciones();
                            if ($Secciones != null) {
                                foreach ($Secciones as $Seccion) {
                            ?>
                                    <option value="<?php echo $Seccion['SECCION'] ?>"><?php echo $Seccion['SECCION'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select><br><br>
                        <p>Estado</p>
                        <select name="Estado" required="">
                            <p>
                                <option value="<?php echo $Info['ESTADO']; ?>"><?php echo $Info['ESTADO']; ?></option>
                            <p>
                                <?php
                                $Estados = $ModeloMetodos->getEstados();
                                if ($Estados != null) {
                                    foreach ($Estados as $Estado) {
                                ?>
                            <p>
                                <option value="<?php echo $Estado['ESTADO'] ?>"><?php echo $Estado['ESTADO']; ?></option>
                            </p>

                    <?php
                                    }
                                }
                    ?>
                        </select><br><br>
                <?php
                    }
                }
                ?>
                <br><button class="button button3" type="submit" value="Editar auxiliar">Editar Auxiliar</button>
            </form>
        </div>
    </div>
</body>

</html>