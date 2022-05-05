<?php
include '../../connection/access_major.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/ico-fonart/favicon.ico?1643016642">
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/ico-fonart/favicon.ico?1643016642">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="../../css/compts.css">

  <title>Carrito de compras</title>

</head>

<body>

<?php
include 'head.php';
?>

  <section class="wish-list-cart">
    <h1 class="title"> Carrito de compras</h1>
  <div class="products">
    <div class="box-container">
    <?php
    $user_id_cart = $_SESSION['usua_id'];

      $select_products= mysqli_query($conn,"SELECT * FROM `producto` WHERE usua_id_temp='$user_id_cart' AND status_temp=0") or die ("busqueda de productos fallada");
      if (mysqli_num_rows($select_products)>0) {
        $total = mysqli_num_rows($select_products);
        while ($fetch_cart = mysqli_fetch_assoc($select_products)) {
      ?>
        <form method="post" class="box-prod" action="">
          <img  src="data:image/jpeg;<?php echo $fetch_cart['tipo_img_prod']; ?>;base64,<?php echo  base64_encode($fetch_cart['imagen_prod']); ?>">
          <div class="name-prod"><?php echo $fetch_cart['nombre_prod'];?></div>
          <div class="desc_prod"><?php echo $fetch_cart['descripcion_prod'];?></div>
          <div class="price-prod"> <?php echo "$" . $fetch_cart['precio_prod'];?></div>
          <input class="prod_qft" type="number" min="1" name="produc_quantify" value="1">
          <input type="hidden" name="produ_image" value="<?php echo $fetch_cart['tipo_img_prod']; ?>">
          <input type="hidden" name="produ_name" value="<?php echo $fetch_cart['nombre_prod']; ?>">
          <input type="hidden" name="produ_description" value="<?php echo $fetch_cart['descripcion_prod']; ?>">
          <input type="hidden" name="produ_price" value="<?php echo $fetch_cart['precio_prod']; ?>">
          <input type="submit" value="Agregar al carrito" name="addd_cart" class="btn-prod">
          </form>
      <?php
      };
    };
?>
  </div>
</div>
</section>

<?php
  include 'footer.php';
?>
<script src=""></script>

</body>
</html>