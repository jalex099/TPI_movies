<div class="cart-plain">
    <div class="px-4 px-lg-0">
        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded-sm shadow-sm mb-5">

                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                            <?php if($_GET["action"] == "Movie") { ?>
                            <a href="<?= BASE_DIR; ?>Movie/record" class="picture-slider__button py-2">Alquileres</a>
                            <?php } else { ?>
                            <a href="<?= BASE_DIR; ?>User/rent" class="picture-slider__button py-2">Alquileres</a>
                            <?php } ?>
                            <br><br>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">ID Venta</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Cantidad</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Fecha de Venta</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">ID Cliente</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">ID Pelicula</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                //Recorremos el arreglo por medio de un foreach asociativo
                                foreach ($data as $row => $list) {
                                ?>
                                    <tr class="cart-row">
                                        <td class="border-0 align-middle"><strong><?= $list["idVenta"]; ?></strong></td>
                                        <td class="border-0 align-middle">
                                            <strong><?= $list["cantidadVenta"]; ?></strong></td>
                                        <td class="border-0 align-middle"><strong><?= $list["fechaVenta"]; ?></strong>
                                        </td>
                                        <td class="border-0 align-middle"><strong><?= $list["idCliente"]; ?></strong>
                                        </td>
                                        <td class="border-0 align-middle"><strong><?= $list["idPelicula"]; ?></strong>
                                        </td>
                                    </tr>
                                    <?php }; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=BASE_DIR;?>assets/js/main.js"></script>
</body>

</html>