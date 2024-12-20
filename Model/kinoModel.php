<?php

require_once('../includes/db_connection.php');

class kinoModel
{
    //Guarda una pelicula
    public static function into_peliculas($data)
    {
        try {
            //Datos que se envían al procedimiento.
            $sql = "'" . $data['titulo'] .
                "','" . $data['descripcion'] .
                "','" . $data['duracion_minutos'] .
                "','" . $data['clasificacion'] .
                "','" . $data['url_imagen'] .
                "','" . $data['precio'] .
                "','" . $data['horarios'] .
                "','" . $data['numero_sala'] . "'" ;

            //Ejecuta el procedimiento
            $resultado = db_connection::execute("CALL sp_into_peliculas($sql);");

            //Notificación
            db_connection::getNotificaciones($resultado, "Registro exitoso.");

?>
            <script>
                window.location.href = '../index.html';
            </script>
<?php

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //Guarda un usuario
    public static function into_usuarios($data)
    {
        try {
            //Datos que se envían al procedimiento.
            $sql = "'" . $data['nombre'] .
                "','" . $data['apellido'] .
                "','" . $data['fecha_nacimiento'] .
                "','" . $data['telefono'] .
                "','" . $data['email'] .
                "','" . $data['contrasena'] .
                "','" . $data['rol'] . "'";

            //Ejecuta el procedimiento
            $resultado = db_connection::execute("CALL sp_into_usuarios($sql);");

            //Notificación
            db_connection::getNotificaciones($resultado, "Registro exitoso.");

?>
            <script>
                window.location.href = '../views/login.php';
            </script>
<?php

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Mostrar todas las películas en cards
    public static function mostrarPeliculas()
    {
        try {
            //Obitne los datos de las peliculas
            $sql = "SELECT titulo, precio, descripcion, clasificacion, url_imagen FROM peliculas";
            $peliculas = db_connection::getData($sql);

            //Muestra la pelicula en cards
            echo '<div class="row">';
            foreach ($peliculas as $pelicula) {
                echo '<div class="col-md-4 mb-4">';
                //Hace el card y asigna los datos
                echo '<div class="card">';
                echo '<img src="' . htmlspecialchars($pelicula['url_imagen']) . '" class="card-img-top" alt="' . htmlspecialchars($pelicula['titulo']) . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($pelicula['titulo']) . '</h5>';
                echo '<h6 class="card-subtitle mb-2 text-muted">Precio: ₡' . htmlspecialchars($pelicula['precio']) . '</h6>';
                echo '<p class="card-text">' . htmlspecialchars($pelicula['descripcion']) . '</p>';
                echo '<p class="card-text"><small class="text-muted">Clasificación: ' . htmlspecialchars($pelicula['clasificacion']) . '</small></p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
