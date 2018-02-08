<script>
function reply_click(click_id)
{
var id=click_id;
$(document).ready(function(){
$("span"+id).fadeToggle(1000);
});
}
$('textarea').on('change keydown paste', function(e){
    var text = $(this).val();
    var lineBreaksCount = text.replace(/[^\n]/g, "").length;
    if( e.keyCode == 13 ) {
      lineBreaksCount++;
    }
    $(this).attr('rows', lineBreaksCount+1);
});
</script>
<style>
textarea {
  background-color:rgba(white,0.2);
  border:solid 1px transparent;
  color:darken(invert($black),10%);
  overflow:hidden;
  width:500px;
  height:100px;
  overflow-y: scroll;
  overflow-x: scroll;
  &:focus {
    background-color:rgba(white,0.3);
    border-color:darken(lightblue,40%);
  }
}
</style>

<div class="container">

     <h5> <?= __('FECHA INICIO: ') ?> <? echo $proceso['Prejuridico']['fecha_inicio'] ?> </h5>  

     <h5> <?= __('ESTRATO:') ?>  <? echo $proceso['Prejuridico']['pagare'] ?> </h5>

     <h5> <?= __('FORMA DE PAGO:') ?> <? echo $proceso['Juzgado']['nombre_juzgado'] ?> </h5>

     <h5> <?= __('PARTES:') ?>
      <? echo strtoupper  ($proceso['Ordenante']['nombre']) .__(' -- ').  strtoupper($proceso['Cliente']['nombre_completo']) ?>
     </h5>

     <h5> <?= __('CUANTIA:') ?> <?= __('$').number_format($proceso['Prejuridico']['saldo_int'], 2, ',', '.') ?> </h5> 

     <h5> <?= __('DIAS ACTIVIDAD') ?>  <?= abs(strtotime($proceso['Prejuridico']['fecha_inicio'])-strtotime(date('Y-m-d')))/86400; ?> 
     </h5>

     <h5><?= __('UBICACION:') ?>  <? echo $proceso['Localidade']['nombre']?> </h5> 

     <h5> <?= __('COORDINADOR:') ?>  <?= strtoupper ($proceso['Asesor1']['nombre']) ?>
     </h5> 

     <h5> <?= __('GESTOR ACTUAL:') ?>  <?= strtoupper($proceso['Asesor2']['nombre']) ?>
     </h5> 

     <h5> <?= __('OTROS:') ?>  <?= strtoupper ($proceso['Otros']['nombre_completo']) ?>
     </h5> 

     <h5> <?= __('TIPO DE NEGOCIO:') ?> <?= strtoupper ($proceso['Tproceso']['nombre']) ?>
     </h5>

     <h5> <?= __('TIPO DE PROPIEDAD:') ?>  <?= strtoupper ($proceso['Pagaduria']['nombre']) ?>
     </h5> 
   
    <h5> <?= __('ESTADO:') ?>  <?= strtoupper ($proceso['Pendiente']['nombre']) ?>
     </h5> 
   
     <h5> <?= __('BAÑOS:') ?> <?= strtoupper ($proceso['Prejuridico']['guia']) ?>
     </h5>

     <h5> <?= __('PARQUEADEROS:') ?>  <?= strtoupper ($proceso['Prejuridico']['guia2']) ?>
     </h5> 

     <h5> <?= __('ALCOBAS:') ?>  <?= strtoupper ($proceso['Prejuridico']['ntitulo']) ?>
     </h5>

    <h5> <?= __('ETAPA FILTRO:') ?> <?= strtoupper ($proceso['Subestado']['nombre']) ?> 
    </h5> 

    <div class="form-horizontal">
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
    <!---- END BOTONES        	-->
    
    <div class="form-horizontal">

         <button type="button" id="1" class="btn btn-default" onClick="reply_click(this.id)" >Ver/Ocultar Telefonos</button>
		 
		 <?php echo $this->Html->link(
               'Registrar Telefonos',
                 array('controller' => 'Telefonos', 'action' => 'add',$proceso['Prejuridico']['id']),
                array('class'=>'btn btn-default navbar-btn'));?>

		
 
			 <span1>
			 <div class="table-responsive">
			    <?php if(!empty($telefonos)) : ?>
			    <table class="table table-condensed">
			        <thead bgcolor="#222222">
			            <tr>
			              <th><?= __('Telefono') ?></th>
			              <th><?= __('Contacto') ?></th>
			              <th><?= __('Parentesco') ?></th>
			              <th><?= __('Ver/Editar') ?></th>
			          </tr>
			        </thead>
			    
			      <tbody>
			        <?php  foreach($telefonos as $telefono) :  ?>
			          <tr>
			            <td><?= $telefono['ClientesTelefono']['telefono'] ?></td>
			            <td><?= $telefono['ClientesTelefono']['contacto'] ?></td>
			            <td><?= $telefono['Parentesco']['name'] ?></td>
			            <td> 

			          

			            <?php echo $this->Html->link(
			               'Ver/Editar',
			                 array('controller' => 'Telefonos', 'action' => 'edit',$telefono['ClientesTelefono']['id']),
			                array('class'=>'btn btn-default navbar-btn'));?>

			            <?php echo $this->Form->postLink(
			                      'Eliminar',
			                      array('controller' => 'Telefonos', 'action' => 'delete', $telefono['ClientesTelefono']['id'],$proceso['Prejuridico']['id']),
			                      array('confirm' => 'Esta Usted seguro que desea eliminar este registro?','class'=>'btn btn-default navbar-btn'));?>

			           </td>
			           </tr>
			       
			      </tbody>

			     <?php endforeach;  endif;  ?>
			    </table>
			 </span1>
			 </div>
	</div>
    <!--------END TELEFONOS----- -->

    <div class="form-horizontal">

         <button type="button" id="2" class="btn btn-default" onClick="reply_click(this.id)" >Ver/Ocultar Etapas</button>
		 
		 <?php echo $this->Html->link(
               'Registrar Etapa',
                 array('controller' => 'PrejuridicoSubestados', 'action' => 'add',$proceso['Prejuridico']['id']),
                array('class'=>'btn btn-default navbar-btn'));?>

		
 
		 <span2>
		    <?php if(!empty($prejuridicosubestados)): ?>
 			<div class="table-responsive">
		    <table class="table table-condensed">
		        <thead bgcolor="#222222">
		            <tr>
		              <th><?= __('Etapa') ?></th>
		              <th><?= __('Fecha') ?></th>
		              <th><?= __('Observacion') ?></th>
		              <th><?= __('Ver') ?></th>
		          </tr>
		        </thead>
		    
		      <tbody>
		        <?php  foreach($prejuridicosubestados as $prejuridicoSubestado) : ?>
		          <tr>
		            <td><?= $prejuridicoSubestado['Subestado']['nombre'] ?> </td>
		            <td><?= $prejuridicoSubestado['PrejuridicoSubestado']['fecha'] ?></td>
		            <td>
                <textarea rows="1" cols="40" disabled><?=(strlen($prejuridicoSubestado['PrejuridicoSubestado']['observaciones']) > 0 ? $prejuridicoSubestado['PrejuridicoSubestado']['observaciones'] : __('Ninguna Observacion Registrada en este subestado')) ?> 
                </textarea>
                </td>
		            <td> 
                    <?php echo $this->Html->link(
		                'Ver/Editar',
		                 array('controller' => 'PrejuridicoSubestados', 'action' => 'edit',$prejuridicoSubestado['PrejuridicoSubestado']['id']),
		                array('class'=>'btn btn-default navbar-btn'));?>

		                 <?php echo $this->Form->postLink(
		                'Eliminar',
		                array('controller' => 'PrejuridicoSubestados', 'action' => 'delete', $prejuridicoSubestado['PrejuridicoSubestado']['id'],$proceso['Prejuridico']['id']),
		                 array('confirm' => 'Esta Usted seguro que desea eliminar este registro?','class'=>'btn btn-default navbar-btn'));?>

		           </td>
		           </tr>
		       
		      </tbody>

		     <?php endforeach;  endif;  ?>
		    </table>
		    </div>
		 </span2>
    </div>
    <!---- END ETAPASS            -->
   
    <div class="form-horizontal">

        <button type="button" id="3" class="btn btn-default" onClick="reply_click(this.id)" >Ver/Ocultar Pagos</button>
     
    	 <?php echo $this->Html->link(
               'Registrar Pago',
                 array('controller' => 'Pagos', 'action' => 'add',$proceso['Prejuridico']['id']),
                array('class'=>'btn btn-default navbar-btn'));?>

    
 

   		 <span3>
     		<div class="table-responsive">
 	 		<? if(!empty($pagos)) : ?>
  			 <h5> <?= __('Abonos y pagos realizados') ?> </h5>
    		 <table class="table table-condensed">
     		<thead bgcolor="#222222">
		   		 <tr>
		          <th><?= __('Pago Capital') ?>   </th>
		          <th><?= __('Pago Intereses') ?> </th>
		          <th><?= __('Otros Pagos') ?>    </th>
		          <th><?= __('Valor del Pago') ?> </th>
		          <th><?= __('Fecha de Pago') ?>  </th>
		          <th> <?= __('Accion') ?>        </th>
		   		 </tr>

   			 </thead>
   			 <tbody>
   			 <?php foreach($pagos as $pago) : ?>  
      			<tr>
		             <td> <?= '$'.number_format($pago['Pago']['pago_capital'], 2, ',', '.') ?> </td>
		             <td> <?= '$'.number_format($pago['Pago']['pago_intereses'], 2, ',', '.') ?> </td>
		             <td> <?= '$'.number_format($pago['Pago']['otros_pagos'], 2, ',', '.') ?></td>
		             <td> <?= '$'.number_format($pago['Pago']['valor'], 2, ',', '.') ?> </td>
		             <td> <?= $pago['Pago']['fecha_pago'] ?> </td>
		             <td> 


             		<?php echo $this->Form->postLink(
                    'Eliminar',
                    array('controller' => 'Pagos', 'action' => 'delete', $pago['Pago']['id'],$proceso['Prejuridico']['id']),
                     array('confirm' => 'Esta Usted seguro que desea eliminar este registro?','class'=>'btn btn-default navbar-btn'));?>


            		 </td>
     			</tr>
   			 </tbody>
     		<?php endforeach; endif; ?>  
			</table>
			</div>
  		</span>
	</div>
</div>