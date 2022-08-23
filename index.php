<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css" type="text/css"/>
    <title>Control De Vencidos</title>
</head>
<body>
    <br><br>
    <h1>Bienvenida/o - Sistema Para El Control Vencidos</h1><br><br><br>
    <center>
    <img src="Imagenes/Jumbo.jpg"  height="250px" width="600px">
    </center>
    <h2 >INICIO DE SESION</h2><br><br>
    <div class="contenedor center-h center-v">
        <form method="POST" class="login" action ="Usuarios/Controladores/Login.php">
            <h3 class="h3login">Usuario</h3><br>
            <input  type="text" name="Usuario" required="requerido" autocomplete="off" placeholder="Ingrese Usuario"><br>
            <h3 class="h3login">Contraseña</h3>
            <br><input type="text" name="Contrasena" required="requerido" autocomplete="off" placeholder="Ingrese Contraseña"><br><br><br>
            <button class="button button1" type="submit" value="Iniciar Sesion">Iniciar Sesion</button>
        </form>
    </div>
</body>

<style>
</style>
</html>