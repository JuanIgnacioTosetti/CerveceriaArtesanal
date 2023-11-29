<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establecer conexión con la base de datos
    $conexion = mysqli_connect("localhost:3306", "root", "", "producto");

    // Verificar la conexión
    if (!$conexion) {
        die("La conexión falló: " . mysqli_connect_error());
    }

    // Obtener los valores del formulario
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $imagenProducto = mysqli_real_escape_string($conexion, $_POST['imagenProducto']);
    $precio = floatval($_POST['precio']);
    $stock = intval($_POST['stock']);
   

    // Query de inserción
    $query = "INSERT INTO productos (nombreProducto, descripcion, imagenProducto, precio, stock) 
              VALUES ('$nombre', '$descripcion', '$imagenProducto', $precio, $stock)";

    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $query);

    // Verificar el resultado
    if ($resultado === true) {
        header("Location: ./index.php");
    } else {
        echo "No se pudo cargar el producto, vuelva a intentarlo";
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>
