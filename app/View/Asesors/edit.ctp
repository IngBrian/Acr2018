<div class="container">
    
        <?=  $this->Form->create('Asesor', ['action' => 'edit','class'=>'form-horizontal']) ?>
        
        <div class="col-sm-7">

            <?= $this->Form->input('cedula', array('class' => 'required', 'value' => $asesor[0]['Asesor']['cedula'],'placeholder'=>'Identificacion','label'=>false,'class'=>'form-control')) ?>

            <?= $this->Form->input('nombre', array('class' => 'required', 'value' => $asesor[0]['Asesor']['nombre'],'placeholder'=>'Nombre','label'=>false,'class'=>'form-control')) ?> 

            <?= $this->Form->input('direcion', array( 'value' => $asesor[0]['Asesor']['direcion'],'placeholder'=>'Direccion','label'=>false,'class'=>'form-control')) ?> 

            <?= $this->Form->input('telefono', array( 'value' => $asesor[0]['Asesor']['telefono'],'placeholder'=>'Telefonos','label'=>false,'class'=>'form-control')) ?>

            <?= $this->Form->input('email', array('value' => $asesor[0]['Asesor']['email'],'placeholder'=>'Email','label'=>false,'class'=>'form-control')) ?> 
            
            <?= $this->Form->input('id',   array('class' => 'required', 'type' => 'hidden', 'value' => $asesor[0]['Asesor']['id'])) ?> 
    
       
            <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?> 
    </div> 
   
</div>