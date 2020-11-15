<?php
/*
 * Copyright 2013 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

include_once 'API/vendor/autoload.php';

//configurar variable de entorno
putenv('GOOGLE_APPLICATION_CREDENTIALS=credenciales.json');

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->setScopes(['https://www.googleapis.com/auth/drive.file']);
try{
//instanciamos el servicio
$service = new Google_Service_Drive($client);

//ruta al archivo
$file_path = 'wall.docx';

//instacia de archivo
$file = new Google_Service_Drive_DriveFile();
$file->setName("wall.docx");


//id de la carpeta donde hemos dado el permiso a la cuenta de servicio 
$file->setParents(array("1V0QLpWARSvnz4F3W_jkqsV5-0UwuF1WR"));
$file->setDescription('archivo subido desde php');
$file->setMimeType("image/png");

$result = $service->files->create(
  $file,
  array(
    'data' => file_get_contents($file_path),
    'mimeType' => "image/png",
    'uploadType' => 'media',
  )
);

echo '<a href="https://drive.google.com/open?id='.$result->id.'" target="_blank">'.$result->name.'</a>';
echo "    <img src='https://drive.google.com/uc?export=view&id=1XAUHn4EWJRL55hu1J0-k3UiMyqC6De1Z' alt='image'>";


echo "    <img src='https://drive.google.com/uc?export=view&id=1G3zz2HpljuXOzJD_Qfa9zJZIMcqtdKGH' alt='image'>";
}catch(Google_Service_Exception $gs){
 
  $m=json_decode($gs->getMessage());
  echo $m->error->message;

}catch(Exception $e){
    echo $e->getMessage();
}

?>
