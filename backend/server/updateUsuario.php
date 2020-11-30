<?php

require_once("config/postJSON.php");
require_once("modelo/Usuarios.php");

$usuarios = new Usuarios();
echo json_encode($usuarios->update($data->idUsuario, $data->nombreUsuario, $data->apellidoUsuario, $data->correoUsuario, $data->contraseñaUsuario));