<?php
class Perfil extends AppModel {
    var $useTable = 'tipo_usuario';
    var $displayField = 'nombre_tipo';
 
	var $hasOne = array('Permiso' =>
						array('className'    => 'Permiso',
							  'dependent'    =>  true,
							  'foreignKey'   => 'id_perfil'
	));
}

?>
