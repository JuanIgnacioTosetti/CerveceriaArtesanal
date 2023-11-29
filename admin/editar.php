
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cerveceria Artesanal</title>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <!-- Fin Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../styles.css">
        <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    </head>
<body>

<?php
//conexion con php
$conexion = mysqli_connect("localhost:3306", "root", "", "producto");

// Verificar la conexión
if (!$conexion) {
    die("La conexión falló: " . mysqli_connect_error());
}

if (isset($_GET["id"])) {
    $ID = mysqli_real_escape_string($conexion, $_GET["id"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tituloProducto = mysqli_real_escape_string($conexion, $_POST["tituloProducto"]);
    $descripcionProducto = mysqli_real_escape_string($conexion, $_POST["descripcionProducto"]);
    $precioProducto = mysqli_real_escape_string($conexion, $_POST["precioProducto"]);

    
    $updateQuery = "UPDATE producto SET tituloProducto='$tituloProducto', descripcionProducto='$descripcionProducto', precioProducto='$precioProducto' WHERE id='$ID'";

    $updateResult = mysqli_query($conexion, $updateQuery);

    if ($updateResult) {
        echo "Producto actualizado correctamente.";
    } else {
        echo "Error al actualizar el producto: " . mysqli_error($conexion);
    }
}

$consulta = "SELECT * FROM producto WHERE id = '$ID'";
$resultado = mysqli_query($conexion, $consulta);

// Verificar la conexión
if ($resultado) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        // Display the current data in a form for editing
        echo '<div class="container mt-4">';
        echo '<div class="row">';
        echo '<div class="col-md-6">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($fila['imgProducto']) . '" alt="producto" class="img-fluid">';
        echo '</div>';
        echo '<div class="col-md-6">';
        echo '<form method="POST" action="" enctype="multipart/form-data">';
        echo '<div class="form-group">';
        echo '<input type="text" name="tituloProducto" value="' . $fila['tituloProducto'] . '" class="form-control" required>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<input type="text" name="descripcionProducto" value="' . $fila['descripcionProducto'] . '" class="form-control" required>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<input type="text" name="precioProducto" value="' . $fila['precioProducto'] . '" class="form-control" required>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="imgProducto">Actualizar Imagen:</label>';
        echo '<input type="file" name="imgProducto" class="form-control-file">';
        echo '</div>';
        echo '<button type="submit" class="btn btn-primary">Actualizar</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
?>
</div>
</div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>