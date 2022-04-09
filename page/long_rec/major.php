<?php

include '../../connection/conf.php';
session_start();

$user_id = $_SESSION['usua_id'];

//echo "<script>console.log('id_us: ' ".$user_id.");</script>";
if(!isset($user_id))
  header('location:login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido a Fonart</title>

</head>
<body>
  
<?php
include '../../connection/mens.php';
?>

<div class="container">
  <div class="user-profile">
    <?php
      
      $select_user = mysqli_query($conn,"SELECT*FROM `usuario` WHERE id_usua='$user_id'") or die('connexión fallada ');
      
      if(mysqli_num_rows($select_user) > 0){
        $fetch_user = mysqli_fetch_assoc($select_user);
        
      };

    ?>

  <p>Nombre: <span><?php echo $fetch_user['nombre_usua']; ?></span></p>
  
  </div>
</div>

</body>
</html>