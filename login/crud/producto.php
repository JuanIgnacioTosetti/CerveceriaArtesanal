<?php

// $conexion = mysqli_connect("servidor de base de datos", "usuario de base de datos","password de base de datos", "esquema de base de datos");

$conexion = mysqli_connect("localhost:3306","root","","producto");
echo "hola se abrio la conexion xd <br>";

$query = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $query);


while( $unaFila = mysqli_fetch_assoc($resultado)){
    //echo $unaFila["imagenProducto"]."<br>";
    echo $unaFila["nombreProducto"]."<br>";
    echo $unaFila["descripcion"]."<br>";
}

echo "<br>";
mysqli_close($conexion);
echo "Se cerro la conexion <br>";
?>