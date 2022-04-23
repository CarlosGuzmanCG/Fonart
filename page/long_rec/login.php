<?php
include '../../connection/log_in.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/style-Enz.css">
  <link rel="stylesheet" href="../../css/style.css">
  
  <title>FONART Iniciar sesión</title>
</head>

<body>

<?php
include '../../connection/mens.php';
?>
  
 <header class="encabezado">
    <div class="logo">
      <a class="link-enz" href="https://www.gob.mx/fonart" target="_black">
        <img src="../../assets/logofonart.png" alt="" ></a>
    </div>
    <nav class="nav-l">
      <a href="../../index" class="nav-link">Inicio</a>
    </nav>
  </header>

  <div class="formulario-reg">
    <form action="" method="post">
      <h3>¡Hola! Ingresa tu e‑mail</h3>
      <input type="email" name="email" placeholder="Ingrese su correo" class="box">
      <input type="password" name="password" placeholder="Ingrese su contraseña" class="box">
      <input type="submit" name="submit" class="btn" value="Continuar">

      <p>¿Eres nuevo en FONART?</p>
      <a href="record.php"><input type="button" class="btnCreaton" value="Crear tu cuenta de FONART"></a>
    </form>

  </div>

</body>

</html>