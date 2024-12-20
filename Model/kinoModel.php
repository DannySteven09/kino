<?php

require_once('../includes/db_connection.php');

class kinoModel
{
    //Guarda una pelicula
    public static function into_peliculas($data)
    {
        try {
            //Datos que se envia al procedimiento.
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

            //notifiaccion
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
            //Datos que se envia al procedimiento.
            $sql = "'" . $data['nombre'] .
                "','" . $data['apellido'] .
                "','" . $data['fecha_nacimiento'] .
                "','" . $data['telefono'] .
                "','" . $data['email'] .
                "','" . $data['contrasena'] .
                "','" . $data['rol'] . "'";

            //Ejecuta el procedimiento
            $resultado = db_connection::execute("CALL sp_into_usuarios($sql);");

            //notifiaccion
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

}

?>