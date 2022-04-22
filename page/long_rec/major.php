<?php

include '../../connection/conf.php';

session_start();

$user_id = $_SESSION['usua_id'];

//echo "<script>console.log('id_us: ' ".$user_id.");</script>";
if(!isset($user_id)){
  header('location:login.php');
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link rel="stylesheet" href="../../css/compts.css">

<style>
.mySlides {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}
</style>
  

  <title>Bienvenido a Fonart</title>

</head>
<body>
  
<?php
include 'head.php';
?>


<!--Prueba -->
  <div class="w3-content w3-display-container" style="max-width:800px">
  <img class="mySlides" src="../../assets/photo-slider/img_nature_wide.jpg" style="width:100%">
  <img class="mySlides" src="../../assets/photo-slider/img_snow_wide.jpg" style="width:100%">
  <img class="mySlides" src="../../assets/photo-slider/img_mountains_wide.jpg" style="width:100%">
  <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
    <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
    <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
  </div>
</div>

<br>

<div class="products">
  <div class="box-container">
    <?php
    $select_products= mysqli_query($conn,"SELECT * FROM `producto`") or die ("busqueda de productos fallada");
    if (mysqli_num_rows($select_products)>0) {
      $total = mysqli_num_rows($select_products);
      while ($fetch_products = mysqli_fetch_assoc($select_products)) {
      ?>
      <form method="post" class="box-prod" action="">
        <img  src="data:image/jpeg;<?php echo $fetch_products['tipo_img_prod']; ?>;base64,<?php echo  base64_encode($fetch_products['imagen_prod']); ?>">
        <div class="name-prod"><?php echo $fetch_products['nombre_prod'];?></div>
        <div class="desc_prod"><?php echo $fetch_products['descripcion_prod'];?></div>
        <div class="price-prod"> <?php echo "$" . $fetch_products['precio_prod'];?></div>
        <input type="number" min="1" name="produc_quantify" value="1">
        <input type="hidden" name="produ_image" value="<?php echo $fetch_products['tipo_img_prod']; ?>">
        <input type="hidden" name="produ_name" value="<?php echo $fetch_products['nombre_prod']; ?>">
        <input type="hidden" name="produ_description" value="<?php echo $fetch_products['descripcion_prod']; ?>">
        <input type="hidden" name="produ_price" value="<?php echo $fetch_products['precio_prod']; ?>">
        <input type="submit" value="Agregar al carrito" name="addd_cart" class="btn-prod">
        </form>
      <?php
      };
    };
?>
  </div>
</div>



<!--Fin de Prueba -->
<script src="../../js/script.js"></script>
<script src="../../js/phot-sli.js"></script>
<br>
<?php
  include 'footer.php';
?>
</body>
</html>
