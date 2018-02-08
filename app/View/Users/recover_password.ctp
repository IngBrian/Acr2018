<!-- src/Template/Users/add.ctp -->
<div class="container">
   
	
	<?= $this->Form->create($user,['class'=>'form-horizontal']) ?>
       
           <div class="col-sm-7"> 
           <h2> Recordar Password</h2>
		   <p>
			 Indique la direccion de correo que utilizó en el momento  de registrarse en 
			 nuestro sistema, y de vuelta le estaremos enviando los procedimeientos para efectuar la recuperacion de password. gracias
		   </p>  
           
    	    <?= $this->Form->input('email',array('placeholder'=>'EMAIL','class'=>'form-control','label'=>false)) ?>

            <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Enviar']) ?> 
    </div>
</div>
