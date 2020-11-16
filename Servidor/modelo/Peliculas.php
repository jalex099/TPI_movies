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
    
    public function upload($tituloPelicula, $descripcionPelicula, $generoPelicula, $portadaPelicula, $stockPelicula, $precioVentaPelicula, $precioAlquilerPelicula, $disponibilidadPelicula){
        $sql = "INSERT INTO " . self::TABLE_NAME. " (`tituloPelicula`, `descripcionPelicula`, 
        `generoPelicula`, `portadaPelicula`, `stockPelicula`, `precioVentaPelicula`, `precioAlquilerPelicula`, 
        `disponibilidadPelicula`) VALUES ('".$tituloPelicula."','".$descripcionPelicula."','".$generoPelicula."',
        '".$portadaPelicula."',".$stockPelicula.",".$precioVentaPelicula.",".$precioAlquilerPelicula.",
        ".$disponibilidadPelicula.")";
        if (!$result = $this->conn->query($sql)) {
            return "Error al introducir pelicula";
        }

        return "Insertado!";
    }
}

?>