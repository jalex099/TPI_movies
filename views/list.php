<div class="grid-container">


<div class="container-fluid">
    <div class="row row-cols-2 row-cols-sm-4 row-cols-md-5 justify-content-md-center">   
        <?php 
            $data = file_get_contents("https://morales099.000webhostapp.com/Servidor/getAll.php");
            $data = json_decode($data, true); //Lo codificamos a json
            $data = json_decode($data, true); //Lo codificamos a json
            
            foreach($data as $row=>$list){
        ?>
        <div class="col">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#">
                        <?php
                            if($list["idPelicula"] == 1) {
                        ?>
                        <img class="pic-1" src="<?=BASE_DIR;?>assets/images/cover.jpg">
                        <?php
                            }
                            if($list["idPelicula"] == 2) {
                        ?>
                        <img class="pic-1" src="<?=BASE_DIR;?>assets/images/1.jpg">
                        <?php
                            }
                        ?>
                    </a>
                    <span class="product-genre-label"><?=$list["generoPelicula"];?></span>
                    <span class="product-like-label">74 Likes</span>
                </div>
                <div class="product-content text-truncate">
                    <h3 class="titl">
                        <a href="#"><?=$list["tituloPelicula"];?></a>
                    </h3>
                    <div class="price">$<?=$list["precioAlquilerPelicula"];?> /<span>$<?=$list["precioVentaPelicula"];?></span></div>
                </div>
                <ul class="social">
                    <li><a href="" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fa fa-eye"></i></a></li>
                    <li><a href="" data-toggle="tooltip" data-placement="top" title="Me gusta"><i class="fa fa-heart"></i></a></li>
                    <li><a href="" data-toggle="tooltip" data-placement="top" title="Comprar"><i class="fa fa-shopping-cart"></i></a></li>
                    <li><a href="" data-toggle="tooltip" data-placement="top" title="Alquilar"><i class="fas fa-video"></i></a></li>
                </ul>
            </div>
        </div>
        <?php };?>

        <?php 
            $data = file_get_contents("https://morales099.000webhostapp.com/Servidor/getAll.php");
            $data = json_decode($data, true); //Lo codificamos a json
            $data = json_decode($data, true); //Lo codificamos a json
            
            foreach($data as $row=>$list){
        ?>
        <div class="col">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#">
                        <?php
                            if($list["idPelicula"] == 1) {
                        ?>
                        <img class="pic-1" src="<?=BASE_DIR;?>assets/images/cover.jpg">
                        <?php
                            }
                            if($list["idPelicula"] == 2) {
                        ?>
                        <img class="pic-1" src="<?=BASE_DIR;?>assets/images/1.jpg">
                        <?php
                            }
                        ?>
                    </a>
                    <span class="product-genre-label"><?=$list["generoPelicula"];?></span>
                    <span class="product-like-label">74 Likes</span>
                </div>
                <div class="product-content text-truncate">
                    <h3 class="titl">
                        <a href="#"><?=$list["tituloPelicula"];?></a>
                    </h3>
                    <div class="price">$<?=$list["precioAlquilerPelicula"];?> /<span>$<?=$list["precioVentaPelicula"];?></span></div>
                </div>
                <ul class="social">
                    <li><a href="" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fa fa-eye"></i></a></li>
                    <li><a href="" data-toggle="tooltip" data-placement="top" title="Me gusta"><i class="fa fa-heart"></i></a></li>
                    <li><a href="" data-toggle="tooltip" data-placement="top" title="Comprar"><i class="fa fa-shopping-cart"></i></a></li>
                    <li><a href="" data-toggle="tooltip" data-placement="top" title="Alquilar"><i class="fas fa-video"></i></a></li>
                </ul>
            </div>
        </div>
        <?php };?>

        <?php 
            $data = file_get_contents("https://morales099.000webhostapp.com/Servidor/getAll.php");
            $data = json_decode($data, true); //Lo codificamos a json
            $data = json_decode($data, true); //Lo codificamos a json
            
            foreach($data as $row=>$list){
        ?>
        <div class="col">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#">
                        <?php
                            if($list["idPelicula"] == 1) {
                        ?>
                        <img class="pic-1" src="<?=BASE_DIR;?>assets/images/cover.jpg">
                        <?php
                            }
                            if($list["idPelicula"] == 2) {
                        ?>
                        <img class="pic-1" src="<?=BASE_DIR;?>assets/images/1.jpg">
                        <?php
                            }
                        ?>
                    </a>
                    <span class="product-genre-label"><?=$list["generoPelicula"];?></span>
                    <span class="product-like-label">74 Likes</span>
                </div>
                <div class="product-content text-truncate">
                    <h3 class="titl">
                        <a href="#"><?=$list["tituloPelicula"];?></a>
                    </h3>
                    <div class="price">$<?=$list["precioAlquilerPelicula"];?> /<span>$<?=$list["precioVentaPelicula"];?></span></div>
                </div>
                <ul class="social">
                    <li><a href="" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fa fa-eye"></i></a></li>
                    <li><a href="" data-toggle="tooltip" data-placement="top" title="Me gusta"><i class="fa fa-heart"></i></a></li>
                    <li><a href="" data-toggle="tooltip" data-placement="top" title="Comprar"><i class="fa fa-shopping-cart"></i></a></li>
                    <li><a href="" data-toggle="tooltip" data-placement="top" title="Alquilar"><i class="fas fa-video"></i></a></li>
                </ul>
            </div>
        </div>
        <?php };?>
    </div>
</div>

</div>