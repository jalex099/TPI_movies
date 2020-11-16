<?php

$link=""; //variable que se mandara al backend como la url de la imagen

if (!empty($_FILES)) {
  $url = './img/';
  $url_temp = $url.basename($_FILES['subirArchivo']['name']);

  $tipoArchivo = strtolower(pathinfo($url_temp, PATHINFO_EXTENSION));

  if ($tipoArchivo == 'jpg' or $tipoArchivo == 'png' or $tipoArchivo or 'jpeg' ) {
      move_uploaded_file($_FILES['subirArchivo']['tmp_name'], $url_temp);
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
      $file_path = "img/".$_FILES['subirArchivo']['name'];

      //instacia de archivo
      $file = new Google_Service_Drive_DriveFile();
      $file->setName($_FILES['subirArchivo']['name']);


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
      $link = 'https://drive.google.com/uc?export=view&id='.$result->id;
      header("Location: Ejercicio8.php");
      //echo '<a href="https://drive.google.com/open?id='.$result->id.'" target="_blank">'.$result->name.'</a>';
      //echo "    <img src='https://drive.google.com/uc?export=view&id=1XAUHn4EWJRL55hu1J0-k3UiMyqC6De1Z' alt='image'>";

      }catch(Google_Service_Exception $gs){
      
        $m=json_decode($gs->getMessage());
        echo $m->error->message;

      }catch(Exception $e){
          echo $e->getMessage();
      }

  } else{
    echo "Tipo de archivo no permitido";
  }
}

 ?>
