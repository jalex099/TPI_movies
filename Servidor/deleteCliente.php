<?php

require_once("config/postJSON.php");
require_once("modelo/Clientes.php");

$clientes = new Clientes();
echo json_encode($clientes->delete($data->idCliente));