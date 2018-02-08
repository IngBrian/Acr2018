<div class="container">

   
        <?=  $this->Form->create('PrejuridicoSubestado', array('action' => 'edit','class'=>'form-horizontal')) ?>
     
        <div class="col-sm-7">
        <?= $this->Form->input('id', array('class' => 'required', 'type' => 'hidden', 'value' => $prejuridicoSubestado["PrejuridicoSubestado"]['id'],'class'=>'form-control')) ?> 

        <?= $this->Form->input('proceso_id', array('type' => 'hidden', 'value' => $prejuridicoSubestado["PrejuridicoSubestado"]['proceso_id'])) ?>

        

        
        
        
           <?= $this->Form->date('fecha', array('class'=>'form-control', 'id' => 'datepicker', 'value' => $prejuridicoSubestado["PrejuridicoSubestado"]['fecha'],'label'=>false)) ?> 

            <?= $this->Form->input('subestado_id', array('options'=> $subestados, 
                                                              'type' => 'select', 
                                                              'empty' => '<< Seleccione >>', 
                                                              'label' => false, 
                                                              'class' => 'form-control', 
                                                              'id' => 'subestado_id',
                                                              'value' => $prejuridicoSubestado["PrejuridicoSubestado"]['subestado_id']
                                                              )
                                                              ) ?>
            
             <?= $this->Form->input('observaciones', array('value' => $prejuridicoSubestado["PrejuridicoSubestado"]['observaciones'],'label'=>false,'class'=>'form-control')) ?> 
        
        
             <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?> 
     
    
</div>
</div>
