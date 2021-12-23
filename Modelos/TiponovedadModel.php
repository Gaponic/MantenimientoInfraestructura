<?php
class TiponovedadModel extends Model{



    public function create(){}
    public function read(){}
    public function update(){}
    public function delete(){}

public function listaTipoNovedadCombo(){
$sql = "SELECT tiponovedad_id as id ,tiponovedad as name  FROM tiponovedad";
$this->query = $sql;
$this->get_query();
$data = array();
foreach ($this->rows as $key => $value) {
   array_push($data, $value);
   
}
return $data;

}


}