<?php

class PagosController extends AppController {
 
   var $uses = array('Pago','Logpago','Prejuridico'); 

   public function isAuthorized($user) {
    // todos los visitantes ven el index
       
    

    
    if (in_array($this->action, array('add'))) {
        if ($user['role']=='registrado') {
            return true;
            }
    }


    
    if (in_array($this->action, array('add','delete'))) {
        if ($user['role']=='director') {
            return true;
            }
    }

    if (in_array($this->action, array('add','delete'))) {
        if ($user['role']=='administrator') {
            return true;
            }
    }


    return parent::isAuthorized($user);
}
	
	public function add($id=null){

		
		if(!empty($this->data)){
            if($this->Pago->save($this->data)){
                
                $prejuridico=$this->Prejuridico->find('first',array('conditions' =>array('Prejuridico.id'=>$id)));

                $user=$this->Auth->user();
                $logpago['proceso_id']=$this->data['Pago']['idproceso'];
                $logpago['fecha_pago']=$this->data['Pago']['fecha_pago'];
                $logpago['pago_capital']=$this->data['Pago']['pago_capital'];
                $logpago['pago_interes']=$this->data['Pago']['pago_intereses'];
                $logpago['otros_pagos']=$this->data['Pago']['otros_pagos'];
                $logpago['valor']=$this->data['Pago']['valor'];
                $logpago['observacion']=$this->data['Pago']['observa'];
                $logpago['usuario_id']=$user['id'];

                //Aca vamos a bajar el saldo a el proceso.
                $prejuridico['Prejuridico']['saldo_int']=$prejuridico['Prejuridico']['saldo_int']-$this->data['Pago']['pago_capital'];

                    if($this->Prejuridico->save($prejuridico)):
                    $this->Logpago->save($logpago);
                   // $this->redirect(array('controller' => 'Prejuridicos', 'action' => 'index'));
                    $this->redirect(array('controller' => 'Prejuridicos', 'action' => 'view',$id));
                    endif;
            }

        }else{
            
                $this->set('proceso', $id);
            
        }   
		
	}
	
	public function edit($id = NULL){
		
		$this->Pago->id = $id;
		
        if (empty($this->data)) {
            
        	if(isset($id)){
                $this->set('proceso', $id);

            }
            
            $pago = $this->Pago->find('all', array('conditions' => array('Pago.idproceso' => $id)));
            //var_dump($pago[0]);exit;
            $this->set('pago', $pago[0]);
        } else {
        	
             if($this->Pago->save($this->data)){
                //$this->redirect(array('controller' => 'Pagos', 'action' => 'index'));
           	   $this->redirect(array('controller' => 'Pagos', 'action' => 'view/'.$this->data['Pago']['id_proceso']));
            }
        }
		
	}
	
	public function delete($id = NULL,$proceso=null){
        
		$prejuridico=$this->Prejuridico->find('first',array('conditions' =>array('Prejuridico.id'=>$proceso)));
        $pago=$this->Pago->find('first',array('conditions' =>array('Pago.id'=>$id)));
        $prejuridico['Prejuridico']['saldo_int']=$prejuridico['Prejuridico']['saldo_int']+$pago['Pago']['pago_capital'];

		if($this->Pago->delete($id)){
            $this->Prejuridico->save($prejuridico);
            //$this->redirect(array('controller' => 'Prejuridicos', 'action' => 'index'));
			$this->redirect(array('controller' => 'Prejuridicos', 'action' => 'view/',$proceso));
		}
		
	}
   
}

?>
