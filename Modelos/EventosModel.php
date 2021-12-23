<?php

class EventosModel extends Model {

public function create(){

}

public function read(){

}

public function update(){

}
public function delete(){

}

public function tiponovedad(){
    
    require ('conexion.php');
	
	$query = "SELECT tiponovedad_id, tiponovedad FROM tiponovedad ORDER BY tiponovedad";
	$resultado=$mysqli->query($query);


}



}

?>