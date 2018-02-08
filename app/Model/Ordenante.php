<?php

class Ordenante extends AppModel {
    var $useTable = 'ordenantes';
    var $displayField = 'nombre';
     
     var $belongsTo = array(
        'Afiliado' => array(
            'className'    => 'Afiliado',
            'foreignKey'   => 'empresa'
        ));

     public $validate = array(
    'nombre' => ['rule' => 'notBlank','required' => true,'message'=>'El campo no puede estar vacio'],
    'nit'=>['rule'=>'Numeric','required'=>true,'message'=>'El campo no puede estar vacio']
);
}

?>
