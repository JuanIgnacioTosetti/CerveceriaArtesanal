
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
</head>

<body>

<section class="body-login"> 
    <div class="contenedor">
            <div class="contenedor-close"><a href="./index.php">&times;</a></div>
            <img
            src="./img/productos/2.jpg"
            alt="image" style="height: 350px;">
            <div class="contenedor-text">
            <h2>Caracol Negro <br>Cerveceria Artesanal</h2>
            <p>Ingresa tus datos para iniciar sesión</p>
            <form action="./admin.php" method="post">
                    <div class="mb-3">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control">
                    </div>
        
                    <div class="mb-3">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
        
                    <input type="submit" value="Enviar" class="btn btn-dark">
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = $_POST["nombre"];
                $password = $_POST["password"];
                
                if ($nombre == "Juan" && $password == 1234) {
                    header("Location: ./admin/productos.php");
                    exit(); // Asegúrate de que el script se detenga después de la redirección
                } else {
                    echo '<div class="mensaje-error">' . "Los datos ingresados no son correctos" . '</div>';
                }
            }
            ?>

            </div>
    </div>
</section>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
