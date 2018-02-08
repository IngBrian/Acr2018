<div class="container">

    
        <?=  $this->Form->create('Tproceso', ['action' => 'edit','class'=>'form-horizontal']) ?>
        
        <div class="col-sm-7">
            <?= $this->Form->input('nombre', array('class' => 'required', 'value' => $tproceso[0]['Tproceso']['nombre'],'placeholder'=>'Nombre','label'=>false,'class'=>'form-control')) ?> 

            <?= $this->Form->input('id',   array('class' => 'required', 'type' => 'hidden', 'value' => $tproceso[0]['Tproceso']['id'])) ?> 
      
        	<?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?> 
   		
   		</div>
</div>