<div class="container view-add-etapa">
<h4> <?= __('Nueva Medidas cautelares') ?></h4>
       
    <div class="six columns columnscenter">
    
     <?=  $this->Form->create('Etapa2') ?>
     
        <?= $this->Form->input('id_proceso', array('type' => 'hidden', 'value' => $proceso)) ?>
        
        <ul>
            <li> <?= $this->Form->input('fecha', array('class' => 'required', 'id' => 'datepicker','label'=>false)) ?></li>

            
            <li> <?= $this->Form->input('propietario', array('label' => false,'type' => 'select', 'class' => 'required', 'options' => array('SI' => 'SI', 'NO' => 'NO'), 'empty' => '<< Se Aporto Poliza Judicial >>')) ?> </li>

            
            <li> <?= $this->Form->input('arrendatario', array('label' => false,'type' => 'select', 'class' => 'required', 'options' => array('SI' => 'SI', 'NO' => 'NO'), 'empty' => '<< Decretaron Medidas >>')) ?> </li>

            <li> <?= $this->Form->input('observaciones',array('placeholder'=>'observaciones','label'=>false)) ?> </li>
        </ul>
        
        <?php echo $this->Form->end('Guardar Datos'); ?>
   </div>
   
    
</div>
