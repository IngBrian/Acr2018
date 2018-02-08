
<div class="container">
    
    <?= $this->Form->create($user,['class'=>'form-horizontal']) ?>
        
          <div class="col-sm-7">   
           
            <?= $this->Form->input('cc_nit',array('label'=>false,'value'=>$user['User']['cc_nit'],'placeholder'=>'Identificacion','class'=>'form-control')) ?>

            <?= $this->Form->input('nombre_completo',array('placeholder'=>'nombre completo','value'=>$user['User']['nombre_completo'],'label'=>false,'class'=>'form-control')) ?>
    	   
            <?= $this->Form->input('email',array('placeholder'=>'Correo electronico','value'=>$user['User']['email'],'label'=>false,'class'=>'form-control')) ?>

            <?= $this->Form->input('username',array('placeholder'=>'nombre de usuario','value'=>$user['User']['username'],'label'=>false,'class'=>'form-control')) ?>

            <?= $this->Form->input('password',array('placeholder'=>'clave','value'=>$user['User']['password'],'label'=>false,'class'=>'form-control' ))?>

            <?= $this->Form->hidden('estado',array('value'=>$user['User']['estado'])) ?>
            <?php if($user['User']['role']!='sadmin'):?>
            <?= $this->Form->input('role', array('options'=>$options,'value'=>$user['User']['role'],'label'=>false,'class'=>'form-control')); ?>

             
			  
             <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?> 
            <?php endif; ?>
        </div>
   
    
</div>