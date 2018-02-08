

<div class="container view-add-etapa">

  <h4> <?= __('Nueva Etapa Tramite y Juzgamiento') ?></h4>
    
    <div class="six columns columnscenter">
    
     <?=  $this->Form->create('Etapa4') ?>
     
        <?= $this->Form->input('id_proceso', array('type' => 'hidden', 'value' => $proceso)) ?>
        
        <ul>
 	        <li> <?= $this->Form->input('fecha', array('label' => false,'class' => 'required', 'id' => 'datepicker')) ?> </li>
           
           
            <li> <?= $this->Form->input('pprobatorio', array('label' => false,'type' => 'select', 'options' => array('SI' => 'SI', 'NO' => 'NO') , 'empty' => '<< Abre periodo probatorio y decreta pruebas >>')) ?></li>
           
           
            <li> <?= $this->Form->input('ppendientes', array('label' => false,'type' => 'select', 'options' => array('SI' => 'SI', 'NO' => 'NO') , 'empty' => '<< Pruebas pendientes por practicar >>')) ?></li>
            
            
            <li> <?= $this->Form->input('cierre_per', array('label' => false,'type' => 'select', 'options' => array('SI' => 'SI', 'NO' => 'NO') , 'empty' => '<< Cierre periodo probatorio >>')) ?></li>
            
           
            <li> <?= $this->Form->input('alegatos', array('label' => false,'type' => 'select', 'options' => array('SI' => 'SI', 'NO' => 'NO') , 'empty' => '<< Alegatos >>')) ?></li>
           
            
            <li> <?= $this->Form->input('sentencia', array('label' => false,'type' => 'select', 'options' => array('SI' => 'SI', 'NO' => 'NO') , 'empty' => '<< Sentencia condenatoria >>')) ?></li>
 	       
            <label>Fecha Juzgamiento</label>
            <li> <?= $this->Form->input('fecha_juz', array('label' =>false,'class'=>'required', 'id' => 'datepicker2')) ?> </li>
           
            <li> <?= $this->Form->input('observaciones',array('label'=>false,'placeholder'=>'Observaciones')) ?> </li>
        </ul>
        
        <?php echo $this->Form->end('Guardar Datos'); ?>
   </div>
   
    
</div>
