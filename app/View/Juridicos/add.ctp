

<div class="container view-add-etapa">

    <h4> <?= __('Nueva Etapa Terminacion') ?></h4>

    
    
    <div class="six columns columnscenter">
    
     <?=  $this->Form->create('Etapa6') ?>
     
        <?= $this->Form->input('id_proceso', array('type' => 'hidden', 'value' => $proceso)) ?>
        
        <ul>
            <li> <?= $this->Form->input('fecha', array('class' => 'required', 'id' => 'datepicker','label'=>false)) ?> </li>
            <li> <?= $this->Form->input('observaciones',array('label'=>false,'placeholder'=>'observaciones')) ?> </li>
        </ul>
        
        <?php echo $this->Form->end('Guardar Datos'); ?>
   </div>
   
    
</div>
