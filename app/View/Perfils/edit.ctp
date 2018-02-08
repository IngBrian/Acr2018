
<div class="container view-add-cliente">
    <div class="container">
         <h3> <?= __("Editar Perfil") ?> </h3> 
        <div class="thirteen columns columnscenter ">
         <?=  $this->Form->create('Perfil', array('action' => 'edit')) ?>
        <ul >
		<? //print_r($tipo_usuario); ?>
		<li style="float:left; width:100%; "><?= $this->Form->input('empresa', array('options' => $afiliados, 'type' => 'select', 'empty' => '<< Empresa / Afiliado >>', 'label' => 'Perfil perteneciente a Empresa-Afiliado: ','class' => 'required','value' => $tipo_usuario[0]['TipoUsuario']['empresa'], 'id' => 'empresa')) ?></li>
		<li> <?= $this->Form->input('nombre_tipo', array('class' => 'required','value' => $tipo_usuario[0]['TipoUsuario']['nombre_tipo'] ,'placeholder' => 'Nombre de Perfil', 'label' => 'Nombre de Perfil')) ?></li> <hr>
		<li> <?= $this->Form->hidden('id', array('hiddenField' => 'true','value'=>  $tipo_usuario[0]['TipoUsuario']['id'], 'class' => 'short-text')) ?></li>
		 <li> ===== PERMISOS -MODULOS SOBRE LOS CUALES ESTE PERFIL TIENE ACCESO =======: </li>
		 <li><?= $this->Form->input("Permiso.id_mod1", array("type" => "checkbox", 'options' => 1, 'checked' => $permisos[0]['Permiso']['id_mod1'], 'label' => 'Ordenados'));  ?>				<li> <?= $this->Form->hidden('Permiso.id_perfil', array('hiddenField' => 'true','value'=>  $tipo_usuario[0]['TipoUsuario']['id'], 'class' => 'short-text')) ?></li>
		<li> <?= $this->Form->hidden('Permiso.id', array('hiddenField' => 'true','value'=>  $permisos[0]['Permiso']['id'], 'class' => 'short-text')) ?></li>
</li>
		 <li><?= $this->Form->input("Permiso.id_mod8", array("type" => "checkbox", 'options' => 1, 'checked' => $permisos[0]['Permiso']['id_mod8'], 'label' => 'Asesores'));  ?></li>
		 <li><?= $this->Form->input("Permiso.id_mod2", array("type" => "checkbox", 'options' => 1, 'checked' => $permisos[0]['Permiso']['id_mod2'], 'label' => 'Procesos'));  ?></li>
		 <li><?= $this->Form->input("Permiso.id_mod11", array("type" => "checkbox", 'options' => 1, 'checked' => $permisos[0]['Permiso']['id_mod11'], 'label' => 'Gestion Administrativa'));  ?></li>
		 <li><?= $this->Form->input("Permiso.id_mod3", array("type" => "checkbox", 'options' => 1, 'checked' => $permisos[0]['Permiso']['id_mod3'], 'label' => 'Ordenantes'));  ?></li>
		 <li><?= $this->Form->input("Permiso.id_mod4", array("type" => "checkbox", 'options' => 1, 'checked' => $permisos[0]['Permiso']['id_mod4'], 'label' => 'Autoridades'));  ?></li>
		 <li><?= $this->Form->input("Permiso.id_mod5", array("type" => "checkbox", 'options' => 1, 'checked' => $permisos[0]['Permiso']['id_mod5'], 'label' => 'Reportes / Consultas de Proceso'));  ?></li>
		 <li><?= $this->Form->input("Permiso.id_mod9", array("type" => "checkbox", 'options' => 1, 'checked' => $permisos[0]['Permiso']['id_mod9'], 'label' => 'Tipo de Procesos'));  ?></li>
		 <li><?= $this->Form->input("Permiso.id_mod7", array("type" => "checkbox", 'options' => 1, 'checked' => $permisos[0]['Permiso']['id_mod7'], 'label' => 'Relacionados'));  ?></li>
                 <li><?= $this->Form->input("Permiso.id_mod12", array("type" => "checkbox", 'options' => 1, 'checked' => $permisos[0]['Permiso']['id_mod12'], 'label' => 'Subestados'));  ?></li>
		 <? if($this->Session->read('Auth.User.empresa')!=1){ ?>
			 <li><?= $this->Form->hidden("Permiso.id_mod10", array("type" => "checkbox", 'options' => 1,'checked' => $permisos[0]['Permiso']['id_mod10'], 'label' => 'Afiliados/Suscriptores'));  ?></li>
		 <? }else{ ?>
			 <li><?= $this->Form->input("Permiso.id_mod10", array("type" => "checkbox", 'options' => 1, 'checked' => $permisos[0]['Permiso']['id_mod10'],'label' => 'Afiliados/Suscriptores'));  ?></li>
		 <? } ?>
		 
		 <li><?= $this->Form->input("Permiso.id_mod6", array("type" => "checkbox", 'options' => 1, 'checked' => $permisos[0]['Permiso']['id_mod6'], 'label' => 'Sistema / Usuarios / Perfiles'));  ?></li><hr>
		 <li><?= $this->Form->input("crear", array("type" => "checkbox", 'options' => 1, 'checked' => $tipo_usuario[0]['TipoUsuario']['crear'], 'label' => ': Este perfil puede crear registros'));  ?></li>
		<li><?= $this->Form->input("ver", array("type" => "checkbox", 'options' => 1, 'checked' => $tipo_usuario[0]['TipoUsuario']['ver'], 'label' => ': Este perfil puede visualizar todos los registros'));  ?></li><hr>
		 <li><? echo utf8_encode("===== ESTE PERFIL TIENE ACCESO A LOS PROCESOS DE LOS SIGUIENTES ORDENANTES: =======:"); ?></li>
		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.id_demandante', array('options' => $ord2, 'type' => 'select', 'empty' => '<< No Definido >>', 'label' => '', 'value' => $permisos[0]['Permiso']['id_demandante'], 'id' => 'id_demandante')) ?></li> <br></li>
		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.id_demandante2', array('options' => $ord2, 'type' => 'select', 'empty' => '<< No Definido >>', 'label' => '', 'value' => $permisos[0]['Permiso']['id_demandante2'], 'id' => 'id_demandante2')) ?></li> <br></li>
		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.id_demandante3', array('options' => $ord2, 'type' => 'select', 'empty' => '<< No Definido >>', 'label' => '', 'value' => $permisos[0]['Permiso']['id_demandante3'], 'id' => 'id_demandante3')) ?></li> <br></li>
		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.id_demandante4', array('options' => $ord2, 'type' => 'select', 'empty' => '<< No Definido >>', 'label' => '', 'value' => $permisos[0]['Permiso']['id_demandante4'], 'id' => 'id_demandante4')) ?></li> <br></li>
		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.id_demandante5', array('options' => $ord2, 'type' => 'select', 'empty' => '<< No Definido >>', 'label' => '', 'value' => $permisos[0]['Permiso']['id_demandante5'], 'id' => 'id_demandante5')) ?></li> <br></li><hr>
		 <li><? echo utf8_encode("===== ESTE PERFIL TIENE ACCESO A LOS PROCESOS DE LOS SIGUIENTES ORDENADOS (1 Y 2): =======:"); ?></li>
		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.cliente_id', array('options' => $client2, 'type' => 'select', 'empty' => '<< No Definido >>', 'label' => '', 'value' => $permisos[0]['Permiso']['cliente_id'] , 'id' => 'cliente_id')) ?></li>
		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.cliente_id2', array('options' => $client2, 'type' => 'select', 'empty' => '<< No Definido >>', 'label' => '', 'value' => $permisos[0]['Permiso']['cliente_id2'] , 'id' => 'cliente_id2')) ?></li>
		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.cliente_id3', array('options' => $client2, 'type' => 'select', 'empty' => '<< No Definido >>', 'label' => '', 'value' => $permisos[0]['Permiso']['cliente_id3'], 'id' => 'cliente_id3' )) ?></li>
		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.cliente_id4', array('options' => $client2, 'type' => 'select', 'empty' => '<< No Definido >>', 'label' => '', 'value' => $permisos[0]['Permiso']['cliente_id4'], 'id' => 'cliente_id4' )) ?></li>
		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.cliente_id5', array('options' => $client2, 'type' => 'select', 'empty' => '<< No Definido >>', 'label' => '', 'value' => $permisos[0]['Permiso']['cliente_id5'] , 'id' => 'cliente_id5')) ?></li> <br></li>
    </ul>    
        <?= $this->Form->end(__('Guardar'))?>
        </div>
        
    </div>
        
</div>
