<?php
require_once('./Controladores/Autoload.php');
$autoload = new Autoload();

$route = isset($_GET['r']) ? $_GET['r'] : 'home';
$mantenimiento_infraestructura = new Router($route);



?>