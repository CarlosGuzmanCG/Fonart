<?php
include 'conf.php';
if(isset($_POST['submit'])){
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
  $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
  $rol = 3;

  if($pass==$cpass){
  
  $select = mysqli_query($conn, "SELECT * FROM `usuario` WHERE email_usua = '$email' AND password_usua='$pass'") or die('consulta fallada 1');
  if(mysqli_num_rows($select) > 0){
    $mensaje[] = 'Usuario existente';
  }else{
    mysqli_query($conn, "INSERT INTO `usuario` (nombre_usua,apellido_usua,email_usua,password_usua,rol_id) VALUES ('$name','$lastName','$email','$pass','$rol')") or die ('consulta fallada 2');
    $mensaje[] = 'registro exitoso!';
    header('location:login.php');
  }
  }else{
    $mensaje[] = 'Contraseñas diferentes, verificar!';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/style-Enz.css"> 
</head>

<body>

<?php
if(isset($mensaje)){
  foreach ($mensaje as $mensaje) {
    echo '<div class="$mensaje" onclick="this.remove();">'.$mensaje.'</div>';
  }
}
?>

  <header class="encabezado">
    <div class="logo">
      <a class="link-enz" href="https://www.gob.mx/fonart" target="_black">
        <img src="../assets/logofonart.png" alt=""></a>
    </div>
    <nav class="nav-l">
      <a href="" class="nav-link">Inicio</a>
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