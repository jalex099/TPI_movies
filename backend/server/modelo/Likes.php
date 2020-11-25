<?php
require_once("Database/Connect.php");



class Likes extends Connect { //Clase de likes

    const TABLE_NAME = 'tbllikes';


    public function error(){
        return array("response"=>false);
    }

    public function ok(){
        return array("response"=>true);
    }


    public function read($idCliente){
        $sql = "SELECT * FROM " . self::TABLE_NAME." WHERE idCliente = ".$idCliente;
        if ($result = $this->conn->query($sql)) {
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else{
            return $this->error();
        }
    }

    
    public function create($idCliente, $idPelicula){
        $sql = "INSERT INTO " . self::TABLE_NAME. " (`idCliente`, 
        `idPelicula`) VALUES (".$idCliente.",".$idPelicula."')";
        if (!$result = $this->conn->query($sql)) {
            return $this->error();
        }

        return $this->ok();
    }

    public function delete($idCliente, $idPelicula){
        $sql = "DELETE FROM " . self::TABLE_NAME." WHERE idCliente =".$idCliente." AND idPelicula=".$idPelicula;
        if (!$result = $this->conn->query($sql)) {
            return $this->error();
        } else{
            return $this->ok();
        }
    }
}

?>