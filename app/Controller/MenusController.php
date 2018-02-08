<?php
class MenusController extends AppController {
   public function index() {
		 $this->layout = 'admin';   
        $this->set('permisos', $this->Session->read('Auth.User.Permiso')); 
        $this->set('usuarios', $this->Session->read('Auth.User')); 
    }
}

?>
