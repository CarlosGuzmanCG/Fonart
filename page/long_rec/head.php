<?php
include '../../connection/mens.php';
?>


<header class="header">
  <div>
  <div class="flex">
      <a  href="https://www.gob.mx/fonart" target="_black">
        <img class="logo" src="../../assets/logofonart.png" alt="" ></a>
        <nav class="navbar">
          <a class="nac" href="major.php">Inicio</a>
          <a class="#" href="home_produc.php">Para el hogar</a>
          <a class="#" href="clothing_produc.php">Para vestir</a>
        </nav>

        <div class="icons">
          <div id="menu-btn" class="fas fa-bars"></div>
          <div id="user-btn" class="fas fa-user"></div>
          <?php
          
          ?>
        </div>

        <div class="profile">
          <?php
      
      $select_user = mysqli_query($conn,"SELECT*FROM `usuario` WHERE id_usua='$user_id'") or die('connexión fallada ');
      
      if(mysqli_num_rows($select_user) > 0){
        $fetch_user = mysqli_fetch_assoc($select_user);
      };

    ?>

      <p class="name_custom"><?php echo $fetch_user['nombre_usua'] . " " . $fetch_user['apellido_usua']; ?></p>

      
      <div class="flex-btn">
        <a href="update_profile.php" class="option-btn">Actualizar perfil</a>
        <a href="../../connection/logout.php" class="option-btn">cerrar sesión</a>
      </div>
        </div>
    </div>
</header>