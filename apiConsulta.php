<?php
include_once "consultaBase.php";

class apiConsulta{
	public function getClientes(){
		$cuenta= new consultaBase();
        $cuentas =array();
        $cuentas["items"]=array();
        $res = $cuenta->mostrarClientes();

        if(count($res) >0 ){
            $row=0;
            while($row < count($res)){
           
                $item = array(
                    'id' => $res[$row]['id'],
                    'nombre' => $res[$row]['nombre'],
                    'ciudad' => $res[$row]['ciudad'],
                );
                array_push($cuentas['items'],$item);
                $row++;
            }
            echo json_encode($cuentas);
            //echo phpinfo();
        }else{
            echo json_encode(array('mensaje'=>'No hay cuentas registradas'));
        }
	
	}
	
	public function saveCliente($cliente){
		$cuenta=new consultaBase();
		$res=$cuenta->guardarCliente($cliente);
		echo json_encode($res);
	}
}

?>