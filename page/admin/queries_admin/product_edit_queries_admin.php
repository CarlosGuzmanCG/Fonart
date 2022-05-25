<?php
	 include '../../connection/conf_connection.php';

    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];
    $id= $_POST['id'];
       $tipoArchivo1 = $_FILES['imagen-e1']['type'];
       $tipoArchivo2 = $_FILES['imagen-e2']['type'];
       $tipoArchivo3 = $_FILES['imagen-e3']['type'];
            $permitido = array("image/img","image/jpeg");
            if(in_array($tipoArchivo1,$permitido)==false && in_array($tipoArchivo2,$permitido)==false && in_array($tipoArchivo3,$permitido)==false){
                die("Archivo no permitido");
            }
            $nombreArchivo1 = $_FILES['imagen-e1']['name'];
            $tamanioArc1 = $_FILES['imagen-e1']['size'];
            $imgsubida1 = fopen($_FILES['imagen-e1']['tmp_name'],'r');
            $binariosimg1 = fread($imgsubida1,$tamanioArc1);
            $imagen1 =addslashes(file_get_contents($_FILES['imagen-e1']['tmp_name']));

            $nombreArchivo2 = $_FILES['imagen-e2']['name'];
            $tamanioArc2 = $_FILES['imagen-e2']['size'];
            $imgsubida2 = fopen($_FILES['imagen-e2']['tmp_name'],'r');
            $binariosimg2 = fread($imgsubida2,$tamanioArc2);
            $imagen2 =addslashes(file_get_contents($_FILES['imagen-e2']['tmp_name']));

            $nombreArchivo3 = $_FILES['imagen-e3']['name'];
            $tamanioArc3 = $_FILES['imagen-e3']['size'];
            $imgsubida3 = fopen($_FILES['imagen-e3']['tmp_name'],'r');
            $binariosimg3 = fread($imgsubida3,$tamanioArc3);
            $imagen3 =addslashes(file_get_contents($_FILES['imagen-e3']['tmp_name']));           
        $sql = "UPDATE producto SET codigo_prod='$codigo',
         nombre_prod='$nombre',
         descripcion_prod='$descripcion',
         precio_prod=$precio,

         imagen_prod_1='$imagen1',
         nombre_img_prod_1='$nombreArchivo1',
         tipo_img_prod_1='$tipoArchivo1',

         imagen_prod_2='$imagen2',
         nombre_img_prod_2='$nombreArchivo2',
         tipo_img_prod_2='$tipoArchivo2',

         imagen_prod_3='$imagen3',
         nombre_img_prod_3='$nombreArchivo3',
         tipo_img_prod_3='$tipoArchivo3',

         stock_prod=$stock,
         categoria_id=$categoria
         WHERE id_prod=$id";

         $result = mysqli_query($conn,$sql);
         if($result)
        echo("Correcto");
         else
         echo("incorrecto");