<?php
	 include '../../connection/conf_connection.php';

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $calle = $_POST['calle'];
    $colonia = $_POST['colonia'];
    $estado = $_POST['estado'];
    $ciudad = $_POST['ciudad'];
    $codPos = $_POST['codigoP'];
    $numerocalle = $_POST['numCalle'];
    $numTel1 = $_POST['numT1'];
    $numTel2 = $_POST['numT2'];
    $descrip = $_POST['descrip'];
    $toke = $_POST['toke'];
    $rol = $_POST['rol'];

    $sql = "UPDATE usuario SET 
        nombre_usua = '$nombre',
        apellido_usua = '$apellido',
        email_usua = '$email',
        password_usua = '$password',
        calle_usua = '$calle',
        colonia_usua = '$colonia',
        estado_usua = '$estado',
        ciudad_usua = '$ciudad',
        codPos_usua = $codPos,
        numeroCalle_usua = $numerocalle,
        numeroTel_usua = $numTel1,
        numeroTel2_usua = $numTel2,
        descripcion_usua = '$descrip',
        toke = '$toke',
        rol_id = '$rol'       
         WHERE id_usua = $id";

         $result = mysqli_query($conn,$sql);
         if($result)
        echo("Correcto");
         else
         echo("incorrecto");
       


