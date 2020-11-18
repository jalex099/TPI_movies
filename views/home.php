    <main class="picture">
        <div class="picture-slider">
            <div class="picture-slider__wrp swiper-wrapper">
                <div class="picture-slider__item swiper-slide">
                    <div class="picture-slider__img">
                        <img src="<?= BASE_DIR; ?>assets/images/img1.jpg" alt="img1">
                    </div>
                    <div class="picture-slider__content">
                        <span class="picture-slider__code">INFO 1</span>
                        <div class="picture-slider__title">Explora</div>
                        <div class="picture-slider__text">Un catálogo completo de muchas películas que ver, todas las
                            que
                            puedes imaginar, el maravilloso mundo del cine más cerca de ti</div>
                        <a href="<?= BASE_DIR; ?>Movie/showMovies" class="picture-slider__button">Ver Catálogo</a>
                    </div>
                </div>
                <div class="picture-slider__item swiper-slide">
                    <div class="picture-slider__img">
                        <img src="<?= BASE_DIR; ?>assets/images/img2.jpg" alt="img2">
                    </div>
                    <div class="picture-slider__content">
                        <span class="picture-slider__code">INFO 2</span>
                        <div class="picture-slider__title">Accede</div>
                        <div class="picture-slider__text">Si ya eres parte de nuestra comunidad, solo tienes que acceder
                            para
                            poder tener acceso al catálogo de películas</div>
                        <a href="<?= BASE_DIR; ?>User/login" class="picture-slider__button">Iniciar Sesión</a>
                    </div>
                </div>

                <div class="picture-slider__item swiper-slide">
                    <div class="picture-slider__img">
                        <img src="<?= BASE_DIR; ?>assets/images/img3.jpg" alt="img3">
                    </div>
                    <div class="picture-slider__content">
                        <span class="picture-slider__code">INFO 3</span>
                        <div class="picture-slider__title">Compras</div>
                        <div class="picture-slider__text">Si ya eres miembro y tienes compras pendientes pues te
                            dirigiremos hasta tu carrito con tus artículos</div>
                        <a href="<?= BASE_DIR; ?>User/cart" class="picture-slider__button">Ver Carrito</a>
                    </div>
                </div>

            </div>
            <div class="picture-slider__pagination"></div>
        </div>
    </main>

    <script src="<?=BASE_DIR;?>assets/js/main.js"></script>
    </body>

    </html>