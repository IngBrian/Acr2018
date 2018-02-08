<div class="reportes-view"> 
    
    <div class="options">
        <? echo $this->Html->link($this->Html->image("../img/acr_return.png", array("alt" => "regresar")), "/menus", array('escape' => false)) ?>
    </div>
    
    
    
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
    <h3> <?= __("Informe de Procesos Modulo Juridica") ?> </h3>   
    <p>	En cada caso, por favor seleccione su opción de consulta para generar el reporte, y luego presione el botón "Ejecutar Consulta", para ver los resultados.</p>
    
    
    <hr>
    
    <?= $this->Form->create("Reportes", array('action' => 'search')); ?>
    
    <ul>
        <li><?= $this->Form->checkbox('deudor_criteria')?> <?= __('Cédula:')?> </li>
        <li><?= $this->Form->input('deudor_id', array('label' => '', 'type' => 'text', 'class' => 'short-text', 'placeholder' => 'Digite criterio a buscar'))?></li>
        <li><?= $this->Form->end(__('Ejecutar Consulta')) ?></li>
    </ul> 


     <div class="sixteen columns wrapper">
    	<h6><?= __('Reportes Generales. Consultar Por: ') ?></h6>
    </div>
    <hr>
    
    <?= $this->Form->create("Reportes", array('action' => 'search')); ?>
    
    <h5><?= __('Días Desviación') ?> </h5>
    <?
   		$options=array('1-30'=>'1-30 dias','31-60'=>'31-60 dias', '61-90'=>'61-90 dias', '91-120'=>'91-120 dias', '121-150'=>'121-150 dias', '151-180'=>'151-180 dias', '180-100000'=>'180 + dias');
   		echo $this->Form->select('mora_criteria', $options, array('empty' => '<<Seleccione días de desviación>>')); 	
    ?>	
    
    <ul class="procesos-criteria">
    	<li><?= $this->Form->checkbox('juzgado_criteria')?> <?= __('Juzgado:')?></li>
	    <li><?= $this->Form->input('juzgado', array('label' => '', 'options' => $juzgados))?></li>
    	<li><?= $this->Form->checkbox('etapa_criteria')?> <?= __('Procesos en Etapa de:')?></li>
	    <li><?= $this->Form->input('etapa', array('label' => '', 'options' => $etapas))?></li>
	    
	    
	    
	    
	    
	    <li><?= $this->Form->checkbox('noetapa_criteria')?> <?= __('Procesos en la Etapa no presentada de:')?></li>
	    <li><?= $this->Form->input('noetapa', array('label' => '', 'options' => $etapas))?></li>
	    <li><?= $this->Form->checkbox('ordenante_criteria')?> <?= __('Procesos del demandante:')?></li>
	    <li><?= $this->Form->input('ordenante', array('label' => '', 'options' => $ordenantes, 'empty' => '<<Seleccione demandante>>'))?></li>
	    <li><?= $this->Form->checkbox('fecha_criteria')?> <?= __('Procesos Regístrados entre las fechas:')?></li>
	    <li><?= $this->Form->input('fecha_inicial', array('label' => '', 'type' => 'text', 'id' => 'datepicker2', 'class' => 'short-text'))?> y<?= $this->Form->input('fecha_final', array('label' => '', 'type' => 'text', 'id' => 'datepicker3', 'class' => 'short-text'))?></li>
	    <li><?= $this->Form->checkbox('asesor_criteria')?> <?= __('Procesos del abogado:')?></li>
	    <li><?= $this->Form->input('asesor', array('label' => '', 'options' => $asesores, 'empty' => '<<Seleccione Asesor>>'))?></li>
    </ul>
    
    <?= $this->Form->end(__('Ejecutar Consulta')) ?>
   
   
   
    
    <div class="sixteen columns wrapper">
    	<h6> <?= __('Reportes Específicos. Consultar Por: ') ?></h6>
    </div>
    
    <h3> <?= __("Informes de Procesos Modulo C. Administrativa") ?> </h3>   
    <p>	En cada caso, por favor seleccione su opción de consulta para generar el reporte, y luego presione el botón "Ejecutar Consulta", para ver los resultados.</p>
    
    <hr>
    
    <?= $this->Form->create("Reportes", array('action' => 'search_data')); ?>
    
    <ul>
        <li><?= $this->Form->checkbox('deudor_criteria')?> <?= __('Cédula / Id del Deudor:')?> </li>
        <li><?= $this->Form->input('deudor_id', array('label' => '', 'type' => 'text', 'class' => 'short-text', 'placeholder' => 'Digite criterio a buscar'))?></li>
        <li><?= $this->Form->end(__('Ejecutar Consulta')) ?></li>
    </ul> 


     <div class="sixteen columns wrapper">
    	<h6><?= __('Reportes Generales. Consultar Por: ') ?></h6>
    </div>
    <hr>
    
    <?= $this->Form->create("Reportes", array('action' => 'search_data')); ?>
    
    <h5><?= __('Días de Desviación') ?> </h5>
    <?
   		$options=array('1-30'=>'1-30 dias','31-60'=>'31-60 dias', '61-90'=>'61-90 dias', '91-120'=>'91-120 dias', '121-150'=>'121-150 dias', '151-180'=>'151-180 dias', '180-100000'=>'180 + dias');
   		echo $this->Form->select('mora_criteria', $options, array('empty' => '<<Seleccione Días de desviación>>')); 	
    ?>	
    
    <ul class="procesos-criteria">
	    <li></li>
	    <li></li>
    	<li><?= $this->Form->checkbox('etapa_criteria')?> <?= __('Procesos en Etapa de:')?></li>
	    <li><?= $this->Form->input('etapa', array('label' => '', 'options' => $prejuridico))?></li>
	    <li><?= $this->Form->checkbox('noetapa_criteria')?> <?= __('Procesos en la Etapa no presentada de:')?></li>
	    <li><?= $this->Form->input('noetapa', array('label' => '', 'options' => $prejuridico))?></li>
	    <li><?= $this->Form->checkbox('ordenante_criteria')?> <?= __('Procesos del demandante:')?></li>
	    <li><?= $this->Form->input('ordenante', array('label' => '', 'options' => $ordenantes, 'empty' => '<<Seleccione demandante>>'))?></li>
	    <li><?= $this->Form->checkbox('fecha_criteria')?> <?= __('Procesos Regístrados entre las fechas:')?></li>
	    <li><?= $this->Form->input('fecha_inicial', array('label' => '', 'type' => 'text', 'id' => 'datepicker4', 'class' => 'short-text'))?> y<?= $this->Form->input('fecha_final', array('label' => '', 'type' => 'text', 'id' => 'datepicker5', 'class' => 'short-text'))?></li>
	    <li><?= $this->Form->checkbox('asesor_criteria')?> <?= __('Procesos del abogado:')?></li>
	    <li><?= $this->Form->input('asesor', array('label' => '', 'options' => $asesores, 'empty' => '<<Seleccione Asesor>>'))?></li>
    </ul>
    
    <?= $this->Form->end(__('Ejecutar Consulta')) ?>
   
    
</div>
