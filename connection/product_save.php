<?php
	include('/home/pablo/Documentos/GitHub/Fonart/connection/conf.php');
    $response =new stdClass();

    $codigoProd = $_POST['codigoProd'];
    $nombreProd = $_POST['nombreProd'];
    $descripcionProd = $_POST['descripcionProd'];
    $precioProd = $_POST['precioProd'];
    $categoriaProd = $_POST['categoriaProd'];
    $stockProd = $_POST['stockProd'];
if($nombreProd==""){
    $response -> state=false;
    $response -> detail = "Ingresa nombre";
}else{
    if($descripcionProd == ""){
        $response -> state=false;
        $response -> detail = "Ingresa la descripcion del producto";
    }else{
        if($precioProd==""){
            $response -> state=false;
            $response -> detail = "Ingrese el precio del producto";
        }else{
            if(isset($_FILES['imagen'])){
                $nombre_imagen = date("YmdHis").".jpg"; 
                $sql = "INSERT INTO producto (codigo_prod,nombre_prod,descripcion_prod,precio_prod,stock_prod,imagen_prod,categoria_id)
                VALUES('$codigoProd','$nombreProd','$descripcionProd',$precioProd,$stockProd,'$nombre_imagen',$categoriaProd)";
                $result = mysqli_query($conn,$sql);
                if($result){
                    if(move_uploaded_file($_FILES['imagen']['tmp_name'], "/home/pablo/Documentos/GitHub/Fonart/assets/img/".$nombre_imagen)){
                        $response -> state = true;
                    }else{
                        $response -> state=false;
                        $response -> detail = "Hubo un error al cargar imagen";          
                    }
                }else{
                    $response -> state=false;
                    $response -> detail = "No se pudo guardar el producto";     
                }
            }else{
                $response -> state=false;
                $response -> detail = "Ingrese la imagen";
            }
           
        }
    }
}

    echo json_encode($response);