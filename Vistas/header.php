
<?php
print('
<!DOCTYPE html>
<html class="wf-roboto-n4-active wf-roboto-n5-active wf-active" lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<title>Mantenimiento</title>
	
	<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <!-- Font Awesome JS -->
    
    <script src="https://kit.fontawesome.com/865669fac9.js" crossorigin="anonymous"></script>


	<meta name="description" content="Bienvenidos al sistetema de mantenimiento SENA">
	<link rel="shortcut icon" type="img/png" href="./public/img/sena.png"> 


	<!-- Css L -->	
	<link rel="stylesheet" href="./public/css/load.css">
	<link rel="stylesheet" href="./public/css/matenimiento_infraestructura.css">
	<link rel="stylesheet" href="./public/css/alertify.min.css">
	<link rel="stylesheet" href="./public/css/default.min.css">
	<link rel="stylesheet" href="./public/css/pass.css">
	<link rel="stylesheet" href="./public/css/format.css">
	<link rel="stylesheet" href="./public/css/fullcalendar.min.css">
	<link rel="stylesheet" href="./public/css/icon.css">
	<link rel="stylesheet" href="./public/css/jquery.datetimepicker.min.css">
	<link rel="stylesheet" href="./public/css/jquery-ui.min.css">
	<link rel="stylesheet" href="./public/css/mas_estilos.css">
	<link rel="stylesheet" href="./public/css/styles.css">
	<link rel="stylesheet" href="./public/css/table.css">
	<link rel="stylesheet" href="./public/css/tooltip.css">
	<link rel="stylesheet" href="./public/css/util.css">
	<link rel="stylesheet" href="./public/css/form.css">
	<link rel="stylesheet" href="./public/css/table/styles.css">	
	<link rel="stylesheet" href="./public/css/jquery.dataTables.css">
	

	
	<!-- Google -->
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  	
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css"> 
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 


  	<!-- Scripts -->
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>  
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	

	<style>
		.estado-disponible-usuario {
		color:#2FC332;
		}
		.estado-no-disponible-usuario {
			color:#D60202;
		}
		.estado-disponible-email {
			color:#2FC332;
		}
		.estado-no-disponible-email {
			color:#D60202;
		}
	</style>

	


	


	<script>
		  function comprobarUsuario() {
		  	$("#loaderIcon").show();
		  	jQuery.ajax({
		  	url: "./public/validar/ComprobarDisponibilidad.php",
		  	data:"user="+$("#user").val(),
		  	type: "POST",
		  	success:function(data){
		  		$("#estadousuario").html(data);
		  		$("#loaderIcon").hide();
		  	},
		  	error:function (){}
		  	});
		  }
		  function comprobarEmail() {
		  	$("#loaderIconEmail").show();
		  	jQuery.ajax({
		  	url: "./public/validar/ComprobarDisponibilidad.php",
		  	data:"email="+$("#email").val(),
		  	type: "POST",
		  	success:function(data){
		  		$("#estadoemail").html(data);
		  		$("#loaderIconEmail").hide();
		  	},
		  	error:function (){}
		  	});
			}
			function comprobarSerial() {
			    $("#loaderIconSerial").show();
			    jQuery.ajax({
			    url: "./public/validar/ComprobarDisponibilidad.php",
			    data:"serial="+$("#serial").val(),
			    type: "POST",
			    success:function(data){
			      $("#estadoserial").html(data);
			      $("#loaderIconSerial").hide();
			    },
			    error:function (){}
			    });
			}
		</script>

		


		

		
	
</head>
<body style= "background: #fffde7;" >


');
if ($_SESSION['ok']) {
	$template = '
	
			
	            
	            <nav  id="navbar" class="navbar fixed-top navbar-$orange-500">
                    <div class="container-fluid">
                        <ul>
				            <li>
	                            <button data-target="menu-side" class="btn sidenav-trigger z-depth-0 transparent tooltipped" data-position="bottom" data-tooltip="Menú">
	                                <i class="material-icons">menu</i>
	                            </button>	              
	                        </li>
	                        <li class="right">
					            <a href="salir" class="btn btn-small transparent z-depth-0 tooltipped " data-position="left" data-tooltip="Salir"><i class="material-icons">settings_power</i></a>
				            </li> 
				            <li class="right hide-on-med-and-down">

                                <div class="chip">
                                    <span><b>%s</b></span>
                                    <img src="./public/img/iconAdmin.png">
                                </div>

                                <div class="chip">
                                    <span><b> %s</b> </span>
                                </div>
				            </li> 
				        </ul>   
                    </div>
                </nav>
				
				
				
					
				

				
	




	<ul class="sidenav" id="menu-side">

	<li>

	  <div class="user-view center">
		   <div class="background ">
			 <img src="./public/img/R.jpg">
		 </div>

		 <div class="">
		   <div class="material-placeholder" style=""><img class="center materialboxed circle" id="img" src="./public/img/mantenimiento.jpg"></div> </div>
		 
	   </div>
	</li>

	<li>
		    <a href="./">
		      <i class="material-icons amber-text text-darken-4">apps</i>
		      Menu
		    </a>
		  </li>

		   <li>
		    <div class="divider"></div>
	    	<a href="notificacion_eventos">
		      <i class="material-icons amber-text text-darken-4">feed</i>
		      Notificar un evento
		    </a>
		  </li>

		  <li>
		    <div class="divider"></div>
	    	<a href="eventos">
		      <i class="material-icons amber-text text-darken-4">note_add</i>
		      Eventos
		    </a>
		  </li>';

		  if ($_SESSION['usuario'] == 'Admin') {
			$template .= '<li>
		    <div class="divider"></div>
	    	<a href="usuarios">
		      <i class="material-icons amber-text text-darken-4">manage_accounts</i>
		      Usuarios
		    </a>
		  </li>';
		  }

		 $template.=' <li>
		    <div class="divider"></div>
	    	<a href="historial">
		      <i class="material-icons amber-text text-darken-4">history</i>
		      Historial
		    </a>
		  </li>

		</li>
    </ul>
    
';

printf(
	$template,		
	$_SESSION['nombres'],
	$_SESSION['usuario']
	
);
}
