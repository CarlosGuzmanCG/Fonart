<?php
	include('/home/pablo/Documentos/GitHub/fonart/connection/conf.php');
	$response=new stdClass();

	$id=$_POST['codpro'];
		$sql="delete from detalle_pedido
		where id_detap=$id";
		$result=mysqli_query($conn,$sql);
		if ($result) {
			$response->state=true;
			$response->detail="Exito";
		}else{
			$response->state=false;
			$response->detail="No se puede eliminar el producto";
		}
	echo json_encode($response);