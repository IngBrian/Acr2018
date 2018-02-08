<style>
span{
color: black;
height: auto;

}
</style>
<div class="container">
    <span ><?= __('DATOS BASICO') ?><span>
     <?=  $this->Form->create('Afiliado', ['action' => 'edit/'.$afiliado['Afiliado']['id'],'class'=>'form-horizontal']) ?>
	       
			<div class="col-sm-7">

			<?= $this->Form->hidden('id', array('value'=>$afiliado['Afiliado']['id'],'label'=>false)) ?>

			<?= $this->Form->input('identificacion', array('placeholder'=>'Identificacion','value'=>$afiliado['Afiliado']['identificacion'],'label'=>false,'class'=>'form-control','readonly'=>'readonly')) ?>

			<?= $this->Form->input('nombreCompleto', array('placeholder'=>'Nombre','value'=>$afiliado['Afiliado']['nombreCompleto'],'label'=>false,'class'=>'form-control')) ?>

			<?= $this->Form->input('direccion', array('class' => 'required', 'placeholder'=>'Direccion','value'=>$afiliado['Afiliado']['direccion'],'label'=>false,'class'=>'form-control')) ?>

			<?= $this->Form->input('telefonos',array('placeholder'=>'telefono','value'=>$afiliado['Afiliado']['telefonos'],'label'=>false,'class'=>'form-control')) ?>

            <?php if($user['role']=='sadmin'):?>
			<?php 
			echo $this->Form->input('email', array('placeholder' => 'Email' , 'placeholder' => 'ej: email@email.com','value'=>$afiliado['Afiliado']['email'],'label'=>false,'class'=>'form-control')) ?>
			
			 <?php endif;?>
               <?php if($user['role']!='sadmin' or $user['role']!='administrator'):?>
            <?= $this->Form->input('role', array('options'=>$options,'label'=>false,'class'=>'form-control',
			'default'=>$userol,name=>'role')); ?>
			
			 <?php endif;
			
			 ?>
			 <span >Suspender </span><input type="checkbox" name="EstadoGlobal" 
			 <?php if(intval($estado)===1){ echo 'checked="checked"';} ?>>
			 <input type="hidden" name="bdGlobal" value='<?=$afiliado['Afiliado']['id']?>'>
			   
			<?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Editar']) ?> 
          <br><br>
	    <span ><?= __('BUSCAR PROCESOS PARA ASIGNAR') ?><span>
	<br>
<?php echo $this->Form->create("Afiliados" ,['class'=>'form-horizontal','action' => 'searchcore']);?> 
      <div class="col-sm-7">  
         <table style='width: auto !important;'>
			 <tr>
			 <td>
		  <? echo $this->Form->input('ordenante_id', array('options'=> $ordenantes, 'type' => 'select', 'empty' => '<< Seleccione Demandante >>', 'label' =>false, 'id' => 'ordenante_criteria','placeholder'=>'Selecione Ordenante','class'=>'form-control')) ?>
		     </td>
			</tr>
           <tr>
			 <td>
			 
              <? echo $this->Form->input('cliente_id', array('options'=> $cliente, 'type' => 'select', 'empty' => '<< Seleccione Demandado >>', 'label' =>false, 'id' => 'cliente_criteria','placeholder'=>'Selecione Demandado','class'=>'form-control')) ?>
            </td>
			</tr>
			
			<tr>
			 <td>
             <? echo $this->Form->input('abogado', array('options' => $asesores,'type' => 'select', 'empty' => '<< Seleccione Gestor >>', 'label' =>false,'id'=>'asesor_criteria','placeholder'=>'Seleccione Gestor','class'=>'form-control')) ?> 
          </td>
		  </tr>
		  
		  
		  <tr>
			 <td>
             <?= $this->Form->input('tproceso_id', array('options' => $tprocesos, 'type' => 'select', 'empty' => '<< Seleccione Tipo de Proceso >>', 'label' => false, 'id' => 'tproceso','class'=>'form-control')) ?>
             </td>
			</tr>
           <tr>
			 <td>
             <?= $this->Form->input('ubicacion_id', array('options' => $ubicaciones, 'type' => 'select', 'empty' => '<< Seleccione Ubicacion >>', 'label' => false, 'id' => 'ubicacion','class'=>'form-control')) ?> 
         </td>
		  </tr>
		  
		  
		  <tr>
			 <td>
              <?= $this->Form->input('pagaduria_id', array('options' => $pagadurias, 'type' => 'select', 'empty' => '<< Seleccione Relacionado >>', 'label' => false, 'id' => 'pagaduria','class'=>'form-control')) ?>
               </td>
			</tr>
              <tr>
			 <td>
             <?= $this->Form->input('juzgado_id', array('options' => $juzgados, 'type' => 'select', 'empty' => '<< Seleccione Autoridad >>', 'label' => false, 'id' => 'juzgado','class'=>'form-control')) ?>
            </td>
		  </tr>
		  <tr>
			 <td>
             <? echo $this->Form->input('subestado_id', array('options' => $subestados, 'type' => 'select', 'empty' => '<< Seleccione Etapa-Filtro >>', 'label' => false, 'id' =>'subestado','class'=>'form-control')) ?>
              </td>
			</tr>
              <tr>
			 <td>
             <?= $this->Form->input('QtyDMora', array('options' => $options_desv, 'type' => 'select', 'empty' => '<< Seleccione Dias de Desviacion >>', 'label' => false, 'id' =>'desviacion','class'=>'form-control')) ?>
            </td>
		  </tr>
		  
              <tr>
			 <td>
			 <button style='color:#000000' type="button" id="boton_entrada" onClick="javascript:buscar();">BUSCAR PROCESOS</button>
		   <?php echo $this->Form->end() ?>
		   <tr>
		   <td>
			
			</td>
		  </tr> 
      </table> 	 
    </div>
    </div><div id='resultado' style="color: #000000 !important;"></div>
</div>

<script>
buscar();
function buscar(){
	   var dataString = $('#AfiliadosSearchcoreForm').serialize();
		$.ajax({
		type: "POST",
		url: "/Afiliados/searchcore/",
		data: dataString,
		beforeSend: function(){
		
		},
	    success: function(data){ 
		 $('#resultado').html(data);
		}
	});
}  
function accesar(id){
var estado;
	if( $('#sel'+id).is(':checked') ){
	  estado=1;
	} else {
	  estado=0;
	}
  $.ajax({
		type: "POST",
		url: "/Afiliados/accesar/"+id+"/"+estado,
		beforeSend: function(){},
	    success: function(data){ 
	    }
	});
}

</script>