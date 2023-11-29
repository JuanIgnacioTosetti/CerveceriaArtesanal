

<?php
// Establece la conexión a la base de datos (ajusta según tu configuración)
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "producto";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

// Variables para almacenar los datos actuales del producto
$idProducto = "";
$nombreProducto = "";
$descripcion = "";
$imagenProducto = "";
$precio = "";

// Verifica si se ha enviado un ID de producto válido a través de la URL
if (isset($_GET['idProducto'])) {
    $idProducto = $_GET['idProducto'];

    // Consulta para obtener los detalles del producto
    $sql = "SELECT * FROM productos WHERE idProducto = $idProducto";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombreProducto = $row['nombreProducto'];
        $descripcion = $row['descripcion'];
        $imagenProducto = $row['imagenProducto'];
        $precio = $row['precio'];
    } else {
        echo "Producto no encontrado";
    }
}

// Lógica de actualización cuando se envía el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreProducto = mysqli_real_escape_string($conn, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $imagenProducto = mysqli_real_escape_string($conn, $_POST['imagenProducto']);
    $precio = floatval($_POST['precio']);

    // Actualiza los detalles del producto en la base de datos
    $sqlUpdate = "UPDATE productos 
                  SET nombreProducto='$nombreProducto', descripcion='$descripcion', imagenProducto='$imagenProducto', 
                  precio=$precio
                  WHERE idProducto=$idProducto";

    if ($conn->query($sqlUpdate) === TRUE) {
        echo "<script>mostrarMensaje('Producto actualizado exitosamente');</script>";
        header("Location: ./index.php");
    } else {
        echo "<script>mostrarMensaje('Error al actualizar el producto');</script>";
    }
}

// Cierra la conexión
$conn->close();
?>

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
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">


    <script>
        // Función para mostrar el mensaje en el popup
        function mostrarMensaje(mensaje) {
            var popup = document.getElementById('mensajePopup');
            popup.innerHTML = mensaje;
            popup.style.display = 'block';

            // Ocultar el popup después de 3 segundos
            setTimeout(function () {
                popup.style.display = 'none';
                
                window.location.href = './index.php';
            }, 3000); 
        }
    </script>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Formulario de Cervecería</h2>
    <form action="" method="post">

        <div class="form-group">
            <label for="imagenProducto">Imagen del Producto:</label>
            <input type="file" class="form-control" id="imagenProducto" name="imagenProducto" accept="image/*">

            <!-- Muestra la imagen actual -->
            <img src="<?php echo $imagenProducto; ?>" alt="Imagen actual">

        </div>

        <div class="form-group">
            <label for="nombre">Nombre del Producto:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombreProducto; ?>" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo $descripcion; ?></textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="<?php echo $precio; ?>" required>
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-primary"><i class="bi bi-cloud-download"></i> Guardar</button>
            <a href="./index.php" class="btn btn-danger"><i class="bi bi-x-circle"></i> Cancelar</a>
        </div>
    </form>
</div>

<div id="mensajePopup" class="popup"></div>

</body>
</html>
