<?php

require_once("config/postJSON.php");
require_once("modelo/Likes.php");

$likes = new Likes();
echo json_encode($likes->delete($data->idCliente,$data->idPelicula));