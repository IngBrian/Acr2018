<?php
class PendientesController extends AppController {

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

    if (in_array($this->action, array('add','exce','delete','edit'))) {
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
        'order' => array('Pendiente.nombre' =>  'asc'),
        'conditions' => array('Pendiente.empresa' => $this->Auth->user('empresa')),
        'limit' => 10
    );

    $pendientes = $this->Paginator->paginate('Pendiente');
    $this->set('pendientes',$pendientes);
    
    }


   public function search(){
        
      $valor=$this->request->data['Pendiente']['valor'];
      $empresa=$this->Auth->user('empresa');
      $criterio=$this->request->data['Pendiente']['criterio'];      
     
     
      $this->paginate = array(
            'order' => array('Pendiente.id' =>  'asc'),
            'conditions'=>array('Pendiente.empresa'=>$this->Auth->user('empresa')),
            'limit' => 10
        );
        $pendientes = $this->paginate();
        $this->set(compact('pendientes'));


      if($valor !=null and $criterio!=null): 
      
        $this->paginate = array(
            'order' => array('Pendiente.id' =>  'asc'),
            'conditions'=>array('Pendiente.'.$criterio.' LIKE'=>'%'.$valor.'%','Pendiente.empresa'=>$empresa),
            'limit' => 10
        );
      $pendientes=$this->paginate();     
      $this->set(compact('pendientes'));
      endif;

        $this->render('index');
   

      }

     public function add() {
         
        if ($this->request->is('post')) {
            $this->Pendiente->create();
            if ($this->Pendiente->save($this->request->data)) {
                $this->Flash->success(__('Registro Guardado!!'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('Fallo al guardar Localidad, intentar de nuevo')
            );
        }
    }

  public function edit($id = NULL){
        
     
        $this->Pendiente->id = $id;
        if (empty($this->data)) {
            $pendientes = $this->Pendiente->find('all', array('conditions' => array('Pendiente.id' => $id)));
            $this->set('pendientes', $pendientes);
          
        } else {
            if ($this->Pendiente->save($this->data)) {
               // $this->Session->setFlash('Your post has been updated.');
                $this->redirect('index');
            }
        }
    }
  public function delete($id){
	  if($this->request->is('get')){
		  throw new MethodNotAllowedException();
		  }else{
			  if($this->Pendiente->delete($id)){
				  $this->Session->setFlash('Registro eliminado');
				  $this->redirect(array('action'=>'index'));
				  }
			  
			  }
	  }
 
  public function exce(){
          
          if(!empty($this->data)) 
           {

			  
        	   if( $this->data['Pendiente']['archivo']['error'] == 0 &&  $this->data['Pendiente']['archivo']['size'] > 0)
             {
				 $archivo=$this->data['Pendiente']['archivo'];
				  //Informacion del tipo de archivo subido $this->data['Juzgado']['archivo']['type']
                  $destino = WWW_ROOT.'documentos'.DS.'Pendientes'.DS;
				  if (!file_exists($destino)) {
					  mkdir($destino, 0777);
					}
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
							
				$cabezera=array("nombre","empresa"); 
				foreach($data as $dato)
				{	
					if($dato[0]!=null ):
					$dato[1]=$this->Auth->user('empresa');
					$info=array_combine($cabezera,$dato);
					$pag=array("Pendiente" =>$info); 
					$this->Pendiente->create();
				    $this->Pendiente->save($pag);
					endif;
				}
			        unlink($destino.$archivo['name']);
					$this->redirect('index');
			  }
	  }
}
?>
