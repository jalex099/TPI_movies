<?php

require_once("config/postJSON.php");
require_once("modelo/Usuarios.php");

$usuarios = new Usuarios();
echo json_encode($usuarios->create($data->nombreUsuario, $data->apellidoUsuario, $data->correoUsuario, $data->contraseñaUsuario,$data->rolUsuario));