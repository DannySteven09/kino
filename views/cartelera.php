<?php
require_once('../includes/db_connection.php');
require_once('../Model/kinoModel.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartelera - Cine Kino</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header class="header-cine">
        <h1>Cartelera de Películas</h1>
    </header>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Cartelera de Películas</h2>
        <?php kinoModel::mostrarPeliculas(); ?>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
