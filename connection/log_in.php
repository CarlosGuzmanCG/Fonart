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