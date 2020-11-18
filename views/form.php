<!-- Contenedor principal para el contenido-->
<div class="bg">
    <!-- Container del form-->
    <div class="wrapper">
        <?php
        $name = $_GET['action']; //Obtenemos el nombre de la accion en la URL
        ?>
        <!-- Titulo del formulario, segun sea el caso muestra un titulo distinto-->
        <div class="wrapper-title">
            <?php if($name === "login") /* Si es la vista de login*/ { ?>
            Acceder
            <?php } if($name === "modify") /* Si es la vista de modificar*/ { ?>
            Modificar
            <?php } if($name === "add") /* Si es la vista de agregar*/ { ?>
            Nueva
            <?php } ?>
        </div>
        <!-- /Titulo del formulario-->
        <!-- Formulario, con capacidad para subir archivos-->
        <form action="<?=BASE_DIR;?>/Movie/save" method="post" enctype="multipart/form-data" target="_blank">
            <?php
            if($name === "login") { //Si detecta que es un login muestra solo los inputs de usuario y contrasena
            ?>
            <!-- Input para ingresar usuario-->
            <div class="field">
                <input name="user" type="text" required>
                <label>Usuario</label>
            </div>
            <!-- /Input para ingresar usuario-->
            <!-- Input para ingresar contrasena-->
            <div class="field">
                <input name="pass" type="password" required>
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
                <input name="title" type="text" required>
                <label>Título</label>
            </div>
            <!-- /Input para ingresar titulo de pelicula-->
            <!-- Input para ingresar descripcion de pelicula-->
            <div class="field-auto">
                <textarea name="description" cols="30" rows="2" required></textarea>
                <label>Descripción</label>
            </div>
            <!-- /Input para ingresar descripcion de pelicula-->
            <?php
            if($name != "eliminate") { //Muestra el genero como un select en caso que no sea la vista para eliminar
            ?>
            <!-- Select para ingresar genero de pelicula-->
            <div class="field">
                <select name="genre" id="" required>
                    <option disabled selected value=""></option>
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                </select>
                <label>Género</label>
            </div>
            <!-- /Select para ingresar genero de pelicula-->
            <?php } else { //Si es un formulario para eliminar muestra el genero como input?>
            <!-- Input para ingresar genero de pelicula-->
            <div class="field">
                <input name="genre" type="text" required>
                <label>Género</label>
            </div>
            <!-- /Input para ingresar genero de pelicula-->
            <?php } ?>
            <!-- Input para ingresar cantidad de existencias de pelicula-->
            <div class="field">
                <input name="quantity" type="text" required>
                <label>Cantidad</label>
            </div>
            <!-- /Input para ingresar cantidad de existencias de pelicula-->
            <div class="field-row">
                <!-- Input para ingresar precio por alquiler de pelicula-->
                <div class="field-md">
                    <input name="priceRent" type="text" required>
                    <label>Precio Alquiler</label>
                </div>
                <!-- /Input para ingresar precio por alquiler de pelicula-->
                <!-- Input para ingresar precio por compra de pelicula-->
                <div class="field-sm">
                    <input name="priceBuy" type="text" required>
                    <label>Precio Compra</label>
                </div>
                <!-- /Input para ingresar precio por compra de pelicula-->
            </div>
            <!-- Input para ingresar imagen de pelicula-->
            <div class="field">
                <div class="file-upload-wrapper" data-text="Seleccionar imagen">
                    <input name="file" type="file" class="file-upload-field" value="" required>
                </div>
            </div>
            <!-- /Input para ingresar imagen de pelicula-->
            <?php } ?>

            <!-- Submit para realizar accion de formulario-->
            <div class="field-small">
                <?php if($name == "login") /*Si estamos en el login*/ { ?>
                <input class="btn-account" type="submit" value="Iniciar Sesión">
                <?php } if($name == "modify") /*Si estamos en la vista de modificacion*/ { ?>
                <input class="btn-account" type="submit" value="Actualizar">
                <?php } if($name == "add") /*Si estamos en la vista de agregar*/ { ?>
                <input class="btn-account" type="submit" value="Añadir">
                <?php } ?>
            </div>
            <!-- /Submit para realizar accion de formulario-->
        </form>
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