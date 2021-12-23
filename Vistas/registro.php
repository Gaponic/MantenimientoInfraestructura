<?php
print('

<div class="spinner-wrapper">
        <div class="spinner"></div>
</div>

<div class="row">
    <div class="col s12 m3 offset-m4" style=" padding-top: 200px;">
        <div class="card  z-depth-3 transparent">
            <div class="card-content amber darken-3 hide-on-small-only">
                <p class="center white-text text-white show-on-small " style="padding-top:0%; margin-top:0px; font-size: 35px;">
                 REGISTRO USUARIOS </p>
            </div>

            <div class="card-stacked">
			    <div class="card-content " id="card_acceso">

                    <div id="acceso" class="cod-form">
                        <form class="item" method="post" id="form_acceso">

                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="text" name="nombres" placeholder="Nombres" required>
                                </div>

                                <div class="input-field col s6">
                                    <input type="text" name="apellidos" placeholder="Apellidos" required>
                                </div>
                            </div>   

                            <div class="input-field col m12">                       
                                <select name = "tipodocumento" required>
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
                                <input type="email" name="email" placeholder="Correo electronico" required>
                            </div>

                            <div class="input-field" >
                                <input type="tel" name="celular" placeholder="Celular" required>
                            </div>

                            <div class="input-field">                       
                                <select name = "usuario" disabled>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                    <option value="3">Mantenimiento</option>
                                    <option value="4" disabled selected>SENA</option>
                                </select>
                            </div>

                            <div class="input-field">                       
                                <select name = "cargo" required>
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

                            

						    <div style="float:right; font-size: 120%; position: relative; top:5px">
						        <a href="#" class="alt-form">Iniciar Sesión</a>
						    </div> 
                            <br>  


                        </form>
                    </div>
            
                </div>
            </div>
        </div>
    </div>
</div>

');

if (isset($_GET['error'])) { 
        $template = '
        <div class="alert alert-danger" role="alert">
         %s
        </div>
        ';
printf($template, $_GET['error']);
}
?>