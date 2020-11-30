<?php
class UserController //Clase controlador para acciones de User
{
    public function login() //Metodo para mostrar vista de login
    {
        require_once "models/User.php"; //Requerimos el modelo de usuario
        $user = new User(); //Instanciamos un nuevo objeto de usuario
        $loginUser = $user->login(); //Obtenemos el nombre de la vista
        require_once "views/$loginUser"; //Requerimos la vista con la direccion
    }

    public function verifyLogin() {
        require_once "models/User.php"; //Requerimos el modelo de usuario

        if($_POST && !empty($_POST)) {
            $user = $_POST["user"];
            $pass = $_POST["pass"];
            $valido = false;
            $nameUser;
            $idUser;
            $msgError;

            $send = array(
                    "correoUsuario" => $user);
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

            $data = file_get_contents("http://localhost/TPI_movies/backend/server/readOneUsuario.php", false, $stream);
            echo $data;
            $data = json_decode($data, true); //Lo decodificamos para hacerlo arreglo

            if($data["response"] != false) {
                foreach($data as $row => $list) {
                    if($list["contraseñaUsuario"] == $pass) {
                        $valido = true;
                        $nameUser = $list["nombreUsuario"];
                        $idUser = $list["idUsuario"];
                    }
                    else {
                        $msgError = "Contraseña incorrecta";
                    }
                };

                if(!$valido) {
                    echo '<script type="text/javascript">
                        alert("'.$msgError.', intente de nuevo");
                        </script>';

                    echo '<script type="text/javascript">
                        window.location = "'.BASE_DIR.'User/login";
                        </script>';
                }
                else {
                    echo '<script type="text/javascript">
                        alert("Bienvenido '.$user.'");
                        </script>';
                    
                    $_SESSION["id"] = $idUser; //Obtenemos del id
                    setcookie("sessionID", true, strtotime('+30 minutes'), "/"); //Creamos la cookie de la sesion
                    setcookie("sessionRol", "Administrador", strtotime('+30 minutes'), "/"); //Creamos la cookie de rol

                    echo '<script type="text/javascript">
                        window.location = "'.BASE_DIR.'Home/showHome";
                        </script>';
                }
            }
            else {
                $data = file_get_contents("http://localhost/TPI_movies/backend/server/readCliente.php");
                $data = json_decode($data, true); //Lo decodificamos para hacerlo arreglo

                foreach($data as $row => $list) {
                    if($user == $list["correoCliente"]) {
                        if($pass == $list["contraseñaCliente"]) {
                            $valido = true;
                            $nameUser = $list["nombreCliente"];
                            $idUser = $list["idCliente"];
                        }
                        else {
                            $msgError = "Contraseña incorrecta";
                        }
                    }
                    else {
                        $msgError = "Usuario incorrecto";
                    }
                };

                if(!$valido) {
                    echo '<script type="text/javascript">
                        alert("'.$msgError.', intente de nuevo");
                        </script>';

                    echo '<script type="text/javascript">
                        window.location = "'.BASE_DIR.'User/login";
                        </script>';
                }
                else {
                    echo '<script type="text/javascript">
                        alert("Bienvenido '.$nameUser.'");
                        </script>';
                    
                    $_SESSION["id"] = $idUser; //Obtenemos del id
                    setcookie("sessionID", $idUser, strtotime('+30 minutes'), "/"); //Creamos la cookie de la sesion
                    setcookie("sessionRol", "Administrador", strtotime('+30 minutes'), "/"); //Creamos la cookie de rol

                    echo '<script type="text/javascript">
                        window.location = "'.BASE_DIR.'Home/showHome";
                        </script>';
                }
            }
        }

        $user = new User(); //Instanciamos un nuevo objeto de usuario
        $loginUser = $user->login(); //Obtenemos el nombre de la vista
        require_once "views/$loginUser"; //Requerimos la vista con la direccion
    }

    public function register() //Metodo para mostrar vista de registro
    {
        require_once "models/User.php"; //Requerimos el modelo de usuario
        $user = new User(); //Instanciamos un nuevo objeto de usuario
        $registerUser = $user->login(); //Obtenemos el nombre de la vista
        require_once "views/$registerUser"; //Requerimos la vista con la direccion
    }

    public function registerUser()
    {
        if($_POST) {
            $nombreCliente = $_POST["nombreCliente"];
            $apellidoCliente = $_POST["apellidoCliente"];
            $correoCliente = $_POST["correoCliente"];
            $contraseñaCliente = $_POST["contraseñaCliente"];

            $send = array(
                    "nombreCliente" => $nombreCliente,
                    "apellidoCliente" => $apellidoCliente,
                    "correoCliente" => $correoCliente,
                    "contraseñaCliente" => $contraseñaCliente);
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
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/createCliente.php", false, $stream);
            echo $data;

            if($data != false) {
                echo'<script type="text/javascript">
                    alert("Usuario registrado");
                    </script>';

                echo'<script type="text/javascript">
                    window.location = "'.BASE_DIR.'User/login";
                    </script>';
            }
            else {
                echo'<script type="text/javascript">
                    alert("Usuario no registrado");
                    </script>';

                echo'<script type="text/javascript">
                    window.location = "'.BASE_DIR.'Home/showHome";
                    </script>';
            }
        }
    }

    public function deleteUser()
    {
        if($_POST) {
            $idCliente = $_POST["nombreCliente"];

            $send = array(
                    "idCliente" => $idCliente);
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
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/deleteCliente.php", false, $stream);
            echo $data;

            if($data != false) {
                echo '<script type="text/javascript">
                    alert("Usuario eliminado con éxito");
                    </script>';

                    echo '<script type="text/javascript">
                    window.location = "'.BASE_DIR.'User/register";
                    </script>';
            }
            else {
                echo '<script type="text/javascript">
                    alert("Usuario no eliminado");
                    </script>';
            }
        }
    }

    public function sale() //Metodo para mostrar vista de registro de compras
    {
        require_once "models/User.php"; //Requerimos el modelo de usuario
        $userType; //Para capturar el tipo de usuario
        $userId; //Para el id de usuario

        if(isset($_COOKIE["sessionID"]) && isset($_COOKIE["sessionRol"])) { //Si las cookies no estan vacias
            $userType = $_COOKIE["sessionRol"]; //Definimos el tipo de usuario con el valor de la cookie
            $userId = $_COOKIE["sessionID"]; //Definimos el id de usuario
        }
        else { //Si no existen cookies
            $userType = ""; //Se pone como vacio para usuario sin registro
        }

        //Obtenemos el json desde la url
        if($userType == "Administrador") { //Si el usuario es tipo administrador
            echo '<script type="text/javascript">
                window.location = "'.BASE_DIR.'Home/showHome";
                </script>';
        }
        else if($userType == "Cliente") {
            $idCliente = $userId;

            $send = array(
                "idCliente" => $idCliente,
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
        
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/readOneVenta.php", false, $stream);
        
            if($data != false) {
                $data = json_decode($data, true); //Lo decodificamos para hacerlo arreglo

                $user = new User(); //Instanciamos un nuevo objeto de usuario
                $shopUser = $user->shopping(); //Obtenemos el nombre de la vista
                require_once "views/$shopUser"; //Requerimos la vista con la direccion
            }
            else {        
                echo '<script type="text/javascript">
                    window.location = "'.BASE_DIR.'Home/showHome";
                    </script>';
            }
        }
        else {
            echo '<script type="text/javascript">
                window.location = "'.BASE_DIR.'User/login";
                </script>';
        }
    }

    public function rent() //Metodo para mostrar vista de registro de alquileres
    {
        require_once "models/User.php"; //Requerimos el modelo de usuario
        $userType; //Para capturar el tipo de usuario
        $userId; //Para el id de usuario

        if(isset($_COOKIE["sessionID"]) && isset($_COOKIE["sessionRol"])) { //Si las cookies no estan vacias
            $userType = $_COOKIE["sessionRol"]; //Definimos el tipo de usuario con el valor de la cookie
            $userId = $_COOKIE["sessionID"]; //Definimos el id de usuario
        }
        else { //Si no existen cookies
            $userType = ""; //Se pone como vacio para usuario sin registro
        }

        //Obtenemos el json desde la url
        if($userType == "Administrador") { //Si el usuario es tipo administrador
            echo '<script type="text/javascript">
                window.location = "'.BASE_DIR.'Home/showHome";
                </script>';
        }
        else if($userType == "Cliente") { //Si esl usuario es un cliente
            $idCliente = $userId;

            $send = array(
                "idCliente" => $idCliente,
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
        
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/readOneAlquiler.php", false, $stream);
        
            if($data != false) {
                $data = json_decode($data, true); //Lo decodificamos para hacerlo json

                $user = new User(); //Instanciamos un nuevo objeto de usuario
                $rentUser = $user->rent(); //Obtenemos el nombre de la vista
                require_once "views/$rentUser"; //Requerimos la vista con la direccion
            }
            else {        
                echo '<script type="text/javascript">
                    window.location = "'.BASE_DIR.'Home/showHome";
                    </script>';
            }
        }
        else {
            echo '<script type="text/javascript">
                window.location = "'.BASE_DIR.'User/login";
                </script>';
        }
    }

    public function cart() //Metodo para mostrar vista de carrito
    {
        require_once "models/User.php"; //Requerimos el modelo de usuario
        $userType; //Para capturar el tipo de usuario

        if(isset($_COOKIE["sessionID"]) && isset($_COOKIE["sessionRol"])) { //Si las cookies no estan vacias
            $userType = $_COOKIE["sessionRol"]; //Definimos el tipo de usuario con el valor de la cookie
            $userId = $_COOKIE["sessionID"]; //Definimos el id de usuario
        }
        else { //Si no existen cookies
            $userType = ""; //Se pone como vacio para usuario sin registro
        }

        //Obtenemos el json desde la url
        $data = file_get_contents("http://localhost/TPI_movies/backend/server/readPelicula.php");
        $data = json_decode($data, true); //Lo decodificamos para hacerlo json

        $id = $_GET["id"];
        $type = $_GET["type"];
        $quantity = $_GET["quantity"];

        if($userType == "") {
            echo '<script type="text/javascript">
                window.location = "'.BASE_DIR.'User/register";
                </script>';
        }
        else {
            $fechaActual = date("Y-m-d");
            $fechaRetorno = date("Y-m-d",strtotime($fechaActual."+ 1 week"));

            $user = new User(); //Instanciamos un nuevo objeto de usuario
            $cartUser = $user->cart(); //Obtenemos el nombre de la vista
            require_once "views/$cartUser"; //Requerimos la vista con la direccion
        }
    }

    public function checkoutRent()
    {
        if($_GET) {
            $fechaAlquiler = $_GET["fechaI"];
            $fechaEsperadaAlquiler = $_GET["fechaF"];
            $idCliente = "2";
            $idPelicula = $_GET["id"];

            $send = array(
                    "fechaAlquiler" => $fechaAlquiler,
                    "fechaEsperadaAlquiler" => $fechaEsperadaAlquiler,
                    "idCliente" => $idCliente,
                    "idPelicula" => $idPelicula);
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
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/createAlquiler.php", false, $stream);
            echo $data;

            if($data != false) {
                echo '<script type="text/javascript">
                    alert("Alquiler realizado con éxito");
                    </script>';

                echo '<script type="text/javascript">
                    window.location = "'.BASE_DIR.'Movie/showMovies";
                    </script>';
            }
            else {
                echo '<script type="text/javascript">
                    alert("El alquiler no se ha logrado realizar");
                    </script>';

                echo '<script type="text/javascript">
                    window.location = "'.BASE_DIR.'User/cart&id='.$idPelicula.'&type=1&quantity=1";
                    </script>';
            }
        }
    }

    public function checkoutBuy()
    {
        if($_GET) {
            $cantidadVenta = $_GET["cantidad"];
            $fechaVenta = $_GET["fecha"];
            $idCliente = "2";
            $idPelicula = $_GET["id"];

            $send = array(
                    "cantidadVenta" => $cantidadVenta,
                    "fechaVenta" => $fechaVenta,
                    "idCliente" => $idCliente,
                    "idPelicula" => $idPelicula);
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
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/createVenta.php", false, $stream);
            echo $data;

            if($data != false) {
                echo'<script type="text/javascript">
                    alert("Compra realizada con éxito");
                    </script>';

                echo'<script type="text/javascript">
                    window.location = "'.BASE_DIR.'Movie/showMovies";
                    </script>';
            }
            else {
                echo'<script type="text/javascript">
                    alert("La compra no se ha logrado realizar");
                    </script>';

                echo'<script type="text/javascript">
                    window.location = "'.BASE_DIR.'User/cart&id='.$idPelicula.'&type=1&quantity=1";
                    </script>';
            }
        }
    }
}
