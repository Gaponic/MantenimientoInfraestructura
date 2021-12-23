<?php
	require ('conexion.php');
	
	$tiponovedad_id = $_POST['tiponovedad_id'];
	
	$queryts = "SELECT tiposuceso_id, tiposuceso FROM tiposuceso WHERE tiponovedad_id = '$tiponovedad_id' ORDER BY tiposuceso";
	$resultadots=$mysqli->query($queryts);

	$html = "<option value='0'>Seleccionar Tipo suceso</option>"


	
	while($rowts = $resultadots->fetch_assoc())
	{
		$html.= "<option value='".$rowts['tiposuceso_id']."'>".$rowts['tiposuceso']."</option>";
	}
	echo $html;
?>