<?php
class Autoload
{
    public function __construct()
    {
        spl_autoload_register(function ($class_name)
        {
            $Modelo_path ='./Modelos/' . $class_name. '.php';
            $Controladores_path ='./Controladores/' . $class_name. '.php';
        

            // echo "
            // <p>$Modelo_path</p>
            // <p>$Controladores_path</p>
            // ";
            if ( file_exists($Modelo_path) ){
                require_once($Modelo_path);
               // echo "<p>$Modelo_path</p>";
            }
            if ( file_exists($Controladores_path) ){
                require_once($Controladores_path);

                //echo"<p>$Controladores_path</p>";
            }
        });
    }
}

?>