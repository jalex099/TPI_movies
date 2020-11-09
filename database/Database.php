<?php
    require_once("config/dbConfig.php");
    /**
     * Clase conexion
     */
    class Database
    {
        protected $conn;

        public function Database()
        {
            try {
                $this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASSWORD);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->exec("SET CHARACTER SET ".DB_CHARSET);
                return $this->conn;

            } catch (Exception $e) {
                print "¡Error!: " . $e->getMessage() . "</br>";
                die();
            }
        }
    }
?>