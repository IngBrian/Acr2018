<?php  //Realizado: 09/0/2014, por: mrjsanchez_gmail.com
class PerfilsController extends AppController {
   var $name="Perfils";	
   var $uses = array('Perfil', 'Permiso','Asesor' ,'TipoUsuario','Ordenante','Cliente','Afiliado');    

   public $paginate =  array( 'limit' => 50, 'order' => array('Usuario.nombre_completo' => 'asc'));
   public function beforeFilter() {
        parent::beforeFilter();
        $this->loadData();
   }
   public function beforeRender() {
		parent::beforeRender();
   }
   public function getByPerfils() {   
        $this->autoRender = FALSE;
		$empresa = $this->request->data['empresa_'];
		$tipo_usuario = $this->TipoUsuario->find('list', array(
			'conditions' => array('TipoUsuario.empresa' => $empresa),
			'recursive' => -1
                ));
		print '{"status" : 1, "data" :'.json_encode($tipo_usuario).'}';
   }
   private function loadData(){
		if($this->Session->read('Auth.User.id_tipo_usuario')==1){
			$afiliados = $this->Afiliado->find('list', array('order' => 'Afiliado.nombreCompleto asc'));
			$client2 = $this->Cliente->find('list', array('order' => 'Cliente.nombre_completo asc'));
			$ord2 = $this->Ordenante->find('list', array('order' => 'Ordenante.nombre asc'));
		}else{
			$afiliados = $this->Afiliado->find('list', array('conditions' => array('Afiliado.id' => $this->Session->read('Auth.User.empresa')),'order' => 'Afiliado.nombreCompleto asc'));
			$client2 = $this->Cliente->find('list', array('conditions' => array('Cliente.empresa' => $this->Session->read('Auth.User.empresa')),'order' => 'Cliente.nombre_completo asc'));
			$ord2 = $this->Ordenante->find('list', array('conditions' => array('Ordenante.empresa' => $this->Session->read('Auth.User.empresa')),'order' => 'Ordenante.nombre asc'));
		}
        $asesores = $this->Asesor->find('list', array('order' => 'Asesor.nombre asc'));
        $this->set('asesores', $asesores);   
        $ordenantes = array();//$this->Ordenante->find('list', array('order' => 'Ordenante.nombre asc'));
		
        $this->set('ord2', $ord2);   
        $clientes = array();//$this->Cliente->find('list', array('order' => 'Cliente.nombre_completo asc'));
		
        $this->set('client2', $client2);  
		$this->set('clientes', $clientes);   
		$this->set('afiliados', $afiliados);
   }
	public function index(){
		$conditions = null;
		if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
			$conditions['TipoUsuario.empresa']=$this->Session->read('Auth.User.empresa');
		}
        $tipo_usuario = $this->paginate('TipoUsuario', $conditions);
        $this->set('tipo_usuario', $tipo_usuario);
	}
	//Adicionar registro
	public function add(){
	    //print_r($this->data);
        if(!empty($this->data)){
            if($this->Perfil->save($this->data)){
                $id = $this->Perfil->id;
                SaveSlave($id,$this->data['Permiso'],1);
				$Descripcion = 'Se creo el tipo de usuario usuario No. '.$id;
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
				  if($this->Perfil->delete($id)){
					  $this->Session->setFlash('El perfil se ha eliminado');
					  $this->redirect('index');
				  }
				  
		      }
	}
	//Editar registro
	public function edit($id = NULL){
			$this->Perfil->id = $id;
			if (empty($this->data)) {
				$tipo_usuario = $this->TipoUsuario->find('all', array('conditions' => array('TipoUsuario.id' => $id)));
				$this->set('tipo_usuario', $tipo_usuario);
				$permisos = $this->Permiso->find('all', array('conditions' => array('Permiso.id_perfil' => $id)));
				$this->set('permisos', $permisos);
			  
			}else{
				if ($this->Perfil->save($this->data)) {
					$id = $this->data['Perfil']['id'];
					$this->Session->setFlash('Perfil Editado.');
					//print_r($this->data['Permiso']);
					SaveSlave($id,$this->data['Permiso'],2);
					$Descripcion = 'Se edito el perfil de usuario No. '.$id;
					Registro_Bitacora($id,$this->Session->read('Auth.User.id'),date('Y-m-d'),date("H:i:s"),$Descripcion,"p"); 
				    $this->redirect('index');
				}
			}
	}
}

?>