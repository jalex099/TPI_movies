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
        //var_dump($data);

        if($_POST) {
            $idDisponibilidad;

            if($_POST["type"] == "") {
                $data = $data;
            }
            else {
                $data = $data;
                if($_POST["type"] != "Disponibilidad") {
                    $data = $movie->getFilter($data, $_POST["type"], $_POST["orderAD"]);
                }
                else {
                    if($_POST["orderDN"] == "Disponible") {
                        $idDisponibilidad = "1";
                    }
                    else {
                        $idDisponibilidad = "0";
                    }
                }
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

    public function change() //Metodo para cambiar estado de la pelicula
    {
        if($_GET) {
            $tituloPelicula = "";
            $descripcionPelicula = "";
            $generoPelicula = "";
            $stockPelicula = "";
            $precioVentaPelicula = "";
            $precioAlquilerPelicula = "";
            $disponibilidadPelicula = "";
            $portadaPelicula = "";
            $targetId = $_GET["id"];

            //Obtenemos el json desde la url
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/readPelicula.php");
            $data = json_decode($data, true); //Lo decodificamos para hacerlo json

            foreach ($data as $row => $list) {
                if($list["idPelicula"] == $targetId) {
                    $idPelicula = $targetId;
                    $tituloPelicula = $list["tituloPelicula"];
                    $descripcionPelicula = $list["descripcionPelicula"];
                    $generoPelicula = $list["generoPelicula"];
                    $portadaPelicula = $list["portadaPelicula"];
                    $stockPelicula = $list["stockPelicula"];
                    $precioVentaPelicula = $list["precioVentaPelicula"];
                    $precioAlquilerPelicula = $list["precioAlquilerPelicula"];
                    
                    if($list["disponibilidadPelicula"] == 1) {
                        $disponibilidadPelicula = 0;
                    }
                    else if($list["disponibilidadPelicula"] == 0) {
                        $disponibilidadPelicula = 1;
                    }
                }
            };

            $send = array(
                "idPelicula" => $idPelicula,
                "tituloPelicula" => $tituloPelicula,
                "descripcionPelicula" => $descripcionPelicula,
                "generoPelicula" => $generoPelicula,
                "portadaPelicula" => $portadaPelicula,
                "stockPelicula" => $stockPelicula,
                "precioVentaPelicula" => $precioVentaPelicula,
                "precioAlquilerPelicula" => $precioAlquilerPelicula,
                "disponibilidadPelicula" => $disponibilidadPelicula
            );
        
            $json_data = json_encode($send);
            $stream = stream_context_create([
                'http' => [
                    'method' => 'POST',
                    'header' => "Content-type: application/json\r\n" .
                                "Accept: application/json\r\n" .
                                "Connection: close\r\n" .
                                "Content-length: " . strlen($json_data) . "\r\n",
                    'protocol_version' => 1.1,
                    'content' => $json_data
                ],
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false
                ]
            ]);
        
            $receive = file_get_contents("http://localhost/TPI_movies/backend/server/updatePelicula.php", false, $stream);
            echo $receive;
        
            if($receive.array("response"=>true)) {
                echo'<script type="text/javascript">
                    alert("Estado de pelicula cambiado con éxito");
                    </script>';
        
                echo'<script type="text/javascript">
                    window.location = "'.BASE_DIR.'Movie/showMovies";
                    </script>';
            }
            else {
                echo'<script type="text/javascript">
                    alert("No se ha logrado cambiar el estado de la pelicula");
                    </script>';
        
                echo'<script type="text/javascript">
                    window.location = "'.BASE_DIR.'Movie/preview&id='.$targetId.'";
                    </script>';
            }
        }
        else {
            echo'<script type="text/javascript">
                    alert("No");
                    </script>';
        }
    }

    public function eliminate() //Metodo para mostrar vista de eliminar pelicula
    {
        require_once "models/Movie.php"; //Requerimos el modelo de pelicula
        $movie = new Movie(); //Instanciamos un nuevo objeto de pelicula
        $eliminateMovie = $movie->form(); //Obtenemos el nombre de la vista
        require_once "views/$eliminateMovie"; //Requerimos la vista con la direccion
    }

    public function eliminateMovie() { //Metodo para eliminar pelicula
        if($_GET) {
            $idPelicula = $_GET["id"];

            $send = array(
                "idPelicula" => $idPelicula,
            );
        
            $json_data = json_encode($send);
            $stream = stream_context_create([
                'http' => [
                    'method' => 'POST',
                    'header' => "Content-type: application/json\r\n" .
                                "Accept: application/json\r\n" .
                                "Connection: close\r\n" .
                                "Content-length: " . strlen($json_data) . "\r\n",
                    'protocol_version' => 1.1,
                    'content' => $json_data
                ],
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false
                ]
            ]);
        
            $receive = file_get_contents("http://localhost/TPI_movies/backend/server/deletePelicula.php", false, $stream);
            echo $receive;
        
            if($receive.array("response"=>true)) {
                echo'<script type="text/javascript">
                    alert("Pelicula eliminada con éxito");
                    </script>';
        
                echo'<script type="text/javascript">
                    window.location = "'.BASE_DIR.'Movie/showMovies";
                    </script>';
            }
            else {
                echo'<script type="text/javascript">
                    alert("No se ha logrado cambiar el estado de la pelicula");
                    </script>';
        
                echo'<script type="text/javascript">
                    window.location = "'.BASE_DIR.'Movie/preview&id='.$idPelicula.'";
                    </script>';
            }
        }
        else {
            echo'<script type="text/javascript">
                    alert("No");
                    </script>';
        }
    }
}
