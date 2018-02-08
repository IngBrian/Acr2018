<?php
class Subestado extends AppModel {
    var $useTable ='subestados';
    var $displayField = 'nombre';
    var $belongsTo = array(
         'Afiliado' => array(
            'className'    => 'Afiliado',
            'foreignKey'   => 'empresa'
        )
   );

     public $validate = array(
    'nombre' => ['rule' => 'notBlank','required' => true,'message'=>'El campo no puede estar vacio']
);
}

?>