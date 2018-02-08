<?
class LogPrejuridicoSubestado extends AppModel {
    var $useTable = '_logprocesos_a_subestado';
    var $belongsTo = array(
        'Subestado' => array(
            'className'    => 'Subestado',
            'foreignKey'   => 'subestado_id'
        )
		
		
		
    );
}

?>