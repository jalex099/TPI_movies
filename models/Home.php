<?php
class Home //Modelo de Home
{
    public function showHome() //Metodo para devolver nombre de la vista de inicio
    {
        $homeDir = "home.php"; //Asignar nombre del archivo
        return $homeDir; //Retornar nombre del archivo
    }
}
