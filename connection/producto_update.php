<?php
	include('/home/pablo/Documentos/GitHub/Fonart/connection/conf.php');
	$response=new stdClass();

	//$response->state=true;
	$codpro=$_POST['codigoProd'];
	$nompro=$_POST['nombreProd'];
	$despro=$_POST['descripcionProd'];
	$precioprod=$_POST['precioProd'];
	$stockpro=$_POST['stockProd'];
	$categpro=$_POST['categoriaProd'];
	

	if(isset($_FILES['imagen'])){
		$nombre_imagen = date("YmdHis").".jpg";  
		$sql="update producto set nombre_prod='$nompro',descripcion_prod='$despro',
		precio_prod=$precioprod,stock_prod=$stockpro,imagen_prod='$nombre_imagen,categoria_id='$categpro'
		where codigo_prod=$codpro";
		$result=mysqli_query($con,$sql);
		if ($result) {			
		
			if(move_uploaded_file($_FILES['imagen']['tmp_name'], "/home/pablo/Documentos/GitHub/Fonart/assets/img/".$nombre_imagen)){
				$response->state=true;
			
				unlink("/home/pablo/Documentos/GitHub/Fonart/assets/img/".$rutimapro);
			}else{
				$response->state=false;
				$response->detail="Hubo un error al cargar la imagen";
			}
		}else{
			$response->state=false;
			$response->detail="No se pudo actualizar el producto";
		}
	}else{
		$sql="update producto set nombre_prod='$nompro',descripcion_prod='$despro',
		precio_prod=$precioprod,stock_prod=$stockpro
		where codigo_prod=$codpro";
		$result=mysqli_query($con,$sql);
		if ($result) {
			$response->state=true;
		}else{
			$response->state=false;
			$response->detail="No se pudo actualizar los datos";
		}
	}

	echo json_encode($response);