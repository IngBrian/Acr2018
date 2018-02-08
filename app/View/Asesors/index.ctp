<?$var=2;$var2=100;?>
<script>
function reply_click(clicked_id,clicked_id2)
{
var variable=clicked_id;
var variable2=clicked_id2;
$(document).ready(function(){
$("#"+variable).toggle();
$("#"+variable2).toggle();
});
}
</script>
<div class="container">
    
    <?php 
        echo $this->Form->create("Asesor",['action' => 'search','class'=>'form-inline']);
        $options = array(
            'cedula' => 'Identificacion',
            'nombre' => 'Nombre'
        );
    ?>
    <div class="form-group">
    <? echo $this->Form->input('criterio',array('options' => $options, 'type' => 'select', 'empty' => 'Seleccione', 'label' => false,'class'=>'form-control')) ?> 
    </div>
    <div class="form-group">
    <? echo $this->Form->input('valor', array('label' => '', 'class' => 'form-control', 'placeholder' => 'Digite criterio a buscar')) ?>
    </div>
    <div class="form-group">
    <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Buscar']) ?> 
    </div>
    
    <br>

<div class="">
    <table class="table">
      <thead bgcolor="#222222">
            <tr>
              <th colspan="3"><?= __('NOMBRE') ?></th>
          </tr>
      </thead>
    
      <tbody>

         <?php  foreach($asesores as $asesor) : ?>
          <tr>
             <td  id=<?=$var?> style="cursor: pointer;" onClick="reply_click(<?=$var?>,<?=$var2?>)"><?= $asesor['Asesor']['nombre'] ?></td>
              <?php 
              $cedula=$asesor['Asesor']['cedula'];
              $nombre=$asesor['Asesor']['nombre'];
              $direccion=$asesor['Asesor']['direcion'];
              $telefono=$asesor['Asesor']['telefono'];
              $email=$asesor['Asesor']['email'];
              ?>
              <td onClick="reply_click(<?=$var?>,<?=$var2?>)"   style="cursor: pointer;">
              <div  style="display:none;" id=<?=$var2?>  align="left"  >
              <p align="justify"><b>CEDULA</b> <?php echo $cedula ?></p>
              <p align="justify"><b>NOMBRE </b><?php echo $nombre?></p>
              <p align="justify"><b>DIRECCION </b><?php echo  $direccion ?></p>
              <p align="justify"><b>TELEFONO </b>  <?php echo $telefono ?></p>
              <p align="justify"><b>EMAIL </b><?php echo $email ?></p>
              <?php $var=$var+1;$var2=$var2+1;?>

                
                     <?php echo $this->Form->postLink(
                      'Eliminar',
                      array('controller' => 'Asesors', 'action' => 'delete', $asesor['Asesor']['id']),
                      array('confirm' => 'Esta Usted seguro que desea eliminar este registro?','class'=>'btn btn-default navbar-btn'));?>

                      <?php echo $this->Html->link(
                      'Editar',
                      array('controller' => 'Asesors', 'action' => 'edit', $asesor['Asesor']['id']),
                      array('class'=>'btn btn-default navbar-btn'));?>



              </div>
              </td>

           </tr>
       
       </tbody>

        <?php endforeach;  ?>
  </table>
</div><!-- End_Table_Responsive -->
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




















