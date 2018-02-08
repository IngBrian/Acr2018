<?php

class Deudor extends AppModel{
    var $useTable = 'clientes';
    var $displayField = 'nombre_completo';
    var $belongsTo = array(

        'Municipio' => array(
            'className'    => 'Municipio',
            'foreignKey'   => 'municipio_id'
        )
    );
}

?>
