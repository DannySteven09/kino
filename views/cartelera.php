<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartelera - Cine Kino</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header class="header-cine">
        <h1>Cartelera de Películas</h1>
    </header>

    <div class="cartelera-container">
        <div class="fila-peliculas">
            <!-- Película 1: Avatar 2 -->
            <div class="pelicula">
                <img src="../img/peliculas/avatar.jpg" alt="Avatar 2">
                <div class="info-pelicula">
                    <h3>Avatar 2</h3>
                    <button class="btn-reservar" onclick="reservarPelicula()">Reservar</button>
                    <button class="btn-detalle" onclick="toggleDetalle('detalle-avatar')">Ver Detalles</button>
                </div>
                <div id="detalle-avatar" class="detalle-pelicula" style="display: none;">
                    <p><strong>Sinopsis:</strong> Un épico viaje a Pandora.</p>
                    <p><strong>Clasificación:</strong> TP</p>
                    <p><strong>Duración:</strong> 150 minutos</p>
                    <p><strong>Precio:</strong> 2500 colones</p>
                </div>
            </div>
            
            <!-- Película 2: The Batman -->
            <div class="pelicula">
                <img src="../img/peliculas/batman.jpg" alt="The Batman">
                <div class="info-pelicula">
                    <h3>The Batman</h3>
                    <button class="btn-reservar" onclick="reservarPelicula()">Reservar</button>
                    <button class="btn-detalle" onclick="toggleDetalle('detalle-batman')">Ver Detalles</button>
                </div>
                <div id="detalle-batman" class="detalle-pelicula" style="display: none;">
                    <p><strong>Sinopsis:</strong> Una historia oscura del Caballero de la Noche.</p>
                    <p><strong>Clasificación:</strong> M16</p>
                    <p><strong>Duración:</strong> 180 minutos</p>
                    <p><strong>Precio:</strong> 2500 colones</p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>Cine Kino © 2024. Todos los derechos reservados</p>
    </footer>

    <script>
        function reservarPelicula() {
            window.location.href = "../views/seleccion_asientos.php"; // Enlace a la ventana de selección de asientos
        }

        function toggleDetalle(detalleId) {
            const detalle = document.getElementById(detalleId);
            detalle.style.display = detalle.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>
</html>
