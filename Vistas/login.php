<?php



print('

<section class="vh-100" style="background-color: $yellow-100;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col col-lg-5 d-none d-md-block">
                            <img src="./public/img/fondo_app.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;"/>
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
			                    <div class="card-body" style=" background: white;">
			                    
                                    <div class="card-content" id="card_acceso">
                                        <div id="acceso" class="form-content" class="cod-form">
                                            <div class="card-content amber darken-3 hide-on-small-only">
                                                <p class="center white-text text-white show-on-small " style="padding-top:0%; margin-top:0px; font-size: 35px;">REGISTRO USUARIOS </p>
                                            </div>
                                            <form class="item" method="post" id="form_acceso" style="font-size:12px;">

                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input type="text" name="nombres" placeholder="Nombres" required>
                                                    </div>

                                                    <div class="input-field col s6">
                                                        <input type="text" name="apellidos" placeholder="Apellidos" required>
                                                    </div>
                                                </div>

                                                <div class="input-field">
                                                    <select class="form-select" name = "id_tipodocumento" required>
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
                                                    <select class="form-select" name = "usuario" disabled>
                                                        <option value="1">Admin</option>
                                                        <option value="2">User</option>
                                                        <option value="3">Mantenimiento</option>
                                                        <option value="4" disabled selected>SENA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field">
                                                    <select class="form-select" name = "id_cargo" required>
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
                                                <button type="submit" name="btn_registrar" id="btn_registar" class="btn waves-effect waves-light btn amber darken-3 ">Registrar</button>
                                                <input type="hidden" name="r" value="user-add">

                                                <div style="float:right; font-size: 128%; position: relative; top:5px">
                                                    <a href="#" class="alt-form">Iniciar Sesión</a>
                                                </div>
                                                <br>
                                                <br>
                                            </form>
                                        </div>

                                        <div id="acceso" class="form-content" class="cod-form">
                                            <div class="co card-content amber darken-3 hide-on-small-only">
                                                <p class="center white-text text-white show-on-small " style="padding-top:0%; margin-top:0px; font-size: 35px;">MANTENIMIENTO </p>
                                            </div>
                                            <form class="item" method="post" id="form_acceso" style="font-size:12px;">

                                                <div class="input-field">
                                                    <select class="form-select" name = "user" required>
                                                        <option value="" disabled selected>Seleccione tipo de documento</option>
                                                        <option value="1">Tarjeta de identidad</option>
                                                        <option value="2">Cédula de ciudadanía</option>
                                                        <option value="3">Cédula de extranjería</option>
                                                        <option value="4">Contraseña registraduría</option>
                                                        <option value="5">Pasaporte Colombiano</option>
                                                        <option value="6">Pasaporte Extranjero</option>
                                                    </select>
                                                </div>

                                                <div>
                                                    <input type="tel" name="pass" placeholder="Numero de documento" required>
                                                </div>
                                                <br>

                                                <div>
                                                    <button id="button" class="btn waves-effect waves-light btn amber darken-3 " type="submit" name="action">Entrar
                                                        <i class="material-icons right">send</i>
                                                    </button>

                                                    <div  style="float:right; font-size: 120%; position: relative; top:5px">
                                                        <a  href="#" class="alt-form">¿Ya tiene una cuenta? Registrese aqu&iacute;</a>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
');

if ( isset($_POST['btn_registrar']) ){
        $register_user = new UsuariosController();

        $register = array(

                'usuarios_id'=> 0,        
                'nombres' => $_POST['nombres'],
                'apellidos' => $_POST['apellidos'],
                'id_tipodocumento' => $_POST['id_tipodocumento'],
                'numerodocumento' => $_POST['numerodocumento'],
                'correo' => $_POST['correo'],
                'celular' => $_POST['celular'],
                'id_cargo' => $_POST['id_cargo'],
                'id_permiso'=>0
        );

        $registro = $register_user->registro($register);

        $template = '
		<script>
                        alert("registro exitoso");
		</script>

        <script src="./public/plugins/SweetAlert/dist/sweetalert2.all.min.js"></script>
	';
        print($template);	
 

    }
    




	if (isset($_GET['error'])) { 
		$template = '
		<div class="alert alert-danger" role="alert">
		 %s
		</div>
		';
	printf($template, $_GET['error']);
	}

       

?>