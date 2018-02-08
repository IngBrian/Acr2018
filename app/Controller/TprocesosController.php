<?php
//App::uses('CakeEmail', 'Network/Email');

class TprocesosController extends AppController {

    

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
        'order' => array('Tproceso.nombre' =>  'asc'),
        'conditions' => array('Tproceso.empresa' => $this->Auth->user('empresa')),
        'limit' => 10
        );

      $tprocesos = $this->Paginator->paginate('Tproceso');
      $this->set('tprocesos',$tprocesos);

        
    }


   public function search(){
    
      $valor=$this->request->data['Tproceso']['valor'];
      $empresa=$this->Auth->user('empresa');
      $criterio=$this->request->data['Tproceso']['criterio'];      
     
     
      $this->paginate = array(
            'order' => array('Tproceso.id' =>  'asc'),
            'conditions'=>array('Tproceso.empresa'=>$this->Auth->user('empresa')),
            'limit' => 10
        );
        $tprocesos = $this->paginate();
        $this->set(compact('tprocesos'));


      if($valor !=null and $criterio!=null):  
        $this->paginate = array(
            'order' => array('Tproceso.id' =>  'asc'),
            'conditions'=>array('Tproceso.'.$criterio.' LIKE'=>'%'.$valor.'%','Tproceso.empresa'=>$empresa),
            'limit' => 10
        );
      $tprocesos=$this->paginate();     
      $this->set(compact('tprocesos'));
      endif;

        $this->render('index'); 
        
    }
   public function add(){
        
       // $this->loadData();
        
        if(!empty($this->data)) {
        	$this->Tproceso->id = $this->Session->read['Auth.User.Permiso.id_demandante'];
            if($this->Tproceso->save($this->data)) {
                    $this->redirect('index');
            }
	}
    }
   
  public function edit($id = NULL){
        
        $empresa=$this->Auth->user('empresa');
        $this->Tproceso->id = $id;
        if (empty($this->data)) {
            $tproceso = $this->Tproceso->find('all', array('conditions' => array('Tproceso.id' => $id,'Tproceso.empresa'=>$empresa)));
            $this->set('tproceso', $tproceso);
          
        } else {
            if ($this->Tproceso->save($this->data)) {
               // $this->Session->setFlash('Your post has been updated.');
                $this->redirect('index');
            }
        }
    }
  public function delete($id){
	  if($this->request->is('get')){
		  throw new MethodNotAllowedException();
		  }else{
			  if($this->Tproceso->delete($id)){
				  $this->Session->setFlash('Registro  eliminado');
				  $this->redirect(array('action'=>'index'));
				  }
			  
			  }
	  }
 
  public function exce(){
          
          if(!empty($this->data)) 
           {
			  
        	   if( $this->data['Tproceso']['archivo']['error'] == 0 &&  $this->data['Tproceso']['archivo']['size'] > 0)
             {
				 $archivo=$this->data['Tproceso']['archivo'];
				  //Informacion del tipo de archivo subido $this->data['Juzgado']['archivo']['type']
                  $destino = WWW_ROOT.'documentos'.DS.'Tprocesos'.DS;
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
					$pag=array("Tproceso" =>$info); 
					$this->Tproceso->create();
				    $this->Tproceso->save($pag);
					endif;
				}
			        unlink($destino.$archivo['name']);
					$this->redirect('index');
			  }
	  }
}
?>
