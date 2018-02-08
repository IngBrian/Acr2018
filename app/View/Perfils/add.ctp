  
<div class="container view-add-cliente">
    <div class="container">
         <h3> <?= __("Nuevo Perfil") ?> </h3> 
        <div class="thirteen columns columnscenter ">
         <?=  $this->Form->create('Perfil') ?>
        <ul >
		<li style="float:left; width:100%; "><?= $this->Form->input('empresa', array('options' => $afiliados, 'type' => 'select', 'empty' => '<< Empresa / Afiliado >>', 'label' => 'Perfil perteneciente a Empresa-Afiliado: ','class' => 'required', 'id' => 'empresa')) ?></li>
		<li> <?= $this->Form->input('nombre_tipo', array('class' => 'required', 'placeholder' => 'Nombre de Perfil', 'label' => 'Nombre de Perfil')) ?></li> <hr>
		<?= $this->Form->hidden('empresa', array('hiddenField' => 'true','value'=> $this->Session->read('Auth.User.empresa'), 'class' => 'short-text')) ?>
		</li>
		 <li><? echo utf8_encode("===== ASIGNE LOS MÓDULOS SOBRE LOS CUALES ESTE PERFIL TENDRÁ ACCESO =======: "); ?></li>
		 <li><?= $this->Form->input("Permiso.id_mod1", array("type" => "checkbox", 'options' => 1, 'label' => 'Ordenados'));  ?></li>
		 <li><?= $this->Form->input("Permiso.id_mod8", array("type" => "checkbox", 'options' => 1, 'label' => 'Asesores'));  ?></li>
		 <li><?= $this->Form->input("Permiso.id_mod2", array("type" => "checkbox", 'options' => 1, 'label' => 'Procesos'));  ?></li>
		 <li><?= $this->Form->input("Permiso.id_mod11", array("type" => "checkbox", 'options' => 1, 'label' => 'Gestion Administrativa'));  ?></li>
		 <li><?= $this->Form->input("Permiso.id_mod3", array("type" => "checkbox", 'options' => 1, 'label' => 'Ordenantes'));  ?></li>
		 <li><?= $this->Form->input("Permiso.id_mod4", array("type" => "checkbox", 'options' => 1, 'label' => 'Autoridades'));  ?></li>
		 <li><?= $this->Form->input("Permiso.id_mod5", array("type" => "checkbox", 'options' => 1, 'label' => 'Reportes / Consultas de Proceso'));  ?></li>
		 <li><?= $this->Form->input("Permiso.id_mod9", array("type" => "checkbox", 'options' => 1, 'label' => 'Tipo de Procesos'));  ?></li>
		 <li><?= $this->Form->input("Permiso.id_mod7", array("type" => "checkbox", 'options' => 1, 'label' => 'Relacionados'));  ?></li>
 <li><?= $this->Form->input("Permiso.id_mod12", array("type" => "checkbox", 'options' => 1, 'label' => 'Subestados'));  ?></li>
		 <? if($this->Session->read('Auth.User.empresa')!=1){ ?>
			 <li><?= $this->Form->hidden("Permiso.id_mod10", array("type" => "checkbox", 'options' => 1, 'label' => 'Afiliados/Suscriptores'));  ?></li>
		 <? }else{ ?>
			 <li><?= $this->Form->input("Permiso.id_mod10", array("type" => "checkbox", 'options' => 1, 'label' => 'Afiliados/Suscriptores'));  ?></li>
		 <? } ?>
		 <li><?= $this->Form->input("Permiso.id_mod6", array("type" => "checkbox", 'options' => 1, 'label' => 'Sistema / Usuarios / Perfiles'));  ?></li>
		 <hr>
		 <li><?= $this->Form->input("crear", array("type" => "checkbox", 'options' => 1, 'label' => ': Este perfil puede crear registros'));  ?></li>
		<li><?= $this->Form->input("ver", array("type" => "checkbox", 'options' => 1, 'label' => ': Este perfil puede visualizar todos los registros'));  ?></li><hr>
		 <li><? echo utf8_encode("===== PODRÁ TENER ACCESO A LOS PROCESOS DE LOS SIGUIENTES ORDENANTES: =======:"); ?></li>

		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.id_demandante', array('options' => $ordenantes, 'type' => 'select', 'empty' => '<< Seleccione Ordenante >>', 'label' => '', 'id' => 'id_demandante' )) ?></li>  
		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.id_demandante2', array('options' => $ordenantes, 'type' => 'select', 'empty' => '<< Seleccione Ordenante >>', 'label' => '' , 'id' => 'id_demandante2')) ?></li> 
		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.id_demandante3', array('options' => $ordenantes, 'type' => 'select', 'empty' => '<< Seleccione Ordenante >>', 'label' => '', 'id' => 'id_demandante3' )) ?></li>
		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.id_demandante4', array('options' => $ordenantes, 'type' => 'select', 'empty' => '<< Seleccione Ordenante >>', 'label' => '', 'id' => 'id_demandante4' )) ?></li> 
		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.id_demandante5', array('options' => $ordenantes, 'type' => 'select', 'empty' => '<< Seleccione Ordenante >>', 'label' => '', 'id' => 'id_demandante5' )) ?></li> <hr>
		 <li><? echo utf8_encode("===== PODRÁ TENER ACCESO A LOS PROCESOS DE LOS SIGUIENTES ORDENADOS (1 Y 2): =======:"); ?></li>

		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.cliente_id', array('options' => $clientes, 'type' => 'select', 'empty' => '<< Seleccione Ordenado >>', 'label' => '' , 'id' => 'cliente_id')) ?></li> 
		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.cliente_id2', array('options' => $clientes, 'type' => 'select', 'empty' => '<< Seleccione Ordenado >>', 'label' => '' , 'id' => 'cliente_id2')) ?></li> 		
		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.cliente_id3', array('options' => $clientes, 'type' => 'select', 'empty' => '<< Seleccione Ordenado >>', 'label' => '' , 'id' => 'cliente_id3')) ?></li>
		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.cliente_id4', array('options' => $clientes, 'type' => 'select', 'empty' => '<< Seleccione Ordenado >>', 'label' => '' , 'id' => 'cliente_id4')) ?></li> 		
		<li style="float:left; width:100%; padding-left: 20px;"><?= $this->Form->input('Permiso.cliente_id5', array('options' => $clientes, 'type' => 'select', 'empty' => '<< Seleccione Ordenado >>', 'label' => '' , 'id' => 'cliente_id5')) ?></li>     </ul>    
        <?= $this->Form->end(__('Guardar'))?>
        </div>
    </div>
</div>