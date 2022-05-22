<?php
include '../../connection/access_major.php';

if(isset($_POST['add_cart_prod'])){
  $id_prod = $_POST['id_prod'];
  $id_usu_cart=$_SESSION['usua_id'];
  $prod_qft = $_POST['produc_quantify'];
  $sta_pro=0;
  $insert_cart = mysqli_query($conn, "INSERT INTO `detalle_temp` (producto_id,usua_id_temp,cantidad_temp,status_temp) values('$id_prod','$id_usu_cart','$prod_qft','$sta_pro')") or die('consulta fallada 1');
  $mensaje[] = 'Producto agregado!';
};

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  
  <link rel="stylesheet" href="../../css/compts.css">

  <link rel="shortcut icon" type="image/x-icon" href="../../assets/ico-fonart/favicon.ico?1643016642">

  <title>Producto</title>

</head>

<body>

<?php
include 'head.php';
?>

  <div class="grid-container-prod">

    <div class="grit-imen-prod item1-prod img-container-prod product-small-img-prod">
    <?php
    $produc_cart=$_SESSION['prod_bill'];
    $select_products_sc= mysqli_query($conn,"SELECT * FROM `producto` WHERE id_prod='$produc_cart'") or die ("busqueda de productos fallada");

    
    if (mysqli_num_rows($select_products_sc)>0) {
      $total = mysqli_num_rows($select_products_sc);
      while ($fetch_products = mysqli_fetch_assoc($select_products_sc)) {

    ?>
        <img  id="imageBox" src="data:image/jpeg;<?php echo $fetch_products['tipo_img_prod']; ?>;base64,<?php echo  base64_encode($fetch_products['imagen_prod']); ?>">
      <?php
      };
    };
?>
    
      </div>

    <div class="grit-imen-prod item2-prod product-cart-prod" >
      <?php
    $produc_cart=$_SESSION['prod_bill'];
    $select_products_sc= mysqli_query($conn,"SELECT * FROM `producto` WHERE id_prod='$produc_cart'") or die ("busqueda de productos fallada");
    
    if (mysqli_num_rows($select_products_sc)>0) {
      $total = mysqli_num_rows($select_products_sc);
      while ($fetch_products = mysqli_fetch_assoc($select_products_sc)) {

        ?>

        <div class="name-prod-cart"><p><?php echo $fetch_products['nombre_prod'];?></p></div>
        <div class="price-prod-cart"> <?php echo "$" . $fetch_products['precio_prod'];?></div>
        <div class="description">Descripción:</div>
        <div class="desc_prod-cart" text-decoration:none;><?php echo $fetch_products['descripcion_prod'];?></div>

        <form action="" method="post" class="box-prod">
          <input type="hidden" name="id_prod" value="<?= $fetch_products['id_prod']; ?>">
          <div class="produc-cart-prod-nm">
            <input class="prod_qft" type="number" min="1" name="produc_quantify" value="1">
          </div>
          <div class="btn-cart-prod">
            <input type="submit" class="btn-prod" name="add_cart_prod" value="Agregar al carrito">
          </div>
        </form>

        <?php

      };
    };
        ?>

    </div>

    <div class="grit-imen-prod item3-prod product-small-img-prod">
    <?php
    $produc_cart=$_SESSION['prod_bill'];
    $select_products_sc= mysqli_query($conn,"SELECT * FROM `producto` WHERE id_prod='$produc_cart'") or die ("busqueda de productos fallada");
    
    if (mysqli_num_rows($select_products_sc)>0) {
      $total = mysqli_num_rows($select_products_sc);
      while ($fetch_products = mysqli_fetch_assoc($select_products_sc)) {

        if($fetch_products['imagen_prod2'] != null){
          ?>
          <img  src="data:image/jpeg;<?php echo $fetch_products['tipo_img_prod']; ?>;base64,<?php echo  base64_encode($fetch_products['imagen_prod2']); ?>" onclick="myFunction(this)">
          <?php
        }
    ?>
    <?php
        if ($fetch_products['imagen_prod3'] != null) {
          ?>
          <img  src="data:image/jpeg;<?php echo $fetch_products['tipo_img_prod']; ?>;base64,<?php echo  base64_encode($fetch_products['imagen_prod3']); ?>" onclick="myFunction(this)">
          <?php
        }
    ?>

    <?php
    ?>
        
      <?php
      if ($fetch_products['imagen_prod'] != null) {
          ?>
          <img  src="data:image/jpeg;<?php echo $fetch_products['tipo_img_prod']; ?>;base64,<?php echo  base64_encode($fetch_products['imagen_prod']); ?>" onclick="myFunction(this)">
          <?php
        }
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