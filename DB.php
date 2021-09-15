<?php

class DB 
{
    private static $conexion=null;
    private $servername;
    private $dbname;
    private $port;
    private $dbh;


	public function connect (){
		$archivo= "C:/xampp/htdocs/prueba/config.ini";
        if(!$ajustes = parse_ini_file($archivo,true)) throw new Exception ('No se pudo abrir el archivo:  '.$archivo);
        $this->servername=$ajustes["database"]["host"];
        $this->port=$ajustes["database"]["port"];
        $this->dbname=$ajustes["database"]["dbname"];
        

        try {
			return $this->dbh = new PDO ("mysql:host=$this->servername;port=$this->port;dbname=$this->dbname",
			$ajustes["database"]["username"],
			$ajustes["database"]["password"],
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch(PDOException $e) {
            echo "ERROR";
            echo  $e->getMessage();

        }
		
	}
}
?>