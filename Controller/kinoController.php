<?php
// Controller se comunica con modelo, nunca con conexionBD.
require_once('../Model/kinoModel.php');


class kinoController
{
    //Agrega pelicula.
    public static function ctl_into_peliculas($data)
    {
        try {
            kinoModel::into_peliculas($data);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //Agrega cliente.
    public static function ctl_into_usuarios($data)
    {
        try {
            kinoModel::into_usuarios($data);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    
    
}
