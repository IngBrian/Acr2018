<div class="container">

   
        <?=  $this->Form->create('Tproceso',['class'=>'form-horizontal']) ?>
        
             <?= $this->Form->hidden('empresa', array('hiddenField' => 'true','value'=> $user['empresa'], 'class' => 'short-text')) ?>
        <div class="col-sm-7">
			 <?= $this->Form->input('nombre', array('class' => 'required','placeholder'=>'Nombre','label'=>false,'class'=>'form-control')) ?> 

			 <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?> 
		
		</div>	 
        
        
   
</div>
