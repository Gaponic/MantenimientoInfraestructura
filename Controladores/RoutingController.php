<?php
class RoutingController {

        private $parametros;
        private $ruta;

        public function __construct($parametros,$ruta){
            $this->parametros=$parametros;
            $this->ruta=$ruta;
        }
    
    public function response(){
     switch ($this->ruta){
         case "tipo_novedad_combo";
         $json =  array();
       $TiponovedadModel=new TiponovedadModel();
         $json["mensaje"]=1;
          $json["datos"]=$TiponovedadModel->listaTipoNovedadCombo();
         return json_encode($json);
         break;
     }
    
    
    }
    }
    