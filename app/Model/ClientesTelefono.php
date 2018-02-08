<?php

class ClientesTelefono extends AppModel {
   	var $useTable = 'clientes_telefonos';
    var $belongsTo = array('Parentesco');
    
}

?>
