<?php

require_once("config/postJSON.php");
require_once("modelo/Ventas.php");

$ventas = new Ventas();
echo json_encode($ventas->readOneSpecific($data->idVenta));