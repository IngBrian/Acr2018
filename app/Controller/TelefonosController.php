<?php

class TelefonosController extends AppController {
    
    var $uses = array('ClientesTelefono', 'Parentesco','Logclientestelefono');
    
    public function add($id=null){
        
        
         
        if(!empty($this->data)){
            
            
            if($this->ClientesTelefono->save($this->data)){
            
            $idx = $this->ClientesTelefono->id;
            $telefonolog=array();
            $telefonolog['telefono_id']=$idx;
            $telefonolog['proceso_id']=$this->data['ClientesTelefono']['proceso_id'];
            $telefonolog['telefono']=$this->data['ClientesTelefono']['telefono'];
            $telefonolog['contacto']=$this->data['ClientesTelefono']['contacto'];
            $telefonolog['parentesco_id']=$this->data['ClientesTelefono']['parentesco_id'];
            $telefonolog['fecha']=date("Y-m-d H:i:s"); 
            $bedit=array("Logclientestelefono" =>$telefonolog);
            
              $this->Logclientestelefono->save($bedit);
              //$this->redirect(array('controller' => 'Prejuridicos', 'action' => 'index'));
              $this->redirect(array('controller' => 'Prejuridicos', 'action' => 'view',$id));
            }
        }else{
            
            
            $this->set('id', $id);            
            $parentescos = $this->Parentesco->find('list', array('order' => array('name' => 'asc')));
            $this->set('parentescos', $parentescos);
            
        }   
    }
    
    public function edit($id = NULL){
        
        
        if (empty($this->data)) {	
            $parentescos = $this->Parentesco->find('list', array('order' => array('name' => 'asc')));
            $this->set('parentescos', $parentescos);

            $telefono = $this->ClientesTelefono->find('first', array('conditions' => array('ClientesTelefono.id' => $id)));
            $this->set('telefono', $telefono);
            
        } else {

            if ($this->ClientesTelefono->save($this->data)) {
                $proceso=$this->data['ClientesTelefono']['proceso_id'];
                $telefonolog=array();
                $idx = $this->ClientesTelefono->id;
                $telefonolog['telefono_id']=$idx;
                $telefonolog['proceso_id']=$this->data['ClientesTelefono']['proceso_id'];
                $telefonolog['telefono']=$this->data['ClientesTelefono']['telefono'];
                $telefonolog['contacto']=$this->data['ClientesTelefono']['contacto'];
                $telefonolog['parentesco_id']=$this->data['ClientesTelefono']['parentesco_id'];
                $telefonolog['fecha']=date("Y-m-d H:i:s"); 
                $bedit=array("Logclientestelefono" =>$telefonolog);
                

                $this->Logclientestelefono->save($bedit);
                // $this->redirect(array('controller' => 'Prejuridicos', 'action' => 'index'));
                $this->redirect(array('controller' => 'Prejuridicos', 'action' => 'view',$proceso));
            }
        }
    }
    
    public function delete($id=null,$proceso=null){
        if($this->ClientesTelefono->delete($id)){
             //$this->redirect(array('controller' => 'Prejuridicos', 'action' => 'index'));
             $this->redirect(array('controller' => 'Prejuridicos', 'action' => 'view',$proceso));
        }
    }
    
}

?>
