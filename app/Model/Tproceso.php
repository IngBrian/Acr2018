<?php
class Tproceso extends AppModel {
    var $useTable ='tprocesos';// 'tprocesos';
    var $displayField = 'nombre';
    
    var $belongsTo = array(
         'Afiliado' => array(
            'className'    => 'Afiliado',
            'foreignKey'   => 'empresa'
        ));

     public $validate = array(
    'nombre' => ['rule' => 'notBlank','required' => true,'message'=>'El campo no puede estar vacio']);
}

?>
