<!-- src/Template/Users/add.ctp -->
<div class="container">
   <?php echo $this->Form->create(null, array('action' => 'forgot_password', 'id' => 'web-form')); ?>
       
           <div class="col-sm-7"> 
           <h2> Recuperar  Password</h2>
		   <p>
			 Indique el usuario , le estaremos enviando los procedimientos para efectuar la recuperacion del password a su correo. gracias
		   </p>  
           
    	   <?php echo $this->Form->input('User.username', array('label' => 'Username', 'between'=>'<br />', 'type'=>'text','class'=>'form-control')); ?>

            <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Enviar']) ?> 
    </div>
</div>