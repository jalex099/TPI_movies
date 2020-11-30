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
                                            <div class="py-2 text-uppercase">Precio</div>
                                        </th>
                                        <?php if($type == 2) { ?>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Cantidad</div>
                                        </th>
                                        <?php } ?>
                                        <?php if($type == 1) { ?>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Fecha Actual</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Fecha Retorno</div>
                                        </th>
                                        <?php } ?>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Opciones</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $precioPelicula;
                                $totalAtraso;
                                $total;
                                //Recorremos el arreglo por medio de un foreach asociativo
                                foreach ($data as $row => $list) {
                                    if($id == $list["idPelicula"]) {
                                        if($type == 1) {
                                            $precioPelicula = $list["precioAlquilerPelicula"];
                                        }
                                        else {
                                            $precioPelicula = $list["precioVentaPelicula"];
                                        }
                                        $total = $quantity * $precioPelicula;
                                        $totalAtraso = ($total * 0.15) + $total;
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
                                                        class="text-muted font-weight-normal font-italic d-block"><?php if($type == 1) { ?>Alquiler<?php } if($type == 2) { ?>Compra<?php } ?></span>
                                                </div>
                                            </div>
                                        </th>
                                        <?php if($type == 1) { ?>
                                        <td class="border-0 align-middle">
                                            <strong>$<?= $list["precioAlquilerPelicula"]; ?></strong></td>
                                        <?php } else { ?>
                                        <td class="border-0 align-middle">
                                            <strong>$<?= $list["precioVentaPelicula"]; ?></strong></td>
                                        <?php } ?>
                                        <?php if($type == 2) { ?>
                                        <td class="border-0 align-middle"><strong>
                                                <input type="text" id="idPelicula" value="<?= $id; ?>" hidden>
                                                <input type="text" id="type" value="<?= $type; ?>" hidden>
                                                <input type="number" class="quantity" id="quantity"
                                                    value="<?= $quantity; ?>" step="1" min="1"
                                                    max="<?= $list["stockPelicula"]; ?>" name="cantidad" id="">
                                            </strong></td>
                                        <?php } ?>
                                        <?php if($type == 1) { ?>
                                        <td class="border-0 align-middle"><strong><?= $fechaActual; ?></strong></td>
                                        <td class="border-0 align-middle"><strong><?= $fechaRetorno; ?></strong></td>
                                        <?php } ?>
                                        <td class="border-0 align-middle"><a id="calcular"
                                                href="<?= BASE_DIR; ?>User/cart&id=<?= $id; ?>&type=<?= $type; ?>&quantity=1"
                                                class="text-dark"><i class="fas fa-donate"></i> Calcular</a></td>
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
                                    </strong><strong>$<?= $total; ?></strong></li>
                                <?php if($type == 1) { ?>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Total en caso de retraso
                                    </strong><strong>$<?= $totalAtraso; ?></strong></li>
                                <?php } ?>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Total </strong>
                                    <h5 class="font-weight-bold">$<?= $total; ?></h5>
                                </li>
                            </ul>
                            <?php if($type == 1) { ?>
                            <a href="<?= BASE_DIR; ?>User/checkoutRent&id=<?= $id; ?>&fechaI=<?= $fechaActual; ?>&fechaF=<?= $fechaRetorno; ?>"
                                class="picture-slider__button py-2">Proceder a Pago</a>
                            <?php } if($type == 2) { ?>
                            <a href="<?= BASE_DIR; ?>User/checkoutBuy&id=<?= $id; ?>&fecha=<?= $fechaActual; ?>&cantidad=<?= $quantity; ?>"
                                class="picture-slider__button py-2">Proceder a Pago</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>