

<div class="container view-add-etapa">

    <h4> <?= __('Editar Etapa Terminacion') ?></h4>
    
    <div class="six columns columnscenter">
    
     <?=  $this->Form->create('Etapa6', array('url'=>$this->Html->url(array('controller'=>'Juridicos', 'action'=>'edit/'.$etapa['Etapa6']['id'])))) ?>
     
        <?= $this->Form->input('id_proceso', array('type' => 'hidden', 'value' => $proceso)) ?>
        
        <ul>
            <li> <?= $this->Form->input('fecha', array('class' => 'required', 'id' => 'datepicker', 'value' => $etapa['Etapa6']['fecha'],'label'=>false)) ?> </li>
            <li> <?= $this->Form->input('observaciones', array('value' => $etapa['Etapa6']['observaciones'],'label'=>false,'placeholder'=>'observaciones')) ?> </li>
        </ul>
        
        <?php echo $this->Form->end('Guardar Datos'); ?>
   </div>
   
    
</div>
