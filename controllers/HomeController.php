<?php
class HomeController //Clase controlador para acciones de Home
{
    public function showHome() //Metodo para mostrar vista de home
    {
        require_once "models/Home.php"; //Requerimos el modelo de home
        $home = new Home(); //Instanciamos un nuevo objeto home
        $showHome = $home->showHome(); //Obtenemos el nombre de la vista
        require_once "views/$showHome"; //Requerimos la direccion con la vista
    }
}
