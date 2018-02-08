<?php

class Tipo_Usuario extends AppModel {
   
   var $useTable = 'tipo_usuario';
   var $hasOne = array(
        'Permiso' => array(
            'className'    => 'Permiso',
            'foreignKey'   => 'id_perfil'
        )
    );
}

?>
