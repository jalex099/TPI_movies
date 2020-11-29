<?php
require_once "userTemp.php";
$superUser = new UserTemp();
$userType = $superUser->getUserType();
$logStatus = $superUser->getLogStatus();

$name = $_GET['action']; //Obtenemos el nombre del controlador

if(!isset($name) || empty($name)) {
    if($logStatus == "logIn") {
        $name = "logout";
    }
    else if($logStatus == "logOut") {
        $name = "login";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <!-- Viewport para adaptar vistas-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Enlaces a los archivos de Swiper JS para complementos de estilo del SildeShow del Home-->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- Enlaces a los archivos de Swiper JS para complementos de funciones del SildeShow del Home-->
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Enlaces a los archivos de Bootstrap para disenos responsivos con grillas y otros elementos-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <!-- Enlaces a los archivos de FontAwesome, para trabajar con iconos-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Links para agregar los estilos para los elementos de las vistas-->
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/loader.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/nav.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/bars.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/form.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/buttons.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/slideshow.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/grid.css">

    <!-- Titulo de la pagina-->
    <title>MoviX</title>
</head>

<body>
    <!-- Elemento loader con posicion fix para mostrarse al cargar pagina-->
    <div class="loading-bar" id="loader">
        <!-- Elemento loader con posicion fix, puntos animados-->
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <!-- /Elemento loader con posicion fix, puntos animados-->
    </div>
    <!-- /Elemento loader con posicion fix para mostrarse al cargar pagina-->

    <header>
        <!-- NabBar responsivo de bootstrap con nuevo diseno rounded-->
        <nav class="navbar navbar-expand-lg navbar-mainbg fixed-top">
            <!-- NavBar, titulo o logo-->
            <a class="navbar-brand navbar-logo" href="<?= BASE_DIR; ?>Home/showHome">MoviX</a>
            <!-- /NavBar, titulo o logo-->
            <!-- NavBar, boton en modo responsivo-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars text-white"></i>
            </button>
            <!-- /NavBar, boton en modo responsivo-->
            <!-- NavBar, lista de items en menu-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <!-- NavBar, selector con animacion-->
                    <div class="hori-selector">
                        <div class="left"></div>
                        <div class="right"></div>
                    </div>
                    <!-- /NavBar, selector con animacion-->
                    <?php if ($name == "showHome") /* Activar elemento al estar en vista home*/ { ?>
                    <li class="nav-item active">
                        <?php } else /* Desactivar elemento al estar en vista home*/ { ?>
                    <li class="nav-item">
                        <?php } ?>
                        <a class="nav-link" href="<?= BASE_DIR; ?>Home/showHome"><i class="fas fa-home"></i>Inicio</a>
                    </li>
                    <?php if ($name == "showMovies" || $name == "preview" || $name == "modify" || $name == "eliminate") /* Activar elemento al estar en vista catalogo*/ { ?>
                    <li class="nav-item active">
                        <?php } else /* Desactivar elemento al estar en vista catalogo*/ { ?>
                    <li class="nav-item">
                        <?php } ?>
                        <a class="nav-link" href="<?= BASE_DIR; ?>Movie/showMovies"><i
                                class="fas fa-film"></i>Catálogo</a>
                    </li>
                    <?php
                    if ($userType == "Administrador") { //Mostrar elemento solo si es administrador
                    if ($name == "add") /* Activar elemento al estar en vista agregar*/ { ?>
                    <li class="nav-item active">
                        <?php } else /* Desactivar elemento al estar en vista agregar*/ { ?>
                    <li class="nav-item">
                        <?php } ?>
                        <a class="nav-link" href="<?= BASE_DIR; ?>Movie/add"><i
                                class="fas fa-calendar-plus"></i>Nueva</a>
                    </li>
                    <?php
                    }
                    if ($userType == "Cliente") { //Mostrar elemento solo si es cliente
                    if ($name == "return") /* Activar elemento al estar en vista carrito*/ { ?>
                    <li class="nav-item active">
                        <?php } else /* Desactivar elemento al estar en vista carrito*/ { ?>
                    <li class="nav-item">
                        <?php } ?>
                        <a class="nav-link" href="<?= BASE_DIR; ?>User/return"><i
                                class="fas fa-tv"></i>Devoluciones</a>
                    </li>
                    <?php
                    }
                    if($logStatus == "LogOut") {
                        if ($name == "login") /* Activar elemento al estar en vista login*/ { ?>
                    <li class="nav-item active">
                        <?php } else /* Desactivar elemento al estar en vista login*/ { ?>
                    <li class="nav-item">
                        <?php } ?>
                        <a class="nav-link" href="<?= BASE_DIR; ?>User/login"><i class="fas fa-user"></i>Iniciar
                            Sesión</a>
                    </li>
                    <?php
                    } 
                    else if($logStatus == "LogIn") {
                        if ($name == "logout") /* Activar elemento al cerrar sesion*/ { ?>
                    <li class="nav-item active">
                        <?php } else /* Desactivar elemento al estar en sesion activa*/ { ?>
                    <li class="nav-item">
                        <?php } ?>
                        <a class="nav-link" href="<?= BASE_DIR; ?>User/logout"><i class="fas fa-door-open"></i>Cerrar
                            Sesión</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /NavBar, lista de items en menu-->
        </nav>
        <!-- /NabBar responsivo de bootstrap con nuevo diseno rounded-->
    </header>