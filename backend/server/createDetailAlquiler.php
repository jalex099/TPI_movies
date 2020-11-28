<?php

require_once("config/postJSON.php");
require_once("modelo/Alquileres.php");

$alquileres = new Alquileres();
echo json_encode($alquileres->detailAlquiler($data->idAlquiler,$data->fechaDevolucionAlquiler, $data->totalDetalleAlquiler, $data->multaDetalleAlquiler));
