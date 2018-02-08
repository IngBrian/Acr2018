<?php
class Usuario extends AppModel {
     var $useTable = 'usuarios';
     var $belongsTo = array(
        'Tipo_Usuario' => array(
            'className'    => 'Tipo_Usuario',
            'foreignKey'   => 'id_tipo_usuario'
        ),
        'Asesor' => array(
            'className'    => 'Asesor',
            'foreignKey'   => 'Id_Asesor'
        ),
        'Afiliado' => array(
            'className'    => 'Afiliado',
            'foreignKey'   => 'empresa'
        )
    );
    
}

?>
