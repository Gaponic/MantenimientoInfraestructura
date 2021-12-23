<?php
	require ('./Vistas/conexion.php');
	
	$tiposuceso_id = $_POST['tiposuceso_id'];
	echo($tiposuceso_id);
	
	$query = "SELECT suceso_id, suceso FROM suceso WHERE tiposuceso_id = '$tiposuceso_id' ORDER BY suceso";
	$resultado=$mysqli->query($query);
	

	while($row = $resultado->fetch_assoc())
	{
		$html.= "<option value='".$row['suceso_id']."'>".$row['suceso']."</option>";
	}
	echo $html;
?>