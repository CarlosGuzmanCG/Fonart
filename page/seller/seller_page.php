<html lang="en">
<?php 
include('/home/pablo/Documentos/GitHub/fonart/connection/conf.php');
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Venta de productos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <style type="text/css">
    body,
    html {
      margin: 0;
      padding: 0;
      background-color: #fefefe;
    }
    .card {
      width: 420px;
      max-width: 420px;
      display: inline-flex;
      margin-top: 100px;
      border-radius: 15px;
    }
    .card img {
      height: 200px;
      width: 286px;
      border-radius: 15px;
      
    }
    .modal {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      padding: 20px;
      background: rgba(50, 50, 50, 0.5);
    }
    .body-modal {
      margin: 0 auto;
      width: 100%;
      max-width: 500px;
      background: #fff;
      padding: 10px;
      border-radius: 5px;
      position: relative;
    }
    .btn-close {
      position: absolute;
      top: 0;
      right: 0;
      background: transparent;
      border: none;
      outline: none;
    }
    input {
      padding: 5px;
      border: 1px solid #666;
    }
    select {
      padding: 5px;
      border: 1px solid #666;
    }
    .body-modal h3 {
      margin-bottom: 10px;
    }
    .body-modal .div-flex {
      display: flex;
      margin-bottom: 5px;
    }
    .body-modal .div-flex label {
      width: 100px;
    }
    .body-modal .div-flex input {
      width: calc(100% - 100px);
    }
    .body-modal .div-flex select {
      width: calc(100% - 100px);
    }
    .logo {
      width: 100px;
      justify-content: center;
      align-items: center;
      margin-top: -50px;
    }
    .logo img {
      width: 100px;
    }
    .fs-1 {
      color: #fff;
    }
    .button {
      height: 90px;
    }
    .navbar {
      height: 100px;
      padding: 10px;
    }
    .navbar img {
      height: 100px;
      width: 150px;
    }
   .lm{
    display: inline-block;
    padding: 0px 10px;
   }
   .lm2{
    display: inline-block;
    padding: 0px 30px;
   }
   .nav-item{
    display: inline-flex;
   }
   .ms{
    padding: 0px 10px;
   }
  </style>
</head>
<header>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="/assets/Logo_FONART.png/" alt="" width="40" height="24">
       
      </a>
      <li class="nav-item">
        <p class="fs-1">Agregar productos.</p>
      </li>
      <li class="nav-item">
        <div> 
          <button type="button" class="btn btn-primary" onclick="show_modal('modal-producto')">Insertar</button>
        </div>
        <div class="ms"> 
          <button type="button" class="btn btn-primary" onclick="login()">Salir</button>
        </div>
      </li>
    </div>
  </nav>
</header>

<body>

  <div class="modal" id="modal-producto" style="display: none;">
    <div class="body-modal">

      <button class="btn-close" onclick="hide_modal('modal-producto')"><i class="fa fa-times"
          aria-hidden="true"></i></button>
      <h3>Añadir producto</h3>
      <div class="div-flex">
        <label>Codigo producto</label>
        <input type="number" id="codigoProd">
      </div>
      <div class="div-flex">
        <label>Nombre</label>
        <input type="text" id="nombreProd">
      </div>
      <div class="div-flex">
        <label>Descripcion</label>
        <input type="text" id="descripcionProd">
      </div>
      <div class="div-flex">
        <label>Pecio</label>
        <input type="number" id="precioProd">
      </div>
      <div class="div-flex">
        <label>Stock</label>
        <input type="number" id="stockProd">
      </div>
      <div class="div-flex">
        <label>Categoria</label>
        <select class="form-select" REQUIRED name="categoriaProd" id="categoriaProd">
                    <option selected>menu</option>
                    <option value="1" >One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
               </select>   
      </div>

      <div class="div-flex">
        <input type="file" id="imagen1">
      </div>
      <div class="div-flex">
        <input type="file" id="imagen2">
      </div>
      <div class="div-flex">
        <input type="file" id="imagen3">
      </div>

      <button onclick="save_producto()">Guardar</button>
    </div>
  </div>
  <div class="container">
    <!-- Modal -->
    <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar datos del producto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!--Formulario-->
            <form name="formProduct" id="formProduct" enctype="multipart/form-data">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="">Codigo del producto</label>
                <input type="number" REQUIRED name="codigo" id="codigo" class="form-control">
              </div>
              <div class="form-group">
                <label for="">nombre</label>
                <input type="text" REQUIRED name="nombre" id="nombre" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Descripcion</label>
                <input type="text" REQUIRED name="descripcion" id="descripcion" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Precio</label>
                <input type="number" REQUIRED name="precio" id="precio" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Stock</label>
                <input type="number" REQUIRED name="stock" id="stock" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Categoria</label>
                
                <select class="form-select" REQUIRED name="categoria" id="categoria">
                    <option selected>menu</option>
                    <option value="1" >One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
               </select>   

              </div>
              <div class="form-group">
                <label for="">Imagen 1</label>
                <input type="file" REQUIRED name="imagen-e1" id="imagen-e1" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Imagen 2</label>
                <input type="file" REQUIRED name="imagen-e2" id="imagen-e2" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Imagen 3</label>
                <input type="file" REQUIRED name="imagen-e3" id="imagen-e3" class="form-control">
              </div>
              <div class="msg mt-3 mb-3"></div>
              <button type="submit" class="btn btn-primary" id="btnenviar" name="btnenviar" data-bs-dismiss="modal" onclick="recarga()">Enviar</button>
            </form>
          </div>
  
        </div>
      </div>
    </div>
  </div>
  <?php 
$query = "SELECT * FROM producto";
if ($result = $conn->query($query)) {
while ($row = $result->fetch_assoc()) {
echo '
<div class="lm">
<div class="lm2"></div>
<div class="card" style="width: 18rem;">
<img src="data:image/jpeg;base64,'.base64_encode($row['imagen_prod_1']).'"/>
<div class="card-body">

<h5 class="card-title" name="idc" id="idc">'.$row['id_prod'].'</h5>
<p class="card-text">'.$row['nombre_prod'].'</p>
<p class="card-text">'.$row['descripcion_prod'].'</p>
</div>
<ul class="list-group list-group-flush">
<li class="list-group-item">$ '.$row['precio_prod'].'</li>
<li class="list-group-item">Stock: '.$row['stock_prod'].'</li>
<li class="list-group-item">Categoria: '.$row['categoria_id'].'</li>
</ul>
<div class="card-body">
<button type="button" class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editar" onclick=show_id('.$row['id_prod'].')>Editar</button>
<button type="button" class="btn btn-danger" onclick="delete_product('.$row['id_prod'].')">Eliminar</button>
</div>
</div>
</div>
';
}
$result->free();
}
?>
  <script type="text/javascript">
function login(){
			window.location.href="../../connection/log_in_connection.php";
		}
  function show_id(id){
    $('#id').val(id);
  }
  
  function recarga(){
      window.location.reload();
  }
    function show_modal(id) {
      document.getElementById(id).style.display = "block";
    }
    function hide_modal(id) {
      document.getElementById(id).style.display = "none";
    }
    function save_producto() {
      let fd = new FormData();
      fd.append('codigoProd', document.getElementById('codigoProd').value);
      fd.append('nombreProd', document.getElementById('nombreProd').value);
      fd.append('descripcionProd', document.getElementById('descripcionProd').value);
      fd.append('stockProd', document.getElementById('stockProd').value);
      fd.append('precioProd', document.getElementById('precioProd').value);
      fd.append('categoriaProd', document.getElementById('categoriaProd').value);
      fd.append('imagen1', document.getElementById('imagen1').files[0]);
      fd.append('imagen2', document.getElementById('imagen2').files[0]);
      fd.append('imagen3', document.getElementById('imagen3').files[0]);
      let request = new XMLHttpRequest();
      request.open('POST', '/connection/product_save.php', true);
      request.onload = function () {
        if (request.readyState == 4 && request.status == 200) {
          let response = JSON.parse(request.responseText);
          if (response.state) {
            window.location.reload();
          } else {
            alert(response.detail);
          }
        }
      }
      request.send(fd);
    }
    function delete_product(codpro) {
      var c = confirm("Estas seguro de eliminar el producto de codigo " + codpro + "?");
      if (c) {
        let fd = new FormData();
        fd.append('codpro', codpro);
        let request = new XMLHttpRequest();
        request.open('POST', '/connection/delete_product.php', true);
        request.onload = function () {
          if (request.readyState == 4 && request.status == 200) {
            let response = JSON.parse(request.responseText);
            console.log(response);
            if (response.state) {
              alert("Producto eliminado");
              window.location.reload();
            } else {
              alert(response.detail);
            }
          }
        }
        request.send(fd);
      }
    }
    $(function () {
      $("#formProduct").on("submit", function (e) {
        e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("formProduct"));

        formData.append("dato", "valor");
        $.ajax({
          url: "/connection/edit_product.php",
          type: "post",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: function () {
            $('.msg').html("<img src='img/ajax-loader.gif' />");
          },
        })
      });
    });

  </script>
</body>
</html>