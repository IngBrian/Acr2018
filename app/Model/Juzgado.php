<?php

class Juzgado extends AppModel {
   
    var $displayField = 'nombre_juzgado';
   // var $primaryKey = 'id_juzgado';
  //  var $displayField = 'nombre_juzgado';
     public $validate = array(
    'nombre_juzgado' => ['rule' => 'notBlank','required' => true,'message'=>'El campo no puede estar vacio'],
    'codigo'=>['rule'=>'Numeric','required'=>true,'message'=>'El campo no puede estar vacio']
    );
}

?>
