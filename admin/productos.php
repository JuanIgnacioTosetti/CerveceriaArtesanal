
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
   
          <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../img/logo.png" alt="Logo"  height="50" class="d-inline-block align-text-center">
                    Caracol Negro | Cerveceria Artesanal
                  </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <h2>ADMINISTRACIÓN DE PRODUCTOS</h2>
                </div>
              </div>
            </div>
          </nav>
    </header>

    <section class="tabla">
      <h2>Productos</h2>
      <div class="cargar-producto">
        <button type="button" class="btn btn-info">
            <a href="./cargar.php">
                <i class="bi bi-plus" ></i>
                Cargar Producto
            </a>
        </button>
      </div>

      <table>
          <thead>
              <tr>
                  <th>Imagen</th>
                  <th>Nombre del Producto</th>
                  <th>Descripción</th>
                  <th>Precio por Unidad</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
            
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

          
          if ($resultado) {
              
              while ($fila = mysqli_fetch_assoc($resultado)) {
                  echo "<tr>";
                  echo '<td><img src="data:image/jpeg;base64,'.base64_encode($fila['imgProducto']).'" alt="producto" width="100"></td>';
                  echo "<td>" . $fila['tituloProducto'] . "</td>";
                  echo "<td>" . $fila['descripcionProducto'] . "</td>";
                  echo "<td>$" . $fila['precioProducto'] . "</td>";
                  echo "<td>
                          <button class='btn-edit'><a href='./editar.php?id=".$fila["id"]."'>Editar</a></button>
                          <button class='btn-delete' id='eliminarBtn'>Borrar</button>
                        </td>";
                  echo "</tr>";
              }

              // Liberar el conjunto de resultados
              mysqli_free_result($resultado);
          } else {
              echo "Error en la consulta: " . mysqli_error($conexion);
          }

          // Cerrar la conexión
          mysqli_close($conexion);
?>

          </tbody>
      </table>

    </section>
    <div id="confirmarEliminar" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar Eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Realmente desea eliminar el producto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="eliminarProducto()">Eliminar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>