<?php  //Realizado: 09/0/2014, por: mrjsanchez_gmail.com
class UsuariosController extends AppController {
   var $name = 'Usuarios';
   var $uses = array('Usuario','Afiliado' ,'Permiso','Asesor' ,'TipoUsuario','Perfil');    

   public $paginate =  array( 'limit' => 50, 'order' => array('Usuario.nombre_completo' => 'asc'));
   public function beforeFilter() {
        parent::beforeFilter();
        $this->loadData();
   }
   public function beforeRender() {
	parent::beforeRender();
	}
	
   private function loadData(){
		if($this->Session->read('Auth.User.id_tipo_usuario')==1){
			$afiliados = $this->Afiliado->find('list', array('order' => 'Afiliado.nombreCompleto asc'));
			$asesor2 = $this->Asesor->find('list', array('order' => 'Asesor.nombre asc'));
			$tipo_user2 = $this->TipoUsuario->find('list', array('order' => 'TipoUsuario.nombre_tipo asc'));
		}else{
			$afiliados = $this->Afiliado->find('list', array('conditions' => array('Afiliado.id' => $this->Session->read('Auth.User.empresa')),'order' => 'Afiliado.nombreCompleto asc'));		
			$asesor2 = $this->Asesor->find('list', array('conditions' => array('Asesor.empresa' => $this->Session->read('Auth.User.empresa')),'order' => 'Asesor.nombre asc'));
			$tipo_user2 =  $this->TipoUsuario->find('list', array('conditions' => array('TipoUsuario.empresa' => $this->Session->read('Auth.User.empresa')),'order' => 'TipoUsuario.nombre_tipo asc'));
		}
		$tipo_usuario = array();$asesores = array();
		
        $this->set('afiliados', $afiliados);   
        $this->set('asesor2', $asesor2); 
		$this->set('tipo_user2', $tipo_user2);   

   }
	public function index(){
		$conditions = null;
		if(!$this->Session->read('Auth.User.Permiso.id_mod6')){ noAutorizadoModulo(); exit; }
		if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
			$conditions['Usuario.empresa']=$this->Session->read('Auth.User.empresa');
		}
		$usuarios = $this->paginate('Usuario', $conditions);
        $this->set('usuarios', $usuarios);
	}
	//Adicionar registro
	public function add(){
			if(!empty($this->data)){
				//print_r($this->data);
				if(DevolverCampo("tbusuarios","username","username",$this->data["Usuario"]["username"],2)!=''){
					  $this->Session->setFlash('Ya existe un nombre de usuario llamado: '.$this->data["Usuario"]["username"]);
					  $this->redirect('index');
					  exit;
				}
				if(DevolverCampo("tbusuarios","username","cc_nit",$this->data["Usuario"]["cc_nit"],2)!=''){
					  $this->Session->setFlash('Ya existe un usuario en el sistema con la identificacion: '.$this->data["Usuario"]["cc_nit"]);
					  $this->redirect('index');
					  exit;
				}
				if(DevolverCampo("tbusuarios","username","email",$this->data["Usuario"]["email"],2)!=''){
					  $this->Session->setFlash('Ya existe un usuario en el sistema con este e-mail, '.$this->data["Usuario"]["email"]);
					  $this->redirect('index');
					  exit;
				}
				
				if($this->Usuario->save($this->data)){
					$id = $this->Usuario->id;
					hashPassw($id);
					$Descripcion = 'Se creo el usuario No. '.$id;
					Registro_Bitacora($id,$this->Session->read('Auth.User.id'),date('Y-m-d'),date("H:i:s"),$Descripcion,"p"); 
					$this->redirect('index');
				}
			}
	}
	//Eliminar registro
	public function delete($id){
		  if($this->request->is('get')){
			  	  throw new MethodNotAllowedException();
			  }else{
				  if($this->Usuario->delete($id)){
					  $this->Session->setFlash('usuario eliminado');
					  $this->redirect('index');
				  }
				  
		      }
	}
	//Editar registro
	public function edit($id = NULL){
			$this->Usuario->id = $id;
			if (empty($this->data)) {
				$usuario = $this->Usuario->find('all', array('conditions' => array('Usuario.id' => $id)));
				$this->set('usuario', $usuario);
			  
			}else{
				/* Pendiente en editar
				if(DevolverCampo("tbusuarios","username","username",$this->data["Usuario"]["username"],2)!=''){
					  $this->Session->setFlash('Ya existe un nombre de usuario llamado: '.$this->data["Usuario"]["username"]);
					  $this->redirect('index');
					  exit;
				}
				if(DevolverCampo("tbusuarios","username","cc_nit",$this->data["Usuario"]["cc_nit"],2)!=''){
					  $this->Session->setFlash('Ya existe un usuario en el sistema con la identificacion: '.$this->data["Usuario"]["cc_nit"]);
					  $this->redirect('index');
					  exit;
				}
				*/

				if ($this->Usuario->save($this->data)) {
					$id = $this->data['Usuario']['id'];
					hashPassw($id);
					$this->Session->setFlash('Usuario Editado.');
					$Descripcion = 'Se edito el usuario No. '.$id;
					Registro_Bitacora($id,$this->Session->read('Auth.User.id'),date('Y-m-d'),date("H:i:s"),$Descripcion,"p"); 
				    $this->redirect('index');
				}
			}
	}
}

?>