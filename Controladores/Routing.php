<?php

class Routing{
    private $parametros;
    public function __construct($parametros){

        $this->parametros=$parametros;


    }

public function getconsulta(){
    var_dump($this->post[0]);
    //return  json_encode( $this->post);

}
}

?>