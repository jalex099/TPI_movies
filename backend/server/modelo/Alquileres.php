<?php
require_once("Database/Connect.php");



class Alquileres extends Connect { //Clase de alquileres

    const TABLE_NAME = 'tblalquileres';
    const TABLE_NAME_DETAIL = 'tbldetallealquileres';
    const TABLE_NAME_PELICULAS = 'tblpeliculas';


    public function error(){
        return array("response"=>false);
    }

    public function ok(){
        return array("response"=>true);
    }


    public function read(){
        $sql = "SELECT * FROM " . self::TABLE_NAME." WHERE estadoAlquiler = 1";
        if ($result = $this->conn->query($sql)) {
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else{
            return $this->error();
        }
    }

    public function readOne($idCliente){
        $sql = "SELECT * FROM " . self::TABLE_NAME." WHERE idCliente = ".$idCliente;
        if ($result = $this->conn->query($sql)) {
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else{
            return $this->error();
        }
    }

    public function readOneSpecific($idAlquiler){
        $sql = "SELECT * FROM " . self::TABLE_NAME." WHERE idAlquiler = ".$idAlquiler;
        if ($result = $this->conn->query($sql)) {
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else{
            return $this->error();
        }
    }

    public function readSpecific(){
        $sql = "SELECT * FROM " . self::TABLE_NAME." order by idAlquiler desc limit 1";
        if ($result = $this->conn->query($sql)) {
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else{
            return $this->error();
        }
    }

    public function subtract($idPelicula){
        $sql = " UPDATE " . self::TABLE_NAME_PELICULAS." SET stockPelicula= stockPelicula-1 WHERE idPelicula = ".$idPelicula;
        if ($result = $this->conn->query($sql)) {
            return true;
        } else{
            return false;
        }
    }

    public function add($idPelicula){
        $sql = " UPDATE " . self::TABLE_NAME_PELICULAS." SET stockPelicula= stockPelicula+1 WHERE idPelicula = ".$idPelicula;
        if ($result = $this->conn->query($sql)) {
            return true;
        } else{
            return false;
        }
    }

    
    public function create($fechaAlquiler, $fechaEsperadaAlquiler, $idCliente, $idPelicula){
        $sql = "INSERT INTO " . self::TABLE_NAME. " (`fechaAlquiler`,  `fechaEsperadaAlquiler`,
        `idCliente`, `idPelicula`, `estadoAlquiler`) 
        VALUES ('".$fechaAlquiler."','".$fechaEsperadaAlquiler."',".$idCliente.",".$idPelicula.",
        1)";
        if ($result = $this->conn->query($sql)) {
            if($this->substract($idPelicula)){
                return $this->readSpecific();
            }else{
                return $this->error();
            }
        } else{
            return $this->error();
        }
    }

    public function detailAlquiler($idAlquiler, $fechaDevolucionAlquiler, $totalDetalleAlquiler, $multaDetalleAlquiler){
        $sql = "INSERT INTO " . self::TABLE_NAME_DETAIL. " (`idAlquiler`,  `fechaDevolucionAlquiler`,
        `totalDetalleAlquiler`, `multaDetalleAlquiler`) 
        VALUES (".$idAlquiler.",'".$fechaDevolucionAlquiler."',".$totalDetalleAlquiler.",".$multaDetalleAlquiler.")";
        if ($result = $this->conn->query($sql)) {
            if($this->add($idPelicula)){
                return $this->ok();
            }else{
                return $this->error();
            }
        } else{
            return $this->error();
        }
    }

}

?>