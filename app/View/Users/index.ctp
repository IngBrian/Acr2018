<?$var=2;$var2=100;?>

<script >
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
        echo $this->Form->create("User", ['action' => 'search','class'=>'form-inline']);
        $options = array(
            'cc_nit' => 'Identificacion',
            'nombre_completo' => 'Nombre'
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
        <?php  foreach($users as $user) : ?>
          <tr>

          <td id=<?=$var?> style="cursor: pointer;" onClick="reply_click(<?=$var?>,<?=$var2?>)" ><?= $user['User']['nombre_completo'] ?></td>

          <?php
          $name=$user['User']['nombre_completo'];
          $empresa=$user['Afiliado']['nombreCompleto'];
          $rol=$user['User']['role'];
          ?>

          <td onClick="reply_click(<?=$var?>,<?=$var2?>)"   style="cursor: pointer;">
              <div  style="display:none;" id=<?=$var2?>  align="left"  >
                
                <p align="justify"><b>NOMBRE </b><?php echo $name ?></p>
                <p align="justify"><b>EMPRESA </b><?php echo $empresa ?></p>
                <p align="justify"><b>ROL </b>  <?php echo $rol ?></p>
                <?php $var=$var+1;$var2=$var2+1;?>

            <?php echo $this->Form->postLink(
                      'Eliminar',
                      array('controller' => 'Users', 'action' => 'delete', $user['User']['id']),
                      array('confirm' => 'Esta Usted seguro que desea eliminar este registro?','class'=>'btn btn-default navbar-btn'));?>

                      <?php echo $this->Html->link(
                      'Editar',
                      array('controller' => 'Users', 'action' => 'edit', $user['User']['id']),
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
