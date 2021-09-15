<?php
include_once "DB.php";

class consultaBase extends DB {
	protected $conectar;

    public function __construct()
    {
        $this->conectar= parent::connect();

    }

    public function mostrarClientes(){
        $resultado=false;
        try{
            $stmt=$this->conectar->prepare("SELECT * FROM clientes");
            $stmt ->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt ->closeCursor();
            return $resultado;
        }catch(\PDOException $e){
            echo "Error al consultar";
            print_r($e->getMessage());
        }
    }
}
?>