<?php
App::uses('CakeEmail', 'Network/Email');
class RecoveryPasswordsController extends AppController  {
 	var $uses = array('User','RecoveryPassword');
	var $helpers = array('Html', 'Form');
	public function recinfo(){
		$this->Session->write('URL',  $_SERVER[ 'REQUEST_URI' ]);
	    $ghs=$this->params['url']['ghs'];
		$divs=explode("!", $ghs); 
		$em=base64_decode($divs[1]); //."<br>";
		$this->set('em', $em);
		$this->layout = 'admin';
	}
    public function beforeFilter() {
        parent::beforeFilter();
        $this->loadData();
    }
	private function loadData(){ 
		$this->layout = 'admin'; 
	}
	public function redirinfo(){ }
	public function uppass(){
		$correo=$this->data['RecoveryPasswords']['em'];
		if($correo==""){
			$this->Session->setFlash('Usuario no valido');
			//$this->Session->write('URL',$this->here);
			$this->redirect($_SESSION['URL']);	
			exit;
		}
		if($this->data['RecoveryPasswords']['password']==""){
			$this->Session->setFlash('Debe indicar un password valido');
			//$this->Session->write('URL', $this->here);
			$this->redirect($_SESSION['URL']);	
			exit;
		}
		if($this->data['RecoveryPasswords']['password']!=$this->data['RecoveryPasswords']['password2']){
			$this->Session->setFlash('El password y su confirmación no coinciden');
			//$this->Session->write('URL', $this->here);
			$this->redirect($_SESSION['URL']);	
			exit;
		}
		$query="update tbusuarios set password='".md5($this->data['RecoveryPasswords']['password'])."' where email='".$this->data['RecoveryPasswords']['em']."'";
		$this->User->query($query);
		//Enviar notificacion
		$correo=$this->data['RecoveryPasswords']['em'];
		$cliente=DevolverCampo("tbusuarios","nombre_completo","email",$correo,2);
		$user=DevolverCampo("tbusuarios","username","email",$correo,2);
		//$id=DevolverCampo("tbusuarios","id","email",$correo,2);
		if(!empty($correo)){
		   		$email = new CakeEmail();
				$email->template('confirmacion_recuperacion')
				     ->emailFormat('html')
				     ->to($correo)
				     ->from('sistemas@oficinajuridica.info')
				     ->subject('Password Actualizado -OficinaJuridica.info')
				     ->viewVars( array('cliente' => $cliente,'correo' => $correo,'user' => $user))
				     ->send();   
		 }	 
		//Fin de enviar notificacion
		$this->Session->setFlash('Password actualizado satisfactoriamente, se le ha enviado a su e-mail una confirmación de este proceso. Gracias','exito');
		$this->redirect('http://www.oficinajuridica.info');
		exit;
	}
}

?>
