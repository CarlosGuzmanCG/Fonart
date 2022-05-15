<?php

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
include 'head_index.php';
?>


  <div class="grid-container-ft">

    <div class="grit-imen-ft item1-ft img-container-prod-ft product-small-img-prod-ft">
    <?php
    session_start();
    $produc_index=$_SESSION['prod_bill_index'];
    echo "Produc: " . $produc_index;
    $select_products_sc= mysqli_query($conn,"SELECT * FROM `producto` WHERE id_prod='$produc_index'") or die ("busqueda de productos fallada");

    
    if (mysqli_num_rows($select_products_sc)>0) {
      $total = mysqli_num_rows($select_products_sc);
      while ($fetch_products_see = mysqli_fetch_assoc($select_products_sc)) {

    ?>
        <img  id="imageBox" src="data:image/jpeg;<?php echo $fetch_products_see['tipo_img_prod']; ?>;base64,<?php echo  base64_encode($fetch_products_see['imagen_prod']); ?>">
      <?php
      };
    };
?>
    
      </div>

    <div class="grit-imen-ft item2-ft">falta</div>

    <div class="grit-imen-ft item3-ft product-small-img-prod-ft">
    <?php
    $produc_index=$_SESSION['prod_bill_index'];
    $select_products_sc_2= mysqli_query($conn,"SELECT * FROM `producto` WHERE id_prod='$produc_index'") or die ("busqueda de productos fallada");

    
    if (mysqli_num_rows($select_products_sc_2)>0) {
      
      while ($fetch_products_see_2 = mysqli_fetch_assoc($select_products_sc_2)) {

    ?>
        <img  id="imageBox" src="data:image/jpeg;<?php echo $fetch_products_see_2['tipo_img_prod']; ?>;base64,<?php echo  base64_encode($fetch_products_see_2['imagen_prod']); ?>">

        <img  id="imageBox" src="data:image/jpeg;<?php echo $fetch_products_see_2['tipo_img_prod']; ?>;base64,<?php echo  base64_encode($fetch_products_see_2['imagen_prod']); ?>">

        <img  id="imageBox" src="data:image/jpeg;<?php echo $fetch_products_see_2['tipo_img_prod']; ?>;base64,<?php echo  base64_encode($fetch_products_see_2['imagen_prod']); ?>">
      <?php
      };
    };
?>
    </div>

  </div>




<script src="js/script.js"></script>
<br><br><br>

<?php
  include 'footer_index.php';
?>

</body>
</html>