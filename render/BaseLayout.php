<?php
class BaseLayout //Clase Base para el diseno de la pagina
{
    public static function renderHead() //Render para mostrar header
    {
        require_once "views/header.php"; //Requerimos la vista de header
    }

    public static function renderFoot() //Render para mostrar footer
    {
        require_once "views/footer.php"; //Requerimos la vista de footer
    }
}
