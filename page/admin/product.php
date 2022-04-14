<!DOCTYPE html>
<html lang="en">
<?php include ('/home/pablo/Documentos/GitHub/Fonart/connection/conf.php');
?>

<head>
    <title>Administrador | Productos </title>
    <link rel="stylesheet" type="text/css" href="/css/adm_sel.css">
    <link rel="stylesheet" type="text/css" href="/assets/font-awesome-4.7.0/css/font-awesome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
                <input type="number" id="categoriaProd">
            </div>

            <div class="div-flex">
                <input type="file" id="imagen">
            </div>

            <button onclick="save_producto()">Guardar</button>
        </div>
    </div>

    <div class="modal" id="modal-producto-edit" style="display: none;">
        <div class="body-modal">
            <button class="btn-close" onclick="hide_modal('modal-producto-edit')"><i class="fa fa-times"
                    aria-hidden="true"></i></button>
            <h3>Editar datos del producto</h3>
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
                <input type="number" id="categoriaProd">
            </div>

            <div class="div-flex">
                <input type="file" id="imagen">
            </div>

            <button onclick="update_producto()">Guardar</button>
        </div>
    </div>
    <div class="main-container">
        <div class="body-nav-bar">
            <img src="/assets/Logo_FONART.png">
            <center>
                <h3>Administrador</h3>
            </center>
            <ul class="mt10">
                <li><a href="main.html">Inicio</a></li>
                <li><a href="productos.html">Productos</a></li>
                <li><a href="index.html">Pedido</a></li>
                <li><a href="">Usuario</a></li>
                <li><a href="">Detalle de tiempo</a></li>
                <li><a href="">Rol</a></li>
                <li><a href="">Salir</a></li>
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

                <body>
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
<td>'.$row['imagen_prod'].'</td>
<td>'.$row['categoria_id'].'</td>
<td>'.$row['datacreate'].'</td>
<td class="td-option">
<div class="div-flex div-td-button">
<button><i class="fa fa-pencil" aria-hidden="true"></i></button>
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
    
        function edit_product(codpro){
			let fd=new FormData();
			fd.append('codpro',codpro);
			let request=new XMLHttpRequest();
			request.open('POST','api/get_product.php',true);
			request.onload=function(){
				if (request.readyState==4 && request.status==200) {
					let response=JSON.parse(request.responseText);
					console.log(response);
					document.getElementById("codigo-e").value=codpro;
					document.getElementById("nombre-e").value=response.product.nompro;
					document.getElementById("descripcion-e").value=response.product.despro;
					document.getElementById("precio-e").value=response.product.prepro;
					document.getElementById("estado-e").value=response.product.estado;
					document.getElementById("rutimapro").src="../sistema-ecommerce/assets/products/"+response.product.rutimapro;
					document.getElementById("rutimapro-aux").value=response.product.rutimapro;
					show_modal('modal-producto-edit');
					//imagen-e
				}
			}
			request.send(fd);
		}

        function delete_product(codpro){
			var c=confirm("Estas seguro de eliminar el producto de codigo "+codpro+"?");
			if (c) {
				let fd=new FormData();
				fd.append('codpro',codpro);
				let request=new XMLHttpRequest();
				request.open('POST','/connection/delete_product.php',true);
				request.onload=function(){
					if (request.readyState==4 && request.status==200) {
						let response=JSON.parse(request.responseText);
						console.log(response);
						if (response.state) {
							alert("Producto eliminado");
							window.location.reload();
						}else{
							alert(response.detail);
						}
					}
				}
				request.send(fd);
			}
		}
      
    </script>
</body>

</html>