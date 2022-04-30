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
                <label>Nombre de usuario</label>
                <input type="text" id="nombreUs">
            </div>
            <div class="div-flex">
                <label>Apellidos</label>
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
                <input type="number" id="categoriaProd">
            </div>

            <div class="div-flex">
                <input type="file" id="imagen">
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
                                <input type="number" REQUIRED  name="categoria" id="categoria" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Imagen</label>
                                <input type="file" REQUIRED  name="imagen-e" id="imagen-e" class="form-control">
                            </div>
                            <div class="msg mt-3 mb-3"></div>
                            <button type="submit" class="btn btn-primary" id="btnenviar" name="btnenviar">Enviar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="ingresar" >
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
                <li><a href="order.php">Pedido</a></li>
                <li><a href="product.php">Producto</a></li>
                <li><a href="role.php">Rol</a></li>
                <li><a href="users.php">Usuario</a></li>
                <li><a href="exit.php">Salir</a></li>
            </ul>
        </div>
        <div class="body-page">
            <h2>Productos</h2>
            <table class="mt10">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Calle</th>
                        <th>Colonia</th>
                        <th>Estado</th>
                        <th>Ciudad</th>
                        <th>Codigo Postal</th>
                        <th>Numero Calle</th>
                        <th>Numero Tel</th>
                        <th>Numero Tel 2 </th>
                        <th>Descripcion</th>
                        <th>toke</th>
                        <th>rol</th>
                        <th>dato</th>


                        <th class="td-option">Opciones</th>
                    </tr>
                </thead>

                <?php
$query = "SELECT * FROM usuario";
if ($result = $conn->query($query)) {
while ($row = $result->fetch_assoc()) {
echo
'
<tr>
<td>'.$row['id_usua'].'</td>
<td>'.$row['nombre_usua'].'</td>
<td>'.$row['apellido_usua'].'</td>
<td>'.$row['email_usua'].'</td>
<td>'.$row['password_usua'].'</td>
<td>'.$row['calle_usua'].'</td>
<td>'.$row['colonia_usua'].'</td>
<td>'.$row['estado_usua'].'</td>
<td>'.$row['ciudad_usua'].'</td>
<td>'.$row['codPos_usua'].'</td>
<td>'.$row['numeroCalle_usua'].'</td>
<td>'.$row['numeroTel_usua'].'</td>
<td>'.$row['numeroTel2_usua'].'</td>
<td>'.$row['descripcion_usua'].'</td>
<td>'.$row['toke'].'</td>
<td>'.$row['rol_id'].'</td>
<td>'.$row['datecreated_usua'].'</td>
<td class="td-option">
<div class="div-flex div-td-button">
    <button type="button" class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editar">
        Insertar
    </button>
<button onclick="delete_product('.$row['id_prod'].')"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
<button class="mt10" onclick="show_modal('modal-producto')">Editar</button>
</div>
</div>
<script type="text/javascript">
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
        fd.append('imagen', document.getElementById('imagen').files[0]);
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
        $('imagen-e').val(datos[6]);
        $('#categoria').val(datos[7]);

    });

    $(function(){
    $("#formProduct").on("submit", function(e){
        // Cancelamos el evento si se requiere 
        e.preventDefault();
        // Obtenemos los datos del formulario 
        var f = $(this);
        var formData = new FormData(document.getElementById("formProduct"));
       
        formData.append("dato", "valor");     
        // Enviamos los datos al archivo PHP que procesará el envio de los datos a un determinado correo 
        $.ajax({
            url: "/connection/edit_product.php",
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
        // Cuando el formulario es enviado, mostramos un mensaje en la vista HTML 
        // En el archivo enviarcorreo.php devuelvo el valor '1' el cual es procesado con jQuery Ajax 
        // y significa que el mensaje se envio satisfactoriamente. 
       
       
 
    });
});
 
</script>
</body>

</html>