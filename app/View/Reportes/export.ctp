<style>

td{border:solid 1px}

</style>

<div class="search-view"> 
   <table> 
        <tr>
	      	<td width="190px" style="border:solid 1px"><?= __('Recepcion') ?></td>
	      	<td width="500px" style="border:solid 1px"><?= __('Ordenante') ?></td>
	      	<td width="500px" style="border:solid 1px"><?= __('Ordenado') ?></td>
	      	<td width="500px" style="border:solid 1px"><?= __('Ordenado') ?></td>
	      	<td width="500px" style="border:solid 1px"><?= __('Relacionado') ?></td>
	      	<td width="500px" style="border:solid 1px"><?= __('T. Proceso') ?></td>
	      	<td width="50px" style="border:solid 1px"><?= __('Dias Desviacion') ?></td>
	      	<td width="60px" style="border:solid 1px"><?= __('Titulo') ?></td>
	      	<td width="50px" style="border:solid 1px"><?= __('Camara') ?></td>
	      	<td width="50px" style="border:solid 1px"><?= __('Poder') ?></td>
	      	<td width="50px" style="border:solid 1px"><?= __('Anexos') ?></td>
	      	<td width="50px" style="border:solid 1px"><?= __('Bienes') ?></td>
	      	<td width="150px" style="border:solid 1px"><?= __('Saldo Insoluto') ?></td>
	      	<td width="120px" style="border:solid 1px"><?= __('Fecha') ?></td>
	      	<td width="900px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	      	<td width="480px" style="border:solid 1px"><?= __('Autoridad') ?></td>
	      	<td width="30px" style="border:solid 1px"><?= __('Archivo') ?></td>
	      	<td width="120px" style="border:solid 1px"><?= __('Fecha') ?></td>
	       	<td width="800px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	        <td width="30px" style="border:solid 1px"><?= __('Archivo') ?></td>
            <td width="120px" style="border:solid 1px"><?= __('Fecha') ?></td>
	       	<td width="800px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	        <td width="30px" style="border:solid 1px"><?= __('Archivo') ?></td>
	        <td width="120px" style="border:solid 1px"><?= __('Citacion') ?></td>
	       	<td width="120px" style="border:solid 1px"><?= __('Aviso') ?></td>
	        <td width="120px" style="border:solid 1px"><?= __('Emplzto') ?></td>
	        <td width="120px" style="border:solid 1px"><?= __('Recurso') ?></td>
	       	<td width="120px" style="border:solid 1px"><?= __('Nulidad') ?></td>
	        <td width="120px" style="border:solid 1px"><?= __('Contestacion') ?></td>
	        <td width="120px" style="border:solid 1px"><?= __('Excepciones') ?></td>
	       	<td width="250px" style="border:solid 1px"><?= __('Curador') ?></td>
	        <td width="800px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	      	<td width="120px" style="border:solid 1px"><?= __('Fecha') ?></td>
	       	<td width="800px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	        <td width="30px" style="border:solid 1px"><?= __('Archivo') ?></td>
	      	<td width="120px" style="border:solid 1px"><?= __('Liq. Credito') ?></td>
	       	<td width="120px" style="border:solid 1px"><?= __('Costes') ?></td>
	        <td width="800px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	       	<td width="120px" style="border:solid 1px"><?= __('Fecha Avaluo') ?></td>
	       	<td width="120px" style="border:solid 1px"><?= __('Aprobacion') ?></td>
	        <td width="800px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	        <td width="120px" style="border:solid 1px"><?= __('Fecha') ?></td>
	        <td width="800px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	        <td width="120px" style="border:solid 1px"><?= __('Fecha') ?></td>
	        <td width="800px" style="border:solid 1px"><?= __('Observaciones') ?></td>
	        <td width="120px" style="border:solid 1px"><?= __('Fecha') ?></td>
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
     foreach($procesos as $proceso) {
	       	$capital = 0; $intereses = 0; $otros = 0; 
	       	foreach($proceso['Pago'] as $pago){
		      	$capital += $pago['pago_capital'];
		      	$intereses += $pago['pago_intereses']; 
		      	$otros += $pago['otros_pagos'];
	         	}
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
	              (strlen($proceso['Proceso']['doc_r']) > 0 ? 'SI' : 'NO'),
	              
	              '$'.number_format($proceso['Proceso']['saldo_insoluto'], 2, ",", "."),
	              $proceso['Demanda']['fecha_demanda'],
	              $proceso['Demanda']['observacion'],
   	              (!empty($proceso['Demanda']['Juzgado']) ? strtolower($proceso['Demanda']['Juzgado']['nombre_juzgado']) : ''),
   	              '',
   	              $proceso['Mandamiento']['fecha_mandamiento'],
   	              substr($proceso['Mandamiento']['observacion'], 0, 85),
   	              '',
   	              $proceso['Embargo']['fecha_embargo'],
   	              substr($proceso['Embargo']['observacion'], 0, 85),
   	              '',
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
   	              '',
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
            echo $this->Html->tableCells($tr);
      }
      ?>
    </table>
    
    <div class="saldo">
	    <h5><?= __('Saldo Total en Cartera $'.number_format($total, 2, ",", ".")) ?></h5>
    </div>
    
</div>
