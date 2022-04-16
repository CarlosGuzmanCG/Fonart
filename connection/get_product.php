<?php
	include('/home/pablo/Documentos/GitHub/Fonart/connection/conf.php');
	$response=new stdClass();

	$codpro=$_POST['codpro'];
	$sql="select * from producto where codigo_prod=$codpro";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
	$obj=new stdClass();
	$obj->nompro=utf8_encode($row['nombre_prod']);
	$obj->despro=utf8_encode($row['descripcion_prod']);
	$obj->precio=$row['precio_prod'];
	$obj->stockpro=$row['stock_prod'];
	$obj->imagen=$row['imagen_prod'];
	$obj->categoria=$row['categoria_id'];

	$response->product=$obj;

	echo json_encode($response);