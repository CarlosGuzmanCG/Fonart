<?php

include 'conf.php';

session_start();

$user_id = $_SESSION['usua_id'];

//echo "<script>console.log('id_us: ' ".$user_id.");</script>";

$select_comp_user= mysqli_query($conn,"SELECT*FROM `usuario` WHERE id_usua='$user_id'") or die ("busqueda de productos fallada");

$row = mysqli_fetch_array($select_comp_user);
$puesto['usuar_rol'] = $row['rol_id'];

//echo "soy el usuario: " . $user_id . " con el rol: " . $puesto['usuar_rol'];

if(!isset($user_id) || !isset($puesto['usuar_rol'])!=3){
$puesto_rol= $puesto['usuar_rol'];

  switch ($puesto_rol) {
    case '1':
      header('location:prueba3.php');
      break;
    case '2':
        header('location:../../page/long_rec/test.php');
      break;
  }

};
?>