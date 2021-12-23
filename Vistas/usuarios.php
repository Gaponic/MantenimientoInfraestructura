<?php

$usuarios_controller = new UsuariosController();
$usuarios= $usuarios_controller->read();

if( empty($usuarios) ) {
    $inicio ='
			<div class="center">
				<br><br>			
				<img class="p1  img-404" src="./public/img/empty.svg" alt="Recurso No Encontrado" width="400" height="250">
				<h4 class="item  error">No hay registro de ningún usuario</h4>';
					$inicio .='
					<div class="center">
						<form method="POST">
							<input type="hidden" name="r" value="user-add">
							<button style="margin-bottom: 12px;" class="btn-small orange accent-2 z-depth-2  waves-effect right blue-text text-darken-4 modal-trigger hide-on-med-and-down tooltipped" type="sumbit" value="Agregar">Nuevo</button>
						</form>	
					</div>';
				$inicio .= '
					<div class="center">
						<button style="margin-bottom: 12px;margin-right: 635px;" class="btn-small orange accent-2 z-depth-2  waves-effect right blue-text text-darken-4 modal-trigger hide-on-med-and-down tooltipped" type="sumbit" onclick="history.back()" value="Agregar">Regresar</button>	
					</div>				
				</div>
				';
		print($inicio);

    }else {
        $template_usuarios = '
        <div class="spinner-wrapper">
			    <div class="spinner"></div>
			</div>
			<center>
				<h2>Gestión de Usuarios</h2>
			</center>
				<div class="row">
                    <div class="col l10 offset-l1" style="position: absolute; top:15%;padding-top: 75px;margin-bottom: 30px;">';
                    $template_usuarios .= '<form method="POST">
								<input type="hidden" name="r" value="usuarios-nuevo">
								<button style="margin-bottom: 12px;" class="btn amber darken-4  waves-effect right white-text text-white modal-trigger hide-on-med-and-down tooltipped" type="sumbit" value="Agregar">Nuevo</button>
    						</form>';

                $template_usuarios .= '<table id="table_id" class="centered bitacoras_mantenimiento" id="tabla_tickets">                
                    <caption>
                    
                    </caption>
                    <thead class="white-text text-white amber darken-4 "> 
                    <tr>  
                        <th>Serial</th>        
                        <th>Tipo de documento</th>
                        <th>Número de documento</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Celular</th>
                        <th>Usuario</th>
                        <th>tipocargo</th>
                        <th>id_permiso</th>';

                    $template_usuarios .= '<th></th>
				    <th></th>';
                    $template_usuarios .= '</tr>
			      	  </thead>';
                for ($n=0; $n < count($usuarios) ; $n++) { 
                     $template_usuarios .='
                    <tr>
                        <td>' . $usuarios[$n]['usuarios_id'] . '</td>       
                        <td>' . $usuarios[$n]['tipodocumento'] . '</td>
                        <td>' . $usuarios[$n]['numerodocumento'] . '</td>
                        <td>' . $usuarios[$n]['nombres'] . '</td>
                        <td>' . $usuarios[$n]['apellidos'] . '</td>
                        <td>' . $usuarios[$n]['correo'] . '</td>
                        <td>' . $usuarios[$n]['celular'] . '</td>
                        <td>' . $usuarios[$n]['usuario'] . '</td>
                        <td>' . $usuarios[$n]['tipocargo'] . '</td>
                        <td>' . $usuarios[$n]['id_permiso'] . '</td>';

                        $template_usuarios .= '<td>            
							<form method="POST">
								<input type="hidden" name="r" value="usuarios-editar">
								<input type="hidden" name="usuarios_id" value="' . $usuarios[$n]['usuarios_id'] . '">
								<button class="btn btn-floating tooltipped  modal-trigger  white"><i class="material-icons prefix left blue-text text-darken-4" data-position="right" id="btn_modalEditar" value="Editar">edit</i></button>
							</form>
		            	</td>

                        <td>  
                            <form method="POST">
                            <input type="hidden" name="r" value="usuarios-eliminar">
                            <input type="hidden" name="usuarios_id" value="' . $usuarios[$n]['usuarios_id'] . '">
                            <button class="btn btn-floating tooltipped  modal-trigger  white"><i class="material-icons prefix left red-text text-darken-4" data-position="right" id="btn_modalEditar" value="Eliminar">delete</i></button>

                            </form>
                        </td>';
                        $template_usuarios .= '</tr>
                    ';
                }
                $template_usuarios .= '	        
		        </table>		        
	          <br><br>
		    </div>
			</div>
			<script>
			 $(document).ready( function () {
			    $("#table_id").DataTable({
				    "language": {
		                "lengthMenu": "Mostrar registros _MENU_ ",
		                "zeroRecords": "No se encontraron resultados",
		                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
		                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
		                "sSearch": "Buscar por Usuario:",
		                "oPaginate": {
		                    "sFirst": "Primero",
		                    "sLast":"Último",
		                    "sNext":"Siguiente",
		                    "sPrevious": "Anterior"
					     },
					     "sProcessing":"Procesando...",
		            }
				});
			 });
	 	</script> 
			';
			print($template_usuarios);
    

}
?>