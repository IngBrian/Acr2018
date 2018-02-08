<?php

class LogPrejuridico extends AppModel {
     var $useTable = '_logprocesos_a';


      
      public $belongsTo = array(
        'Ordenante' => array(
            'className' => 'Ordenante',
            'foreignKey' => 'ordenante_id'
        ),
        'Cliente' => array(
            'className' => 'Cliente',
            'foreignKey' => 'cliente_id'
        ),
        'Subestado' => array(
            'className' => 'Subestado',
            'foreignKey' => 'subestado_id'
        ),
        'Juzgado' => array(
            'className' => 'Juzgado',
            'foreignKey' => 'juzgado_id'
        ),
        'Asesor1' => array(
            'className' => 'Asesor',
            'foreignKey' => 'Abogado'
        )
        ,
        'Asesor2' => array(
            'className' => 'Asesor',
            'foreignKey' => 'Abogado2'
        )
        ,
        'Pagaduria' => array(
            'className' => 'Pagaduria',
            'foreignKey' => 'pagaduria_id'
        ),
        'Otros' => array(
            'className' => 'Cliente',
            'foreignKey' => 'codeudor'
        )
        ,
        'Tproceso' => array(
            'className' => 'Tproceso',
            'foreignKey' => 'tproceso_id'
        )
        );

     
    
}

?>
