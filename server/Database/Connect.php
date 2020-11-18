<?php
    require_once("config/dbConfig.php");
    /**
     * Clase conexion
     */
    class Connect
    {
        protected $conn;

        public function Connect()
        {
            try {
                $this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASSWORD);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->exec("SET CHARACTER SET ".DB_CHARSET);
                return $this->conn;

            } catch (Exception $e) {
                
                return "¡Error!: " . $e->getMessage();
                die();
            }
        }
    }
?>