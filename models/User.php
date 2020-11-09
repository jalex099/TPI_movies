<?php

require_once "database/Database.php";

class User extends Database { //Clase de usuario

    const TABLE_NAME = 'usuario';


    public function showUser() { //Metodo para mostrar direccion de la vista
        $userDir = "user.php"; //Declaramos el nombre del archivo de vista
        return $userDir; //Retronamos la vista
    }

    public function getAll(){
        $sql = "SELECT u.id_usuario, u.nombre_usuario, u.apellido_usuario, u.user_usuario, u.rol_usuario, d.nombre_departamento, m.nombre_municipio, u.id_colonia FROM " . self::TABLE_NAME." u ";
        $sql .= " INNER JOIN departamento d on d.id_departamento = u.id_departamento INNER JOIN municipio m on m.id_municipio = u.id_municipio ORDER BY u.nombre_usuario ASC";
        if ($result = $this->conn->query($sql)) {
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        }
    }

    public function getFilter($alfabeto,$departamento, $municipio, $rol){
        $bandera = false;
        $sql = "SELECT u.id_usuario, u.nombre_usuario, u.apellido_usuario, u.user_usuario, u.rol_usuario, d.nombre_departamento, m.nombre_municipio, u.id_colonia FROM " . self::TABLE_NAME." u ";
        $sql .= " INNER JOIN departamento d on d.id_departamento = u.id_departamento INNER JOIN municipio m on m.id_municipio = u.id_municipio";
        if($departamento != ""){
            if(!$bandera)
            {
                $sql .= " WHERE";
                $bandera = true;
            } else{
                $sql .= " AND";
            }
            $sql .= " d.nombre_departamento = '{$departamento}' ";
        }
        if($rol != ""){
            if(!$bandera)
            {
                $sql .= " WHERE";
                $bandera = true;
            } else{
                $sql .= " AND";
            }
            $sql .= " u.rol_usuario = '{$rol}' ";
        }
        if($municipio != ""){
            if(!$bandera)
            {
                $sql .= " WHERE";
                $bandera = true;
            } else{
                $sql .= " AND";
            }
            $sql .= " m.nombre_municipio = '{$municipio}' ";
        }
        if($alfabeto != ""){
            if(!$bandera)
            {
                $sql .= " WHERE";
                $bandera = true;
            } else{
                $sql .= " AND";
            }
            $sql .= " u.nombre_usuario LIKE '{$alfabeto}%' ";
        }
        if ($result = $this->conn->query($sql)) {
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        }
    }
    
    public function getDepartamentos(){
        $sql = "SELECT nombre_departamento FROM departamento";
        if ($result = $this->conn->query($sql)) {
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        }
    }

    public function getMunicipios(){
        $sql = "SELECT nombre_municipio FROM municipio";
        if ($result = $this->conn->query($sql)) {
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        }
    }

    public function getRol(){
        $sql = "SELECT rol_usuario FROM usuario GROUP BY rol_usuario";
        if ($result = $this->conn->query($sql)) {
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        }
    }
}