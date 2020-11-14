<?php

$send = array("alfabeto"=>"a", "instrumento"=>"guitarra");
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
$data = file_get_contents("https://morales099.000webhostapp.com/Servidor/getFilter.php", false, $stream);
var_dump($data);