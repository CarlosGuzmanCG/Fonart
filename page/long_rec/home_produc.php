<?php

include '../../connection/access_major.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/ico-fonart/favicon.ico?1643016642">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="../../css/compts.css">
  <title>Bienvenido a Fonart</title>

</head>
<body>
  
<?php
include 'head.php';
?>



<br><br><br>

<div class="products">
  <div class="box-container">
    <?php
    $select_products= mysqli_query($conn,"SELECT * FROM `producto` WHERE `categoria_id`= '2'") or die ("busqueda de productos fallada");
    if (mysqli_num_rows($select_products)>0) {
      $total = mysqli_num_rows($select_products);
      while ($fetch_products = mysqli_fetch_assoc($select_products)) {
      ?>
      <form method="post" class="box-prod" action="">
        <img  src="data:image/jpeg;<?php echo $fetch_products['tipo_img_prod']; ?>;base64,<?php echo  base64_encode($fetch_products['imagen_prod']); ?>">
        <div class="name-prod"><?php echo $fetch_products['nombre_prod'];?></div>
        <div class="desc_prod"><?php echo $fetch_products['descripcion_prod'];?></div>
        <div class="price-prod"> <?php echo "$" . $fetch_products['precio_prod'];?></div>
        
        
        <input type="hidden" name="produ_image" value="<?php echo $fetch_products['tipo_img_prod']; ?>">
        <input type="hidden" name="produ_name" value="<?php echo $fetch_products['nombre_prod']; ?>">
        <input type="hidden" name="produ_description" value="<?php echo $fetch_products['descripcion_prod']; ?>">
        <input class="prod_qft" type="number" min="1" name="produc_quantify" value="1">
        <input type="hidden" name="produ_price" value="<?php echo $fetch_products['precio_prod']; ?>">
        <input type="submit" value="Agregar al carrito" name="addd_cart" class="btn-prod">
        </form>
      <?php
      };
    };
?>
  </div>
</div>



<script src="../../js/script.js"></script>

<br><br><br>
<?php
  include 'footer.php';
?>
</body>
</html>