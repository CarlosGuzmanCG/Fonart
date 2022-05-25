<?php
	 include '../../connection/conf_connection.php';

    $nCate = $_POST['nombreCat'];
    $desCate = $_POST['descripCat'];
    $id= $_POST['idf']; 
        $sql = "UPDATE categoria SET nombre_cate='$nCate',descripcion_cate='$desCate'
         WHERE id_cate=$id";

         $result = mysqli_query($conn,$sql);
         if($result)
        echo("Correcto");
         else
         echo("incorrecto");

       