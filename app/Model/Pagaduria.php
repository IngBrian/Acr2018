<?php

class Pagaduria extends AppModel {
    var $useTable = 'pagadurias';
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
