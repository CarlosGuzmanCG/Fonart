<?php
	include('/home/pablo/Documentos/GitHub/fonart/connection/conf.php');
    $response =new stdClass();

 
    $descripcion = $_POST['descripcion'];
  

    if($descripcion == ""){
        $response -> state=false;
        $response -> detail = "Ingresa la descripcion del rol";
    }else{
                $sql = "INSERT INTO rol (descripcion_rol)
                VALUES('$descripcion')";
                $result = mysqli_query($conn,$sql);
                if($result){
                    $response -> state=true;
                    $response -> detail = "Rejistro guardado";
                }else{
                    $response -> state=false;
                    $response -> detail = "No se pudo guardar el rol";     
                } 
        }
    


    echo json_encode($response);