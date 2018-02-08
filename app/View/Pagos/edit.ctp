<div class="container">

    <h4> <?= __('Editar Pago') ?></h4>
    
    
    
     <?=  $this->Form->create('Pago', array('url'=>$this->Html->url(array('controller'=>'Pagos', 'action'=>'edit',$pago['Pago']['id'],'class'=>'form-horizontal')))) ?>
     
        <?= $this->Form->input('id_proceso', array('type' => 'hidden', 'value' => $proceso)) ?>
          
        <div class="col-sm-7">
        
            <?= $this->Form->date('fecha_pago', array('label'=>false,'value'=>$pago['Pago']['fecha_pago'],'class'=>'form-control')) ?>

           <?= $this->Form->input('pago_capital', array('class'=>'form-control', 'placeholder' => 'Pago Capital','label'=>false,'value'=>$pago['Pago']['pago_capital'])) ?>
           
           <?= $this->Form->input('pago_intereses', array('class'=>'form-control', 'placeholder' => 'Pago intereses','label'=>false,'value'=>$pago['Pago']['pago_intereses'])) ?>
           
           <?= $this->Form->input('otros_pagos', array('class'=>'form-control', 'placeholder' => 'otros Pagos','label'=>false,'value'=>$pago['Pago']['otros_pagos'])) ?>
           
           <?= $this->Form->input('valor', array('class'=>'form-control', 'placeholder' => 'valor','label'=>false,'value'=>$pago['Pago']['valor'])) ?>
           
           <?= $this->Form->input('PathFile', array('type' => 'hidden', 'value' => '')) ?>
           <?= $this->Form->input('tipo', array('type' => 'hidden', 'value' => 'p')) ?>
           <?= $this->Form->input('cancelado', array('type' => 'hidden', 'value' => 's')) ?>
           
            <?= $this->Form->input('observa',array('label'=>false,'placeholder'=>'observaciones','value'=>$pago['Pago']['observa'],'class'=>'form-control','type'=>'textarea')) ?> 
        
        
           <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?>
   </div>
   
    
</div>