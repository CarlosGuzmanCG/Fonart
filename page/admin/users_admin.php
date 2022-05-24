<!DOCTYPE html>
<html lang="en">
<?php 
include('../../connection/conf_connection.php');
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
                            <label>Nombre</label>
                            <input type="text" REQUIRED id="nombre">
                            </div>
                            <div class="div-flex">
                            <label>Apellido</label>
                            <input type="text" REQUIRED id="apellido">
                            </div>
                            <div class="div-flex">
                            <label>Email</label>
                            <input type="text" REQUIRED id="email">
                            </div>
                            <div class="div-flex">
                            <label>Password</label>
                            <input type="text" REQUIRED id="password">
                            </div>
                            <div class="div-flex">
                            <label>Calle</label>
                            <input type="text" REQUIRED id="calle">
                            </div>
                            <div class="div-flex">
                            <label>Colonia</label>
                            <input type="text" REQUIRED id="colonia">
                            </div>
                            <div class="div-flex">
                            <label>Estado</label>
                            <input type="text" REQUIRED id="estado">
                            </div>
                            <div class="div-flex">
                            <label>Ciudad</label>
                            <input type="text" REQUIRED id="ciudad">
                            </div>
                            <div class="div-flex">
                            <label>Codigo Postal</label>
                            <input type="number" REQUIRED id="codigoP">
                            </div>
                            <div class="div-flex">
                            <label>Numero de calle</label>
                            <input type="number" REQUIRED id="numCalle">
                            </div>
                            <div class="div-flex">
                            <label>Numero de telefono 1 </label>
                            <input type="number" REQUIRED id="numT1">
                            </div>
                            <div class="div-flex">
                            <label>Numero de telefono 2</label>
                            <input type="number" REQUIRED id="numT2">
                            </div>
                            <div class="div-flex">
                            <label>Descripcion</label>
                            <input type="text" REQUIRED id="descrip">
                            </div>
                            <div class="div-flex">
                            <label>Toke</label>
                            <input type="text" REQUIRED id="toke">
                            </div>
                            <div class="div-flex">
                            <label>Rol</label>
                            <select class="form-select" REQUIRED name="rol" id="rol">
                                        <option selected>menu</option>
                                        <option value="1" >Administrador</option>
                                        <option value="2">Vendedor</option>
                                        <option value="3">Usuario</option>
                                </select>  
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
                                <label for="">nombre</label>
                                <input type="text" REQUIRED name="nombre" id="nombre" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="">Apellido</label>
                                <input type="text" REQUIRED name="apellido" id="apellido" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" REQUIRED name="email" id="email" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" REQUIRED name="password" id="password" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="">Calle</label>
                                <input type="text" REQUIRED name="calle" id="calle" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="">Colonia</label>
                                <input type="text" REQUIRED name="colonia" id="colonia" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="">Estado</label>
                                <input type="text" REQUIRED name="estado" id="estado" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="">Ciudad</label>
                                <input type="text" REQUIRED name="ciudad" id="ciudad" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="">Codigo Postal</label>
                                <input type="number" REQUIRED name="codigoP" id="codigoP" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="">Numero de calle</label>
                                <input type="number" REQUIRED name="numCalle" id="numCalle" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="">Numero de telefono 1</label>
                                <input type="number" REQUIRED name="numT1" id="numT1" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="">Numero de telefono 2</label>
                                <input type="number" REQUIRED name="numT2" id="numT2" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="">Descripcion</label>
                                <input type="text" REQUIRED name="descrip" id="descrip" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="">Toke</label>
                                <input type="text" REQUIRED name="toke" id="toke" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="">rol</label>
                                <select class="form-select" REQUIRED name="rol" id="rol">
                                        <option selected>menu</option>
                                        <option value="1" >Administrador</option>
                                        <option value="2">Vendedor</option>
                                        <option value="3">Usuario</option>
                                </select>  
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
            <h2>Usuarios</h2>
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
                        <th>Numero Tel 1</th>
                        <th>Numero Tel 2</th>
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
                    <button type="button" class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                    <button type="button" onclick="delete_product('.$row['id_usua'].')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
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

    function save_producto() {
        let fd = new FormData();
        fd.append('nombre', document.getElementById('nombre').value);
        fd.append('apellido', document.getElementById('apellido').value);
        fd.append('email', document.getElementById('email').value);
        fd.append('password', document.getElementById('password').value);
        fd.append('calle', document.getElementById('calle').value);
        fd.append('colonia', document.getElementById('colonia').value);
        fd.append('estado', document.getElementById('estado').value);
        fd.append('ciudad', document.getElementById('ciudad').value);
        fd.append('codigoP', document.getElementById('codigoP').value);
        fd.append('numCalle', document.getElementById('numCalle').value);
        fd.append('numtel1', document.getElementById('numT1').value);
        fd.append('numtel2', document.getElementById('numT2').value);
        fd.append('descrip', document.getElementById('descrip').value);
        fd.append('toke', document.getElementById('toke').value);
        fd.append('rol', document.getElementById('rol').value);
        let request = new XMLHttpRequest();
        request.open('POST', 'queries_admin/users_save_queries_admin.php', true);
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
            request.open('POST', 'queries_admin/users_delete_queries_admin.php', true);
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
        $('#nombre').val(datos[1]);
        $('#apellido').val(datos[2]);
        $('#email').val(datos[3]);
        $('#password').val(datos[4]);
        $('#calle').val(datos[5]);
        $('#colonia').val(datos[6]);
        $('#estado').val(datos[7]);
        $('#ciudad').val(datos[8]);
        $('#codigoP').val(datos[9]);
        $('#numCalle').val(datos[10]);
        $('#numT1').val(datos[11]);
        $('#numT2').val(datos[12]);
        $('#descrip').val(datos[13]);
        $('#toke').val(datos[14]);
        $('#rol').val(datos[15]);
    });
    $(function(){
    $("#formProduct").on("submit", function(e){
        e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("formProduct"));    
        formData.append("dato", "valor");     
        $.ajax({
            url: "queries_admin/users_edit_queries_admin.php",
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