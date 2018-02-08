<!-- src/Template/Users/add.ctp -->
<div class="container">
   
	
	<?= $this->Form->create(null,array('action' => 'reset_password_token', 'id' => 'web-form')) ?>
       
           <div class="col-sm-7"> 
           <h2> Cambio  de Password</h2>
		   
           <?= $this->Form->input('User.reset_password_token',array( 'type' => 'hidden')) ?>
           <?= $this->Form->input('User.password',array( 'type' => 'hidden')) ?>
           <?= $this->Form->input('User.token_created_at',array( 'type' => 'hidden')) ?>
             
    	    <?= $this->Form->input('User.new_passwd',array('placeholder'=>'password','class'=>'form-control','type' => 'password', 'label' => 'Ingrese una nueva  contraseña', 'between' => '<br />', 'type' => 'password')) ?>
		
            <?= $this->Form->input('User.confirm_passwd',array('placeholder'=>'Confirm Password','class'=>'form-control','type' => 'password', 'label' => 'Repita la nueva  contraseña', 'between' => '<br />', 'type' => 'password')) ?>

            <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Cambiar Password']) ?> 
    </div>
</div>

