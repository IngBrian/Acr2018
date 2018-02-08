<?php
App::uses('CakeEmail', 'Network/Email');

class JuzgadosController extends AppController {
    

    
   public $components = array('Paginator');

   public function beforeFilter() {
      parent::beforeFilter();
      
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

    if (in_array($this->action, array('add','exce','delete','edit'))) {
        if ($user['role']=='administrator') {
            return true;
            }
    }


    return parent::isAuthorized($user);
   }

   
 
    public function loadData(){
        $departamentos = $this->Departamento->find('list');
        $this->set('departamentos', $departamentos);
        $this->set('municipios', null);
    }
    
   public function index() {
    
    $this->Paginator->settings = array(
        
        'conditions'=>array('Juzgado.empresa' => $this->Auth->user('empresa')),
        'order' => array('Juzgado.nombre_juzgado' =>  'asc'),
        'limit' => 10
        );
    $juzgados = $this->Paginator->paginate('Juzgado');
     $this->set(compact('juzgados'));
  
       
    }
   public function search(){
        
      $valor=$this->request->data['Juzgado']['valor'];
      $empresa=$this->Auth->user('empresa');
      $criterio=$this->request->data['Juzgado']['criterio'];      
     
     
      $this->paginate = array(
            'order' => array('Juzgado.id' =>  'asc'),
            'conditions'=>array('Juzgado.empresa'=>$this->Auth->user('empresa')),
            'limit' => 10
        );
        $juzgados = $this->paginate();
        $this->set(compact('juzgados'));


      if($valor !=null and $criterio!=null):  
        $this->paginate = array(
            'order' => array('Juzgado.id' =>  'asc'),
            'conditions'=>array('Juzgado.'.$criterio.' LIKE'=>'%'.$valor.'%','Juzgado.empresa'=>$empresa),
            'limit' => 10  
        );
      $juzgados=$this->paginate();     
      $this->set(compact('juzgados'));
      endif;

        $this->render('index');
    }
   public function add(){
        
       // $this->loadData();
        
        if(!empty($this->data)) {
        	 if($this->Juzgado->save($this->data)) {
                    $this->redirect('index');
            }
	}
    }
   
  public function edit($id = NULL){
        
        $empresa=$this->Auth->user('empresa');
        $this->Juzgado->id = $id;
        if (empty($this->data)) {
            $juzgado = $this->Juzgado->find('all', array('conditions' => array('Juzgado.id' => $id,'Juzgado.empresa'=>$empresa)));
            $this->set('juzgado', $juzgado);
          
        } else {
            if ($this->Juzgado->save($this->data)) {
                $this->Session->setFlash('Juzgado Editado');
                $this->redirect('index');
            }
        }
    }
  public function delete($id){
	  if($this->request->is('get')){
		  throw new MethodNotAllowedException();
		  }else{
			  if($this->Juzgado->delete($id)){
				  $this->Session->setFlash('Registro eliminado');
				  $this->redirect(array('action'=>'index'));
				  }
			  
			  }
	  }
 
  public function exce(){
          
          if(!empty($this->data)) 
           {
			     
        	   if( $this->data['Juzgado']['archivo']['error'] == 0 &&  $this->data['Juzgado']['archivo']['size'] > 0)
             {
				     $archivo=$this->data['Juzgado']['archivo'];
				     //Informacion del tipo de archivo subido $this->data['Juzgado']['archivo']['type']
                  $destino = WWW_ROOT.'documentos'.DS.'Juzgados'.DS;
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
							
				$cabezera=array("codigo","nombre_juzgado","oficina","empresa"); 
				foreach($data as $dato)
				{	
					if($dato[0]!=null && $dato[1]!=null && $dato [2]!=null):
					$dato[3]=$this->Auth->user('empresa');
					$info=array_combine($cabezera,$dato);
					$juz=array("Juzgado" =>$info); 
					$this->Juzgado->create();
				    $this->Juzgado->save($juz);
					endif;
				}
					if(file_exists($destino.$archivo['name'])){ unlink($destino.$archivo['name']); }
			        $this->redirect('index');
			  }
	  }
}
?>
