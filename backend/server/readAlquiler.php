<?php

require_once("modelo/Alquileres.php");

$alquileres = new Alquileres();
echo json_encode($alquileres->read());