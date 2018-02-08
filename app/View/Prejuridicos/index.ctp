<?$var=2;$var2=100;$var1=200;$var3=300;?>
<style>
@-moz-document url-prefix() {
  fieldset { display: table-cell; }
}
td{padding: 2px;}

.btn.btn-default.navbar-btn {
    margin-top: 1px;
}
.form-inline .form-control {
    display: inline-block;
    vertical-align: middle;
    width: 100%;
}
</style>
<script>
function reply_click(clicked_id,clicked_id2,clicked_id1,clicked_id3)
{
var variable=clicked_id;
var variable2=clicked_id2;
var variable1=clicked_id1;
var variable3=clicked_id3;
$(document).ready(function(){
$("#"+variable).toggle();
$("#"+variable2).toggle();
$("#"+variable1).toggle();
$("#"+variable3).toggle();
});



}
</script>
 <div class="container">
<?php echo $this->Form->create("Prejuridico", ['action' => 'search','class'=>'form-inline']);?> 
<div class="row"> 
    <div class="col-xs-12 col-md-3">
	    <? echo $this->Form->input('criterio',array('options' => $options, 'type' => 'select', 'empty' => 'Seleccione', 'label' => false,'class'=>'form-control')) ?>
	  </div>
	  
	   <div class="col-xs-12 col-md-3">
	  <? echo $this->Form->input('valor', array('label' => '', 'id' => 'search_value', 'class' => 'form-control', 'placeholder' => 'Digite criterio a buscar', 'label' => false))
         ?>
	  </div>
	   <div class="col-xs-12 col-md-1">
	    <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Buscar']) ?> 
	  </div>
	   <div class="col-xs-12 col-md-2">
	  <?php echo $this->Html->link(
     'EXPORTAR PROCESOS',
     array('controller' => 'Prejuridicos', 'action' => 'export_excel'),
     array('class'=>'btn btn-default navbar-btn'));?>
	  </div>
	   <div class="col-xs-12 col-md-2">
	    <?php echo $this->Html->link(
     'EXPORTAR PAGOS',
     array('controller' => 'Prejuridicos', 'action' => 'excelpagos'),
     array('class'=>'btn btn-default navbar-btn'));?>
	  </div>
	  
	  
	</div>

 
 
<div class="">
    <table class="table table-condensed">
      <thead bgcolor="#222222">
              <tr>
                <th colspan="3"><?= __('ACTIVIDAD') ?></th>
              <tr>
      </thead>
          <?php
          $saldo_pagina=0;
          ?>

        <tbody>
          <?php 
		 
		   foreach($procesos as $proceso) : ?>
          
            <tr>
            
              <td id=<?=$var?> style="cursor: pointer;"onClick="reply_click(<?=$var?>,<?=$var2?>,<?=$var1?>,<?=$var3?>)"  align="left" ><?= $proceso['Ordenante']['nombre']?> -- <?= $proceso['Cliente']['nombre_completo'] ?> </td>

              
              
              <?php 
              $fecha_inicio=$proceso['Prejuridico']['fecha_inicio'];
              $pagare=$proceso['Prejuridico']['pagare'];
              $nombre_juzgado=$proceso['Juzgado']['nombre_juzgado'];
              $partes=$proceso['Ordenante']['nombre'].' -- '.$proceso['Cliente']['nombre_completo'];
              $cuantia=$proceso['Prejuridico']['saldo_int'];
              $dias_actividad=abs(strtotime($proceso['Prejuridico']['fecha_inicio'])-strtotime(date('Y-m-d')))/86400;
              $ubicacion=$proceso['Localidade']['nombre'];
              $gestor_inicial=$proceso['Asesor1']['nombre'];
              $gestor_actual=$proceso['Asesor2']['nombre'];
              $otros=$proceso['Otros']['nombre_completo'];
              $pagaduria=$proceso['Pagaduria']['nombre'];
              $citaciones=$proceso['Prejuridico']['guia'];
              $aviso=$proceso['Prejuridico']['guia2'];
              $obligacion=$proceso['Prejuridico']['ntitulo'];
              $etapa=$proceso['Subestado']['nombre'];
              $id=$proceso['Prejuridico']['id'];
              $Pendiente=$proceso['Pendiente']['nombre'];
			  $tipoacto=$proceso['Tproceso']['nombre'];
			  
              ?>
              <td colspan="3" onClick="reply_click(<?=$var?>,<?=$var2?>)"   style="cursor: pointer;">
              <div  style="display:none;" id=<?=$var2?>  align="justify"  >
              
              <p align="justify"><b>FECHA INICIO </b> <?php echo $fecha_inicio ?></p>
              <p align="justify"><b>N° FACTURA </b><?php echo $pagare ?></p>
              <p align="justify"><b>ENTIDAD </b><?php echo $nombre_juzgado ?></p>
              <p align="justify"><b>PARTES </b>  <?php echo $partes ?></p>
              <p align="justify"><b>CUANTIA </b><?php echo $cuantia ?></p>
              <p align="justify"><b>DIAS ACTIVIDAD </b><?php echo $dias_actividad ?></p>
              <p align="justify"><b>UBICACION </b>  <?php echo $ubicacion ?></p>
              <p align="justify"><b>GESTOR INICIAL </b><?php echo $gestor_inicial ?></p>
              <p align="justify"><b>GESTOR ACTUAL </b>  <?php echo $gestor_actual ?></p>
              <p align="justify"><b>OTROS </b><?php echo $otros ?></p>
			   <p align="justify"><b>TIPO DE ACTO </b><?php echo $tipoacto ?></p>
			  <p align="justify"><b>PENDIENTE </b><?php echo $Pendiente ?></p>
		
              <p align="justify"><b>RELACIONADOS </b><?php echo $pagaduria ?></p>
              <p align="justify"><b>N° MATRICULA </b><?php echo $citaciones ?></p>
              <p align="justify"><b>FECHA ESCRITURA </b>  <?php echo $aviso ?></p>
              <p align="justify"><b>ESCRITURA </b><?php echo $obligacion ?></p>
              <p align="justify"><b>ETAPA FILTRO </b><?php echo $etapa ?></p>

              <?php $var=$var+1; $var2=$var2+1; $var1=$var1+1;$var3=$var3+1;?>
               
               <div class="form-horizontal">

               <?php echo $this->Html->link(
               'Ver Proceso',
                 array('controller' => 'Prejuridicos', 'action' => 'view',$proceso['Prejuridico']['id']),
                array('class'=>'btn btn-default navbar-btn'));?>

               <?php echo $this->Html->link(
               'Ver Bitacora',
                 array('controller' => 'Prejuridicos', 'action' => 'bitacora',$proceso['Prejuridico']['id'], 'ext' => 'pdf'),
                array('class'=>'btn btn-default navbar-btn'));?>

                
               <?php echo $this->Html->link(
               'Editar',
                 array('controller' => 'Prejuridicos', 'action' => 'edit',$proceso['Prejuridico']['id']),
                array('class'=>'btn btn-default navbar-btn'));?>
                

                
               <?php echo $this->Html->link(
               'Galeria',
                 array('controller' => 'gallery', 'action' => 'index',$proceso['Prejuridico']['id']),
                array('class'=>'btn btn-default navbar-btn'));?>

                


                </div>

                

        </div>
        </td>
        </tr>

          <?php 
            $saldo_pagina +=$proceso['Prejuridico']['saldo_int'];
          endforeach; ?>

        </tbody>    
    </table>
</div><!-- End_Table_Responsive -->
    <div class="saldo">
      <h5><?= __('Saldo Insoluto Total Por Página $'.number_format($saldo_pagina, 2, ",", ".")) ?></h5>
      
      <h5><?= __(''.$total_p.' Procesos Encontrados en Sistema.') ?></h5>
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