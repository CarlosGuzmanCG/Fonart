<?php
include '../../connection/access_major_connection.php';

if(isset($_POST['add_cart_prod'])){
  $id_prod = $_POST['id_prod'];
  $id_usu_cart=$_SESSION['usua_id'];
  $prod_qft = $_POST['produc_quantify'];
  $sta_pro=0;
  $insert_cart = mysqli_query($conn, "INSERT INTO `detalle_temp` (producto_id,usua_id_temp,cantidad_temp,status_temp) values('$id_prod','$id_usu_cart','$prod_qft','$sta_pro')") or die('consulta fallada 1');
  $mensaje[] = 'Producto agregado!';
};

if(isset($_POST['see_prod'])){
  $_SESSION['prod_bill']= $_POST['id_prod'];
  header('location:cart_prod_sample_long_rec.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/ico-fonart/favicon.ico?1643016642">
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/ico-fonart/favicon.ico?1643016642">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  
  <link rel="stylesheet" href="../../css/compts.css">

  <title>Bienvenido a Fonart</title>

</head>
<body>
  
<?php
include 'head_long_rec.php';
?>


<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../../assets/photo-slider/imagen1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../../assets/photo-slider/imagen2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../../assets/photo-slider/imagen3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<br><br><br>

<!-- <a href="produc_selection.php" style="text-decoration:none; color:black;"> -->
<div class="products">
  <div class="box-container">
    <?php
    $select_products= mysqli_query($conn,"SELECT * FROM `producto`") or die ("busqueda de productos fallada");
    if (mysqli_num_rows($select_products)>0) {
      $total = mysqli_num_rows($select_products);
      while ($fetch_products = mysqli_fetch_assoc($select_products)) {
      ?>
        <form action="" method="post" class="box-prod">

        <img  src="data:image/jpeg;<?php echo $fetch_products['tipo_img_prod']; ?>;base64,<?php echo  base64_encode($fetch_products['imagen_prod']); ?>">

        <div class="name-prod"><?php echo $fetch_products['nombre_prod'];?></div>
        <div class="desc_prod" text-decoration:none;><?php echo $fetch_products['descripcion_prod'];?></div>
        <div class="price-prod"> <?php echo "$" . $fetch_products['precio_prod'];?></div>
        
        <input type="hidden" name="id_prod" value="<?= $fetch_products['id_prod']; ?>">
        
        <input type="hidden" name="produ_name" value="<?php echo $fetch_products['nombre_prod']; ?>">
        <input type="hidden" name="produ_description" value="<?php echo $fetch_products['descripcion_prod']; ?>">
        <input class="prod_qft" type="number" min="1" name="produc_quantify" value="1">
        <input type="hidden" name="produ_price" value="<?php echo $fetch_products['precio_prod']; ?>">
        <input type="submit" class="btn-prod" name="add_cart_prod" value="Agregar al carrito">

        <input type="submit" name="see_prod" value="Ver producto" class="btn-see-prod">
        </form>

      <?php
      };
    };
?>
  </div>
</div>
<!-- </a> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="../../js/script.js"></script>
<script src="../../js/phot-sli.js"></script>
<br><br><br>
<?php
  include 'footer_long_rec.php';
?>
</body>
</html>