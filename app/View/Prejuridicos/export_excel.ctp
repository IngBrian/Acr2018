<?php
$datos = array();
$mayor=0;
$head="<table border='0'>
        <tr>  
        <td><strong>".__('FECHA INICIO')."</strong></td>
        <td><strong>".__('DESVIACION')."</strong></td>
		<td><strong>".__('VENDEDOR')."</strong></td>
        <td><strong>".__('CEDULA')."</strong></td>
		<td><strong>".__('COMPRADOR')."</strong></td>
		<td><strong>".__('CEDULA')."</strong></td>
		<td><strong>".__('OTROS')."</strong></td>
		<td><strong>".__('UBICACION')."</strong></td>
		<td><strong>".__('ESTADO')."</strong></td>
		<td><strong>". __('TIPO DE PROPIEDAD')."</strong></td>
		<td><strong>". __('CUANTIA')."</strong></td>
		<td><strong>". __('ALCOBAS')."</strong></td>
		<td><strong>". __('TIPO DE NEGOCIO')."</strong></td>
		<td><strong>". __('FORMA DE PAGO')."</strong></td>
		<td><strong>". __('COORDINADOR')."</strong></td>
		<td><strong>". __('GESTOR ACTUAL')."</strong></td>
		<td><strong>". __('ESTRATO')."</strong></td>
		<td><strong>". __('BAÑOS')."</strong></td>
		<td><strong>". __('PARQUEADERO')."</strong></td>";
   $detalle='';
   $mayor=0;
  foreach ($prejuridicos as $prejuridico) {
	   if(!empty($prejuridico['Prejuridico']['fecha_inicio']))
	   {
	     $datetime1 = date_create($prejuridico['Prejuridico']['fecha_inicio']);
         $datetime2 = date_create(date("Y-m-d"));
         $interval = date_diff($datetime1, $datetime2);
	     $detalle.="<tr>  
        <td>".$prejuridico['Prejuridico']['fecha_inicio']."</td>
        <td>".$interval->format('%R%a days')."</td>
		<td>".$prejuridico['Ordenante']['nombre']."</td>
        <td>".$prejuridico['Ordenante']['nit']."</td>
		<td>".$prejuridico['Cliente']['nombre_completo']."</td>
		<td>".$prejuridico['Cliente']['nit_cc']."</td>
		<td>".$prejuridico['Otros']['nombre_completo']."</td>
		<td>".$prejuridico['Localidade']['nombre']."</td>
		<td>".$prejuridico['Pendiente']['nombre']."</td>
		<td>".$prejuridico['Pagaduria']['nombre']."</td>
		<td>".$prejuridico['Prejuridico']['saldo_int']."</td>
		<td>".$prejuridico['Prejuridico']['pagare']."</td>
		<td>".$prejuridico['Tproceso']['nombre']."</td>
		<td>".$prejuridico['Juzgado']['nombre_juzgado']."</td>
	    <td>".$prejuridico['Asesor1']['nombre']."</td>
		<td>".$prejuridico['Asesor2']['nombre']."</td>
		<td>".$prejuridico['Prejuridico']['pagare']."</td>
		<td>".$prejuridico['Prejuridico']['guia']."</td>
		<td>".$prejuridico['Prejuridico']['guia2']."</td>";
		
		$datos = $this->requestAction('/prejuridicos/subestado/'.$prejuridico['Prejuridico']['id']);
	    
	    if(!empty($datos))
		{
	      $c=count($datos);
		  if($c>$mayor){ $mayor=$c;} 
		  foreach ($datos as $dato) {
		   $detalle.="<td>".$dato['Subestado']['nombre']."</td>
                      <td>".$dato['PrejuridicoSubestado']['fecha']."</td>
		              <td>".$dato['PrejuridicoSubestado']['observaciones']."</td>";	 
		  }
		   
		 }else{
			 $detalle.="<td></td>
                       <td></td>
		               <td></td>"; 
			 
		 }
		 
  
		$detalle.="</tr>";
	  }
	}
    if($mayor>0){
		for($i=1;$i<=$mayor;$i++)
		{ 
		   $head.="<td><strong>". __('ETAPA')."</strong></td>
				   <td><strong>". __('FECHA')."</strong></td>
				   <td><strong>". __('OBSERVACION')."</strong></td>";
		}
	}
    echo $head.="</tr>";
    echo $detalle."</table>";
	
    header("Content-type: application/vnd.ms-excel"); 
	header("Content-Disposition: attachment; filename=procesos.xls" ); 
	header("Expires: 0"); 
	header("Cache-Control: must-revalidate, post-check=0,pre-check=0"); 
	header("Pragma: public");
	
    exit;
 ?>