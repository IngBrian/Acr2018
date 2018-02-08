<div class="container view-add-cliente"> 

    <h3> <?= __('Perfiles del Sistema') ?> </h3>   

    <table>
      <tr bgcolor="#2678C5" style="color:white">
            <th><?= __('Nombre de Perfil') ?></th>
            <th><?= __('Empresa/Afiliado') ?></th>
            <th><?= __('Fecha Registro') ?></th>
            <th><?= __('Hora  Registro') ?></th>
            <th style="width: 40px;"> <?= __('Acciones') ?></th>
			<th></th>
      </tr>
      <?php //print_r($tipo_usuario);
      foreach($tipo_usuario as $tipo_usuar) {  
            $tr = array();
			if($tipo_usuar['TipoUsuario']['id']==1){
				$tr = array (
				   mb_convert_case(mb_strtolower($tipo_usuar['TipoUsuario']['nombre_tipo']), MB_CASE_TITLE, "UTF-8"),
				   mb_convert_case(mb_strtolower($tipo_usuar['Afiliado']['nombreCompleto']), MB_CASE_TITLE, "UTF-8"),
				   mb_convert_case(mb_strtolower($tipo_usuar['TipoUsuario']['fecha_registro']), MB_CASE_TITLE, "UTF-8"),
				   mb_convert_case(mb_strtolower($tipo_usuar['TipoUsuario']['hora_registro']), MB_CASE_TITLE, "UTF-8"),
				   ($create ? $this->html->link('Editar', array('controller' => 'Perfils', 'action' => 'edit', $tipo_usuar['TipoUsuario']['id'])) : '' ),
				   '',       
                       );
			}else{
				$tr = array (
				   mb_convert_case(mb_strtolower($tipo_usuar['TipoUsuario']['nombre_tipo']), MB_CASE_TITLE, "UTF-8"),
				   mb_convert_case(mb_strtolower($tipo_usuar['Afiliado']['nombreCompleto']), MB_CASE_TITLE, "UTF-8"),
				   mb_convert_case(mb_strtolower($tipo_usuar['TipoUsuario']['fecha_registro']), MB_CASE_TITLE, "UTF-8"),
				   mb_convert_case(mb_strtolower($tipo_usuar['TipoUsuario']['hora_registro']), MB_CASE_TITLE, "UTF-8"),
				   ($create ? $this->html->link('Editar', array('controller' => 'Perfils', 'action' => 'edit', $tipo_usuar['TipoUsuario']['id'])) : '' ),
				   ($create ? $this->Form->postLink('Eliminar', array('controller' => 'Perfils', 'action' => 'delete', $tipo_usuar['TipoUsuario']['id']),
    array('confirm' => __('Confirma eliminar el perfil: ').$tipo_usuar['TipoUsuario']['nombre_tipo'].'?')) :''),       
                       );
			}
      		echo $this->Html->tableCells($tr, $className, $className);
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
