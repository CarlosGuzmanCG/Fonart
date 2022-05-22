<!DOCTYPE html>
<html lang="en">
<?php 
include('/home/pablo/Documentos/GitHub/fonart/connection/conf.php');
?>

<head>
    <title>Administrador | Productos </title>
    <link rel="stylesheet" type="text/css" href="/css/adm_sel.css">
    <link rel="stylesheet" type="text/css" href="/assets/font-awesome-4.7.0/css/font-awesome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>

<body>
    <!--
    <div class="modal" id="modal-categoria" style="display: none;">
        <div class="body-modal">
        <button class="btn-close" onclick="hide_modal('modal-categoria')"><i class="fa fa-times"
                    aria-hidden="true"></i></button>
            <h3>Añadir categoria</h3>

            <div class="div-flex">
                <label>Nombre de la categora</label>
                <input type="text" id="nomcat">
            </div>
            <div class="div-flex">
                <label>Descripcion</label>
                <input type="text" id="descrip">
            </div>
            <button onclick="save_producto()">Guardar</button>
        </div>
    </div>
    <div class="container">

-->
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
                        <form name="formCategory" id="formCategory" enctype="multipart/form-data">
                            <input type="hidden" name="idf" id="idf">
                            <div class="form-group">
                                <label for="">Nombre de la categoria</label>
                                <input type="text" REQUIRED  name="nombreCat" id="nombreCat" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Descripcion</label>
                                <input type="text" REQUIRED name="descripCat" id="descripCat" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary" id="btnenviar" name="btnenviar" >Enviar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="recarga()">Cerrar</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>


    </div>
    <!-- Button trigger modal -->

    <div class="main-container">
        <div class="body-nav-bar">
            <img src="/assets/Logo_FONART.png">
            <center>
                <h3>Administrador</h3>
            </center>
            <ul class="mt10">
                <li><a href="category.php">Categoria</a></li>
                <li><a href="D_order.php">detalle pedidos</a></li>
                <li><a href="time.php">Tiempo</a></li>
                <li><a href="orders.php">Pedido</a></li>
                <li><a href="product.php">Producto</a></li>
                <li><a href="role.php">Rol</a></li>
                <li><a href="users.php">Usuario</a></li>
                <li><a href="exit.php">Salir</a></li>
            </ul>
        </div>
        <div class="body-page">
            <h2>Detalle tiempo</h2>
            <table class="mt10">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Producto id</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Token</th>
                        <th class="td-option">Opciones</th>
                    </tr>
                </thead>
                <?php
$query = "SELECT * FROM detalle_temp";
if ($result = $conn->query($query)) {
while ($row = $result->fetch_assoc()) {
echo
'
<tr>
<td>'.$row['id_temp'].'</td>
<td>'.$row['producto_id'].'</td>
<td>'.$row['precio_temp'].'</td>
<td>'.$row['cantidad_temp'].'</td>
<td>'.$row['token'].'</td>

<td class="td-option">
<div class="div-flex div-td-button">
<!--<button type="button" class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>-->
<button type="button" onclick="delete_product('.$row['id_temp'].')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>

</div>
</td>
</tr>
';
}
$result->free();
}
?>
</body>
</table>
<!--<button class="mt10" onclick="show_modal('modal-categoria')">Subir</button>-->
</div>
</div>
<script type="text/javascript">
    function show_modal(id) {
        document.getElementById(id).style.display = "block";
    }
    function hide_modal(id) {
        document.getElementById(id).style.display = "none";
    }
    function recarga(){
      window.location.reload();
  }
    function save_producto() {
        let fd = new FormData();
        fd.append('nombre', document.getElementById('nomcat').value);
        fd.append('descripcion', document.getElementById('descrip').value);
        let request = new XMLHttpRequest();
        request.open('POST', 'php/category_save.php', true);
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
            request.open('POST', 'php/time_delete.php', true);
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
    $('.editbtn').on('click', function () {

        $tr = $(this).closest('tr');
        var datos = $tr.children("td").map(function () {
            return $(this).text();
        });
        $('#idf').val(datos[0]);
        $('#nombreCat').val(datos[1]);
        $('#descripCat').val(datos[2]);
    });


    $(function(){
    $("#formCategory").on("submit", function(e){
        // Cancelamos el evento si se requiere 
        e.preventDefault();
        // Obtenemos los datos del formulario 
        var f = $(this);
        var formData = new FormData(document.getElementById("formCategory"));
       
        formData.append("dato", "valor");     
        // Enviamos los datos al archivo PHP que procesará el envio de los datos a un determinado correo 
        $.ajax({
            url: "php/category_edit.php",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
              $('.msg').html("<img src='img/ajax-loader.gif' />");
            },
        })
    });
});
 
</script>
</body>

</html>