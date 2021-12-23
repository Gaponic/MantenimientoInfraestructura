

<?php



if ($_SESSION['id_tipodocumento'] == 1) {
	 $_SESSION['id_tipodocumento'] = 'Tarjeta de identidad';
}

	else{
		if ($_SESSION['id_tipodocumento'] == 2) {
			$_SESSION['id_tipodocumento'] = 'Cédula de ciudadanía';	
		}
		else {
			if($_SESSION['id_tipodocumento'] == 3){
				$_SESSION['id_tipodocumento'] = 'Cédula de extranjería';
			}
			else{
				if ($_SESSION['id_tipodocumento'] == 4) {
					$_SESSION['id_tipodocumento'] = 'Contraseña registraduría';
					
				}else{
					if ($_SESSION['id_tipodocumento'] == 5) {
						$_SESSION['id_tipodocumento'] = 'Pasaporte Colombiano';
					}
					else{
						if ($_SESSION['id_tipodocumento'] == 6) {
							$_SESSION['id_tipodocumento'] = 'Pasaporte extranjero';
						}
						
					}

				}
			}
		}
}


if ($_SESSION['id_cargo'] == 1) {
	$_SESSION['id_cargo'] = 'Instructor';
}

   else{
	   if ($_SESSION['id_cargo'] == 2) {
			$_SESSION['id_cargo'] = 'Administrativo';	
	   }
	   else {
		   if($_SESSION['id_cargo'] == 3){
				$_SESSION['id_cargo'] = 'Guarda de seguridad';
		   }
		   else{
			   if ($_SESSION['id_cargo'] == 4) {
					$_SESSION['id_cargo'] = 'Servicio general';
				   
			   }else{
				   if ($_SESSION['id_cargo'] == 5) {
						$_SESSION['id_cargo'] = 'Aprendiz';
				   }
				   else{
					   if ($_SESSION['id_cargo'] == 6) {
							$_SESSION['id_cargo'] = 'Trabajador oficial';
					   }
					   
				   }

			   }
		   }
	   }
}


	

$vista ='

<script>
    document.addEventListener("DOMContentLoaded", function() {
inicioMapa();
    });
</script>


<section class="vh-100" style="background-color: $yellow-100;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100" style="padding-top:30px">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                            <div class="card-body p-4 p-lg-5 text-black">

								<center>
									<h2>NOTIFICACIÓN DE EVENTOS</h2>
								</center>
								
								

								<form class="row g-3">
								 	<div class="col-md-6">
										<label class="form-label">Nombres</label>
										<input type="text" class="form-control" value="%s" disabled>
								  	</div>
								  	<div class="col-md-6">
										<label class="form-label">Apellidos</label>
										<input type="text" class="form-control" value="%s" disabled>
								  	</div>
								  	
								  <div class="col-md-4">
									<label for="id_tipodocumento" class="form-label">Tipo de documento</label>
									<select  class="form-select" name = "id_tipodocumento" disabled>
									  <option value="" disabled selected>%s</option>
									</select >
								  </div>
								  
								  <div class="col-md-6">
									<label for="numerodocumento" class="form-label">Número de documento</label>
									<input type="tel" name="numerodocumento"  class="form-control" value="%s" disabled>
								  </div>
								  
								  <div class="col-md-4">
									<label for="id_cargo" class="form-label">Tipo de usuario</label>
									<select  class="form-select" name = "id_cargo" disabled>
									  <option value="" disabled selected>%s</option>
									</select >
								  </div>
								  
								  	<div class="form-floating">
									  <textarea class="form-control" name="novedad_especifica"  required ></textarea>
									  <label for="floatingTextarea">Novedad específica</label>
									</div>
								  
								  <div class="col-md-4">
									<label for="fecha_novedad class="form-label">Fecha de la novedad</label>
									<input type="date" name="fecha_novedad" class="form-control" required>
								  </div>
								  
								  	<div class="mb-3">
									  <label for="formFile" class="form-label">AGREGAR FOTO</label>
									  <input class="form-control" name="imagen_inicio" type="file" accept="image/x-png,image/jpeg">
									</div>
									
									<div class="col-md-4">
										<label for="cordenada" >
											<span id="cordenada_label">Selecione un valor</span>
										</label>
										<br>
										<input type="hidden" value="0" id="cordenada">
										<input type="button" onclick="mostrarMapa()" value="mostrar mapa" class="btn btn-success">
									</div>
								  
								</form>
								
								<script src="./public/js/funcion.js"></script>
								
								<div class="modal fade" id="modalBloque1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<form id="formBloque1" class="form-grop">
								
													<div class="form-item">
														<label for="pisos"></label>
														<select class="form-select"  name="modalBloque1-bloque" id="modalBloque1-bloque">
															<option value="1">Piso 1</option>
															<option value="2">Piso 2</option>
														</select>
													</div>
													<div class="form-item">
														<label for="modalBloque1-pisos"></label>
														<select  class="form-select" name="modalBloque1-pisos" id="modalBloque1-pisos">
								
														</select>
													</div>
													<div class="form-item">
														<button type="submit">Enviar</button>
													</div>
								
												</form>
											</div>
											<div class="modal-footer">
												<h3 id="respuesta">lgo</h3>
											</div>
										</div>
									</div>
								</div>
								
								
								<div class="modal fade" id="modal_mapa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-body">
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												<img src="./public/img/mapa.jpg" alt="mapa" usemap="#mapa">
												<map name="mapa">
													<area id="bloque1" shape="rect" coords="50,570,470,610" href="#" alt="Bloque 1">
													<area id="bloque2" shape="rect" coords="50,420,330,520" href="#" alt="Bloque 2">
													<area id="bloque3" shape="rect" coords="480,170,600,540" href="#" alt="Bloque 3">
													<area id="bloque4" shape="rect" coords="610,170,730,540" href="#" alt="Bloque 4">
													<area id="bloque5" shape="rect" coords="780,370,820,610" href="#" alt="Bloque 5">
													<area id="bloque6" shape="rect" coords="770,170,820,360" href="#" alt="Bloque 6">
													<area id="bloque7" shape="rect" coords="420,160,515,60" href="#" alt="Bloque 7">
												</map>
											</div>
								
										</div>
									</div>
								</div>







<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

';

printf(
$vista,
$_SESSION['nombres'],
$_SESSION['apellidos'],
$_SESSION['id_tipodocumento'],
$_SESSION['numerodocumento'],
$_SESSION['id_cargo']
);
	

?>











































		