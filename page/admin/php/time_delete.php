<?php
	include('/home/pablo/Documentos/GitHub/fonart/connection/conf.php');
	$response=new stdClass();

	$codpro=$_POST['codpro'];
		$sql="delete from detalle_temp
		where id_temp=$codpro";
		$result=mysqli_query($conn,$sql);
		if ($result) {
			$response->state=true;
			unlink("./home/pablo/Documentos/GitHub/fonart/assets/img/".$rutimapro);
		}else{
			$response->state=false;
			$response->detail="No se puede eliminar el producto";
		}
	

	echo json_encode($response);