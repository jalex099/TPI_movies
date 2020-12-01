<?php
require_once "../models/User.php"; //Requerimos el modelo de usuario

if ($_POST && !empty($_POST)) { //Si el post no esta vacio
    $user = $_POST["user"]; //Capturamos el correo
    $pass = $_POST["pass"]; //Caturamos la contrasena
    $valido = false; //Variable booleana para comprobar usuario valido
    $nameUser; //Para almacenar nombre de usuario
    $idUser; //Para almacenar id de usuario
    $msgError; //Para mostrar mensajes en caso de errores

    //Elaboramos el array con lo ingresado
    $send = array(
        "correoUsuario" => $user
    );
    $json_data = json_encode($send); //Decodificamos el array a json

    //Creamos el contexto del stream para manejar el json
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

    //Ejecutamos el json para que nos devuelva la respuesta
    $data = file_get_contents("http://localhost/TPI_movies/backend/server/readOneUsuario.php", false, $stream);
    $data = json_decode($data, true); //Lo decodificamos para hacerlo arreglo

    if (!isset($data["response"])) { //Si devuelve un array asociativo es un admin
        foreach ($data as $row => $list) { //Buscamos en el array la coincidenci
            if ($pass == $list["contraseñaUsuario"]) { //Si la contrasena es igual a la ingresada
                $valido = true; //Validamos la entrada
                $nameUser = $list["nombreUsuario"]; //Asignamos el nombre de usuario
                $idUser = $list["idUsuario"]; //Asignamos el ID de usuario
            } else { //Si la contrasena es incorrecta configuramos el error de contrasena
                $msgError = "Contraseña incorrecta";
            }
        };

        if (!$valido) { //Si las credenciales no son validas
            //Mostramos alerta y redireccionamos
            echo '<script type="text/javascript">
                alert("' . $msgError . ', intente de nuevo");
                </script>';

            echo '<script type="text/javascript">
                window.location = "../User/login";
                </script>';
        } else { //Si las credenciales son correctas, entramos como admin
            echo '<script type="text/javascript">
                alert("Bienvenido ' . $nameUser . '");
                </script>';

            $_SESSION["id"] = $idUser; //Obtenemos del id
            setcookie("sessionID", true, strtotime('+30 minutes'), "/"); //Creamos la cookie de la sesion
            setcookie("sessionRol", "Administrador", strtotime('+30 minutes'), "/"); //Creamos la cookie de rol

            //Redireccionamos al home
            echo '<script type="text/javascript">
                window.location = "../Home/showHome";
                </script>';
        }
    } else { //Si no lo encuentra buscamos en la tabla de clientes
        $data = file_get_contents("http://localhost/TPI_movies/backend/server/readCliente.php");
        $data = json_decode($data, true); //Lo decodificamos para hacerlo arreglo

        //Recorremos en busca de coincidencias
        foreach ($data as $row => $list) {
            if ($user == $list["correoCliente"]) { //Si se encuentra el correo
                if ($pass == $list["contraseñaCliente"]) { //Si se encuentra la contrasena
                    $valido = true; //Validamos la entrada
                    $nameUser = $list["nombreCliente"]; //Obtenemos nombre del cliente
                    $idUser = $list["idCliente"]; //Obtenemos id de cliente
                } else { //Si la contrasena es invalida enviamos el error
                    $msgError = "Contraseña incorrecta";
                }
            } else { //Si el correo es invalido enviamos el error
                $msgError = "Usuario incorrecto";
            }
        };

        if (!$valido) { //Si las credenciales no son validas
            //Mostramos alerta con error y redireccionamos al login
            echo '<script type="text/javascript">
                alert("' . $msgError . ', intente de nuevo");
                </script>';

            echo '<script type="text/javascript">
                window.location = "../User/login";
                </script>';
        } else { //Si las credenciales son correctas
            echo '<script type="text/javascript">
                alert("Bienvenido ' . $nameUser . '");
                </script>';

            //Creamos la session y las cookies
            $_SESSION["id"] = $idUser; //Obtenemos del id
            session_start(); //Iniciamos la sesion
            setcookie("sessionID", $idUser, strtotime('+30 minutes'), "/"); //Creamos la cookie de la sesion
            setcookie("sessionRol", "Cliente", strtotime('+30 minutes'), "/"); //Creamos la cookie de rol

            //Redireccionamos al home
            echo '<script type="text/javascript">
                window.location = "../Home/showHome";
                </script>';
        }
    }
}
