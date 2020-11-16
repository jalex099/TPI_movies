<?php

require_once("config/postJSON.php");
require_once("modelo/Peliculas.php");

$peliculas = new Peliculas();
echo json_encode($peliculas->delete($data->idPelicula));