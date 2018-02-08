<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('AppController', 'Controller');

class UsersController extends AppController {
  
	var $uses = array('User','Afiliado','Globaluser');
	var $helpers = array('Html', 'Form', 'Time');
	//var $allowCookie = true;
	//var $cookieTerm = '0';



    public function isAuthorized($user) {
    // todos los visitantes ven el index
    if ($this->action === 'add') {
        return true;
        
    }

    
    if (in_array($this->action, array('index'))) {
        if ($user['role']=='registrado' || $user['role']=='director') {
            return true;
            }
    }



    if (in_array($this->action, array('addx','edit','index'))) {
        if ($user['role']=='administrator' or $user['role']=='visitante'  ) {
            return true;
            }
    }


    return parent::isAuthorized($user);
   }

     public function beforeFilter() {
	  
      parent::beforeFilter();
      $this->Auth->allow('add', 'logout','forgot_password','reset_password_token');
      $this->loadData();
      
    }


    private function loadData(){
        //BRIAN MALDONADO 28/05/2016 

        //mas adelante se deben traer solo los datos de la empresa a la que pertenece el usuario
        
        $options = array('administrator' => 'administrator','director' => 'director','registrado' => 'registrado','visitante' => 'visitante');
        $this->set('options',$options);

        $afiliados = $this->Afiliado->find('list');
        $this->set('afiliados', $afiliados);

    }


    public function index() {
        
    $this->paginate = array(
        'order' => array('User.id' =>  'desc'),
        'conditions' => array('User.empresa' => $this->Auth->user('empresa')),
        'limit' => 10
    );

    $users = $this->paginate();
    $this->set('users',$users);

    
    }
    
    
      public function login() {
		  $this->layout = 'admin';
		   if (!empty($this->Auth->user('empresa'))) {
		   return $this->redirect($this->Auth->redirectUrl());
	       } 
	      if ($this->request->is('post')){
	           $rs=$this->User->find('all',array('conditions'=>
			   array('User.username'=>$this->request->data['User']['username'])));
			   $rs__=$this->User->find('all',array('conditions'=>
			   array('User.id'=>$rs[0]['User']['empresa'])));
			   
			   if($rs[0]['User']['estado']==1 || $rs__[0]['User']['estado']==1 )
			   {
				 $this->Flash->error(__('Invalid username or password, try again')); 
				 $this->logout(); 
			   }
			    $this->Session->write('empresa_',$rs__[0]['User']['empresa']);
			   if ($this->Auth->login()) {
				    
					 return $this->redirect($this->Auth->redirectUrl());
			   }
			   $this->Flash->error(__('Invalid username or password, try again')); 
           }
         }
	     public function logout() {
			
			 return $this->redirect($this->Auth->logout());
         }
		 
 
    public function add() {
         $this->layout = 'user'; 
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'login'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        }
    }
	
	
	
	  public function addx() {
        
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

      public function edit($id = NULL){
        //$this->layout = 'default';
     
        $this->User->id = $id;
        if (empty($this->data)) {
            $user= $this->User->find('first', array('conditions' => array('User.id' => $id)));
            $this->set('user', $user);
          } else {
            if ($this->User->save($this->data)) {
                $this->Session->setFlash('Usuario Editado.');
                $this->redirect('index');
            }
        }
    }

    public function search(){

      $valor=$this->request->data['User']['valor'];
      $empresa=$this->Auth->user('empresa');
      $criterio=$this->request->data['User']['criterio'];      
     
     ////------------------------------------------------------------////
       
        $this->paginate = array(
        'order' => array('User.id' =>  'desc'),
        'conditions'=> array('User.empresa'=> $this->Auth->user('empresa')),
        'limit' => 10
        );
        $users = $this->paginate();
        $this->set('users',$users);
        



      ///-------------------------------------------------------------------////
      if($valor !=null and $criterio!=null):  
        $this->paginate = array(
            'order' => array('User.id' =>  'asc'),
            'conditions'=>array('User.'.$criterio.' LIKE'=>'%'.$valor.'%','User.empresa'=>$empresa),
            'limit' => 10
        );
      $users=$this->paginate(); 
      $this->set(compact('users'));
      endif;

      $this->render('index');
        
   }
   
   /**
     * Allow a user to request a password reset.
     * @return
     */
    function forgot_password() {
		 $this->layout = 'user';
		  if (!empty($this->data)) {
            $user = $this->User->findByUsername($this->data['User']['username']);
            if (empty($this->data['User']['username']) or empty($user)) {
                $this->Flash->error(
__('Lo sentimos, no se encontró el nombre de usuario ingresado.'));
                $this->redirect('/users/forgot_password');
            } else {
                $user = $this->__generatePasswordToken($user);
                if ($this->User->save($user) && $this->__sendForgotPasswordEmail($user['User']['id'])) {
                   $this->Flash->success(
                __('Las instrucciones de restablecimiento de contraseña se han enviado a su dirección de correo electrónico. ')
            );            
					
					//$this->Session->setflash('Password reset instructions have been sent to your email address.
						//You have 24 hours to complete the request.');
                    $this->redirect('/users/login');
                }
            }
        }
    }

    /**
     * Allow user to reset password if $token is valid.
     * @return
     */
    function reset_password_token($reset_password_token = null) {
		$this->layout = 'user'; 
		
        if (empty($this->data)) {
			 $this->data= $this->User->find('first', array('conditions' => array('User.reset_password_token' => $reset_password_token)));
            
            if (!empty($this->data['User']['reset_password_token']) && !empty($this->data['User']['token_created_at']) &&
            $this->__validToken($this->data['User']['token_created_at'])) {
                $this->data['User']['id'] = null;
                $_SESSION['token'] = $reset_password_token;
            } else {
                $this->Flash->error(__('La solicitud de restablecimiento de contraseña  no es válida.'));
                $this->redirect('/users/login');
            }
        } else {
            if ($this->data['User']['reset_password_token'] != $_SESSION['token']) {
               $this->Flash->error(__('La solicitud de restablecimiento de contraseña no es válida.'));
                $this->redirect('/users/login');
            }
             if(!empty($this->data['User']['new_passwd']) and !empty($this->data['User']['confirm_passwd']) and ($this->data['User']['new_passwd']==$this->data['User']['confirm_passwd']))
			 {
			 $user =$this->User->find('first', array('conditions' => array('User.reset_password_token' => $_SESSION['token'])));
          
			 $this->User->id = $user['User']['id'];
			 $this->User->saveField('password', $this->data['User']['new_passwd']);
			 $this->User->saveField('reset_password_token', '');
			 $this->User->saveField('token_created_at', '0000-00-00 00:00:00');
             $this->Flash->success(__('Su contraseña se ha cambiado correctamente. Por favor inicie sesión para continuar.'));
			 $this->redirect('/users/login');
			 }else{
				 $this->Flash->error(__('Contraseña no son iguales o los campos estan vacios'));
			 }
        }
    }

    /**
     * Generate a unique hash / token.
     * @param Object User
     * @return Object User
     */
    function __generatePasswordToken($user) {
        if (empty($user)) {
            return null;
        }

        // Generate a random string 100 chars in length.
        $token = "";
        for ($i = 0; $i < 100; $i++) {
            $d = rand(1, 100000) % 2;
            $d ? $token .= chr(rand(33,79)) : $token .= chr(rand(80,126));
        }

        (rand(1, 100000) % 2) ? $token = strrev($token) : $token = $token;

        // Generate hash of random string
        $hash = Security::hash($token, 'sha256', true);;
        for ($i = 0; $i < 20; $i++) {
            $hash = Security::hash($hash, 'sha256', true);
        }

        $user['User']['reset_password_token'] = $hash;
        $user['User']['token_created_at']     = date('Y-m-d H:i:s');

        return $user;
    }

    /**
     * Validate token created at time.
     * @param String $token_created_at
     * @return Boolean
     */
    function __validToken($token_created_at) {
        $expired = strtotime($token_created_at) + 86400;
        $time = strtotime("now");
        if ($time < $expired) {
            return true;
        }
        return false;
    }

    /**
     * Sends password reset email to user's email address.
     * @param $id
     * @return
     */
    function __sendForgotPasswordEmail($id = null) {
        if (!empty($id)) {
            $this->User->id = $id;
            $User = $this->User->read();
			
             mail($User['User']['email'],'Recuperar contraseña',"Click al link para cambiar contraseña : http://".Configure::read('dominio_')."/users/reset_password_token/".$User['User']['reset_password_token']."");
           
		     $this->set('User', $User);   
            return true;
        }
        return false;
    }

    
   
   
   
    
}    

?>
