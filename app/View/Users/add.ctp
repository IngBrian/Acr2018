<!-- src/Template/Users/add.ctp -->
<div class="container">
    
    <?= $this->Form->create($user,['class'=>'form-horizontal']) ?>
       
           <div class="col-sm-7"> 

            <?= $this->Form->input('cc_nit',array('placeholder'=>'IDENTIFICACION','class'=>'form-control','label'=>false)) ?>

            <?= $this->Form->input('nombre_completo',array('placeholder'=>'NOMBRE/RAZON SOCIAL','class'=>'form-control','label'=>false)) ?>
    	    
            <?= $this->Form->input('email',array('placeholder'=>'EMAIL','class'=>'form-control','label'=>false)) ?>

            <?= $this->Form->input('username',array('placeholder'=>'LOGIN','class'=>'form-control','label'=>false)) ?>

            <?= $this->Form->input('password',array('placeholder'=>'PASSWORD','class'=>'form-control','label'=>false ))?>
            
            <?= $this->Form->hidden('estado',array('value'=>'0')) ?>
            <?= $this->Form->hidden('empresa',array('value'=>'1' ))?>	
            <?= $this->Form->hidden('role', array('value'=>'visitante')); ?>
      
            <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Enviar']) ?> 
    </div>
</div>