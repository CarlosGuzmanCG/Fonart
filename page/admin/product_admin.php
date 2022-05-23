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
    <div class="modal" id="modal-producto" style="display: none;">
        <div class="body-modal">
            <button class="btn-close" onclick="hide_modal('modal-producto')"><i class="fa fa-times"
                    aria-hidden="true"></i></button>
            <h3>Aniadir producto</h3>
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
                                <input type="number" REQUIRED  name="codigo" id="codigo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">nombre</label>
                                <input type="text" REQUIRED name="nombre" id="nombre" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Descripcion</label>
                                <input type="text" REQUIRED  name="descripcion" id="descripcion" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Precio</label>
                                <input type="number" REQUIRED  name="precio" id="precio" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Stock</label>
                                <input type="number" REQUIRED  name="stock" id="stock" class="form-control">
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
                                <input type="file" REQUIRED  name="imagen-e1" id="imagen-e1" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Imagen 2</label>
                                <input type="file" REQUIRED  name="imagen-e2" id="imagen-e2" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Imagen 3</label>
                                <input type="file" REQUIRED  name="imagen-e3" id="imagen-e3" class="form-control">
                            </div>
                            <div class="msg mt-3 mb-3"></div>
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
            <li><a href="category_admin.php">Categoria</a></li>
                <li><a href="D_order_admin.php">detalle pedidos</a></li>
                <li><a href="time_admin.php">Tiempo</a></li>
                <li><a href="orders_admin.php">Pedido</a></li>
                <li><a href="product_admin.php">Producto</a></li>
                <li><a href="role_admin.php">Rol</a></li>
                <li><a href="users_admin.php">Usuario</a></li>
                <li><a href="exit_admin.php">Salir</a></li>
            </ul>
        </div>
        <div class="body-page">
            <h2>Productos</h2>
            <table class="mt10">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Codigo producto</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Imagen</th>
                        <th>Categoria</th>
                        <th>Dato</th>

                        <th class="td-option">Opciones</th>
                    </tr>
                </thead>

                <?php
$query = "SELECT * FROM producto";
if ($result = $conn->query($query)) {
while ($row = $result->fetch_assoc()) {
echo
'
<tr>
<td>'.$row['id_prod'].'</td>
<td>'.$row['codigo_prod'].'</td>
<td>'.$row['nombre_prod'].'</td>
<td>'.$row['descripcion_prod'].'</td>
<td>'.$row['precio_prod'].'</td>
<td>'.$row['stock_prod'].'</td>
<td>'.$row['nombre_img_prod_1'].'</td>
<td>'.$row['categoria_id'].'</td>
<td>'.$row['datacreate'].'</td>
<td class="td-option">
<div class="div-flex div-td-button">
<button type="button" class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
<button type="button" onclick="delete_product('.$row['id_prod'].')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>


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
<button class="mt10" onclick="show_modal('modal-producto')">Insertar</button>
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
        request.open('POST', 'queries_admin/product_save_queries_admin.php', true);
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
    function delete_product(codpro){
        var c = confirm("Estas seguro de eliminar el producto de codigo " + codpro + "?");
        if (c) {
            let fd = new FormData();
            fd.append('codpro', codpro);
            let request = new XMLHttpRequest();
            request.open('POST', 'queries_admin/product_delete_queries_admin.php', true);
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
        $('#id').val(datos[0]);
        $('#codigo').val(datos[1]);
        $('#nombre').val(datos[2]);
        $('#descripcion').val(datos[3]);
        $('#precio').val(datos[4]);
        $('#stock').val(datos[5]);
        $('imagen-e1').val(datos[6]);
        $('#categoria').val(datos[7]);

    });

    $(function(){
    $("#formProduct").on("submit", function(e){
        e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("formProduct"));    
        formData.append("dato", "valor");     
        $.ajax({
            url: "queries_admin/product_edit_queries_admin.php",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
             
            },
        })
    });
});
 
</script>
</body>

</html>