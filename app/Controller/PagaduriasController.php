<?php
//App::uses('CakeEmail', 'Network/Email');
class PagaduriasController extends AppController {
    


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
        'order' => array('Pagaduria.nombre' =>  'asc'),
        'conditions'=>array('Pagaduria.empresa'=>$this->Auth->user('empresa')),
        'limit' => 10
    );
    $pagadurias = $this->Paginator->paginate('Pagaduria');
    $this->set(compact('pagadurias'));
    


    }
   public function search(){
        
      $valor=$this->request->data['Pagaduria']['valor'];
      $empresa=$this->Auth->user('empresa');
      $criterio=$this->request->data['Pagaduria']['criterio'];      
     
     
      $this->paginate = array(
            'order' => array('Pagaduria.id' =>  'asc'),
            'conditions'=>array('Pagaduria.empresa'=>$this->Auth->user('empresa')),
            'limit' => 10
        );
        $pagadurias = $this->paginate();
        $this->set(compact('pagadurias'));


      if($valor !=null and $criterio!=null):  
        $this->paginate = array(
            'order' => array('Pagaduria.id' =>  'asc'),
            'conditions'=>array('Pagaduria.'.$criterio.' LIKE'=>'%'.$valor.'%','Pagaduria.empresa'=>$empresa),
            'limit' => 10
        );
      $pagadurias=$this->paginate();     
      $this->set(compact('pagadurias'));
      endif;

        $this->render('index');
    }
   public function add(){
        
       // $this->loadData();
        
        if(!empty($this->data)) {
        	$this->Pagaduria->id = $this->Session->read['Auth.User.Permiso.id_demandante'];
            if($this->Pagaduria->save($this->data)) {
                    $this->redirect('index');
            }
	}
    }
   
  public function edit($id = NULL){
        $empresa=$this->Auth->user('empresa');
        $this->Pagaduria->id = $id;
        if (empty($this->data)) {
            $pagaduria = $this->Pagaduria->find('all', array('conditions' => array('Pagaduria.id' => $id,'Pagaduria.empresa'=>$empresa)));
            $this->set('pagaduria', $pagaduria);
          
        } else {
            if ($this->Pagaduria->save($this->data)) {
                $this->Session->setFlash('Pagaduria Editada');
                $this->redirect('index');
            }
        }
    }
  public function delete($id){
	  if($this->request->is('get')){
		  throw new MethodNotAllowedException();
		  }else{
			  if($this->Pagaduria->delete($id)){
				  $this->Session->setFlash('Registro  eliminada');
				  $this->redirect(array('action'=>'index'));
				  }
			  
			  }
	  }
 
  public function exce(){
          
          if(!empty($this->data)) 
           {
			  
        	   if( $this->data['Pagaduria']['archivo']['error'] == 0 &&  $this->data['Pagaduria']['archivo']['size'] > 0)
             {
				     $archivo=$this->data['Pagaduria']['archivo'];
				     //Informacion del tipo de archivo subido $this->data['Juzgado']['archivo']['type']
                  $destino = WWW_ROOT.'documentos'.DS.'Pagadurias'.DS;
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
				//print_r($data);
				foreach($data as $dato)
				{	
					if($dato[0]!=null ):
					$dato[1]=$this->Auth->user('empresa');
					$info=array_combine($cabezera,$dato);
					$pag=array("Pagaduria" =>$info); 
					$this->Pagaduria->create();
				    $this->Pagaduria->save($pag);
					endif;
				}
			        unlink($destino.$archivo['name']);
					$this->redirect('index');
			  }
	  }
}
?>
