<?php
require_once("Database/Connect.php");



class Ventas extends Connect { //Clase de ventas

    const TABLE_NAME = 'tblventas';
    const TABLE_NAME_PELICULAS = 'tblpeliculas';


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

    public function readOne($idCliente){
        $sql = "SELECT * FROM " . self::TABLE_NAME." WHERE idCliente = ".$idCliente;
        if ($result = $this->conn->query($sql)) {
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else{
            return $this->error();
        }
    }

    public function readOneSpecific($idVenta){
        $sql = "SELECT * FROM " . self::TABLE_NAME." WHERE idAlquiler = ".$idAlquiler;
        if ($result = $this->conn->query($sql)) {
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else{
            return $this->error();
        }
    }

    public function readSpecific(){
        $sql = "SELECT * FROM " . self::TABLE_NAME." order by idVenta desc limit 1";
        if ($result = $this->conn->query($sql)) {
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else{
            return $this->error();
        }
    }

    public function substract($idPelicula,$cantidadVenta){
        $sql = " UPDATE " . self::TABLE_NAME_PELICULAS." SET stockPelicula= stockPelicula-".$cantidadVenta." WHERE idPelicula = ".$idPelicula;
        if ($result = $this->conn->query($sql)) {
            return true;
        } else{
            return false;
        }
    }

    
    public function create($cantidadVenta, $fechaVenta, $idCliente, $idPelicula){
        $sql = "INSERT INTO " . self::TABLE_NAME. " (`cantidadVenta`,  `fechaVenta`,
        `idCliente`, `idPelicula`) 
        VALUES (".$cantidadVenta.",'".$fechaVenta."',".$idCliente.",".$idPelicula.")";
        if ($result = $this->conn->query($sql)) {
            $this->substract($idPelicula, $cantidadVenta);
            return $this->readSpecific();
            
        } else{
            return $this->error();
        }
    }

    public function detailAlquiler($idAlquiler, $fechaDevolucionAlquiler, $totalDetalleAlquiler, $multaDetalleAlquiler){
        $sql = "INSERT INTO " . self::TABLE_NAME_DETAIL. " (`idAlquiler`,  `fechaDevolucionAlquiler`,
        `totalDetalleAlquiler`, `multaDetalleAlquiler`) 
        VALUES (".$idAlquiler.",'".$fechaDevolucionAlquiler."',".$totalDetalleAlquiler.",".$multaDetalleAlquiler.")";
        if ($result = $this->conn->query($sql)) {
            $this->add($idPelicula);
            $this->estadoAlquiler($idAlquiler);
            return $this->ok();
        } else{
            return $this->error();
        }
    }

}

?>