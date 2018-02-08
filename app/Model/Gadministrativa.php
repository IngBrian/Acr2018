<?php

class Gadministrativa extends AppModel {
     var $useTable = '_gadministrativa';
     var $hasOne = array(
           'Etapa1g' => array(
               
               'className' => 'Etapa1g',
               'foreignKey' => 'id_proceso'
               
           ), 
           'Etapa2g' =>array(
               
               'className' => 'Etapa2g',
               'foreignKey' => 'id_proceso'
               
           ), 
            'Etapa3g'=> array(
               
               'className' => 'Etapa3g',
               'foreignKey' => 'id_proceso'
               
           ), 
            'Etapa4g' => array(               
               'className' => 'Etapa4g',
               'foreignKey' => 'id_proceso'
               
           ), 
            'Etapa5g' => array(
               
               'className' => 'Etapa5g',
               'foreignKey' => 'id_proceso'
               
           ), 
            'Etapa6g' => array(
               
               'className' => 'Etapa6g',
               'foreignKey' => 'id_proceso'
               
           ), 
            'Audiencia' => array(
               
               'className' => 'Audiencia',
               'foreignKey' => 'id_proceso'
               
           ),
            'Agendagadmin' => array(
               'className' => 'Agendagadmin',
               'foreignKey' => 'id_proceso'
               
           )
    );
    
     var $belongsTo = array(
        'TipoProceso' => array(
            'className'    => 'TipoProceso',
            'foreignKey'   => 'id_tproceso'
        ),
        'Cliente' => array(
            'className'    => 'Cliente',
            'foreignKey'   => 'id_deudor'
        ),
        'Cliente2' => array(
            'className'    => 'Cliente',
            'foreignKey'   => 'codeudor'
        ),

        'Ordenante' => array(
            'className'    => 'Ordenante',
            'foreignKey'   => 'id_demandante'
        ),
        'Asesor' => array(
            'className'    => 'Asesor',
            'foreignKey'   => 'Abogado'
        ),
        'Asesor2' => array(
            'className'    => 'Asesor',
            'foreignKey'   => 'Abogado2'
        ),
        'Municipio' => array(
            'className'    => 'Municipio',
            'foreignKey'   => 'id_municipio'
        ),
        
        'Pagaduria' => array(
            'className'    => 'Pagaduria',
            'foreignKey'   => 'id_pagaduria'
        ),

'Subestado' => array(
            'className'    => 'Subestado',
            'foreignKey'   => 'subestado_id'
        ),
        'Juzgado' => array(
            'className'    => 'Juzgado',
            'foreignKey'   => 'id_juzgado'
        ), 
        'Afiliado' => array(
            'className'    => 'Afiliado',
            'foreignKey'   => 'empresa'
        ),
        'Cliented' => array(
            'className'    => 'Cliente',
            'foreignKey'   => 'codeudor'
        )
        
    );
    
     var $hasMany = array(
    		'Pagogadmin' => array(
	            'className'    => 'Pagogadmin',
	            'foreignKey'   => 'idproceso',
	            'conditions' => array('tipo' => 'p'),
        ));
     
}

?>
