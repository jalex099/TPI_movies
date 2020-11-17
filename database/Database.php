<?php
    require_once("config/dbConfig.php"); //Requerimos el archivo de configuraciones

    class Database //Clase para el manejo de la conexion con la base de datos
    {
        protected $conn; //Variavle protegida de conexion

        public function Database() //Metodo para conectar con base de datos
        {
            try { //Bloque try para intentar establecer conexion con la base
                //Hacemos un tratamiento con PDO
                $this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASSWORD);
                //Asignamos los atributos de errores y excepciones del PDO
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //Ejecutamos la consulta de conexion
                $this->conn->exec("SET CHARACTER SET ".DB_CHARSET);
                return $this->conn; //Retornamos la conexion

            } catch (Exception $e) { //Bloque catch para posibles errores
                print "¡Error!: " . $e->getMessage() . "</br>"; //Imprimir mensaje de error
                die(); //Matar conexion
            }
        }
    }
