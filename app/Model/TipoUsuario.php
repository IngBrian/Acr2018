<?
class TipoUsuario extends AppModel{
 
    var $useTable = 'tipo_usuario';
    var $displayField = 'nombre_tipo';
     var $belongsTo = array(
        'Afiliado' => array(
            'className'    => 'Afiliado',
            'foreignKey'   => 'empresa'
        )
    );
}
?>