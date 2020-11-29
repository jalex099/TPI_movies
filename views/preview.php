    <main class="principal">
        <div class="content">
            <?php 
            $targetId = $_GET["id"];
            
            foreach($data as $row=>$list){
                if($list["idPelicula"] == $targetId) {
            ?>

            <div class="content-bg">
                <img src="<?= $list["portadaPelicula"];?>" alt="background">
            </div>

            <div id="res-content" class="content__left">
                <div class="content-image">
                    <img src="<?= $list["portadaPelicula"];?>" alt="cover">
                </div>
            </div>

            <div class="content__right">
                <?php if($userType == "Administrador") { ?>
                <div class="content-float">
                    <div class="menu">
                        <div class="title" onclick="f()">Opciones<span class="fa fa-bars"></span>
                            <div class="arrow"></div>
                        </div>
                        <div class="dropdown">
                            <a href="<?= BASE_DIR; ?>Movie/modify&id=<?= $targetId; ?>"><p>Modificar<span class="fas fa-tools"></span></p></a>
                <a href="<?= BASE_DIR; ?>Movie/change&id=<?= $targetId; ?>"><p><?php if($list["disponibilidadPelicula"] == 1) { ?>Quitar<?php } if($list["disponibilidadPelicula"] == 0) { ?>Agregar<?php } ?><span class="fas fa-exchange-alt"></span></p></a>
                            <a href="<?= BASE_DIR; ?>Movie/eliminate&id=<?= $targetId; ?>"><p>Eliminar <span class="fas fa-trash"></span></p></a>
                        </div>
                    </div>
                </div>
                <?php } ?>

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