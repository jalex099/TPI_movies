<div class="cart-plain">
    <div class="px-4 px-lg-0">
        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded-sm shadow-sm mb-5">

                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                        <a href="<?= BASE_DIR; ?>User/return" class="picture-slider__button py-2">Alquileres</a>
                        <a href="<?= BASE_DIR; ?>User/shopping" class="picture-slider__button py-2">Compras</a>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Producto</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Precio</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Cantidad</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">SubTotal</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Quitar</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                //Obtenemos el json desde la url
                                $data = file_get_contents("http://localhost/TPI_movies/backend/server/readPelicula.php");
                                $data = json_decode($data, true); //Lo decodificamos para hacerlo json

                                $orderSubTotal = 0;

                                //Recorremos el arreglo por medio de un foreach asociativo
                                foreach ($data as $row => $list) {
                                    $subTotal = $list["precioVentaPelicula"] * $list["stockPelicula"];
                                    $orderSubTotal += $subTotal;
                                    $taxes = $orderSubTotal * 0.13;
                                ?>
                                    <tr class="cart-row">
                                        <th scope="row" class="border-0">
                                            <div class="p-2">
                                                <img src="<?= $list["portadaPelicula"]; ?>" alt="cover" width="70" class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?= $list["tituloPelicula"]; ?></a></h5><span class="text-muted font-weight-normal font-italic d-block">Compra</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="border-0 align-middle"><strong>$<?= $list["precioVentaPelicula"]; ?></strong></td>
                                        <td class="border-0 align-middle"><strong><?= $list["stockPelicula"]; ?></strong></td>
                                        <td class="border-0 align-middle"><strong>$<?= $subTotal; ?></strong></td>
                                        <td class="border-0 align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                <?php }; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End -->
                    </div>
                </div>

                <div class="row py-5 p-4 bg-white text-dark rounded shadow-sm">
                    <div class="col-lg-12">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Resumen del pedido</div>
                        <div class="p-4">
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">SubTotal de la orden </strong><strong>$<?= $orderSubTotal; ?></strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Impuestos </strong><strong>$<?= $taxes; ?></strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total </strong>
                                    <h5 class="font-weight-bold">$<?= $taxes + $orderSubTotal; ?></h5>
                                </li>
                            </ul><a href="#" class="picture-slider__button py-2">Proceder a Pago</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>