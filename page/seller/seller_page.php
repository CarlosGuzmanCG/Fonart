<!DOCTYPE html>
<html lang="en">
  <?php
  include('/home/pablo/Documentos/GitHub/fonart/connection/conf.php');
  ?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only --><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="/css/adm_sel.css">
  <title>Document</title>
</head>
<body>
  <?php 
  $query = "SELECT * FROM producto";
  if ($result = $conn->query($query)) {
  while ($row = $result->fetch_assoc()) {
    echo '
  <div class="card" style="width: 18rem;">
  <img src="data:image/jpeg;base64,'.base64_encode($row['imagen_prod']).'"/>;
   
    <div class="card-body">
      <h5 class="card-title">'.$row['id_prod'].'</h5>
      <p class="card-text">'.$row['descripcion_prod'].'</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">'.$row['precio_prod'].'</li>
      <li class="list-group-item">'.$row['stock_prod'].'</li>
      <li class="list-group-item">'.$row['categoria_id'].'</li>
    </ul>
    <div class="card-body">
    <button type="button" class="btn btn-primary">Primary</button>
    <button type="button" class="btn btn-primary">Primary</button>
    </div>
  </div>
  ';
  }
  $result->free();
}
?>
</body>
