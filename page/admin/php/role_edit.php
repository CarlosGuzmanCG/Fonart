<?php
	include('/home/pablo/Documentos/GitHub/fonart/connection/conf.php');
        $id= $_POST['idf']; 
        $desc = $_POST['descripCat'];

        $sql = "UPDATE rol SET descripcion_rol='$desc'
         WHERE id_rol=$id";

         $result = mysqli_query($conn,$sql);
         if($result)
        echo("Correcto");
         else
         echo("incorrecto");

       