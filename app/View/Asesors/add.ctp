<div class="container">

   
        <?=  $this->Form->create('Asesor',['class'=>'form-horizontal']) ?>
        
             <?= $this->Form->hidden('empresa', array('hiddenField' => 'true','value'=> $user['empresa'], 'class' => 'short-text')) ?>
        
        <div class="col-sm-7">

			 <?= $this->Form->input('cedula', array('class' => 'required','placeholder'=>'Identificacion','label'=>false,'class'=>'form-control')) ?>

             <?= $this->Form->input('nombre', array('class' => 'required','placeholder'=>'Nombre','label'=>false,'class'=>'form-control')) ?> 

             <?= $this->Form->input('direcion',array('placeholder'=>'Direccion','label'=>false,'class'=>'form-control')) ?> 

             <?= $this->Form->input('telefono',array('placeholder'=>'Telefonos','label'=>false,'class'=>'form-control')) ?>

             <?= $this->Form->input('email',array('placeholder'=>'Email','label'=>false,'class'=>'form-control')) ?> 
        
             <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?> 
        </div> 
   
</div>
