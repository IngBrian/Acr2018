<?php

class Proceso extends AppModel{
    
    var $hasOne = array(
           'Demanda' => array(
               
               'className' => 'Demanda',
               'foreignKey' => 'id_proceso'
               
           ), 
           'Mandamiento' =>array(
               
               'className' => 'Mandamiento',
               'foreignKey' => 'id_proceso'
               
           ), 
            'Embargo'=> array(
               
               'className' => 'Embargo',
               'foreignKey' => 'id_proceso'
               
           ), 
            'Notificacion' => array(
               
               'className' => 'Notificacion',
               'foreignKey' => 'id_proceso'
               
           ), 
            'Sentencia' => array(
               
               'className' => 'Sentencia',
               'foreignKey' => 'id_proceso'
               
           ), 
            'Liquidacion' => array(
               
               'className' => 'Liquidacion',
               'foreignKey' => 'id_proceso'
               
           ), 
            'Terminacion' => array(
               
               'className' => 'Terminacion',
               'foreignKey' => 'id_proceso'
               
           ), 
            'Avaluo' => array(
               
               'className' => 'Avaluo',
               'foreignKey' => 'id_proceso'
               
           ), 
            'Remate' => array(
               
               'className' => 'Remate',
               'foreignKey' => 'id_proceso'
               
           ), 
            'Audiencia' => array(
               
               'className' => 'Audiencia',
               'foreignKey' => 'id_proceso'
               
           ), 
            'Adjudicacion' => array(
               
               'className' => 'Adjudicacion',
               'foreignKey' => 'id_proceso'
               
           )    );
    
    var $belongsTo = array(
        'Cliente' => array(
            'className'    => 'Cliente',
            'foreignKey'   => 'id_cliente'
        ),
        'Ordenante' => array(
            'className'    => 'Ordenante',
            'foreignKey'   => 'id_ordenante'
        ),
        'Asesor' => array(
            'className'    => 'Asesor',
            'foreignKey'   => 'Abogado'
        ),
        'Municipio' => array(
            'className'    => 'Municipio',
            'foreignKey'   => 'id_municipio'
        ),
        'Pagaduria' => array(
            'className'    => 'Pagaduria',
            'foreignKey'   => 'id_pagaduria'
        )
        ,
        'Tproceso' => array(
            'className'    => 'Tproceso',
            'foreignKey'   => 'id_tproceso'
        ),
        'Cliented' => array(
            'className'    => 'Cliente',
            'foreignKey'   => 'codeudor'
        ));
    
}

?>
