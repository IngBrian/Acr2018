    <div class="options">
        <? echo $this->Html->link($this->Html->image("../img/btnretornar.png", array("alt" => "regresar")), "/reportes", array('escape' => false)) ?>
    </div>
    <div class="export">
	    <button><?= $this->Html->link('Exportar a excel', array('action' => 'export_data')); ?></button>
    </div>
<div class="searchdata-view"> 
  <? //print_r($this->data); ?>
  <ul class="headers">
		<li style=""><h5><?= __('Informacion General del Proceso')?></h5></li>
		<li><h5><?= __('Documentacion Recibida') ?></h5></li>
		<li><h5><?= __('Admision Demanda y/o Mandamiento') ?></h5></li>
		<li><h5><?= __('Medidas Cautelares') ?></h5></li> 
		<li><h5><?= __('Conciliacion-Saneamiento-Excepciones-Fijacion de Litigio') ?></h5></li>
		<li><h5><?= __('Tramite y Juzgamiento') ?></h5></li> 
		<li><h5><?= __('Liquidacion-Avaluo-Remate-Adjudicacion') ?></h5></li>
		<li><h5><?= __('Pagos') ?></h5></li>   		   		   		
  </ul> 
  
   <table> 	
     	<tr>
	      	<td width="190px" style="border:solid 1px"><?= __('Recepcion') ?></td>
	      	<td width="500px" style="border:solid 1px"><?= __('Ordenante') ?></td>
	      	<td width="500px" style="border:solid 1px"><?= __('CC/Nit Ordenado I') ?></td>
	      	<td width="500px" style="border:solid 1px"><?= __('Ordenado I') ?></td>
	      	<td width="500px" style="border:solid 1px"><?= __('CC/Nit Ordenado II') ?></td>
	      	<td width="500px" style="border:solid 1px"><?= __('Ordenado II') ?></td>
	      	<td width="500px" style="border:solid 1px"><?= __('Tipo de Proceso') ?></td>
	      	<td width="500px" style="border:solid 1px"><?= __('Autoridad') ?></td>
	      	<td width="500px" style="border:solid 1px"><?= __('Relacionado') ?></td>
	      	<td width="50px" style="border:solid 1px"><?= __('Dias desviacion') ?></td>

	      	<td width="20px" style="border:solid 1px"><?= __('Fecha-Agenda') ?></td>
	      	<td width="20px" style="border:solid 1px"><?= __('Hora-Agenda') ?></td>
	      	<td width="100px" style="border:solid 1px"><?= __('Comentario-Agenda') ?></td>
			
	      	<td width="60px" style="border:solid 1px"><?= __('Referencia') ?></td>
	       	<td width="150px" style="border:solid 1px"><?= __('Saldo Insoluto') ?></td>
	      	<td width="120px" style="border:solid 1px"><?= __('Fecha') ?></td>
	     	<td width="120px" style="border:solid 1px"><?= __('Titulo Comentario') ?></td>	
	     	<td width="250px" style="border:solid 1px"><?= __('Valor Mandamiento') ?></td>
	      	<td width="1000px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	      	   	
	       	<td width="120px" style="border:solid 1px"><?= __('Fecha') ?></td>
	       	<td width="120px" style="border:solid 1px"><?= __('Se Aporto Poliza Judicial') ?></td>
	       	<td width="120px" style="border:solid 1px"><?= __('Decretan Medidas') ?></td>
	       	<td width="1000px" style="border:solid 1px"><?= __('Observaciones') ?></td>
   
	        <td width="120px" style="border:solid 1px"><?= __('Inicio Notificacion') ?></td>
	      	<td width="200px" style="border:solid 1px"><?= __('Abogado Contra Parte y/o Curador') ?></td>
	     	<td width="250px" style="border:solid 1px"><?= __('Gastos de Proceso (Poliza,Notificacion,Honorarios,etc)') ?></td> 
	       	<td width="1000px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	        
	        <td width="120px" style="border:solid 1px"><?= __('Fecha Tramite') ?></td>
	      	<td width="200px" style="border:solid 1px"><?= __('Abre periodo probatorio y decreta pruebas') ?></td>
	     	<td width="250px" style="border:solid 1px"><?= __('Pruebas pendientes por practicar') ?></td> 
	     	<td width="250px" style="border:solid 1px"><?= __('Cierra periodo probatorio') ?></td> 
	     	<td width="250px" style="border:solid 1px"><?= __('Alegatos') ?></td> 
	     	<td width="250px" style="border:solid 1px"><?= __('Sentencia Condenatoria') ?></td> 
	     	<td width="250px" style="border:solid 1px"><?= __('Fecha Juzgamiento') ?></td> 
	       	<td width="1000px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	      	
	      	<td width="120px" style="border:solid 1px"><?= __('Fecha') ?></td>
	      	<td width="200px" style="border:solid 1px"><?= __('Liquidacion Parte demandante') ?></td>
	      	<td width="200px" style="border:solid 1px"><?= __('Costos y agencias en derecho') ?></td>
	      	<td width="200px" style="border:solid 1px"><?= __('Avaluo') ?></td>
	      	<td width="200px" style="border:solid 1px"><?= __('Remate') ?></td>	      		      	
	      	<td width="200px" style="border:solid 1px"><?= __('Adjudicacion') ?></td>	      	
	       	<td width="1000px" style="border:solid 1px"><?= __('Observaciones') ?></td>	
	      
	        <td width="100px" style="border:solid 1px"><?= __('Capital') ?></td>
	        <td width="100px" style="border:solid 1px"><?= __('Intereses') ?></td>
	        <td width="100px" style="border:solid 1px"><?= __('Otros') ?></td>
	        <td width="100px" style="border:solid 1px"><?= __('Abonos') ?></td>
	        
      	<tr>
      
      <?php
      
      $saldo = 0;
      //print_r($procesos);
      foreach($procesos as $proceso) {
	      	
	      	$capital = 0; $intereses = 0; $otros = 0; 
	      	
	      	foreach($proceso['Pago'] as $pago){
		      	$capital += $pago['pago_capital'];
		      	$intereses += $pago['pago_intereses']; 
		      	$otros += $pago['otros_pagos'];
	      	}
	      	
	      	$saldo +=$proceso['Prejuridico']['saldo_int'];
	      	
            $tr = array (
	              $proceso['Prejuridico']['fecha_inicio'],
	              mb_convert_case(mb_strtolower($proceso['Ordenante']['nombre']), MB_CASE_TITLE, "UTF-8"),
	              mb_convert_case(mb_strtolower($proceso['Cliente']['nit_cc']), MB_CASE_TITLE, "UTF-8"),
	              mb_convert_case(mb_strtolower($proceso['Cliente']['nombre_completo']), MB_CASE_TITLE, "UTF-8"),
	              mb_convert_case(mb_strtolower($proceso['Cliented']['nit_cc']), MB_CASE_TITLE, "UTF-8"),
	              mb_convert_case(mb_strtolower($proceso['Cliented']['nombre_completo']), MB_CASE_TITLE, "UTF-8"),
				  mb_convert_case(mb_strtolower($proceso['TipoProceso']['nombre']), MB_CASE_TITLE, "UTF-8"),
	              mb_convert_case(mb_strtolower($proceso['Juzgado']['nombre_juzgado']), MB_CASE_TITLE, "UTF-8"),
				  mb_convert_case(mb_strtolower($proceso['Pagaduria']['nombre']), MB_CASE_TITLE, "UTF-8"),
 	              abs((strtotime($proceso['Prejuridico']['fecha_inicio'])-strtotime(date('Y-m-d')))/86400),
				  $proceso['Agenda']['fechaAgenda'],
				  $proceso['Agenda']['hora'],
				  $proceso['Agenda']['comentario'],	              
	              $proceso['Prejuridico']['pagare'],
	              //(file_exists(APP.'webroot/documentos/prejuridico'.DS.$proceso['Prejuridico']['id'].DS.'camara_'.$proceso['Prejuridico']['id'].'.pdf') ? 'SI' : 'NO'),
	              //(file_exists(APP.'webroot/documentos/prejuridico'.DS.$proceso['Prejuridico']['id'].DS.'saldo_'.$proceso['Prejuridico']['id'].'.pdf') ? 'SI' : 'NO'),
	              //(file_exists(APP.'webroot/documentos/prejuridico'.DS.$proceso['Prejuridico']['id'].DS.'anexo_'.$proceso['Prejuridico']['id'].'.pdf') ? 'SI' : 'NO'),
	              //(file_exists(APP.'webroot/documentos/prejuridico'.DS.$proceso['Prejuridico']['id'].DS.'reporte'.$proceso['Prejuridico']['id'].'.pdf') ? 'SI' : 'NO'),
	              //$proceso['Prejuridico']['estudio_credito'],
	              '$'.number_format($proceso['Prejuridico']['saldo_int'], 2, ",", "."),
	              $proceso['Etapa1']['fecha'],
	              $proceso['Etapa1']['factura'],
	              '$'.number_format($proceso['Etapa1']['valor'], 2, ",", "."),
	              substr($proceso['Etapa1']['observaciones'], 0, 150),
	              $proceso['Etapa2']['fecha'],
	              $proceso['Etapa2']['propietario'],
	              $proceso['Etapa2']['arrendatario'],
	              substr($proceso['Etapa2']['observaciones'], 0, 150),
	              $proceso['Etapa3']['fecha'],
	              $proceso['Etapa3']['forma_pago'],
	              '$'.number_format($proceso['Etapa3']['valor_pagar'], 2, ",", "."),
	              substr($proceso['Etapa3']['observaciones'], 0, 150),
	              $proceso['Etapa4']['fecha'],
	              (strlen($proceso['Etapa4']['pprobatorio']) > 0 ? 'SI' : 'NO'),
	              (strlen($proceso['Etapa4']['ppendientes']) > 0 ? 'SI' : 'NO'),
	              (strlen($proceso['Etapa4']['cierre_per']) > 0 ? 'SI' : 'NO'),
	              (strlen($proceso['Etapa4']['alegatos']) > 0 ? 'SI' : 'NO'),
	              (strlen($proceso['Etapa4']['sentencia']) > 0 ? 'SI' : 'NO'),
	              $proceso['Etapa4']['fecha_juz'],
	              substr($proceso['Etapa4']['observaciones'], 0, 150),
	              $proceso['Etapa5']['fecha'],
	              (strlen($proceso['Etapa5']['no_contesta']) > 0 ? 'SI' : 'NO'),
	              (strlen($proceso['Etapa5']['no_telefonos']) > 0 ? 'SI' : 'NO'),
	              (strlen($proceso['Etapa5']['se_traslado']) > 0 ? 'SI' : 'NO'),
	              (strlen($proceso['Etapa5']['no_reside']) > 0 ? 'SI' : 'NO'),
	              (strlen($proceso['Etapa5']['dr_no_existe']) > 0 ? 'SI' : 'NO'),	              
	              substr($proceso['Etapa5']['observaciones'], 0, 150),
	              '$'.number_format($capital, 2, ",", "."),
   	              '$'.number_format($intereses, 2, ",", "."),
   	              '$'.number_format($otros, 2, ",", "."),
   	              '$'.number_format($capital+$intereses+$otros, 2, ",", "."),
	            );
            echo $this->Html->tableCells($tr);
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
