<?php

class Pago extends AppModel{
    
  var $hasOne = array(
           /*'Asesor' => array(
               'className' => 'Asesor',
               'foreignKey' => 'id'
               
           )*/
		   
		   
		   ); 
		  
     
	  public $belongsTo = array(
	
	/*  'Asesor' => array(
               
               'className' => 'Asesor',
               'foreignKey' => 'id'
        ),
      */
	    'Prejuridico' => array(
            'className' => 'Prejuridico',
            'foreignKey' => 'idproceso'
        )
        );
		
		  
		   
}

?>
