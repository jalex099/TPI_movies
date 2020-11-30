<?php
class MovieController //Clase controlador para acciones de Movie
{
    public function getSessionStatus() { //Metodo para devolver tipo de usuario segun la sesion
        $userType = ""; //Para capturar el tipo de usuario

        if(isset($_COOKIE["sessionID"]) && isset($_COOKIE["sessionRol"])) { //Si las cookies no estan vacias
            $userType = $_COOKIE["sessionRol"]; //Definimos el tipo de usuario con el valor de la cookie
        }
        else { //Si no existen cookies
            $userType = ""; //Se pone como vacio para usuario sin registro
        }

        return $userType; //Retornamos el estado del usuario
    }

    public function showMovies() //Metodo para mostrar vista de catalogo
    {
        require_once "models/Movie.php"; //Requerimos el modelo de pelicula
        $userType = $this->getSessionStatus(); //Para capturar el tipo de usuario

        //Obtenemos el json desde la url
        if($userType == "Administrador") {
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/readAllPelicula.php");
        }
        else {
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/readPelicula.php");
        }
        $data = json_decode($data, true); //Lo decodificamos para hacerlo json
        //var_dump($data);

        if($_POST) { //Si hay datos capturados por post
            $idDisponibilidad; //Para obtener el tipo de disponibilidad

            if($_POST["type"] == "") { //Si el post esta vacio
                $data = $data; //Muestra el catalogo normalmente
            }
            else {
                $data = $data;

                if($_POST["type"] != "Disponibilidad") { //Si hacemos una busqueda por alfabeto
                    $data = $movie->getFilter($data, $_POST["type"], $_POST["orderAD"]);
                }
                else { //Si hacemos una busqueda por disponibilidad
                    if($_POST["orderDN"] == "Disponible") { //Si seleccionamos disponible
                        $idDisponibilidad = "1";
                    }
                    else { //Si seleccionamos no disponible
                        $idDisponibilidad = "0";
                    }
                }
            }
        }
        else { //Si no hay nada enviado por el post
            $data = $data; //Mostramos el catalogo normal
        }

        $movie = new Movie(); //Instanciamos un nuevo objeto de pelicula
        $showMovies = $movie->showMovies(); //Obtenemos el nombre de la vista
        require_once "views/$showMovies"; //Requerimos la vista con la direccion
    }

    public function preview() //Metodo para mostrar vista de vista previa
    {
        require_once "models/Movie.php"; //Requerimos el modelo de pelicula
        $userType = $this->getSessionStatus(); //Para capturar el tipo de usuario

        //Obtenemos el json desde la url
        if($userType == "Administrador") { //Si el usuario es tipo administrador
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/readAllPelicula.php");
        }
        else { //Si es un cliente
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/readPelicula.php");
        }
        $data = json_decode($data, true); //Lo decodificamos para hacerlo json

        $movie = new Movie(); //Instanciamos un nuevo objeto de pelicula
        $previewMovie = $movie->preview(); //Obtenemos el nombre de la vista
        require_once "views/$previewMovie"; //Requerimos la vista con la direccion
    }

    public function sale() //Metodo para mostrar vista de registro de compras
    {
        require_once "models/Movie.php"; //Requerimos el modelo de pelicula
        $userType = $this->getSessionStatus(); //Para capturar el tipo de usuario

        //Obtenemos el json desde la url
        if($userType == "Administrador") { //Si el usuario es tipo administrador
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/readVenta.php");
            $data = json_decode($data, true); //Lo decodificamos para hacerlo json

            $movie = new Movie(); //Instanciamos un nuevo objeto de pelicula
            $saleMovie = $movie->sale(); //Obtenemos el nombre de la vista
            require_once "views/$saleMovie"; //Requerimos la vista con la direccion
        }
        else if($userType == "Cliente") { //Si es un cliente
            //Redireccionamos al home
            echo '<script type="text/javascript">
                window.location = "'.BASE_DIR.'Home/showHome";
                </script>';
        }
        else { //Si no tiene sesion
            //Redireccionamos a login
            echo '<script type="text/javascript">
                window.location = "'.BASE_DIR.'User/login";
                </script>';
        }
    }

    public function record() //Metodo para mostrar vista de registro de alquileres
    {
        require_once "models/Movie.php"; //Requerimos el modelo de pelicula
        $userType = $this->getSessionStatus(); //Para capturar el tipo de usuario

        //Obtenemos el json desde la url
        if($userType == "Administrador") { //Si el usuario es tipo administrador
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/readAlquiler.php");
            $data = json_decode($data, true); //Lo decodificamos para hacerlo json

            $movie = new Movie(); //Instanciamos un nuevo objeto de pelicula
            $recordMovie = $movie->record(); //Obtenemos el nombre de la vista
            require_once "views/$recordMovie"; //Requerimos la vista con la direccion
        }
        else if($userType == "Cliente") { //Si el usuario es cliente
            //Redireccionamos al catalogo
            echo '<script type="text/javascript">
                window.location = "'.BASE_DIR.'Movie/showMovies";
                </script>';
        }
        else { //Si no hay sesion
            //Redireccionamos a login
            echo '<script type="text/javascript">
                window.location = "'.BASE_DIR.'User/login";
                </script>';
        }
    }

    public function add() //Metodo para mostrar vista de agregar pelicula
    {
        require_once "models/Movie.php"; //Requerimos el modelo de pelicula
        $userType = $this->getSessionStatus(); //Para capturar el tipo de usuario

        if($userType == "Administrador") { //Solo damos acceso al administrador
            $movie = new Movie(); //Instanciamos un nuevo objeto de pelicula
            $addMovie = $movie->form(); //Obtenemos el nombre de la vista
            require_once "views/$addMovie"; //Requerimos la vista con la direccion
        }
        else { //Si no es administrador le denegamos el acceso
            echo '<script type="text/javascript">
                window.location = "'.BASE_DIR.'Movie/showMovies";
                </script>';
        }
    }

    public function modify() //Metodo para mostrar vista de modificar pelicula
    {
        require_once "models/Movie.php"; //Requerimos el modelo de pelicula
        $userType = $this->getSessionStatus(); //Para capturar el tipo de usuario

        if($userType == "Administrador") { //Solo permitimos acceso al aministrador
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/readAllPelicula.php");
            $data = json_decode($data, true); //Lo decodificamos para hacerlo json

            $movie = new Movie(); //Instanciamos un nuevo objeto de pelicula
            $modifyMovie = $movie->form(); //Obtenemos el nombre de la vista
            require_once "views/$modifyMovie"; //Requerimos la vista con la direccion
        }
        else { //Si no es admin entonces le denegamos el acceso
            echo '<script type="text/javascript">
                window.location = "'.BASE_DIR.'Movie/showMovies";
                </script>';
        }
    }

    public function modifyMovie() //Metodo para modificar pelicula
    {
        if($_POST) { //Si hay datos capturados po r medio del post
            $idPelicula = $_POST["idPelicula"];
            $tituloPelicula = $_POST["tituloPelicula"];
            $descripcionPelicula = $_POST["descripcionPelicula"];
            $generoPelicula = $_POST["generoPelicula"];
            $stockPelicula = $_POST["stockPelicula"];
            $precioVentaPelicula = $_POST["precioVentaPelicula"];
            $precioAlquilerPelicula = $_POST["precioAlquilerPelicula"];
            $disponibilidadPelicula = $_POST["disponibilidadPelicula"];
            $portadaPelicula = "";

            //Obtenemos el json desde la url
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/readAllPelicula.php");
            $data = json_decode($data, true); //Lo decodificamos para hacerlo json

            foreach ($data as $row => $list) {
                if($list["idPelicula"] == $idPelicula) {
                    $portadaPelicula = $list["portadaPelicula"];
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
        
            if($receive["response"] != false) {
                echo'<script type="text/javascript">
                    alert("Pelicula modificada con éxito");
                    </script>';
        
                echo'<script type="text/javascript">
                    window.location = "'.BASE_DIR.'Movie/preview&id='.$idPelicula.'";
                    </script>';
            }
            else {
                echo'<script type="text/javascript">
                    alert("No se ha logrado modificar la pelicula");
                    </script>';
        
                echo'<script type="text/javascript">
                    window.location = "'.BASE_DIR.'Movie/modify&id='.$idPelicula.'";
                    </script>';
            }
        }
        else { //Si no hay datos insertados por la url
            //Redireccionamos al catalogo
            echo'<script type="text/javascript">
                window.location = "'.BASE_DIR.'Movie/showMovies";
                </script>';
        }
    }

    public function change() //Metodo para cambiar estado de la pelicula
    {
        if($_GET) {
            $userType = $this->getSessionStatus(); //Para capturar el tipo de usuario

            if($userType == "Administrador") { //Permitimos acceso solo al administrador
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
            
                if($receive["response"] != false) {
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
            else { //Si no es admin entonces le denegamos el acceso
                echo'<script type="text/javascript">
                    window.location = "'.BASE_DIR.'Movie/showMovies";
                    </script>';
            }   
        }
        else { //Si no hay datos insertados por la url
            //Redireccionamos al catalogo
            echo'<script type="text/javascript">
                window.location = "'.BASE_DIR.'Movie/showMovies";
                </script>';
        }
    }

    public function eliminate() //Metodo para mostrar vista de eliminar pelicula
    {
        require_once "models/Movie.php"; //Requerimos el modelo de pelicula
        $userType = $this->getSessionStatus(); //Para capturar el tipo de usuario

        if($userType == "Administrador") { //Compprobamos si es admin
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/readAllPelicula.php");
            $data = json_decode($data, true); //Lo decodificamos para hacerlo json

            $movie = new Movie(); //Instanciamos un nuevo objeto de pelicula
            $eliminateMovie = $movie->form(); //Obtenemos el nombre de la vista
            require_once "views/$eliminateMovie"; //Requerimos la vista con la direccion
        }
        else { //Si no es admin entonces le denegamos el acceso
            echo'<script type="text/javascript">
                window.location = "'.BASE_DIR.'Movie/showMovies";
                </script>';
        }
    }

    public function eliminateMovie() { //Metodo para eliminar pelicula
        if($_GET) { //Si se han capturado los datos
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
        
            if($receive["response"] != false) {
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
        else { //Si no hay datos insertados por la url
            //Redireccionamos al catalogo
            echo'<script type="text/javascript">
                window.location = "'.BASE_DIR.'Movie/showMovies";
                </script>';
        }
    }
}
