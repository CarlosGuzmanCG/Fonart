<?php

include '../../connection/conf.php';

session_start();

$user_id = $_SESSION['usua_id'];

if(!isset($user_id)){
  header('location:login.php');
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/ico-fonart/favicon.ico?1643016642">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="../../css/compts.css">
  
  <title>Formulario</title>
</head>

<body>

<?php
include 'head.php';
?>


  <div class="form-doubts">

    <form action="https://formsubmit.co/fonarmx@gmail.com" method="POST">
      <h3>¡Hola! Escribe tus dudas o aclaraciones</h3>
    <input type="text" name="name-user" placeholder="Escribe tu nombre" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$"
      title="Nombre sólo acepta letras y espacios en blanco" required class="box-form">
    <br>
    <input type="email" name="email-user" placeholder="Escribe tu correo" pattern="^(\w+[/./-]?){1,}@[a-z]+[/.]\w{2,}$"
      title="Formato de correo inválido" required class="box-form">
    <br>
    <textarea name="commentary-user" cols="30" rows="10" required class="box-form"></textarea>
    <br>
    <input type="submit" class="btn-form">
  </form>
  </div>
  <script src="../../js/script.js"></script>
<?php
  include 'footer.php';
?>
</body>

</html>