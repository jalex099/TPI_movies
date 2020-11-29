<?php
class MovieController //Clase controlador para acciones de Movie
{
    public function showMovies() //Metodo para mostrar vista de catalogo
    {
        require_once "models/Movie.php"; //Requerimos el modelo de pelicula
        $movie = new Movie(); //Instanciamos un nuevo objeto de pelicula
        $showMovies = $movie->showMovies(); //Obtenemos el nombre de la vista

        //Obtenemos el json desde la url
        $data = file_get_contents("http://localhost/TPI_movies/backend/server/readPelicula.php");
        $data = json_decode($data, true); //Lo decodificamos para hacerlo json

        if($_POST) {
            if($_POST["type"] == "" && $_POST["order"] == "") {
                $data = $data;
            }
            else {
                $data = $data;
                $data = $movie->getFilter($data, $_POST["type"], $_POST["order"]);
            }
        }
        else {
            $data = $data;
        }

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

    public function eliminate() //Metodo para mostrar vista de eliminar pelicula
    {
        require_once "models/Movie.php"; //Requerimos el modelo de pelicula
        $movie = new Movie(); //Instanciamos un nuevo objeto de pelicula
        $eliminateMovie = $movie->form(); //Obtenemos el nombre de la vista
        require_once "views/$eliminateMovie"; //Requerimos la vista con la direccion
    }
}
