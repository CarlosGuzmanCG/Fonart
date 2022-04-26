<?php
include 'conf.php';
session_start();

if(isset($_POST['submit'])){

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
  
  $select = mysqli_query($conn, "SELECT * FROM `usuario` WHERE email_usua = '$email' AND password_usua = '$pass'") or die('consulta fallada');

  if(mysqli_num_rows($select) > 0){
    $row = mysqli_fetch_array($select);
    $puesto['usuario_rol'] = $row['rol_id'];

    $_SESSION['usua_id'] = $row['id_usua'];
    /*
    while($row = mysqli_fetch_array($select)){
      $mensaje[] = 'el correo es ' . $row['email_usua'];
    }*/
    if($puesto['usuario_rol']==1){
      header('location:prueba3.html');
    }else if($puesto['usuario_rol']==2){
      header('location:../../page/long_rec/test.php');
    }else if($puesto['usuario_rol']==3){
    header('location:../../page/long_rec/major.php');
    }
  }else{
    $mensaje[] = 'Contraseña o Usuario incorrecto';
  }
  
};
?>