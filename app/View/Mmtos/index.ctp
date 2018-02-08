<div class="container view-add-cliente"> 
   
    <h3> <?= __('Mantenimiento: Migracion de Datos') ?> </h3>   
	<? echo utf8_encode("* Descargar Plantilla de Ejemplo, para ajustar la información antes de cargarla al sistema.  Haciendo clic <a href='http://oficinajuridica.info/documentos/plantillamigracion_oficinajuridica.xlsx' >AQUI</a>") ; ?>
    <table>
      <tr bgcolor="#2678C5" style="color:white">
            <th><?= __('Id') ?></th>
            <th><?= __('Empresa/ Afiliado') ?></th>
            <th><?= __('Archivo') ?></th>
            <th><?= __('Fecha') ?></th>
            <th><?= __('Hora') ?></th>
            <th style="width: 40px;"> <?= __('Acciones') ?></th>
			<th></th>
      </tr>
      <?php
      foreach($mmtos as $mmto) {  
            $tr = array();
			if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
				$tr = array (
					   mb_convert_case(mb_strtolower($mmto['Mmto']['id']), MB_CASE_TITLE, "UTF-8"),
					   mb_convert_case(mb_strtolower($mmto['Afiliado']['nombreCompleto']), MB_CASE_TITLE, "UTF-8"),
					   mb_convert_case(mb_strtolower($mmto['Mmto']['nombreFile']), MB_CASE_TITLE, "UTF-8"),
					   mb_convert_case(mb_strtolower($mmto['Mmto']['fecha']), MB_CASE_TITLE, "UTF-8"),
					   mb_convert_case(mb_strtolower($mmto['Mmto']['hora']), MB_CASE_TITLE, "UTF-8"),
					   ($create ? $this->html->link('Reversar', array('controller' => 'Mmtos', 'action' => 'reversar', $mmto['Mmto']['id']) ,array('confirm' => __('Confirma realizar esta accion, se perderan los datos asociados : ').'?')) :''),
					   ($create ? $this->html->link('Ver Log', array('controller' => 'Mmtos', 'action' => 'logdata', $mmto['Mmto']['id'])) : '' ),
						   );
			}else{
				$tr = array (
					   mb_convert_case(mb_strtolower($mmto['Mmto']['id']), MB_CASE_TITLE, "UTF-8"),
					   mb_convert_case(mb_strtolower($mmto['Afiliado']['nombreCompleto']), MB_CASE_TITLE, "UTF-8"),
					   mb_convert_case(mb_strtolower($mmto['Mmto']['nombreFile']), MB_CASE_TITLE, "UTF-8"),
					   mb_convert_case(mb_strtolower($mmto['Mmto']['fecha']), MB_CASE_TITLE, "UTF-8"),
					   mb_convert_case(mb_strtolower($mmto['Mmto']['hora']), MB_CASE_TITLE, "UTF-8"),
					   '',
					   '',       
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
