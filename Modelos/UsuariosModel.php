<?php


class UsuariosModel extends Model {
    

    public function create( $usuario_data = array() ){

            foreach ($usuario_data as $key => $value) {
               $$key=$value;
                
            }

            $this->query = "INSERT INTO usuarios SET usuarios_id = '$usuarios_id', numerodocumento = '$numerodocumento',id_tipodocumento = '$id_tipodocumento', nombres = '$nombres', apellidos = '$apellidos',correo = '$correo',celular = '$celular',usuario = '$usuario',
            id_cargo = '$id_cargo',id_permiso = '$id_permiso'";
            $this->set_query();

            

     }

     public function registro( $usuario_data = array() ){

        foreach ($usuario_data as $key => $value) {
           $$key=$value;
            
        }

        $this->query = "INSERT INTO usuarios SET usuarios_id = '$usuarios_id', numerodocumento = '$numerodocumento',id_tipodocumento = '$id_tipodocumento', nombres = '$nombres', apellidos = '$apellidos',correo = '$correo',celular = '$celular',usuario = 'Sena',
        id_cargo = '$id_cargo',id_permiso = '$id_permiso'";
        $this->set_query();

        

 }
	 public function read( $usuario_id = ''){
             $sql = ($usuario_id!= '')

                ?"SELECT u.usuarios_id , ti.tipodocumento, u.numerodocumento, u.nombres, u.apellidos, u.correo, u.celular, u.usuario, ca.tipocargo, u.id_permiso FROM usuarios AS u INNER JOIN tipodocumento AS ti ON ti.id_tipodocumento = u.id_tipodocumento INNER JOIN cargo AS ca ON ca.id_cargo= u.id_cargo WHERE u.usuarios_id = '$usuario_id'"
                :"SELECT u.usuarios_id , ti.tipodocumento, u.numerodocumento, u.nombres, u.apellidos, u.correo, u.celular, u.usuario, ca.tipocargo, u.id_permiso FROM usuarios AS u INNER JOIN tipodocumento AS ti ON ti.id_tipodocumento = u.id_tipodocumento INNER JOIN cargo AS ca ON ca.id_cargo= u.id_cargo";
            $this->query = $sql;

            $this->get_query();
           // var_dump($this->rows);
           $num_rows = count($this->rows);
           //echo $num_rows;

           $data = array();

           foreach ($this->rows as $key => $value) {
               array_push($data, $value);
               
           }
           return $data;
             

     }
	 public function update($usuario_data = array() ){

            foreach ($usuario_data as $key => $value) {
                $$key=$value;
                 
             }
 
             $this->query = "UPDATE usuarios SET numerodocumento = $numerodocumento, id_tipodocumento = $id_tipodocumento, nombres ='$nombres', apellidos = '$apellidos',
              correo = '$correo', celular = $celular, usuario = '$usuario', id_cargo = $id_cargo, id_permiso = $id_permiso WHERE usuarios_id = $usuarios_id";
             $this->set_query();
 
     }
            

         
	public function delete($usuarios_id = ''){
            
           $this->query = "DELETE FROM usuarios WHERE usuarios_id = $usuarios_id";
           $this->set_query();




    }

    public function validate_user($user, $pass){
        $this->query = "SELECT * FROM usuarios WHERE id_tipodocumento = '$user' AND numerodocumento = '$pass'";
        $this->get_query();

        $data = array();

           foreach ($this->rows as $key => $value) {
               array_push($data, $value);
               
           }
           return $data;
    }



}

?>
