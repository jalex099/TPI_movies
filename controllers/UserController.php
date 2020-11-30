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

            if($data.array("response"=>true)) {
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

            if($data.array("response"=>true)) {
                echo'<script type="text/javascript">
                    alert("Usuario eliminado con éxito");
                    </script>';

                    echo'<script type="text/javascript">
                    window.location = "'.BASE_DIR.'User/register";
                    </script>';
            }
            else {
                echo'<script type="text/javascript">
                    alert("Usuario no eliminado");
                    </script>';
            }
        }
    }

    public function rent() //Metodo para mostrar vista de devoluciones
    {
        require_once "models/User.php"; //Requerimos el modelo de usuario
        $user = new User(); //Instanciamos un nuevo objeto de usuario
        $rentUser = $user->rent(); //Obtenemos el nombre de la vista
        require_once "views/$rentUser"; //Requerimos la vista con la direccion
    }

    public function cart() //Metodo para mostrar vista de carrito
    {
        require_once "models/User.php"; //Requerimos el modelo de usuario

        require_once "./views/userTemp.php"; //Requerimos el php verificador
        $superUser = new UserTemp(); //Instanciamos el objeto
        $userType = $superUser->getUserType(); //Obtenemos el tipo de usuario

        //Obtenemos el json desde la url
        $data = file_get_contents("http://localhost/TPI_movies/backend/server/readPelicula.php");
        $data = json_decode($data, true); //Lo decodificamos para hacerlo json

        $id = $_GET["id"];
        $type = $_GET["type"];
        $quantity = $_GET["quantity"];

        if($userType == "") {
            echo'<script type="text/javascript">
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
            $idCliente = 1;
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

            if($data.array("response"=>true)) {
                echo'<script type="text/javascript">
                    alert("Alquiler realizado con éxito");
                    </script>';

                echo'<script type="text/javascript">
                    window.location = "'.BASE_DIR.'Movie/showMovies";
                    </script>';
            }
            else {
                echo'<script type="text/javascript">
                    alert("El alquiler no se ha logrado realizar");
                    </script>';

                echo'<script type="text/javascript">
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
            $idCliente = 1;
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

            if($data.array("response"=>true)) {
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
