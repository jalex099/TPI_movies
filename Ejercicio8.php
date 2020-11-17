<?php

$fecha= date('j');
$mes= date('m');
$anio= date('Y');
$fechaActual=$fecha."/".$mes."/".$anio;
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ejercicio 8</title>
    <script src="./js/jquery.js" charset="utf-8"></script>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script src="./bootstrap/js/bootstrap.js" charset="utf-8"></script>
    <script src="./bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  </head>
  <body class="px-3 py-2">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form class="" action="uploadData.php" method="post" enctype="multipart/form-data" target="_blank">
            <div class="form-group w-50 mx-auto">
              <label for="img">Titulo:</label>
              <input type="text" name="tituloPelicula" value="" class="form-control-file"required>
            </div>
            <div class="form-group w-50 mx-auto">
              <label for="img">Descripcion:</label>
              <input type="text" name="descripcionPelicula" value="" class="form-control-file"required>
            </div>
            <div class="form-group w-50 mx-auto">
            <label for="img">Genero:</label>
              <select name="generoPelicula" id="" required>
                <option value="Drama">Drama</option>
                <option value="Romance">Romance</option>
                <option value="Amor">Amor</option>
                <option value="Accion">Acción</option>
                <option value="Comedia">Comedia</option>
                <option value="Suspenso">Suspenso</option>
              </select>
            </div>
            <div class="form-group w-50 mx-auto">
              <label for="img">Portada:</label>
              <input type="file" name="subirArchivo" value="" class="form-control-file" id="img" required>
            </div>
            <div class="form-group w-50 mx-auto">
              <label for="img">Stock:</label>
              <input type="number" name="stockPelicula" value="" class="form-control-file"required>
            </div>
            <div class="form-group w-50 mx-auto">
              <label for="img">Precio venta:</label>
              <input type="number" step='0.01' value='0.00' placeholder='0.00' name="precioVentaPelicula" value="" class="form-control-file"required>
            </div>
            <div class="form-group w-50 mx-auto">
              <label for="img">Precio Alquiler:</label>
              <input type="number" step='0.01' value='0.00' placeholder='0.00' name="precioAlquilerPelicula" value="" class="form-control-file"required>
            </div>
            <div class="form-group w-50 mx-auto">
            <label for="img">Disponibilidad:</label>
              <select name="disponibilidadPelicula" id="" required>
                <option value="1">1</option>
                <option value="2">0</option>
              </select>
            </div>
            <div class="form-group w-50 mx-auto">
              <input type="submit" name="enviar" value="Enviar" class="btn btn-dark w-100 my-5">
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
