<?php

class UserController { //Clase para controladores de usuario
    
    private $alfabeto = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z");
    
    public function showUser() { //Metodo para mostrar la vista de usuario
        require_once "models/User.php"; //Requerimos el archivo para el modelo de usuario
        $user = new User(); //Instanciamos el objeto de usuario
        
        $departamentos = $user->getDepartamentos();
        $roles = $user->getRol();
        $municipios = $user->getMunicipios();
        if(!empty($_POST)){
            if($_POST['alfabeto']=="" && $_POST['departamento']=="" && $_POST['municipio']=="" && $_POST['rol']==""){
                $listado = $user->getAll();
            } else{
                $listado = $user->getFilter($_POST['alfabeto'],$_POST['departamento'],$_POST['municipio'],$_POST['rol']);
            }
        } else{
            $listado = $user->getAll();
        }
        
        require_once "views/user.php"; //Requerimos la vista para mostrarla
    }
}