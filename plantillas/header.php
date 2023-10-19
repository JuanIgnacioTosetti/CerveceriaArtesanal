
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caracol Negro | Cerveceria Artesanal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</head>
<body>
   
    <header class="contenedor">
        <nav class="navigation">
            <div class="contenedor-links">
                <div class="contenedor-links-registro">
                    <li class="links"><a href="./login/login.html">Iniciar Sesión</a></li>
                    <li class="links"><a href="./login/login.html">Registrarse</a></li>
                </div>
                <li class="links"><a href="#">Tienda</a></li>
                <li class="links"><a href="#">Beer Truck</a></li>
                <li class="links"><a href="#">Caracol Negro</a></li>
                <li class="links"><a href="#">Contacto</a></li>
            </div>
            
            <div class="contenedor-redes-carrito">
                <div class="redes">
                    <p><a href="#" target="_blank">IG</a> | <a href="#" target="_blank">FB</a> | <a href="#" target="_blank">WA +54119999999</a></p>
                </div>
                <div class="carrito">
                    <a href="">
                        <i class="bi bi-cart cart"></i>
                        <span class="carrito-indicador">3</span>
                    </a>
                </div>
            </div>

            <div class="contenedor__img">
                <img src="./img/logo.png" alt="logo">
            </div>
        </nav>
        
        <!-- Swipe -->
        <!-- Estructura básica de Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <img src="./img/fondo1.jpg" alt="Imagen 1">
                    <div class="slide-content">
                        <h2 class="slide-content__title">Tradición y Pasión en Cada Gotas</h2>
                        <p class="slide-content__p">Contenido: Descripción sobre la tradición y la pasión con la que se elaboran las cervezas.</p>
                        <a href="#" class="slide-button">Conoce Nuestra Historia</a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <img src="./img/fondo2.jpg" alt="Imagen 2">
                    <div class="slide-content">
                        <h2 class="slide-content__title">Sabores que Narran Historias</h2>
                        <p class="slide-content__p">Contenido: Presentación de la variedad de cervezas, ingredientes y las historias detrás de cada sabor.</p>
                        <a href="#" class="slide-button">Descubre Nuestros Sabores</a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <img src="./img/fondo3.jpg" alt="Imagen 3">
                    <div class="slide-content">
                        <h2 class="slide-content__title">Mobilidad y Experiencia Directa</h2>
                        <p class="slide-content__p">Contenido: Presentación del beer truck como una extensión de la cervecería, llevando la frescura y autenticidad de la cerveza artesanal directamente a eventos y puntos estratégicos.</p>
                        <a href="#" class="slide-button">Encuentra Nuestro Beer Truck</a>
                    </div>
                </div>

                

            </div>

            
        </div>
    </header>



</body>
</html>