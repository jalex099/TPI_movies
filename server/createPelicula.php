<?php

require_once("config/postJSON.php");
require_once("modelo/Peliculas.php");

$peliculas = new Peliculas();
echo json_encode($peliculas->create($data->tituloPelicula, $data->descripcionPelicula, $data->generoPelicula, $data->portadaPelicula, $data->stockPelicula, $data->precioVentaPelicula, $data->precioAlquilerPelicula, $data->disponibilidadPelicula));