<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion de Usuarios</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha de Nacimiento</th>
            <th>Modificar Registro</th>
            <th>Cambiar Password</th>
            <th>Eliminar Registro</th>
            
        </tr>
        <?php
        include '../../../config/conexionBD.php';
        $sql = "SELECT * 
                FROM usuario";
    
        $result = $conn->query($sql);
    
        if($result->num_rows > 0){
            
            while($row = $result->fetch_assoc()){
              echo "<tr>";
                echo " <td>" . $row["usu_cedula"] . "</td>";
                echo " <td>" . $row['usu_nombres'] ."</td>";
                echo " <td>" . $row['usu_apellidos'] . "</td>";
                echo " <td>" . $row['usu_direccion'] . "</td>";
                echo " <td>" . $row['usu_telefono'] . "</td>";
                echo " <td>" . $row['usu_correo'] . "</td>";
                echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
                echo "<td>" ."<a href=modificar_registro.php?codigo=".$row['usu_codigo'].">Modificar Registro</a>"."</td>";
                echo "<td>" ."<a href=modificar_contrasena.php?codigop=".$row['usu_codigo'].">Modificar Contraseña</a>"."</td>";
                echo "<td>" ."<a href=../../controladores/eliminar_registro.php?codigod=".$row['usu_codigo'].">Eliminar Registro</a>"."</td>";
              echo "</tr>";  
            }
            
        }else{
            echo "<tr>";
                echo "<td colspan='7'>No existe ningun usuario registrado en el sistema</td>";
            echo "</tr>";
        }
    
    ?>
    </table>
    
    
</body>
</html>