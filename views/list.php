<?php
//$logStatus = "LogIn";
//$logStatus = "LogOut";
//$userType = "Administrador";
//$userType = "Cliente";
?>

<div class="filter">
    <form action="<?= BASE_DIR; ?>Movie/showMovies" method="post">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="field">
                        <select name="type" class="tipo" id="" required>
                            <option disabled selected value=""></option>
                            <option value="Albabéticamente">Alfabéticamente</option>
                            <option value="Popularidad">Popularidad</option>
                            <?php echo $userType; if($userType == "Administrador") { ?>
                            <option value="Disponibilidad">Disponibilidad</option>
                            <?php } ?>
                        </select>
                        <label>Filtro</label>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-xl-3" id="ordenAD">
                    <div class="field">
                        <select name="orderAD" id="ordenADS" required>
                            <option disabled selected value=""></option>
                            <option value="Ascendente">Ascendente</option>
                            <option value="Descendente">Descendente</option>
                        </select>
                        <label>Orden</label>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-xl-3" id="ordenDN">
                    <div class="field">
                        <select name="orderDN" id="ordenDNS" required>
                            <option disabled selected value=""></option>
                            <option value="Disponible">Disponible</option>
                            <option value="No disponible">No disponible</option>
                        </select>
                        <label>Orden</label>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-xl-2">
                    <div class="field">
                        <input class="btn-account" type="submit" value="Filtrar">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Contenedor principal del grid-->
<div class="grid">
    <!-- Contenedor adaptativo para la grilla-->
    <div class="container-fluid">
        <!-- Elemento de fila automatizada, con columnas predeterminadas para cada tamano-->
        <div class="row justify-content-md-center">
            <?php
            if(empty($data) || !isset($data)) { //Comprobamos si el array esta vacio
                echo "<h1>No hay peliculas en el catálogo</h1>";
            }
            else { //Si el array contiene elementos los mostramos
                //Recorremos el arreglo por medio de un foreach asociativo
                foreach ($data as $row => $list) {
                    $id = $list["idPelicula"];

                    if(isset($idDisponibilidad)) {
                        if($list["disponibilidadPelicula"] == $idDisponibilidad) {
            ?>
            <!-- Columna nueva para elemento pelicula-->
            <div class="col-6 col-md-3 col-xl-2">
                <!-- Tarjeta para mostrar pelicula-->
                <div class="product-grid">
                    <!-- Tarjeta para mostrar pelicula, contenedor de imagen-->
                    <div class="product-image">
                        <!-- Tarjeta para mostrar pelicula, contenedor de enlace de la pelicula-->
                        <a href="<?= BASE_DIR; ?>Movie/preview&id=<?= $id; ?>">
                            <!-- Tarjeta para mostrar pelicula, imagen e la pelicula-->
                            <img class="pic-1" src="<?= $list["portadaPelicula"];?>">
                            <!-- /Tarjeta para mostrar pelicula, imagen e la pelicula-->
                        </a>
                        <!-- /Tarjeta para mostrar pelicula, contenedor de enlace de la pelicula-->

                        <!-- Tarjeta para mostrar pelicula, info sobre genero-->
                        <span class="product-genre-label"><?= $list["generoPelicula"]; ?></span>
                        <!-- /Tarjeta para mostrar pelicula, info sobre genero-->

                        <!-- Tarjeta para mostrar pelicula, info sobre cantidad de likes-->
                        <span class="product-like-label">74 Likes</span>
                        <!-- /Tarjeta para mostrar pelicula, info sobre cantidad de likes-->
                    </div>
                    <!-- /Tarjeta para mostrar pelicula, contenedor de imagen-->

                    <!-- Tarjeta para mostrar pelicula, contenedor de informacion-->
                    <div class="product-content text-truncate">
                        <!-- Tarjeta para mostrar pelicula, titulo de pelicula-->
                        <h3 class="product-title">
                            <a href="<?= BASE_DIR; ?>Movie/preview&id=<?= $id; ?>"><?= $list["tituloPelicula"]; ?></a>
                        </h3>
                        <!-- /Tarjeta para mostrar pelicula, titulo de pelicula-->

                        <!-- Tarjeta para mostrar pelicula, precio de venta y alquiler-->
                        <div class="price">$<?= $list["precioAlquilerPelicula"]; ?>
                            /<span>$<?= $list["precioVentaPelicula"]; ?></span></div>
                        <!-- /Tarjeta para mostrar pelicula, precio de venta y alquiler-->
                    </div>
                    <!-- /Tarjeta para mostrar pelicula, contenedor de informacion-->
                    
                    <!-- Tarjeta para mostrar pelicula, botones de acciones-->
                    <ul class="social">
                        <li><a href="<?= BASE_DIR; ?>Movie/preview&id=<?= $id; ?>" data-toggle="tooltip"
                                data-placement="top" title="Ver"><i class="fa fa-eye"></i></a></li>
                        <li><a href="" data-toggle="tooltip" data-placement="top" title="Me gusta"><i
                                    class="fa fa-heart"></i></a></li>
                        <li><a href="<?= BASE_DIR; ?>User/cart&id=<?= $id; ?>&type=2&quantity=1" data-toggle="tooltip" data-placement="top" title="Comprar"><i
                                    class="fa fa-shopping-cart"></i></a></li>
                        <li><a href="<?= BASE_DIR; ?>User/cart&id=<?= $id; ?>&type=1&quantity=1" data-toggle="tooltip" data-placement="top" title="Alquilar"><i
                                    class="fas fa-video"></i></a></li>
                    </ul>
                    <!-- /Tarjeta para mostrar pelicula, botones de acciones-->
                </div>
                <!-- /Tarjeta para mostrar pelicula-->
            </div>
            <!-- /Columna nueva para elemento pelicula-->
            <?php } } else { ?>
            <!-- Columna nueva para elemento pelicula-->
            <div class="col-6 col-md-3 col-xl-2">
                <!-- Tarjeta para mostrar pelicula-->
                <div class="product-grid">
                    <!-- Tarjeta para mostrar pelicula, contenedor de imagen-->
                    <div class="product-image">
                        <!-- Tarjeta para mostrar pelicula, contenedor de enlace de la pelicula-->
                        <a href="<?= BASE_DIR; ?>Movie/preview&id=<?= $id; ?>">
                            <!-- Tarjeta para mostrar pelicula, imagen e la pelicula-->
                            <img class="pic-1" src="<?= $list["portadaPelicula"];?>">
                            <!-- /Tarjeta para mostrar pelicula, imagen e la pelicula-->
                        </a>
                        <!-- /Tarjeta para mostrar pelicula, contenedor de enlace de la pelicula-->

                        <!-- Tarjeta para mostrar pelicula, info sobre genero-->
                        <span class="product-genre-label"><?= $list["generoPelicula"]; ?></span>
                        <!-- /Tarjeta para mostrar pelicula, info sobre genero-->

                        <!-- Tarjeta para mostrar pelicula, info sobre cantidad de likes-->
                        <span class="product-like-label">74 Likes</span>
                        <!-- /Tarjeta para mostrar pelicula, info sobre cantidad de likes-->
                    </div>
                    <!-- /Tarjeta para mostrar pelicula, contenedor de imagen-->

                    <!-- Tarjeta para mostrar pelicula, contenedor de informacion-->
                    <div class="product-content text-truncate">
                        <!-- Tarjeta para mostrar pelicula, titulo de pelicula-->
                        <h3 class="product-title">
                            <a href="<?= BASE_DIR; ?>Movie/preview&id=<?= $id; ?>"><?= $list["tituloPelicula"]; ?></a>
                        </h3>
                        <!-- /Tarjeta para mostrar pelicula, titulo de pelicula-->

                        <!-- Tarjeta para mostrar pelicula, precio de venta y alquiler-->
                        <div class="price">$<?= $list["precioAlquilerPelicula"]; ?>
                            /<span>$<?= $list["precioVentaPelicula"]; ?></span></div>
                        <!-- /Tarjeta para mostrar pelicula, precio de venta y alquiler-->
                    </div>
                    <!-- /Tarjeta para mostrar pelicula, contenedor de informacion-->

                    <!-- Tarjeta para mostrar pelicula, botones de acciones-->
                    <ul class="social">
                        <li><a href="<?= BASE_DIR; ?>Movie/preview&id=<?= $id; ?>" data-toggle="tooltip"
                                data-placement="top" title="Ver"><i class="fa fa-eye"></i></a></li>
                        <li><a href="" data-toggle="tooltip" data-placement="top" title="Me gusta"><i
                                    class="fa fa-heart"></i></a></li>
                        <li><a href="<?= BASE_DIR; ?>User/cart&id=<?= $id; ?>&type=2&quantity=1" data-toggle="tooltip" data-placement="top" title="Comprar"><i
                                    class="fa fa-shopping-cart"></i></a></li>
                        <li><a href="<?= BASE_DIR; ?>User/cart&id=<?= $id; ?>&type=1&quantity=1" data-toggle="tooltip" data-placement="top" title="Alquilar"><i
                                    class="fas fa-video"></i></a></li>
                    </ul>
                    <!-- /Tarjeta para mostrar pelicula, botones de acciones-->
                </div>
                <!-- /Tarjeta para mostrar pelicula-->
            </div>
            <!-- /Columna nueva para elemento pelicula-->
            <?php } }; } ?>
        </div>
        <!-- /Elemento de fila automatizada, con columnas predeterminadas para cada tamano-->
    </div>
    <!-- /Contenedor adaptativo para la grilla-->
</div>
<!-- /Contenedor principal del grid-->