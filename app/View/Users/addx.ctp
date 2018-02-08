<!-- src/Template/Users/add.ctp -->
<div class="container view-add-cliente">
    
    <?= $this->Form->create($user) ?>
        <fieldset>
            <?= $this->Form->input('cc_nit',array('placeholder'=>'IDENTIFICACION','label'=>false)) ?>
            <?= $this->Form->input('nombre_completo',array('placeholder'=>'NOMBRE/RAZON SOCIAL','label'=>false)) ?>
    	    <?= $this->Form->input('email',array('placeholder'=>'EMAIL','label'=>false)) ?>
            <?= $this->Form->input('username',array('placeholder'=>'LOGIN','label'=>false)) ?>
            <?= $this->Form->input('password',array('placeholder'=>'PASSWORD','label'=>false ))?>
            <?= $this->Form->hidden('estado',array('value'=>'0','label'=>false)) ?>
            <?= $this->Form->hidden('empresa',array('value'=>$user['empresa'],'label'=>false ))?>	
            <?= $this->Form->hidden('role', array('value'=>'visitante','label'=>false)); ?>
       </fieldset>
    <?= $this->Form->button(__('Submit')); ?>
    <?= $this->Form->end() ?>
    </div>
</div>