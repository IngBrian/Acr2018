<?php
App::uses('BlowfishPasswordHasher','Controller/Component/Auth');
app::uses('AppModel','Model');
class User extends AppModel {
    
    var $useTable = 'usuarios';


    var $belongsTo = array(
         'Afiliado' => array(
            'className'    => 'Afiliado',
            'foreignKey'   => 'empresa'
        ));

     public function beforeSave($options = array()) {
        if (!empty($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
         }
}

?>
