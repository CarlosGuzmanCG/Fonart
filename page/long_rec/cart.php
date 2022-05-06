<?php
include '../../connection/access_major.php';

if(isset($_POST['delete_produc_cart'])){
  $id_prod = $_POST['id_temp_cart'];
  $id_usu_dele_cart=$_SESSION['usua_id'];

  $insert_cart = mysqli_query($conn, "DELETE FROM `detalle_temp` WHERE id_temp_carrito='$id_prod' and usua_id_temp='$id_usu_dele_cart';") or die('consulta fallada 1');
  $message[] = 'Producto agregado!';
}

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

      
  $select_products= mysqli_query($conn,"SELECT * FROM `detalle_temp` INNER JOIN `producto` ON detalle_temp.producto_id= producto.id_prod WHERE detalle_temp.usua_id_temp='$user_id_cart' AND detalle_temp.status_temp=0") or die ("busqueda de productos fallada");

      if (mysqli_num_rows($select_products)>0) {
        $total_rows = mysqli_num_rows($select_products);
        $tot_pro=1;
        while ($fetch_cart = mysqli_fetch_assoc($select_products)) {
          
          

      ?>

      <form  method="POST" class="box-prod">
        <img  src="data:image/jpeg;<?php echo $fetch_cart['tipo_img_prod']; ?>;base64,<?php echo  base64_encode($fetch_cart['imagen_prod']); ?>">
        <div class="desc_prod"><?php echo $fetch_cart['descripcion_prod'];?></div>

        <?php 
        $precio_prod=$fetch_cart['precio_prod'];
        $cant_tem=$fetch_cart['cantidad_temp'];
        $total=$precio_prod*$cant_tem; 
        ?>

        <div class="price-prod"> <?php echo "Total $".$total; ?></div>
        <input type="hidden" name="id_temp_cart" value="<?= $fetch_cart['id_temp_carrito']; ?>">
        <input type="submit" value="Eliminar producto" name="delete_produc_cart" class="btn-prod">
      </form>
      <?php

      if($total_rows==$tot_pro){
?>
        <div class="btn-pag">
          <div class="btn-pag1">
           <i class="fa-solid fa-money-bill-transfer"><a href=""> Pago con transferencia</a></i>
          </div>
          <div class="btn-pag2">
            <i class="fa-brands fa-paypal"><a href=""> Pagar con paypal</a></i>
          </div>
          
<?php
      }
      $tot_pro+=1;
      };

    }else{
      ?>
      <br><br>
      <p class="title" style="text-decoration:underline"> No existen productos agregados al carrito de compras</p>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <?php
    }
?>
  </div>
</div>
</section>



<script src="../../js/script.js"></script>
<?php
  include 'footer.php';
?>

</body>
</html>