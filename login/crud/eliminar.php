<?php

 $conexion = mysqli_connect("localhost:3306","root","","producto");

 // Verificar la conexión
 if (!$conexion) {
     die("La conexión falló: " . mysqli_connect_error());
 }

 if (isset($_GET["id"])) {
    $ID = $_GET["id"];
 }


 $consulta = "DELETE  FROM productos WHERE ID = $ID";
 $resultado = mysqli_query($conexion, $consulta);

if($resultado === true){
    header("Location: ./index.php");
}
else{
    echo "Hubo un error, vuelva a intentarlo nuevamente!";
}

mysqli_close($conexion);
?>