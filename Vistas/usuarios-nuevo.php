<?php 
	if( $_POST['r'] == 'usuarios-nuevo' && !isset($_POST['crud']) ) {
	print('		
		<div class="spinner-wrapper">
		    <div class="spinner"></div>
		</div>
        <center>
            <h3>AGREGAR NUEVO USUARIO</h3>
        </center>
        
	 	<div class="row">
            <div class="col s12 m4 offset-m4" style=" padding-top: 100px;">
	            <form class="col s12"  method="POST">

		            <div class="row">
                        <div class="input-field col s6">
                            <input type="text" name="nombres" placeholder="Nombres" required>
                        </div>

                        <div class="input-field col s6">
                            <input type="text" name="apellidos" placeholder="Apellidos" required>
                        </div>
                    </div>   

                    <div class="input-field col m12">                       
                        <select name = "id_tipodocumento" required>
                            <option value="" disabled selected>Tipo de documento</option>
                            <option value="1">Tarjeta de identidad</option>
                            <option value="2">Cédula de ciudadanía</option>
                            <option value="3">Cédula de extranjería</option>
                            <option value="4">Contraseña registraduría</option>
                            <option value="5">Pasaporte Colombiano</option>
                            <option value="6">Pasaporte Extranjero</option>
                        </select>
                    </div>

                    <div class="input-field">
                        <input type="tel" name="numerodocumento" placeholder="Numero de documento" required>
                    </div>

                    <div class="input-field" >
                        <input type="email" name="correo" placeholder="Correo electronico" required>
                    </div>

                    <div class="input-field" >
                        <input type="tel" name="celular" placeholder="Celular" required>
                    </div>

                    <div class="input-field">                       
                        <select name = "usuario">
                            <option value="">Seleccione rol de usuario</option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                            <option value="3">Mantenimiento</option>
                            <option value="4">SENA</option>
                        </select>
                    </div>

                    <div class="input-field">                       
                        <select name = "id_cargo" required>
                            <option value="" disabled selected>Tipo de usuario</option>
                            <option value="1">Instructor</option>
                            <option value="2">Administrativo</option>
                            <option value="3">Guarda de seguridad</option>
                            <option value="4">Servicio general</option>
                            <option value="5">Aprendiz</option>
                            <option value="6">Trabajador oficial</option>
                        </select>
                    </div>

	        	    <br>             
	    
	                <div class="input-field s12 m4 l2">
	                    <button type="submit" value="Agregar" id="btn_pendientes" name="btn_pendientes" class= "btn waves-effect waves-light btn amber darken-4 " data-position="right" data-tooltip="Servicio Pendiente" style="margin:10px;">
                        <input type="hidden" name="r" value="usuarios-nuevo">
	                    <input type="hidden" name="crud" value="set">Añadir</button>

	           	    </div>
	            </form>  
     		</div>
    	</div>
	');

} else if( $_POST['r'] == 'usuarios-nuevo' && $_POST['crud'] == 'set' ) {
	$usuarios_controller = new UsuariosController();

	$nuevo_usuario = array(

		        'usuarios_id'=> 0,        
                'nombres' => $_POST['nombres'],
                'apellidos' => $_POST['apellidos'],
                'id_tipodocumento' => $_POST['id_tipodocumento'],
                'numerodocumento' => $_POST['numerodocumento'],
                'correo' => $_POST['correo'],
                'celular' => $_POST['celular'],
                'usuario' => $_POST['usuario'],
                'id_cargo' => $_POST['tipocargo'],
                'id_permiso'=>0
	);

	$usuario = $usuarios_controller->create($nuevo_usuario);

    $template = '
		<div class="center" style="margin-top: 180px;">
			<br><br>			
			<img class="p1  img-404" src="./public/img/load/loader.gif">			
			<h3>Cargando...</h3>
		</div>
		<script>
			window.onload = function (){
				reloadPage("usuarios")
			}	
		</script>
	';

		printf($template);

    
	} else { 
		//para generar una vista de no autorizado
		$controller = new VistaControlador();
		$controller->cargar_vista('error401');
	}

 ?>