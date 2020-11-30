<?php
class User //Modelo de User
{
    public function login() //Metodo para devolver nombre de la vista de login
    {
        $formDir = "form.php"; //Asignar nombre del archivo
        return $formDir; //Retornar nombre del archivo
    }

    public function cart() //Metodo para devolver nombre de la vista de carrito
    {
        $cartDir = "cart.php"; //Asignar nombre del archivo
        return $cartDir; //Retornar nombre del archivo
    }

    public function shopping() //Metodo para devolver nombre de la vista de compras
    {
        $cartDir = "shopping.php"; //Asignar nombre del archivo
        return $cartDir; //Retornar nombre del archivo
    }
    public function rent() //Metodo para devolver nombre de la vista de registro de alquileres
    {
        $movieDir = "rent.php"; //Asignar nombre del archivo
        return $movieDir; //Retornar nombre del archivo
    }
}
