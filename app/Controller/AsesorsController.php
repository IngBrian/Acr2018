<?php  

App::uses('CakeEmail', 'Network/Email');

class AsesorsController extends AppController {
    

    var $uses = array('Asesor'); 


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

   
   
 
   public function index() {
        
    	$this->paginate = array(
            'order' => array('Asesor.nombre' =>  'asc'),
            'conditions'=>array('Asesor.empresa'=>$this->Auth->user('empresa')),
            'limit' => 10
        );
        $asesores = $this->paginate();
        $this->set(compact('asesores'));


    }

    
   public function search(){

      $valor=$this->request->data['Asesor']['valor'];
      $empresa=$this->Auth->user('empresa');
      $criterio=$this->request->data['Asesor']['criterio'];      
     
     
      $this->paginate = array(
            'order' => array('Asesor.id' =>  'asc'),
            'conditions'=>array('Asesor.empresa'=>$this->Auth->user('empresa')),
            'limit' => 10
        );
        $asesores = $this->paginate();
        $this->set(compact('asesores'));


      if($valor !=null and $criterio!=null):  
        $this->paginate = array(
            'order' => array('Asesor.id' =>  'asc'),
            'conditions'=>array('Asesor.'.$criterio.' LIKE'=>'%'.$valor.'%','Asesor.empresa'=>$empresa),
            'limit' => 10
        );
      $asesores=$this->paginate();     
      $this->set(compact('asesores'));
      endif;

        $this->render('index');
      
      
    }

   public function add(){
        
       // $this->loadData();
          if(!empty($this->data)) {
        	  if($this->Asesor->save($this->data)) {
            $this->redirect('index');
          }
	}
    }
   
  public function edit($id = NULL){
        
        $empresa=$this->Auth->user('empresa');
        $this->Asesor->id = $id;
        if (empty($this->data)) {
            $asesor = $this->Asesor->find('all', array('conditions' => array('Asesor.id' => $id,'Asesor.empresa'=>$empresa)));
            $this->set('asesor', $asesor);
          
        } else {
            if ($this->Asesor->save($this->data)) {
                $this->Session->setFlash('Asesor Editado.');
                $this->redirect('index');
            }
        }
    }
  public function delete($id){
	  if($this->request->is('get')){
		  throw new MethodNotAllowedException();
		  }else{
			  if($this->Asesor->delete($id)){
				  $this->Session->setFlash('Registro eliminado');
				  $this->redirect('index');
				  }
			  
			  }
	  }
 
  public function exce(){
          
          if(!empty($this->data)) 
           {
			  $this->Asesor->id = $this->Session->read['Auth.User.Permiso.id_demandante'];
        	   if( $this->data['Asesor']['archivo']['error'] == 0 &&  $this->data['Asesor']['archivo']['size'] > 0)
             {
				 $archivo=$this->data['Asesor']['archivo'];
				  //Informacion del tipo de archivo subido $this->data['Juzgado']['archivo']['type']
                  $destino = WWW_ROOT.'files'.DS.'excel'.DS;
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
							
				$cabezera=array("cedula","nombre","direcion","telefono","email","empresa"); 
				foreach($data as $dato)
				{	
					if($dato[0]!=null && $dato[1]!=null):
					$dato[6]=$this->Session->read('Auth.User.empresa');
					$info=array_combine($cabezera,$dato);
					$ase=array("Asesor" =>$info); 
					$this->Asesor->create();
				  $this->Asesor->save($ase);
					endif;
			        				 			     
				}
			        if(file_exists($destino.$archivo['name'])){ unlink($destino.$archivo['name']); }
					$this->redirect('index');
			  }
	  }
}
?>
