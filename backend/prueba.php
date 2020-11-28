<?php

/*$send = array(
            "idPelicula"=>5, 
            "tituloPelicula"=>"Valientes", 
            "descripcionPelicula"=>"Es una pelicula de drama y acción.",
            "generoPelicula"=>"Acción",
            "portadaPelicula"=>"https://drive.google.com/uc?export=view&id=1TEiJ0KXt2AiXq3ytg4EdQZlowDmqtwaO",
            "stockPelicula"=>75,
            "precioVentaPelicula"=>5.25,
            "precioAlquilerPelicula"=>10.25,
            "disponibilidadPelicula"=>1);*/
            $send = array(
                "cantidadVenta"=>3,
                "fechaVenta"=>"2020-08-19",
                "idCliente"=>1,
                "idPelicula"=>24
            );
$json_data = json_encode($send);


$stream = stream_context_create([
    'http' => [
        'method' => 'POST',
        'header' => "Content-type: application/json\r\n" .
                    "Accept: application/json\r\n" .
                    "Connection: close\r\n" .
                    "Content-length: " . strlen($json_data) . "\r\n",
        'protocol_version' => 1.1,
        'content' => $json_data
    ],
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false
    ]
]);
$data = file_get_contents("http://localhost/TPI_movies/backend/server/createVenta.php", false, $stream);
echo $data;