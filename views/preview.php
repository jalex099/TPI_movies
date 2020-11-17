    <main class="principal">
        <div class="content">
            <?php 
                $data = file_get_contents("https://morales099.000webhostapp.com/Servidor/getAll.php");
                $data = json_decode($data, true); //Lo codificamos a json
                $data = json_decode($data, true); //Lo codificamos a json
                
                foreach($data as $row=>$list){
                    if($list["idPelicula"] == 1) {
            ?>

            <div class="content-bg">
                <img src="<?=BASE_DIR;?>assets/images/cover.jpg" alt="background">
            </div>

            <div id="res-content" class="content__left">
                <div class="content-image">
                    <img src="<?=BASE_DIR;?>assets/images/cover.jpg" alt="cover">
                </div>
            </div>

            <div class="content__right">
                <div class="content-float">
                    <div class="menu">
                        <div class="title" onclick="f()">Opciones<span class="fa fa-bars"></span>
                            <div class="arrow"></div>
                        </div>
                        <div class="dropdown">
                            <p>Modificar <span class="fas fa-tools"></span></p>
                            <p>Quitar <span class="fas fa-times-circle"></span></p>
                            <p>Eliminar <span class="fas fa-trash"></span></p>
                        </div>
                    </div>
                </div>

                <div class="box-tittle">
                    <div class="box-content">
                        <h1 id="res-title"><?=$list["tituloPelicula"];?></h1>
                        <h3 id="res-subtitle"><?=$list["generoPelicula"];?> / <span>Disponibles: <strong><?=$list["stockPelicula"];?></strong></span></h3>
                        <h4 id="res-like"><a class="far fa-heart" id="btn-like"></a> <span>74</span> Me gusta</h4>
                        <div class="btn__actions">
                            <button class="btn-rent">$<?=$list["precioAlquilerPelicula"];?></button>
                            <button class="btn-buy">$<?=$list["precioVentaPelicula"];?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="plain">
            <div id="res-info" class="plain-info">
                <p><?=$list["descripcionPelicula"];?></p>
            </div>
        </div>
                    <?php } }; ?> 
    </main>

    <script src="<?=BASE_DIR;?>assets/js/main.js"></script>
</body>
</html>