<?php
class VistaControlador{
    private static $view_path = './Vistas/';

    public function cargar_vista($view) {
        require_once( self::$view_path . 'header.php' );
        require_once( self::$view_path . $view . '.php' );
        require_once( self::$view_path . 'footer.php' );
    }

}

?>