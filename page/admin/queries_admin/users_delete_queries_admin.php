<?php
	 include '../../connection/conf_connection.php';
	$response=new stdClass();

	$codcate=$_POST['codpro'];
		$sql="delete from usuario
		where id_usua=$codcate";
		$result=mysqli_query($conn,$sql);
		if ($result) {
			$response->state=true;
			$response->detail="Exito";
		}else{
			$response->state=false;
			$response->detail="No se puede eliminar el producto";
		}
	echo json_encode($response);