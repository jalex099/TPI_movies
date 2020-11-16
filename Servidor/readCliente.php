<?php

require_once("modelo/Clientes.php");

$clientes = new Clientes();
echo json_encode($clientes->read());