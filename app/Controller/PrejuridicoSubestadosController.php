<?php
App::import('Model', 'PrejuridicoSubestado');
App::import('Model', 'Subestado');

class PrejuridicoSubestadosController extends AppController {
    var $uses = array('Subestado', 'PrejuridicoSubestado','LogPrejuridicoSubestado','Prejuridico');
	
    public function beforeFilter() {
        parent::beforeFilter();
        $this->loadData();
    }
    
    private function loadData(){
    	$subestados = $this->Subestado->find('list', array('conditions' => array('Subestado.empresa'=> $this->Auth->user('empresa')))
    										);
    	$this->set('subestados', $subestados);
    }

     public function isAuthorized($user) {
    // todos los visitantes ven el index
       
    if ($this->action === 'index') {
        return true;
    }

    
    if (in_array($this->action, array('add','edit'))) {
        if ($user['role']=='registrado') {
            return true;
            }
    }


    
    if (in_array($this->action, array('add','edit'))) {
        if ($user['role']=='director') {
            return true;
            }
    }

    if (in_array($this->action, array('add','delete','edit'))) {
        if ($user['role']=='administrator') {
            return true;
            }
    }


    return parent::isAuthorized($user);
}

      
    
  
    public function add($id = null) {

		

    	if(!empty($this->data)) {
            
                //echo $id;exit;
                //echo "<PRE>"; var_dump($this->data);echo "</PRE>";exit;

            if($this->PrejuridicoSubestado->save($this->data)) {
                
                $logsubestado=array();
                
                /*
                $prejuridico=$this->Prejuridico->find('first',
                array('conditions'=>array('Prejuridico.id'=>$this->data['PrejuridicoSubestado']['proceso_id'])));
                $prejuridico['Prejuridico']['subestado_id']=$this->data['PrejuridicoSubestado']['subestado_id'];

                $this->Prejuridico->save($prejuridico);
                */
            
                $logsubestado['proceso_id']=$this->data['PrejuridicoSubestado']['proceso_id'];
                $logsubestado['fecha']=$this->data['PrejuridicoSubestado']['fecha'];
                $logsubestado['subestado_id']=$this->data['PrejuridicoSubestado']['subestado_id']; 
                $logsubestado['observaciones']=$this->data['PrejuridicoSubestado']['observaciones']; 
                $this->LogPrejuridicoSubestado->save($logsubestado);

                // $this->redirect(array('controller' => 'Prejuridicos', 'action' => 'index'));
                 $this->redirect(array('controller' => 'Prejuridicos', 'action' => 'view/'.$id));
            }
            
        } 

        $this->set('id',$id);
    }



    public function edit($id = NULL) {
        if (empty($this->data)) {
        	
            $this->set('proceso', $proceso);
            $prejuridicoSubestado = $this->PrejuridicoSubestado->find('first', array('conditions' => array('PrejuridicoSubestado.id' => $id)));
            // var_dump($prejuridicoSubestado);
            $this->set('prejuridicoSubestado', $prejuridicoSubestado);

        } else {
               //echo "<PRE>"; var_dump($this->data);echo "</PRE>";exit;
        	   

        	if ($this->PrejuridicoSubestado->save($this->data)) {
        		$id = $this->data['PrejuridicoSubestado']['proceso_id'];
                $logsubestado=array();
                $logsubestado['proceso_id']=$this->data['PrejuridicoSubestado']['proceso_id'];
                $logsubestado['fecha']=$this->data['PrejuridicoSubestado']['fecha'];
                $logsubestado['subestado_id']=$this->data['PrejuridicoSubestado']['subestado_id']; 
                $logsubestado['observaciones']=$this->data['PrejuridicoSubestado']['observaciones'];
                $this->LogPrejuridicoSubestado->save($logsubestado);

                //$this->redirect(array('controller' => 'Prejuridicos', 'action' => 'index'));
                $this->redirect(array('controller' => 'Prejuridicos', 'action' => 'view/'.$id));
        	}
        }
		
	}


        public function delete($id = NULL,$proceso=null) {
        //echo $id.'-'.$proceso;
        $prejuridicosubestado=$this->PrejuridicoSubestado->find('first',array(
                 'order'=>array('PrejuridicoSubestado.id' =>' DESC'),
                 'conditions'=>array('PrejuridicoSubestado.id'=>$id)
                 ));

        //echo "<PRE>"; var_dump($prejuridicosubestado); echo "</PRE>";exit;

        if($this->PrejuridicoSubestado->delete($id)){
            

            // $this->redirect(array('controller' => 'Prejuridicos', 'index'));
            $this->redirect(array('controller' => 'Prejuridicos', 'action' => 'view/'.$proceso));
        }
    }
    
}

?>