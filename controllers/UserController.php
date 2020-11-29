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
                    window.location = "'.BASE_DIR.'User/register";
                    </script>';
            }
            else {
                echo'<script type="text/javascript">
                    alert("Usuario no registrado");
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

    public function return() //Metodo para mostrar vista de devoluciones
    {
        require_once "models/User.php"; //Requerimos el modelo de usuario
        $user = new User(); //Instanciamos un nuevo objeto de usuario
        $cartUser = $user->cart(); //Obtenemos el nombre de la vista
        require_once "views/$cartUser"; //Requerimos la vista con la direccion
    }
}
