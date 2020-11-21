<!-- Contenedor principal del grid-->
<div class="grid">
    <!-- Contenedor adaptativo para la grilla-->
    <div class="container-fluid">
        <!-- Elemento de fila automatizada, con columnas predeterminadas para cada tamano-->
        <div class="row justify-content-md-center">
            <?php
            //Obtenemos el json desde la url
            $data = file_get_contents("http://localhost/TPI_movies/backend/server/readPelicula.php");
            $data = json_decode($data, true); //Lo decodificamos para hacerlo json
            $data = json_decode($data, true); //Lo decodificamos de nuevo para hacerlo array

            /*function array_sort_by(&$arrIni, $col, $order)
            {
                $arrAux = array();
                foreach ($arrIni as $key=> $row)
                {
                    $arrAux[$key] = is_object($row) ? $arrAux[$key] = $row->$col : $row[$col];
                    $arrAux[$key] = strtolower($arrAux[$key]);
                }
                array_multisort($arrAux, $order, $arrIni);
            }

            $order = SORT_DESC;

            array_sort_by($data, 'tituloPelicula', $order);*/

            //Recorremos el arreglo por medio de un foreach asociativo
            foreach ($data as $row => $list) {
                $id = $list["idPelicula"];
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
                            <li><a href="<?= BASE_DIR; ?>Movie/preview&id=<?= $id; ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fa fa-eye"></i></a></li>
                            <li><a href="" data-toggle="tooltip" data-placement="top" title="Me gusta"><i class="fa fa-heart"></i></a></li>
                            <li><a href="" data-toggle="tooltip" data-placement="top" title="Comprar"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="" data-toggle="tooltip" data-placement="top" title="Alquilar"><i class="fas fa-video"></i></a></li>
                        </ul>
                        <!-- /Tarjeta para mostrar pelicula, botones de acciones-->
                    </div>
                    <!-- /Tarjeta para mostrar pelicula-->
                </div>
                <!-- /Columna nueva para elemento pelicula-->
            <?php }; ?>
        </div>
        <!-- /Elemento de fila automatizada, con columnas predeterminadas para cada tamano-->
    </div>
    <!-- /Contenedor adaptativo para la grilla-->
</div>
<!-- /Contenedor principal del grid-->