<?php
require_once("Database/Connect.php");



class Peliculas extends Connect { //Clase de peliculas

    const TABLE_NAME = 'tblpeliculas';


    public function error(){
        return "Error en la consulta a la base de datos";
    }
    public function getAll(){
        $sql = "SELECT idPelicula, tituloPelicula FROM " . self::TABLE_NAME;
        if ($result = $this->conn->query($sql)) {
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($data);
        } else{
            return error();
        }
    }

    public function getFilter($alfabeto){
        $bandera = false;
        $sql = "SELECT idPelicula, tituloPelicula FROM " . self::TABLE_NAME;
    
        if($alfabeto != ""){
            if(!$bandera)
            {
                $sql .= " WHERE";
                $bandera = true;
            } else{
                $sql .= " AND";
            }
            $sql .= " tituloPelicula LIKE '{$alfabeto}%' ";
        }
        if ($result = $this->conn->query($sql)) {
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
        } else{
            return error();
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

?>