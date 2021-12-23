<?php

class UsuariosController{
    private $model;

    public function __construct(){
        $this->model = new UsuariosModel();


    }

    public function create( $usuario_data = array() ){
        return $this->model->create($usuario_data);
    }

    public function read( $usuario_id = ''){
        return $this->model->read($usuario_id);
    }

    public function update($usuario_data = array() ){
        return $this->model->update($usuario_data);
    }

    public function delete($usuarios_id = ''){
        return $this->model->delete($usuarios_id);
    }

    public function registro( $usuario_data = array() ){
        return $this->model->registro($usuario_data);
    }


}
?>