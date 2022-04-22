<?php
include '../../connection/mens.php';
?>


<header class="header">
  <div>
  <div class="flex">
      <a  href="https://www.gob.mx/fonart" target="_black">
        <img class="logo" src="../../assets/logofonart.png" alt="" ></a>
        <nav class="navbar">
          <a class="nac" href="#">Inicio</a>
          <a class="#" href="#">Productos</a>
          <a class="#" href="#">Orden</a>
        </nav>

        <div class="icons">
          <div id="menu-btn" class="fas fa-bars"></div>
          <div id="user-btn" class="fas fa-user"></div>
        </div>
        <div class="profile">
          <?php
      
      $select_user = mysqli_query($conn,"SELECT*FROM `usuario` WHERE id_usua='$user_id'") or die('connexión fallada ');
      
      if(mysqli_num_rows($select_user) > 0){
        $fetch_user = mysqli_fetch_assoc($select_user);
      };

    ?>

      <p class="name_customer"><?= $fetch_user['nombre_usua'] . " " . $fetch_user['apellido_usua']; ?></p>

      
      <div class="flex-btn">
        <a href="user_prof.php" class="option-btn">Actualizar perfil</a>
        <a href="../../connection/logout.php" class="option-btn">cerrar sesión</a>
      </div>
        </div>
    </div>
</header>