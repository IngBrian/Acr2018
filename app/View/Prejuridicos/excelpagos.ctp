<?php

echo"<table border='1'>
  <tr>  
        <td><strong>".__('OTORGANTE I')."</strong></td>
        <td><strong>".__('CEDULA')."</strong></td>
		<td><strong>".__('OTORGANTE II')."</strong></td>
        <td><strong>".__('CEDULA')."</strong></td>
		<td><strong>". __('N° FACTURA')."</strong></td>
		<td><strong>".__('FECHA DE PAGO')."</strong></td>
		<td><strong>".__('PAGO CAPITAL')."</strong></td>
		<td><strong>".__('OTROS PAGOS')."</strong></td>
		<td><strong>".__('PAGO INTERESES')."</strong></td>
		<td><strong>". __('OBSERVACION')."</strong></td>
	</tr>";
  
  foreach ($pagos as $pago) {
      echo"<tr>  
        <td>".$pago['Prejuridico']['Ordenante']['nombre']."</td>
        <td>".$pago['Prejuridico']['Ordenante']['nit']."</td>
		<td>".$pago['Prejuridico']['Cliente']['nombre_completo']."</td>
        <td>".$pago['Prejuridico']['Cliente']['nit_cc']."</td>
		<td>".$pago['Prejuridico']['pagare']."</td>
		<td>".$pago['Pago']['fecha_pago']."</td>
		<td>".$pago['Pago']['pago_capital']."</td>
		<td>".$pago['Pago']['otros_pagos']."</td>
		<td>".$pago['Pago']['pago_intereses']."</td>
		<td>".$pago['Pago']['observa']."</td>
	</tr>";
	 

}
  
  
  
  echo "</table>";


header("Content-type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=pagos.xls" ); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0,pre-check=0"); 
header("Pragma: public");
exit;
 ?>