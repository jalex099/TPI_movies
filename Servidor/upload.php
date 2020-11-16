<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$json = file_get_contents('php://input');
$params = json_decode($json);

require_once("modelo/Peliculas.php");

$peliculas = new Peliculas();
echo json_encode($peliculas->upload($params->tituloPelicula, $params->descripcionPelicula, $params->generoPelicula, $params->portadaPelicula, $params->stockPelicula, $params->precioVentaPelicula, $params->precioAlquilerPelicula, $params->disponibilidadPelicula));