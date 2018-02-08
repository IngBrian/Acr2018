<?php  
 
 App::uses('AppController', 'Controller');
 App::uses('AuthComponent', 'Controller/Component');

class OrdenantesController extends AppController {
    
  

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
        
   $this->paginate = array(
        'order' => array('Ordenante.nombre' =>  'asc'),
        'conditions' => array('Ordenante.empresa' => $this->Auth->user('empresa')),
        'limit' => 10
    );

    $ordenantes = $this->paginate();
    $this->set('ordenantes',$ordenantes);

    }


   public function search(){

      $valor=$this->request->data['Ordenante']['valor'];
      $empresa=$this->Auth->user('empresa');
      $criterio=$this->request->data['Ordenante']['criterio'];      
     
     
      $this->paginate = array(
            'order' => array('Ordenante.id' =>  'asc'),
            'conditions'=>array('Ordenante.empresa'=>$this->Auth->user('empresa')),
            'limit' => 10
        );
        $ordenantes = $this->paginate();
        $this->set(compact('ordenantes'));





      if($valor !=null and $criterio!=null):  
        $this->paginate = array(
            'order' => array('Ordenante.id' =>  'asc'),
            'conditions'=>array('Ordenante.'.$criterio.' LIKE'=>'%'.$valor.'%','Ordenante.empresa'=>$empresa),
            'limit' => 10
        );
      $ordenantes=$this->paginate();     
      $this->set(compact('ordenantes'));
      endif;

        $this->render('index');
      
      

        
    }

   public function add(){
        
       // $this->loadData();
          if(!empty($this->data)) {
        	$this->Ordenante->id = $this->Session->read['Auth.User.Permiso.id_demandante'];
            if($this->Ordenante->save($this->data)) {
              $this->Flash->success('Registro Guardado');
              $this->redirect('index');
            }
	        }
    }
   
  public function edit($id = NULL){
        
        $this->Ordenante->id = $id;
        $empresa=$this->Auth->user('empresa');
        if (empty($this->data)) {
            $ordenante= $this->Ordenante->find('all', array('conditions' => array('Ordenante.id' => $id,'Ordenante.empresa'=>$empresa)));
            $this->set('ordenante', $ordenante);
          
        } else {
            if ($this->Ordenante->save($this->data)) {
                $this->Flash->success('Registro Editado');
                $this->redirect('index');
            }
        }
    }

  public function delete($id){
	  if($this->request->is('get')){
		  throw new MethodNotAllowedException();
		  }else{
			  if($this->Ordenante->delete($id)){
				  $this->Session->setFlash('Registro eliminado');
				  $this->redirect('index');
				  }
			  
			  }
	  }
 
  public function exce(){
   
          
          if(!empty($this->data)) 
           {
			  
        	   if( $this->data['Ordenante']['archivo']['error'] == 0 &&  $this->data['Ordenante']['archivo']['size'] > 0)
             {
				 $archivo=$this->data['Ordenante']['archivo'];
				  //Informacion del tipo de archivo subido $this->data['Juzgado']['archivo']['type']
                  $destino = WWW_ROOT.'documentos'.DS.'Ordenantes'.DS;
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
							
				$cabezera=array("nit","nombre","direccion","telefonos","email","empresa"); 
				foreach($data as $dato)
				{	
					if($dato[0]!=null && $dato[1]!=null):
					$dato[6]=$this->Auth->user('empresa');
					$info=array_combine($cabezera,$dato);
					$ase=array("Ordenante" =>$info); 
					$this->Ordenante->create();
				    $this->Ordenante->save($ase);
					endif;
			        
				}
			        $this->redirect('index');
			  }
	  }
}
?>