<?php

class Prejuridico extends AppModel {
     var $useTable = '_procesos_a';


      
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
		'Pendiente' => array(
            'className' => 'Pendiente',
            'foreignKey' => 'pendiente_id'
        ),
        'Otros' => array(
            'className' => 'Cliente',
            'foreignKey' => 'codeudor'
        ),
        'Tproceso' => array(
            'className' => 'Tproceso',
            'foreignKey' => 'tproceso_id'
        ),
		 'Localidade' => array(
            'className' => 'Localidade',
            'foreignKey' => 'ubicacion_id'
        ),  
		'LogPrejuridicoSubestado' => array(
            'className' => 'LogPrejuridicoSubestado',
            'foreignKey' => 'subestado_id'
			
        )
        );
		
		
		
		
      	/*
       public $validate = array(
    'ordenante_id' => ['rule' => 'notBlank','required' => true,'message'=>'El campo no puede estar vacio'],
    'cliente_id' => ['rule' => 'notBlank','required' => true,'message'=>'El campo no puede estar vacio'],
    'fecha_inicio'=>['rule'=>'notBlank','required'=>true,'message'=>'El campo no puede estar vacio']
);
*/

     
    
}

?>
