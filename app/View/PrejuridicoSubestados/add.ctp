<?php
//var_dump($subestados);exit;
?>
<div class="container">


    
     <?= $this->Form->create('PrejuridicoSubestado',['class'=>'form-horizontal']) ?>
     
        <?= $this->Form->input('proceso_id', array('type' => 'hidden', 'value' => $id)) ?>
        
             <div class="col-sm-7">
 	            <?= $this->Form->date('fecha', array('class' => 'required', 'id' => 'datepicker','label'=>false)) ?>

              <?= $this->Form->input('subestado_id', array('options'=> $subestados, 
                                                              'type' => 'select', 
                                                              'empty' => '<< Seleccione Etapa >>', 
                                                              'label' => false, 
                                                              'class' => 'form-control', 
                                                              'id' => 'subestado_id')
                                                              ) ?>
            
             <?= $this->Form->input('observaciones',array('placeholder'=>'Observaciones','label'=> false,'class'=>'form-control')) ?> 
        
        
            <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?> 
   
   </div>
    
</div>
