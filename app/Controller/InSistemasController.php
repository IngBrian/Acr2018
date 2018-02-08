<?php

class InSistemasController extends AppController {
 
    public function index() {
        $this->set('permisos', $this->Session->read('Auth.User.Permiso'));
        $this->set('usuarios', $this->Session->read('Auth.User'));
    }
    
}

?>
