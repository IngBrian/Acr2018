<?
class PrejuridicoSubestado extends AppModel {
    var $useTable = '_procesos_a_subestado';
    var $belongsTo = array(
        'Subestado' => array(
            'className'    => 'Subestado',
            'foreignKey'   => 'subestado_id'
        )
    );

    public $validate = array(
    'fecha' => ['rule' => 'notBlank','required' => true,'message'=>'El campo no puede estar vacio']
);
}

?>