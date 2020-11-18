<?php

require_once("modelo/Peliculas.php");

$peliculas = new Peliculas();
echo json_encode($peliculas->read());