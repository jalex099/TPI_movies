<?php

require_once("config/postJSON.php");
require_once("modelo/Usuarios.php");

$usuarios = new Usuarios();
echo json_encode($usuarios->readOne($data->correoUsuario));