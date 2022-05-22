<?php
include 'connection/conf_connection.php';
?>

<header class="header">
  <div>
  <div class="flex">
      <a  href="https://www.gob.mx/fonart" target="_black">
        <img class="logo" src="assets/logofonart.png" alt="" ></a>
        <nav class="navbar">
          <a class="nac" href="index.php">Inicio</a>
          <a class="#" href="home_produc_index.php">Para el hogar</a>
          <a class="#" href="clothing_produc_index.php">Para vestir</a>
        </nav>

        <div class="icons">
          <div id="menu-btn" class="fas fa-bars"></div>
          <div id="user-btn" class="fas fa-user"></div>
        </div>
        <div class="profile">

      <p class="name_custom">Hola, Bienvenido a FONART</p>

      
      <div class="flex-btn">
        <a href="page/long_rec/login_long_rec.php" class="option-btn">Iniciar sesión</a>
        <a href="page/long_rec/record_long_rec.php" class="option-btn">Crear cuenta</a>
      </div>
        </div>
    </div>
</header>