<?php

class Asesor extends AppModel{
 
    var $useTable = 'asesor';
    var $displayField = 'nombre';
     var $belongsTo = array(
        'Afiliado' => array(
            'className'    => 'Afiliado',
            'foreignKey'   => 'empresa'
        )
    );

      public $validate = array(
    'nombre' => ['rule' => 'notBlank','required' => true,'message'=>'El campo no puede estar vacio'],
    'cedula'=>['rule'=>'Numeric','required'=>true,'message'=>'El campo no puede estar vacio']
    );

}

?>
