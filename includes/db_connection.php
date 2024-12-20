<?php


class db_connection
{
    public static function execute($scriptSQL) {

        try {
            //Conexion a BD
            $conexion = mysqli_connect(
                'localhost',
                'root',
                'root',
                'kino_db',
            ) or die('No se puede conectar a la BD');

            //Ejecucion de Scripts a la BD
            $instruccionSQL = mysqli_query($conexion, $scriptSQL);
            $resultado = array(
                'exito' => $instruccionSQL,
                //Si hubo un error, me devueve el detalle del error
                'error' => mysqli_error($conexion),
                'conexion' => $conexion
            );

            //Devueve los posibles resultados, exito, error y conexion.
            return $resultado;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public static function getData($scriptSQL)
    {
        try {
            //Llama un objeto dentro de la misma clase.
            $resultado = self::execute($scriptSQL);
            $registros = array();
            //Valida que exito traiga un resultado o dato
            if ($resultado['exito']) {
                //Ciclo para recorrer todo lo que trae el array de resultado en exito
                while ($fila = mysqli_fetch_array($resultado['exito'], MYSQLI_ASSOC)) {
                    $registros[] = $fila;
                }
                self::desconectar($resultado['conexion'], $resultado['exito']);
            }
            return $registros;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    static function desconectar($conexion, $resultado)
    {
        try {
            //Valida si el resultado es una instancia o resultado de la BD
            if ($resultado instanceof mysqli_result) {
                mysqli_free_result($resultado);
            }
            mysqli_close($conexion);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function getNotificaciones($resultado, $mensaje)
    {
        if ($resultado['exito']) {
            echo '<script language="javascript">alert("' . $mensaje . '");</script>';
        } else {
            echo '<script language="javascript">alert("' . $resultado['error'] . '");</script>';
        }
    }

}
