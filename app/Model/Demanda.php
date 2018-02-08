<?php

class Demanda extends AppModel {
      
    var $belongsTo = array(
        
        'Juzgado' => array(
            
            'className' => 'Juzgado',
            'foreignKey' => 'id_juzgado'
            
        )
     );
    
}

?>
