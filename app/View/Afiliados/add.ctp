<div class="container">

  <thead bgcolor="#222222">

	</thead>
         <?=  $this->Form->create('Afiliado', ['action' => 'add','class'=>'form-horizontal']) ?>
	        
			<div class="col-sm-7">
			

			<?= $this->Form->input('identificacion', array('placeholder'=>'Identificacion','label'=>false,'class'=>'form-control')) ?>

			<?= $this->Form->input('nombreCompleto', array('placeholder'=>'Nombre','label'=>false,'class'=>'form-control')) ?>

			<?= $this->Form->input('direccion', array('class' => 'required', 'placeholder'=>'Direccion','label'=>false,'class'=>'form-control')) ?>

			<?= $this->Form->input('telefonos',array('placeholder'=>'telefono','label'=>false,'class'=>'form-control')) ?>

			<?= $this->Form->input('email', array('label' => false , 'placeholder' => 'ej: email@email.com','class'=>'form-control')) ?>
              <?php if($user['role']!='sadmin' or $user['role']!='administrator'):?>
            <?= $this->Form->input('role', array('options'=>$options,'name'=>"role",'label'=>false,'class'=>'form-control')); ?>
			  <?php endif; ?>
	      <?= $this->Form->end(__('Guardar'))?>
       </div>
        
	
</div>
    <script>
      $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
      });
    </script>
