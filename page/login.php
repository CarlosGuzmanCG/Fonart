<?php
include 'conf.php';
if(isset($_POST['submit'])){

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
  
  $select = mysqli_query($conn, "SELECT * FROM `usuario` WHERE email_usua = '$email' AND password_usua = '$pass'") or die('consulta fallada');

  if(mysqli_num_rows($select) > 0){
    $row = mysqli_fetch_array($select);
    $row2 = mysqli_fetch_assoc($select);
    $puesto['usuario_rol'] = $row['rol_id'];

    /*
    while($row = mysqli_fetch_array($select)){
      $mensaje[] = 'el correo es ' . $row['email_usua'];
    }*/
    if($puesto['usuario_rol']==1){
      header('location:prueba3.html');
    }else if($puesto['usuario_rol']==2){
      header('location:prueba3.html');
    }else if($puesto['usuario_rol']==3){
      header('location:prueba3.html');
    }
  }else{
    $mensaje[] = 'Contraseña o Usuario incorrecto';
  }
  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-Enz.css">
  <link rel="stylesheet" href="../css/style.css">
  
  <title>FONART Iniciar sesión</title>
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
        <img src="../assets/logofonart.png" alt="" ></a>
    </div>
    <nav class="nav-l">
      <a href="" class="nav-link">Inicio</a>
    </nav>
  </header>

  <div class="formulario-reg">
    <form action="" method="post">
      <h3>¡Hola! Ingresa tu e‑mail</h3>
      <input type="email" name="email" placeholder="Ingrese su correo" class="box">
      <input type="password" name="password" placeholder="Ingrese su contraseña" class="box">
      <input type="submit" name="submit" class="btn" value="Continuar">

      <p>¿Eres nuevo en FONART?</p>
      <a href="registro.php"><input type="button" class="btnCreaton" value="Crear tu cuenta de FONART"></a>
    </form>

  </div>

</body>

</html>