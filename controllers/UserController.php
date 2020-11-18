<?php
class UserController //Clase controlador para acciones de User
{
    public function login() //Metodo para mostrar vista de login
    {
        require_once "models/User.php"; //Requerimos el modelo de usuario
        $user = new User(); //Instanciamos un nuevo objeto de usuario
        $loginUser = $user->login(); //Obtenemos el nombre de la vista
        require_once "views/$loginUser"; //Requerimos la vista con la direccion
    }

    public function cart() //Metodo para mostrar vista de carrito
    {
        require_once "models/User.php"; //Requerimos el modelo de usuario
        $user = new User(); //Instanciamos un nuevo objeto de usuario
        $cartUser = $user->cart(); //Obtenemos el nombre de la vista
        require_once "views/$cartUser"; //Requerimos la vista con la direccion
    }
}
