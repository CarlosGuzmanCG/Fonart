<?php
	 include '../../connection/conf_connection.php';
    $response =new stdClass();

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
  
if($nombre==""){
    $response -> state=false;
    $response -> detail = "Ingresa la categoria";
}else{
    if($descripcion == ""){
        $response -> state=false;
        $response -> detail = "Ingresa la descripcion de la cateforia";
    }else{
                $sql = "INSERT INTO categoria (nombre_cate,descripcion_cate)
                VALUES('$nombre','$descripcion')";
                $result = mysqli_query($conn,$sql);
                if($result){
                    $response -> state=true;
                    $response -> detail = "Rejistro guardado";
                }else{
                    $response -> state=false;
                    $response -> detail = "No se pudo guardar la categoria";     
                } 
        }
    }
    echo json_encode($response);