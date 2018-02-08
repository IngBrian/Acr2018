<div class="container">

    
        <?=  $this->Form->create('Juzgado', ['action' => 'edit','class'=>'form-horizontal']) ?>
        
        <div class="col-sm-7">

             <?= $this->Form->input('codigo', array('class' => 'required', 'value' => $juzgado[0]['Juzgado']['codigo'],'placeholder'=>'Codigo','label'=>false,'class'=>'form-control')) ?>

             <?= $this->Form->input('nombre_juzgado', array('class' => 'required', 'value' => $juzgado[0]['Juzgado']['nombre_juzgado'],'placeholder'=>'Nombre','label'=>false,'class'=>'form-control')) ?> 

             <?= $this->Form->input('oficina',   array('class' => 'required', 'value' => $juzgado[0]['Juzgado']['oficina'],'placeholder'=>'Oficina','label'=>false,'class'=>'form-control')) ?> 

             <?= $this->Form->input('id',   array('class' => 'required', 'type' => 'hidden', 'value' => $juzgado[0]['Juzgado']['id'])) ?> 
       
       		<?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?> 
   		</div>

</div>