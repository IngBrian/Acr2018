<div class="clientes-view"> 
    
    <div class="options">
        <?= ($create ? $this->Html->link($this->Html->image("../img/bafiliadosnuevos.png", array("alt" => "nuevos")), "/afiliados", array('escape' => false)): '') ?>
        <? echo $this->Html->link($this->Html->image("../img/back.png", array("alt" => "regresar")), '/menus', array('escape' => false)) ?>
    </div>
    
    <h3> <?= __('Listado de Afiliados-Suscriptores Activos') ?> </h3>   
    
    <?php 
        echo $this->Form->create("Afiliado", array('action' => 'search_activos'));
        $options = array(
            '1' => 'Cedula',
            '2' => 'Nombre'
        );
    ?>
    
    <ul>
        
        <li> <? echo $this->Form->input('search_criteria',array('options' => $options, 'type' => 'select', 'empty' => 'Listar Todos', 'label' => 'Buscar en')) ?> </li>
        <li> <? echo $this->Form->input('search_value', array('label' => '', 'class' => 'medium-text', 'placeholder' => 'Digite criterio a buscar')) ?> </li>
        <li> <? echo $this->Form->end(__('Buscar')) ?> </li>
       </li>
    </ul>

    <table>
      <tr bgcolor="#2678C5" style="color:white">
            <th><?= __('Nombre o Razon Social') ?></th>
            <th><?= __('Direccion') ?></th>
            <th><?= __('Telefonos') ?></th>
            <th><?= __('E-Mail') ?></th>
            <th><?= __('Usuario-Admin') ?></th>
            <th><?= __('# Usuarios') ?></th>
            <th><?= __('# Procesos') ?></th>
            <th><?= __('# Ordenados') ?></th>
            <th><?= __('# Archivos') ?></th>
            <th></th>
            <th></th>
      </tr>
      <?php
      
      foreach($afiliados as $afiliado) {  
            
            $tr = array (
              mb_convert_case(mb_strtolower($afiliado['Afiliado']['nombreCompleto']), MB_CASE_TITLE, "UTF-8"),
              $afiliado['Afiliado']['direccion'].", ".$afiliado['Afiliado']['ciudad'],
              $afiliado['Afiliado']['telefonos']." Cel: ".$afiliado['Afiliado']['celular'],
              $afiliado['Afiliado']['email'],
              $afiliado['Afiliado']['nusuario'],
              estadisticosAfiliados(1,$afiliado['Afiliado']['id']),
              estadisticosAfiliados(2,$afiliado['Afiliado']['id']),
			  estadisticosAfiliados(3,$afiliado['Afiliado']['id']), 
			  estadisticosAfiliados(4,$afiliado['Afiliado']['id']), 
            );
            
            $className = (!empty($proceso['Proceso']['problemas_caso']) ? 'problems' : '');
            echo $this->Html->tableCells($tr, array('class' => $className));
      }
      ?>
    </table>
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
