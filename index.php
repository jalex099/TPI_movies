<?php
require_once "render/BaseLayout.php"; //Requerimos el archivo del layout base, header y footer
require_once "config/configControllers.php"; //Requerimos el archivo de configuracion de controles

BaseLayout::renderHead(); //Incluimos el render de la cabecera con el navbar

/**************** CONTROLADOR FRONTAL *********************/
// Definimos un ontrolador por defecto
$controller = DEFAULT_CONTROLLER;

// Tomamos el controlador requerido por el usuario
if(!empty($_GET['controller'])) {
    $controller = $_GET['controller']; //Guardamos el controlador que utilizaremos para las acciones
}

$action = DEFAULT_ACTION; // Definimos una acción por defecto

// Tomamos la accion requerida por el usuario
if(!empty($_GET['action'])) {
    $action = $_GET['action']; //Guardamos el nombre de la accion para ejecutarla mas adelante
}

// Ya tenemos el controlador y la accion
// Formamos el nombre del fichero que contiene nuestro controlador
$fullController = CONTROLLERS_DIR . $controller . "Controller.php";

$controller = $controller . "Controller"; //Obtenemos el controlador parseado

// Si la variable ($controller) es un fichero lo requerimos
if(is_file($fullController)) {
    require_once ($fullController); //Requerimos el controlador para acceder a sus metodos
    $printController = new $controller(); //Instanciamos el controlador o modelo base
}
else { //Si no se encuentra el controlador
    die("<h1>Controlador no localizado - 404 Not Found</h1>"); //Matamos la conexion
}

// Si la variable $action es una función la ejecutamos o detenemos el script
if(method_exists($printController, $action)) {
    $printController->$action(); //Ejecutamos el metodo para mostrar en pantalla la accion
}
else { //Si no existe el metodo
    die("<h1>Metodo no definido - 404 Not Found</h1>"); //Matamos la conexion
}

//Mostrar el footer de la pagina solo en el catalogo y el carrito
if($action == "showMovies" || $action == "cart" || $action == "return") {
    BaseLayout::renderFoot();
}