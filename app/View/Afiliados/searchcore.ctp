<div class="">
    <table class="table table-condensed">
      <thead>
              <tr>
                <th colspan="3" style="color: #000000 !important;"><?= __('LISTA DE PROCESOS') ?></th>
              <tr>
			   
      </thead>
          <tbody>
		      <tr>
                <td  >Demandante</td>
				<td  >Demandado</td>
				<td  >Activar/Desactivar</td>
              <tr>
          <?php foreach($procesos as $proceso) : ?>
            <tr>
            <td ><?= $proceso['Ordenante']['nombre']?>  </td>
			<td > <?= $proceso['Cliente']['nombre_completo'] ?></td>
			<td >
			<?php 
			$datos = $this->requestAction('/Afiliados/selacceso/'.$proceso['Prejuridico']['id']);?>
			<input  type="checkbox" id="sel<?= $proceso['Prejuridico']['id']?>"  onClick="javascript:accesar(<?= $proceso['Prejuridico']['id']?>);" value="<?= $proceso['Prejuridico']['id']?>" <?php if(!empty($datos)){ echo' checked="checked"'; } ?> />  
			</td>
            
            </tr>

          <?php 
          endforeach; ?>
        </tbody>    
    </table>
</div><!-- End_Table_Responsive -->
   
 