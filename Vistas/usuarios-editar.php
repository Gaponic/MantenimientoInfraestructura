<?php 
$usuarios_controller = new UsuariosController();

if( $_POST['r'] == 'usuarios-editar' && !isset($_POST['crud']) ) {

	$usuarios= $usuarios_controller->read($_POST['usuarios_id']);

	if( empty($usuarios) ) {
		$template = '
			<div class="container">
				<p class="item  error">No existe el usuario <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("usuarios")
				}
			</script>
		';

		printf($template, $_POST['usuarios_id']);
	} else {


        $template_user = '
		<div class="spinner-wrapper">
		    <div class="spinner"></div>
		</div>
        <center>
            <h3>AGREGAR NUEVO USUARIO</h3>
        </center>
        
	 	<div class="row">
            <div class="col s12 m4 offset-m4" style=" padding-top: 100px;">
	            <form class="col s12"  method="POST">

                    <div class="input-field">
                        <input class="no-drop" type="text" placeholder="Serial" value="%s" disabled required>
                        <input type="hidden" name="usuarios_id" value="%s">
                        <label for="usuarios_id" class="active">Serial</label>
                    </div>

		            <div class="row">
                        <div class="input-field col s6">
                            <input type="text" name="nombres" placeholder="Nombres" value="%s" required>
                            <label for="nombres" class="active">Nombres</label>
                        </div>

                        <div class="input-field col s6">
                            <input type="text" name="apellidos" placeholder="Apellidos" value="%s" required>
                            <label for="apellidos" class="active">Apellidos</label>
                        </div>
                       

                        <div  class="input-field col m12">  
                        <label for="id_tipodocumento" class="active">Número de documento</label>                     
                            <select name = "id_tipodocumento" >
                        
                                <option>%s</option>
                                <option value="1">Tarjeta de identidad</option>
                                <option value="2">Cédula de ciudadanía</option>
                                <option value="3">Cédula de extranjería</option>
                                <option value="4">Contraseña registraduría</option>
                                <option value="5">Pasaporte Colombiano</option>
                                <option value="6">Pasaporte Extranjero</option>
                            </select>
                        </div>
                    </div>
                    

                    <div class="input-field">
                        <input type="tel" name="numerodocumento" placeholder="Número de documento" value="%s" required>
                        <label for="numerodocumento" class="active">Número de documento</label>
                    </div>
                    
                    <br>

                    <div class="row">

                        <div class="input-field" >
                            <input type="email" name="correo" placeholder="Correo electronico" value="%s" required>
                            <label for="correo" class="active">Correo electronico</label>
                        </div>

                        <div class="input-field" >
                             <input type="tel" name="celular" placeholder="Celular" value="%s" required>
                             <label for="celular" class="active">Celular</label>
                        </div>
                    

                        <div class="input-field">
                            <label for="celular" class="active">Tipo de rol en el sistema</label>                      
                                <select name = "usuario">
                                    <option>%s</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                    <option value="3">Mantenimiento</option>
                                    <option value="4">SENA</option>
                                </select>
                            
                        </div>
                        

                        <div class="input-field">
                            <label for="id_cargo" class="active">Tipo de Usuario</label>                       
                                <select name = "id_cargo" >
                                    <option>%s</option>
                                    <option value="1">Instructor</option>
                                    <option value="2">Administrativo</option>
                                    <option value="3">Guarda de seguridad</option>
                                    <option value="4">Servicio general</option>
                                    <option value="5">Aprendiz</option>
                                    <option value="6">Trabajador oficial</option>
                                </select>
                        </div>
                    </div>

                    <br>
                    
                    <div class="row"></div>
                    <div class="input-field s12 m4 l2" style="margin-top: 60px;margin-left: 10px;">              
                        <a href="#terms" class="btn blue darken-4 modal-trigger">Guardar Cambios</a>
                        <div class="modal" id="terms">
                            <div class="modal-content">
                                <h4>Confirmar</h4>
                                <p>Estas seguro de modificar el usuario con nombre de: <b>%s</b></p>
                            </div>
                             <div class="modal-footer">
                                <button formmethod="post" type="submit" value="Editar" id="btn_pendientes" name="btn_pendientes" class="btn btn-small blue darken-4 tooltipped " data-position="right" data-tooltip="Servicio Pendiente" style="margin:10px;">
                                    <input type="hidden" name="r" value="usuarios-editar">
                                    <input type="hidden" name="crud" value="update">si</button>
                                 <a href="#!" class="modal-close btn blue darken-4">No</a>
                             </div>
                        </div>
                    </div>
			    </form>
		    </div>
		</div>
		';



        printf(
            $template_user,
            $usuarios[0]['usuarios_id'],
            $usuarios[0]['usuarios_id'],
            $usuarios[0]['nombres'],
            $usuarios[0]['apellidos'],
            $usuarios[0]['tipodocumento'],
            $usuarios[0]['numerodocumento'],
            $usuarios[0]['correo'],
            $usuarios[0]['celular'],
            $usuarios[0]['usuario'],
            $usuarios[0]['tipocargo'],
            $usuarios[0]['nombres']

        );
    }


} elseif( $_POST['r'] == 'usuarios-editar' && $_POST['crud'] == 'update' ) {

	$guardar_usuario = array(

		        'usuarios_id'=> $_POST['usuarios_id'],        
                'nombres' => $_POST['nombres'],
                'apellidos' => $_POST['apellidos'],
                'id_tipodocumento' => $_POST['id_tipodocumento'],
                'numerodocumento' => $_POST['numerodocumento'],
                'correo' => $_POST['correo'],
                'celular' => $_POST['celular'],
                'usuario' => $_POST['usuario'],
                'id_cargo' => $_POST['id_cargo'],
                'id_permiso'=>0
	);

    if ($guardar_usuario['id_tipodocumento'] == 'Tarjeta de identidad') {
        $guardar_usuario['id_tipodocumento'] = 1;
    }

    else{
        if ($guardar_usuario['id_tipodocumento'] == 'Cédula de ciudadanía') {
            $guardar_usuario['id_tipodocumento'] = 2;
        }
        else {
            if($guardar_usuario['id_tipodocumento'] == 'Cédula de extranjería'){
                $guardar_usuario['id_tipodocumento'] = 3;
            }
            else{
                if ($guardar_usuario['id_tipodocumento'] == 'Contraseña registraduría'){
                    $guardar_usuario['id_tipodocumento'] = 4;

                }else{
                    if ($guardar_usuario['id_tipodocumento'] == 'Pasaporte Colombiano') {
                        $guardar_usuario['id_tipodocumento'] = 5;
                    }
                    else{
                        if ($guardar_usuario['id_tipodocumento'] == 'Pasaporte extranjero') {
                            $guardar_usuario['id_tipodocumento'] = 6;
                        }

                    }

                }
            }
        }
    }


    if ($guardar_usuario['id_cargo'] == 'Instructor') {
        $guardar_usuario['id_cargo'] = 1;
    }

    else{
        if ($guardar_usuario['id_cargo'] == 'Administrativo') {
            $guardar_usuario['id_cargo'] = 2;
        }
        else {
            if($guardar_usuario['id_cargo'] == 'Guarda de seguridad'){
                $guardar_usuario['id_cargo'] = 3;
            }
            else{
                if ($guardar_usuario['id_cargo'] == 'Servicio general') {
                    $guardar_usuario['id_cargo'] = 4;

                }else{
                    if ($guardar_usuario['id_cargo'] == 'Aprendiz') {
                        $guardar_usuario['id_cargo'] = 5;
                    }
                    else{
                        if ($guardar_usuario['id_cargo'] == 'Trabajador oficial') {
                            $guardar_usuario['id_cargo'] = 6;
                        }

                    }

                }
            }
        }
    }

    if ($guardar_usuario['usuario'] == 'Admin') {
        $guardar_usuario['usuario'] = 1;
    }

    else{
        if ($guardar_usuario['usuario'] == 'User') {
            $guardar_usuario['usuario'] = 2;
        }
        else {
            if($guardar_usuario['usuario'] == 'Mantenimiento'){
                $guardar_usuario['usuario'] = 3;
            }
            else{
                if ($guardar_usuario['usuario'] == 'SENA') {
                    $guardar_usuario['usuario'] = 4;

                }
            }
        }
    }

	$usuarios = $usuarios_controller->update($guardar_usuario);

    $template = '
		<div class="center" style="margin-top: 180px;">
			<br><br>			
			<img class="p1  img-404" src="./public/img/load/loader.gif">			
			<h3>Guardando Cambios...</h3>
		</div>
		<script>
			window.onload = function (){
				reloadPage("usuarios")
			}	
		</script>
		
	';

    printf($template);
} else {
	$controller = new VistaControlador();
	$controller->cargar_vista('error401');
}