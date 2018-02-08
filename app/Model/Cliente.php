<?php

class Cliente extends AppModel{
    
    var $displayField = 'nombre_completo';
    var $belongsTo = array(
        'Municipio' => array(
            'className'    => 'Municipio',
            'foreignKey'   => 'municipio_id'
        ),
         'Afiliado' => array(
            'className'    => 'Afiliado',
            'foreignKey'   => 'empresa'
        )
   );

     public $validate = array(
    'nombre_completo' => ['rule' => 'notBlank','required' => true,'message'=>'El campo no puede estar vacio'],
    'nit_cc'=>['rule'=>'Numeric','required'=>true,'message'=>'El campo no puede estar vacio']
    );

}

?>
