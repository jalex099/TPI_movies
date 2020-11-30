<?php
require_once "../models/User.php"; //Requerimos el modelo de usuario

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
    $data = json_decode($data, true); //Lo decodificamos para hacerlo arreglo

    if(!isset($data["response"])) {
        foreach($data as $row => $list) {
            if($pass == $list["contraseñaUsuario"]) {
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
                window.location = "../User/login";
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
                window.location = "../Home/showHome";
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
                window.location = "../User/login";
                </script>';
        }
        else {
            echo '<script type="text/javascript">
                alert("Bienvenido '.$nameUser.'");
                </script>';
            
            $_SESSION["id"] = $idUser; //Obtenemos del id
            setcookie("sessionID", $idUser, strtotime('+30 minutes'), "/"); //Creamos la cookie de la sesion
            setcookie("sessionRol", "Cliente", strtotime('+30 minutes'), "/"); //Creamos la cookie de rol

            echo '<script type="text/javascript">
                window.location = "../Home/showHome";
                </script>';
        }
    }
}

session_start();

$user = new User(); //Instanciamos un nuevo objeto de usuario
$loginUser = $user->login(); //Obtenemos el nombre de la vista
require_once "../views/$loginUser"; //Requerimos la vista con la direccion
?>