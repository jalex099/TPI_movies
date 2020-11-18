<?php
require_once("Database/Connect.php");



class Clientes extends Connect { //Clase de clientes

    const TABLE_NAME = 'tblclientes';


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

    
    public function create($nombreCliente, $apellidoCliente, $correoCliente, $contraseñaCliente){
        $sql = "INSERT INTO " . self::TABLE_NAME. " (`nombreCliente`, 
        `apellidoCliente`, `correoCliente`, `contraseñaCliente`) 
        VALUES ('".$nombreCliente."','".$apellidoCliente."','".$correoCliente."',
        '".$contraseñaCliente."')";
        if (!$result = $this->conn->query($sql)) {
            return $this->error();
        }

        return $this->ok();
    }

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