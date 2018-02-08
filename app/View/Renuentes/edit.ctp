

<div class="container view-add-etapa">

     <h4> <?= __('Editar Etapa Tramite y Juzgamiento') ?></h4>
    
    <div class="six columns columnscenter">
    
     <?=  $this->Form->create('Etapa4', array('url'=>$this->Html->url(array('controller'=>'Renuentes', 'action'=>'edit/'.$etapa['Etapa4']['id'])))) ?>
     
        <?= $this->Form->input('id_proceso', array('type' => 'hidden', 'value' => $proceso)) ?>
        
        <ul>
 	        <li> <?= $this->Form->input('fecha', array('class' => 'required', 'id' => 'datepicker', 'value' => $etapa['Etapa4']['fecha'],'label'=>false)) ?> </li>

            <li> <?= $this->Form->input('pprobatorio', array('label' => false,'type' => 'select', 'options' => array('SI' => 'SI', 'NO' => 'NO'), 'empty' => '<< Abre periodo probatorio y decreta pruebas >>', 'value' => $etapa['Etapa4']['pprobatorio'])) ?></li>

             <li> <?= $this->Form->input('ppendientes', array('label' => false,'type' => 'select', 'options' => array('SI' => 'SI', 'NO' => 'NO') , 'empty' => '<< Pruebas pendientes por practicar >>','value' => $etapa['Etapa4']['ppendientes'])) ?></li>

             <li> <?= $this->Form->input('cierre_per', array('label' =>false,'type' => 'select', 'options' => array('SI' => 'SI', 'NO' => 'NO') , 'empty' => '<< Cierre periodo probatorio >>','value' => $etapa['Etapa4']['cierre_per'])) ?></li>

             <li> <?= $this->Form->input('alegatos', array('label' => false,'type' => 'select', 'options' => array('SI' => 'SI', 'NO' => 'NO') , 'empty' => '<< Alegatos >>','value' => $etapa['Etapa4']['alegatos'])) ?></li>

             <li> <?= $this->Form->input('sentencia', array('label' => false,'type' => 'select', 'options' => array('SI' => 'SI', 'NO' => 'NO') , 'empty' => '<<Sentencia condenatoria >>','value' => $etapa['Etapa4']['sentencia'])) ?></li>
             <label>Fecha Juzgamiento </label>
 	        <li> <?= $this->Form->input('fecha_juz', array('class' => 'required', 'id' => 'datepicker2', 'value' => $etapa['Etapa4']['fecha_juz'],'label'=>false)) ?> </li>

            <li> <?= $this->Form->input('observaciones', array('value' => $etapa['Etapa4']['observaciones'],'label'=>false,'placeholder'=>'observaciones')) ?> </li>
        </ul>
        <?php echo $this->Form->end('Guardar Datos'); ?>
   </div>
   
    
</div>
