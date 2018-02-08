<?php 
App::uses('CakeEmail', 'Network/Email');
App::uses('CakeTime', 'Utility');
App::uses('BlowfishPasswordHasher','Controller/Component/Auth');
class AfiliadosController extends AppController {
	var $uses = array('Globaluser','Afiliado','User','Prejuridico','LogPrejuridico',
     'Ordenante', 'Cliente','Asesor', 'Tproceso', 'Pagaduria','Juzgado', 
     'Subestado',   'Pago','Afiliado', 'ClientesTelefono','Logalbum','Logarchivo','Logbag',
     'Logdocument','Logitem','Logpicture','PrejuridicoSubestado','LogPrejuridico','LogPrejuridicoSubestado','Logclientestelefono','Logpago',
     'Departamento','Municipio','Localidade','Acceso');
	 

    public function isAuthorized($user) {
    // todos los visitantes ven el index
       
    if ($this->action === 'index') {
        return true;
    }
   if (in_array($this->action, array('add','edit','searchcore','accesar','delete','selacceso'))) {
        if ($user['role']=='administrator' or $user['role']=='visitante' or $user['role']=='sadmin') {
            return true;
            }
    }
   return parent::isAuthorized($user);
}
   public function beforeFilter() {
        parent::beforeFilter('searchcore','selacceso');
        $this->loadData();
    }
      function selacceso($id){  
	    return $user_acces = $this->Acceso->find('first',
		   array('conditions'=>array(
		         'Acceso.usuario_id'=>$this->Session->read('usuario_id'),
		         'Acceso.proceso_id'=>$id )));
		
		$this->render(false);
	}
    public function loadData(){ 
	    $empresa=$this->Auth->user('empresa');
        $options = array('director' => 'director','registrado' => 'registrado','visitante' => 'visitante');
	    $role=$this->Auth->user('role');
		  	
		if($role=='sadmin'){ 
	     array_push($options, array('administrator' => 'administrator'));
		 asort($options);
		}
        $this->set('options',$options);
		$user=$this->Auth->user(); 
		$this->set('user', $user);
		$options_B = array('pagare' => 'RAD/REFERENCIA','guia' => 'NOTIFICACION/P','guia2' => 'AVISO','ntitulo' => 'TITULO');
    	$this->set('options_B',$options_B);

		$ordenantes = $this->Ordenante->find('list',array('conditions'=>array('Ordenante.empresa'=>$empresa)));
		$this->set('ordenantes', $ordenantes);
		

		$asesores=$this->Asesor->find('list',array('conditions'=>array('Asesor.empresa'=>$empresa)));
		$this->set('asesores', $asesores);
		
		$cliente=$this->Cliente->find('list',array('conditions'=>array('Cliente.empresa'=>$empresa)));
		$this->set('cliente', $cliente);

	    $tprocesos = $this->Tproceso->find('list',array('conditions'=>array('Tproceso.empresa'=>$empresa)));
		$this->set('tprocesos', $tprocesos);
        
		$ubicaciones=$this->Localidade->find('all',array('conditions'=>array('Localidade.empresa'=>$empresa)));
		
		
		$pagadurias = $this->Pagaduria->find('list',array('conditions'=>array('Pagaduria.empresa'=>$empresa)));
        $this->set('pagadurias', $pagadurias);

        $juzgados = $this->Juzgado->find('list',array('conditions'=>array('Juzgado.empresa'=>$empresa)));
		$this->set('juzgados', $juzgados);

        $subestados = $this->Subestado->find('list',array('conditions'=>array('Subestado.empresa'=>$empresa)));
        $this->set('subestados', $subestados);

        $options_desv=array('1-30'=>'1-30 dias','31-60'=>'31-60 dias', '61-90'=>'61-90 dias', '91-120'=>'91-120 dias', '121-150'=>'121-150 dias', '151-180'=>'151-180 dias', '180-250'=>'180-250 dias', '251-365'=>'251-365 dias', '366-500'=>'366-500 dias', '501-650'=>'501-650 dias', '651-770'=>'651-770 dias', '771-1000'=>'771 + 1000', '1000'=>'1000 + dias');
        $this->set('options_desv',$options_desv);
       
		$ubis= array();
		foreach($ubicaciones as $ubc) : 
		  $ubis[$ubc['Localidade']['id']]=$ubc['Localidade']['nombre'];  
	     endforeach;
		$this->set('ubicaciones',$ubis);
		
		
    }//3002874390
	
   public function index() { 
          if($this->Auth->user('role')=='sadmin'){ 
			  $this->Paginator->settings = array( 
		     'conditions'=>array('User.role'=>'administrator'  ),
		     'order' => array('User.id' =>  'desc'),
             'limit' => 10 
          );  
			  
		  }else{
			$td= $this->Auth->user('role')=='administrator'?array("NOT" => array( 
			                                                         "User.id" => array(
																	 $this->Auth->user('id')))):'';
	        $this->Paginator->settings = array( 
		    'conditions'=>array('User.empresa'=>$this->Auth->user('empresa'),$td ),
		    'order' => array('User.id' =>  'desc'),
            'limit' => 10 
            );
		  
		  
		  }
		
        $afiliados = $this->Paginator->paginate('User');
        $this->set('afiliados', $afiliados);
		
    }
    public function add(){   
	   if ($this->request->is('post')) {
		   $rol=$_POST['role']; 
			$this->Afiliado->create();
            if ($this->Afiliado->save($this->request->data)) {
				$getInsertID=$this->Afiliado->getInsertID();
				 if($this->Auth->user('role')=='sadmin'){
					    
				       $email=$this->request->data['Afiliado']['email'];
					   $empresa_padre=($rol!='administrator')?$this->Auth->user('id'):$getInsertID;
					   $this->createafi(
								$getInsertID,
								$this->request->data['Afiliado']['identificacion'],
								$this->request->data['Afiliado']['identificacion'],
								$this->request->data['Afiliado']['nombreCompleto']
								,$rol,
								$this->request->data['Afiliado']['email'],$empresa_padre);
				        if($rol=='administrator'){
							mkdir(WWW_ROOT . 'files' . DS .$getInsertID, 0777);
							mkdir(WWW_ROOT . 'files' . DS .$getInsertID. DS .'gallery', 0777);
							mkdir(WWW_ROOT . 'files' . DS .$getInsertID. DS .'excel', 0777);
							mkdir(WWW_ROOT . 'files' . DS .$getInsertID. DS .'documentos', 0777);
							mkdir(WWW_ROOT . 'files' . DS .$getInsertID. DS .'multimedia', 0777);
							mkdir(WWW_ROOT . 'files' . DS .$getInsertID. DS .'images', 0777);
						}
				 
				 
				  }else{
					  if($this->Auth->user('role')=='administrator'){
						    $this->createafi(
								$getInsertID,
								$this->request->data['Afiliado']['identificacion'],
								$this->request->data['Afiliado']['identificacion'],
								$this->request->data['Afiliado']['nombreCompleto']
								,$rol,
								$this->request->data['Afiliado']['email'],$this->Auth->user('id')); 
							
					   }
					
				 }
				
				 
				 $this->Flash->success(__('Empresa Creada'));
				  
                  return $this->redirect(array('action' => 'edit/'.$getInsertID));
            }
            $this->Flash->error(
                __('La Empresa no pudo ser grabada, Favor intentar de nuevo')
            );
        }
		  
		 
    }
    
		public function createafi($id,$cc_nit,$user,$nombre,$rol, $email,$empresa){
			$passwordHasher = new BlowfishPasswordHasher();
			$password = $passwordHasher->hash($user);
			$Usuario = array();
			$Usuario[] =       $id;
			$Usuario[] =       $cc_nit;
			$Usuario[] =       $nombre;
			$Usuario[] =       '';
			$Usuario[] =       $email;
			$Usuario[] =       $user;
			$Usuario[] =       $password;
			$Usuario[] =       0;
			$Usuario[] =       date("Y-m-d");
			$Usuario[] =       '';
			$Usuario[] =       $empresa;
			$Usuario[] =       $rol;
			$Usuario[] =      '';
			$Usuario[] =      '0000-00-00';
			$insert = "'".implode("','", $Usuario)."'";
			$this->User->query("INSERT INTO `tbusuarios` VALUES (".$insert.")"); 
			
		}
   public function search(){
     $valor=$this->request->data['Afiliado']['valor'];
     $criterio=$this->request->data['Afiliado']['criterio'];      
     $this->paginate = array(
        'order' => array('Afiliado.id' =>  'desc'),
        'limit' => 10
        );
        $afiliados = $this->paginate();
        $this->set('afiliados',$afiliados);      
		if($valor !=null and $criterio!=null):  
        $this->paginate = array(
            'order' => array('Afiliado.id' =>  'asc'),
            'conditions'=>array('Afiliado.'.$criterio.' LIKE'=>'%'.$valor.'%'),
            'limit' => 10
        );
      $afiliados=$this->paginate(); 
      $this->set(compact('afiliados'));
      endif;

      $this->render('index');
       
    }
     public function edit($id = null) { 
	    $this->Session->write('usuario_id',$id);
        $user=$this->Auth->user(); 	  
         if ($this->request->is('post') || $this->request->is('put')) {
			 
			 
             $this->Afiliado->id = intval($id);
			 $this->Afiliado->save($this->request->data['Afiliado']);
			 $estado=!empty($this->request->data['EstadoGlobal'])?1:0;
			 $this->User->id =  intval($id);
             $this->request->data['User']['estado']=$estado;
			 $this->request->data['User']['nombre_completo']= $this->request->data['Afiliado']['nombreCompleto'];
			 $this->request->data['User']['role']= $this->request->data['role'];
			 $this->request->data['User']['email']= $this->request->data['Afiliado']['email'];
			 $this->User->save($this->request->data['User']);
		  	
        } else {
           $afiliado = $this->Afiliado->findById($id);
		   $this->set('afiliado', $afiliado); 
		   
		   
		
        }
		   $user = $this->User->findById($id);  
		   $this->set('estado', $user['User']['estado']);
		   $this->set('userol', $user['User']['role']);
		  
		
    }

	public function delete($id = NULL){
		  if($this->request->is('get')){
			  	  throw new MethodNotAllowedException();
			  }else{
				  if($this->Afiliado->delete($id)){
					  $this->Session->setFlash('Afiliado eliminado');
					  $this->redirect('index');
				  }
		      }
	   }
     public function searchcore(){
		$this->layout = 'ajax'; 
        $empresa=$this->Auth->user('empresa');
		if(!empty($this->data)){
		  $ordenante_id=$this->request->data["Afiliados"]['ordenante_id']; 
		  $abogado=$this->request->data["Afiliados"]['abogado']; 
		  $tproceso_id=$this->request->data["Afiliados"]['tproceso_id']; 
		  $pagaduria_id=$this->request->data["Afiliados"]['pagaduria_id']; 
		  $juzgado_id=$this->request->data["Afiliados"]['juzgado_id']; 
		  $subestado_id=$this->request->data["Afiliados"]['subestado_id']; 
		  $dias=$this->request->data["Afiliados"]['QtyDMora']; 
		  $ubicacion_id=$this->request->data["Afiliados"]['ubicacion_id']; 
		  $cliente_id=$this->request->data["Afiliados"]['cliente_id']; 
		  $opciones= array();
		  $empresac=" Prejuridico.empresa = ".$empresa."";
		  array_push($opciones, $empresac);

         //---------------si usan el segundo filtro-----------------------------//
         if(!empty($ubicacion_id)):
            $ubicacion_idc=" Prejuridico.ubicacion_id = ".$ubicacion_id."";
            array_push($opciones,$ubicacion_idc);
        endif;

         if(!empty($ordenante_id)):
            $ordenante_idc=" Prejuridico.ordenante_id = ".$ordenante_id."";
            array_push($opciones, $ordenante_idc);
        endif;

        if(!empty($cliente_id)):
            $cliente_idc=" Prejuridico.cliente_id = ".$cliente_id."";
            array_push($opciones, $cliente_idc);
        endif;
      
        if(!empty($abogado)):
            $abogadoc="Prejuridico.Abogado2 = ".$abogado."";
            array_push($opciones, $abogadoc);
        endif;

        if(!empty($tproceso_id)):
             $tproceso_idc=" Prejuridico.tproceso_id = ".$tproceso_id."";
             array_push($opciones, $tproceso_idc);
        endif;

        if(!empty($pagaduria_id)):
           $pagaduria_idc=" Prejuridico.pagaduria_id = ".$pagaduria_id."";
            array_push($opciones, $pagaduria_idc);
        endif;

        if(!empty($juzgado_id )):
            $juzgado_idc=" Prejuridico.juzgado_id = ".$juzgado_id."";
            array_push($opciones, $juzgado_idc);
        endif;

        if(!empty($subestado_id )):
             $subestado_idc=" Prejuridico.subestado_id = ".$subestado_id."";
             array_push($opciones, $subestado_idc);
        endif;
        $procesos = $this->paginate();
        $conditions=array('conditions' => $opciones);
        $procesos = $this->Prejuridico->find('all',$conditions);
        $total_p=count($procesos);
        $this->set(compact('procesos','total_p'));
		
	    }
      }
	  function accesar($id,$sel){
		 
		  $user_acces = $this->Acceso->find('first',
		   array('conditions'=>array('Acceso.usuario_id'=>$this->Session->read('usuario_id'),
		                             'Acceso.proceso_id'=>$id )));
		 if(empty($user_acces)){			
			 $data =array('usuario_id'=>$this->Session->read('usuario_id'),
						  'proceso_id'=>$id);
			 $this->Acceso->save($data);
		 }else{
			if($sel==0){
				$this->Acceso->deleteAll(array('Acceso.usuario_id'=>$this->Session->read('usuario_id'),
		                                       'Acceso.proceso_id'=>$id),false);
			}
			 
		 }
		 $this->render(false);
	  }
}
?>
