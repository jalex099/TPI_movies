<?php
    //Destruimos la sesion existente
    if($_SESSION) {
        session_unset($_SESSION);
        session_destroy($_SESSION);
    }

    //Desarmamos y eliminamos las cookies restantes
    unset($_COOKIE["sessionID"]);
    unset($_COOKIE["sessionRol"]);
    setcookie("sessionID", $idUser, strtotime('-30 minutes'), "/");
    setcookie("sessionRol", "Cliente", strtotime('-30 minutes'), "/");

    //Redireccionamos al login
    echo '<script type="text/javascript">
        window.location = "../User/login";
        </script>';
?>