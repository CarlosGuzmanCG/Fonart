
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
            if(isset($_FILES['imagen']['name'])){
            $tipoArchivo = $_FILES['imagen']['type'];
            $permitido = array("image/img","image/jpeg");
            if(in_array($tipoArchivo,$permitido)==false){
                die("Archivo no permitido");
            }
            $nombreArchivo = $_FILES['imagen']['name'];
            $tamanioArc = $_FILES['imagen']['size'];
            $imgsubida = fopen($_FILES['imagen']['tmp_name'],'r');
            $binariosimg = fread($imgsubida,$tamanioArc);

            $binariosimg = mysqli_escape_string($conn, $binariosimg);
                $sql = "INSERT INTO producto (codigo_prod,nombre_prod,descripcion_prod,precio_prod,stock_prod,imagen_prod,nombre_img_prod,tipo_img_prod,categoria_id)
                VALUES('$codigoProd','$nombreProd','$descripcionProd',$precioProd,$stockProd,'$binariosimg','$nombreArchivo','$tipoArchivo',$categoriaProd)";
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