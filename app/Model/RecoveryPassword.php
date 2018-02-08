<?php

class RecoveryPassword extends AppModel{
    var $useTable = 'usuarios';
	public $validate = array();
	var $validate=array(
       'password'=>array(
                    'rule'=>array('minLength',1),
                    'required'=>true,
                    'allowEmpty'=>false,
                    'message'=>'Por favor, introduce la contraseña'
                    )

   ); 

}

?>
