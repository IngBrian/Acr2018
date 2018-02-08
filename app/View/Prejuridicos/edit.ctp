   <div class="container">
    
        <? //print_r($prejuridico); ?>
        
        
        <?= $this->Form->create("Prejuridico", ['action' => 'edit','class'=>'form-horizontal']) ?>
        <div class="col-sm-7">

        <?= $this->Form->input('id', array('type' => 'hidden', 'value' => $prejuridico['Prejuridico']['id'])); ?>
        <?= $this->Form->input('tproceso_id', array('options' => $tprocesos, 'type' => 'select', 'empty' => '<< Seleccione Tipo de Acto >>', 'label' => false,  'class' => 'form-control', 'value' => $prejuridico['Prejuridico']['tproceso_id'],'id'=>'tproceso')) ?>
        
        <?= $this->Form->input('ordenante_id', array('options'=> $ordenantes, 'type' => 'select', 'empty' => '<< Seleccione Otorgnate I >>', 'label' => false, 'class' => 'form-control', 'value' => $prejuridico['Prejuridico']['ordenante_id'], 'id' => 'id_demandante')) ?>
        
        <?= $this->Form->input('cliente_id', array('options'=> $clientes, 'type' => 'select', 'empty' => '<< Seleccione  Otorgnate II >>', 'label' => false, 'class' => 'form-control', 'id' => 'id_deudor', 'value' => $prejuridico['Prejuridico']['cliente_id'])) ?>
        
        <?= $this->Form->input('codeudor', array('options'=> $clientes, 'type' => 'select', 'empty' => '<< Seleccione Otros >>', 'label' => false, 'class' => 'form-control' , 'id' => 'codeudor','value' => $prejuridico['Prejuridico']['codeudor'])) ?>

        <!-- <php= $this->Form->input('codeudor', array('label' => 'Codeudor', 'class' => 'form-control', 'placeholder' => 'Digite Codeudor', 'value' => $prejuridico['Prejuridico']['codeudor']))?> -->
        
        
           
        <?= $this->Form->hidden('QtyDMora', array('label' => 'Dias de desviacion', 'class' => 'form-control', 'placeholder' => 'dias', 'value' => abs((strtotime($prejuridico['Prejuridico']['fecha_inicio'])-strtotime(date('Y-m-d')))/86400)  ))?>
            
        <?= $this->Form->input('juzgado_id', array('options' => $juzgados, 'type' => 'select', 'empty' => '<< Seleccione Entidad >>', 'label' => false, 'id' => 'juzgado', 'class' => 'form-control', 'value' => $prejuridico['Prejuridico']['juzgado_id'])) ?>
			  
   
        <?= $this->Form->input('ubicacion_id', array('options' => $ubicaciones, 'type' => 'select', 'empty' => '<< Seleccione Ubicacion >>', 'label' => false, 'id' => 'departamento', 'class' => 'form-control', 'value' => $prejuridico['Prejuridico']['ubicacion_id']))   ?>
        
        
        <?= $this->Form->input('Abogado', array('options' => $asesores, 'type' => 'select', 'empty' => '<< Seleccione Asesor Inicial >>', 'label' => false, 'id' => 'abogado1','class' => 'form-control', 'value' => $prejuridico['Prejuridico']['Abogado'])) ?>  
        
        <?= $this->Form->input('Abogado2', array('options' => $asesores, 'type' => 'select', 'empty' => '<< Seleccione Asesor Actual >>', 'label' => false, 'id' => 'abogado2','class' => 'form-control', 'value' => $prejuridico['Prejuridico']['Abogado2'])) ?>  
        
        <?= $this->Form->input('pagaduria_id', array('options' => $pagadurias, 'type' => 'select','class'=>'form-control', 'empty' => '<< Seleccione Relacionado >>', 'label' => false, 'id' => 'pagaduria', 'value' => $prejuridico['Prejuridico']['pagaduria_id'])) ?>  
        
         <?= $this->Form->input('pendiente_id', array('options' => $pendientes, 'type' => 'select','class'=>'form-control', 'empty' => '<< Seleccione Pendiente >>', 'label' => false, 'id' => 'pendiente', 'value' => $prejuridico['Prejuridico']['pendiente_id'])) ?> 
             
        <?= $this->Form->input('subestado_id', array('options' => $subestados, 'type' => 'select','class'=>'form-control', 'empty' => '<< Seleccione Etapa Filtro >>', 'label' => false, 'id' => 'subestado', 'value' => $prejuridico['Subestado']['id'])) ?>  

        <?= $this->Form->input('pagare', array('label' => false, 'placeholder' => 'N° FACTURA','class'=>'form-control' ,'value' => $prejuridico['Prejuridico']['pagare']))?>
           
        <?= $this->Form->input('saldo_int', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Saldo', 'value' => $prejuridico['Prejuridico']['saldo_int']))?>

        <?= $this->Form->date('fecha_inicio', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Seleccione Fecha' ,'id' => 'datepicker', 'value' => $prejuridico['Prejuridico']['fecha_inicio']))?>
        
        <?= $this->Form->input('guia', array('label' => false, 'class' => 'form-control', 'placeholder' => 'N° MATRICULA', 'value' => $prejuridico['Prejuridico']['guia']))?>
        
        <?= $this->Form->input('guia2', array('label' => false, 'class' => 'form-control', 'placeholder' => 'FECHA ESCRITURA', 'value' => $prejuridico['Prejuridico']['guia2']))?>
        
        <?= $this->Form->input('ntitulo', array('label' => false, 'class' => 'form-control', 'placeholder' => 'N° ESCRITURA', 'value' => $prejuridico['Prejuridico']['ntitulo']))?>			  
			
        
       <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?> 
       
       
        
    </div>
</div>
        

