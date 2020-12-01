<div class="cart-plain">
    <div class="px-4 px-lg-0">
        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded-sm shadow-sm mb-5">

                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                            <?php if($_GET["controller"] == "Movie") { ?>
                            <a href="<?= BASE_DIR; ?>Movie/sale" class="picture-slider__button py-2">Compras</a>
                            <?php } else { ?>
                            <a href="<?= BASE_DIR; ?>User/sale" class="picture-slider__button py-2">Compras</a>
                            <?php } ?>
                            <br><br>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">ID Alquiler</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Fecha Alquiler</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Fecha de Regreso</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">ID Cliente</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">ID Pelicula</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Estado</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                //Recorremos el arreglo por medio de un foreach asociativo
                                foreach ($data as $row => $list) {
                                ?>
                                    <tr class="cart-row">
                                        <td class="border-0 align-middle"><strong><?= $list["idAlquiler"]; ?></strong>
                                        </td>
                                        <td class="border-0 align-middle">
                                            <strong><?= $list["fechaAlquiler"]; ?></strong>
                                        </td>
                                        <td class="border-0 align-middle">
                                            <strong><?= $list["fechaEsperadaAlquiler"]; ?></strong>
                                        </td>
                                        <td class="border-0 align-middle"><strong><?= $list["idCliente"]; ?></strong>
                                        </td>
                                        <td class="border-0 align-middle"><strong><?= $list["idPelicula"]; ?></strong>
                                        </td>
                                        <?php
                                        if($userType == "Cliente") {
                                            if($list["estadoAlquiler"] == 1) { 
                                        ?>
                                        <td class="border-0 align-middle">
                                            <a
                                                href="<?= BASE_DIR; ?>User/return&id=<?= $list["idPelicula"]; ?>&idAlquiler=<?= $list["idAlquiler"]; ?>&fecha=<?= $list["fechaEsperadaAlquiler"]; ?>"><strong>Devolver</strong></a>
                                        </td>
                                        <?php
                                            }
                                            else { 
                                        ?>
                                        <td class="border-0 align-middle">
                                            <strong>Devuelto</strong>
                                        </td>
                                        <?php
                                            }
                                        }
                                        else {
                                            if($list["estadoAlquiler"] == 1) {
                                        ?>
                                        <td class="border-0 align-middle">
                                            <strong>Activo</strong>
                                        </td>
                                        <?php
                                            }
                                            else {
                                        ?>
                                        <td class="border-0 align-middle">
                                            <strong>Devuelto</strong>
                                        </td>
                                        <?php
                                            }
                                        }
                                        ?>
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