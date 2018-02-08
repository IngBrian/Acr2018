<div class="container view-add-cliente"> 
   
    <div class="sixteen columns wrapper">
    	<h6> <?= __('Reportes de Pagos. Consultar Por: ') ?></h6>
    </div>
    
    <div class="pagos">
    <h3> <?= __("Informe de Pagos ") ?> </h3>   
    <p>	En cada caso, por favor seleccione su opción de consulta para generar el reporte, y luego presione el botón "Ejecutar Consulta", para ver los resultados.</p>
    
    
    <hr>
    
    <?= $this->Form->create("Reporte", array('action' => 'pago')); ?>
       
       <ul class="criteria">

        <li><h6><?= __('Pagos registrados entre la fecha') ?></h6></li>
        <li><?= $this->Form->input('fecha_inicial', array('label' => '', 'type' => 'text', 'id' => 'datepicker', 'class' => 'short-text'))?> <?= $this->Form->input('fecha_final', array('label' => '', 'type' => 'text', 'id' => 'datepicker1', 'class' => 'short-text'))?></li><br><br>
        <li><?= $this->Form->input('ordenante', array('label' => '', 'options' => $ordenantes, 'empty' => '<<< Seleccione criterio de busqueda para cliente >>>'))?></li>
        <li><?= $this->Form->input('asesor', array('label' => '', 'options' => $asesores, 'empty' => '<<< Seleccione asesor >>>'))?></li>
   <li> <?= $this->Form->end(__('Ejecutar Consulta')) ?></li>
   </ul>
   </div>
   <br><br><br><br><br><br>
   <br><br><br><br><br><br>
    
    
    <div class="sixteen columns wrapper">
    	<h6> <?= __('Reportes Específicos. Consultar Por: ') ?></h6>
    </div>
    
    <h3> <?= __("Informes de Procesos") ?> </h3>   
    <p>	En cada caso, por favor seleccione su opción de consulta para generar el reporte, y luego presione el botón "Ejecutar Consulta", para ver los resultados.</p>
    
    <hr>
    
    <?= $this->Form->create("Reportes", array('action' => 'search_data')); ?>
    
    <ul>
        <li><?= $this->Form->checkbox('deudor_criteria')?> <?= __('Cédula :')?> </li>
        <li><?= $this->Form->input('deudor_id', array('label' => '', 'type' => 'text', 'class' => 'short-text', 'placeholder' => 'Digite criterio a buscar'))?></li>
        <li><?= $this->Form->end(__('Ejecutar Consulta')) ?></li>
    </ul> 


     <div class="sixteen columns wrapper">
    	<h6><?= __('Reportes Generales. Consultar Por: ') ?></h6>
    </div>
    <hr>
    
    <?= $this->Form->create("Reportes", array('action' => 'search_data')); ?>
    
    <h5><?= __('Días de Desviación') ?> </h5>
    <?		$options=array('1-30'=>'1-30 dias','31-60'=>'31-60 dias', '61-90'=>'61-90 dias', '91-120'=>'91-120 dias', '121-150'=>'121-150 dias', '151-180'=>'151-180 dias', '181+250'=>'181-250 dias', '251+365'=>'251-365 dias', '366+500'=>'366-500 dias', '501+650'=>'501-650 dias', '651+770'=>'651-770 dias', '771+1000'=>'1000 + dias');
   		echo $this->Form->select('mora_criteria', $options, array('empty' => '<<Seleccione Días de desviación>>')); 	
    ?>	

    <ul class="procesos-criteria">
	    <li></li>
	    <li></li>
    	<li><?= $this->Form->checkbox('etapa_criteria')?> <?= __('Procesos en Etapa de:')?></li>
	    <li><?= $this->Form->input('etapa', array('label' => '', 'options' => $prejuridico))?></li>
	    <li><?= $this->Form->checkbox('noetapa_criteria')?> <?= __('Procesos en la Etapa no presentada de:')?></li>
	    <li><?= $this->Form->input('noetapa', array('label' => '', 'options' => $prejuridico))?></li>
    	<li><?= $this->Form->checkbox('juzgado_criteria')?> <?= __('Autoridad:')?></li>
	    <li><?= $this->Form->input('juzgado', array('label' => '', 'options' => $juzgados))?></li><br><br>
    	<li><?= $this->Form->checkbox('tproceso_criteria')?> <?= __('Tipo de Proceso:')?></li>
	    <li><?= $this->Form->input('tproceso', array('label' => '', 'options' => $tprocesos))?></li><br><br>		
    	<li><?= $this->Form->checkbox('pagadurias_criteria')?> <?= __('Relacionado:')?></li>
	    <li><?= $this->Form->input('pagaduria', array('label' => '', 'options' => $pagadurias))?></li><br><br>		
	    <li><?= $this->Form->checkbox('ordenante_criteria')?> <?= __('Procesos del Ordenante:')?></li>
	    <li><?= $this->Form->input('ordenante', array('label' => '', 'options' => $ordenantes, 'empty' => '<<Seleccione ordenante>>'))?></li><br><br>

<li><?= $this->Form->checkbox('subestado_criteria')?> <?= __('Procesos en sub-estado:')?></li>
 <li><?= $this->Form->input('subestado', array('label' => '', 'options' => $subestados, 'empty' => '<<Seleccione sub-estado>>'))?></li><br><br>
	    <tr><div><?= $this->Form->checkbox('fecha_criteria')?> <?= __('Procesos Regístrados entre las fechas:'). $this->Form->input('fecha_inicial', array('label' => '', 'type' => 'text', 'id' => 'datepicker4', 'class' => 'short-text')). " y " . $this->Form->input('fecha_final', array('label' => '', 'type' => 'text', 'id' => 'datepicker5', 'class' => 'short-text'))?>
	    </div></tr>
		<li><?= $this->Form->checkbox('asesor_criteria')?> <?= __('Procesos del abogado:')?></li>
	    <li><?= $this->Form->input('asesor', array('label' => '', 'options' => $asesores, 'empty' => '<<Seleccione Asesor>>'))?></li>
    </ul>
    
    <?= $this->Form->end(__('Ejecutar Consulta')) ?>
   
    
</div>
