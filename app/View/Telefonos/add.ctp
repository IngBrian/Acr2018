<div class="container">
   
    <h4> <?= __('Registrar Nuevo Telefono') ?></h4>
        
     <div class="col-sm-7">
    
        <?=  $this->Form->create('ClientesTelefono',['class'=>'form-horizontal']) ?>
            
             <?= $this->Form->input('proceso_id', array('type' => 'hidden', 'value' => $id)) ?>
             
             <?= $this->Form->input('telefono', array('class' => 'form-control','label'=>false,'placeholder'=>'Telefono')) ?>
             
             <?= $this->Form->input('contacto', array('class' => 'form-control','label'=>false,'placeholder'=>'Contacto')) ?> 
            
                   
             <?= $this->Form->input('parentesco_id', array('options' => $parentescos, 'type' => 'select', 'empty' => '<< Seleccione Parentesco >>', 'label' => false, 'class' => 'form-control')) ?> 
            
              
            <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?>
   </div>
     
</div>