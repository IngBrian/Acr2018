

<div class="container view-add-etapa">

<h4> <?= __('Editar Medidas Cautelares') ?></h4>

    <div class="six columns columnscenter">
    
     <?=  $this->Form->create('Etapa2', array('url'=>$this->Html->url(array('controller'=>'DeudaPropietarios', 'action'=>'edit/'.$etapa['Etapa2']['id'])))) ?>
     
        <?= $this->Form->input('id_proceso', array('type' => 'hidden', 'value' => $proceso)) ?>
        
         <ul>
            <li> <?= $this->Form->input('fecha', array('class' => 'required','label'=>false, 'id' => 'datepicker', 'value' => $etapa['Etapa2']['fecha'])) ?></li>
           <li> <?= $this->Form->input('propietario', array('label' =>false ,'type' => 'select', 'class' => 'required', 'options' => array('SI' => 'SI', 'NO' => 'NO'), 'empty' => '<< Se Aporto Poliza Judicial >>', 'value' => $etapa['Etapa2']['propietario'])) ?> </li>
            <li> <?= $this->Form->input('arrendatario', array('label' => false,'type' => 'select', 'class' => 'required', 'options' => array('SI' => 'SI', 'NO' => 'NO'), 'empty' => '<< Decretaron Medidas >>', 'value' => $etapa['Etapa2']['arrendatario'])) ?> </li>
            <li> <?= $this->Form->input('observaciones', array('value' => $etapa['Etapa2']['observaciones'],'label'=>false,'placeholder'=>'observaciones')) ?> </li>
        </ul>

        
        <?php echo $this->Form->end('Guardar Datos'); ?>
   </div>
   
    
</div>
