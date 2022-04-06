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