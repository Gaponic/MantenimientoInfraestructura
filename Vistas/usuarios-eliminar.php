<?php
$usuarios_controller = new UsuariosController();

if( $_POST['r'] == 'usuarios-eliminar' && !isset($_POST['crud']) ) {

    $usuarios = $usuarios_controller->read($_POST['usuarios_id']);

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
				<div class="row">
				 	<div class="col l4 offset-l4">
			      		<center>
			      			<h2>Eliminar usuario</h2>
			  			</center>
						<form method="POST" class="item">
							<div class="center">
							<br><br>			
							<img class="p1  img-404" src="./public/img/del.svg" alt="Recurso No Encontrado" width="400" height="250">	
							<br>
								¿Estas seguro de eliminar el Usuario:
								<b>%s</b>?
							</div>
							<div class="center">
								<form method="POST">
									<button style="margin-bottom: 12px;margin-right: 25px;margin-top: 15px;" class="btn-small grey lighten-2 z-depth-2  waves-effect right blue-text text-darken-4 modal-trigger hide-on-med-and-down tooltipped" type="sumbit" onclick="history.back()">No</button>
			    				</form>
								<form method="POST">
									<input type="hidden" name="usuarios_id" value="%s">
									<input type="hidden" name="r" value="usuarios-eliminar">
									<input type="hidden" name="crud" value="del">
									<button style="margin-bottom: 12px;margin-right: 25px;margin-top: 15px;" class="btn-small grey lighten-2 z-depth-2  waves-effect right blue-text text-darken-4 modal-trigger hide-on-med-and-down tooltipped" type="sumbit" name="crud" value="del">Si</button>
			    				</form>
							</div>
						</form>		
		  			</div>
	  			</div>
			';

        printf(
            $template_user,
            $usuarios[0]['nombres'],
            $usuarios[0]['usuarios_id']
        );
    }

} else if( $_POST['r'] == 'usuarios-eliminar' && $_POST['crud'] == 'del' ) {
    $usuarios = $usuarios_controller->delete($_POST['usuarios_id']);

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


