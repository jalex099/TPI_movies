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
        if($_POST) { //Si hay datos capturados por medio del post
            //Asignamos a cada variable el valor obtenido por medio del post
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
            $data = json_decode($data, true); //Lo decodificamos para hacerlo array

            foreach ($data as $row => $list) { //Recorremos el arreglo
                if($list["idPelicula"] == $idPelicula) { //Buscamos si coincide la pelicula
                    $portadaPelicula = $list["portadaPelicula"]; //Obtenemos la portada con este
                }
            };

            //Pasamos los valores que obtuvimos al array
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
        
            $json_data = json_encode($send); //Convertimos los datos a tipo json
            $stream = stream_context_create([ //Creamos el contexto para ejecutar consulta con el json
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
        
            //Realizamos la consulta con el link
            $receive = file_get_contents("http://localhost/TPI_movies/backend/server/updatePelicula.php", false, $stream);
        
            //Si el response es verdadero se ha realizado con exito
            if($receive["response"] != false) {
                echo'<script type="text/javascript">
                    alert("Pelicula modificada con éxito");
                    </script>';
        
                echo'<script type="text/javascript">
                    window.location = "'.BASE_DIR.'Movie/preview&id='.$idPelicula.'";
                    </script>';
            }
            else { //Si el response en falso es que no se pudo realizar
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
                //Instanciamos las variables con valor nulo
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
                $data = json_decode($data, true); //Lo decodificamos para hacerlo array

                //Recorremos el arreglo en busca de coincidencias
                foreach ($data as $row => $list) {
                    if($list["idPelicula"] == $targetId) { //Si encontramos coincidencia con la pelicula
                        //Pasamos todos los valores
                        $idPelicula = $targetId;
                        $tituloPelicula = $list["tituloPelicula"];
                        $descripcionPelicula = $list["descripcionPelicula"];
                        $generoPelicula = $list["generoPelicula"];
                        $portadaPelicula = $list["portadaPelicula"];
                        $stockPelicula = $list["stockPelicula"];
                        $precioVentaPelicula = $list["precioVentaPelicula"];
                        $precioAlquilerPelicula = $list["precioAlquilerPelicula"];
                        
                        //Comprobamos la disponibilidad para poder cambiar
                        if($list["disponibilidadPelicula"] == 1) { //Si esta disponible
                            $disponibilidadPelicula = 0; //Se cambia a no disponible
                        }
                        else if($list["disponibilidadPelicula"] == 0) { //Si no esta disponible
                            $disponibilidadPelicula = 1; //Se cambia a disponible
                        }
                    }
                };

                //Elaboramos el array con todos los valores encontrados
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
            
                $json_data = json_encode($send); //Convertimos el array a json
                $stream = stream_context_create([ //Creamos el contexto para hacer la consulta
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
            
                //Realizamos la conulta por medio del json
                $receive = file_get_contents("http://localhost/TPI_movies/backend/server/updatePelicula.php", false, $stream);
            
                //Si el response es verdadero
                if($receive["response"] != false) {
                    //Confirmamos cambio
                    echo'<script type="text/javascript">
                        alert("Estado de pelicula cambiado con éxito");
                        </script>';
            
                    echo'<script type="text/javascript">
                        window.location = "'.BASE_DIR.'Movie/showMovies";
                        </script>';
                }
                else { //Si el response es falso
                    //No se logro hacer el cambio
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
            $idPelicula = $_GET["id"]; //Obtenemos el id de pelicula por el get

            //Creamos el array con el id de pelicula
            $send = array(
                "idPelicula" => $idPelicula,
            );
        
            $json_data = json_encode($send); //Convertimos el array a json
            $stream = stream_context_create([ //Creamos el contexto para poder hacer la consulta
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
        
            //Realozamos la consulta obteniendo datos del json
            $receive = file_get_contents("http://localhost/TPI_movies/backend/server/deletePelicula.php", false, $stream);
        
            if($receive["response"] != false) { //Si esl responde es verdadero
                //Confirmamos accion de eliminar
                echo'<script type="text/javascript">
                    alert("Pelicula eliminada con éxito");
                    </script>';
        
                echo'<script type="text/javascript">
                    window.location = "'.BASE_DIR.'Movie/showMovies";
                    </script>';
            }
            else { //Si el response es falso
                //No se logro realizar la eliminacion
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
