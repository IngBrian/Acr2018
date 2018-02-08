<div class="container">

   
        <?=  $this->Form->create('Juzgado',['class'=>'form-horizontal']) ?>
      
      	<div class="col-sm-7">
      	
             <?= $this->Form->input('codigo', array('class' => 'required','placeholder'=>'Codigo','label'=>false,'class'=>'form-control')) ?>

			 <?= $this->Form->hidden('empresa', array('hiddenField' => 'true','value'=> $user['empresa'], 'class' => 'short-text')) ?>

             <?= $this->Form->input('nombre_juzgado', array('class' => 'required', 'placeholder'=>'Nombre','label' => false,'class'=>'form-control')) ?>

             <?= $this->Form->input('oficina',   array('class' => 'required','placeholder'=>'Oficina','label'=>false,'class'=>'form-control')) ?> 
        
        <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?> 

   		</div>
</div>