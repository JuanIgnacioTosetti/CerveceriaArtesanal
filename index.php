<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caracol Negro | Cerveceria Artesanal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</head>

<nav class="navbar navbar-expand-lg  bg-dark ">
  <div class="container-fluid">
  <a class="navbar-brand" href="#"><img src="./img/logo.png" alt="caracolNegro" width="50" ></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sobre Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tienda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./admin.php" >Ingreso</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<section class="tienda container-fluid">
    <h2 class="tienda--titulo">Tienda Cervecera</h2>
    <div class="tienda--productos">
        
    <?php
        //conexion con php
        $conexion = mysqli_connect("localhost:3306","root","","producto");

        // Verificar la conexión
        if (!$conexion) {
            die("La conexión falló: " . mysqli_connect_error());
        }

        // Consulta SQL para obtener datos de productos (reemplaza esto con tu consulta real)
        $consulta = "SELECT * FROM producto";
        $resultado = mysqli_query($conexion, $consulta); 


            // Verificar la conexión
            if ($resultado) {
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo '<div class="card" style="width: 18rem;">';
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($fila['imgProducto']).'" alt="producto">';
                    echo '<div class="card-body">';
                    echo '<h3 class="card-title"> '.$fila['tituloProducto'].'</h3>';
                    echo '<p class="card-text"> '.$fila['descripcionProducto'].'</p>';
                    echo '<p class="card-text"> '.'$'.$fila['precioProducto'].'</p>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</section>


    <!-- Botstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--  -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="./js/swipe.js"></script>
<script src="./js/openpopup.js"></script>
