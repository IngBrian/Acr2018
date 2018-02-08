<div class="container">

   
        <?=  $this->Form->create('Localidade', ['action' => 'edit','class'=>'form-horizontal']) ?>
        
        <div class="col-sm-7">
             <?= $this->Form->input('nombre', array('class' => 'required', 'value' => $localidades[0]['Localidade']['nombre'],'placeholder'=>'Nombre','label'=>false,'class'=>'form-control')) ?> 
             
             <?= $this->Form->input('id',   array('class' => 'required', 'type' => 'hidden', 'value' => $localidades[0]['Localidade']['id'])) ?> 
       
        	 <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?>
        </div>
   
</div>