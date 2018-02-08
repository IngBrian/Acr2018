<?php
class Localidade extends AppModel {
    var $useTable ='localidades';
    public $validate = array(
    'nombre' => ['rule' => 'notBlank','required' => true,'message'=>'El campo no puede estar vacio']
);
}

?>