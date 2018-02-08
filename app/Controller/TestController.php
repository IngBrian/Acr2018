<?php
App::uses('BlowfishPasswordHasher','Controller/Component/Auth');
App::uses('AppController', 'Controller');

class TestController extends AppController {
  public function index() {
	  Configure::write('debug',2);
   $passwordHasher = new BlowfishPasswordHasher();
   echo $passwordHasher->hash('juridica?#!');
     $this->autoRender = false;   
   }
    
}    

?>
