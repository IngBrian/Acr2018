<div class="container view-add-cliente"> 
   
    <h3> <?= __('Usuarios del Sistema') ?> </h3>   

    <table>
      <tr bgcolor="#2678C5" style="color:white">
            <th><?= __('Id') ?></th>
            <th><?= __('Nombre Completo') ?></th>
            <th><?= __('Apellidos') ?></th>
            <th><?= __('E-Mail') ?></th>
            <th><?= __('Empresa-Afiliado') ?></th>
            <th><?= __('Perfil') ?></th>
            <th><?= __('Nombre Usuario') ?></th>
            <th style="width: 40px;"> <?= __('Acciones') ?></th>
			<th></th>
      </tr>
      <?php
      foreach($usuarios as $usuario) {  
            $tr = array();
			if($usuario['Usuario']['id_tipo_usuario']==1){
				$tr = array (
					   mb_convert_case(mb_strtolower($usuario['Usuario']['id']), MB_CASE_TITLE, "UTF-8"),
					   mb_convert_case(mb_strtolower($usuario['Usuario']['nombre_completo']), MB_CASE_TITLE, "UTF-8"),
					   mb_convert_case(mb_strtolower($usuario['Usuario']['apellidos']), MB_CASE_TITLE, "UTF-8"),
					   mb_convert_case(mb_strtolower($usuario['Usuario']['email']), MB_CASE_TITLE, "UTF-8"),
					   mb_convert_case(mb_strtolower($usuario['Afiliado']['nombreCompleto']), MB_CASE_TITLE, "UTF-8"),
					   mb_convert_case(mb_strtolower(Perfils($usuario['Usuario']['id_tipo_usuario'])), MB_CASE_TITLE, "UTF-8"),
					   $usuario['Usuario']['username'],
					   ($create ? $this->html->link('Editar', array('controller' => 'Usuarios', 'action' => 'edit', $usuario['Usuario']['id'])) : '' ),
					   '',       
						   );
			}else{
				$tr = array (
					   mb_convert_case(mb_strtolower($usuario['Usuario']['id']), MB_CASE_TITLE, "UTF-8"),
					   mb_convert_case(mb_strtolower($usuario['Usuario']['nombre_completo']), MB_CASE_TITLE, "UTF-8"),
					   mb_convert_case(mb_strtolower($usuario['Usuario']['apellidos']), MB_CASE_TITLE, "UTF-8"),
					   mb_convert_case(mb_strtolower($usuario['Usuario']['email']), MB_CASE_TITLE, "UTF-8"),
					   mb_convert_case(mb_strtolower($usuario['Afiliado']['nombreCompleto']), MB_CASE_TITLE, "UTF-8"),
					   mb_convert_case(mb_strtolower(Perfils($usuario['Usuario']['id_tipo_usuario'])), MB_CASE_TITLE, "UTF-8"),
					   $usuario['Usuario']['username'],
					   ($create ? $this->html->link('Editar', array('controller' => 'Usuarios', 'action' => 'edit', $usuario['Usuario']['id'])) : '' ),
					   ($create ? $this->Form->postLink('Eliminar', array('controller' => 'Usuarios', 'action' => 'delete', $usuario['Usuario']['id']),
		array('confirm' => __('Confirma eliminar el usuario: ').$usuario['Usuario']['username'].'?')) :''),       
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
