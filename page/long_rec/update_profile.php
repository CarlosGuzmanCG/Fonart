<?php
include '../../connection/access-major.php';

if (isset($_POST['upd_profile'])) {

  $name_user = mysqli_real_escape_string($conn, $_POST['name_user']);
  $surname = mysqli_real_escape_string($conn, $_POST['surname']);
  $street = mysqli_real_escape_string($conn, $_POST['street']);
  $suburb = mysqli_real_escape_string($conn, $_POST['suburb']);

  $condition = mysqli_real_escape_string($conn, $_POST['condition']);
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  $cod_post = mysqli_real_escape_string($conn, $_POST['cod_post']);
  $num_street = mysqli_real_escape_string($conn, $_POST['num_street']);
  $num_tel1 = mysqli_real_escape_string($conn, $_POST['num_tel1']);
  $num_tel2 = mysqli_real_escape_string($conn, $_POST['num_tel2']);
  $desc_user = mysqli_real_escape_string($conn, $_POST['desc_user']);

  if($name_user!=null & $surname!=null){
  $prof_upd=$_SESSION['usua_id'];

  $update_profi =  mysqli_query($conn, "UPDATE `usuario` SET nombre_usua='$name_user',apellido_usua='$surname',calle_usua='$street',colonia_usua='$suburb',estado_usua='$condition',ciudad_usua='$city',codPos_usua='$cod_post',numeroCalle_usua='$num_street',numeroTel_usua='$num_tel1',numeroTel2_usua='$num_tel2',descripcion_usua='$desc_user' WHERE id_usua = '$prof_upd'") or die('consulta fallada 1');
  }
  
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar perfil</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  
  <link rel="stylesheet" href="../../css/compts.css">
</head>

<body>

<?php
include 'head.php';
?>

<section class="upd-prof">
  <h1 class="tilte">Actualizar perfil</h1>

  <form action="" method="POST" enctype="multipart/form-data">
    <div>
      <div>
        
        <div class="inp-box">
          <span>Nombre:</span>
          <input type="text" name="name_user" value="<?php echo $fetch_user['nombre_usua'] ?>" placeholder="Nombre" require class="box-update">
        
          <span>Apellido:</span>
          <input type="text" name="surname" value="<?php echo $fetch_user['apellido_usua']; ?>" placeholder="Apellido" require class="box-update">
        
          <span>Email:</span>
          <input type="email" name="email_usua" value="<?php echo $fetch_user['email_usua']; ?>" placeholder="Email" require class="box-update">
        </div>
        
        <div class="inp-box">
          <span>Calle:</span>
         <input type="text" name="street" value="<?php echo $fetch_user['calle_usua']; ?>" placeholder="Calle" require class="box-update">

          <span>Colonia:</span>
          <input type="text" name="suburb" value="<?php echo $fetch_user['colonia_usua']; ?>" placeholder="Colonia" require class="box-update">

          <span>Estado:</span>
          <input type="text" name="condition" value="<?php echo $fetch_user['estado_usua']; ?>"         placeholder="Estado" require class="box-update">
        </div>

        <div class="inp-box">
          <span>Ciudad:</span>
          <input type="text" name="city" value="<?php echo $fetch_user['ciudad_usua']; ?>" placeholder="Ciudad" require class="box-update">

          <span>Código postal:</span>
          <input type="text" name="cod_post" value="<?php echo $fetch_user['codPos_usua']; ?>" placeholder="C.P" require class="box-update">

          <span>Número de calle:</span>
          <input type="text" name="num_street" value="<?php echo $fetch_user['numeroCalle_usua']; ?>" placeholder="No. Calle" require class="box-update">
        </div>

        <div class="inp-box">
          <span>Número de telefono 1:</span>
          <input type="text" name="num_tel1" value="<?php echo $fetch_user['numeroTel_usua']; ?>" placeholder="Télefono 1" require class="box-update">

          <span>Número de telefono 2:</span>
          <input type="text" name="num_tel2" value="<?php echo $fetch_user['numeroTel2_usua']; ?>" placeholder="Télefono 2" require class="box-update">

          <span>Descripción:</span>
          <input type="text" name="desc_user" value="<?php echo  $fetch_user['descripcion_usua'];?>" placeholder="Descripción" require class="box-update">
        </div>

        

      </div>
    </div>

  <div class="flex-btn">
    <input type="submit" class="btn" value="Actualizar" name="upd_profile">
  </div>

  </form>

</section>

<script src="../../js/script.js"></script>
<?php
  include 'footer.php';
?>
</body>
</html>