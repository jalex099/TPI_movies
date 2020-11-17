<?php
    $name = $_GET['action'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="<?=BASE_DIR;?>assets/css/style.css">
    <link rel="stylesheet" href="<?=BASE_DIR;?>assets/css/loader.css">
    <link rel="stylesheet" href="<?=BASE_DIR;?>assets/css/nav.css">
    <link rel="stylesheet" href="<?=BASE_DIR;?>assets/css/bars.css">
    <link rel="stylesheet" href="<?=BASE_DIR;?>assets/css/form.css">
    <link rel="stylesheet" href="<?=BASE_DIR;?>assets/css/buttons.css">
    <link rel="stylesheet" href="<?=BASE_DIR;?>assets/css/slideshow.css">
    <link rel="stylesheet" href="<?=BASE_DIR;?>assets/css/grid.css">
    <link rel="icon" type="image/png" href="<?=BASE_DIR;?>assets/css/images/logox16.png"/>
    <title>USERZ</title>
</head>
<body>
    <div class="loading-bar" id="loader">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <header>
        <nav class="navbar navbar-expand-lg navbar-mainbg fixed-top">
        <a class="navbar-brand navbar-logo" href="<?=BASE_DIR;?>Home/showHome">MoviX</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector">
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
                <?php if($name == "showHome") { ?>
                <li class="nav-item active">
                <?php } else { ?>
                <li class="nav-item">
                <?php } ?>
                    <a class="nav-link" href="<?=BASE_DIR;?>Home/showHome"><i class="fas fa-home"></i>Inicio</a>
                </li>
                <?php if($name == "showMovies") { ?>
                <li class="nav-item active">
                <?php } else { ?>
                <li class="nav-item">
                <?php } ?>
                    <a class="nav-link" href="<?=BASE_DIR;?>Movie/showMovies"><i class="fas fa-film"></i>Catálogo</a>
                </li>
                <?php if($name == "add") { ?>
                <li class="nav-item active">
                <?php } else { ?>
                <li class="nav-item">
                <?php } ?>
                    <a class="nav-link" href="<?=BASE_DIR;?>Movie/add"><i class="fas fa-calendar-plus"></i>Nueva</a>
                </li>
                <?php if($name == "login") { ?>
                <li class="nav-item active">
                <?php } else { ?>
                <li class="nav-item">
                <?php } ?>
                    <a class="nav-link" href="<?=BASE_DIR;?>User/login"><i class="fas fa-user"></i>Iniciar Sesión</a>
                </li>
                <?php if($name == "modify") { ?>
                <li class="nav-item active">
                <?php } else { ?>
                <li class="nav-item">
                <?php } ?>
                    <a class="nav-link" href="<?=BASE_DIR;?>Movie/modify"><i class="fas fa-door-open"></i>Cerrar Sesión</a>
                </li>
            </ul>
        </div>
        </nav>
    </header>
