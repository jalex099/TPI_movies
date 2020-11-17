<?php
class UserController //Clase controlador para acciones de User
{
    public function login() //Metodo para mostrar vista de login
    {
        require_once "models/User.php"; //Requerimos el modelo de usuario
        $user = new User(); //Instanciamos un nuebo objeto de usuario
        $loginUser = $user->login(); //Obtenemos el nombre de la vista
        require_once "views/$loginUser"; //Requerimos la vista con la direccion
    }
}
