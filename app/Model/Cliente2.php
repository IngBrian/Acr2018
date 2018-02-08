<?php

class Cliente extends AppModel{
    
    var $displayField = 'nombre_completo';
    var $belongsTo = array(

        'Municipio' => array(
            'className'    => 'Municipio',
            'foreignKey'   => 'municipio_id'
        )
    );
}

?>
