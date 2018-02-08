<div class="container">

    <h4> <?= __('Editar Telefono') ?></h4>
    
    <div class="col-sm-7">
    
        <?= $this->Form->create('ClientesTelefono', [ 'url' =>['controller'=>'Telefonos',  'action' => 'edit'],'class'=>'form-horizontal']) ?>

  

             <?= $this->Form->input('id', array('type' => 'hidden', 'value' => $telefono['ClientesTelefono']['id']))?>

             <?= $this->Form->input('proceso_id', array('type' => 'hidden', 'value' => $telefono['ClientesTelefono']['proceso_id'],'class'=>'form-control'))?>

             <?= $this->Form->input('telefono', array('class' => 'required','label'=>false,'placeholder'=>'telefono', 'value' => $telefono['ClientesTelefono']['telefono'],'class'=>'form-control')) ?>

             <?= $this->Form->input('contacto', array('class' => 'required','label'=>false,'placeholder'=>'contacto', 'value' => $telefono['ClientesTelefono']['contacto'],'class'=>'form-control')) ?> 

             <?= $this->Form->input('parentesco_id', array('options' => $parentescos, 'type' => 'select', 'empty' => '<< Seleccione Parentesco >>', 'label' => false,  'value' => $telefono['ClientesTelefono']['parentesco_id'],'class'=>'form-control')) ?> 

             <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?> 
   </div>
     
</div>