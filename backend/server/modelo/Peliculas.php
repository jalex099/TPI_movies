<?php
require_once("Database/Connect.php");



class Peliculas extends Connect { //Clase de peliculas

    const TABLE_NAME = 'tblpeliculas';


    public function error(){
        return array("response"=>false);
    }

    public function ok(){
        return array("response"=>true);
    }


    public function read(){
        $sql = "SELECT * FROM " . self::TABLE_NAME;
        if ($result = $this->conn->query($sql)) {
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else{
            return $this->error();
        }
    }

    
    public function create($tituloPelicula, $descripcionPelicula, $generoPelicula, $portadaPelicula, $stockPelicula, $precioVentaPelicula, $precioAlquilerPelicula, $disponibilidadPelicula){
        $sql = "INSERT INTO " . self::TABLE_NAME. " (`tituloPelicula`, `descripcionPelicula`, 
        `generoPelicula`, `portadaPelicula`, `stockPelicula`, `precioVentaPelicula`, `precioAlquilerPelicula`, 
        `disponibilidadPelicula`) VALUES ('".$tituloPelicula."','".$descripcionPelicula."','".$generoPelicula."',
        '".$portadaPelicula."',".$stockPelicula.",".$precioVentaPelicula.",".$precioAlquilerPelicula.",
        ".$disponibilidadPelicula.")";
        if (!$result = $this->conn->query($sql)) {
            return $this->error();
        }

        return $this->ok();
    }

    public function update($idPelicula, $tituloPelicula, $descripcionPelicula, $generoPelicula, $portadaPelicula, $stockPelicula, $precioVentaPelicula, $precioAlquilerPelicula, $disponibilidadPelicula){
        $sql = "UPDATE " . self::TABLE_NAME." SET tituloPelicula = '".$tituloPelicula."', descripcionPelicula = '".$descripcionPelicula."',generoPelicula='".$generoPelicula."',portadaPelicula = 
        '".$portadaPelicula."', stockPelicula=".$stockPelicula.",precioVentaPelicula=".$precioVentaPelicula.",precioAlquilerPelicula=".$precioAlquilerPelicula.", disponibilidadPelicula =".$disponibilidadPelicula." WHERE idPelicula = ".$idPelicula;
        if (!$result = $this->conn->query($sql)) {
            return $this->error();
        }

        return $this->ok();
    }

    public function delete($idPelicula){
        $sql = "DELETE FROM " . self::TABLE_NAME." WHERE idPelicula =".$idPelicula;
        if (!$result = $this->conn->query($sql)) {
            return $this->error();
        } else{
            return $this->ok();
        }
    }
}

?>