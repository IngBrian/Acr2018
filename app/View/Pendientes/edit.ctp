<div class="container">

   
        <?=  $this->Form->create('Pendiente', ['action' => 'edit','class'=>'form-horizontal']) ?>
        
        <div class="col-sm-7">
             <?= $this->Form->input('nombre', array('class' => 'required', 'value' => $pendientes[0]['Pendiente']['nombre'],'placeholder'=>'Nombre','label'=>false,'class'=>'form-control')) ?> 
             
             <?= $this->Form->input('id',   array('class' => 'required', 'type' => 'hidden', 'value' => $pendientes[0]['Pendiente']['id'])) ?> 
       
        	 <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?>
        </div>
   
</div>