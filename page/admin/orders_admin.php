<!DOCTYPE html>
<html lang="en">
<?php 
include('/home/pablo/Documentos/GitHub/fonart/connection/conf.php');
?>
<!--Este falta casi todo-->
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
            <h3>Aniadir orden</h3>
            <div class="div-flex">
                <label>Id Usuario</label>
                <input type="number" id="idUs">
            </div>
            <div class="div-flex">
                <label>Monto pedido</label>
                <input type="number" id="montoP">
            </div>
            <div class="div-flex">
                <label>Tipo de pago</label>
                <input type="number" id="tipoP">
            </div>
            <div class="div-flex">
                <label>Pago pedido</label>
                <input type="text" id="pagoP">
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
                                <label for="">Id Usuario</label>
                                <input type="number" REQUIRED  name="idU" id="idU" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Monto pedido</label>
                                <input type="number" REQUIRED name="monto" id="monto" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Tipo de pago</label>
                                <input type="number" REQUIRED  name="tipoP" id="tipoP" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Pago pedido</label>
                                <input type="text" REQUIRED  name="pagoP" id="pagoP" class="form-control">
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
            <h2>Pedido</h2>
            <table class="mt10">
                <thead>
                    <tr>
                        <th>Id pedido</th>
                        <th>usuario Id</th>
                        <th>Fecha de pedido</th>
                        <th>Monto</th>
                        <th>Tipo de pago</th> 
                        <th class="td-option">Opciones</th>
                    </tr>
                </thead>

                <?php
$query = "SELECT * FROM pedido";
if ($result = $conn->query($query)) {
while ($row = $result->fetch_assoc()) {
echo
'
<tr>
<td>'.$row['id_pedi'].'</td>
<td>'.$row['usuario_id'].'</td>
<td>'.$row['fecha_pedi'].'</td>
<td>'.$row['monto_pedi'].'</td>
<td>'.$row['tipopago_pedi'].'</td>


<td class="td-option">
<div class="div-flex div-td-button">
   <!-- <button type="button" class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editar"> 
        Insertar
    </button>-->
    <button type="button" onclick="delete_product('.$row['id_pedi'].')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>

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
<!--<button class="mt10" onclick="show_modal('modal-producto')">Editar</button>-->
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
            request.open('POST', 'queries_admin/orders_delete_queries_admin.php', true);
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
        $('#idU').val(datos[1]);
        $('#monto').val(datos[3]);
        $('#tipoP').val(datos[5]);
        $('#pagoP').val(datos[6]);
       

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
            url: "php/orders_edit.php",
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