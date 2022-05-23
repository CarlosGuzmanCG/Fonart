<?php
	include('/home/pablo/Documentos/GitHub/fonart/connection/conf.php');
    $response =new stdClass();

    $pedidoId = $_POST['pedidoId'];
    $ProductoId = $_POST['ProductoId'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
  
  if($pedidoId==""){
    $response -> state=false;
    $response -> detail = "Ingrese el Id del pedido";
  }else{
     if($ProductoId==""){
        $response -> state=false;
        $response -> detail = "Ingrese el Id del producto";
     } 
  
if($precio==""){
    $response -> state=false;
    $response -> detail = "Ingrese el precio";
}else{

    if($cantidad == ""){
        $response -> state=false;
        $response -> detail = "Ingresa la cantidad";
    }else{
                $sql = "INSERT INTO detalle_pedido (pedido_id,producto_id,precio_detap,cantidad_detap)
                VALUES($pedidoId,$ProductoId,$precio,$cantidad)";
                $result = mysqli_query($conn,$sql);
                if($result){
                    $response -> state=true;
                    $response -> detail = "Rejistro guardado";
                }else{
                    $response -> state=false;
                    $response -> detail = "No se pudo guardar el registro";     
                } 
        }
    }
}
    echo json_encode($response);