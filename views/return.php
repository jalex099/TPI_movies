<div class="cart-plain">
    <div class="px-4 px-lg-0">
        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded-sm shadow-sm mb-5">

                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Producto</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Precio Esperado</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Fecha Actual</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Fecha Esperada</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                <?php
                                $precioPelicula;
                                $totalAtraso;
                                $subTotal;
                                $total;
                                //Recorremos el arreglo por medio de un foreach asociativo
                                foreach ($data as $row => $list) {
                                    if($id == $list["idPelicula"]) {
                                        $precioPelicula = $list["precioAlquilerPelicula"];
                                        $subTotal = $precioPelicula;

                                        if($fechaActual > $fechaRetorno) {
                                            $totalAtraso = ($subTotal * 0.15);
                                            $total = $subTotal + $totalAtraso;
                                        }
                                        else {
                                            $totalAtraso = 0;
                                            $total = $subTotal;
                                        }
                                ?>
                                    <tr class="cart-row">
                                        <th scope="row" class="border-0">
                                            <div class="p-2">
                                                <img src="<?= $list["portadaPelicula"]; ?>" alt="cover" width="70"
                                                    class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0"> <a
                                                            href="<?= BASE_DIR; ?>Movie/preview&id=<?= $id; ?>"
                                                            class="text-dark d-inline-block align-middle"><?= $list["tituloPelicula"]; ?></a>
                                                    </h5><span
                                                        class="text-muted font-weight-normal font-italic d-block">Alquiler</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="border-0 align-middle">
                                            <strong>$<?= $list["precioAlquilerPelicula"]; ?></strong>
                                        </td>

                                        <td class="border-0 align-middle"><strong><?= $fechaActual; ?></strong></td>
                                        <td class="border-0 align-middle"><strong><?= $fechaRetorno; ?></strong></td>
                                    </tr>
                                    <?php } }; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End -->
                    </div>
                </div>

                <div class="row py-5 p-4 bg-white text-dark rounded shadow-sm">
                    <div class="col-lg-12">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Resumen del pedido
                        </div>
                        <div class="p-4">
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">SubTotal de la orden
                                    </strong><strong>$<?= $subTotal; ?></strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Por retraso
                                    </strong><strong>$<?= $totalAtraso; ?></strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Total </strong>
                                    <h5 class="font-weight-bold">$<?= $total; ?></h5>
                                </li>
                            </ul>
                            <a href="<?= BASE_DIR; ?>User/checkoutReturn&id=<?= $idAlquiler; ?>&fecha=<?= $fechaActual; ?>&total=<?= $subTotal; ?>&multa=<?= $totalAtraso; ?>"
                                class="picture-slider__button py-2">Proceder a Pago</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>