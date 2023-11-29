<link rel="stylesheet" href="../styles.css">

<?php

 $conexion = mysqli_connect("localhost:3306","root","","producto");

 // Verificar la conexión
 if (!$conexion) {
     die("La conexión falló: " . mysqli_connect_error());
 }

 if (isset($_GET["id"])) {
    $ID = $_GET["id"];
 }


 $consulta = "DELETE  FROM productos WHERE id = $ID";
 $resultado = mysqli_query($conexion, $consulta);

if($resultado === true){
    header("Location: ./productos.php");
}
else{
    echo '<div class="mensaje-error">' . "Hubo un error, vuelva a intentarlo nuevamente!" . '</div>';

}

mysqli_close($conexion);
?>