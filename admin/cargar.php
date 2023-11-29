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
    <link rel="stylesheet" href="../styles.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
</head>
<body class="cargar">
    <header class="header">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                <img src="../img/logo.png" alt="Logo"  height="50" class="d-inline-block align-text-center">
                Caracol Negro | Cerveceria Artesanal
              </a>
            </div>
            <p class="links-pag ms-3 text-start"> 
                <a  href="./productos.php">Home</a> > <a href="#">Cargar</a>
            </p>
          </nav>
    </header>

    <div class="container mt-5">
        <h2 class="mb-4">Formulario de Cervecería</h2>
        <form action="cargar.php" method="post">

            <div class="form-group">
                <label for="imgProducto">Imagen del Producto:</label>
                <input type="file" class="form-control" id="imgProducto" name="imgProducto" accept="image/*" required>
            </div>
            
            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>


            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="1" required>
            </div>

            

            <div class="mt-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-cloud-download"></i> Guardar</button>
                <a href="./productos.php" class="btn btn-danger"><i class="bi bi-x-circle"></i> Cancelar</a>
            </div>
                
        </form>
        
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
        $imgProducto = mysqli_real_escape_string($conexion, $_POST['imgProducto']);
        $precio = floatval($_POST['precio']);
        
    

        // Query de inserción
        $query = "INSERT INTO productos (nombreProducto, descripcion, imgProducto, precio) 
                VALUES ('$nombre', '$descripcion', '$imgProducto', $precio)";

        // Ejecutar la consulta
        $resultado = mysqli_query($conexion, $query);

        // Verificar el resultado
        if ($resultado === true) {
            header("Location: ./productos.php");
        } else {
            echo '<div class="mensaje-error">' . "No se pudo cargar el producto, vuelva a intentarlo" . '</div>';
        }

        // Cerrar la conexión
        mysqli_close($conexion);
    }
?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>