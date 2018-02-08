<?php
class Permiso extends AppModel {
    var $useTable = 'permisos';
    var $belongsTo = array(
        'Perfil' => array(
            'className'    => 'Perfil',
            'foreignKey'   => 'id_perfil'
        ),
        'Ordenante' => array(
            'className'    => 'Ordenante',
            'foreignKey'   => 'id_demandante'
        ),
        'Cliente' => array(
            'className'    => 'Cliente',
            'foreignKey'   => 'cliente_id'
        )
    );
}

?>
