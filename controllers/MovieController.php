<?php
class MovieController //Clase controlador para acciones de Movie
{
    public function showMovies() //Metodo para mostrar vista de catalogo
    {
        require_once "models/Movie.php"; //Requerimos el modelo de pelicula
        $movie = new Movie(); //Instanciamos un nuevo objeto de pelicula
        $showMovies = $movie->showMovies(); //Obtenemos el nombre de la vista
        require_once "views/$showMovies"; //Requerimos la vista con la direccion
    }

    public function preview() //Metodo para mostrar vista de vista previa
    {
        require_once "models/Movie.php"; //Requerimos el modelo de pelicula
        $movie = new Movie(); //Instanciamos un nuevo objeto de pelicula
        $previewMovie = $movie->preview(); //Obtenemos el nombre de la vista
        require_once "views/$previewMovie"; //Requerimos la vista con la direccion
    }

    public function add() //Metodo para mostrar vista de agregar pelicula
    {
        require_once "models/Movie.php"; //Requerimos el modelo de pelicula
        $movie = new Movie(); //Instanciamos un nuevo objeto de pelicula
        $addMovie = $movie->form(); //Obtenemos el nombre de la vista
        require_once "views/$addMovie"; //Requerimos la vista con la direccion
    }

    public function modify() //Metodo para mostrar vista de modificar pelicula
    {
        require_once "models/Movie.php"; //Requerimos el modelo de pelicula
        $movie = new Movie(); //Instanciamos un nuevo objeto de pelicula
        $modifyMovie = $movie->form(); //Obtenemos el nombre de la vista
        require_once "views/$modifyMovie"; //Requerimos la vista con la direccion
    }
}
