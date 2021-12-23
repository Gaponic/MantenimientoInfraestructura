<?php
class Router {
    public $route;

    public function __construct($route) {


        $session_options = array([
			'use_only_cookies' => 1,
			'auto_start' => 1,
			'read_and_close' => true
		]);



		if( !isset($_SESSION) )  session_start($session_options);

		if( !isset($_SESSION['ok']) )  $_SESSION['ok'] = false;

        if( $_SESSION['ok']) {

            $this->route = isset($_GET['r']) ? $_GET['r'] : 'home';
            
            $controller = new Vistacontrolador();
            switch ($this->route) {
                case 'home':
                        
                    $controller->cargar_vista('home');
                    break;

                case 'notificacion_eventos':
                        
                    $controller->cargar_vista('notificacion_eventos');
                    break;

                case 'eventos':
                        
                    $controller->cargar_vista('eventos');
                     break;
                    
                case 'usuarios':
                    if( !isset($_POST['r']) ){
                        $controller->cargar_vista('usuarios');
                    }
                    elseif ( $_POST['r'] == 'usuarios-nuevo') $controller->cargar_vista('usuarios-nuevo');
                    elseif ( $_POST['r'] == 'usuarios-editar') $controller->cargar_vista('usuarios-editar');
                    elseif ( $_POST['r'] == 'usuarios-eliminar') $controller->cargar_vista('usuarios-eliminar');
                    break;

                case 'historial':
                        
                    $controller->cargar_vista('historial');
                    break;




                case 'salir':

                    $sesion_usuario = new SesionControlador();
                    $sesion_usuario->logout();

                    break;
                        
                    
                default:
                    $controller->cargar_vista('error404');
                break;
            }

        }else{

                if( !isset($_POST['user']) && !isset($_POST['pass']) ){

                    $login_form = new VistaControlador();
                    $login_form->cargar_vista('login');

                }else{   

                    $sesion_usuario = new SesionControlador();
                    $session = $sesion_usuario->login($_POST['user'], $_POST['pass']);

                    if( empty($session) ){
                            // echo 'El tipo de documento y el numero de documento son incorrecto';
                        $login_form = new VistaControlador();
                        $login_form->cargar_vista('login');

                        echo'<script type="text/javascript">
                                        alert("El numero de documento ' . $_POST['pass'] 
                                    . ' no coincide");
                                    </script>';
                        }else{
                            // echo 'El tipo de documento y el numero de documento son correctos';
                            $_SESSION['ok'] = true;

                                foreach ($session as $row){
                                    $_SESSION['usuarios_id'] =$row['usuarios_id'];
                                    $_SESSION['numerodocumento'] =$row['numerodocumento'];
                                    $_SESSION['id_tipodocumento'] =$row['id_tipodocumento'];
                                    $_SESSION['nombres'] =$row['nombres'];
                                    $_SESSION['apellidos'] =$row['apellidos'];
                                    $_SESSION['correo'] =$row['correo'];
                                    $_SESSION['celular'] =$row['celular'];
                                    $_SESSION['usuario'] =$row['usuario'];
                                    $_SESSION['id_cargo'] =$row['id_cargo'];
                                    $_SESSION['id_permiso'] =$row['id_permiso'];
                                }

                            header('Location: ./');
                            


                        }
                    }
                    

            }

    }
}


?>