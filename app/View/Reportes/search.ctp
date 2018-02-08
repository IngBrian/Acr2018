<div class="search-view"> 
    
    <div class="export">
	    <button><?= $this->Html->link('Exportar a excel', array('action' => 'export')); ?></button>
    </div>
    
    
    <div class="options">
        <? echo $this->Html->link($this->Html->image("../img/acr_return.png", array("alt" => "regresar")), "/reportes", array('escape' => false)) ?>
    </div>
   
   <ul class="headers">
		<li><h5><?= __('Informacion General del Proceso')?></h5></li>
		<li><h5><?= __('Documentacion Recibida') ?></h5></li>
		<li><h5><?= __('Demanda') ?></h5></li>
		<li><h5><?= __('Admision Demanda y/o Mandamiento') ?></h5></li> 
		<li><h5><?= __('Embargo') ?></h5></li>
		<li><h5><?= __('Notificacion') ?></h5></li> 
		<li><h5><?= __('Sentencia') ?></h5></li>
		<li><h5><?= __('Liquidacion') ?></h5></li>
		<li><h5><?= __('Avaluo') ?></h5></li> 
		<li><h5><?= __('Remate') ?></h5></li>
		<li><h5><?= __('Adjudicacion') ?></h5></li>
		<li><h5><?= __('Terminacion') ?></h5></li> 
		<li><h5><?= __('Pagos') ?></h5></li>   		   		   		
  </ul> 
  
   <table border="1px"> 	
     	<tr>
	      	<td width="190px" style="border:solid 1px"><?= __('Recepcion') ?></td>
	      	<td width="500px" style="border:solid 1px"><?= __('Demandante') ?></td>
	      	<td width="500px" style="border:solid 1px"><?= __('Demandado') ?></td>
	      	<td width="500px" style="border:solid 1px"><?= __('Demandado') ?></td>
	      	<td width="500px" style="border:solid 1px"><?= __('Pagaduria') ?></td>
	      	<td width="500px" style="border:solid 1px"><?= __('T. Proceso') ?></td>
	      	<td width="50px" style="border:solid 1px"><?= __('Dias desviacion') ?></td>
	      	<td width="60px" style="border:solid 1px"><?= __('Titulo') ?></td>
	      	
	      	<td width="50px" style="border:solid 1px"><?= __('Camara') ?></td>
	      	<td width="50px" style="border:solid 1px"><?= __('Poder') ?></td>
	      	<td width="50px" style="border:solid 1px"><?= __('Anexos') ?></td>
	      	<td width="50px" style="border:solid 1px"><?= __('Bienes') ?></td>
	      	
	      	
	       	
	       	<td width="150px" style="border:solid 1px"><?= __('Saldo Insoluto') ?></td>
	      	
	      	<td width="120px" style="border:solid 1px"><?= __('Fecha Demanda') ?></td>
	      	<td width="900px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	      	<td width="480px" style="border:solid 1px"><?= __('Juzgado') ?></td>
	      	<td width="30px" style="border:solid 1px"><?= __('Archivo') ?></td>
	      	   	
	       	<td width="120px" style="border:solid 1px"><?= __('Fecha Mandamiento') ?></td>
	       	<td width="800px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	        <td width="30px" style="border:solid 1px"><?= __('Archivo') ?></td>
   
	        <td width="120px" style="border:solid 1px"><?= __('Fecha Embargo') ?></td>
	       	<td width="800px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	        <td width="30px" style="border:solid 1px"><?= __('Archivo') ?></td>
	        
	        <td width="120px" style="border:solid 1px"><?= __('Citacion') ?></td>
	       	<td width="120px" style="border:solid 1px"><?= __('Aviso') ?></td>
	        <td width="120px" style="border:solid 1px"><?= __('Emplzto') ?></td>
	        <td width="120px" style="border:solid 1px"><?= __('Recurso') ?></td>
	       	<td width="120px" style="border:solid 1px"><?= __('Nulidad') ?></td>
	        <td width="120px" style="border:solid 1px"><?= __('Contestacion') ?></td>
	        <td width="120px" style="border:solid 1px"><?= __('Excepciones') ?></td>
	       	<td width="250px" style="border:solid 1px"><?= __('Abogado Contra Parte y/o Curador') ?></td>
	        <td width="800px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	      	
	      	<td width="120px" style="border:solid 1px"><?= __('Fecha Sentencia') ?></td>
	       	<td width="800px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	        <td width="30px" style="border:solid 1px"><?= __('Archivo') ?></td>
	      	
	      	<td width="120px" style="border:solid 1px"><?= __('Liq. Credito') ?></td>
	       	<td width="120px" style="border:solid 1px"><?= __('Costes') ?></td>
	        <td width="800px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	      	
	      	<td width="120px" style="border:solid 1px"><?= __('Fecha Avaluo') ?></td>
	       	<td width="120px" style="border:solid 1px"><?= __('Aprobacion') ?></td>
	        <td width="800px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	        
	        <td width="120px" style="border:solid 1px"><?= __('Fecha Remate') ?></td>
	        <td width="800px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	        
	        <td width="120px" style="border:solid 1px"><?= __('Fecha Adjudicacion') ?></td>
	        <td width="800px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	        
	        <td width="120px" style="border:solid 1px"><?= __('Fecha Terminacion') ?></td>
	        <td width="120px" style="border:solid 1px"><?= __('Pago Total') ?></td>
	        <td width="120px" style="border:solid 1px"><?= __('Pago Mora') ?></td>
	        <td width="120px" style="border:solid 1px"><?= __('Otros') ?></td>
	        <td width="800px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	        
	        <td width="100px" style="border:solid 1px"><?= __('Capital') ?></td>
	        <td width="100px" style="border:solid 1px"><?= __('Intereses') ?></td>
	        <td width="100px" style="border:solid 1px"><?= __('Otros') ?></td>
	        <td width="100px" style="border:solid 1px"><?= __('Abonos') ?></td>
	        
      	<tr>
      
      <?php
      
      $saldo = 0;
      
      foreach($procesos as $proceso) {
	      	
	      	
	      	$capital = 0; $intereses = 0; $otros = 0; 
	      	
	      	if(!empty($proceso['Pago'])){
		    	foreach($proceso['Pago'] as $pago){
			      	$capital += $pago['pago_capital'];
			      	$intereses += $pago['pago_intereses']; 
			      	$otros += $pago['otros_pagos'];
		      	}
	      	  	
	      	}

	      	$saldo +=$proceso['Proceso']['saldo_insoluto'];
	      	
            $tr = array (
	              $proceso['Proceso']['fecha_inicio'],
	              mb_convert_case(mb_strtolower($proceso['Ordenante']['nombre']), MB_CASE_TITLE, "UTF-8"),
	              mb_convert_case(mb_strtolower($proceso['Cliente']['nombre_completo']), MB_CASE_TITLE, "UTF-8"),
	              mb_convert_case(mb_strtolower($proceso['Cliented']['nombre_completo']), MB_CASE_TITLE, "UTF-8"),
	              mb_convert_case(mb_strtolower($proceso['Pagaduria']['nombre']), MB_CASE_TITLE, "UTF-8"),
	              mb_convert_case(mb_strtolower($proceso['Tproceso']['nombre']), MB_CASE_TITLE, "UTF-8"),
 	              $proceso['Proceso']['QtyDMora'],	              
	              $proceso['Proceso']['nro_pagare'],
	              (strlen($proceso['Proceso']['doc_consignacion']) > 0 ? 'SI' : 'NO'),
	              (strlen($proceso['Proceso']['doc_poder']) > 0 ? 'SI' : 'NO'),
	              (strlen($proceso['Proceso']['doc_anexos']) > 0 ? 'SI' : 'NO'),
	              
	              
	              
	              $proceso['Proceso']['estudio_credito'],
	              '$'.number_format($proceso['Proceso']['saldo_insoluto'], 2, ",", "."),
	              $proceso['Demanda']['fecha_demanda'],
	              $proceso['Demanda']['observacion'],
   	              (!empty($proceso['Demanda']['Juzgado']) ? strtolower($proceso['Demanda']['Juzgado']['nombre_juzgado']) : ''),
   	              (!empty($proceso['Demanda']['documento']) ? $this->html->link('Ver', '../../'.$proceso['Demanda']['documento'].'?time='.time(), array('target' => '_blank')) : __('')),
   	              $proceso['Mandamiento']['fecha_mandamiento'],
   	              substr($proceso['Mandamiento']['observacion'], 0, 85),
   	              (!empty($proceso['Mandamiento']['documento']) ? $this->html->link('Ver', '../../'.$proceso['Mandamiento']['documento'].'?time='.time(), array('target' => '_blank')) : __('')),
   	              $proceso['Embargo']['fecha_embargo'],
   	              $proceso['Embargo']['observacion'],
   	              (!empty($proceso['Embargo']['documento']) ? $this->html->link('Ver', '../../'.$proceso['Embargo']['documento'].'?time='.time(), array('target' => '_blank')) : __('')),
   	              $proceso['Notificacion']['fecha_citacion'],
   	              $proceso['Notificacion']['fecha_aviso'],
   	              $proceso['Notificacion']['fecha_edicto'],
   	              $proceso['Notificacion']['fecha_recurso'],
   	              $proceso['Notificacion']['fecha_nulidad'],
   	              $proceso['Notificacion']['fecha_contestacion'],
   	              $proceso['Notificacion']['fecha_excepciones'],
   	              $proceso['Notificacion']['nombre_curador'],
   	              $proceso['Notificacion']['observacion'],
   	              $proceso['Sentencia']['fecha'],
   	              $proceso['Sentencia']['observacion'],
   	              (!empty($proceso['Sentencia']['documento'])  ? $this->html->link('Ver', '../../'.$proceso['Sentencia']['documento'].'?time='.time(), array('target' => '_blank')) : __('')),
   	              $proceso['Liquidacion']['f_liquidacion'],
                  $proceso['Liquidacion']['f_costas'],
   	              $proceso['Liquidacion']['observacion'],
   	              $proceso['Avaluo']['fecha_avaluo'],
                  $proceso['Avaluo']['fecha_aprobacion'],
   	              $proceso['Avaluo']['observacion'],
   	              $proceso['Remate']['fecha_remate'],
   	              $proceso['Remate']['observacion'],
   	              $proceso['Adjudicacion']['fecha_adjudicacion'],
   	              $proceso['Adjudicacion']['observacion'],
   	              $proceso['Terminacion']['fpago_total'],
   	              '$'.number_format($proceso['Terminacion']['ptotal'], 2, ",", "."),
   	              '$'.number_format($proceso['Terminacion']['pmora'], 2, ",", "."),
   	              '$'.number_format($proceso['Terminacion']['potros'], 2, ",", "."),
   	              $proceso['Terminacion']['observaciones'],
   	              '$'.number_format($capital, 2, ",", "."),
   	              '$'.number_format($intereses, 2, ",", "."),
   	              '$'.number_format($otros, 2, ",", "."),
   	              '$'.number_format($capital+$intereses+$otros, 2, ",", "."),
	            );
            echo $this->Html->tableCells($tr, array('style' => 'border solid 1px'));
      }
      ?>
    </table>
    
    <div class="saldo">
	    <h5><?= __('Saldo Total Por Pagina $'.number_format($saldo, 2, ",", ".")) ?></h5>
	    <h5><?= __('Saldo Total en Cartera $'.number_format($total, 2, ",", ".")) ?></h5>
    </div>
    
     <div class="container">
        <div class="pagination-result columnscenter">
            <?php 
                echo $this->paginator->prev('« Anterior ', null, null, array('class' => 'disabled'));
                echo $this->paginator->numbers();
                echo $this->paginator->next(' Siguiente »', null, null, array('class' => 'disabled'));
            ?>
       </div>
    </div>
    
</div>
