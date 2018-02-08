<?php 

App::uses('CakeEmail', 'Network/Email');
 App::uses('AuthComponent', 'Controller/Component');


class ClientesController extends AppController {
    
    var $uses = array('Cliente', 'Municipio', 'Departamento', 'Prejuridico'); 
    public $components = array('ExcelReader','Paginator');
    
    
     public function loadData(){
     	
        $departamentos = $this->Departamento->find('list');
        $this->set('departamentos', $departamentos);
        $this->set('municipios', null);
    }
   

     public function isAuthorized($user) {
    // todos los visitantes ven el index
    if ($this->action === 'index') {
        return true;
    }

    
    if (in_array($this->action, array('add','exce'))) {
        if ($user['role']=='registrado') {
            return true;
            }
    }


    
    if (in_array($this->action, array('add','exce','edit'))) {
        if ($user['role']=='director') {
            return true;
            }
    }

    if (in_array($this->action, array('add','exce','edit','delete'))) {
        if ($user['role']=='administrator') {
            return true;
            }
    }


    return parent::isAuthorized($user);
}

   public function beforeFilter() {
      parent::beforeFilter();
      
    } 



   public function index() {
        

	$this->Paginator->settings = array(
        'order' => array('Cliente.nombre_completo' =>  'asc'),
        'conditions'=>array('Cliente.empresa'=>$this->Auth->user('empresa')),
        'limit' => 10
    );
    $clientes = $this->Paginator->paginate('Cliente');
    $this->set(compact('clientes'));
    }

   public function search(){

   	  $valor=$this->request->data['Cliente']['valor'];
      $empresa=$this->Auth->user('empresa');
      $criterio=$this->request->data['Cliente']['criterio'];      
      //echo $valor;
      //echo '<BR>'.$criterio;
     
      $this->paginate = array(
            'order' => array('Cliente.id' =>  'asc'),
            'conditions'=>array('Cliente.empresa'=>$this->Auth->user('empresa')),
            'limit' => 10
        );
        $clientes = $this->paginate();
        $this->set(compact('clientes'));


      if($valor != null and $criterio != null):  
      	//echo "xxxx";
        $this->paginate = array(
            'order' => array('Cliente.id' =>  'asc'),
            'conditions'=>array('Cliente.'.$criterio.' LIKE'=>'%'.$valor.'%','Cliente.empresa'=>$empresa),
            'limit' => 10
        );

      $clientes=$this->paginate();     
      $this->set(compact('clientes'));
      endif;

        $this->render('index');
        
       
    }
   public function add(){
        
        $this->loadData();
        
        if(!empty($this->data)) {
        	$this->Cliente->cliente_id = $this->Session->read['Auth.User.Permiso.id_demandante'];
            if($this->Cliente->save($this->data)) {
                    $this->redirect('index');
            }
	}
    }
  
  public function edit($id = NULL){
        
        $this->loadData();
        $empresa=$this->Auth->user('empresa');
        $this->Cliente->id = $id;
        if (empty($this->data)) {
            $cliente = $this->Cliente->find('all', array('conditions' => array('Cliente.id' => $id,'Cliente.empresa'=>$empresa)));
            $this->set('cliente', $cliente);
            $municipios =$this->Municipio->find('list', array('conditions' => array('Municipio.id_dpto' => $cliente[0]['Cliente']['departamento_id'])));
            $this->set('municipios', $municipios);
        } else {
            if ($this->Cliente->save($this->data)) {
                $this->Session->setFlash('Cliente Editado');
                $this->redirect('index');
            }
        }
    }
  public function mail($id = NULL) {
    	$procesos = $this->Prejuridico->find('all', array('conditions' => array('id_deudor' => $id), 'recursive' => 2));
    	if(count($procesos) > 0 ) {
	    	foreach($procesos as $proceso) {
			    if(!empty($proceso['Cliente']['email'])) {	
			   		$email = new CakeEmail();
					$email->template('remember')
					     ->emailFormat('html')
					     ->to($proceso['Cliente']['email'])
					     ->from('noreply@acrcartera.com')
					     ->subject('Recordatorio de Pago')
					     ->viewVars( array('cliente' => $proceso['Cliente']['nombre_completo'], 'direccion' => $proceso['Cliente']['direccion'], 										   'ciudad' =>  $proceso['Cliente']['Municipio']['nombre_municipio'], 'demandante' => $proceso['Ordenante']['nombre_completo']))
					     ->send();
					 $this->download($proceso); 
				 } else {
				     $this->Session->setFlash('La carta no pudo ser generada, campo email vacio.');
				     $this->redirect('index');
			     } 
	     }	
    	} else {
	    	$this->Session->setFlash('El cliente no posee ningun proceso registrado.');
	    	$this->redirect('index');
    	}
	}
   public function mails() {
	    $clientes = $this->Cliente->find('all');
	    $empty = false;
	    foreach($clientes as $cliente) {  
        	$procesos = $this->Prejuridico->find('all', array('conditions' => array('id_deudor' => $cliente['Cliente']['id']), 'recursive' => 2));
	    	foreach($procesos as $proceso) {
			    if(!empty($proceso['Cliente']['email'])) {	
			   		$email = new CakeEmail();
					$email->template('remember')
					      ->emailFormat('html')
					      ->to($proceso['Cliente']['email'])
					      ->from('noreply@acrcartera.com')
					      ->subject('Recordatorio de Pago')
					      ->viewVars( array('cliente' => $proceso['Cliente']['nombre_completo'], 'direccion' => 
					      					$proceso['Cliente']['direccion'], 'ciudad' =>  $proceso['Cliente']['Municipio']['nombre_municipio'], 											'demandante' =>	$proceso['Ordenante']['nombre_completo']))
					     ->send();   
			     } else {
			     	  $empty = true;
			     }	 
	     }
	    if($empty)$this->Session->setFlash('Algunas cartas no pudieron ser generadas, campo email vacio.');
		else $this->Session->setFlash('Todas las cartas fueron generadas satisfactoriamente.');     
	    $this->redirect('index');
    }
  
  }
  
  public function exce(){
          
          $this->loadData();
           if(!empty($this->data)) 
           {
			 
        	   if( $this->data['Cliente']['archivo']['error'] == 0 &&  $this->data['Cliente']['archivo']['size'] > 0)
             {
				 $archivo=$this->data['Cliente']['archivo'];
				  //Informacion del tipo de archivo subido $this->data['Cliente']['archivo']['type']
                  $destino = WWW_ROOT.'documentos'.DS.'Deudores'.DS;
                  if(move_uploaded_file($archivo['tmp_name'], $destino.$archivo['name']))
                   {               
                     $this->Session->setFlash(__('El archivo se a guardado'));
                   }else{
                      $this->Session->setFlash(__('El archivo no se pudo subir, por favor intentelo de nuevo'));       
                   }
               }else{
				      $this->Session->setFlash(__('Error al intentar subir el archivo'));
                   }
				$file =  $destino.$archivo['name'];  
				$this->set('filename', $file);  
				try {  
				$data=$this->ExcelReader->loadExcelFile($file);  
				} catch (Exception $e) {  
				echo 'Exception occured while loading the project list file';  
				exit;  
				}  
				//$data = $this->ExcelReader->dataArray;
				/*
				echo '<PRE>';
				print_r ($data);
				echo '</PRE>';
				*/
				
				$cabezera=array("nit_cc","nombre_completo","direccion","telefonos","email","empresa"); 
				foreach($data as $dato)
				{	
					if($dato[0]!=null && $dato[1]!=null):
					$dato[6]=$this->Auth->user('empresa');
					$info=array_combine($cabezera,$dato);
					$ase=array("Cliente" =>$info); 
					$this->Cliente->create();
				    $this->Cliente->save($ase);
					endif;
			        
				}
				     if(file_exists($destino.$archivo['name'])){ unlink($destino.$archivo['name']); }
			         $this->redirect('index');
			     }
			  }




	  public function delete($id){
	  if($this->request->is('get')){
		  throw new MethodNotAllowedException();
		  }else{
			  if($this->Cliente->delete($id)){
				  $this->Session->setFlash('Registro eliminado');
				  $this->redirect('index');
				  }
			  
			  }
	  }			  
}
?>
