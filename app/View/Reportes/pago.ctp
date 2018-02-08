    <div class="options">
        <? echo $this->Html->link($this->Html->image("../img/btnretornar.png", array("alt" => "regresar")), "/reportes", array('escape' => false)) ?>
    </div>
    <div class="export">
	    <button><?= $this->Html->link('Exportar a excel', array('action' => 'export_pago')); ?></button>
    </div>
<div class="pago-view"> 
   <table> 	
     	<tr>
	      	<th><?= __('Fecha de Pago') ?></th>
	      	<th><?= __('Ordenante') ?></th>
	      	<th><?= __('Ordenado') ?></th>
	      	<th><?= __('Asesor') ?></th>	      		      	
	      	<th><?= __('Pago a Capital') ?></th>
	      	<th><?= __('Pago a Intereses') ?></th>
	      	<th><?= __('Otros Pagos') ?></th>
	      	<th><?= __('Valor del Pago') ?></th>
	      	<th><?= __('Pagado') ?></td>
	      	<th><?= __('Observacion') ?></th>
	      	<th><?= __('Archivo') ?></th>
      	<tr>
      
      <?php
      
      $capital = 0; $intereses = 0; $otros = 0; $total = 0;
      
      foreach($pagos as $pago) {

	      	$capital += $pago['Pago']['pago_capital'];
	      	$intereses += $pago['Pago']['pago_intereses']; 
	      	$otros += $pago['Pago']['otros_pagos'];
	      	
	      	$tr = array(
	      		$pago['Pago']['fecha_pago'],
	      		mb_convert_case(mb_strtolower($pago['Ordenante']['ordenante']), MB_CASE_TITLE, "UTF-8"),
	      		mb_convert_case(mb_strtolower($pago['Cliente']['cliente']), MB_CASE_TITLE, "UTF-8"),
	      		mb_convert_case(mb_strtolower($pago['Asesor']['asesor']), MB_CASE_TITLE, "UTF-8"),
	      		'$'.number_format($pago['Pago']['pago_capital'], 2, ",", "."),
	      		'$'.number_format($pago['Pago']['pago_intereses'], 2, ",", "."),
	      		'$'.number_format($pago['Pago']['otros_pagos'], 2, ",", "."),
	      		'$'.number_format($pago['Pago']['valor'], 2, ",", "."),
				(strlen($pago['Pago']['cancelado']) > 0 ? 'SI' : 'NO'),
				mb_convert_case(mb_strtolower($pago['Pago']['observa']), MB_CASE_TITLE, "UTF-8"),
				(file_exists('../'.$pago['Pago']['PathFile']) && !empty($pago['Pago']['PathFile']) ? $this->html->link('Ver', '../'.$pago['Pago']['PathFile'].'?time='.time(), array('target' => '_blank')) : __('')),
	      	);
            echo $this->Html->tableCells($tr);
      }
      ?>
    </table>
    
    <div class="saldo">
   	    <h5><?= __('Recaudo Total a Capital $'.number_format($capital, 2, ",", ".")) ?></h5>
        <h5><?= __('Recaudo Total Intereses $'.number_format($intereses, 2, ",", ".")) ?></h5>
	    <h5><?= __('Recaudo Total Otros Pagos $'.number_format($otros, 2, ",", ".")) ?></h5>
	    <h5><?= __('Recaudo Total $'.number_format($capital + $intereses + $otros, 2, ",", ".")) ?></h5>
    </div>
    
</div>
