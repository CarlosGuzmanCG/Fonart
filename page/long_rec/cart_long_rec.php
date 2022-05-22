<?php
include '../../connection/access_major_connection.php';

if(isset($_POST['delete_produc_cart'])){
  $id_prod = $_POST['id_temp_cart'];
  $id_usu_dele_cart=$_SESSION['usua_id'];

  $insert_cart = mysqli_query($conn, "DELETE FROM `detalle_temp` WHERE id_temp_carrito='$id_prod' and usua_id_temp='$id_usu_dele_cart';") or die('consulta fallada 1');
  $mensaje[] = 'Producto eliminado!';
};

if(isset($_POST['regist-prod-sale'])){
  $_SESSION['status_butt']=1;
  $user_id_regist_prod = $_SESSION['usua_id'];
  $amount = $_SESSION['amount_play'];

  $on_products= mysqli_query($conn,"SELECT * FROM `detalle_temp` INNER JOIN `producto` ON detalle_temp.producto_id= producto.id_prod WHERE detalle_temp.usua_id_temp='$user_id_regist_prod' AND detalle_temp.status_temp=0") or die ("busqueda de productos fallada");


      if (mysqli_num_rows($on_products)>0) {
        $total_rows = mysqli_num_rows($on_products);

        $show_orden_ft= mysqli_query($conn,"INSERT INTO `pedido` (usuario_id, monto_pedi,pago_pedi,status_pedi) values ('$user_id_regist_prod','$amount','Transferencia',0)") or die ("busqueda de productos fallada");

        $search_products= mysqli_query($conn,"SELECT * FROM `pedido` WHERE `usuario_id`=$user_id_regist_prod") or die ("busqueda de productos fallada");

        $row = mysqli_fetch_array($search_products);
        $puesto = $row['id_pedi'];

        while ($fetch_cart_off = mysqli_fetch_assoc($on_products)) {
          
          $price_prod=$fetch_cart_off['precio_prod'];
          $amount_prod=$fetch_cart_off['cantidad_temp'];
          $produc_off =$fetch_cart_off['id_prod'];

          $produc_detail_product= mysqli_query($conn,"INSERT INTO `detalle_pedido` (pedido_id,producto_id,precio_detap,cantidad_detap) values ($puesto,$produc_off,$price_prod,$amount_prod)") or die ("busqueda de productos fallada");

          $off_products = mysqli_query($conn, "UPDATE `detalle_temp` SET `status_temp`=1 WHERE `producto_id`=$produc_off and `usua_id_temp`=$user_id_regist_prod") or die ("Error en la consulta 16");

        }
      }
};

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
include 'head_long_rec.php';
?>

  <section class="wish-list-cart">
    <h1 class="title"> Carrito de compras</h1>
  <div class="products">
    <div class="box-container">
    <?php
    $user_id_cart = $_SESSION['usua_id'];

      
  $select_products= mysqli_query($conn,"SELECT * FROM `detalle_temp` INNER JOIN `producto` ON detalle_temp.producto_id= producto.id_prod WHERE detalle_temp.usua_id_temp='$user_id_cart' AND detalle_temp.status_temp=0") or die ("busqueda de productos fallada");
  $_SESSION['amount_play']=0;
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
        
        $_SESSION['amount_play']+=$total;
        ?>

        <div class="price-prod"> <?php echo "Total $".$total; ?></div>

        <input type="hidden" name="id_temp_cart" value="<?= $fetch_cart['id_temp_carrito']; ?>">

        <input type="submit" value="Eliminar producto" name="delete_produc_cart" class="btn-prod">
      </form>
      <?php

      if($total_rows==$tot_pro){
?>
        <div class="btn-pag">
          <div class="price-prod"> <?php echo "Total $".$_SESSION['amount_play']; ?></div>
          <div class="btn-pag1">
            <button class="fa-solid fa-money-bill-transfer" onclick="openModal()">Pago con transferencia</button>
          </div>

          <div id="paypal-button-container"></div>

        <div class="modal" id="modalAdd">
          <div class="modal-container">
            <div class="close-modal" onclick="closeModal()">X</div>
            <h2 class="method-pag-h2">Método de pago por transferencia</h2>
            <p class="instruction-pag">Realiza tu pago directamente en nuestra cuenta bancaria. Por favor, usa tu correo de esta cuenta como referencia de pago. Tu pedido no se procesará hasta que se haya recibido el importe en nuestra cuenta.</p>
            <p class="steps-to-follow">Pasos a seguir</p>
            <p class="steps-to-follow">1.- Actualizar datos</p>
            <p class="steps-to-follow">2.- Clave interbancaria: 014600655021535891</p>
            <p class="steps-to-follow">3.- Banco: Bancomer</p>
            <p class="steps-to-follow">4.- Referencia: Ingresar su correo electronico</p>
            <p class="steps-to-follow">5.- Nos comunicaremos con usted, gracias por elegirnos</p>
            
            <form action="" method="post" class="sale-cart">
              <div class="btn-cart-prod-sale">
                <?php $_SESSION['status_butt']=0;?>
                <input type="submit" class="btn-prod-sale" name="regist-prod-sale" value="Aceptar">
                <button class="btn-prod-close" onclick="closeModal()">Cancelar</button>
              </div>
            </form>
            
          </div>
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
  define("CLIENT_ID","AQ1Uw80JQF0R-H3rEqfTT1yz5oa_JRR-W3zOGQ49sl8DUtittHCLQxJnZuS6OkK7StD49dyRfx7Tz01i");
  define("CURRENCY","MXN");
  define("KEY_TOKEN","APR.wqc-354*");
  define("MONEDA","$");
?>

<script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID;?>&currency=<?php echo CURRENCY;?>"> 
</script>

<script>
  paypal.Buttons({
      style:{
        color:'blue',
        shape:'pill',
        label:'pay'
      },
      createOrder: function(data, actions){
        return actions.order.create({
          purchase_units: [{
            amount:{
              value: <?php $amount_paypal = $_SESSION['amount_play'];
              echo $amount_paypal;
                ?>
            }
          }]
        });
      },

      onApprove: function(data, actions){
        actions.order.capture().then(function (detalles){
          <?php
          if($_SESSION['status_butt']==0){
            $user_id_regist_prod = $_SESSION['usua_id'];
            $amount = $_SESSION['amount_play'];

            $on_products= mysqli_query($conn,"SELECT * FROM `detalle_temp` INNER JOIN `producto` ON detalle_temp.producto_id= producto.id_prod WHERE detalle_temp.usua_id_temp='$user_id_regist_prod' AND detalle_temp.status_temp=0") or die ("busqueda de productos fallada");


              if (mysqli_num_rows($on_products)>0) {
              $total_rows = mysqli_num_rows($on_products);

              $show_orden_ft= mysqli_query($conn,"INSERT INTO `pedido` (usuario_id, monto_pedi,pago_pedi,status_pedi) values ('$user_id_regist_prod','$amount','Paypal',0)") or die ("busqueda de productos fallada");

              $search_products= mysqli_query($conn,"SELECT * FROM `pedido` WHERE `usuario_id`=$user_id_regist_prod") or die ("busqueda de productos fallada");

              $row = mysqli_fetch_array($search_products);
              $puesto = $row['id_pedi'];

                while ($fetch_cart_off = mysqli_fetch_assoc($on_products)) {
          
                  $price_prod=$fetch_cart_off['precio_prod'];
                  $amount_prod=$fetch_cart_off['cantidad_temp'];
                  $produc_off =$fetch_cart_off['id_prod'];

                  $produc_detail_product= mysqli_query($conn,"INSERT INTO `detalle_pedido` (pedido_id,producto_id,precio_detap,cantidad_detap) values ($puesto,$produc_off,$price_prod,$amount_prod)") or die ("busqueda de productos fallada");

                  $off_products = mysqli_query($conn, "UPDATE `detalle_temp` SET `status_temp`=1 WHERE `producto_id`=$produc_off and `usua_id_temp`=$user_id_regist_prod") or die ("Error en la consulta 16");

        }
      }
    }
          ?>
          alert("Pago exitoso");

          window.location.href="major.php"
        });
      },

      onCancel: function(data) {
        alert("Pago cancelado");
        console.log(data);
      }
    }).render('#paypal-button-container');
</script>

<?php
  include 'footer_long_rec.php';
?>

</body>
</html>