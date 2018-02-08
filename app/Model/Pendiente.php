<?php
class Pendiente extends AppModel {
    var $useTable ='pendientes';
    public $validate = array(
    'nombre' => ['rule' => 'notBlank','required' => true,'message'=>'El campo no puede estar vacio']
);
}

?>