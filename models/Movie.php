<?php
class Movie //Modelo de Movie
{
    public function showMovies() //Metodo para devolver nombre de la vista de catalogo
    {
        $movieDir = "list.php"; //Asignar nombre del archivo
        return $movieDir; //Retornar nombre del archivo
    }
    public function preview() //Metodo para devolver nombre de la vista de vista previa
    {
        $movieDir = "preview.php"; //Asignar nombre del archivo
        return $movieDir; //Retornar nombre del archivo
    }
    public function form() //Metodo para devolver nombre de la vista de formulario para agregar, modificar o eliminar
    {
        $formDir = "form.php"; //Asignar nombre del archivo
        return $formDir; //Retornar nombre del archivo
    }
}
