<?php
	include('/home/pablo/Documentos/GitHub/fonart/connection/conf.php');
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
            if(isset($_FILES['imagen1']['name']) && isset($_FILES['imagen2']['name']) && isset($_FILES['imagen3']['name'])){
            $tipoArchivo1 = $_FILES['imagen1']['type'];
            $tipoArchivo2 = $_FILES['imagen2']['type'];
            $tipoArchivo3 = $_FILES['imagen3']['type'];
            $permitido = array("image/img","image/jpeg");
            if(in_array($tipoArchivo1,$permitido)==false && in_array($tipoArchivo2,$permitido)==false && in_array($tipoArchivo3,$permitido)==false){
                die("Archivo no permitido");
            }
            $nombreArchivo1 = $_FILES['imagen1']['name'];
            $tamanioArc1 = $_FILES['imagen1']['size'];
            $imgsubida1 = fopen($_FILES['imagen1']['tmp_name'],'r');
            $binariosimg1 = fread($imgsubida1,$tamanioArc1);

            $nombreArchivo2 = $_FILES['imagen2']['name'];
            $tamanioArc2 = $_FILES['imagen2']['size'];
            $imgsubida2 = fopen($_FILES['imagen2']['tmp_name'],'r');
            $binariosimg2 = fread($imgsubida2,$tamanioArc2);

            $nombreArchivo3 = $_FILES['imagen3']['name'];
            $tamanioArc3 = $_FILES['imagen3']['size'];
            $imgsubida3 = fopen($_FILES['imagen3']['tmp_name'],'r');
            $binariosimg3 = fread($imgsubida3,$tamanioArc3);

            $binariosimg1 = mysqli_escape_string($conn, $binariosimg1);

            $binariosimg2 = mysqli_escape_string($conn, $binariosimg2);

            $binariosimg3 = mysqli_escape_string($conn, $binariosimg3);

                $sql = "INSERT INTO
                 producto 
                 (codigo_prod,
                 nombre_prod,
                 descripcion_prod,
                 precio_prod,
                 stock_prod,

                 imagen_prod_1,
                 nombre_img_prod_1,
                 tipo_img_prod_1,

                 imagen_prod_2,
                 nombre_img_prod_2,
                 tipo_img_prod_2,

                 imagen_prod_3,
                 nombre_img_prod_3,
                 tipo_img_prod_3,

                 categoria_id)
                VALUES
                ('$codigoProd',
                '$nombreProd',
                '$descripcionProd',
                $precioProd,
                $stockProd,

                '$binariosimg1',
                '$nombreArchivo1',
                '$tipoArchivo1',
                
                '$binariosimg2',
                '$nombreArchivo2',
                '$tipoArchivo2',

                '$binariosimg3',
                '$nombreArchivo3',
                '$tipoArchivo3',

                $categoriaProd)";

                $result = mysqli_query($conn,$sql);
                if($result){
                    $response -> state=true;
                    $response -> detail = "Rejistro guardado";
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