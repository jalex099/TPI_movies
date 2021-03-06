<?php
    $name = $_GET['action']; //Obtenemos el nombre de la accion en la URL

    /*$dataP = file_get_contents("http://localhost/TPI_movies/backend/server/readCliente.php");
    echo $dataP;
    $dataP = json_decode($dataP, true); //Lo decodificamos para hacerlo json

    foreach($dataP as $row=>$list) {
        echo $list["idCliente"];
        echo $list["nombreCliente"];
        echo $list["apellidoCliente"];
    };*/
?>

<!-- Contenedor principal para el contenido-->
<div class="bg">
    <!-- Container del form-->
    <div class="wrapper">
        <!-- Titulo del formulario, segun sea el caso muestra un titulo distinto-->
        <div class="wrapper-title">
            <?php if($name == "login") /* Si es la vista de login*/ { ?>
            Acceder
            <?php } if($name == "register") /* Si es la vista de registro*/ { ?>
            Registro
            <?php } if($name == "modify") /* Si es la vista de modificar*/ { ?>
            Modificar
            <?php } if($name == "eliminate") /* Si es la vista de registro*/ { ?>
            Eliminar
            <?php } if($name == "add") /* Si es la vista de agregar*/ { ?>
            Nueva
            <?php } ?>
        </div>
        <!-- /Titulo del formulario-->

        <?php 
        if($name == "modify" || $name == "eliminate") {
            $targetId = $_GET["id"];
        
            foreach($data as $row=>$list){
                if($list["idPelicula"] == $targetId) {
        ?>

        <!-- Formulario, para modificar peliculas o eliminar-->
        <?php if($name == "modify") { ?>
        <form action="<?= BASE_DIR; ?>Movie/modifyMovie" method="post" enctype="multipart/form-data">
            <?php } if($name == "eliminate") { ?>
            <form action="<?= BASE_DIR; ?>Movie/eliminateMovie&id=<?= $targetId; ?>" method="post"
                enctype="multipart/form-data">
                <?php } ?>
                <input type="text" name="idPelicula" value="<?=$list["idPelicula"];?>" hidden>

                <!-- Input para ingresar titulo de pelicula-->
                <div class="field">
                    <input name="tituloPelicula" type="text" value="<?=$list["tituloPelicula"];?>"
                        <?php if($name == "eliminate") { ?> readonly <?php } ?> required>
                    <label>Título</label>
                </div>
                <!-- /Input para ingresar titulo de pelicula-->
                <!-- Input para ingresar descripcion de pelicula-->
                <div class="field-auto">
                    <textarea name="descripcionPelicula" cols="30" rows="2" <?php if($name == "eliminate") { ?> readonly
                        <?php } ?> required><?=$list["descripcionPelicula"];?></textarea>
                    <label>Descripción</label>
                </div>
                <!-- /Input para ingresar descripcion de pelicula-->
                <?php
            if($name != "eliminate") { //Muestra el genero como un select en caso que no sea la vista para eliminar
                $select = $list["generoPelicula"];
            ?>
                <!-- Select para ingresar genero de pelicula-->
                <div class="field">
                    <select name="generoPelicula" id="" required>
                        <option disabled <?php if($select == "") { ?> selected <?php } ?> value=""></option>
                        <option <?php if($select == "Drama") { ?> selected <?php } ?> value="Drama">Drama</option>
                        <option <?php if($select == "Romance") { ?> selected <?php } ?> value="Romance">Romance</option>
                        <option <?php if($select == "Documental") { ?> selected <?php } ?> value="Documental">Documental
                        </option>
                        <option <?php if($select == "Accion") { ?> selected <?php } ?> value="Accion">Acción</option>
                        <option <?php if($select == "Comedia") { ?> selected <?php } ?> value="Comedia">Comedia</option>
                        <option <?php if($select == "Suspenso") { ?> selected <?php } ?> value="Suspenso">Suspenso
                        </option>
                    </select>
                    <label>Género</label>
                </div>
                <!-- /Select para ingresar genero de pelicula-->
                <?php } else { //Si es un formulario para eliminar muestra el genero como input?>
                <!-- Input para ingresar genero de pelicula-->
                <div class="field">
                    <input name="generoPelicula" value="<?=$list["generoPelicula"];?>" type="text" readonly required>
                    <label>Género</label>
                </div>
                <!-- /Input para ingresar genero de pelicula-->
                <?php } ?>
                <!-- Input para ingresar cantidad de existencias de pelicula-->
                <div class="field">
                    <input name="stockPelicula" type="number" step="1" value="<?=$list["stockPelicula"];?>"
                        <?php if($name == "eliminate") { ?> readonly <?php } ?> required>
                    <label>Cantidad</label>
                </div>
                <!-- /Input para ingresar cantidad de existencias de pelicula-->
                <div class="field-row">
                    <!-- Input para ingresar precio por alquiler de pelicula-->
                    <div class="field-md">
                        <input name="precioAlquilerPelicula" type="number" step="0.01"
                            value="<?=$list["precioAlquilerPelicula"];?>" <?php if($name == "eliminate") { ?> readonly
                            <?php } ?> required>
                        <label>Precio Alquiler</label>
                    </div>
                    <!-- /Input para ingresar precio por alquiler de pelicula-->
                    <!-- Input para ingresar precio por compra de pelicula-->
                    <div class="field-sm">
                        <input name="precioVentaPelicula" type="number" step="0.01"
                            value="<?=$list["precioVentaPelicula"];?>" <?php if($name == "eliminate") { ?> readonly
                            <?php } ?> required>
                        <label>Precio Compra</label>
                    </div>
                    <!-- /Input para ingresar precio por compra de pelicula-->
                </div>

                <?php
            if($name != "eliminate") { //Muestra el genero como un select en caso que no sea la vista para eliminar
                $avaliable = $list["disponibilidadPelicula"];
            ?>
                <!-- Input para ingresar disponibilidad de pelicula-->
                <div class="field">
                    <select name="disponibilidadPelicula" id="" required>
                        <option disabled <?php if($avaliable == "") { ?> selected <?php } ?> value=""></option>
                        <option <?php if($avaliable == 1) { ?> selected <?php } ?> value="1">Disponible</option>
                        <option <?php if($avaliable == 0) { ?> selected <?php } ?> value="0">No disponible</option>
                    </select>
                    <label>Diponibilidad</label>
                </div>
                <?php } ?>
                <!-- /Input para ingresar disponibilidad de pelicula-->

                <!-- Submit para realizar accion de formulario-->
                <div class="field-small">
                    <?php if($name == "modify") /*Si estamos en la vista de modificacion*/ { ?>
                    <input class="btn-account" type="submit" value="Actualizar">
                    <?php } if($name == "eliminate") /*Si estamos en la vista de eliminar*/ { ?>
                    <input class="btn-account" type="submit" value="Eliminar">
                    <?php } ?>
                </div>
                <!-- /Submit para realizar accion de formulario-->
            </form>
            <?php } }; } 
        else {
        ?>

            <!-- Formulario, para login, registro y agregar peliculas-->
            <?php if($name == "add") { ?>
            <form action="<?= BASE_DIR; ?>controllers/uploadData.php" method="post" enctype="multipart/form-data">
                <?php } if($name == "login") { ?>
                <form action="<?= BASE_DIR; ?>controllers/verifyLogin.php" method="post">
                    <?php } if($name == "register") { ?>
                    <form action="<?= BASE_DIR; ?>User/registerUser" method="post">
                        <?php } ?>
                        <?php
            if($name == "login") { //Si detecta que es un login muestra solo los inputs de usuario y contrasena
            ?>
                        <!-- Input para ingresar usuario-->
                        <div class="field">
                            <input name="user" type="email" required>
                            <label>Correo</label>
                        </div>
                        <!-- /Input para ingresar usuario-->
                        <!-- Input para ingresar contrasena-->
                        <div class="field">
                            <input name="pass" type="password" required>
                            <label>Contraseña</label>
                        </div>
                        <!-- /Input para ingresar contrasena-->

                        <div class="field">
                            <a href="<?= BASE_DIR; ?>User/register">Registrarse</a>
                        </div>
                        <?php
            }
            else if ($name == "register") {
            ?>
                        <!-- Input para ingresar nombre de cliente-->
                        <div class="field">
                            <input name="nombreCliente" type="text" required>
                            <label>Nombre</label>
                        </div>
                        <!-- /Input para ingresar nombre de cliente-->
                        <!-- Input para ingresar apellido de cliente-->
                        <div class="field">
                            <input name="apellidoCliente" type="text" required>
                            <label>Apellido</label>
                        </div>
                        <!-- /Input para ingresar apellido de cliente-->
                        <!-- Input para ingresar correo de cliente-->
                        <div class="field">
                            <input name="correoCliente" type="email" required>
                            <label>Correo</label>
                        </div>
                        <!-- /Input para ingresar correo de cliente-->
                        <!-- Input para ingresar contrasena-->
                        <div class="field">
                            <input name="contraseñaCliente" type="password" required>
                            <label>Contraseña</label>
                        </div>
                        <!-- /Input para ingresar contrasena-->
                        <?php
            }
            //Si detecta que es un formulario de agregar, modificar o elminar, muestra todos los inputs de data
            else {
            ?>
                        <!-- Input para ingresar titulo de pelicula-->
                        <div class="field">
                            <input name="tituloPelicula" type="text" required>
                            <label>Título</label>
                        </div>
                        <!-- /Input para ingresar titulo de pelicula-->

                        <!-- Input para ingresar descripcion de pelicula-->
                        <div class="field-auto">
                            <textarea name="descripcionPelicula" cols="30" rows="2" required></textarea>
                            <label>Descripción</label>
                        </div>
                        <!-- /Input para ingresar descripcion de pelicula-->

                        <!-- Select para ingresar genero de pelicula-->
                        <div class="field">
                            <select name="generoPelicula" id="" required>
                                <option disabled selected value=""></option>
                                <option value="Drama">Drama</option>
                                <option value="Romance">Romance</option>
                                <option value="Amor">Amor</option>
                                <option value="Accion">Acción</option>
                                <option value="Comedia">Comedia</option>
                                <option value="Suspenso">Suspenso</option>
                            </select>
                            <label>Género</label>
                        </div>
                        <!-- /Select para ingresar genero de pelicula-->

                        <!-- Input para ingresar cantidad de existencias de pelicula-->
                        <div class="field">
                            <input name="stockPelicula" type="number" step="1" required>
                            <label>Cantidad</label>
                        </div>
                        <!-- /Input para ingresar cantidad de existencias de pelicula-->

                        <div class="field-row">
                            <!-- Input para ingresar precio por alquiler de pelicula-->
                            <div class="field-md">
                                <input name="precioAlquilerPelicula" type="number" step='0.01' value='0.00' required>
                                <label>Precio Alquiler</label>
                            </div>
                            <!-- /Input para ingresar precio por alquiler de pelicula-->

                            <!-- Input para ingresar precio por compra de pelicula-->
                            <div class="field-sm">
                                <input name="precioVentaPelicula" type="number" step='0.01' value='0.00' required>
                                <label>Precio Compra</label>
                            </div>
                            <!-- /Input para ingresar precio por compra de pelicula-->
                        </div>

                        <!-- Input para ingresar disponibilidad de pelicula-->
                        <div class="field">
                            <select name="disponibilidadPelicula" id="" required>
                                <option disabled selected value=""></option>
                                <option value="1">Disponible</option>
                                <option value="0">No disponible</option>
                            </select>
                            <label>Diponibilidad</label>
                        </div>
                        <!-- /Input para ingresar disponibilidad de pelicula-->

                        <!-- Input para ingresar imagen de pelicula-->
                        <div class="field">
                            <div class="file-upload-wrapper" data-text="Seleccionar imagen">
                                <input name="subirArchivo" type="file" class="file-upload-field" value="" required>
                            </div>
                        </div>
                        <!-- /Input para ingresar imagen de pelicula-->
                        <?php } ?>

                        <!-- Submit para realizar accion de formulario-->
                        <div class="field-small">
                            <?php if($name == "login") /*Si estamos en el login*/ { ?>
                            <input class="btn-account" type="submit" value="Iniciar Sesión">
                            <?php } if($name == "register") /*Si estamos en el registro*/ { ?>
                            <input class="btn-account" type="submit" value="Registrarse">
                            <?php } if($name == "modify") /*Si estamos en la vista de modificacion*/ { ?>
                            <input class="btn-account" type="submit" value="Actualizar">
                            <?php } if($name == "add") /*Si estamos en la vista de agregar*/ { ?>
                            <input class="btn-account" type="submit" value="Añadir">
                            <?php } ?>
                        </div>
                        <!-- /Submit para realizar accion de formulario-->
                    </form>
                    <?php } ?>
                    <!-- /Formulario, con capacidad para subir archivos-->
    </div>
    <!-- /Container del form-->
</div>
<!-- Contenedor principal para el contenido-->

<!-- Script por separado del footer para el funcionamiento de los elementos en la vista-->
<script src="<?=BASE_DIR;?>assets/js/main.js"></script>
<!-- /Script por separado del footer para el funcionamiento de los elementos en la vista-->
</body>

</html>