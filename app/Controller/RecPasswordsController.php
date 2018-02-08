<?php
App::uses('CakeEmail', 'Network/Email');
class RecPasswordsController extends AppController  {
 	//var $uses = array('RecPassword');
	public function recordar(){
		$correo=$this->data['RecPassword']['correo'];
		$cliente=DevolverCampo("tbusuarios","nombre_completo","email",$correo,2);
		$user=DevolverCampo("tbusuarios","username","email",$correo,2);
		//$id=DevolverCampo("tbusuarios","id","email",$correo,2);
		if(!empty($correo)){
		   		$email = new CakeEmail();
				$email->template('recordar')
				     ->emailFormat('html')
				     ->to($correo)
				     ->from('sistemas@oficinajuridica.info')
				     ->subject('Recuperacion de Password - OficinaJuridica.info')
				     ->viewVars( array('cliente' => $cliente,'correo' => $correo,'user' => $user))
				     ->send();   
			     $this->Session->setFlash('La información de recuperación de contraseña, ha sido enviada a su e-mail.','exito');
			    $this->redirect(array('controller' => 'Users', 'action' => 'login'));
		 } else {
			 $this->Session->setFlash('Debe ingresar el e-mail de registro, para recuperación de password.');
			 $this->redirect(array('controller' => 'Users', 'action' => 'login'));
		 }	 
		exit;
	}
}

?>
