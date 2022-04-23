<?php
include '../../connection/regist.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/ico-fonart/favicon.ico?1643016642">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/style-Enz.css"> 
</head>

<body>

<?php
include '../../connection/mens.php';
?>

  <header class="encabezado">
    <div class="logo">
      <a class="link-enz" href="https://www.gob.mx/fonart" target="_black">
        <img src="../../assets/logofonart.png" alt=""></a>
    </div>
    <nav class="nav-l">
      <a href="../../index.php" class="nav-link">Inicio</a>
      <a href="https://www.gob.mx/fonart" class="nav-link" target="_black">Sobre nosotros</a>
    </nav>
  </header>


  <div class="formulario-reg">
    <form action="" method="post">
      <h3>Crear cuenta</h3>
      <input type="text" name="name" required placeholder="Ingrese nombre" class="box">
      <input type="text" name="lastName" required placeholder="Ingrese su apellido" class="box">
      <input type="email" name="email" required placeholder="Ingrese su correo"class="box">
      <input type="password" name="password" required placeholder="Ingrese su contraseña" class="box">
      <input type="password" name="cpassword" required placeholder="Ingrese su contraseña" class="box">
      <input type="submit" name="submit" class="btn" value="Crear cuenta">
      <p>¿Ya tienes una cuenta?  <a href="login.php">Iniciar sesión</a></p>
    </form>
  </div>
</body>

</html>