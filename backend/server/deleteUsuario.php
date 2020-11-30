<?php

require_once("config/postJSON.php");
require_once("modelo/Usuario.php");

$usuarios = new Usuario();
echo json_encode($usuarios->delete($data->idUsuario));