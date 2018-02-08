<?php

class Pagogadmin extends AppModel{
    var $useTable = 'pagosgadmin';
    var $hasOne = array(
           'Asesor' => array(
               
               'className' => 'Asesor',
               'foreignKey' => 'id'
               
           )); 
}

?>
