
<div class="container view-add-cliente">
    <div class="container view-edit-usuario">
         <h3> <?= __("Editar Usuario") ?> </h3> 

        <div class="thirteen columns columnscenter ">
          <?=  $this->Form->create('Usuario', array('action' => 'edit')) ?>
        <ul >
		<li style="float:left; width:100%; "><?= $this->Form->input('empresa', array('options' => $afiliados, 'type' => 'select', 'empty' => '<< Empresa / Afiliado >>', 'label' =>false,'class' => 'required', 'id' => 'empresa', 'value' => $usuario[0]['Usuario']['empresa'])) ?></li>
		<li><?= $this->Form->input('id_tipo_usuario', array('options' => $tipo_user2, 'type' => 'select', 'empty' => '<< Seleccione Tipo de Usuario >>', 'label' => false,  'class' => 'required', 'value' => $usuario[0]['Usuario']['id_tipo_usuario'], 'id' => 'id_tipo_usuario')) ?></li> <br>
		 <li> <?= $this->Form->input('id',   array('class' => 'required', 'type' => 'hidden', 'value' => $usuario[0]['Usuario']['id'])) ?> </li> 
		 <li style="float:left; width:100%; "> <?= $this->Form->input('cc_nit', array('class' => 'required', 'label'=>false,'placeholder' => 'CC / Nit', 'value' => $usuario[0]['Usuario']['cc_nit'])) ?></li> 

		 <li> <?= $this->Form->input('nombre_completo', array('class' => 'required','label'=>false, 'placeholder' => 'Nombre Completo','value' => $usuario[0]['Usuario']['nombre_completo'])) ?></li>

		<li> <?= $this->Form->input('apellidos', array('label' => 'Apellidos: ' ,'label'=>false, 'placeholder' => 'Apellidos', 'value' => $usuario[0]['Usuario']['apellidos'])) ?></li>
		<li> <?= $this->Form->input('email', array('label' =>false , 'placeholder' => 'ej: email@email.com', 'value' => $usuario[0]['Usuario']['email'])) ?></li>

		<li> <?= $this->Form->input('username', array('label' => false,'class' => 'required', 'placeholder' => 'ej: miusername', 'value' => $usuario[0]['Usuario']['username'])) ?></li>

		<li> <?= $this->Form->input('password', array('label' => false,'class' => 'required', 'placeholder' => '*******')) ?></li>
		 <li><?= $this->Form->input('Id_Asesor', array('options' => $asesor2, 'type' => 'select', 'empty' => '<< Seleccione Asesor >>', 'label' => false, 'value' => $usuario[0]['Usuario']['Id_Asesor'], 'id' => 'Id_Asesor')) ?></li>
    </ul>    
        <?= $this->Form->end(__('Guardar Datos'))?>
        </div>
    </div>
</div>