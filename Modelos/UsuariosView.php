<?php
require('UsuariosController.php');

echo '<h1>CRUD con MVC de la tabla Status</h1>';

$usuario = new UsuariosController();

$usuario_data= $usuario->read();
var_dump($usuario_data);

$num_usuario = count($usuario_data); 

echo '<h2>Número de usuarios: <mark>'.$num_usuario.'</mark></h2>';

echo '<h2>Tabla usuarios</h2>';

echo '<table>
    
        <tr>
            <th>usuarios_id</th>
            <th>numerodocumento</th>
            <th>id_tipodocumento</th>
            <th>nombres</th>
            <th>apellidos</th>
            <th>correo</th>
            <th>celular</th>
            <th>usuario</th>
            <th>cargo</th>
            <th>id_permiso</th>
        </tr>';

        for ($n = 0; $n  < count($usuario_data); $n ++) { 
            echo '<tr>
                    <td>'. $usuario_data[$n]['usuarios_id'] .'</td>
                    <td>'. $usuario_data[$n]['numerodocumento'] .'</td>
                    <td>'. $usuario_data[$n]['id_tipodocumento'] .'</td>
                    <td>'. $usuario_data[$n]['nombres'] .'</td>
                    <td>'. $usuario_data[$n]['apellidos'] .'</td>
                    <td>'. $usuario_data[$n]['correo'] .'</td>
                    <td>'. $usuario_data[$n]['celular'] .'</td>
                    <td>'. $usuario_data[$n]['usuario'] .'</td>
                    <td>'. $usuario_data[$n]['id_cargo'] .'</td>
                    <td>'. $usuario_data[$n]['id_permiso'] .'</td>
                </tr>';
        }



   echo '</table>';

   echo '<h2>Insertado usuarios</h2>';

   $new_usuario = array(
       'usuarios_id'=> 0,
       'numerodocumento' => 1005000000,
       'id_tipodocumento'=> 2,
       'nombres'=> 'Silvia Melissa',
       'apellidos'=> 'Ciodaro Saavedra',
       'correo'=> 'silviamelissacio@gmail.com',
       'celular'=> 3014055545,
       'usuario'=> 'User',
       'id_cargo'=> 5,
       'id_permiso'=> 0
   );

    //$usuario->create($new_usuario);

   echo '<h2>Actualizando usuarios</h2>';

   $update_usuario = array(
    'usuarios_id'=> 3,
    'numerodocumento' => 1005160862,
    'id_tipodocumento'=> 2,
    'nombres'=> 'Pepe',
    'apellidos'=> 'Arrieta Rincón',
    'correo'=> 'silviamelissacio@gmail.com',
    'celular'=> 3014055545,
    'usuario'=> 'User',
    'id_cargo'=> 5,
    'id_permiso'=> 0

   );

//$usuario->update($update_usuario);

   echo '<h2>Eliminando</h2>';
   //$usuario->delete(3);

   


?>