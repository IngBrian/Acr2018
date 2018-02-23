<div class="container">
<?php echo $this->Form->create("Prejuridico" ,['class'=>'form-horizontal','action' => 'searchadv']);?> 
      <div class="col-sm-7">  

    
             <? echo $this->Form->input('ordenante_id', array('options'=> $ordenantes, 'type' => 'select', 'empty' => '<< Seleccione  Vendedor >>', 'label' =>false, 'id' => 'ordenante_criteria','placeholder'=>'Selecione Ordenante','class'=>'form-control')) ?>
              <? echo $this->Form->input('cliente_id', array('options'=> $cliente, 'type' => 'select', 'empty' => '<< Seleccione  Comprador >>', 'label' =>false, 'id' => 'cliente_criteria','placeholder'=>'Selecione Demandado','class'=>'form-control')) ?>
     
             <? echo $this->Form->input('abogado', array('options' => $asesores,'type' => 'select', 'empty' => '<< Seleccione Gestor >>', 'label' =>false,'id'=>'asesor_criteria','placeholder'=>'Seleccione Gestor','class'=>'form-control')) ?> 
         
             <?= $this->Form->input('tproceso_id', array('options' => $tprocesos, 'type' => 'select', 'empty' => '<< Seleccione Tipo de Negocio>>', 'label' => false, 'id' => 'tproceso','class'=>'form-control')) ?>
          
     
             <?= $this->Form->input('ubicacion_id', array('options' => $ubicaciones, 'type' => 'select', 'empty' => '<< Seleccione Ubicacion >>', 'label' => false, 'id' => 'ubicacion','class'=>'form-control')) ?> 
    
              <?= $this->Form->input('pagaduria_id', array('options' => $pagadurias, 'type' => 'select', 'empty' => '<< Seleccione Tipo de Propiedad >>', 'label' => false, 'id' => 'pagaduria','class'=>'form-control')) ?>
               <?= $this->Form->input('pendiente_id', array('options' => $pendientes, 'type' => 'select', 'empty' => '<< Seleccione Estado >>', 'label' => false, 'id' => 'pendiente','class'=>'form-control')) ?>
    
             <?= $this->Form->input('juzgado_id', array('options' => $juzgados, 'type' => 'select', 'empty' => '<< Seleccione Forma de pago >>', 'label' => false, 'id' => 'juzgado','class'=>'form-control')) ?>
    
             <? echo $this->Form->input('subestado_id', array('options' => $subestados, 'type' => 'select', 'empty' => '<< Seleccione Etapa-Filtro >>', 'label' => false, 'id' =>'subestado','class'=>'form-control')) ?>
    
             <?= $this->Form->input('QtyDMora', array('options' => $options_desv, 'type' => 'select', 'empty' => '<< Seleccione Dias de Desviacion >>', 'label' => false, 'id' =>'desviacion','class'=>'form-control')) ?>
       
            <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?> 

    </div>

</div>
    <script>
      $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
      });
    </script>
