<style>.body { background-color:#000000; }</style>
<div class="container view-edit-cliente">
     <div class="options"></div>
<center><h4> <?= __('ACTUALIZACION DE PASSWORD: OFICINAJURIDICA.INFO') ?></h4></center>
<br><br>
    <div class="eight columns columnscenter">
        <?=  $this->Form->create('RecoveryPasswords', array('action' => 'uppass')) ?>
        <ul>
		<li> <?= $this->Form->hidden('em', array('hiddenField' => 'true','value'=> $em, 'class' => 'short-text')) ?></li>
		<li><font color='#ffffff'>INDIQUE NUEVO PASSWORD:</font><?= $this->Form->input('password', array('type'=>'password',  'label' => '','class' => 'required', 'placeholder' => '*******')) ?></li>
		<li><font color='#ffffff'>CONFIRME NUEVO PASSWORD:</font><?= $this->Form->input('password2', array('type'=>'password', 'rule' => array('match', 'password'),'label' => '','class' => 'required', 'placeholder' => '*******')) ?></li>
       </ul>
        <?php echo $this->Form->end('Actualizar Datos'); ?>
   </div>
</div>