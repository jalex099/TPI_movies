<?php
class UserController //Clase controlador para acciones de User
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

    public function login() //Metodo para mostrar vista de login
    {
        require_once "models/User.php"; //Requerimos el modelo de usuario
        $userType = $this->getSessionStatus(); //Obtenemos la sesion

        if($userType == "") {
            $user = new User(); //Instanciamos un nuevo objeto de usuario
            $loginUser = $user->login(); //Obtenemos el nombre de la vista
            require_once "views/$loginUser"; //Requerimos la vista con la direccion
        }
        else {
            echo '<script type="text/javascript">
                window.location = "'.BASE_DIR.'Movie/showMovies";
                </script>';
        }
    }

    public function register() //Metodo para mostrar vista de registro
    {
        require_once "models/User.php"; //Requerimos el modelo de usuario
        $user = new User(); //Instanciamos un nuevo objeto de usuario
        $registerUser = $user->login(); //Obtenemos el nombre de la vista
        require_once "views/$registerUser"; //Requerimos la vista con la direccion
    }

    public function registerUser() //Metodo para registrar un nuevo usuario
    {
        if($_POST) { //Si el post esta activo y tiene valores
            //Capturamos los valores ingresados en el input
            $nombreCliente = $_POST["nombreCliente"];
            $apellidoCliente = $_POST["apellidoCliente"];
            $correoCliente = $_POST["correoCliente"];
            $contraseñaCliente = $_POST["contraseñaCliente"];

            //LLenamos un array asociativo con los valores que capturamos
            $send = array(
                    "nombreCliente" => $nombreCliente,
                    "apellidoCliente" => $apellidoCliente,
                    "correoCliente" => $correoCliente,
                    "contraseñaCliente" => $contraseñaCliente);
            $json_data = json_encode($send); //Convertimos a json


            $stream = stream_context_create([ //Creamos el contexto para la consulta
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
            //Hacemos la consulta obteniendo el json con el que hacemos la consulta
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/createCliente.php", false, $stream);

            if($data != false) { //Si nos retorna verdadero
                //Se muestra que se ha registrado el usuario
                echo'<script type="text/javascript">
                    alert("Usuario registrado");
                    </script>';

                echo'<script type="text/javascript">
                    window.location = "'.BASE_DIR.'User/login";
                    </script>';
            }
            else { //Si no se ha logrado registrar
                //Entonces nos retorna error
                echo'<script type="text/javascript">
                    alert("Usuario no registrado");
                    </script>';

                echo'<script type="text/javascript">
                    window.location = "'.BASE_DIR.'Home/showHome";
                    </script>';
            }
        }
    }

    public function deleteUser() //Metodo para eliminar usuario de la base de datos
    {
        if($_POST) { //Si se han obtenido los valores por el post
            //Agregamos el id de cliente a la variable
            $idCliente = $_POST["nombreCliente"];

            //Hacemos el array con estos valores
            $send = array(
                    "idCliente" => $idCliente);
            $json_data = json_encode($send); //Convertimos a json

            $stream = stream_context_create([ //Creamos el contexto para la consulta
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
            //Obtenemos el json con el resultado de eliminar
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/deleteCliente.php", false, $stream);

            //Si es vedadero
            if($data != false) {
                //Mostramos que se ha realizado correctamente
                echo '<script type="text/javascript">
                    alert("Usuario eliminado con éxito");
                    </script>';

                    echo '<script type="text/javascript">
                    window.location = "'.BASE_DIR.'User/register";
                    </script>';
            }
            else { //Si es falso, no se realizo la consulta
                //Se muestra que no se pudo eliminar
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
        else if($userType == "Cliente") { //Si es un cliente el que lo realiza
            $idCliente = $userId; //Obtenoms el id

            $send = array( //Se lo pasamos al array
                "idCliente" => $idCliente,
            );
            $json_data = json_encode($send); //Convertimos a json

            $stream = stream_context_create([ //Creamos el contexto para luego hacer la consulta
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
            //Obtenemos el json con el resultado de la consulta
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/readOneVenta.php", false, $stream);
        
            //Si nos arroja resultados que no sean false
            if($data != false) {
                $data = json_decode($data, true); //Lo decodificamos para hacerlo arreglo

                $user = new User(); //Instanciamos un nuevo objeto de usuario
                $shopUser = $user->shopping(); //Obtenemos el nombre de la vista
                require_once "views/$shopUser"; //Requerimos la vista con la direccion
            }
            else { //Si es falso es porque no se ha logrado obtener el listado
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

    public function return() //Metodo para mostrar vista de devolucion
    {
        require_once "models/User.php"; //Requerimos el modelo de usuario
        $userType = $this->getSessionStatus(); //Para capturar el tipo de usuario

        //Obtenemos el json desde la url
        $data = file_get_contents("http://localhost/TPI_movies/backend/server/readPelicula.php");
        $data = json_decode($data, true); //Lo decodificamos para hacerlo json

        $id = $_GET["id"];
        $idAlquiler = $_GET["idAlquiler"];

        if($userType != "Cliente") {
            echo '<script type="text/javascript">
                window.location = "'.BASE_DIR.'User/login";
                </script>';
        }
        else {
            $fechaActual = date("Y-m-d");
            $fechaRetorno = $_GET["fecha"];

            $user = new User(); //Instanciamos un nuevo objeto de usuario
            $returnUser = $user->return(); //Obtenemos el nombre de la vista
            require_once "views/$returnUser"; //Requerimos la vista con la direccion
        }
    }

    public function cart() //Metodo para mostrar vista de carrito
    {
        require_once "models/User.php"; //Requerimos el modelo de usuario
        $userType; //Para capturar el tipo de usuario

        if(isset($_COOKIE["sessionID"]) && isset($_COOKIE["sessionRol"])) { //Si las cookies no estan vacias
            $userType = $_COOKIE["sessionRol"]; //Definimos el tipo de usuario con el valor de la cookie
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

        if($userType != "Cliente") {
            echo '<script type="text/javascript">
                window.location = "'.BASE_DIR.'User/login";
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

    public function checkoutReturn() //Metodo para realizar la devolucion
    {
        if($_GET) { //Revisamos que se envien los datos por el get
            //LLenamos las variables con los valores enviados
            $idAlquiler = $_GET["id"];
            $fechaDevolucionAlquiler = $_GET["fecha"];
            $totalDetalleAlquiler = $_GET["total"];
            $multaDetalleAlquiler = $_GET["multa"];

            //Llenamos el array asociativo
            $send = array(
                    "idAlquiler" => $idAlquiler,
                    "fechaDevolucionAlquiler" => $fechaDevolucionAlquiler,
                    "totalDetalleAlquiler" => $totalDetalleAlquiler,
                    "multaDetalleAlquiler" => $multaDetalleAlquiler);
            $json_data = json_encode($send); //Convertimos a json

            $stream = stream_context_create([ //Creamos el contexto para poder realizar la consulta
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
            //Obtenemos el resultado de la consulta por medio del json
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/createDetailAlquiler.php", false, $stream);
            //echo $data;

            if($data != false) { //Si es verdadero
                //Entonces se logro realizar la transaccion
                echo '<script type="text/javascript">
                    alert("Alquiler pagado con éxito");
                    </script>';

                echo '<script type="text/javascript">
                    window.location = "'.BASE_DIR.'User/rent";
                    </script>';
            }
            else { //Si es falso
                //No se ha logrado realizar la transaccion
                echo '<script type="text/javascript">
                    alert("No se ha logrado completar pago de alquiler");
                    </script>';

                echo '<script type="text/javascript">
                    window.location = "'.BASE_DIR.'User/rent";
                    </script>';
            }
        }
    }

    public function checkoutRent() //Metodo para realizar la renta
    {
        if($_GET) {
            $fechaAlquiler = $_GET["fechaI"];
            $fechaEsperadaAlquiler = $_GET["fechaF"];
            $idCliente = $_COOKIE["sessionID"];
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

    public function checkoutBuy() //Metodo para realizar la compra
    {
        if($_GET) {
            $cantidadVenta = $_GET["cantidad"];
            $fechaVenta = $_GET["fecha"];
            $idCliente = $_COOKIE["sessionID"];
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
