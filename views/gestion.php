<?php
require_once('../Controller/kinoController.php');
include('../assets/templates/header.php');
include('../assets/templates/sidebar.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = array(
        'titulo' => $_POST['titulo'],
        'descripcion' => $_POST['descripcion'],
        'duracion_minutos' => $_POST['duracion_minutos'],
        'clasificacion' => $_POST['clasificacion'],
        'url_imagen' => $_POST['url_imagen'],
        'precio' => $_POST['precio'],
        'horarios' => $_POST['horarios'],
        'numero_sala' => $_POST['numero_sala']
    );

    kinoController::ctl_into_peliculas($data);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Película</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Agregar Nueva Película</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
            </div>
            <div class="mb-3">
                <label for="duracion_minutos" class="form-label">Duración (min)</label>
                <input type="number" class="form-control" id="duracion_minutos" name="duracion_minutos" required>
            </div>
            <div class="mb-3">
                <label for="clasificacion" class="form-label">Clasificación</label>
                <select class="form-control" id="clasificacion" name="clasificacion">
                    <option value="TP">Todo Público</option>
                    <option value="M15">Mayores de 15</option>
                    <option value="M18">Mayores de 18</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="url_imagen" class="form-label">URL de Imagen</label>
                <input type="text" class="form-control" id="url_imagen" name="url_imagen" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio por Entrada (₡)</label>
                <input type="number" class="form-control" id="precio" name="precio" required>
            </div>
            <div class="mb-3">
                <label for="horarios" class="form-label">Horarios (separados por coma)</label>
                <input type="text" class="form-control" id="horarios" name="horarios" placeholder="Ej. 12:00, 14:30, 17:00" required>
            </div>
            <div class="mb-3">
                <label for="numero_sala" class="form-label">Número de Sala</label>
                <input type="number" class="form-control" id="numero_sala" name="numero_sala" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Película</button>
        </form>

        <h2 class="text-center mt-5">Lista de Películas</h2>
        <div id="lista-peliculas">

        </div>
    </div>

    <?php include('../assets/templates/footer.php'); ?>
    <script src="../assets/js/gestion.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>