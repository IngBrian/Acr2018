<?php
class SubestadosController extends AppController {

  
   

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
        'order' => array('Subestado.nombre' =>  'asc'),
        'conditions' => array('Subestado.empresa' => $this->Auth->user('empresa')),
        'limit' => 10
    );

    $subestados = $this->Paginator->paginate('Subestado');
    $this->set('subestados',$subestados);
    
    }


   public function search(){
        
      $valor=$this->request->data['Subestado']['valor'];
      $empresa=$this->Auth->user('empresa');
      $criterio=$this->request->data['Subestado']['criterio'];      
     
     
      $this->paginate = array(
            'order' => array('Subestado.id' =>  'asc'),
            'conditions'=>array('Subestado.empresa'=>$this->Auth->user('empresa')),
            'limit' => 10
        );
        $subestados = $this->paginate();
        $this->set(compact('subestados'));


      if($valor !=null and $criterio!=null): 
      echo $valor.'-'.$criterio.'-'.$empresa; 
        $this->paginate = array(
            'order' => array('Subestado.id' =>  'asc'),
            'conditions'=>array('Subestado.'.$criterio.' LIKE'=>'%'.$valor.'%','Subestado.empresa'=>$empresa),
            'limit' => 10
        );
      $subestados=$this->paginate();     
      $this->set(compact('subestados'));
      endif;

        $this->render('index');
   

      }

     public function add() {
         
        if ($this->request->is('post')) {
            $this->Subestado->create();
            if ($this->Subestado->save($this->request->data)) {
                $this->Flash->success(__('Registro Guardado!!'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('Fallo al guardar Subestado, intentar de nuevo')
            );
        }
    }

  public function edit($id = NULL){
        
     
        $this->Subestado->id = $id;
        if (empty($this->data)) {
            $subestado = $this->Subestado->find('all', array('conditions' => array('Subestado.id' => $id)));
            $this->set('subestado', $subestado);
          
        } else {
            if ($this->Subestado->save($this->data)) {
               // $this->Session->setFlash('Your post has been updated.');
                $this->redirect('index');
            }
        }
    }
  public function delete($id){
	  if($this->request->is('get')){
		  throw new MethodNotAllowedException();
		  }else{
			  if($this->Subestado->delete($id)){
				  $this->Session->setFlash('Registro eliminado');
				  $this->redirect(array('action'=>'index'));
				  }
			  
			  }
	  }
 
  public function exce(){
          
          if(!empty($this->data)) 
           {

			  
        	   if( $this->data['Subestado']['archivo']['error'] == 0 &&  $this->data['Subestado']['archivo']['size'] > 0)
             {
				 $archivo=$this->data['Subestado']['archivo'];
				  //Informacion del tipo de archivo subido $this->data['Juzgado']['archivo']['type']
                  $destino = WWW_ROOT.'documentos'.DS.'Subestados'.DS;
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
					$pag=array("Subestado" =>$info); 
					$this->Subestado->create();
				    $this->Subestado->save($pag);
					endif;
				}
			        unlink($destino.$archivo['name']);
					$this->redirect('index');
			  }
	  }
}
?>
