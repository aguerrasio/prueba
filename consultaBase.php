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
	
	public function guardarCliente($datosCliente){
			print_r($datosCliente);
			$id = $datosCliente['id'];
			$nombre = $datosCliente['nombre'];
			$ciudad = $datosCliente['ciudad'];
			$resultado=false;
			try{
				$stmt=$this->conectar->prepare("INSERT INTO clientes VALUES (?,?,?)");
				$stmt->bindParam(1, $id);
				$stmt->bindParam(2, $nombre);
				$stmt->bindParam(3, $ciudad);
				$stmt->execute();
				$resultado=true;
				return $resultado;
			}catch(\PDOException $e){
				echo "Error al insrtar";
				print_r($e->getMessage());
			}
	}
}
?>