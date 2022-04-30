
<?php
	include('/home/pablo/Documentos/GitHub/Fonart/connection/conf.php');

    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];
    $id= $_POST['id'];
    

 $tipoArchivo = $_FILES['imagen-e']['type'];
            $permitido = array("image/img","image/jpeg");
            if(in_array($tipoArchivo,$permitido)==false){
                die("Archivo no permitido");
            }
            $nombreArchivo = $_FILES['imagen-e']['name'];
            $tamanioArc = $_FILES['imagen-e']['size'];
            $imgsubida = fopen($_FILES['imagen-e']['tmp_name'],'r');
            $binariosimg = fread($imgsubida,$tamanioArc);
            $imagen =addslashes(file_get_contents($_FILES['imagen-e']['tmp_name']));
           
        $sql = "UPDATE producto SET codigo_prod='$codigo',
         nombre_prod='$nombre',
         descripcion_prod='$descripcion',
         precio_prod=$precio,
         imagen_prod='$imagen',
         nombre_img_prod='$nombreArchivo',
         tipo_img_prod='$tipoArchivo',
         stock_prod=$stock,
         categoria_id=$categoria
         WHERE id_prod=$id";

         $result = mysqli_query($conn,$sql);
         if($result)
        echo("Correcto");
         else
         echo("incorrecto");

        /* imagen_prod=$binariosimg,
         nombre_img_prod='$nombreArchivo',
         tipo_img_prod='$tipoArchivo',*/