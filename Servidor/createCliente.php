<?php

require_once("config/postJSON.php");
require_once("modelo/Clientes.php");

$clientes = new Clientes();
echo json_encode($clientes->create($data->nombreCliente, $data->apellidoCliente, $data->correoCliente, $data->contraseñaCliente));