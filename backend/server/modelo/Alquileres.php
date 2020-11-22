<?php
require_once("Database/Connect.php");



class Alquileres extends Connect { //Clase de alquileres

    const TABLE_NAME = 'tblalquileres';


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
            return json_encode($data);
        } else{
            return $this->error();
        }
    }

    public function readOne($idCliente){
        $sql = "SELECT * FROM " . self::TABLE_NAME." WHERE idCliente = ".$idCliente;
        if ($result = $this->conn->query($sql)) {
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($data);
        } else{
            return $this->error();
        }
    }

    public function readSpecific(){
        $sql = "SELECT * FROM " . self::TABLE_NAME." order by idAlquiler desc limit 1";
        if ($result = $this->conn->query($sql)) {
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($data);
        } else{
            return $this->error();
        }
    }

    
    public function create($fechaAlquiler, $idCliente, $idPelicula){
        $sql = "INSERT INTO " . self::TABLE_NAME. " (`fechaAlquiler`, 
        `idCliente`, `idPelicula`, `estadoAlquiler`) 
        VALUES ('".$fechaAlquiler."',".$idCliente.",".$idPelicula.",
        1)";
        if ($result = $this->conn->query($sql)) {
            return json_encode($this->readSpecific());
        } else{
            return $this->error();
        }
    }
/************************************************************************************** */


    public function update($idCliente, $nombreCliente, $apellidoCliente, $correoCliente, $contraseñaCliente){
        $sql = "UPDATE " . self::TABLE_NAME." SET nombreCliente = '".$nombreCliente."', apellidoCliente = '".$apellidoCliente."',correoCliente='".$correoCliente."',contraseñaCliente = 
        '".$contraseñaCliente."' WHERE idCliente = ".$idCliente;
        if (!$result = $this->conn->query($sql)) {
            return $this->error();
        }

        return $this->ok();
    }

    public function delete($idCliente){
        $sql = "DELETE FROM " . self::TABLE_NAME." WHERE idCliente =".$idCliente;
        if (!$result = $this->conn->query($sql)) {
            return $this->error();
        } else{
            return $this->ok();
        }
    }
}

?>