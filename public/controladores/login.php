<?php

    session_start();

    include '../../config/conexionBD.php';

    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;

    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;

    $sql = "SELECT count(*) as login  
            FROM usuario 
            WHERE usu_correo = '$usuario' and 
                  usu_password = MD5('$contrasena')";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    

    if ($row["login"] == 1) {
        $_SESSION['isLogged'] = TRUE;
        header("Location: ../../admin/vista/usuario/index.php");
    
    }else{
        header("Location: ../vista/login.html");
    }

    $conn->close();

?>