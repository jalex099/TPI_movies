<?php

require_once("config/postJSON.php");
require_once("modelo/Alquileres.php");

$alquileres = new Alquileres();
echo json_encode($alquileres->readOne($data->idCliente));