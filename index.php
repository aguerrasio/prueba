<?php
include_once "apiConsulta.php";
 
 $api = new apiConsulta();
 $api->getClientes();
 
 //$nuevoCliente=array('id'=>3,'nombre'=>'Brenda','ciudad'=>'caba');
 
 //$api->saveCliente($nuevoCliente);
?>