<?php
	 include '../../connection/conf_connection.php';
    $response =new stdClass();

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
    $numTel1 = $_POST['numtel1'];
    $numTel2 = $_POST['numtel2'];
    $descrip = $_POST['descrip'];
    $toke = $_POST['toke'];
    $rol = $_POST['rol'];
   
   

if($nombre==""){
    $response -> state=false;
    $response -> detail = "Ingresa nombre";
}else{
    if($apellido == ""){
        $response -> state=false;
        $response -> detail = "Ingresa el apellido";
    }else{
        if($email==""){
            $response -> state=false;
            $response -> detail = "Ingrese el correo electronico";
        }else{
            $binariosimg = mysqli_escape_string($conn, $binariosimg);
                $sql = " INSERT INTO usuario(nombre_usua,
                    apellido_usua,
                    email_usua,
                    password_usua,
                    calle_usua,
                    colonia_usua,
                    estado_usua,
                    ciudad_usua,
                    codPos_usua,
                    numeroCalle_usua,
                    numeroTel_usua,
                    numeroTel2_usua,
                    descripcion_usua,
                    toke,
                    rol_id)
                value('$nombre',
                    '$apellido',
                    '$email',
                    '$password',
                    '$calle',
                    '$colonia',
                    '$estado',
                    '$ciudad',
                     $codPos,
                     $numerocalle,
                     $numTel1,
                     $numTel2,
                    '$descrip',
                    '$toke',
                     $rol)";
                $result = mysqli_query($conn,$sql);
                if($result){
                    $response -> state=true;
                    $response -> detail = "Rejistro guardado";
                }else{
                    $response -> state=false;
                    $response -> detail = "No se pudo guardar el producto";     
                }
            
        }
    }
}

    echo json_encode($response);