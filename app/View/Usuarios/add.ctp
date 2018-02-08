   
<div class="container view-add-cliente">
    <div class="container">
         <h3> <?= __("Nuevo Usuario") ?> </h3> 
        <div class="thirteen columns columnscenter ">
         <?=  $this->Form->create('Usuario') ?>
        <ul >
		<li style="float:left; width:100%; ">
		<?= $this->Form->input('empresa', array('options' => $afiliados, 'type' => 'select', 'empty' => '<< Empresa / Afiliado >>', 'label' => false,'class' => 'required', 'id' => 'empresa')) ?></li>

		<li><?= $this->Form->input('id_tipo_usuario', array('options' => $tipo_usuario, 'type' => 'select', 'empty' => '<< Seleccione Tipo de Usuario >>', 'placeholder' => 'Perfil:','label'=>false,  'class' => 'required', 'id' => 'id_tipo_usuario')) ?></li> <br>
		 <li style="float:left; width:100%; "> <?= $this->Form->input('cc_nit', array('class' => 'required', 'placeholder' => 'CC / Nit','label'=>false)) ?></li> 
		 <li> <?= $this->Form->input('nombre_completo', array('class' => 'required', 'placeholder' => 'Nombre Completo','label'=>false)) ?></li>
		<li> <?= $this->Form->input('apellidos',array('label'=>false,'placeholder'=>'Apellido')) ?></li>
		<li> <?= $this->Form->input('email', array('label' => false , 'placeholder' => 'ej: email@email.com')) ?></li>
		<li> <?= $this->Form->input('username', array('label' => false,'class' => 'required', 'placeholder' => 'ej: miusername')) ?></li>
		<li> <?= $this->Form->input('password', array('label' => false,'class' => 'required', 'placeholder' => '*******')) ?></li>
		<li> <?= $this->Form->hidden('estado', array('hiddenField' => 'true','value'=> 1, 'class' => 'short-text')) ?></li>
		<li><?= $this->Form->input('Id_Asesor', array('options' => $asesores, 'type' => 'select', 'empty' => '<< Seleccione Asesor >>', 'label' => false, 'id' => 'Id_Asesor')) ?></li>
		 </ul>    
        <?= $this->Form->end(__('Guardar'))?>
        </div>
        
    </div>
</div>
