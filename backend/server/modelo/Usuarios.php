<?php
require_once("Database/Connect.php");



class Usuarios extends Connect { //Clase de usuarios

    const TABLE_NAME = 'tblusuarios';


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

    public function readOne($correoUsuario){
        $sql = "SELECT * FROM " . self::TABLE_NAME." WHERE correoUsuario='".$correoUsuario."'";
        if ($result = $this->conn->query($sql)) {
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($data)){
                return $data;
            } else{
                return $this->error();
            }
        } else{
            return $this->error();
        }
    }

    
    public function create($nombreUsuario, $apellidoUsuario, $correoUsuario, $contraseñaUsuario, $rolUsuario){
        $sql = "INSERT INTO " . self::TABLE_NAME. " (`nombreUsuario`, 
        `apellidoUsuario`, `correoUsuario`, `contraseñaUsuario`,`rolUsuario`) 
        VALUES ('".$nombreUsuario."','".$apellidoUsuario."','".$correoUsuario."',
        '".$contraseñaUsuario."','".$rolUsuario."')";
        if (!$result = $this->conn->query($sql)) {
            return $this->error();
        }

        return $this->ok();
    }

    /*--------------------------------------------------------------- */

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